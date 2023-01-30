<?php

namespace App\Services\Web\MyRecordpage;

use App\Repositories\UserRepository;
use App\Services\Action;
use App\Services\Web\DiaryRecord\ListDiaryAction;
use App\Services\Web\ExerciseRecord\ListExerciseAction;
use App\Services\Web\Meal\ListMealAction;
use Carbon\Carbon;

class GetMyRecordPageInfoAction extends Action
{
    protected $repository;

    public function __construct()
    {

    }

    public function run($userId, $data)
    {
        try {
            $dayNow = Carbon::now();
            $dayNowFormat = $dayNow->format('m/d');

            $filterExerciseData = [
                'user_id' => $userId,
                'limit' => 8
            ];
            $exercisesData = resolve(ListExerciseAction::class)->run($filterExerciseData);

            $filterDiaryData = [
                'user_id' => $userId,
                'limit' => 8
            ];
            $diariesData = resolve(ListDiaryAction::class)->run($filterDiaryData);

            $data = [
                "day_now" => $dayNowFormat,
                "exercise_list" => $exercisesData,
                "diary_list" => $diariesData
            ];

            return $data;
        } catch (\Exception $e) {
            throw $e;
        }
    }
}