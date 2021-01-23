@extends('layouts.app')

@section('content')

<div class="card" style="border-width:1px; border-color:#9affcc;">
    <div class="card-header d-flex text-center" style="background-color:#9affcc;"><a 
        {{-- href="/channels/create" --}}
            class=" flex-fill btn btn-light" style="border-color:#00ff80; background-color:#e7fff3;">Create a new
            Category</a></div>

    <div class="card-body" style="background-color:#fafafa; border-color:#9affcc;">
        {{-- <div class="card"><a href="/channels/create" class="btn btn-light">Create a new channel</a></div>
                    <br>
                    <br> --}}
        <table class="table table-hover">
            <thead>
                <th class="text-center">
                    Name
                </th>
                <th>
                    Edit
                </th>
                <th>
                    Delete
                </th>
            </thead>
            <tbody>
                @foreach($categories as $category)
                <tr>
                    <td class="text-center">{{ $category->title}}</td>
                    <td>
                        <a 
                        {{-- href="{{route('category.edit',['category'=>$category->id])}}" --}}
                            class="btn text-white btn-xs btn-info">Edit</a>
                    </td>
                    <td>
                        <form 
                        {{-- action="{{route('category.destroy',['channel'=>$category->id])}}"  --}}
                        method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button class="btn btn-xs btn-danger" type="submit">Delete</button>
                        </form>

                    </td>
                </tr>

                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection