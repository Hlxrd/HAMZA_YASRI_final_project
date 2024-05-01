<?php

namespace App\Http\Controllers;

use App\Models\Rental;
use App\Models\User;
use Illuminate\Http\Request;

class RentalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
            //
            
        
    }

    
    public function create()
    {
        //
    }

   
    public function store(Request $request)
    {
        request()->validate([
            "title" => "required",
            "property_type" => "required",
            "price" => "required",
            "condition" => "required",
            "description" => "required",
            "imgs" => ["max:2048, required, mimes:png,jpg,jpeg", "required"],
        ]);
        



        $auth = auth()->user();
// dd($auth->id);

        $image = $request->file("imgs");
        $imageName = time() . "_" . $image->getClientOriginalName();
        $image->storeAs("public/img", $imageName);

        Rental::create([
            "title" => $request->title,
            "property_type" => $request->property_type,
            "price" => $request->price,
            "condition" => $request->condition,
            "description" => $request->description,
            "imgs" => $imageName,
            "user_id" => $auth->id,
        ]);
        
    return back()->with('success', 'you have posted your rental successfully');

        
    }

    /**
     * Display the specified resource.
     */
    public function show(Rental $rental , $id)
    {
        //
        // $rental = Rental::all();

        // $rental = Rental::find($id);
        return view('rentals.rentals', compact('rental'));
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rental $rental)
    {
        //
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rental $rental)
    {
        //
        request()->validate([
            "title" => "required",
            "property_type" => "required",
            "price" => "required",
            "condition" => "required",
            "description" => "required",
            "imgs" => ["max:2048, required, mimes:png,jpg,jpeg", "required"],
            
        ]);
        
        



        $auth = auth()->user();
        
        $image = $request->file("imgs");
        $imageName = time() . "_" . $image->getClientOriginalName();
        $image->storeAs("public/img", $imageName);

        $rental->update([
            "title" => $request->title,
            "property_type" => $request->property_type,
            "price" => $request->price,
            "condition" => $request->condition,
            "description" => $request->description,
            "imgs" => $imageName,
            "user_id" => $auth->id,
        ]);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rental $rental)
    {
        //
        
        $rental->delete();
        return redirect()->back();
    }

    public function userRent()
    {
        return view("User.user");
    }

    // public function search(Request $request)
    // {
    //     $search = $request->input('search');
    //     $results = User::where('name', 'like', "%$search%")->get();
    //     // dd($request->role);

    //     return view('user.user', ['results' => $results]);
    // }
}
