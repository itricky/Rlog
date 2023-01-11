<?php

namespace App\Http\Controllers;

use App\Models\userAutobiography;
use App\Models\userInfo;
use App\Models\userJobInfo;
use App\Models\userSkill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $date = [];
        $user_resault = Auth::user();
        if (!is_null($user_resault)) {
            $userID = $user_resault->id;
            $userInfo_resault = userInfo::where('id', $userID)->first();
            $date['userInfo_resault'] = $userInfo_resault ?? null;
            $userJobInfo_resault = userJobInfo::where('id', $userID)->first();
            $date['userJobInfo_resault'] = $userJobInfo_resault ?? null;
            $date['userAutobiography_resault'] = userAutobiography::where('user_id', $userID)->first();
            $date['userSkill_resault'] = userSkill::where('user_id', $userID)->first();
            $date['login'] = 'y';
        }
        return view('home', $date);
    }

    public function homeSubmit(Request $request)
    {

        // 判斷是否登入
        $user_resault = Auth::user();
        if (is_null($user_resault)) {
            return redirect()->route('login');
        }

        $userID = $user_resault->id;
        $check_userInfo = userInfo::where('id', $userID)->first();
        $userInfo_sub_data = [];
        $userInfo_sub_data['name'] = $request->name;
        $userInfo_sub_data['phone'] = $request->phone;
        $userInfo_sub_data['address'] = $request->address;
        $userInfo_sub_data['description'] = $request->description;
        $check_userInfo = userInfo::where('user_id', $userID)->update($userInfo_sub_data);

        $check_userJobInfo = userJobInfo::where('user_id', $userID)->first();
        $userjobinfo_sub_data['company_name'] = $request->company_name ?? null;
        $userjobinfo_sub_data['job_title'] = $request->job_title ?? null;
        $userjobinfo_sub_data['job_start_day'] = $request->job_start_day ?? null;
        $userjobinfo_sub_data['job_end_day'] = $request->job_end_day ?? null;
        $userjobinfo_sub_data['job_status'] = ($request->job_status == 'on') ? 'y' : 'n';
        $userjobinfo_sub_data['job_description'] = $request->job_description ?? null;
        userJobInfo::where('user_id', $userID)->update($userjobinfo_sub_data);

        $user_autobiography_sub_data['autobiography'] = $request->autobiography;
        userAutobiography::where('user_id', $userID)->update($user_autobiography_sub_data);

        $user_skill_sub_data['skill'] = $request->skill;
        userSkill::where('user_id', $userID)->update($user_skill_sub_data);

        return back()->withInput();
    }
}
