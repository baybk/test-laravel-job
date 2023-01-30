<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class DiaryRecordResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $result = parent::toArray($request);

        $datetime_at_formatted = Carbon::createFromTimeString($this->datetime_at)->format('d.m.Y H:i');

        $result['datetime_at_formatted'] = $datetime_at_formatted;
        $split_arr = explode(" ", $datetime_at_formatted);
        $result['date_at_formatted'] = $split_arr[0];
        $result['time_at_formatted'] = $split_arr[1];

        return $result;
    }
}
