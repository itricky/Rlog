@extends('layouts.layout')

@section('title', '首頁')

@section('content')
    <style type="text/css">
        .image {
            margin-top: 50px;
            width: 200px;
            height: 240px;
            border-radius: 20px;
        }

        blockquote {
            margin: 1em;
            padding: .5em;
            border-left: 5px solid #d2ccb4;
            /* border-left-style: groove; */
            background-color: #f6ebc1;
            border-radius: 10px;
        }

        blockquote p {
            margin: 0;
        }

        .carStyle {
            border-radius: 10px;
        }

        hr {
            border: 1px solid #8E44AD;
        }
    </style>

    <div class="container-fluid" style="min-height: 1024px; min-width:300px; margin-top: 25px; ">
        <div class="d-flex justify-content-center">
            <div class="container w-80 p-3">
                <form action="{{ url('home') }}" method="post">
                    <div class="card shadow-lg p-3 mb-5 bg-white rounded" style="mix-width: 100%;">
                        @csrf
                        {{-- 自介紹 --}}
                        <div class="row g-0" style="background-color: rgb(179, 168, 168);">
                            <div class="container text-center">
                                <div class="row">
                                    <div class="col-md-4">
                                        <img class="image" src="{{ asset('/images/IMG_001.jpg') }}" alt="大頭照">
                                    </div>
                                    <div class="col">
                                        <p style="margin-top: 50px;">
                                        <h1>
                                            <i class="bi bi-heart-pulse-fill"></i>&nbsp;
                                            {{ $userInfo_resault->name ?? '' }}
                                        </h1>
                                        <p style=" text-align:left; margin-left: 50px;">
                                            <span>姓名： </span><input type="text" id="name" name="name"
                                                value="{{ $userInfo_resault->name ?? '' }}">
                                        </p>
                                        <p style=" text-align:left; margin-left: 50px;">
                                            <span>電話： </span><input type="text" id="phone" name="phone"
                                                value="{{ $userInfo_resault->phone ?? '' }}">
                                        </p>
                                        <p style=" text-align:left; margin-left: 50px;">
                                            <span>地址：</span><input type="text" id="address" name="address"
                                                style="width: 70%" value="{{ $userInfo_resault->address ?? '' }}">
                                        </p>
                                        <textarea id="description" name="description" cols="40" rows="5"
                                            style="height:80px; max-width:85%; width:80%; resize:none;">{{ $userInfo_resault->description ?? '' }}</textarea>
                                        </p>
                                    </div>
                                </div>
                                <br><br>
                            </div>
                        </div>
                        <hr>

                        {{-- 工作經歷 --}}
                        <h3>
                            工作經歷
                            <small class="text-muted">_Work Experience</small>
                        </h3>
                        <br>
                        <div class="row g-0 carStyle" style="background-color: rgb(226, 225, 225);">
                            <div class="container">
                                <blockquote>
                                    <div class="position-relative">
                                        <div class="position-absolute top-0 end-0">
                                            {{ $userJobInfo_resault->job_start_day }}
                                            @if ($userJobInfo_resault->job_start_day && $userJobInfo_resault->job_end_day)
                                                ~
                                            @endif
                                            {{ $userJobInfo_resault->job_end_day }}
                                            {{ $userJobInfo_resault->job_status == 'y' ? '在職中' : '' }}
                                        </div>
                                    </div><br>

                                    <div class="mb-4 row">
                                        <label for="company_name" class="col-sm-1 col-form-label">公司名稱</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" id="company_name" name="company_name"
                                                value="{{ $userJobInfo_resault->company_name }}">
                                        </div>
                                    </div>

                                    <div class="mb-2 row">
                                        <label for="job_title" class="col-sm-1 col-form-label">職稱</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" id="job_title" name="job_title"
                                                value="{{ $userJobInfo_resault->job_title }}">
                                        </div>
                                    </div>

                                    <label for="job_start_day" class="col-sm-1 col-form-label">在職時間</label>
                                    <div class="input-group mb-3">
                                        <input type="date" name="job_start_day" class="form-control"
                                            placeholder="Username" aria-label="Username"
                                            value="{{ $userJobInfo_resault->job_start_day }}">
                                        <span class="input-group-text"> ~ </span>
                                        <input type="date" name="job_end_day" class="form-control" placeholder="Server"
                                            aria-label="Server" value="{{ $userJobInfo_resault->job_end_day }}">
                                    </div>

                                    <div class="input-group mb-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="job_status"
                                                name="job_status"
                                                {{ $userJobInfo_resault->job_status == 'y' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="gridCheck">
                                                在職中
                                            </label>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="job_description" class="form-label">工作內容</label>
                                        <textarea class="form-control text-capitalize" id="job_description" name="job_description" rows="7">{{ $userJobInfo_resault->job_description }}</textarea>
                                    </div>

                                </blockquote>
                            </div>
                        </div>
                        <hr>

                        {{-- 自傳 --}}
                        <h3>
                            自傳
                            <small class="text-muted">_autobiography</small>
                        </h3>
                        <div class="row g-0 carStyle" style="background-color: rgb(226, 225, 225)">
                            <div class="container text-center">
                                <blockquote>
                                    <textarea class="form-control" id="autobiography" name="autobiography" rows="35" style="">{{ $userAutobiography_resault->autobiography ?? '' }}
                            </textarea>
                                </blockquote>
                            </div>
                        </div>
                        <hr>

                        {{-- 技能點數 --}}
                        <h3>
                            專業技能
                            <small class="text-muted">_Professional Skill</small>
                        </h3>
                        <div class="row g-0 carStyle" style="background-color: rgb(226, 225, 225)">
                            <div class="container">
                                <blockquote>
                                    <textarea class="form-control" id="skill" name="skill" rows="3"
                                        style="resize:none; height:150px; overflow-y:hidden">{{ $userSkill_resault->skill ?? ""}}</textarea>
                                </blockquote>
                            </div>
                        </div>
                        <hr>
                    </div>
                    <input type="submit" class="btn btn-outline-success" value="送出">
                </form>
            </div>
        </div>
    </div>

    <script></script>
@endsection
