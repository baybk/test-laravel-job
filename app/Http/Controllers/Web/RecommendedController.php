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
        $user = $request->user();
        $rdata = resolve(GetRecommendedPageInfoAction::class)->run($user->id, []);
        $rdata =  $this->sendSuccessWithoutMessage($rdata, 200, true);
        $data = $rdata['data'];
        // dd($data);
        return view('recommended', compact('data'));
    }
}
