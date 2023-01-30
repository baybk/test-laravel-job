<?php

namespace App\Http\Controllers\Web;

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
        $user = $request->user();
        $rdata = resolve(GetIndexInfoAction::class)->run($user->id, []);
        $rdata =  $this->sendSuccessWithoutMessage($rdata, 200, true);
        $data = $rdata['data'];
        // dd($data);
        return view('toppage', compact('data'));
    }
}
