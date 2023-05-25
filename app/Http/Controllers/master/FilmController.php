<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Film;
use Illuminate\Http\Request;

class FilmController extends Controller
{
    public function index ()
    {
        $data = Film::query()->orderBy('film_id','desc')->get(['film_id','title','description','release_year']);

        if (collect($data)->count()==0){
            return response()->json([
                'status' => 0,
                'message' => 'Data Tidak Ditemukan',
                
            ]);
        }
        
        return response()->json([
            'status' => 1,
            'message' => 'Data Berhasil Ditampilkan',
            'data' => $data,
            

        ]);
    }


    //GET Method
    public function view($id)
    {
        $data = Film::query()->find($id);

        if (is_null($data)){
            return response()->json([
            'status' => 0,
            'message' => 'Data Tidak Ditemukan',
        ]);
        }
        return response()->json([
                'status' => 1,
                'message' => 'Data Berhasil Ditampilkan',
                'data' => $data,
                    

        ]);
        // return json_encode($data);
    }

    //POST Method
    public function create(Request $request)
    {
        $this->validate($request,[
            'title' => 'required|string',
            'description' => 'present|string',
            'release_year'=> 'present|integer',
            'language_id' => 'required|integer',
            'rental_duration' => 'required|integer',
            'rental_rate' => 'required|numeric',
            'length' => 'present|integer', 
            'replacement_cost' => 'required|numeric',
            'rating' => 'present|string', 
            'last_update' => 'required|date|date_format:Y-m-d H:i:s', 
            'special_features' => 'present|string', 
            'fulltext' => 'nullable|string', 
        ]);

        $inserted = Film::query()->create($request->all());

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
            'title' => 'required|string',
            'description' => 'present|string',
            'release_year'=> 'present|integer',
            'language_id' => 'required|integer',
            'rental_duration' => 'required|integer',
            'rental_rate' => 'required|numeric',
            'length' => 'present|integer', 
            'replacement_cost' => 'required|numeric',
            'rating' => 'present|string', 
            'last_update' => 'required|date|date_format:Y-m-d H:i:s', 
            'special_features' => 'present|string', 
            'fulltext' => 'nullable|string', 
        ]);

        if (!Film::query()->find($id)){
            return response()->json([
                'status' => 0,
                'message' => 'Data Not Found Coy',
            ]);
        }

        $updated = Film::query()->find($id)->update($request->all());

        if (!$updated){
            return response()->json([
                'status' => 0,
                'message' => 'Data Gagal Diperbarui',
            ]);
        }

        $data = Film::query()->find($id);
        return response()->json([
            'status' => 0,
            'message' => 'Data Berhasil Diubah',
            'data' => $data,
        ]);
    }

    public function delete($id)
    {
        if (!Film::query()->find($id)){
            return response()->json([
                'status' => 0,
                'message' => 'Data Not Found',
            ]);
        }

        $deleted = Film::query()->find($id)->delete();

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