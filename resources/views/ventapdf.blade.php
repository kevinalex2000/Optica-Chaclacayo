<div> 

    <table class="tabla-head" style="">
        <tr>
            <td>
                <img src="https://i.ibb.co/Mspq98m/optica-0.jpg" width="170px">
            </td>
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

</div>   