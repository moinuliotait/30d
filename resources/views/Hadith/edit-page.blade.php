@extends('layouts.layout')

@section('content')
    <div class="contentInputFrom p-3">
        <div class="header">
            <h2>Create Hadith</h2>
        </div>
        @if(session()->has('message'))
            <div class="alert alert-danger w-100 mt-2 mb-2" id="message">
                {{ session()->get('message') }}
            </div>
        @endif
        <div class="inputGroup mt-5">
            <form action="{{route('hadith-update')}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <input type="hidden" value="{{$data->id}}" name="id">
                <div class="row">
                    <div class="col-6 s-12">
                        {{--                        // title --}}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Title</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                   placeholder="Enter Title" name="title" value="{{$data->title}}">
                        </div>
                        @error('title')
                        <p class="mb-0 pb-4 text-caption text-danger">{{ $message }}</p>
                        @enderror
                        {{--                        /// category--}}
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Short Description</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                                      placeholder="Write Short Description" name="short_description"
                                      >{{$data->short_description}}</textarea>
                        </div>
                        @error('short_description')
                        <p class="mb-0 pb-4 text-caption text-danger">{{ $message }}</p>
                        @enderror
                        {{--                        // short description --}}

                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Medium Description</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                                      placeholder="Write Short Description" name="medium_description"
                                      >{{$data->medium_description}}</textarea>
                        </div>
                        @error('medium_description')
                        <p class="mb-0 pb-4 text-caption text-danger">{{ $message }}</p>
                        @enderror

                        <div class="form-group">
                            <label for="example-date-input" class="col-2 col-form-label">Date</label>
                            <input class="form-control" type="date" value="{{ $data->visible_time}}" id="example-date-input" name="visible_time">
                        </div>
                        @error('visible_time')
                        <p class="mb-0 pb-4 text-caption text-danger">{{ $message }}</p>
                        @enderror
                        <div class="custom-file mt-4">
                            <label>Upload Featured Image</label>
                            <input type="file" class="custom-file-input" id="customFile" accept="image/*" name="image"
                                   onchange="loadFile(event)" >
                            <label class="custom-file-label" for="customFile">Upload Featured Image</label>
                        </div>
                        @error('image')
                        <p class="mb-0 pb-4 text-caption text-danger">{{ $message }}</p>
                        @enderror
                        <div class="image-preview mt-3 mb-3" id="preview">
                            <h5 class=" pb-2">Image Preview</h5>
                            <img src="url" alt="" id="output" class="w-100"/>
                        </div>
                        <div class="image-preview mt-3 mb-3" id="previewTwo">
                            <h5 class=" pb-2">Image Preview</h5>
                            <img src="{{asset('storage/'.$data->featured_image)}}" alt="" id="outputTwo" class="w-100"/>
                        </div>
                    </div>


                    <div class="col-6 s-12">
                        {{--                        /// content --}}
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Description</label>
                            <textarea class="form-control summernote" id="exampleFormControlTextarea1 description"
                                      rows="3" placeholder="Write Content" name="content" >{{$data->description}}</textarea>
                        </div>
                        @error('content')
                        <p class="mb-0 pb-4 text-caption text-danger">{{ $message }}</p>
                        @enderror

                    </div>
                    <div class="button w-100 p-4">
                        <button class="btn btn-primary w-100">
                            SAVE
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
