@extends('layouts.app')

@section('content')
    <div class="py-6 mb-6 border-b border-solid border-gray-300">
        <h1 class="text-2xl font-medium mb-1">{{ $user->name }}</h1>
        <p>{{ $posts->count() }} {{ Str::plural('post', $posts->count()) }} /
            {{ $user->receivedLikes()->count() }} {{ Str::plural('like', $user->receivedLikes()->count()) }}</p>
    </div>

    @if($posts->count())
        @foreach($posts as $post)
            <x-post :post="$post"></x-post>
        @endforeach

        {{ $posts->links() }}
    @else
        <p>{{ $user->name }} has no posts.</p>
    @endif
@endsection
