<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
  public function toArray(Request $request): array
  {
    return [
      'type' => 'user',
      'id' => $this->id,
      'atributes' => [
        'name' => $this->name,
        'email' => $this->email,
        // Conditional fields if the route is users.*
        $this->mergeWhen( $request->routeIs('users.*'), [
          'emailVerifiedAt' => $this->email_verified_at,
          'createdAt' => $this->created_at,
          'updatedAt' => $this->updated_at,
        ]),
      ],
      'included' => TicketResource::collection($this->whenLoaded('tickets')),
      'links' => [
        'self' => route('users.show', ['user' => $this->id]),
      ],
    ];
  }
}
