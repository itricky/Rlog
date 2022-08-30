<?php

namespace App\Http\Controllers;

use App\Models\userInfo;
use Illuminate\Http\Request;

class home extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $userInfo_resault =userInfo::where('id','1')->first();
        $date['userInfo_resault']= $userInfo_resault ?? NULL;

        return  view('home',$date);
    }
}
