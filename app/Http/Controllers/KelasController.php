<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;
use App\Http\Requests\CreateKelasRequest;
use App\Http\Requests\UpdateKelasRequest;

class KelasController extends Controller
{
    public function index()
    {
        // GET Product
        $table = Kelas::all();

        // Array Variable
        $data = array();

        // Loop Product
        foreach($table as $row){
            $data[] = $row;
        }

        // Variable Response Code, Data, Messages, Status
        $response = ['code' => 200, 'data' => $data, 'msg' => null, 'status' => true];

        // Return Response Json
        return response()->json($response);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function saveUpdate(CreateKelasRequest $CreateRequest, UpdateKelasRequest $UpdateRequest)
    {
        // Check Update Or Create
        if(isset($UpdateRequest->id)){

            // Call Function Update
            $table = $this->update($UpdateRequest);            

            // Variable Response Code, Data, Messages, Status
            $response = ['code' => 200, 'data' => $table, 'msg' => 'update success', 'status' => true];

        }else{

            // Call Function Create
            $table = $this->create($CreateRequest);

            // Variable Response Code, Data, Messages, Status
            $response = ['code' => 200, 'data' => $table, 'msg' => 'save success', 'status' => true];

        }

        // Return Response Json
        return response()->json($response);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create($request)
    {

        $table = new Kelas;

        $table->nama                    = $request->nama;       
        $table->save();

        // Return Data
        return $table;  

    }

    public function update($request)
    {
        $table = Kelas::find($request->id);

        $table->nama                    = $request->nama;       
        $table->save();

        // Return Data
        return $table;

    }
}
