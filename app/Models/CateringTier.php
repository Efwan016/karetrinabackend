<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CateringTier extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'photo',
        'tagline',
        'quantity',
        'price',
        'duration',
        'catering_package_id',
    ];

    public function benefits(): HasMany
    {
        return $this->hasMany(TierBenefit::class);
    }

    public function cateringPackage(): BelongsTo
    {
        return $this->belongsTo(cateringPackage::class, 'catering_package_id');
    }
}
