<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function mainIndex()
    {

        $posts = Post::where('status', 'Publish')->get()->toArray();

        return view('welcome')->with(compact('posts'));
    }
    public function index()
    {
        // Role::create(['name' => 'Publish_Moderator']);
        // Permission::create(['name' => 'Add Blogger']);
        // $role = Role::findById(6);
        // $permission = Permission::findById(9);
        // $role->givePermissionTo($permission);
        // auth()->user()->assignRole('Admin');
        // return auth()->user()->getPermissionsViaRoles();


        $bloggerModerator = User::where('blogger_id', Auth::user()->id)->select('id', 'name')->get()->toArray();
        // $posts = Post::where('blogger_id', Auth::user()->id)->get()->toArray();

        // dd($bloggerModerator);
        // die;

        $bloggerPosts = DB::table('users')
            ->join('posts', 'posts.blogger_id', '=', 'users.id')
            ->select('users.blogger_id', 'posts.title')
            ->get();

        // $items = array();
        // foreach ($moderator as $username) {
        //     $items[] = $username;
        // }

        // dd($bloggerPosts);
        // die;



        $posts = User::with('posts')->where('blogger_id', json_decode(json_encode($bloggerPosts), true))->select('id', 'name')->get()->toArray();
        // dd($posts);
        // die;

        return view('home')->with(compact('bloggerModerator', 'posts'));
    }
}
