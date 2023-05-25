<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Staff;
use App\Models\StaffList;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function index ()
    {
        $data = StaffList::query()->orderBy('id')->get();

        if (collect($data)->count()==0){
            return response()->json([
                'status' => 0,
                'message' => 'Data Tidak Ditemukan',
                
            ]);
        }
        
        return response()->json([
            'status' => 1,
            'message' => 'Data Berhasil Ditemukan',
            'data' => $data,
            

        ]);
    }

    public function view($id)
    {
        $data = StaffList::query()->find($id);

        if (is_null($data)){
            return response()->json([
            'status' => 0,
            'message' => 'Data Tidak Ditemukan',
        ]);
        }
        return response()->json([
                'status' => 1,
                'message' => 'Data Berhasil Ditemukan',
                'data' => $data,
                    

        ]);
    }

    public function create(Request $request)
    {
        $this->validate($request,[
            'first_name'=>'required|string',
            'last_name'=>'required|string',
            'address_id'=>'required|exists:\App\Models\Address,address_id',
            'email'=>'present|string',
            'store_id'=>'required|exists:\App\Models\Store,store_id',
            'active'=>'required|boolean',
            'username'=>'required|string',
            'password'=>'present|string',
            'last_update'=>'required|date|date_format:Y-m-d H:i:s',
            
        ]);

        $inserted = Staff::query()->create($request->all());

        if (!$inserted){
            return response()->json([
                'status' => 0,
                'message' => 'Data Gagal Disimpan',
            ]);
        }
        return response()->json([
            'status' => 0,
            'message' => 'Data Berhasil Disimpan',
            'data' => StaffList::query()->find($inserted->staff_id),
        ]);
    }

    //PUT Method
    public function update($id,Request $request)
    {
        $this->validate($request,[
            'first_name'=>'required|string',
            'last_name'=>'required|string',
            'address_id'=>'required|exists:\App\Models\Address,address_id',
            'email'=>'present|string',
            'store_id'=>'required|exists:\App\Models\Store,store_id',
            'active'=>'required|boolean',
            'username'=>'required|string',
            'password'=>'present|string',
            'last_update'=>'required|date|date_format:Y-m-d H:i:s',
        ]);

        if (!Staff::query()->find($id)){
            return response()->json([
                'status' => 0,
                'message' => 'Data Not Found Coy',
            ]);
        }

        $updated = Staff::query()->find($id)->update($request->all());

        if (!$updated){
            return response()->json([
                'status' => 0,
                'message' => 'Data Gagal Diperbarui',
            ]);
        }

        $data = Staff::query()->find($id);
        return response()->json([
            'status' => 0,
            'message' => 'Data Berhasil Diubah',
            'data' => $data,
        ]);
    }

    public function delete($id)
    {
        if (!Staff::query()->find($id)){
            return response()->json([
                'status' => 0,
                'message' => 'Data Not Found',
            ]);
        }

        $deleted = Staff::query()->find($id)->delete();

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