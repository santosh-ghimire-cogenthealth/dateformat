<?php

namespace App\Http\Middleware ;

use Closure;
use Illuminate\Http\Request;

class localEnvironment
{
    public function handle(Request $reqest, Closure $next, $param = null)
    {
        dd($param);
    }
}
