@extends('layouts.layout')

@section('content')
<div class="p-3">
    <div class="d-flex justify-content-between align-items-center">
        <div class="header p-2">
            <h2>Hadith</h2>
        </div>
        <div class="addNew p-2">
            <a href="{{ route('hadith-create-page-show') }}" class="btn btn-dark"><i class="mdi mr-2 mdi-plus"></i>Add
                Hadith</a>
        </div>
    </div>

    <div class="row mt-3">
        @foreach($contents as $content)
            {{--                    {{dd($content)->toArray()}}--}}
            <div class="col-3 s-12">
                <div class="card w-100">
                    <div class="tag p-2">
                        <p>{{$content->visible_time}}</p>
                    </div>
                    <img class="card-img-top w-100"
                         src="{{asset('storage/'.$content->featured_image)}}"
                         alt="Card image cap ">
                    <div class="card-body">
                        <p class="card-text">{{$content->title}}</p>
                        <p class="card-block">{{$content->short_description}}</p>
                        <div class="action">
                            <a href="{{route('edit-page-show-life-style',$content->id)}}" class="btn btn-primary">Edit</a>
                            <a ONCLICK="deleteItem({{$content->id}})" class="btn btn-danger">Delete</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="tpagination mt-4">
        {{$contents->links()}}
    </div>
</div>
@endsection
