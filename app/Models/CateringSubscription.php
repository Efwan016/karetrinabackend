<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CateringSubscription extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'booking_trx_id',
        'name',
        'photo',
        'phone',
        'email',
        'city',
        'delivery_time',
        'proof',
        'post_code',
        'notes',
        'address',
        'total_amount',
        'price',
        'duration',
        'quantity',
        'total_tax_amount',
        'is_paid',
        'started_at',
        'ended_at',
        'catering_package_id',
        'catering_tier_id',
    ];

    protected $casts = [
        'started_at' => 'date',
        'ended_at' => 'date',
    ];

    public static function generateUniqueTrxId()
    {
        $prefix = 'FLOWADZ';
        do {
            $randomString = $prefix . mt_rand(1000, 9999);
        } while (self::where('booking_trx_id', $randomString)->exists());

        return $randomString;
    }

    public function cateringPackage(): BelongsTo
    {
        return $this->belongsTo(CateringPackage::class, 'catering_package_id');
    }

    public function cateringTier(): BelongsTo
    {
        return $this->belongsTo(CateringTier::class, 'catering_tier_id');
    }
}
