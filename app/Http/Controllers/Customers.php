<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customertable;

class Customers extends Controller
{
    public function index()
    {
        $title = "Create Customer";
        $url = url('/humair');
        return view('customer', compact('url', 'title'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'gender' => 'required|in:male,female,other',
            'address' => 'required|string',
            'country' => 'required|string',
        ]);

        $genderMap = [
            'male' => 'M',
            'female' => 'F',
            'other' => 'O'
        ];

        $customer = new Customertable;
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->gender = $genderMap[$request->gender];
        $customer->address = $request->address;
        $customer->country = $request->country;
        $customer->save();

        return redirect('/humair/view');
    }

    public function view(Request $request)
    {
        $search = $request->input('search');

        $query = Customertable::query();

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%$search%")
                  ->orWhere('email', 'like', "%$search%");
            });
        }

        $customers = $query->paginate(10);

        return view('customer-view', compact('customers', 'search'));
    }

    public function trash()
    {
        $customers = Customertable::onlyTrashed()->get();
        return view('customer-trash', compact('customers'));
    }

    public function delete($id)
    {
        Customertable::find($id)->delete();
        return redirect()->back();
    }

    public function forceDelete($id)
    {
        Customertable::withTrashed()->find($id)->forceDelete();
        return redirect()->back();
    }

    public function restore($id)
    {
        Customertable::withTrashed()->find($id)->restore();
        return redirect()->back();
    }

    public function edit($id)
    {
        $customer = Customertable::find($id);
        $title = "Update Customer";
        $url = url('/humair/update/' . $id);
        return view('customer', compact('customer', 'url', 'title'));
    }

    public function update($id, Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'gender' => 'required|in:male,female,other',
            'address' => 'required|string',
            'country' => 'required|string',
        ]);

        $genderMap = [
            'male' => 'M',
            'female' => 'F',
            'other' => 'O'
        ];

        $customer = Customertable::find($id);
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->gender = $genderMap[$request->gender];
        $customer->address = $request->address;
        $customer->country = $request->country;
        $customer->save();

        return redirect('/humair/view');
    }
}
