@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header">Edit Category: {{$category->title}}</div>

    <div class="card-body">
        <form action="{{route('category.update',['id'=>$category->id])}}" method="POST">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}
            <div class="from-group">
                <input type="text" name="category" value="{{$category->title}}" class="form-control">
            </div>
            <div class="form-group">
                <div class="text-center">
                    <button class="btn-success my-3 btn" type="submit">
                        Update Category
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection