<?php

namespace App\Services\Web\TopPage;

use App\Filters\FreewordNameFilter;
use App\Models\Meal;
use App\Models\User;
use App\Packages\Papagroup\L8core\Src\Criteria\FilterCriteria;
use App\Packages\Papagroup\L8core\Src\Criteria\OrderCriteria;
use App\Packages\Papagroup\L8core\Src\Criteria\WithRelationsCriteria;
use App\Repositories\UserRepository;
use App\Services\Action;
use App\Services\Web\Meal\ListMealAction;
use Carbon\Carbon;

class GetIndexInfoAction extends Action
{
    protected $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($data)
    {
        try {
            $dayNow = Carbon::now()->toDateString();
            $filterData = [
                'datetime_at' => $dayNow
            ];
            $mealsData = resolve(ListMealAction::class)->run($filterData);
            return $mealsData;
        } catch (\Exception $e) {
            throw $e;
        }
    }

    private function allowFilters()
    {
        return [
            'name' => FreewordNameFilter::class,
        ];
    }

    private function allowOrderableFields()
    {
        return [
            'id',
            'name',
            'created_at'
        ];
    }
}