@extends('layouts.app')

@section('title', 'Campaign Delivery Validation')

@section('content')

<div class="container-contact100">
    <div class="wrap-contact100">
        <form class="contact100-form validate-form" method="POST" action="/">

            {{csrf_field()}}

            <span class="contact100-form-title">GetAd</span>
            <div class="wrap-input100 input100-select">
                <span class="label-input100">Choose Operator</span>
                <div>
                    <select class="selection-2" name="service">
                        <option value="android">Android</option>
                        <option value="kaios">KaiOS</option>
                        <option value="ios">iOS</option>
                    </select>
                </div>
                <span class="focus-input100"></span>
            </div>
            <div class="wrap-input100 validate-input" data-validate="Name is required">
                <span class="label-input100">User-Agent</span>
                <input class="input100" type="text" name="ua" placeholder="Enter your name" value="Mozilla/5.0 (Linux; Android 8.0.0; SM-A910F Build/R16NW; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/73.0.3683.90 Mobile Safari/537.36">
                <span class="focus-input100"></span>
            </div>
            <div class="wrap-input100 validate-input" data-validate="Name is required">
                <span class="label-input100">SDK version</span>
                <input class="input100" type="text" name="vr" placeholder="Enter your sdk version" value="A-AN-3.14.20">
                <span class="focus-input100"></span>
            </div>
            <div class="wrap-input100 validate-input" data-validate="Name is required">
                <span class="label-input100">Advertiser ID</span>
                <input class="input100" type="text" name="advid" placeholder="Enter your Advertiser ID">
                <span class="focus-input100"></span>
            </div>
            <div class="wrap-input100 validate-input" data-validate="uid is required">
                <span class="label-input100">BPID</span>
                <input class="input100" type="text" name="uid" placeholder="Enter your user UID">
                <span class="focus-input100"></span>
            </div>
            <div class="wrap-input100 validate-input" data-validate="Name is required">
                <span class="label-input100">Package Name</span>
                <input class="input100" type="text" name="ai" placeholder="Enter app package name">
                <span class="focus-input100"></span>
            </div>
            <div class="wrap-input100 validate-input" data-validate="Name is required">
                <span class="label-input100">ZONE ID</span>
                <input class="input100" type="text" name="zoneid" placeholder="Enter zone id">
                <span class="focus-input100"></span>
            </div>
            <div class="container-contact100-form-btn">
                <div class="wrap-contact100-form-btn">
                    <div class="contact100-form-bgbtn"></div>
                    <button class="contact100-form-btn">
                        <span>GetAd for Me<i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
                        </span>
                    </button>
                </div>
            </div>
        </form>
        <div id="dropDownSelect1"></div>
    </div>
</div>

@endsection