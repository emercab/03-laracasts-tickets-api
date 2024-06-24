<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\StoreTicketRequest;
use App\Http\Requests\Api\V1\UpdateTicketRequest;
use App\Http\Resources\V1\TicketResource;
use App\Models\Ticket;

class TicketController extends Controller
{
  public function index()
  {
    return TicketResource::collection( Ticket::paginate() );
  }


  public function store(StoreTicketRequest $request)
  {
    //
  }


  public function show(Ticket $ticket)
  {
    return new TicketResource($ticket);
  }


  public function update(UpdateTicketRequest $request, Ticket $ticket)
  {
    //
  }


  public function destroy(Ticket $ticket)
  {
    //
  }
}
