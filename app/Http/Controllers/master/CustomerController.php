<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\CustomerList;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index ()
    {
        $data = CustomerList::query()->orderBy('id')->get();

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
        $data = CustomerList::query()->find($id);

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
            'store_id'=>'required|integer',
            'first_name'=>'required|string', 
            'last_name'=>'required|string',
            'email'=>'present|string',
            'address_id'=>'required|exists:\App\Models\Address,address_id',
            'activebool'=>'required|boolean',
            'create_date'=>'required|date',
            'last_update'=>'present|date|date_format:Y-m-d H:i:s',
            'active'=>'present|integer',
            
        ]);

        $inserted = Customer::query()->create($request->all());

        if (!$inserted){
            return response()->json([
                'status' => 0,
                'message' => 'Data Gagal Disimpan',
            ]);
        }
        return response()->json([
            'status' => 0,
            'message' => 'Data Berhasil Disimpan',
            'data' => CustomerList::query()->find($inserted->customer_id),
        ]);
    }

    //PUT Method
    public function update($id,Request $request)
    {
        $this->validate($request,[
            'store_id'=>'required|integer',
            'first_name'=>'required|string',
            'last_name'=>'required|string',
            'email'=>'present|string',
            'address_id'=>'required|exists:\App\Models\Address,address_id',
            'activebool'=>'required|boolean',
            'create_date'=>'required|date',
            'last_update'=>'present|date|date_format:Y-m-d H:i:s',
            'active'=>'present|integer',
        ]);

        if (!Customer::query()->find($id)){
            return response()->json([
                'status' => 0,
                'message' => 'Data Not Found Coy',
            ]);
        }

        $updated = Customer::query()->find($id)->update($request->all());

        if (!$updated){
            return response()->json([
                'status' => 0,
                'message' => 'Data Gagal Diperbarui',
            ]);
        }

        $data = Customer::query()->find($id);
        return response()->json([
            'status' => 0,
            'message' => 'Data Berhasil Diubah',
            'data' => $data,
        ]);
    }

    public function delete($id)
    {
        if (!Customer::query()->find($id)){
            return response()->json([
                'status' => 0,
                'message' => 'Data Not Found',
            ]);
        }

        $deleted = Customer::query()->find($id)->delete();

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