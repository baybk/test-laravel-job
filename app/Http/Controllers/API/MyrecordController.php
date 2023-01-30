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


    /** 
        * @OA\Get( 
            * path="/api/myrecord",
            * summary="Get data for My Record Page",
            * operationId="My Record Page Api",
            * tags={"my-record"},
            * security={{"sanctum":{}}},
                        
            * @OA\Response(
                * response=200,
                * description="Success response",
                * @OA\JsonContent( 
                    * @OA\Property(property="success", type="boolean", example=true),
                    * @OA\Property(property="message", type="string", example=""),
                    * @OA\Property(property="status_code", type="integer", example=200),
                    * @OA\Property(property="data", type="object", example={
                        
                    * }) 
                * )
            * ) 
        * ) 
    */
    public function index(Request $request)
    {
        $user = auth('api')->user();
        $rdata = resolve(GetMyRecordPageInfoAction::class)->run($user->id, []);
        return $this->sendSuccessWithoutMessage($rdata, 200);
    }
}
