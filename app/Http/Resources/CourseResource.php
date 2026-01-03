<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Storage;

class CourseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "title" => $this->title,
            "description" => $this->description,
            "hours" => $this->duration,
            "img" => Storage::disk("public")->url($this->image),
            "start_date" => $this->start,
            "end_date" => $this->end,
            "price" => $this->price
        ];
    }
}
