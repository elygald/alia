<?php

namespace App\Http\Controllers;

use App\Lead;
use App\Order;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $leadCount = Lead::count();
        $orderCount = Order::count();
        $amountSum = DB::table('orders')
                ->select(DB::raw('SUM(amount) as total_sales'))
                ->where('status', 1)
                ->first()
                ->total_sales;

    	return view('dashboard', [
            'leadCount' => $leadCount,
            'orderCount' => $orderCount,
            'amountSum' => number_format($amountSum, 2, ',', '.')
        ]);
    }
}
