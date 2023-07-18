<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function upload(Request $request)
    {
        $path = $request->file('image')->store('public/images');
        $url = Storage::url($path);

        return response()->json(['location' => $url]);
    }
}

