<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Services\Web\MyRecordpage\GetMyRecordPageInfoAction;
use Illuminate\Http\Request;

class MyrecordController extends Controller
{
    public function __construct()
    {
        
    }

    public function index(Request $request)
    {
        $user = auth('api')->user();
        $rdata = resolve(GetMyRecordPageInfoAction::class)->run($user->id, []);
        return $this->sendSuccessWithoutMessage($rdata, 200);
    }
}
