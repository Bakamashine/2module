<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Storage;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "payment_status" => $this->status,
            "course" => [
                "id" => $this->course->id,
                "name" => $this->course->name,
                "description" => $this->course->description,
                "hours" => $this->course->duration,
                "img" => Storage::disk("public")->url($this->course->image),
                "start_date" => $this->course->start,
                "end_date" => $this->course->end,
                "price" => $this->course->price
            ]
        ];
    }
}
