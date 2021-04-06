<?php

namespace App\Http\Controllers\Admin;

use App\Models\Customer;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class CustomerController extends AdminBaseController
{
    /**
     * AdminController constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        parent::__construct($request);
        $this->current_controller = __("Customers");
        view()->share('controller_name', $this->current_controller);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $data = Customer::orderBy('id', 'desc')->paginate(10);

        return view('admin.customers.index',['items'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $shops=Shop::all();
        return view('admin.customers.create',compact('shops'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'email'=>'nullable|unique:customers,email',
            'phone'=>'nullable|regex:/(01)[0-9]{9}/|unique:customers,phone',
            'first_name'=> 'required',
            'last_name' => 'required',
        ]);
        $request_data=Arr::except($request->all(), ['_token']);
        $request_data['created_by']=auth()->guard('admin')->user()->id;
        $item = Customer::create($request_data);
        $item->save();

        return redirect()->route('customers.index')->with('success', __('Customer has been added successfully'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Customer $customer
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Customer $customer)
    {
        $shops=Shop::all();

        return view('admin.customers.edit', compact('customer','shops'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Customer $customer
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Customer $customer)
    {
        $request->validate([
            'email'=>'nullable|unique:customers,email,'.$customer->id,
            'phone'=>'nullable||regex:/(01)[0-9]{9}/|unique:customers,phone,'.$customer->id,
            'first_name'=> 'required',
            'last_name' => 'required',
        ]);
        $customer->update($request->except('id'));
        $customer->updated_by=auth()->guard('admin')->user()->id;
        $customer->save();

        return redirect()->route('customers.index')->with('success', __('Customer has been updated successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Customer $customer
     * @return \Illuminate\Http\RedirectResponse
     */
    public
    function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect()->route('customers.index')->with('success', __('Customer has been deleted successfully'));
    }



}
