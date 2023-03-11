<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
    public function sales(): HasMany
    {
        return $this->hasMany(Sales::class);
    }
}
