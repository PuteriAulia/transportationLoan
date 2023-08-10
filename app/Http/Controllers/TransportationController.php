<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Transportation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TransportationController extends Controller
{
    public function index(){
        $companyLoc = Auth::user()->employee->companyloc->id;
        $transportation = Transportation::where('company_loc_id',$companyLoc)->where('active','active')->get();

        return view('transportation.dataTransportation',[
            'transportations' => $transportation,
        ]);
    }

    public function create(){
        return view('transportation.addTransportation');
    }

    public function store(Request $request){
        $validate = Validator::make($request->all(),[
            'plate'         => 'required','unique:transportations',
            'ownership'     => 'required',
            'merk'          => 'required',
            'colour'        => 'required',
            'type'          => 'required',
            'typePayload'   => 'required',
        ],[
            'plate.required'       => "Plat nomor kendaraan wajib diisi",
            'plate.unique'         => "Plat nomor kendaraan sudah terdaftar",
            'ownership.required'   => "Kepemilikan wajib diisi",
            'merk.required'        => "Merk wajib diisi",
            'colour.required'      => "Warna wajib diisi",
            'type.required'        => "Tipe diisi",
            'typePayload.required' => "Jenis angkutan diisi",
        ]);

        if($validate->fails()){
            return response()->json(['errors'=>$validate->errors()->toArray()]);
        }else{
            // Store transportation
            Transportation::create([
                'plate'     => $request->plate,
                'ownership' => $request->ownership,
                'merk'      => $request->merk,
                'colour'    => $request->colour,
                'type'      => $request->type,
                'type_payload'=> $request->typePayload,
                'status'    => 'tersedia',
                'company_loc_id' => $request->company_loc,
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now(),
                'active'    => 'active',
            ]);

            return response()->json([
                'status' => 'success',
                'message'=> 'Data berhasil ditambahkan',
            ]);
        }
    }

    public function edit($id){
        $transportations = Transportation::where('id',$id)->get();

        $typePayload = ['angkutan orang','angkutan barang'];
        $ownership   = ['sendiri', 'sewa'];
        return view('transportation/editTransportation',[
            'transportations' => $transportations,
            'typePayload'     => $typePayload,
            'ownership'       => $ownership,
        ]);
    }

    public function update($id, Request $request){
        $validate = Validator::make($request->all(),[
            'plate'         => 'required',
            'ownership'     => 'required',
            'merk'          => 'required',
            'colour'        => 'required',
            'type'          => 'required',
            'typePayload'   => 'required',
        ],[
            'plate.required'       => "Plat nomor kendaraan wajib diisi",
            'ownership.required'   => "Kepemilikan wajib diisi",
            'merk.required'        => "Merk wajib diisi",
            'colour.required'      => "Warna wajib diisi",
            'type.required'        => "Tipe wajib diisi",
            'typePayload.required' => "Jenis angkutan wajib diisi",
        ]);

        if($validate->fails()){
            return response()->json(['errors'=>$validate->errors()->toArray()]);
        }else{
            // Edit product
            Transportation::where('id',$id)->update([
                'plate'     => $request->plate,
                'ownership' => $request->ownership,
                'merk'      => $request->merk,
                'colour'    => $request->colour,
                'type'      => $request->type,
                'type_payload'=> $request->typePayload,
                'updated_at'=> Carbon::now(),
            ]);

            return response()->json([
                'status' => 'success',
                'message'=> 'Data berhasil diubah',
            ]);
        }
    }

    public function delete($id){
        Transportation::where('id',$id)->update([
            'active' => 'inactive',
        ]);

        return response()->json([
            'status' => 'success',
            'message'=> 'Data berhasil dihapus',
        ]);
    }

    public function detail($id){
        $transportation = Transportation::where('id',$id)->get();
        return response()->json([
            'status' => 'success',
            'data'=> $transportation,
        ]);
    }
}
