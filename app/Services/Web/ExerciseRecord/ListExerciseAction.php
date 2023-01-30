<?php

namespace App\Services\Web\ExerciseRecord;

use App\Filters\DateTimeAtFilter;
use App\Filters\FreewordNameFilter;
use App\Filters\TypeFilter;
use App\Filters\UserIdFilter;
use App\Http\Resources\ExerciseRecordResource;
use App\Packages\Papagroup\L8core\Src\Criteria\FilterCriteria;
use App\Packages\Papagroup\L8core\Src\Criteria\OrderCriteria;
use App\Packages\Papagroup\L8core\Src\Criteria\WithRelationsCriteria;
use App\Repositories\ExerciseRecordRepository;
use App\Services\Action;

class ListExerciseAction extends Action
{
    protected $repository;

    public function __construct(ExerciseRecordRepository $repository)
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
            $records = !empty($data['limit'])
                ? $this->repository->paginate($data['limit'])
                : $this->repository->all();
            $records = ExerciseRecordResource::collection($records)->toArray(null);
            
            return $records;
        } catch (\Exception $e) {
            throw $e;
        }
    }

    private function allowFilters()
    {
        return [
            'user_id' => UserIdFilter::class,
            'date_at' => DateTimeAtFilter::class,
            'type' => TypeFilter::class,
            'name' => FreewordNameFilter::class,
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