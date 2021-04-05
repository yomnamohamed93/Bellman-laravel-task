<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends AdminBaseController
{
    /**
     * AdminController constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        parent::__construct($request);
        $this->current_controller = __("Users");
        view()->share('controller_name', $this->current_controller);
        $this->uploads_path = '/assets/images/users/';
    }

    public function ajaxList(Request $request)
    {
        DB::enableQueryLog();

        $data = User::query();
        $searchValue = $request->search["value"]; // Search value
        $searchValue = $this->is_arabic_text($searchValue) ? $searchValue : strtolower($searchValue);
        if (!empty($searchValue)) {
            $data->whereRaw(" LOWER(name) like '%" . ($searchValue) . "%' ")
                ->orWhere('id', 'like', '%' . $searchValue . '%');
        }
        $draw = $request->get('draw');
        $start = $request->get('start');
        $length = $request->get('length');
        $filtered_items = $data->count();
        if ($length > 0) $data->limit($length)->offset($start);
        $data = $data->orderBy('id', 'desc')->get();
//        dd(DB::getQueryLog());
        $columnIndex = $request->order[0]['column']; // Column index
        $columnSortOrder = $request->order[0]['dir'];; // ASC or DESC
        $columnName = $request->columns[$columnIndex]['data'];; // Search value
        if ($columnName == 'created_at_date') $columnName = 'created_at';
        foreach ($data as $key => $item) {
            $item->name = $item->first_name . ' ' . $item->last_name;
            $item->email = $item->email;
            $item->phone = $item->phone;
            $item->created_at_date = date("d/m/Y", strtotime($item->created_at));

            $item->actions = $this->action($item);
            $item->select_cell = '<input type="checkbox" name="select_all" value="' . $item->id . '" class="group-cell-checkbox users-checkbox">';

        }

        $total_items = User::query()->whereRole(['user'])->count(); // get your total no of data;
        $data_arr = ($columnSortOrder == 'desc') ? $data->sortBy($columnName) : $data->sortBy($columnName, SORT_REGULAR, true);
        $result = array(
            'draw' => intval($draw),
            'recordsTotal' => $total_items,
            'recordsFiltered' => $filtered_items,
            'data' => ($data_arr->values()),
        );

        echo json_encode($result);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $data = User::orderBy('id', 'desc')->paginate();
        foreach ($data as $key => $item) {
            $item->created_at_date = date("d/m/Y", strtotime($item->created_at));
        }
            return view('admin.users.index',['items'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'email'=>'required|unique:users,email',
            'phone'=>'required|unique:users,phone',
            'first_name'=> 'required',
            'last_name' => 'required',
            'password' => 'required',
        ]);
        $request->merge(['password' => Hash::make($request->password)]);
        $request_data=array_except($request->all(), ['_token','confirm_password']);
        $request_data['created_by']=auth()->guard('admin')->user()->id;
        $request_data['verification_code'] = rand(1000, 9999);
        $imageName='';
        if ($request->hasFile('avatar') && $request->file('avatar')->isValid()) {
            request()->validate([
                'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $imageName = time().'.'.request()->avatar->getClientOriginalExtension();
            request()->avatar->move(public_path() .$this->uploads_path, $imageName);
        }
        $request_data['avatar']=$imageName;
        $admin = User::create($request_data);
        $admin->save();

        return redirect()->route('users.index')->with('success', __('User has been added successfully'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(User $user)
    {
        $user->avatar_url=!empty($user->avatar)?asset($this->uploads_path.$user->avatar):"";

        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'email'=>'required|unique:users,email,'.$user->id,
            'phone'=>'required|unique:users,phone,'.$user->id,
            'first_name'=> 'required',
            'last_name' => 'required',
        ]);
        $user->update($request->except('id'));
        $user->updated_by=auth()->guard('admin')->user()->id;
        $imageName='';
        if ($request->hasFile('avatar') && $request->file('avatar')->isValid()) {
            request()->validate([
                'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $imageName = time().'.'.request()->avatar->getClientOriginalExtension();
            request()->avatar->move(public_path() .$this->uploads_path, $imageName);
        }
        if(!empty($imageName)){
            if(File::exists('assets/images/users/'.$user->avatar)) File::delete('assets/images/users/'.$user->avatar);
            $user->avatar=$imageName;
        }
        $user->save();

        return redirect()->route('users.index')->with('success', __('User has been updated successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public
    function destroy(User $user)
    {
//        if ($user->avatar) {
//            $image_path = public_path() . $this->uploads_path . $user->avatar;
//            unlink($image_path);
//        }
        $user->delete();
        if($user->appliedEvents()->count()>0)$user->appliedEvents()->delete();
        if($user->favouriteEvents()->count()>0)$user->favouriteEvents()->delete();

        return redirect()->route('users.index')->with('success', __('User has been deleted successfully'));
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

    private function action($item)
    {
        if (auth()->guard('admin')->user()->hasPermission('update_users')) {
            $edit = '<a href="' . route("users.edit", $item->id) . '" class="text-info mx-2" style=\'\'>
                  <i class="fas fa-pencil-alt"></i>
              </a>';
        } else {
            $edit = '<a class="text-info mx-2 disabled" style=\'\'>
                  <i class="fas fa-pencil-alt"></i>
              </a>';
        }
        if (auth()->guard('admin')->user()->hasPermission('delete_users')) {
            $delete = '<form class="delete_form" action="' . route("users.destroy", $item->id) . '" method="post">
                  <input type="hidden" name="_token" value="' . csrf_token() . '" >
                  ' . method_field("DELETE") . '
                  <button class="delete_btn btn btn-sm text-danger" type="button"><i class="fas fa-trash-alt"></i></button>
              </form>';
        } else {
            $delete = '<a class="text-danger mx-2 disabled" style=\'\'>
                  <i class="fas fa-trash-alt"></i>
              </a>';
        }
        $action = '<div class="row mx-auto">
              ' . $edit . '
              ' . $delete . '
          </div>';
        return $action;
    }

    public function deleteImage(User $user)
    {
        $image_path = public_path() . $this->uploads_path . $user->avatar;
        if(File::exists($image_path)) File::delete($image_path);

//        unlink($image_path);
        $user->avatar = null;
        $user->save();
        return response()->json(['status' => 'success']);
    }
    public function check_user_unique(Request $request){
        $existing_items= User::query();

        if($request->has('item_id') && !empty($request->item_id)){
            $existing_items->where('id','!=',$request->item_id);
        }
        $existing_items=$existing_items->get(['email','phone'])->toArray();
        $existing_phones_arr=$existing_emails_arr=array();
        foreach ($existing_items as $item){
            $existing_phones_arr[]=$item['phone'];
            $existing_emails_arr[]=$item['email'];
        }
//        dd($existing_emails_arr,$existing_phones_arr);
        $phone_exists=(in_array($request->phone,$existing_phones_arr))?TRUE:FALSE;
        $email_exists=(in_array($request->email,$existing_emails_arr))?TRUE:FALSE;
        if($email_exists && $phone_exists){
            return "email_phone";
        }elseif($email_exists && !$phone_exists){
            return "email";
        }elseif(!$email_exists && $phone_exists){
            return "phone";
        }else{
            return 'valid';
        }
    }
}
