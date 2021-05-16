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
                <img width="10px" src="data:image/png;base64,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" alt="">
            
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
