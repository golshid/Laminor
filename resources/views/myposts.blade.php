@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card text-center">
                <div class="card-header">
                    My Posts
                </div>
                <div class="card-body">
                    @foreach ($posts as $d)
                    <div class="card">
                        <div class="card-body d-flex flex-row">
                            <div class="p-2">
                                <div class="d-flex text-center flex-column">
                                    <div class="p-2 col-1"><button class="btn-light btn-success text-center btn"
                                            disabled>
                                            {{$d->comment->count()}}
                                        </button></div>
                                    <div class="p-2">
                                        <h6>Comments</h6>
                                    </div>
                                </div>
                            </div>

                            <div class="p-2 ml-2">
                                <div class="d-flex flex-column">
                                    <a class="mt-2" style="text-decoration:none; color:#326273;"
                                        {{-- href="{{route('discussion',['slug'=>$d->slug])}}" --}}>
                                        <h5>{{ $d->title}}</h5>
                                    </a>
                                    <div class="d-flex flex-row">
                                        <a {{-- href="{{route('channel',['slug'=>$d->channel->slug])}}" --}}
                                            class=" btn p-2 mt-1 btn-light btn-sm">{{$d->category->title}}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">

                            <span>Submitted by {{$d->user->name}}, {{$d->created_at->diffForHumans()}}</span>
                        </div>
                    </div>
                    <br>
                    @endforeach

                    <div class="text-center row  justify-content-center my-5">
                        {{$posts->links()}}
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection