<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Biodata;
use App\Models\Kelas;
use App\Models\Jurusan;
use App\Models\Jadwal_belajar;
use App\Models\Transaction;

class AjaxController extends Controller
{
    public function deleteItemId(Request $request){

        // Check Request Berdasarkan Params
        if($request->params == 'biodata_list'){

            // Delete berdasarkan id
            $data = Biodata::where('id',$request->id)->delete();
            if($data){

                // Variable Response Code, Data, Messages, Status
                $response = ['code' => 200, 'data' => null, 'msg' => 'delete success', 'status' => true]; 

                // Return Response Json
                return response()->json($response);           
            }
        }
        // Check Request Berdasarkan Params
        elseif($request->params == 'kelas_list'){

            // Delete berdasarkan id
            $data = Kelas::where('id',$request->id)->delete();
            if($data){

                // Variable Response Code, Data, Messages, Status
                $response = ['code' => 200, 'data' => null, 'msg' => 'delete success', 'status' => true]; 

                // Return Response Json
                return response()->json($response);           
            }
        }
        // Check Request Berdasarkan Params
        elseif($request->params == 'jurusan_list'){

            // Delete berdasarkan id
            $data = Jurusan::where('id',$request->id)->delete();
            if($data){

                // Variable Response Code, Data, Messages, Status
                $response = ['code' => 200, 'data' => null, 'msg' => 'delete success', 'status' => true]; 

                // Return Response Json
                return response()->json($response);           
            }
        }
        // Check Request Berdasarkan Params
        elseif($request->params == 'jadwal_belajar_list'){

            // Delete berdasarkan id
            $data = Jadwal_belajar::where('id',$request->id)->delete();
            if($data){

                // Variable Response Code, Data, Messages, Status
                $response = ['code' => 200, 'data' => null, 'msg' => 'delete success', 'status' => true]; 

                // Return Response Json
                return response()->json($response);           
            }
        }
    }

    public function showItemId(Request $request){

        // Check Request Berdasarkan Params
        if($request->params == 'biodata_list'){

            // Delete berdasarkan id
            $data = Biodata::where('id_user',$request->id_user)->first();
            if($data){

                // Variable Response Code, Data, Messages, Status
                $response = ['code' => 200, 'data' => $data, 'msg' => 'success', 'status' => true]; 

                // Return Response Json
                return response()->json($response);           
            }
        }
        // Check Request Berdasarkan Params
        elseif($request->params == 'kelas_list'){

            // Delete berdasarkan id
            $data = Kelas::find($request->id);
            if($data){

                // Variable Response Code, Data, Messages, Status
                $response = ['code' => 200, 'data' => $data, 'msg' => 'success', 'status' => true]; 

                // Return Response Json
                return response()->json($response);           
            }
        }
        // Check Request Berdasarkan Params
        elseif($request->params == 'jurusan_list'){

            // Delete berdasarkan id
            $data = Jurusan::find($request->id);
            if($data){

                // Variable Response Code, Data, Messages, Status
                $response = ['code' => 200, 'data' => $data, 'msg' => 'success', 'status' => true]; 

                // Return Response Json
                return response()->json($response);           
            }
        }
        // Check Request Berdasarkan Params
        elseif($request->params == 'jadwal_belajar_list'){

            // Delete berdasarkan id
            $data = Jadwal_belajar::find($request->id);
            if($data){

                // Variable Response Code, Data, Messages, Status
                $response = ['code' => 200, 'data' => $data, 'msg' => 'success', 'status' => true]; 

                // Return Response Json
                return response()->json($response);           
            }
        }
        // Check Request Berdasarkan Params
        elseif($request->params == 'transaction_list'){

            // Delete berdasarkan id
            $data = Transaction::find($request->id);
            if($data){

                // Variable Response Code, Data, Messages, Status
                $response = ['code' => 200, 'data' => $data, 'msg' => 'success', 'status' => true]; 

                // Return Response Json
                return response()->json($response);           
            }
        }
    }
}
