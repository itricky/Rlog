@extends('layouts.layout')

@section('title', '首頁')

@section('content')
{{-- @php
    dd($userInfo_resault->name);
@endphp --}}
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
    hr{
        border: 1px solid #8E44AD;
    }
</style>

{{-- <div class="container-fluid" style="min-height: 1024px; margin-top: 50px; background-color: rgb(176, 176, 176)"> --}}
<div class="container-fluid" style="min-height: 1024px; min-width:650px; margin-top: 25px; ">
    <div class="d-flex justify-content-center">
        {{-- <div class="w-75 p-3" style="background-color: #eee;"> --}}
            <div class="container w-75 p-3">
                <div class="card shadow-lg p-3 mb-5 bg-white rounded" style="mix-width: 100%;">

                    {{-- 自介紹 --}}
                    <div class="row g-0"  style="background-color: rgb(179, 168, 168);">
                        <div class="container text-center">
                            <div class="row">
                                <div class="col-md-4">
                                    <img class="image" src="{{ asset('/images/IMG_001.jpg') }}" alt="大頭照">
                                </div>

                                <div class="col">
                                    <p style="margin-top: 50px;">
                                        <h1>
                                            <i class="bi bi-heart-pulse-fill"></i>&nbsp;
                                            {{ $userInfo_resault->name }}
                                        </h1>
                                        <p style=" text-align:left;  margin-left: 50px;">
                                            姓名：{{ $userInfo_resault->name }}
                                        </p>

                                        <p style=" text-align:left;  margin-left: 50px;">
                                            電話：{{ $userInfo_resault->phone }}
                                        </p>

                                        <p style=" text-align:left;  margin-left: 50px;">
                                            地址：{{ $userInfo_resault->address }}
                                        </p>
                                        <textarea style="height:100px; max-width:85%; width:100%;" readonly>
進步只是不想退步
                                        </textarea>

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
                        <small class="text-muted">With faded secondary text</small>
                    </h3>
                    <div class="row g-0 carStyle" style="background-color: rgb(226, 225, 225);">
                        <div class="container">
                            <blockquote>
                                <p style="float:right;  text-align:right;">2017/06 - 在職中</p>
                                <p>
                                    公司名稱: 台盈資訊科技有限公司
                                    <br>
                                    職稱：   IT人員                 <br>
                                </p>

                                工作內容：<br>
<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" style="resize:none; height:200px;"  onkeyup="autogrow(this);" readonly>
1. 公司系統維運( Linux_CentOS or Ubuntu or Debian、NAS、VMware ESXi、Proxmox、windows)
2. 網站架設LAMP( Linux + Apache + MySQL + PHP ) 及 維運
3. 機房維運
4. 使用 Bash、PHP、Mysql、Bat 處理各項維運程式(如備份)
5. GCP雲服務
</textarea>
                            </blockquote>
                        </div>
                    </div>
                    <hr>

                    {{-- 自傳 --}}
                    <h3>
                        簡歷
                        <small class="text-muted">With faded secondary text</small>
                    </h3>
                    <div class="row g-0 carStyle"  style="background-color: rgb(226, 225, 225)">
                        <div class="container text-center">
                            <blockquote>
<textarea class="form-control" id="exampleFormControlTextarea1"
            rows="3" style="resize:none; height:900px; overflow-y:hidden "
                onkeyup="autogrow(this);" readonly>

    您好，我是鄭勝元，畢業於 玄奘大學 資訊管理學系

    大學期間，只有在服務業打工過，在完全沒有經驗的情況下，有幸畢業後找到人生第一間資訊產業公司工作

    當時的我，沒有任何實物經驗
    對程式、系統環境、設備到機房，一竅不通的我，有幸進到公司，開始了程式學習之路

    在第一份工作上
        第一次接觸到除了windows以外的系統 CentOS Linux
        撰寫Shell Script自動化腳本，定期備份定期執行程式
        幫客戶處理網路環境
        架設實體網路VPN(公司機房及異地機房VPN)
        以及大大小小的3C設備的問題

    第二份工作上，開始管理網站及設備相關工作
        管理AWS雲服務伺服器
        架設RD開發或正式環境，LAMP(Linux + Apache + MySQL + PHP)
        管理私人機房＆IDC機房(中華電信、四方電信)

    現在工作上，開始精進有關程式方面的工作
        工作環境使用Ubuntu Linux Desktop
        撰寫 Shell Script自動化部屬程式
        撰寫 PHP MySQL 備份程式
        架設 Docker Gitea
        管理 VMware ESXi Proxmox
        管理 GCP 雲服務

    下班後，會接一些案子
    幫客戶處理架設環境，比如 GoDaddy VPS 架設LAMP環境，安裝SSL等...
    處理客戶網站所需要的PHP套件及功能設定

    經過這些年 部署系統 及 維運方面的工作，讓我開始對程式方面有很大的興趣
    思考未來工作及職涯方向，決定朝工程師方向前進，開始買課程買書，下班後自修精進

    目前下班時間，會上 Udemy 看 Ken Cen課程，及閱讀天龍書局購買PHP Mysql相關書籍
    每個月固定參加後端工程師讀書會，除了自學以外，會請教朋友學習上的問題，多磨練自己理解能力

    我的作品 『 購物車系統 』
    GitHub : https://github.com/itricky/Portfolio
</textarea>
                            </blockquote>
                        </div>
                    </div>
                    <hr>

                    {{-- 技能點數 --}}
                    <h3>
                        專業技能
                        <small class="text-muted">With faded secondary text</small>
                    </h3>
                    <div class="row g-0 carStyle"  style="background-color: rgb(226, 225, 225)">
                        <div class="container">
<blockquote>
<textarea class="form-control" id="exampleFormControlTextarea1"
    rows="3" style="resize:none; height:150px; overflow-y:hidden "
        onkeyup="autogrow(this);" readonly>
一、程式
PHP 、 MySQL 、 HTML 、 CSS 、 Javascript 、 JQuery 、 Ajax
二、系統環境
LAMP ( Linux + Apache + MySQL + PHP )
HTTP、HTTPS、SSL、Docker、Git、Linux ( Ubuntu CentOS )
</textarea>
</blockquote>
                        </div>
                    </div>
                    <hr>
                </div>
            </div>
        {{-- </div> --}}
    </div>
</div>

<script type="text/javascript">

function autogrow(textarea){
    var adjustedHeight=textarea.clientHeight;

    adjustedHeight=Math.max(textarea.scrollHeight,adjustedHeight);
    if (adjustedHeight>textarea.clientHeight){
        textarea.style.height=adjustedHeight+'px';
    }
}
</script>
@endsection
