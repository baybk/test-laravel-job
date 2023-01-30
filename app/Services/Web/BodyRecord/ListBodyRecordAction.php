<?php

namespace App\Services\Web\BodyRecord;

use App\Filters\DateAtFilter;
use App\Filters\UserIdFilter;
use App\Http\Resources\BodyRecordResource;
use App\Packages\Papagroup\L8core\Src\Criteria\FilterCriteria;
use App\Packages\Papagroup\L8core\Src\Criteria\OrderCriteria;
use App\Packages\Papagroup\L8core\Src\Criteria\WithRelationsCriteria;
use App\Repositories\BodyRecordRepository;
use App\Services\Action;

class ListBodyRecordAction extends Action
{
    protected $repository;

    public function __construct(BodyRecordRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($userId, $data)
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
            $records = BodyRecordResource::collection($records)->toArray(null);
            
            return $records;
        } catch (\Exception $e) {
            throw $e;
        }
    }

    private function allowFilters()
    {
        return [
            'user_id' => UserIdFilter::class,
            'date_at' => DateAtFilter::class,
        ];
    }

    private function allowOrderableFields()
    {
        return [
            'id',
            'user_id',
            'date_at',
        ];
    }
}