<?php

namespace App\Http\Controllers\Admin;

use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ShopController extends AdminBaseController
{

    /**
     * AdminController constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        parent::__construct($request);
        $this->current_controller = "Shops";
        view()->share('controller_name', $this->current_controller);
        $this->uploads_path = 'shops/logos';
    }
    /**

     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $data=Shop::paginate(10);

        return view('admin.shops.index',['items'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.shops.create');
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
            'email'=>'unique:shops,email',
            'name'=> 'required',
        ]);
        $request_data=Arr::except($request->all(), ['_token','logo']);

        if ($request->hasFile('logo') && $request->file('logo')->isValid()) {

            request()->validate([
                'logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:min_width=100,min_height=100',
            ]);
            $imageName = time().'.'.request()->logo->getClientOriginalExtension();
            $logo=request()->file('logo');
            Storage::disk('public')->put($this->uploads_path.'/'.$imageName,  File::get($logo));
            $request_data['logo']=$imageName;
        }
        $request_data['created_by']=auth()->guard('admin')->user()->id;
        $shop = Shop::create($request_data);
        $shop->save();

        return redirect()->route('shops.index')->with('success', __('Shop has been added successfully'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Shop $shop
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Shop $shop)
    {
        return view('admin.shops.edit',['item'=>$shop]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Shop $shop
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'email'=>'unique:shops,email,'.$id,
            'name'=> 'required',
        ]);
        $request_data=Arr::except($request->all(), ['_token','logo','_method']);
        $shop = Shop::Find($id);

        if ($request->hasFile('logo') && $request->file('logo')->isValid()) {
            request()->validate([
                'logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:min_width=100,min_height=100',
            ]);
            $imageName = time().'.'.request()->logo->getClientOriginalExtension();
            $logo=request()->file('logo');
            Storage::disk('public')->put($this->uploads_path.'/'.$imageName,  File::get($logo));
            //delete old logo
            if(File::exists('storage/shops/logos/'.$shop->logo)) File::delete('storage/shops/logos/'.$shop->logo);
            $request_data['logo']=$imageName;
        }

        $request_data['updated_by']=auth()->guard('admin')->user()->id;
        $shop->update($request_data);
        return redirect()->route('shops.index')->with('success', __('Shop has been updated successfully'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Shop $shop
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public
    function destroy(Shop $shop)
    {
        $shop->delete();
        return redirect()->route('shops.index')->with('success', __('Shop has been deleted successfully'));
    }


}
