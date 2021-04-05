<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;

class AdminController extends AdminBaseController
{

    /**
     * AdminController constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        parent::__construct($request);
        $this->current_controller = "Admins";
        view()->share('controller_name', $this->current_controller);
        $this->uploads_path = '/assets/images/admins/';
    }
    /**

     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $data=Admin::where("super_admin",0)->paginate(10);

        return view('admin.admins.index',['items'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.admins.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'email'=>'required|unique:admins,email',
            'name'=> 'required',
            'password' => 'required',
        ]);
        if(!empty($request->password))$request->merge(['password' => Hash::make($request->password)]);
        $request_data=Arr::except($request->all(), ['_token','confirm_password']);
        $request_data['created_by']=auth()->guard('admin')->user()->id;
        $admin = Admin::create($request_data);
        $admin->save();

        return redirect()->route('admins.index')->with('success', __('Administrator has been added successfully'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Admin $admin
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Admin $admin)
    {
        return view('admin.admins.edit',['item'=>$admin]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Admin $admin
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'email'=>'required|unique:admins,email,'.$id,
            'name'=> 'required',
        ]);
        $request_data=Arr::except($request->all(), ['_token','confirm_password','_method','password']);
        if(!empty($request->password))$request_data['password'] = Hash::make($request->password);
        $request_data['updated_by']=auth()->guard('admin')->user()->id;
        $admin = Admin::Find($id);
        $admin->update($request_data);
        return redirect()->route('admins.index')->with('success', __('Administrator has been updated successfully'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Admin $admin
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public
    function destroy(Admin $admin)
    {
        $admin->delete();
        return redirect()->route('admins.index')->with('success', __('Administrator has been deleted successfully'));
    }

    private function image($request)
    {
        if (!is_dir(public_path() . $this->uploads_path)) {
            mkdir(public_path() . $this->uploads_path, 755, true);
        }

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            request()->validate([
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $imageName = time() . '.' . request()->image->getClientOriginalExtension();
            request()->image->move(public_path() . $this->uploads_path, $imageName);
            return $imageName;
        }
    }


}
