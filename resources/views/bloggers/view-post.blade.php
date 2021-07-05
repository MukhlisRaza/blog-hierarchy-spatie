@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @foreach($post as $posts)
                <div class="card-header">Posts View</div>
                <div class="card-body">

                    <div class="form-group">
                        <input type="text" class="form-control" id="title" name="title" placeholder="Title" value="{{$posts['title']}}" readonly>
                    </div>
                    <div class="form-group">
                        <textarea rows="08" class="form-control" cols="83" maxlength="1000" name="body" placeholder="body" readonly>{{$posts['body']}}</textarea>
                    </div>


                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection