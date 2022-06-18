@extends('layouts.default')
@section('content')
<div class="login">
    <div class="login_card">
        <div class="login_header">
            <p class="login_ttl">Registration</p>
        </div>
        <form action="/register" method="post" class="login_content">
            @csrf
            <li>
                <ul class="login_validation">
                    @if ($errors->has('name'))
                    {{$errors->first('name')}}
                    @endif
                </ul>
                <ul class="login_input">
                    <img src="{{ asset('image/person.png')}}" class="login_icn" alt="icn">
                    <input type="text" class="login_input_item" placeholder="Username" name="name">
                </ul>
                <ul class="login_validation">
                    @if ($errors->has('email'))
                    {{$errors->first('email')}}
                    @endif
                </ul>
                <ul class="login_input">
                    <img src="{{ asset('image/mail.png')}}" class="login_icn" alt="icn">
                    <input type="text" class="login_input_item" placeholder="Email" name="email">
                </ul>
                <ul class="login_validation">
                    @if ($errors->has('password'))
                    {{$errors->first('password')}}
                    @endif
                </ul>
                <ul class="login_input">
                    <img src="{{ asset('image/key.png')}}" class="login_icn" alt="icn">
                    <input type="text" class="login_input_item" placeholder="Password" name="password">
                </ul>
            </li>
            <div class="login_btn">
                <input type="submit" class="login_btn_item" value="登録">
            </div>
        </form>
    </div>
</div>
@endsection