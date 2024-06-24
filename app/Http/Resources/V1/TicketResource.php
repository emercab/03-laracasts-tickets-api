<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TicketResource extends JsonResource
{
  public function toArray(Request $request): array
  {
    return [
      'type' => 'ticket',
      'id' => $this->id,
      'attributes' => [
        'title' => $this->title,
        'description' => $this->description,
        'status' => $this->status,
        'createdAt' => $this->created_at,
      ],
      'relationships' => [
        'user' => [
          'links' => [
            'self' => route('user', ['ticket' => $this->id]),
            'related' => route('user', ['ticket' => $this->id]),
          ],
          'data' => [
            'type' => 'user',
            'id' => $this->user_id,
          ],
        ],
      
      ],
      'links' => [
        'self' => route('tickets.show', ['ticket' => $this->id]),
      ],
    ];
  }
}
