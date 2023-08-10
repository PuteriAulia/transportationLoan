<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Loan;
use App\Models\Borrower;
use App\Models\Driver;
use App\Models\Employee;
use App\Models\FirstConfirmer;
use App\Models\Position;
use App\Models\SecondConfirmer;
use Illuminate\Http\Request;
use App\Models\Transportation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoanController extends Controller
{
    public function index(){
        $companyLoc = Auth::user()->employee->company_loc_id;
        $loans = Loan::where('company_loc_id',$companyLoc)->where('active','active')->get();
        return view('loan.dataLoan',[
            'loans' => $loans,
        ]);
    }

    public function create(){
        $companyLoc = Auth::user()->employee->company_loc_id;
        $employee = Employee::where('company_loc_id',$companyLoc)->get();
        $transportation = Transportation::where('company_loc_id',$companyLoc)->where('status','!=','tidak tersedia')->get();

        if ($companyLoc == 1) {
            $firstConfirmerPosition = Position::where('name','kepala pusat')->get();
            $secondConfirmerPosition = Position::where('name', 'kepala departemen')->get();
        }elseif ($companyLoc == 2) {
            $firstConfirmerPosition = Position::where('name','kepala cabang')->get();
            $secondConfirmerPosition = Position::where('name', 'kepala departemen')->get();
        }

        foreach ($firstConfirmerPosition as $firstPosition) {
            $firstConfirmer = Employee::where('company_loc_id',$companyLoc)->where('position_id',$firstPosition->id)->get();
        }

        foreach ($secondConfirmerPosition as $secondPosition) {
            $secondConfirmer = Employee::where('company_loc_id',$companyLoc)->where('position_id',$secondPosition->id)->get();
        }
        
        return view('loan.addLoan',[
            'employee' => $employee,
            'transportation' => $transportation,
            'firstConfirmer' => $firstConfirmer,
            'secondConfirmer' => $secondConfirmer,
        ]);
    }

    public function store(Request $request){
        $validate = Validator::make($request->all(),[
            'transportationId'  => 'required',
            'borrowerId'        => 'required',
            'dateLoan'          => 'required',
            'dateReturn'        => 'required',
            'destination'       => 'required',
            'firstConfirmerId'  => 'required',
            'secondConfirmerId' => 'required',
            'desc'              => 'required',
            'driverId'          => 'required',
        ],[
            'transportationId.required' => "Kendaraan wajib diisi",
            'borrowerId.required'       => "Peminjam wajib diisi",
            'dateLoan.required'         => "Tannggal peminjaman diisi",
            'dateReturn.required'       => "Tanggal pengembalian wajib diisi",
            'destination.required'      => "Tujuan wajib diisi",
            'firstConfirmerId.required' => "Penyetuju 1 wajib diisi",
            'secondConfirmerId.required'=> "Penyetuju 2 wajib diisi",
            'desc.required'             => "Keterangan wajib diisi",
            'driverId.required'         => "Pengemudi wajib diisi",
        ]);

        if($validate->fails()){
            return response()->json(['errors'=>$validate->errors()->toArray()]);
        }else{
            // Generate  code
            $maxId = Loan::max('code');
            $intMaxId = (int) substr($maxId,3);

            if ($maxId == null) {
                $intMaxId = '0001';
            }else{
                $addIntMaxId = $intMaxId+1;
                $intMaxId = sprintf("%'.04d",$addIntMaxId);
            }
            $newId = "LOA".$intMaxId;
            
            // Store product
            Loan::create([
                'code'              => $newId,
                'detail'            => $request->desc,
                'date_loan'         => $request->dateLoan,
                'date_return'       => $request->dateReturn,
                'destination'       => $request->destination,
                'status'            => 'menunggu konfirmasi',
                'transportation_id' => $request->transportationId,
                'company_loc_id'    => $request->company_loc,
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
                'active'            => 'active',
            ]);

            $loan = Loan::where('code',$newId)->get();
            foreach ($loan as $data) {
                $loanId = $data->id; 

                Borrower::create([
                    'employee_id' => $request->borrowerId,
                    'loan_id'     => $loanId,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);

                Driver::create([
                    'employee_id' => $request->driverId,
                    'loan_id'     => $loanId,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);

                FirstConfirmer::create([
                    'employee_id' => $request->firstConfirmerId,
                    'loan_id'     => $loanId,
                    'status'      => 'menunggu konfirmasi',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                    'status_loan'=> 'active'
                ]);

                SecondConfirmer::create([
                    'employee_id' => $request->secondConfirmerId,
                    'loan_id'     => $loanId,
                    'status'      => 'menunggu konfirmasi',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                    'status_loan'=> 'active'
                ]);
            }

            Transportation::where("id",$request->transportationId)->update([
                'status' => 'menunggu konfirmasi',
            ]);

            return response()->json([
                'status' => 'success',
                'message'=> 'Data berhasil ditambahkan',
            ]);
        }
    }

    public function detail($id){
        $loan = Loan::where('id',$id)->get();
        $borrower = Borrower::where('loan_id',$id)->get();
        $firstConfirmer = FirstConfirmer::where('loan_id',$id)->get();
        $secondConfirmer = SecondConfirmer::where('loan_id',$id)->get();
        $driver = Driver::where('loan_id',$id)->get();
        
        return view('loan.detailLoan',[
            'loan' => $loan,
            'borrower' => $borrower,
            'firstConfirmer' => $firstConfirmer,
            'secondConfirmer' => $secondConfirmer,
            'driver' => $driver,
        ]);
    }

    public function delete($id){
        // uPdate transportation status
        $loan = Loan::where('id',$id)->get();
        foreach ($loan as $data) {
            $transportationId = $data->transportation_id;
        }
        Transportation::where('id',$transportationId)->update([
            'status' => 'tersedia'
        ]);

        // Update confirmer
        FirstConfirmer::where('loan_id',$id)->update([
            'status_loan' => 'inactive',
        ]);

        SecondConfirmer::where('loan_id',$id)->update([
            'status_loan' => 'inactive',
        ]);

        // Delete loan
        Loan::where('id',$id)->update([
            'active' => 'inactive',
        ]);

        return response()->json([
            'status' => 'success',
            'message'=> 'Data berhasil dihapus',
        ]);
    }

    public function returnview($id){
        Loan::where('id',$id)->update([
            'status' => 'selesai',
        ]);

        $loan = Loan::where('id',$id)->get();
        foreach ($loan as $data) {
            $transportationId = $data->transportation_id;
        }
        Transportation::where('id',$transportationId)->update([
            'status' => 'tersedia',
        ]);


        return response()->json([
            'status' => 'success',
            'message'=> 'Data pengembalian berhasil disimpan',
        ]);
    }

    public function exportDataExcel(Request $request){
        $companyLoc = Auth::user()->employee->company_loc_id;

        $datestart = $request->datestart;
        $dateend = $request->dateend;
        $loans = Loan::where('company_loc_id',$companyLoc)->where('active','active')->whereDate('date_loan','>=',$datestart)->whereDate('date_loan','<=',$dateend)->get();


        // $loans = Loan::where('company_loc_id',$companyLoc)->where('active','active')->get();
        return view('loan.exportExcel',[
            'loans' => $loans,
        ]);
    }
}
