<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Chart;
use Illuminate\Support\Facades\DB;


class ChartJSController extends Controller
{
    public function index()
    {
        $order = Order::select(DB::raw("total_price as price"), DB::raw("DAY(created_at) as month_name"))
                    ->whereYear('created_at', date('Y'))
                    ->groupBy(DB::raw("month_name"), DB::raw("id"))
                    ->orderBy('id','ASC')
                    ->pluck('price', 'month_name');
 
        $labels = $order->keys();
        $data = $order->values();
              
        return view('admin.chart.index', compact('labels', 'data'));
    }
}