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

    /** 
        * @OA\Get( 
            * path="/api/recommended",
            * summary="Get list recommended",
            * operationId="ListRecommended",
            * tags={"recommended"},
            
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
        $rdata = resolve(GetRecommendedPageInfoAction::class)->run([]);
        return $this->sendSuccessWithoutMessage($rdata, 200);
    }
}
