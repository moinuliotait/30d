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
            <table>
                <tr>
                    <th>Sl</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>category</th>
                    <th>Status</th>
                </tr>
                <tr>
                    <td>1</td>
                    <td>asd</td>
                    <td>asdf</td>
                    <td>sdf</td>
                    <td>sdfg</td>
                </tr>
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
