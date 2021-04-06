<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminBaseController extends Controller
{
    protected $default_image = '';
    protected $uploads_path = '';
    protected $current_controller = '';
    protected $current_action = '';

    public function __construct(Request $request)
    {
        $this->middleware(function ($request, $next) {
            $logged_admin = auth()->guard('admin')->user();
            //get controller name
            $routeArray = app('request')->route()->getAction();
            $controllerAction = class_basename($routeArray['controller']);
            list($controller, $action) = explode('@', $controllerAction);
            view()->share('controller', $controller);
            view()->share('action', $action);
            $this->current_controller = $controller;
            $this->current_action = $action;
            return $next($request);

        });
    }


}
