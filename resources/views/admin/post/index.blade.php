@extends('layouts.layout')

@section('content')
    <div class="">
        @foreach($posts as $post)
            <div class="w-full sm:max-w-md mb-4 px-6 py-4 bg-white dark:bg-gray-800 shadow-md  sm:rounded-lg">
                <h3>{{$post['title']}}</h3>
                <p>{{$post['desc']}}</p>
                <span>{{$post['created_at']}}</span>
            </div>
        @endforeach
    </div>
@endsection
