<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class OrderDetail extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $guarded = ['id'];

    protected $fillable = [
        'sale_id',
        'product_id',
        'amount'
    ];

    public function sale(): BelongsTo
    {
        return $this->belongsTo(Sale::class);
    }
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
