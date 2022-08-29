<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use DataTables;

class UserController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $model = Post::with('users');
                return DataTables::eloquent($model)
                ->addColumn('users', function (Post $post) {
                    return $post->users->name;
                })
                ->toJson();
        }
        return view('users');
    }
}
