<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
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
        return view('order.index')->with('Orders',$order);
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
        $products = Product::all();
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
}
