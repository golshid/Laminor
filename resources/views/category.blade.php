@extends('layouts.app')

{{-- Showing discussions of each channel --}}
{{-- http://laravelforum.test/channel/{slug} --}}

@section('content')

@foreach ($posts as $d)
@if ($d->status == 1)
<div class="card">
    <div class="card-body d-flex flex-row">
        <div class="p-2">
            <div class="d-flex flex-column">
                <div class="p-2 col-1"><button class="btn-light btn-success btn"
                        disabled>{{$d->comment->count()}}</button></div>
                <div class="p-2">
                    <h6>Comments</h6>
                </div>
            </div>
        </div>
        <div class="p-2 ml-2">
            <div class="d-flex flex-column">
                <a class="mt-2" style="text-decoration:none; color:#326273;"
                    href="{{route('showpost',['slug'=>$d->slug])}}"
                    >
                    <h5>{{ $d->title}}</h5>
                </a>
                <div class="d-flex flex-row">
                    <a 
                    href="{{route('find.category',['slug'=>$d->category->slug])}}"
                        class=" btn p-2 mt-1 btn-light btn-sm">{{$d->category->title}}</a>
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <span>{{$d->user->name}}, {{$d->created_at->diffForHumans()}}</span>
    </div>
</div>
<br>
@endif
@endforeach

<div class="text-center row  justify-content-center my-5">
    {{$posts->links()}}
</div>

@endsection