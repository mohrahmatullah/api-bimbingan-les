<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use Illuminate\Http\Request;
use App\Http\Requests\CreateJurusanRequest;
use App\Http\Requests\UpdateJurusanRequest;

class JurusanController extends Controller
{
    public function index()
    {
        // GET Product
        $table = Jurusan::all();

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
    public function saveUpdate(CreateJurusanRequest $CreateRequest, UpdateJurusanRequest $UpdateRequest)
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

        $table = new Jurusan;

        $table->kode_jurusan                    = $request->kode_jurusan;  
        $table->nama_jurusan                    = $request->nama_jurusan;       
        $table->save();

        // Return Data
        return $table;  

    }

    public function update($request)
    {
        $table = Jurusan::find($request->id);

        $table->kode_jurusan                    = $request->kode_jurusan;  
        $table->nama_jurusan                    = $request->nama_jurusan;      
        $table->save();

        // Return Data
        return $table;

    }
}
