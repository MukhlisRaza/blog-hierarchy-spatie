@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Dashboard</div>
                @if (Session::has('success_message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{Session::get('success_message') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                @include('includes.sidebar')

            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Bloggers</div>

                <div class="card-body">

                </div>

            </div>
        </div>
    </div>
</div>
@endsection