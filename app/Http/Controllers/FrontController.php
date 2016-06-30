<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;
use App\Http\Requests;

class FrontController extends Controller
{
    public function index()
    {
        dd('ici method index');

        return view('home');
    }

    public function bio()
    {
        $infos = [
            'antoine' => [
                'address' => 'Aubenas',
                'tel' => '02020202',
            ],
            'fred' => [
                'address' => 'Aubenas',
                'tel' => '01010101',
            ],
        ];

        return view('bio', ['infos' => $infos]);
    }

    public function showAll()
    {
        return Student::all();
    }

    public function showStudent($id)
    {
        dd($id);
    }
}
