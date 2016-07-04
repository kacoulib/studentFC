<?php

namespace App\Http\Controllers;

use View;
use App\Post;
use App\Student;
use App\Category;
use App\Http\Requests;
use Illuminate\Http\Request;

class FrontController extends Controller
{

    public function __construct()
    {

        // $view représente la vue composite ici layouts.master
        View::composer('layouts.master', function ($view) {
            $categories = Category::lists('title', 'id');

            // on récupère la clé catégories dans le master
            $view->with(['categories' => $categories]);

        });
    }

    // page d'accueil
    public function index()
    {
        return view('front.home');
    }

    public function showAll()
    {
        $students = Student::all();

        return view('front.student.list', ['students' => $students]);
    }

    public function showStudent($id)
    {
        $student = Student::find($id);

        return view('front.student.show', ['student' => $student]);
    }

    public function showPostByCategory($id)
    {
        $category = Category::find($id);
        $titleCat = $category->title;

        $posts = $category->posts;

        return view('front.post.index', [
            'titleCat' => $titleCat,
            'posts' => $posts,
        ]);

    }

    public function showPost($id)
    {
        $post = Post::find($id);

        return view('front.post.show', [
            'post' => $post
        ]);
    }
}
