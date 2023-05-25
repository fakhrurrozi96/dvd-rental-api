<?php

namespace App\Http\Controllers;



class HelloWorldController extends Controller
{
    public function index(){
        return response()->json([
            'metadata' => [
                'response_code' => '00',
                'massage' => 'Success',
            ],
            'data' => 'Hello World',
        ]);
    }
}
