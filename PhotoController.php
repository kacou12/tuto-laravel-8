<?php

namespace App\Http\Controllers;

use App\Http\Requests\PhotoRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage as Storage;

class PhotoController extends Controller
{
    //
    public function create (){
        return view('photo');
    }
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'image|dimensions:min_width=100,min_height=100'
        ]);
        $image = time().'.'.$request->image->extension();

        $request->image->move(storage_path(), $image);

        //$image = Image::create(["image_name" => $image]);
        return view('welcome');

    }
  
}