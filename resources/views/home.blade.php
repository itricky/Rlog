@extends('layouts.layout')

@section('title', '首頁')

@section('content')
    <style type="text/css">
        .image {
            margin-top: 50px;
            width: 230px;
            height: 250px;
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
                <form action="{{ url('home') }}" method="POST" enctype="multipart/form-data" id="frmProduct">
                    <div class="card shadow-lg p-3 mb-5 bg-white rounded" style="mix-width: 100%;">
                        @csrf
                        {{-- 自介紹 --}}
                        <div class="row g-0" style="background-color: rgb(179, 168, 168);">
                            <div class="container text-center">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="mb-1 row">
                                            @if (isset($userInfo_resault->headshot) &&
                                                    $userInfo_resault->headshot &&
                                                    is_file(public_path('/images/' . $userInfo_resault->headshot)))
                                                <img style="margin: 25% 25% 0 25%; " class="image"
                                                    src="{{ asset('/images/' . $userInfo_resault->headshot) }}"
                                                    alt="大頭照">
                                                <br>
                                            @endif
                                        </div>
                                        <div class="mb-1 row col-sm-9">
                                            <input
                                                style="margin-top: {{ isset($userInfo_resault->name) ? '1em' : '9.4em' }}; margin-left: 6.9em; width: 200px;"
                                                accept="image/*" name="headshot" class="form-control form-control-sm"
                                                id="headshot" type="file" @disabled(!isset($userInfo_resault->name))>
                                        </div>
                                        <div style="visibility:hidden" class="toSubmit">
                                            <input type="submit" class="aa">
                                        </div>
                                    </div>

                                    {{-- <div class="col">

                                        <p style=" margin-top: 50px; ">
                                        <h1>
                                            <i class="bi bi-heart-pulse-fill"></i>&nbsp;
                                            {{ $userInfo_resault->name ?? '' }}
                                        </h1>
                                        </p>

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
                                                style="width: 60%" value="{{ $userInfo_resault->address ?? '' }}">
                                        </p>

                                        <textarea id="description" name="description" cols="40" rows="5"
                                            style="height:80px; max-width:85%; width:80%; resize:none;">{{ $userInfo_resault->description ?? '' }}</textarea>

                                    </div> --}}

                                    <div class="col">
                                        <div class="mb-1 row" style=" margin-top: 50px; ">
                                            <h1>
                                                <i class="bi bi-heart-pulse-fill"></i>&nbsp;
                                                {{ $userInfo_resault->name ?? '' }}
                                            </h1>
                                        </div>

                                        <div class="mb-2 row">
                                            <label for="name" class="col-sm-2 col-form-label">姓名</label>
                                            <div class="col-sm-3">
                                                <input type="text" readonly="" class="form-control" id="name"
                                                    name="name" value="{{ $userInfo_resault->name ?? '' }}">
                                            </div>
                                        </div>

                                        <div class="mb-2 row">
                                            <label for="phone" class="col-sm-2 col-form-label">電話</label>
                                            <div class="col-sm-3">
                                                <input type="text" readonly="" class="form-control" id="phone"
                                                    name="phone" value="{{ $userInfo_resault->phone ?? '' }}">
                                            </div>
                                        </div>

                                        <div class="mb-2 row">
                                            <label for="phone" class="col-sm-2 col-form-label">地址</label>
                                            <div class="col-sm-5">
                                                <input type="text" readonly="" class="form-control" id="address"
                                                    name="address" value="{{ $userInfo_resault->address ?? '' }}">
                                            </div>
                                        </div>

                                        <div class="mb-1 row">
                                            <label for="description" class="col-sm-2 col-form-label"></label>
                                            <div class="col-sm-7">
                                                <textarea class="form-control" id="description" name="description" rows="3">{{ $userInfo_resault->description ?? '' }}</textarea>
                                            </div>
                                        </div>
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
                                            {{ $userJobInfo_resault->job_start_day ?? '' }}
                                            @if (isset($userJobInfo_resault) && $userJobInfo_resault->job_status == 'y')
                                                ~ {{ date('Y-m-d') }}
                                            @elseif (isset($userJobInfo_resault->job_end_day))
                                                ~ {{ $userJobInfo_resault->job_end_day }}
                                            @endif
                                        </div>
                                    </div><br>

                                    <div class="mb-4 row">
                                        <label for="company_name" class="col-sm-1 col-form-label">公司名稱</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" id="company_name" name="company_name"
                                                value="{{ $userJobInfo_resault->company_name ?? '' }}">
                                        </div>
                                    </div>

                                    <div class="mb-2 row">
                                        <label for="job_title" class="col-sm-1 col-form-label">職稱</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" id="job_title" name="job_title"
                                                value="{{ $userJobInfo_resault->job_title ?? '' }}">
                                        </div>
                                    </div>

                                    <label for="job_start_day" class="col-sm-1 col-form-label">在職時間</label>
                                    <div class="input-group mb-3">
                                        <input type="date" name="job_start_day" class="form-control"
                                            placeholder="Username" aria-label="Username"
                                            value="{{ $userJobInfo_resault->job_start_day ?? '' }}">
                                        <span class="input-group-text"> ~ </span>
                                        <input type="date" name="job_end_day" class="form-control"
                                            placeholder="Server" aria-label="Server"
                                            value="{{ $userJobInfo_resault->job_end_day ?? '' }}">
                                    </div>

                                    <div class="input-group mb-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="job_status"
                                                name="job_status"
                                                {{ isset($userJobInfo_resault) && $userJobInfo_resault->job_status == 'y' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="gridCheck">
                                                在職中
                                            </label>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="job_description" class="form-label">工作內容</label>
                                        <textarea class="form-control text-capitalize" id="job_description" name="job_description" rows="7">{{ $userJobInfo_resault->job_description ?? '' }}</textarea>
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
                                        style="resize:none; height:150px; overflow-y:hidden">{{ $userSkill_resault->skill ?? '' }}</textarea>
                                </blockquote>
                            </div>
                        </div>
                        <hr>
                    </div>

                    @isset($login)
                        <input type="button" class="btn btn-outline-success" value="送出" onclick="subAlert()">
                    @endisset

                </form>
            </div>
        </div>
    </div>

@push('scripts')
    <script type="text/javascript" src="{{ asset('js/home.js') }}"></script>
@endpush

@endsection

