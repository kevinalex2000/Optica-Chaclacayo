<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Office;
use App\Models\Product;
use App\Models\Sale;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sales = Sale::all();
        return view('sale.index')->with('sales', $sales);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $codigo = Sale::select('code')->orderBy('id', 'DESC')->take(1)->get();
        if(count($codigo) == 0){
            $codigototal = 10000;
        }
        else{
            $codigototal = (float)$codigo[0]["code"] + 1;
        }
        $clients = Client::all();
        $offices = Office::all();
        $products = Product::all();
        return view('sale.create')->with('data',array("Clients" => $clients,"Offices" => $offices,"Products" => $products,"Codigo" => $codigototal));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Hacemos el descuento al producto
        $product_stock = Product::select('stock')->where('id','=', $request->post('id_product'))->get();
        $stock_actual = (float)$product_stock[0]["stock"] - 1;
        $products = Product::find($request->post('id_product'));
        $products->stock = $stock_actual;
        $products->save();
        //Se termina el descuento al producto
            $sales = new Sale();
            $id_user = Auth::user()->id;
            $sales->code = $request->post('codigo');
            $producto_id = explode("?",$request->post('id_product'));
            $sales->id_product = $producto_id[0];
            $sales->id_client = $request->post('id_client');
            $sales->id_office = $request->post('id_office');
            $sales->id_user = $id_user;
            $sales->date_sale = $request->post('fecha');
            $sales->total = $request->post('total');

            $sales->save();

            $messageResult = array(
                "type" => "success",
                "message" => "<i class='fas fa-check mr-2'></i> La venta numero <b>".$request->post('codigo')."</b> ha sido registrada exitosamente"
            );

        return redirect("/sales/create")->with('messageResult', $messageResult);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sales = Sale::find($id);
        $clients = Client::all();
        $offices = Office::all();
        $products = Product::all();
        $users = User::all();
        return view('sale.edit')->with('data',array("Clients" => $clients,"Offices" => $offices,"Products" => $products,"Sales" => $sales,"Users" => $users));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
            $sales = Sale::find($id);
            $sales->code = $request->post('codigo');
            $producto_id = explode("?",$request->post('id_product'));
            $sales->id_product = $producto_id[0];
            $sales->id_client = $request->post('id_client');
            $sales->id_office = $request->post('id_office');
            $sales->id_user = $request->post('encargado');
            $sales->date_sale = $request->post('fecha');
            $sales->total = $request->post('total');

            $sales->save();

            $messageResult = array(
                "type" => "success",
                "message" => "<i class='fas fa-check mr-2'></i> La venta numero <b>".$request->post('codigo')."</b> ha sido editada exitosamente"
            );

        return redirect("/sales/".$id."/edit")->with('messageResult', $messageResult);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sale = Sale::find($id);
        $sale->delete();

        $messageResult = array(
            "type" => "danger",
            "message" => "<i class='fas fa-trash mr-2'></i> La venta numero <b>".$sale->code."</b> ha sido eliminado exitosamente"
        );

        return redirect("/sales")->with('messageResult', $messageResult);
    }

    public function dowload($id){

    }
}
