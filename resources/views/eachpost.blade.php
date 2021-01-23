@extends('layouts.app')

@section('content')
{{-- Show Question --}}


<div class="card">
    <div class="card-body d-flex flex-row">
        <div class="p-2 ml-2">
            <div class="d-flex flex-column">
                <a class="mt-2" style="text-decoration:none; color:#326273;"
                    href="{{route('showpost',['slug'=>$d->slug])}}">
                    <h5>{{ $d->title}}</h5>
                    <hr>
                </a>
                <div class="d-flex flex-row text-justify">
                    {{ $d->content}}
                </div>
                <div class="d-flex flex-row">
                    <a href="{{route('find.category',['slug'=>$d->category->slug])}}"
                        class=" btn p-2 mt-1 btn-light btn-sm">{{$d->category->title}}</a>
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <span>Submitted by {{$d->user->name}}, {{$d->created_at->diffForHumans()}}</span>
        {{-- @auth
        @if (Auth::user()->admin > 0)
        @if($d->open == 1)
        <a href="{{ route('discussion.close', ['id' => $d->id ]) }}"
            class="btn btn-outline-danger btn-sm float-right ml-2 ">Close Discussion</a>
        @else
        <a href="{{ route('discussion.open', ['id' => $d->id ]) }}"
            class="btn btn-outline-success btn-sm float-right ml-2 ">Open Discussion</a>
        @endif
        @endif
        @if(Auth::id() == $d->user->id)
        <a href="{{ route('discussion.edit', ['slug' => $d->slug ]) }}"
            class="btn btn-outline-info btn-sm float-right">Edit</a>
        @endif
        @endauth --}}
    </div>
</div>
<br>


{{-- Show Replies --}}


@foreach ($d->comment as $r)
<div class="card">
    <div class="card-body d-flex flex-row">
        <div class="p-2 ml-2">
            <div class="d-flex flex-column">
                <div class="d-flex flex-row text-justify">
                    {{ $r->content}}
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <span>Submitted by {{$r->user->name}}, {{$r->created_at->diffForHumans()}}</span>
        {{-- @auth
        @if(Auth::id() == $r->user->id || Auth::user()->admin > 0)
        <a href="{{ route('reply.delete', ['id'=>$r->id]) }}"
            class="btn btn-outline-danger btn-sm float-right ml-2 ">Delete</a>
        @endif
        @if(Auth::id() == $r->user->id)
        <a href="{{ route('reply.edit', ['id' => $r->id ]) }}" class="btn btn-outline-info btn-sm float-right ">Edit</a>
        @endif
        @endauth --}}
    </div>
</div>
<br>

@endforeach


{{-- Leave a comment --}}
<br>
@if($d->status == 1)
<div class="card card-primary">
    <div class="card-body">
        @if(Auth::check())
        <form 
        action="{{route('post.comment',['id'=>$d->id])}}" 
        method="POST">
            {{ csrf_field() }}
            {{method_field('POST')}}
            <div class="form-group">
                <label for="comment">Leave a comment</label>
                <textarea name="comment" id="comment" cols="30" rows="7" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <button class="btn btn-success float-right">Submit</button>
            </div>
        </form>
        @else
        <div class="text-center">
            <a href="/login" style="text-decoration:none;">
                <h5>Sign in to leave a comment</h5>
            </a>
        </div>
        @endif
    </div>
    @endif
    
</div>
 <br>
 <br>

@endsection