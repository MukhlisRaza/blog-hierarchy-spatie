<?php

namespace App\Http\Controllers;

use App\Models\Moderator;
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
                $moderator->assignRole('Blogger');
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
}
