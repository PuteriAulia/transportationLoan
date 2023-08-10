<?php

namespace App\Http\Controllers;

use App\Models\FirstConfirmer;
use App\Models\Loan;
use App\Models\SecondConfirmer;
use App\Models\Transportation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\returnSelf;

class LoanConfirmController extends Controller
{
    public function index(){
        $employeeId = Auth::user()->employee->id;
        $firstConfirmer = FirstConfirmer::where('employee_id',$employeeId)->where('status_loan','active')->get();
        $secondConfirmer = SecondConfirmer::where('employee_id',$employeeId)->where('status_loan','active')->get();
        
        $countFirst = count($firstConfirmer);
        $countSecond = count($secondConfirmer);

        $loanConfirm = 0;
        $confirmer= 0;
        if ($countFirst !== 0) {
            $loanConfirm = $firstConfirmer;
            $confirmer = 1;
        }elseif ($countSecond !== 0) {
            $loanConfirm = $secondConfirmer;
            $confirmer = 2;
        }
        // dd($employeeId);

        return view('loan.confirmLoan',[
            'loanConfirm' => $loanConfirm,
            'confirmer'   => $confirmer,
        ]);
    }

    public function update(Request $request,$id){
        $confirmer = $request->confirmer; 
        if ($confirmer == 1) {
            FirstConfirmer::where('id', $id)->update([
                'status' => 'terkonfirmasi',
            ]);

            $dataConfirmer = FirstConfirmer::where('id',$id)->get();
        }elseif ($confirmer == 2) {
            SecondConfirmer::where('id', $id)->update([
                'status' => 'terkonfirmasi',
            ]);

            $dataConfirmer = SecondConfirmer::where('id',$id)->get();
        }

        foreach ($dataConfirmer as $data) {
            $loanId = $data->loan_id;
        }
        // Find confirmer by id for confirmation checking
        $firstConnfirmer = FirstConfirmer::where('loan_id',$loanId)->get();
        $secondConfirmer = SecondConfirmer::where('loan_id',$loanId)->get();
        foreach ($firstConnfirmer as $first) {
            $statusFirst = $first->status;
        }
        foreach ($secondConfirmer as $second) {
            $statusScnd = $second->status;
        }

        if ($statusFirst==='terkonfirmasi' && $statusScnd==='terkonfirmasi') {
            Loan::where('id',$loanId)->update([
                'status' => 'terkonfirmasi',
            ]);

            $loanData = Loan::where('id',$loanId)->get();
            foreach ($loanData as $data) {
                $transportId = $data->transportation_id;
            }
            Transportation::where('id',$transportId)->update([
                'status' => 'dalam pinjaman',
            ]);
        }

        return response()->json([
            'status' => 'success',
            'message' => $transportId,
        ]);
    }
}
