

@extends('layouts.app')

@section('content')

<div class="container">
<div class="card">
    <div class="card-header text-center">Create a new discussion</div>
    <div class="card-body">
        <form action="{{route('post.store')}}" method="POST">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control">
            </div>
            <div class="form-group">
                <label for="category">Pick a Category</label>
                <select name="category_id" id="category_id" class="form-control">
                    @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->title}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea name="content" id="content" cols="30" rows="10" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <button class="btn btn-success pull-right" type="submit">Submit Post</button>
            </div>
        </form>
    </div>
</div>
</div>

@endsection 