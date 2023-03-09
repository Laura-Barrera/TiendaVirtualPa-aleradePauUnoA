<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $guarded = ['id'];

    protected $fillable = [
        'name',
        'description',
        'price',
        'stockAmount',
        'referenceNumber',
        'iva',
        'image',
        'category_id',
        'id_salesRecord'
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
    public function salesRecord(): BelongsTo
    {
        return $this->belongsTo(SalesRecord::class);
    }
}
