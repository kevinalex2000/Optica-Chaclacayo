<?php

namespace App\Http\Controllers;

use App\Models\Office;
use App\Models\Product;
use App\Models\Sale;
use Illuminate\Http\Request;

class PDFController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function PDF($id){
        ini_set('max_execution_time', 180);
        $sales = Sale::find($id);
        $pdf = \PDF::loadView('ventapdf',array("sale" =>$sales));
        return $pdf->stream('Venta-'.$id);
        //return view("ventapdf",array("sale" =>$sales));
    }
}
