<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
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
</head>
<body>
    <table class="tabla-head" style="">
        <tr>
            <td>
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
                        <p style="border-bottom: dotted;">
                        {{\Carbon\Carbon::parse($sale->date_sale)->format('d/m/Y')}}</p>
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
    </table>
</body>
</html>
