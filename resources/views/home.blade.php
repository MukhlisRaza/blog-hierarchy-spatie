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
            @role('Admin|Blogger')
            <div class="card">
                <div class="card-header">
                    @role('Admin')
                    Register Bloggers List
                    @endrole
                    @role('Blogger')
                    Register Moderators List
                    @endrole
                </div>
                @include('includes.sidebarregisters')

            </div>
            @endrole
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    @role('Admin')
                    Admin
                    @endrole

                    Blog Moderator

                    @role('Write_Moderator')
                    <span class="float-right"><a href="{{url('dashboard/create')}}">Create Post</a> </span>
                    @endrole

                </div>

                <div class="card-body">
                    <table class="table table-borderless">
                        <tbody>
                            @if(isset($posts))
                            @foreach($posts as $post)
                            @foreach($post['posts'] as $blog)
                            <tr>

                                <th scope="row" style="width: 1%;">
                                    <ul>
                                        <li></li>
                                    </ul>
                                </th>

                                <td style="width: 90%;">
                                    <a href="{{url('dashboard/post/'.$blog['id'].'/view/')}}"> {{$blog['title']}}</a>
                                </td>
                                <td style="width: 10%;">
                                    @can('Edit Post')
                                    <a href="{{url('dashboard/post/'.$blog['id'].'/edit/')}}">Edit</a>
                                    @endcan
                                    @role('Publish_Moderator')
                                    @if($blog['status'] != 'Publish')

                                    <a href="{{url('dashboard/post/'.$blog['id'].'/publish/')}}"> | Publish</a>
                                    @endif
                                    @endrole
                                </td>
                                <td>
                                    <span class="badge bg-warning text-dark">{{$blog['status']}}</span>
                                </td>


                                <td>
                                    <span class="badge bg-success text-dark">By: {{$post['name']}}</span>
                                </td>
                            </tr>
                            @endforeach
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection