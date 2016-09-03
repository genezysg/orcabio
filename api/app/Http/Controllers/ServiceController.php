<?php

namespace App\Http\Controllers;

use App\Service;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class ServiceController extends Controller{

  public $AllServices;

  public function __construct(){
    $this->AllServices=[["id"=>"1","description"=>"frontend", "value"=>500],["id"=>"2","description"=>"backend", "value"=>600],["id"=>"3","description"=>"app", "value"=>700]];
  }
  public function index(){
     $Services=[["id"=>"1","description"=>"frontend"],["id"=>"2","description"=>"backend"],["id"=>"3","description"=>"app"]];
     return response()->json($Services);
  }

  public function getOrcamento(Request $request){
     $response=["value"=>0];
     $total=0;
     $discount=0;
     $input=$request->only(["services"]);
     if ($input["services"]!=null){
       switch(sizeof($input["services"])){
         case 2:
          $discount=200;
          break;
         case 3:
          $discount=300 ;
          break;
       }
       foreach($input["services"] as $s){
         foreach($this->AllServices as $so){
           if ($s==$so["id"]) $total+=$so["value"];
         }
       }
       }
     $response["value"]=$total-$discount;
     return response()->json($response);
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
