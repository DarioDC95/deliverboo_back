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
        $order = Order::select(DB::raw("SUM(total_price) as price"), DB::raw("DATE_FORMAT(created_at, '%Y-%M-%D, %H') as date_name"))
                    // ->whereYear('created_at', date('Y'))
                    ->groupBy(DB::raw("date_name"), DB::raw("restaurant_id"))
                    ->orderBy('date_name','ASC')
                    ->pluck('price', 'date_name');

        $labels = $order->keys();
        $data = $order->values();

        // dd($order);

        return view('admin.chart.index', compact('labels', 'data'));
    }
}
