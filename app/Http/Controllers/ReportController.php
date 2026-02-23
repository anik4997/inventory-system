<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $from = $request->from;
        $to = $request->to;

        $sales = Sale::when($from && $to, function($q) use ($from,$to){
            return $q->whereBetween('created_at',[$from,$to]);
        })->get();

        $totalSell = $sales->sum('total_amount');
        $totalExpense = 0;

        return view('report',compact('sales','totalSell','totalExpense'));
    }
}
