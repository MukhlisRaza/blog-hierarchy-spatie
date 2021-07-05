@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Post {{$posttitle}}</div>
                <div class="card-body">
                    <form @if(empty($posts['id'])) action="{{url('donePost')}}" @else action="{{url('dashboard/post/'.$posts['id'].'/edit/')}}" @endif method="post" enctype="multipart/form-data">

                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control" id="title" name="title" placeholder="Title" @if(!empty($posts['title'])) value="{{$posts['title']}}" @else value="{{old('title')}}" @endif>
                        </div>
                        <div class="form-group">
                            <textarea rows="08" class="form-control" cols="83" maxlength="1000" name="body" placeholder="body">@if(!empty($posts['body'])) {{$posts['body']}} @else {{old('body')}} @endif</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection