<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Compra;
use App\Models\Venta;
use App\Models\Producto;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Calcular las métricas
        $totalVentas = Venta::sum('total');
        $totalCompras = Compra::sum('total');
        $productosCount = Producto::count();
        $usuariosCount = User::count();

        // Obtener los productos recientes
        $productosRecientes = Producto::orderBy('created_at', 'desc')->take(5)->get();

        // Obtener los 5 vendedores con más ventas
        $topVendedores = User::select('users.id', 'users.name', DB::raw('SUM(ventas.total) as total_ventas'))
            ->join('ventas', 'ventas.usuario_id', '=', 'users.id')
            ->groupBy('users.id', 'users.name')
            ->orderBy('total_ventas', 'desc')
            ->take(5)
            ->get();

        return view('dashboard.index', compact('totalVentas', 'totalCompras', 'productosCount', 'usuariosCount', 'productosRecientes', 'topVendedores'));
    }
}
