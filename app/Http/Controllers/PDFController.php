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
        $pdf = \PDF::loadHTML('<style>
        .tabla-head{
            font-size: 14px;
            border-collapse: collapse;
            width:100%;
        }
        .tabla-detalles{
            font-size: 15px;
            border-collapse: collapse;
            width:100%;
        }
        .tabla-productos{
            font-size: 15px;
            border-collapse: collapse;
            width:100%;
        }
        
        .tabla-productos td{
            font-size: 15px;
            border: 1px solid black;
            text-align: center;
        }
    
        p{
            margin-top:0;
            margin-bottom:0;
        }
    
        th{
            background-color: brown;
            color: white;
            border: 1px solid black;
            padding: 4px 0px;
        }
    
        .cell-code{
            text-align: center;
            border: 1px solid black;
            padding: 2px 0px;
            text-align: center;
            color: red;
            font-weight: bold;
        }
    
        </style>
    
        <table class="tabla-head" style="">
            <tr>
                <td>
                    <img src="https://i.ibb.co/Mspq98m/optica-0.jpg" width="170px">
                </td>
                <td>
                    <img src="https://i.ibb.co/KmP97HN/Captura.png" width="200px">
                </td>
                <td class="vertical-top"  width="30%">
                    <b>VENDEDORA: </b>{{$sale->user->name}}<br>
                    <b>TIENDA: </b>{{$sale->office->name}}
                </td>
            </tr>
            <tr>
                <td colspan="2" style="padding-top: 20px">
                    {{$sale->office->address}}
                    <br>
                    {{$sale->office->name}}
                </td>
                <td>
                <table width="100%" >
                    <tr>
                        <th>CONTRATO</th>
                    </tr>
                    <tr>
                        <td  class="cell-code">N° {{$sale->code}}</td>
                    </tr>
                </table>
                
                </td>
            </tr>
        </table>
    
        <br><br>
        <table class="tabla-detalles">
            <tbody>
            <tr>
                <td>
                    <table width="100%">
                        <tr>
                            <td width="15px"><b>Señor(es):</b></td>
                            <td>
                                <p style="border-bottom: dotted;">
                                {{$sale->client->name." ".$sale->client->lastname}}
                                </p>
                            </td>
                        </tr>
                    </table>
                </td>
                <td>
                    <table width="100%">
                        <tr>
                            <td style="width: 15px"><b>Fecha:</b></td>
                            <td>
                            <p style="border-bottom: dotted;"></p>
                            </td>                        
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td>
                    <table width="100%">
                        <tr>
                            <td width="15px"><b>Direccion:</b></td>
                            <td>
                                <p style="border-bottom: dotted;">
                                {{$sale->client->address}}
                                </p>
                            </td>
                        </tr>
                    </table>
                </td>
                <td>
                    <table width="100%">
                        <tr>
                            <td style="width: 15px"><b>Telf:</b></td>
                            <td>
                            <p style="border-bottom: dotted;">{{$sale->client->phone}}</p>
                            </td>                        
                        </tr>
                    </table>
                </td>
            </tr>
            </tbody>
        </table>
    
        <br><br>
    
        <table class="tabla-productos">
            <tr>
                <th>CANT</th>
                <th width="500px">DESCRIPCION</th>
                <th>IMPORTE</th>
            </tr>
            <tr>
                <td><b>1</b></td>
                <td>{{$sale->product->name." - ".$sale->product->trademark}}</td>
                <td>{{$sale->total}}</td>
            </tr>
        </table>');

        return $pdf->stream('Venta-'.$id.'.pdf');
        //return view("ventapdf",array("sale" =>$sales));
    }
}
