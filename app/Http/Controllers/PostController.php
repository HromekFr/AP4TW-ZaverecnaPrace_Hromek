<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index() {
        return view('posts.index', [
            'posts' => Post::latest()->filter(
                request(['search', 'category', 'author'])
            )->simplePaginate(6)->withQueryString(),
            'user' => Auth::user()
        ]);


    }
    public function indexAdmin() {
        $user = Auth::user();
        if (!is_null($user)) {
            if ($user->isAdmin) {
                return view('admin.admin',
                    ['posts' => Post::all()]);
            }
        }

        return view('errors.not_admin');
    }

    public function create() {
        $user = Auth::user();
        if (!is_null($user)) {
            return view('posts.create', [
                'categories' => Category::all()
            ]);
        }

        return view('errors.not_logged');
    }

    public function store() {
        $user = Auth::user();
        if (!is_null($user)) {
            $attributes = request()->validate([
                'category_id' => 'required',
                'title' => 'required|max:100',
                'excerpt' => 'required|max:255',
                'body' => 'required'
            ]);
            $attributes['user_id'] = Auth::user()->id;
            $attributes['slug'] = str_replace(' ', '-', strtolower($attributes['title']));
            $attributes['created_at'] = new \DateTime();
            Post::create($attributes);

            return redirect('/');
        }

        return view('errors.not_logged');
    }

    public function show(Post $post) {
        return view('posts.show', [
            'post' => $post,
            'user' => Auth::user()
        ]);
    }

    public function edit(Post $post) {
        $user = Auth::user();
        if (!is_null($user)) {
            return view('posts.edit', [
                'post' => $post,
                'categories' => Category::all()
            ]);
        }

        return view('errors.not_admin');
    }

    public function update() {
        $user = Auth::user();
        if (!is_null($user)) {
            $attributes = request()->validate([
                'id' => 'required',
                'category_id' => 'required',
                'title' => 'required|max:100',
                'excerpt' => 'required|max:255',
                'body' => 'required'
            ]);

            $post = Post::find($attributes['id']);
            $post['category_id'] = $attributes['category_id'];
            $post['title'] = $attributes['title'];
            $post['excerpt'] = $attributes['excerpt'];
            $post['body'] = $attributes['body'];
            $post->save();

            return redirect('/admin/posts');
        }

        return view('errors.not_admin');

    }

    public function destroy() {
        $user = Auth::user();
        if (!is_null($user)) {
            $attributes = request()->validate([
                'id' => 'required'
            ]);

            $post = Post::find($attributes['id']);
            $post->delete();

            return redirect('/admin/posts');
        }

        return view('errors.not_admin');


    }


}
