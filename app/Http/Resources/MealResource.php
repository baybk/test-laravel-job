<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

use function PHPSTORM_META\type;

class MealResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $result = [
            'id' => $this->id,
            'type' => $this->type,
            'datetime_at' => $this->datetime_at,
            'user_id' => $this->user_id
        ];

        $type_formatted = '';
        switch ($this->type) {
            case 2:
                $type_formatted = 'Lunch';
                break;
            case 3:
                $type_formatted = 'Dinner';
                break;
            case 4:
                $type_formatted = 'Snack';
                break;
            default:
                $type_formatted = 'Morning';
                break;
        }

        $datetime_at_formatted = Carbon::createFromTimeString($this->datetime_at)->format('m.d');

        $result['type_formatted'] = $type_formatted;
        $result['datetime_at_formatted'] = $datetime_at_formatted;

        return $result;
    }
}
