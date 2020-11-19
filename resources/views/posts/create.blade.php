@extends('layouts.app')

@section('content')
    <div class="ui basic segment"></div>
    <form class="ui form segment" method="post" action="{{ url('posts') }}">
        @csrf
        <div class="field">
            <label for="content">内容</label>
            <input type="text" id="content" name="content" placeholder="内容" value="{{ old('content') }}">
        </div>
        <div class="field">
            <label for="description">描述</label>
            <textarea type="text" id="description" name="description" placeholder="描述">{{ old('description') }}</textarea>
        </div>
        <button class="ui button primary" type="submit">发布</button>
    </form>
    @if ($errors->any())
        <div class="ui error message">
            <ul class="list">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
@endsection
