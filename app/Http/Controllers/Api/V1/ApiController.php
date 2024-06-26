<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;

class ApiController extends Controller
{
  public function include(string $resource): bool
  {
    $param = request()->get('include');

    if (is_null($param)) {
      return false;
    }

    $includes = explode(',', strtolower($param));

    return in_array( strtolower($resource), $includes );
  }
}
