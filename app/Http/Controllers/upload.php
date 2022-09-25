<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class upload extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        // 照片名稱
        // dd($request->file());
        // dd($request->file);
        // dd($request->file->getClientOriginalName());
        // $imageName = time().'.'.$request->file->extension();
        $imageName = $request->file->getClientOriginalName();
        // dd($request->file->extension());
        // dd($imageName);
        $request->file->move(public_path('images'), $imageName);

        return back();
    }
}
