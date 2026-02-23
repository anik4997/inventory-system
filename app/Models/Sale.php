<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = ['product_id','quantity','unit_price','discount','vat_percent','vat_amount','total_amount','paid_amount','due_amount'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
