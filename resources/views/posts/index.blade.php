@extends('layouts.app')

@section('content')
<div class="container">
    @foreach($posts as $post)
        <div class="row">
            <div class="col-4 offset-3">
                <a href="profile/{{ $post->user_id }}"><img src="/storage/{{$post->image}}" class="w-100"></a>
            </div>
        </div>
        <div class="row pt-2 pb-4">
            <div class="col-4 offset-3">
                <div>
                    <div class="d-flex align-items-center">
                        <div>
                            <div class="font-weight-bold">
                                <a href="/profile/{{$post->user->id}}">
                                    <span class="text-dark">{{ $post->user->username }}</span>
                                </a>
                                <a href="#" class="pl-4">follow</a>
                            </div>
                        </div>
                    </div>        
                </div>
            </div>
        </div>
    @endforeach
    <div class="row">
        <div>
            {{ $posts->links() }}
        </div>
    </div>
</div>
@endsection
