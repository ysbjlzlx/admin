@extends('layouts.app')

@section('content')
    <div class="ui basic segment"></div>
    <form class="ui form segment @if($errors->any()) error @endif" method="post" action="{{ route('register') }}">
        @csrf
        <div class="field">
            <label for="email">邮箱</label>
            <input type="text" name="email" placeholder="邮箱" value="{{old('email')}}">
        </div>
        <div class="field">
            <label for="password">密码</label>
            <input type="password" name="password" placeholder="密码" >
        </div>
        <div class="field">
            <label for="password_confirmation">确认密码</label>
            <input type="password" name="password_confirmation" placeholder="确认密码">
        </div>
        <button class="ui button" type="submit">注册</button>
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
