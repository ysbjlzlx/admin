@extends('layouts.app')

@section('content')
    <div class="ui basic segment">

    </div>
    <form class="ui form segment @if($errors->any()) error @endif" method="post" action="{{route('login')}}">
        @csrf
        <div class="field">
            <label for="email">邮箱</label>
            <input type="text" name="email" placeholder="邮箱" value="{{old('email')}}">
        </div>
        <div class="field">
            <label for="password">密码</label>
            <input type="password" name="password" placeholder="密码" value="{{old('password')}}">
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

@endsection
