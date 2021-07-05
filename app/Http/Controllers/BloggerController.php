<?php

namespace App\Http\Controllers;

use App\Models\Moderator;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;

class BloggerController extends Controller
{
    //
    public function blogger()
    {
        return view('admin.blogger');
    }

    public function registerBlogger(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            // dd($data);
            // die;

            $blogger = new User;
            $blogger->name = $data['name'];
            $blogger->email = $data['email'];
            $blogger->password = Hash::make($data['password']);
            $blogger->blogger_id = Auth::user()->id;
            $blogger->assignRole('Blogger');
            $blogger->save();
            $message = "Blogger successfully register";
            session::flash('success_message', $message);
            return redirect('dashboard');
        }
    }

    //  Register Blogger 
    public function moderator()
    {
        return view('bloggers.register-moderator');
    }

    // Register moderator
    public function registerModerator(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            // dd($data);
            // die;

            $moderator = new User;
            $moderator->blogger_id = Auth::user()->id;
            $moderator->name = $data['name'];
            $moderator->email = $data['email'];
            $moderator->password = Hash::make($data['password']);
            if ($data['select-role'] == 'Write Moderator') {
                $moderator->assignRole('Write_Moderator');
            } elseif ($data['select-role'] == 'Edit Moderator') {
                $moderator->assignRole('Edit_Moderator');
            } else {
                $moderator->assignRole('Publish_Moderator');
            }
            $moderator->save();
            $message = "Moderator successfully register";
            session::flash('success_message', $message);

            return redirect('dashboard');
        }
    }

    //  Create Post
    public function createPost()
    {
        $posttitle = "New";
        return view('bloggers.createEditPost')->with(compact('posttitle'));
    }
    public function donePost(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            // echo "<pre>";
            // print_r($data);
            // die;

            $post = new Post;
            $post->blogger_id = Auth::user()->id;
            $post->title = $data['title'];
            $post->body = $data['body'];
            $post->status = 'Pending';
            $post->save();

            $message = "Posts successfully created";
            session::flash('success_message', $message);

            return redirect('dashboard');
        }
    }

    public function edit(Request $request, $post)
    {
        $posttitle = "Edit";
        $posts = Post::find($post);
        // echo "<pre>";
        // print_r($posts);
        // die;
        if ($request->isMethod('post')) {
            $data = $request->all();

            // echo "<pre>";
            // print_r($data);
            // die;
            Post::where('id', $post)->update(['title' => $data['title'], 'body' => $data['body']]);
            $message = "Post Edit Successfully!";
            session::flash('success_message', $message);
            return redirect('dashboard');
        }


        return view('bloggers.createEditPost')->with(compact('posttitle', 'posts'));
    }

    public function view($posts)
    {
        $post = Post::where('id', $posts)->get()->toArray();
        // echo "<pre>";
        // print_r($post);
        // die;
        return view('bloggers.view-post')->with(compact('post'));
    }

    public function publish(Request $request, $post)
    {

        // echo "<pre>";
        // print_r($post);
        // die;
        Post::where('id', $post)->update(['status' => 'Publish']);

        $message = "Post publish successfully";
        Session::flash('success_message', $message);
        return redirect()->back();
    }
}
