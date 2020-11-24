@extends('user.layouts.app')

@section('content')
    @foreach($posts as $post)
        {{$post->id}}
    @endforeach
@endsection
