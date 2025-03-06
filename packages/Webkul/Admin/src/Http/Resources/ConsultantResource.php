<?php

namespace Webkul\Admin\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ConsultantResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'                => $this->id,
            'first_name'        => $this->first_name,
            'last_name'         => $this->last_name,
            'title'             => $this->title,
            'phone'             => $this->phone,
            'email'             => $this->email,
            'tjm'               => $this->tjm,
            'cjm'               => $this->cjm,
            'created_at'        => $this->created_at,
            'updated_at'        => $this->updated_at,
        ];
    }
}
