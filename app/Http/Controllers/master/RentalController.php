<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Rental;
use Illuminate\Http\Request;

class RentalController extends Controller
{
    public function index ()
    {
        $data = Rental::query()->orderBy('rental_id')->get();

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
        $data = Rental::query()->find($id);

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
            'rental_date'=>'required|date|date_format:Y-m-d H:i:s',
            'inventory_id'=>'required|integer',
            'customer_id'=>'required|integer',
            'return_date'=>'present|date|date_format:Y-m-d H:i:s',
            'staff_id'=>'required|integer',
            'last_update'=>'required|date|date_format:Y-m-d H:i:s',
        ]);

        $inserted = Rental::query()->create($request->all());

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
}