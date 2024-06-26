<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\Api\V1\StoreuserRequest;
use App\Http\Requests\Api\V1\UpdateuserRequest;
use App\Http\Resources\V1\UserResource;
use App\Models\User;

class UserController extends ApiController
{
  public function index()
  {
    if ($this->include('tickets')) {
      return UserResource::collection( User::with('tickets')->paginate() );
    }

    return UserResource::collection( User::paginate() );
  }


  public function store(StoreuserRequest $request)
  {
    //
  }


  public function show(user $user)
  {
    if ($this->include('tickets')) {
      return new UserResource( $user->load('tickets') );
    }

    return new UserResource( $user );
  }


  public function update(UpdateuserRequest $request, user $user)
  {
    //
  }


  public function destroy(user $user)
  {
    //
  }
}
