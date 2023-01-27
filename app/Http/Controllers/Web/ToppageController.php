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

    public function index()
    {
        $rdata = resolve(GetIndexInfoAction::class)->run([]);
        $data =  $this->sendSuccessWithoutMessage($rdata, 200, true);
        return view('toppage', compact('data'));
    }
}
