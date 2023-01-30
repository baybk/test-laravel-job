<?php

namespace App\Http\Controllers\Web;

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
        $rdata =  $this->sendSuccessWithoutMessage($rdata, 200, true);
        $data = $rdata['data'];
        // dd($data);
        return view('recommended', compact('data'));
    }
}
