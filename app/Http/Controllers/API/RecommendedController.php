<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Services\Web\Recommended\GetRecommendedPageInfoAction;
use Illuminate\Http\Request;

class RecommendedController extends Controller
{
    public function __construct()
    {
        
    }

    public function index(Request $request)
    {
        $rdata = resolve(GetRecommendedPageInfoAction::class)->run([]);
        return $this->sendSuccessWithoutMessage($rdata, 200);
    }
}
