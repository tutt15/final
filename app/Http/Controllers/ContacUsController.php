<?php

namespace App\Http\Controllers;

use App\ProductType;
use Illuminate\Http\Request;

class ContacUsController extends Controller
{
    public function contactUS()
    {
    	$type_home    = ProductType::all(); 
        return view('customer.page.contact', compact('type_home'));
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function contactUSPost(Request $request)
    {
        $this->validate($request, [
                'name'    => 'required',
                'email'   => 'required|email',
                'message' => 'required'
        	]);


        ContactUS::create($request->all());


        return back()->with('success', 'Thanks for contacting us!');
    }
}
