<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Sale extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $guarded = ['id'];

    protected $fillable = [
        'amount',
        'nameProduct',
        'price',
        'id_salesRecord'
    ];

    public function salesRecord(): BelongsTo
    {
        return $this->belongsTo(SalesRecord::class);
    }
}
