<?php

namespace App\Services\Web\BodyRecord;

use App\Services\Action;

class GroupBodyRecordByMonthAction extends Action
{
    public function run($userId, $data)
    {
        try {
            $filter = [
                'user_id' => $userId,
                'sort' => 'date_at'
            ];
            $bodyRecords = resolve(ListBodyRecordAction::class)->run($userId, $filter);
            $bodyRecordsGroup = [];
            $checkedListMonth = [];
            foreach($bodyRecords as $record) {
                if (in_array($record['month_at_formatted'], $checkedListMonth)) {
                    continue;
                }
                $bodyRecordsGroup[] = $record;
                $checkedListMonth[] = $record['month_at_formatted'];
            }
            
            return $bodyRecordsGroup;
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