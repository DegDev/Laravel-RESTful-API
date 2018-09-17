<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'type' => 'user',
            'id'   => $this->id,
            'attributes' => [
                'email'      => $this->email,
                'first_name' => $this->first_name,
                'last_name'  => $this->last_name,
                'active'     => (bool) $this->state,
                'state'      => $this->getState(),
                'created_at' => (string) $this->created_at,
            ],
            'relationship' => [
                'group' => [
                    'data' => [
                        'type' => 'group',
                        'id'   => $this->group_id,
                        'name' => $this->userGroup->name
                    ]
                ]
            ]
        ];
    }
}

