@extends('layouts.layout')

@section('content')
    <div class="p-3">
        <div class="d-flex justify-content-between align-items-center">
            <div class="header p-2">
                <h2>News Portal</h2>
            </div>
            <div class="addNew p-2">
                <a href="{{ route('life-style-create-page') }}" class="btn btn-dark"><i class="mdi mr-2 mdi-plus"></i>Add
                    News</a>
            </div>
        </div>
        @if(session()->has('message'))
            <div class="alert alert-success w-100 mt-2 mb-2" id="message">
                {{ session()->get('message') }}
            </div>
        @endif
    </div>
@endsection
