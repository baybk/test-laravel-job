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

    /** 
        * @OA\Get( 
            * path="/api/toppage",
            * summary="Get data for Top page",
            * operationId="Toppage Api",
            * tags={"top-page"},
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
        $rdata = resolve(GetIndexInfoAction::class)->run($user->id, []);
        return $this->sendSuccessWithoutMessage($rdata, 200);
    }
}
