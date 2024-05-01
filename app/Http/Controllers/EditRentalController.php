<?php

namespace App\Http\Controllers;

use App\Models\Rental;
use Illuminate\Http\Request;

class EditRentalController extends Controller
{
    //
    public function index(){
        $$rental = Rental::find($id);
        return view('editRental' ,compact('rental'));
    }
}
