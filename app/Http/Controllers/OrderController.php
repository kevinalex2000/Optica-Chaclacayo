<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Category;
use App\Models\Client;
use App\Models\Product;
use App\Models\Office;
use App\Models\FormCategory;

class OrderController extends Controller
{
    public function index()
    {
        $order = Order::all();
        $clients = Client::all();
        $products = Product::all();
        $office = Office::all();

        return view('order.index')
        ->with('Orders',$order)
        ->with('Clients',$clients)
        ->with('Products',$products)
        ->with('Offices',$office);
    }

    public function select_category()
    {
        $category = Category::all();
        return view('order.select_category')->with('categories',$category);
    }

    public function create($idCategory, $nameCategory)
    {
        $categories = Category::all();
        $clients = Client::all();
        $products = Product::all()->where('id_category', $idCategory);
        $office = Office::all();
        $formCategories = FormCategory::all()->where('id_category', $idCategory);

        $data = array(
            "categories" => $categories,
            "clients" => $clients,
            "products" => $products,
            "offices" => $office,
            "formCategories" => $formCategories,
            "idcategory" => $idCategory,
        );

        return view('order.create')->with('data',$data);
    }

    public function store(Request $request)
    {
        $order = new Order();

        $order->id_client = $request->post('client');
        $order->id_product = $request->post('product');
        $order->id_office = $request->post('office');
        $order->id_user = $request->post('user');
        $order->quantity = $request->post('quantity');
        $order->date_delivered = $request->post('date');
        $order->prepayment = $request->post('precash');
        $order->save();

        $orderDetails = json_decode($request->post('order_details'));

        foreach ($orderDetails as $key => $value){
            $orderDetail = new OrderDetail();
            $orderDetail->id_order = $order->id;
            $orderDetail->id_form_category = $key;
            $orderDetail->value = $value;
            $orderDetail->save();
        }

        $messageResult = array(
            "type" => "success",
            "message" => "<i class='fas fa-check mr-2'></i> El pedido <b>".$order->id."</b> ha sido registrado exitosamente"
        );

        return redirect("/orders")->with('messageResult', $messageResult);
    }

    public function edit($id){
        $order = Order::find($id);

        $idCategory = $order->product->category->id;
        
        $categories = Category::all();
        $clients = Client::all();
        $products = Product::all()->where('id_category', $idCategory);
        $office = Office::all();
        $formCategories = FormCategory::all()->where('id_category', $idCategory);
        $orderDetails = OrderDetail::all()->where('id_order', $order->id);

        return view('order.edit')
        ->with('Order',$order)
        ->with('Clients',$clients)
        ->with('Categories',$categories)
        ->with('Products',$products)
        ->with('Offices',$office)
        ->with('OrderDetails',$orderDetails)
        ->with('FormCategories', $formCategories);
    }

    public function update(Request $request, $id){
        
        $order = Order::find($id);

        $order->id_client = $request->post('client');
        $order->id_office = $request->post('office');
        $order->prepayment = $request->post('precash');
        $order->quantity = $request->post('quantity');
        $order->date_delivered = $request->post('date');

        $order->save();
        
        if($request->post('order_details') != ""){
            $orderDetails = json_decode($request->post('order_details'));
    
            foreach ($orderDetails as $key => $value){
                $orderDetail = OrderDetail::all()
                ->where('id_form_category', $key)
                ->where('id_order', $order->id)->first();
                $orderDetail->value = $value;
                $orderDetail->save();
            }
        }

        $messageResult = array(
            "type" => "success",
            "message" => "<i class='fas fa-check mr-2'></i> El pedido <b>".$order->id."</b> ha sido editada exitosamente"
        );
        return redirect("/orders/edit/".$id)->with('messageResult', $messageResult);
    }

    public function destroy($id){

        $order = Order::find($id);
        $order->delete();

        $messageResult = array(
            "type" => "danger",
            "message" => "<i class='fas fa-trash mr-2'></i> El pedido <b>".$order->id."</b> ha sido eliminado exitosamente"
        );

        return redirect("/orders")->with('messageResult', $messageResult);
    }
}
