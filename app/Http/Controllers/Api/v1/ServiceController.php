<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\ServiceResource;
use App\Http\Resources\ServiceResourceCollection;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $data = Service::with(['category', 'variants'])->whereHas('category')->paginate(5);
        return ServiceResource::collection($data);
    }
}
