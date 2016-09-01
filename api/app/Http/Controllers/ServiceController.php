<?php

namespace App\Http\Controllers;

use App\Service;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class ServiceController extends Controller{


  public function index(){
     $Services=["compra","venda"];
     return response()->json($Services);
  }

}
?>
