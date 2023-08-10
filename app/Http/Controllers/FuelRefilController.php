<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\FuelRefil;
use Illuminate\Http\Request;
use App\Models\Transportation;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class FuelRefilController extends Controller
{
    public function index(){
        $comp_loc_id = Auth::user()->employee->companyloc->id;
        $data = FuelRefil::where('company_loc_id',$comp_loc_id)->get();
        return view('fuelRefil/dataFuelRefil',[
            'data' => $data
        ]);
    }

    public function create(){
        $companyLoc = Auth::user()->employee->company_loc_id;
        $transportations = Transportation::where('company_loc_id',$companyLoc)->where('status','!=','tidak tersedia')->get();
        $employees = Employee::where('company_loc_id',$companyLoc)->get();

        return view('fuelRefil/addFuelRefil',[
            'transportations' => $transportations,
            'employees' => $employees,
        ]);
    }

    public function store(Request $request){
        $validate = Validator::make($request->all(),[
            'kmBefore'            => 'required',
            'kmAfter'             => 'required',
            'liter'               => 'required',
            'cost'                => 'required',
            'transportationId'    => 'required',
            'datePayment'         => 'required',
            'employeeId'          => 'required',
            // 'transportationPlate'   => 'required',
        ],[
            'kmBefore.required'           => "Km sebelum pengisian wajib diisi",
            'kmAfter.required'            => "Km setelah pengisian wajib diisi",
            'liter.required'              => "Jumlah liter wajib diisi",
            'cost.required'               => "Biaya pengisian wajib diisi",
            'transportationId.required'   => "Kendaraan wajib diisi",
            'datePayment.required'        => "Tanggal pembelian wajib diisi",
            'employeeId.required'         => "Pegawai wajib diisi",
        ]);

        if($validate->fails()){
            return response()->json(['errors'=>$validate->errors()->toArray()]);
        }else{
            // Generate products code
            $maxId = FuelRefil::max('code');
            $intMaxId = (int) substr($maxId,3);

            if ($maxId == null) {
                $intMaxId = '0001';
            }else{
                $addIntMaxId = $intMaxId+1;
                $intMaxId = sprintf("%'.04d",$addIntMaxId);
            }
            $newId = "BBM".$intMaxId;

            // Store product
            FuelRefil::create([
                'code'  => $newId,
                'km_before' => $request->kmBefore,
                'km_after' => $request->kmAfter,
                'liter' => $request->liter,
                'cost' => $request->cost,
                'transportation_id' => $request->transportationId,
                'date' => $request->datePayment,
                'employee_id' => $request->employeeId,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'company_loc_id' => Auth::user()->employee->companyloc->id,
            ]);

            return response()->json([
                'status' => 'success',
                'message'=> 'Data berhasil ditambahkan',
            ]);
        }
    }

    public function edit($id){
        $data = FuelRefil::where('id',$id)->get();
        $companyLoc = Auth::user()->employee->company_loc_id;
        $transportations = Transportation::where('company_loc_id',$companyLoc)->where('status','!=','tidak tersedia')->get();
        $employees = Employee::where('company_loc_id',$companyLoc)->get();

        return view('fuelRefil/editFuelRefil',[
            'data' => $data,
            'transportations' => $transportations,
            'employees' => $employees,
        ]);
    }

    public function update(Request $request, $id){
        $validate = Validator::make($request->all(),[
            'kmBefore'            => 'required',
            'kmAfter'             => 'required',
            'liter'               => 'required',
            'cost'                => 'required',
            'transportationId'    => 'required',
            'datePayment'         => 'required',
            'employeeId'          => 'required',
            // 'transportationPlate'   => 'required',
        ],[
            'kmBefore.required'           => "Km sebelum pengisian wajib diisi",
            'kmAfter.required'            => "Km setelah pengisian wajib diisi",
            'liter.required'              => "Jumlah liter wajib diisi",
            'cost.required'               => "Biaya pengisian wajib diisi",
            'datePayment.required'        => "Tanggal pengisian wajib diisi",
            'transportationId.required'   => "Kendaraan wajib diisi",
            'employeeId.required'         => "Pegawai wajib diisi",
        ]);

        if($validate->fails()){
            return response()->json(['errors'=>$validate->errors()->toArray()]);
        }else{
            // Edit product
            FuelRefil::where('id',$id)->update([
                'km_before' => $request->kmBefore,
                'km_after' => $request->kmAfter,
                'liter' => $request->liter,
                'cost' => $request->cost,
                'transportation_id' => $request->transportationId,
                'date' => $request->datePayment,
                'employee_id' => $request->employeeId,
                'updated_at' => Carbon::now(),
            ]);

            return response()->json([
                'status' => 'success',
                'message'=> 'Data berhasil diubah',
            ]);
        }
    }

    public function destroy($id){
        FuelRefil::where('id',$id)->delete();

        return response()->json([
            'status' => 'success',
            'message'=> 'Data berhasil dihapus',
        ]);
    }

    public function detail($id){
        $data = FuelRefil::where('id',$id)->get();
        
        foreach ($data as $item) {
            $transportationId = $item->transportation_id;
            $employeeId = $item->employee_id;
        }
        $transportation = Transportation::where('id',$transportationId)->get();
        $employee = Employee::where('id',$employeeId)->get();
        
        return response()->json([
            'status' => 'success',
            'data' => $data,
            'transportation' => $transportation,
            'employee' => $employee,
        ]);
    }
}
