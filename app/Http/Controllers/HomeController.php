<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $maorVentaVendedor = Order::q();
        $ventaTotalDia=Order::r();
        $CantidadPedidosDia=Order::p();
        $CantidadEntregasDia=Order::x();
        $MontoTotalVentasMes=Order::y();
        $CantidadProductosEntregados=Order::z();
        $CantidadProductosNoEntregados=Order::a();
        $CantidadProductosDevueltos=Order::b();

        return view('home', compact('maorVentaVendedor', 'ventaTotalDia', 'CantidadPedidosDia','CantidadEntregasDia','MontoTotalVentasMes','CantidadProductosEntregados','CantidadProductosNoEntregados','CantidadProductosDevueltos'));
    }
}
