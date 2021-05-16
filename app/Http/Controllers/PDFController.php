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

        $contxt = stream_context_create([
            'ssl' => [
                'verify_peer' => FALSE,
                'verify_peer_name' => FALSE,
                'allow_self_signed'=> TRUE
            ]
        ]);

        $pdf = \PDF::setOptions([
            'images' => true
        ]);
        $pdf->getDomPDF()->setHttpContext($contxt);
        $pdf = $pdf->loadView('ventapdf',array("sale" =>$sales));

        return $pdf->stream('Venta-'.$id.'.pdf');
        //return view("ventapdf",array("sale" =>$sales));
    }
}
