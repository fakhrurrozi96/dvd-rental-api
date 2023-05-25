<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Inventory;
use App\Models\FilmList;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function index ()
    {
        $data = FilmList::query()->orderBy('fid')->get();

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
        $data = FilmList::query()->find($id);

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
            'film_id'=>'required|exists:\App\Models\Film,film_id',
            'store_id'=>'required|integer',
            'last_update'=>'required|date|date_format:Y-m-d H:i:s',
        ]);

        $inserted = Inventory::query()->create($request->all());

        if (!$inserted){
            return response()->json([
                'status' => 0,
                'message' => 'Data Gagal Disimpan',
            ]);
        }
        return response()->json([
            'status' => 0,
            'message' => 'Data Berhasil Disimpan',
            'data' => FilmList::query()->find($inserted->inventory_id),
        ]);
    }

    //PUT Method
    public function update($id,Request $request)
    {
        $this->validate($request,[
            'film_id'=>'required|integer',
            'store_id'=>'required|integer',
            'last_update'=>'required|date|date_format:Y-m-d H:i:s',
        ]);

        if (!Inventory::query()->find($id)){
            return response()->json([
                'status' => 0,
                'message' => 'Data Not Found Coy',
            ]);
        }

        $updated = Inventory::query()->find($id)->update($request->all());

        if (!$updated){
            return response()->json([
                'status' => 0,
                'message' => 'Data Gagal Diperbarui',
            ]);
        }

        $data = Inventory::query()->find($id);
        return response()->json([
            'status' => 0,
            'message' => 'Data Berhasil Diubah',
            'data' => $data,
        ]);
    }

    public function delete($id)
    {
        if (!Inventory::query()->find($id)){
            return response()->json([
                'status' => 0,
                'message' => 'Data Not Found',
            ]);
        }

        $deleted = Inventory::query()->find($id)->delete();

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