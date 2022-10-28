<?php

namespace App\Http\Controllers;

use App\Models\Biodata;
use Illuminate\Http\Request;
use App\Http\Requests\CreateBiodataRequest;
use App\Http\Requests\UpdateBiodataRequest;

class BiodataController extends Controller
{
    public function index()
    {
        // GET Product
        $table = Biodata::all();

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
    public function saveUpdate(CreateBiodataRequest $CreateRequest, UpdateBiodataRequest $UpdateRequest)
    {
        // Check Update Or Create
        if(isset($UpdateRequest->id_user)){

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

        $table = new Biodata;

        $table->nama                    = $request->nama;
        $table->jk                      = $request->jk;
        $table->agama                   = $request->agama;
        $table->alamat                  = $request->alamat;       
        $table->save();

        // Return Data
        return $table;  

    }

    public function update($request)
    {
        $table = Biodata::where('id_user', $request->id_user)->first();

        $table->nama                    = $request->nama;
        $table->jk                      = $request->jk;
        $table->agama                   = $request->agama;
        $table->alamat                  = $request->alamat;       
        $table->save();

        // Return Data
        return $table;

    }
}
