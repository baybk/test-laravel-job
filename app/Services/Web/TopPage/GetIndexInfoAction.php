<?php

namespace App\Services\Web\TopPage;

use App\Repositories\UserRepository;
use App\Services\Action;
use App\Services\Web\Meal\ListMealAction;
use Carbon\Carbon;

class GetIndexInfoAction extends Action
{
    protected $repository;

    public function __construct()
    {

    }

    public function run($userId, $data)
    {
        try {
            $dayNow = Carbon::now();

            $filterDataInDay = [
                'datetime_at' => $dayNow->toDateString(),
                'user_id' => $userId
            ];
            $mealsDataInDay = resolve(ListMealAction::class)->run($filterDataInDay);
            $percentage = 0;
            if (count($mealsDataInDay) > 4) {
                $percentage = 100;
            } else {
                $percentage = count($mealsDataInDay) * 25;
            }

            $filterData = [
                'user_id' => $userId,
                'limit' => 8
            ];
            $mealsData = resolve(ListMealAction::class)->run($filterData);

            $dayNowFormat = $dayNow->format('m/d');
            $data = [
                "day_now" => $dayNowFormat,
                "day_now_percentage" => $percentage,
                "meals_data" => $mealsData
            ];

            return $data;
        } catch (\Exception $e) {
            throw $e;
        }
    }
}