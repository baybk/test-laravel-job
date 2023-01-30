<?php

namespace App\Services\Web\Recommended;

use App\Services\Action;
use Carbon\Carbon;

class GetRecommendedPageInfoAction extends Action
{
    protected $repository;

    public function __construct()
    {

    }

    public function run($data)
    {
        try {
            $dayNow = Carbon::now();
            $dayNowFormat = $dayNow->format('m/d');

            $filterData = [
                'limit' => 8
            ];
            $rdata = resolve(ListRecommendedAction::class)->run($filterData);

            $data = [
                "recommended_list" => $rdata,
            ];

            return $data;
        } catch (\Exception $e) {
            throw $e;
        }
    }
}