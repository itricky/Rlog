<?php

namespace App\Http\Controllers;

use App\Models\userInfo;
use App\Models\userJobInfo;
use Illuminate\Http\Request;
use App\Models\userAutobiography;

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
        $userInfo_resault = userInfo::where('id','1')->first();
        $date['userInfo_resault']= $userInfo_resault ?? NULL;
        $userJobInfo_resault = userJobInfo::where('id','1')->first();
        $date['userJobInfo_resault'] = $userJobInfo_resault ?? NULL;
        $date['userAutobiography_resault'] = userAutobiography::where('id',1)->where('user_id',1)->first();

        return  view('home',$date);
    }


    public function homeSubmit(Request $request)
    {

        $check_userInfo = userInfo::where('id',1)->first();
        $userInfo_sub_data=[];
        $userInfo_sub_data['name']=$request->name;
        $userInfo_sub_data['phone']=$request->phone;
        $userInfo_sub_data['address']=$request->address;
        $userInfo_sub_data['description']=$request->description;
        $check_userInfo = userInfo::where('id',1)->update($userInfo_sub_data);

        $check_userJobInfo= userJobInfo::where('id',1)->where('user_id',1)->first();
        $userjobinfo_sub_data['company_name'] = $request->company_name ?? null;
        $userjobinfo_sub_data['job_title'] = $request->job_title ?? null;
        $userjobinfo_sub_data['job_start_day']=$request->job_start_day ?? null;
        $userjobinfo_sub_data['job_end_day']=$request->job_end_day ?? null;
        $userjobinfo_sub_data['job_status']=($request->job_status == 'on') ? 'y' : 'n';
        $userjobinfo_sub_data['job_description']=$request->job_description ?? null;
        userJobInfo::where('id',1)->where('user_id',1)->update($userjobinfo_sub_data);
        $user_autobiography_sub_data['autobiography'] = $request->autobiography;
        userAutobiography::where('id',1)->where('user_id',1)->update($user_autobiography_sub_data);


        return back()->withInput();
    }
}
