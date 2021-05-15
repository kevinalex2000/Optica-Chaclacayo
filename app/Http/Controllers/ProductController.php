<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('product.index')->with('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorys = Category::all();
        return view('product.create')->with('categorys', $categorys);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $code = Product::where('code', $request->post('codigo'))->count();

        if($code < 1){
            $products = new Product();

            $products->code = $request->post('codigo');
            $products->name = $request->post('nombre');
            $products->stock_initial = $request->post('cantidad');
            $products->stock = $request->post('cantidad');
            $products->trademark = $request->post('marca');
            $products->material = $request->post('material');
            $products->price = $request->post('precio');
            $products->id_category = $request->post('id_category');

            $products->save();

            $messageResult = array(
                "type" => "success",
                "message" => "<i class='fas fa-check mr-2'></i> El producto <b>".$request->post('nombre')."</b> ha sido registrado exitosamente"
            );
        }else{
            $messageResult = array(
                "type" => "warning",
                "message" => "<i class='fas fa-exclamation-triangle mr-2'></i> No se ha podido crear el producto debido que el codigo <b>".$request->post('codigo')."</b> ya esta siendo utilizado"
            );
        }

        return redirect("/products/create")->with('messageResult', $messageResult);
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
        $products = Product::find($id);
        $categorys = Category::all();
        return view('product.edit')->with('data',array("Product" =>$products, "Categories" => $categorys));
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
        $code = Product::where('code', $request->post('codigo'))->count();

        if($code <= 1){
            $products = Product::find($id);

            $products->code = $request->post('codigo');
            $products->name = $request->post('nombre');
            $products->stock = $request->post('cantidad');
            $products->trademark = $request->post('marca');
            $products->material = $request->post('material');
            $products->price = $request->post('precio');
            $products->id_category = $request->post('id_category');

            $products->save();

            $messageResult = array(
                "type" => "success",
                "message" => "<i class='fas fa-check mr-2'></i> El producto <b>".$request->post('nombre')."</b> ha sido actualizado exitosamente"
            );
        }else{
            $messageResult = array(
                "type" => "warning",
                "message" => "<i class='fas fa-exclamation-triangle mr-2'></i> No se ha podido actualizar el producto debido que el codigo <b>".$request->post('codigo')."</b> ya esta siendo utilizado"
            );
        }

        return redirect("/products/".$id."/edit")->with('messageResult', $messageResult);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();

        $messageResult = array(
            "type" => "danger",
            "message" => "<i class='fas fa-trash mr-2'></i> El producto <b>".$product->name."</b> ha sido eliminado exitosamente"
        );

        return redirect("/products")->with('messageResult', $messageResult);
    }
}
