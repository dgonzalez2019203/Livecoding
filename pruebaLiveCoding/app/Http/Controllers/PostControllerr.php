<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class PostControllerr extends Controller
{

    public function getObject(){
        $object;

        $url = 'https://api.chucknorris.io/jokes/random';

        $ch = curl_init($url);

        $headers = array(
            'Content-Type:application/json'
        );

        curl_setopt($ch , CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch , CURLOPT_RETURNTRANSFER, true);
     
        $result = curl_exec($ch);
        curl_close($ch);

        $object = json_decode($result, true);

        //return response()->json(['message'=>'Registros encontrados.','object'=>$object]);
        return $object;
    }
    
    public function getArrray(){
        $objects = [];
        $cont = 1;

        for($i = 0; $i < 25 ; $i++){
            $obj= $this->getObject();
            array_push($obj, $cont);            
            array_push($objects, $obj);
            $cont++; 
        }

        return response()->json(['message'=>'Registros encontrados.','objects'=>$objects]);

    }

    
}
