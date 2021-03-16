@extends('layouts.layout')
@section('content')
    <div class="p-3">
        <div class="d-flex justify-content-between align-items-center">
            <div class="header p-2">
                <h2>Rules</h2>
            </div>
            <div class="addNew p-2">
                {{--      rules will be added          --}}
                <a href="{{ route('rules.create') }}" class="btn btn-dark"><i class="mdi mr-2 mdi-plus"></i>Add Rules</a>
            </div>
        </div>
        <div>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Sl</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Category</th>
                    <th scope="col">status</th>
                </tr>
                </thead>
                <tbody>
                @foreach($rules as $item)
                    <tr>
                        <th scope="row">{{$item->id}}</th>
                        <td>{{$item->title}}</td>
                        <td>{!!  \Illuminate\Support\str::limit(strip_tags($item->description), $limit = 5, $end = '...') !!}</td>
                        <td>{{ $item->categoryType['category_name'] }}</td>
                        <td>
                            <a href="{{route('rules.edit', $item->id)}}" class="btn btn-primary">Edit</a>
                            <a onclick="deleteItem({{$item->id}})" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        @if(session()->has('message'))
            <div class="alert alert-success w-100 mt-2 mb-2" id="message">
                {{ session()->get('message') }}
            </div>
        @endif

    </div>

@endsection
@section('script')
    <script>
        const item = document.getElementById('message');
        setTimeout(function () {
            item.style.display = 'none'
        }, 5000);

        const appUrl = document.getElementById('appUrl').value;
        const popUp = document.getElementById('popup');

        function deleteItem($id)
        {
            const deleteFrom = document.getElementById('deleteFrom');
            popUp.style.display ='block';
            // deleteFrom.action = appUrl+"/news-portal/delete/"+$id;
            deleteFrom.action = "{{ url()->current() }}/delete/"+ $id;
        }

        function remove()
        {
            popUp.style.display ='none';
        }
    </script>
@endsection
