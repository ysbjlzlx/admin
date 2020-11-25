@extends('admin.layouts.app')

@section('content')
    <div class="ui basic segment">

    </div>
    <div class="ui three column grid container">
        <div class="right floated column">
            <form class="ui form segment @if($errors->any()) error @endif" method="post" action="{{ route('admin.login') }}">
                @csrf
                <div class="field">
                    <label for="email">邮箱</label>
                    <input id="email" type="text" name="email" placeholder="邮箱" value="{{ old('email') }}">
                </div>
                <div class="field">
                    <label for="password">密码</label>
                    <input id="password" type="password" name="password" placeholder="密码" value="{{old('password')}}">
                </div>
                <div class="field">
                    <label for="otp">二次验证</label>
                    <input id="otp" type="number" name="otp" placeholder="二次验证码" value="">
                </div>
                <button class="ui button" type="submit">登录</button>
                @if ($errors->any())
                    <div class="ui error message">
                        <ul class="list">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </form>
        </div>
    </div>


@endsection
