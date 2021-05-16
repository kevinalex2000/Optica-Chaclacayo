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
        $sales = Sale::find($id);
        $pdf = \PDF::loadHTML('<div><img src="https://i.ibb.co/Mspq98m/optica-0.jpg" width="170px"></div>');

        return $pdf->stream('Venta-'.$id.'.pdf');
        //return view("ventapdf",array("sale" =>$sales));
    }
}
