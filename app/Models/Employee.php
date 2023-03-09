<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $guarded = ['id'];

    protected $fillable = [
        'hireDate',
        'user',
        'password'
    ];

    public function person(): HasMany
    {
        return $this->hasMany(Person::class);
    }
}
