<?php
/**
 * Created by PhpStorm.
 * User: yomna.m
 * Date: 3/25/2019
 * Time: 12:48 PM
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
// use anlutro\LaravelSettings\Facade as Setting;

class AdminBaseController extends Controller
{
    protected $default_image = '';
    protected $uploads_path = '';
    protected $info_uploads_path = '';
    protected $admin_uploads_path = '';
    protected $current_controller = '';
    protected $current_action = '';
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

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
