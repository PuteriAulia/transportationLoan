<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Service;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Models\Transportation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TransportServiceController extends Controller
{
    public function index(){
        $companyLoc = Auth::user()->employee->company_loc_id;
        $services = Service::where('company_loc_id',$companyLoc)->get();
        return view('transportService.dataTransportService',['services'=>$services]);
    }

    public function create(){
        $companyLoc = Auth::user()->employee->company_loc_id;
        $employees = Employee::where('company_loc_id',$companyLoc)->get();
        $transportations = Transportation::where('company_loc_id',$companyLoc)->where('status','!=','tidak tersedia')->get();
        return view('transportService.addTransportService',[
            'employees' => $employees,
            'transportations' => $transportations
        ]);
    }

    public function store(Request $request){
        $validate = Validator::make($request->all(),[
            'transportationId' => 'required',
            'typeService'      => 'required',
            'dateIn'           => 'required',
            'dateOut'          => 'required',
            'cost'             => 'required',
            'kmIn'             => 'required',
            'kmOut'            => 'required',
            'employeeId'       => 'required',
        ],[
            'transportationId.required' => "Kendaraan wajib diisi",
            'typeService.required'      => "Tipe service wajib diisi",
            'dateIn.required'           => "Tanggal masuk wajib diisi",
            'dateOut.required'          => "Tanggal keluar wajib diisi",
            'cost.required'             => "Biaya wajib diisi",
            'kmIn.required'             => "Km masuk wajib diisi",
            'kmOut.required'            => "Km datang lagi wajib diisi",
            'employeeId.required'       => "Pegawai wajib diisi",
        ]);

        if($validate->fails()){
            return response()->json(['errors'=>$validate->errors()->toArray()]);
        }else{
            // Store 
            Service::create([
                'transportation_id' => $request->transportationId,
                'type' => $request->typeService,
                'date_in' => $request->dateIn,
                'date_out' => $request->dateOut,
                'company_loc_id' => $request->company_loc,
                'cost' => $request->cost,
                'km_in' => $request->kmIn,
                'km_out' => $request->kmOut,
                'desc' => $request->desc,
                'employee_id' => $request->employeeId,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

            return response()->json([
                'status' => 'success',
                'message'=> "Data berhasil ditambahkan",
            ]);
        }
    }

    public function edit($id){
        $companyLoc = Auth::user()->employee->company_loc_id;
        $employees = Employee::where('company_loc_id',$companyLoc)->get();
        $transportations = Transportation::where('company_loc_id',$companyLoc)->where('status','!=','tidak tersedia')->get();
        $service = Service::where('id',$id)->get();

        $serviceType = ['rutin','tak terduga'];

        return view('transportService.editTransportService',[
            'service' => $service,
            'employees' => $employees,
            'transportations' => $transportations,
            'serviceType' => $serviceType,
        ]);
    }

    public function update(Request $request, $id){
        $validate = Validator::make($request->all(),[
            'transportationId' => 'required',
            'typeService'      => 'required',
            'dateIn'           => 'required',
            'dateOut'          => 'required',
            'cost'             => 'required',
            'kmIn'             => 'required',
            'kmOut'            => 'required',
            'employeeId'       => 'required',
        ],[
            'transportationId.required' => "Kendaraan wajib diisi",
            'typeService.required'      => "Tipe service wajib diisi",
            'dateIn.required'           => "Tanggal masuk wajib diisi",
            'dateOut.required'          => "Tanggal keluar wajib diisi",
            'cost.required'             => "Biaya wajib diisi",
            'kmIn.required'             => "Km masuk wajib diisi",
            'kmOut.required'            => "Km datang lagi wajib diisi",
            'employeeId.required'       => "Pegawai wajib diisi",
        ]);

        if($validate->fails()){
            return response()->json(['errors'=>$validate->errors()->toArray()]);
        }else{
            // Edit product
            Service::where('id',$id)->update([
                'transportation_id' => $request->transportationId,
                'type' => $request->typeService,
                'date_in' => $request->dateIn,
                'date_out' => $request->dateOut,
                'cost' => $request->cost,
                'km_in' => $request->kmIn,
                'km_out' => $request->kmOut,
                'desc' => $request->desc,
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
        Service::where('id',$id)->delete();

        return response()->json([
            'status' => 'success',
            'message'=> 'Data berhasil dihapus',
        ]);
    }

    public function detail($id){
        $data = Service::where('id',$id)->get();
        
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
