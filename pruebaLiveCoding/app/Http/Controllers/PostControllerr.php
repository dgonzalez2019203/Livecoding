<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PostControllerr extends Controller
{

    public function getObject()
    {
        try {
            $response = Http::get('https://api.chucknorris.io/jokes/random');
            $object = $response->json();

            return $object;
        } catch (\Exception $e) {
            return null;
        }
    }
    
    public function getArrray(){
        $objects = [];
        $cont = 1;

        while (count($objects) < 25) {
            foreach (range(1, 25) as $cont) {            
                $obj = $this->getObject();
    
                if(array_search($obj["id"], $objects) == false){
                    $obj[] = $cont;
                    $objects[] = $obj;
                }
    
            }
        }

        

        return response()->json(['message'=>'Registros encontrados.','objects'=>$objects]);

    }

    
}
