<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function index ()
    {
        $data = Address::query()->orderBy('address_id')->get();

        if (collect($data)->count()==0){
            return response()->json([
                'status' => 0,
                'message' => 'Alamat Tidak Ditemukan',
                
            ]);
        }
        
        return response()->json([
            'status' => 1,
            'message' => 'Alamat Berhasil Ditemukan',
            'data' => $data,
            

        ]);
    }

    public function view($id)
    {
        $data = Address::query()->find($id);

        if (is_null($data)){
            return response()->json([
            'status' => 0,
            'message' => 'Alamat Tidak Ditemukan',
        ]);
        }
        return response()->json([
                'status' => 1,
                'message' => 'Alamat Berhasil Ditemukan',
                'data' => $data,
                    

        ]);
    }

    public function create(Request $request)
    {
        $this->validate($request,[
            'address'=> 'required|string',
            'address2'=> 'present|string',
            'district'=> 'required|string',
            'city_id'=> 'required|integer',
            'postal_code'=> 'present|string',
            'phone'=> 'required|string',
            'last_update'=>'required|date|date_format:Y-m-d H:i:s',
        ]);

        $inserted = Address::query()->create($request->all());

        if (!$inserted){
            return response()->json([
                'status' => 0,
                'message' => 'Data Gagal Disimpan',
            ]);
        }
        return response()->json([
            'status' => 0,
            'message' => 'Data Berhasil Disimpan',
            'data' => $inserted,
        ]);
    }

    //PUT Method
    public function update($id,Request $request)
    {
        $this->validate($request,[
            'address'=> 'required|string',
            'address2'=> 'present|string',
            'district'=> 'required|string',
            'city_id'=> 'required|integer',
            'postal_code'=> 'present|string',
            'phone'=> 'required|string',
            'last_update'=>'required|date|date_format:Y-m-d H:i:s',
        ]);

        if (!Address::query()->find($id)){
            return response()->json([
                'status' => 0,
                'message' => 'Data Not Found Coy',
            ]);
        }

        $updated = Address::query()->find($id)->update($request->all());

        if (!$updated){
            return response()->json([
                'status' => 0,
                'message' => 'Data Gagal Diperbarui',
            ]);
        }

        $data = Address::query()->find($id);
        return response()->json([
            'status' => 0,
            'message' => 'Data Berhasil Diubah',
            'data' => $data,
        ]);
    }

    public function delete($id)
    {
        if (!Address::query()->find($id)){
            return response()->json([
                'status' => 0,
                'message' => 'Data Not Found',
            ]);
        }

        $deleted = Address::query()->find($id)->delete();

        if (!$deleted){
            return response()->json([
                'status' => 0,
                'message' => 'Data Gagal Diperbarui',
            ]);
        }

        return response()->json([
            'status'=> 1,
            'message'=> 'Data Berhasil Dihapus',
        ]);
    }
}