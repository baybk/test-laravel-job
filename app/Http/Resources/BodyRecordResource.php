<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class BodyRecordResource extends JsonResource
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
        $month_at_formatted = Carbon::createFromTimeString($this->date_at . " 00:00:00")->format('m.Y');
        $result['month_at_formatted'] = $month_at_formatted;
        return $result;
    }
}
