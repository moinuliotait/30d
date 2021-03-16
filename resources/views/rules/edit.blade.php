@extends('layouts.layout')
@section('content')
    <div class="contentInputFrom p-3">
        <div class="header">
            <h2>Edit Rules</h2>
        </div>
        @if(session()->has('message'))
            <div class="alert alert-danger w-100 mt-2 mb-2" id="message">
                {{ session()->get('message') }}
            </div>
        @endif
        <div class="inputGroup mt-5">
            <form action="{{route('rules.update')}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <input type="hidden" name="id" value="{{$rulesData->id}}">
                <div class="row">
                    <div class="col-6 s-12">
                        {{--  {{route('rules.update')}}                       // title --}}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Title</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                   placeholder="Enter Title" name="title" value="{{$rulesData->title}}" required>
                        </div>
                        @error('title')
                        <p class="mb-0 pb-4 text-caption text-danger">{{ $message }}</p>
                        @enderror
                        {{--                        // Catagories type for rules --}}
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Categories</label>
                            <select name="category_id" id="Catagories" class="form-control">
                                <option value="">Choose One</option>
                                @foreach($category as $cat)
                                    <option value="{{$cat->id}}" {{$rulesData->category_id == $cat->id ? 'selected':''}}>{{$cat->category_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('short_description')
                        <p class="mb-0 pb-4 text-caption text-danger">{{ $message }}</p>
                        @enderror
                        {{--                        /// content  for rules --}}
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Content</label>
                            <textarea class="form-control summernote" id="exampleFormControlTextarea1 description"
                                      rows="3" placeholder="Write Content" name="content" required>{{$rulesData->description}}</textarea>
                        </div>
                        @error('content')
                        <p class="mb-0 pb-4 text-caption text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-6 s-12">
                    </div>
                    <div class="button w-100 p-4">
                        <button class="btn btn-primary w-100">
                            UPDATE
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('script')
    <script>
        document.getElementById('preview').style.display = "none";

        function loadFile(event) {
            var output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function () {
                document.getElementById('preview').style.display = "block";
                URL.revokeObjectURL(output.src) // free memory
            }
        }
        const item = document.getElementById('message');
        setTimeout(function () {
            item.style.display = 'none'
        }, 5000);
    </script>
@endsection
