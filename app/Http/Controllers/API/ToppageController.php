<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Services\Web\TopPage\GetIndexInfoAction;
use Illuminate\Http\Request;

class ToppageController extends Controller
{
    public function __construct()
    {
        
    }

    public function index(Request $request)
    {
        $user = auth('api')->user();
        $rdata = resolve(GetIndexInfoAction::class)->run($user->id, []);
        return $this->sendSuccessWithoutMessage($rdata, 200);
    }
}
