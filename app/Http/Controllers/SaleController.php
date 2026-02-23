<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Sale;
use App\Models\JournalEntry;

class SaleController extends Controller
{
    public function create()
    {
        $products = Product::all();
        return view('sale',compact('products'));
    }

    public function store(Request $request)
    {
        $product = Product::find($request->product_id);

        $quantity = $request->quantity;
        $unit_price = $product->sell_price;

        $gross = $quantity * $unit_price;
        $after_discount = $gross - $request->discount;

        $vat = ($after_discount * 5) / 100;
        $total = $after_discount + $vat;

        $due = $total - $request->paid_amount;

        $sale = Sale::create([
            'product_id'=>$product->id,
            'quantity'=>$quantity,
            'unit_price'=>$unit_price,
            'discount'=>$request->discount,
            'vat_percent'=>5,
            'vat_amount'=>$vat,
            'total_amount'=>$total,
            'paid_amount'=>$request->paid_amount,
            'due_amount'=>$due
        ]);

        $product->stock -= $quantity;
        $product->save();

        // JOURNAL ENTRIES

        JournalEntry::create([
            'date'=>now(),
            'account_name'=>'Accounts Receivable',
            'debit'=>$total,
            'credit'=>0,
            'reference_type'=>'sale',
            'reference_id'=>$sale->id
        ]);

        JournalEntry::create([
            'date'=>now(),
            'account_name'=>'Sales Revenue',
            'debit'=>0,
            'credit'=>$after_discount,
            'reference_type'=>'sale',
            'reference_id'=>$sale->id
        ]);

        JournalEntry::create([
            'date'=>now(),
            'account_name'=>'VAT Payable',
            'debit'=>0,
            'credit'=>$vat,
            'reference_type'=>'sale',
            'reference_id'=>$sale->id
        ]);

        JournalEntry::create([
            'date'=>now(),
            'account_name'=>'Cash',
            'debit'=>$request->paid_amount,
            'credit'=>0,
            'reference_type'=>'sale',
            'reference_id'=>$sale->id
        ]);

        JournalEntry::create([
            'date'=>now(),
            'account_name'=>'Accounts Receivable',
            'debit'=>0,
            'credit'=>$request->paid_amount,
            'reference_type'=>'sale',
            'reference_id'=>$sale->id
        ]);

        return back();
    }
}
