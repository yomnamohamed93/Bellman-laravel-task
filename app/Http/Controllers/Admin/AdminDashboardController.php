<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

class AdminDashboardController extends AdminBaseController
{

    public function __construct(Request $request)
    {
        parent::__construct($request);
        $this->current_controller = "Dashboard";
        view()->share('controller_name', $this->current_controller);
    }

    public function index(Request $request)
    {
        return view('admin.dashboard', []);
    }
}
