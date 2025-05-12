<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customertable;

class Customers extends Controller
{
    public function index()
    {
        $title ="create customer";
        $url=url('/humair');
        $data =compact('url','title');
        return view('customer')->with($data);
    }

    public function store(Request $request)
    {
        // Validate the input
        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'gender' => 'required|in:male,female,other',
            'address' => 'required|string',
            'country' => 'required|string',
        ]);

        // Save the data
        $customer = new Customertable;
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->gender = $request->gender;
        $customer->address = $request->address;
        $customer->country = $request->country;
        $genderMap = [
            'male' => 'm',
            'female' => 'f',
        ];
        
        $customer->gender = $genderMap[$request->gender];
        $customer->save();
        return redirect('/humair/view');

        // return redirect('/humair/view')->back()->with('success', 'Customer saved successfully!');
    }
    public function view()
    {
        $customers = Customertable::all();
        // echo "<pre>";
        // return print_r($customers);
        // echo "</pre>";
        // die;
        $data =compact('customers');
        return view('customer-view')->with($data);
    }
    public function trash()
    {
        $customers = Customertable::onlyTrashed()->get();
        $data =compact('customers');
        return view('customer-trash')->with($data);
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
        $title ="Update customer";

            $url= url('/humair/update') . "/". $id;
            $data =compact ('customer','url','title');
            return view('customer')->with($data);
    }
    public function update($id ,Request $request)
    {
        $customer = Customertable::find($id);
        $customer->name = $request['name'];
        $customer->email = $request['email'];
        $customer->gender = $request->gender;
        $customer->address = $request['address'];
        $customer->country = $request['country'];
        $genderMap = [
            'male' => 'M',
            'female' => 'F',
        
        ];
        
        $customer->gender = $genderMap[$request->gender];
        $customer->save();
        return redirect('/humair/view');
        
    }
}
