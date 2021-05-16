<head>
<title>Reporte - Optica Chaclacayo</title>
</head>

    <table class="tabla-head" 
    style="
        font-size: 14px;
        border-collapse: collapse;
        width:100%;">
        <tr>
            <td>
                <img src="https://i.ibb.co/Mspq98m/optica-0.jpg" width="170px">
            </td>
            <td>
                <img src="https://i.ibb.co/VgRTXpK/Whats-App-Image-2021-05-15-at-12-12-26-AM.jpg" width="200px">
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
                    <th style="
        background-color: brown;
        color: white;
        border: 1px solid black;
        padding: 4px 0px;">CONTRATO</th>
                </tr>
                <tr>
                    <td style="
                        text-align: center;
                        border: 1px solid black;
                        padding: 2px 0px;
                        text-align: center;
                        color: red;
                        font-weight: bold;">N° {{$sale->code}}</td>
                </tr>
            </table>
            
            </td>
        </tr>
    </table>

    <br><br>
    <table class="tabla-detalles"
    style="
        font-size: 15px;
        border-collapse: collapse;
        width:100%;">
        <tbody>
        <tr>
            <td>
                <table width="100%">
                    <tr>
                        <td width="15px"><b>Señor(es):</b></td>
                        <td>
                            <p style="border-bottom: dotted;
                                margin-top:0;
                                margin-bottom:0;">
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

    <table class="tabla-productos"
    style="
        font-size: 15px;
        border-collapse: collapse;
        width:100%;">
        <tr>
            <th style="
        background-color: brown;
        color: white;
        border: 1px solid black;
        padding: 4px 0px;">CANT</th>
            <th style="
        background-color: brown;
        color: white;
        border: 1px solid black;
        padding: 4px 0px;" width="500px">DESCRIPCION</th>
            <th style="
        background-color: brown;
        color: white;
        border: 1px solid black;
        padding: 4px 0px;">IMPORTE</th>
        </tr>
        <tr>
            <td style="
                font-size: 15px;
                border: 1px solid black;
                text-align: center;"><b>1</b></td>
            <td style="
                font-size: 15px;
                border: 1px solid black;
                text-align: center;">{{$sale->product->name." - ".$sale->product->trademark}}</td>
            <td style="
                font-size: 15px;
                border: 1px solid black;
                text-align: center;">{{$sale->total}}</td>
        </tr>
    </table>
