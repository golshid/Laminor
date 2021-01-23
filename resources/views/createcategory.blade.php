@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header">Create a new Category</div>

    <div class="card-body">
        <form action="{{route('category.store')}}" method="POST">
            {{ csrf_field() }}
            <div class="from-group">
                <input type="text" name="category" class="form-control">
            </div>
            <div class="form-group">
                <div class="text-center">
                    <button class="btn-success my-3 btn" type="submit">
                        Save Category
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection