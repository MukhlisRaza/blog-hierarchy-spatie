@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Publish Posts</div>

                <div class="card-body">
                    <table class="table table-borderless">
                        <tbody>
                            @foreach($posts as $post)
                            <tr>
                                <th scope="row" style="width: 1%;">
                                    <ul>
                                        <li></li>
                                    </ul>
                                </th>
                                <td style="width: 90%;">
                                    <a href="{{url('/post/'.$post['id'].'/view/')}}"> {{$post['title']}}</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Bloggers</div>

                <div class="card-body">

                </div>

            </div>
            <div class="card">
                <div class="card-header">Recent Post</div>

                <div class="card-body">

                </div>

            </div>
        </div>
    </div>
</div>
@endsection