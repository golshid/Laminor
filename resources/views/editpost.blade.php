@extends('layouts.app')

@section('content')
{{-- Editing Post --}}


<div class="card">
    <div class="card-header text-center">Edit Post</div>

    <div class="card-body">
        <form action="{{route('post.update',['id'=>$post->id])}}" method="POST">
            {{ csrf_field() }}

            <div class="form-group">
                <input type="text" name="title" value="{{$post->title}}" class="form-control">
                <br>
                <textarea name="content" id="content" cols="30" rows="10"
                    class="form-control">{{ $post->content }}</textarea>
            </div>
            <div class="form-group">
                <button class="btn btn-success pull-right" type="submit">Save post's changes</button>
            </div>
        </form>
    </div>
</div>

@endsection