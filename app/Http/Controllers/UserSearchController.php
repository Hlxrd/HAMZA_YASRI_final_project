<?php

namespace App\Http\Controllers;

use App\Models\Rental;
use App\Models\User;
use Illuminate\Http\Request;

class UserSearchController extends Controller
{
    //
    public function search(Request $request)
{
    $search = $request->input('search');
    $results = Rental::where('name', 'like', "%$search%")->get();

    return view('User.user', compact('results'));
}
}
