<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Kitchen extends Model
{
    Use HasFactory, SoftDeletes;
    protected $fillable = [
        'name',
        'year',
        'photo',
    ];

    public function cateringPackages(): HasMany
    {
        return $this->hasMany(cateringPackages::class);
    }
}
