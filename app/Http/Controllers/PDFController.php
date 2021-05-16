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
        $pdf = \PDF::loadView('ventapdf',array("sale" =>$sales))
        ->setOptions([
            'images' => true,
            'isRemoteEnabled' => true
        ]);
        return $pdf->stream('Venta-'.$id.'.pdf');
        //return view("ventapdf",array("sale" =>$sales));
    }
}
