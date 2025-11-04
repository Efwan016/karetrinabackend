<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\CateringPackageApiResource;
use App\Models\CateringPackage;
use Illuminate\Http\Request;

class CateringPackageController extends Controller
{
    public function index()
    {
        $cateringPackages = CateringPackage::with(['city', 'category', 'tiers', 'tiers.benefits'])->get();
        return CateringPackageApiResource::collection($cateringPackages);
    }

    public function show(CateringPackage $cateringPackage)
    {
        $cateringPackage->load(['city', 'bonuses',  'category', 'kitchen', 'testimonials', 'tiers', 'tiers.benefits']);

        $cateringPackage->kitchen->loadCount('cateringPackages');

        return new CateringPackageApiResource($cateringPackage);
    }
}
