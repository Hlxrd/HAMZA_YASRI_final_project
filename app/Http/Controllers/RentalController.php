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
        ;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // dd($request);
        // dd($request);
        // dd($request);
        request()->validate([
            "title" => "required",
            "property_type" => "required",
            "price" => "required",
            "condition" => "required",
            "description" => "required",
            "imgs" => ["max:2048, required, mimes:png,jpg,jpeg", "required"],
            // "user_id" => "required"

        ]);
        // dd($request);

        // $image = $request->file();
        // dd($image); 
        // $imageName = time() . "_" . $image->getClientOriginalName();
        // $image->storeAs("public/imgs", $imageName);

        // $userId = auth()->user()->id ;
        //* multiple image



        $auth = auth()->user();
        // dd($auth);


        // $images = $request->file(`imgs`);
        // // dd($images);

        //     $imageName = time() . "_" . $images->getClientOriginalName();
        //     $images->storeAs("public/img", $imageName);
        // dump($imageName);
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

        return redirect()->back();
        dd($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(Rental $rental)
    {
        //
        $rentals = Rental::all();
        return view('rentals.rentals', compact('rentals'));
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
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rental $rental)
    {
        //
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
