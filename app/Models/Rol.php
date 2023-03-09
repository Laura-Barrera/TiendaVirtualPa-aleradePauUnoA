<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Rol extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $fillable = [
        'description'
    ];

    protected $hidden = [
        'id'
    ];

    public function User(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
