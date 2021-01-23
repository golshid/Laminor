@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        {{-- <div class="col-md-8"> --}}
            {{-- <div class="card">
                <div class="card-header text-center">{{ __('Dashboard') }}</div>

                <div class="card-body row">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="card col-sm">
                        <a href="{{route('admin.inbox')}}" class="btn btn-info">My Posts</a>
                    </div>
                    <div class="card col-sm">
                        <a href="{{route('post.create')}}" class="btn btn-success">Add a New Post</a>
                    </div>
                    <div class="card col-sm">
                        <a href="" class="btn btn-info">Edit categories</a>
                    </div>
                </div>
            </div> --}}
        {{-- </div> --}}
    </div>
</div>
<div class="container ">
    <div class="row justify-content-center">
        {{-- <div class="col-md-8"> --}}
            <div class="card text-center">
                <div class="card-header">
                    Latest Posts
                </div>
                <div class="card-body">
                    @foreach ($posts as $d)
                    @if ($d-> status = 1)
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
    
                            <span>Submitted by {{$d->user->name}}, {{$d->created_at->diffForHumans()}}</span>
                        </div>
                    </div>
                    <br>
                    @endif
                    @endforeach
    
                </div>
            </div>
        {{-- </div> --}}
    </div>
</div>
<div class="text-center row  justify-content-center my-5">
                        {{$posts->links()}}
                    </div>
@endsection
