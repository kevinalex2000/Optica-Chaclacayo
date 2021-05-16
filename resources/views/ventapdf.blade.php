<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .estilo{
            color: white;
            background-color: brown;
            border: solid 1px black;padding: 2px 100px!important;
        }
        .estilo2{
            color: red;
            border: solid 1px black;padding: 5px 100px!important;
        }

    </style>
</head>
<body>
    <table  cellspacing="1" style="border-collapse: collapse" bordercolor="white" width="100%" height="100%">
        <tbody>
        <tr>
        <td style="text-align: center;width: 400px;">
            <p><b>VENDEDORA: </b>{{$sale->user->name}}</p>
            <p><b>TIENDA: </b>{{$sale->office->name}}</p>
        </td>
        </tr>
        </tbody>
    </table>
        <table cellspacing="1" style="border-collapse: collapse" bordercolor="white" width="100%" height="100%">
            <tbody>
            <tr>
            <td>
                <table>
                    <tbody>
                    <tr>
                    <td class="estilo" style="text-align: center;">
                        <b style="font-size: 20px;">CONTRATO</b>
                    </td>
                    </tr>
                    <tr>
                    <td class="estilo2" style="text-align: center;">
                        <b style="font-size: 15px;">N° {{$sale->code}}</b>
                    </td>
                    </tr>
                    </tbody>
                    </table>
            </td>
            </tr>
            </tbody>
        </table>
        <table cellspacing="1" style="border-collapse: collapse" bordercolor="white" width="100%" height="100%">
            <tbody>
            <tr>
            <td style="padding: 10px;">
                <table cellspacing="1" style="border-collapse: collapse" bordercolor="white" width="100%" height="100%">
                    <tbody>
                    <tr>
                    <td style="width: 15px;font-size: 20px;"><b>Señor(es):</b></td>
                    <td><p style="border-bottom: dotted;">{{$sale->client->name." ".$sale->client->lastname}}</p></td>
                    </tr>
                    </tbody>
                </table>
            </td>
            <td style="padding: 10px;">
                <table cellspacing="1" style="border-collapse: collapse" bordercolor="white" width="100%" height="100%">
                    <tbody>
                    <tr>
                    <td style="width: 15px;font-size: 20px;"><b>Fecha:</b></td>
                    <td><p style="border-bottom: dotted;">{{$sale->date_sale}}</p></td>
                    </tr>
                    </tbody>
                </table>
            </td>
            </tr>
            <tr>
                <td style="padding: 10px;">
                    <table cellspacing="1" style="border-collapse: collapse" bordercolor="white" width="100%" height="100%">
                        <tbody>
                        <tr>
                        <td style="width: 15px;font-size: 20px;"><b>Direccion:</b></td>
                        <td><p style="border-bottom: dotted;">{{$sale->client->address}}</p></td>
                        </tr>
                        </tbody>
                    </table>
                </td>
                <td style="padding: 10px;">
                    <table cellspacing="1" style="border-collapse: collapse" bordercolor="white" width="100%" height="100%">
                        <tbody>
                        <tr>
                        <td style="width: 15px; font-size: 20px;"><b>Telf:</b></td>
                        <td><p style="border-bottom: dotted;">{{$sale->client->phone}}</p></td>
                        </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            </tbody>
        </table>
        <table  cellspacing="1" style="border-collapse: collapse" width="100%" height="100%">
            <tbody>
            <tr>
            <td style="text-align: center; color: white; background-color: brown;border: solid 1px black;">
                <b style="font-size: 20px;">CANT</b>
            </td>
            <td style="text-align: center; color: white; background-color: brown;border: solid 1px black;">
                <b style="font-size: 20px;">DESCRIPCION</b>
            </td>
            <td style="text-align: center; color: white; background-color: brown;border: solid 1px black;">
                <b style="font-size: 20px;">IMPORTE</b>
            </td>
            </tr>
            <tr>
            <td style="text-align: center; color:blue;border: solid 1px black;">
                <b style="font-size: 15px;">1</b>
            </td>
            <td style="text-align: center; color:blue;border: solid 1px black;">
                <b style="font-size: 15px;">{{$sale->product->name." - ".$sale->product->trademark}}</b>
            </td>
            <td style="text-align: center; color:blue;border: solid 1px black;">
                <b style="font-size: 15px;">{{$sale->total}}</b>
            </td>
            </tr>
            </tbody>
            </table>

</body>
</html>
