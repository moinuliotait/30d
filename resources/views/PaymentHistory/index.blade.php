@extends('layouts.layout')
@section('content')
    <div class="p-3">
        <div class="d-flex justify-content-between align-items-center">
            <div class="header p-2">
                <h2>Payment History</h2>
            </div>
            <form action="{{route('payment-history.search')}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('post')
                <div class="header p-2">
                    <div class="input-group mb-3">
                        <input type="text" name="search" class="form-control" placeholder="Name or Email">
                        <div class="input-group-append">
                            <input type="submit" class="input-group-text btn btn-primary">
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="mt-4">
            <table class="table">
                <thead>
                <tr class="text-center">
                    <th scope="col">Sl</th>
                    <th scope="col">Full Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Zakat</th>
                    <th scope="col">Sadaqah</th>
                    <th scope="col">Riba</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $key => $item)
                    <tr class="text-center">
                        <th scope="row">{{$key+1}}</th>
                        <td>{{$item->first_name }} {{ $item->last_name}}</td>
                        <td>{{$item->email}}</td>
                        <td>{{$item->zakat}}</td>
                        <td>{{$item->sadaqah}}</td>
                        <td>{{$item->riba}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
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
