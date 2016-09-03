<?php

namespace App\Http\Controllers;

use App\Service;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class ServiceController extends Controller{

  public $AllServices;

  public function __construct(){
    $this->AllServices=[["id"=>"1","description"=>"compra", "value"=>100],["id"=>"2","description"=>"venda", "value"=>200],["id"=>"3","description"=>"more", "value"=>300]];
  }
  public function index(){
     $Services=[["id"=>"1","description"=>"compra"],["id"=>"2","description"=>"venda"],["id"=>"3","description"=>"more"]];
     return response()->json($Services);
  }

  public function getOrcamento(Request $request){
     $response=["value"=>0];
     $input=$request->only(["service1","service2"]);
     $response["value"]=$this->calculate($input["service1"],$input["service2"]);
     return response()->json($response)
                      ->header('Access-Control-Allow-Origin', 'http://orcabio.com');
  }

  public function calculate($service1,$service2){
    $s1=$this->find($service1);
    $s2=$this->find($service2);
    return ($s1["value"]+$s2["value"]);
  }

  public function find($service){
    foreach($this->AllServices as $a){
      if ($a["id"]==$service){
        return ($a);
      }
    }
  }
}


?>
