<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Requests\TransactionRequest;

class TransactionController extends Controller
{
    public function index()
    {
        // GET Product
        $table = Transaction::all();

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
    public function saveUpdate(TransactionRequest $CreateRequest)
    {
        // Call Function Create
        $table = $this->create($CreateRequest);

        // Variable Response Code, Data, Messages, Status
        $response = ['code' => 200, 'data' => $table, 'msg' => 'save success', 'status' => true];

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

        $table = new Transaction;

        $table->id_biodata                      = $request->id_biodata;
        $table->id_kelas                        = $request->id_kelas;
        $table->id_jurusan                      = $request->id_jurusan;
        $table->id_jadwal                       = $request->id_jadwal; 
        $table->les                             = $request->les;       
        $table->save();

        // Return Data
        return $table;  

    }

}
