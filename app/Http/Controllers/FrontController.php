<?php

namespace App\Http\Controllers;

use App\Student;
use App\Category;
use App\Http\Requests;
use Illuminate\Http\Request;

class FrontController extends Controller
{
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
            'posts' => $posts,
            'titleCat' => $titleCat
        ]);

    }
}
