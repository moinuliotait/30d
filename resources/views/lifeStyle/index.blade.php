@extends('layouts.layout')
@section('lifeStyle')
    <div class="p-3">
        <div class="d-flex justify-content-between align-items-center">
            <div class="header p-2">
                <h2>Life Style</h2>
            </div>
            <div class="addNew p-2">
                <a href="{{ route('life-style-create-page') }}" class="btn btn-primary mr-3"><i
                        class="mdi mr-2 mdi-plus"></i>Add Category</a>
                <a href="{{ route('life-style-create-page') }}" class="btn btn-dark"><i class="mdi mr-2 mdi-plus"></i>Add
                    Content</a>
            </div>
        </div>
        @if(session()->has('message'))
            <div class="alert alert-success w-100 mt-2 mb-2" id="message">
                {{ session()->get('message') }}
            </div>
        @endif
        <div class="listOfContentType mt-3">
            <div class="PillButton">
                <div class="d-flex">
                    <a href="" class="active">All</a>
                    <a href="">Sports</a>
                    <a href="">Voeding</a>
                </div>
            </div>
            <div class="row mt-3">
                @foreach($contents as $content)
                    <div class="col-3 s-12">
                        <div class="card w-100">
                            <img class="card-img-top w-100"
                                 src="{{asset('storage/'.$content->featured_image)}}"
                                 alt="Card image cap ">
                            <div class="card-body">
                                <p class="card-text">{{$content->title}}</p>
                                <div class="action">
                                    <a href="{{route('edit-page-show-life-style',$content->id)}}" class="btn btn-primary">Edit</a>
                                    <a href="" class="btn btn-danger">Delete</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        const item = document.getElementById('message');
        setTimeout(function () {
            item.style.display = 'none'
        }, 5000);
    </script>
@endsection
