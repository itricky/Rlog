<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\userAutobiography;
use App\Models\userInfo;
use App\Models\userJobInfo;
use App\Models\userSkill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        DB::enableQueryLog();
        $userData = User::find($userID)->with('userInfo')->with('userJobInfo')->with('userAutobiography')->first();

        // dd(
        //     DB::getQueryLog(),
        //     $userData->userInfo->first()->id,
        //     $userData->userJobInfo->first()->id,
        //     $userData->userAutobiography->first()->id,
        // );

        if($request->hasFile('headshot')){
            $salt = random_bytes(10);
            $imageName = bin2hex($salt).'.'.$request->headshot->extension();
            $request->headshot->move(public_path('images'), $imageName);
            $userInfo_sub_data['headshot'] = $imageName;
        }

        $userInfo_sub_data['name'] = $request->name;
        $userInfo_sub_data['phone'] = $request->phone;
        $userInfo_sub_data['address'] = $request->address;
        $userInfo_sub_data['description'] = $request->description;

        if (is_null($userData->userInfo)) {
            userInfo::create($userInfo_sub_data);
        } else {
            userInfo::where('user_id', $userData->userInfo->first()->id)->update($userInfo_sub_data);
        }

        $userjobinfo_sub_data['company_name'] = $request->company_name ?? null;
        $userjobinfo_sub_data['job_title'] = $request->job_title ?? null;
        $userjobinfo_sub_data['job_start_day'] = $request->job_start_day ?? null;
        $userjobinfo_sub_data['job_end_day'] = $request->job_end_day ?? null;
        $userjobinfo_sub_data['job_status'] = ($request->job_status == 'on') ? 'y' : 'n';
        $userjobinfo_sub_data['job_description'] = $request->job_description ?? null;

        if (is_null($userData->userJobInfo)) {
            userJobInfo::create($userInfo_sub_data);
        } else {
            userJobInfo::where('id', $userData->userJobInfo->first()->id)->update($userjobinfo_sub_data);
        }

        $user_autobiography_sub_data['autobiography'] = $request->autobiography;

        if (is_null($userData->userAutobiography)) {
            userAutobiography::create($user_autobiography_sub_data);
        } else {
            userAutobiography::where('id', $userData->userAutobiography->first()->id)->update($user_autobiography_sub_data);
        }

        $user_skill_sub_data['skill'] = $request->skill;
        if (is_null($userData->userSkill)) {
            userSkill::create($user_skill_sub_data);
        } else {
            userSkill::where('id', $userData->userSkill->first()->id)->update($user_skill_sub_data);
        }
        return back()->withInput();
    }

}
