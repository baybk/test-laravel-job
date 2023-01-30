<?php

namespace App\Services\Web\DiaryRecord;

use App\Filters\DateTimeAtFilter;
use App\Filters\FreewordNameFilter;
use App\Filters\TypeFilter;
use App\Filters\UserIdFilter;
use App\Http\Resources\DiaryRecordResource;
use App\Packages\Papagroup\L8core\Src\Criteria\FilterCriteria;
use App\Packages\Papagroup\L8core\Src\Criteria\OrderCriteria;
use App\Packages\Papagroup\L8core\Src\Criteria\WithRelationsCriteria;
use App\Repositories\DiaryRecordRepository;
use App\Services\Action;

class ListDiaryAction extends Action
{
    protected $repository;

    public function __construct(DiaryRecordRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($data)
    {
        try {
            $order = $data['sort'] ?? '-id';
            $with = $data['with'] ?? '';

            $this->repository
                ->pushCriteria(new WithRelationsCriteria($with, $this->repository->allowRelations()))
                ->pushCriteria(new FilterCriteria($data, $this->allowFilters()))
                ->pushCriteria(new OrderCriteria($order, $this->allowOrderableFields()));
            $meals = !empty($data['limit'])
                ? $this->repository->paginate($data['limit'])
                : $this->repository->all();
            $meals = DiaryRecordResource::collection($meals)->toArray(null);
            
            return $meals;
        } catch (\Exception $e) {
            throw $e;
        }
    }

    private function allowFilters()
    {
        return [
            'user_id' => UserIdFilter::class,
            'datetime_at' => DateTimeAtFilter::class,
            'type' => TypeFilter::class,
            'diary' => FreewordNameFilter::class,
        ];
    }

    private function allowOrderableFields()
    {
        return [
            'id',
            'user_id',
            'datetime_at',
            'type'
        ];
    }
}