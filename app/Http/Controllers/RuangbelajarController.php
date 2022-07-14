<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RuangbelajarController extends Controller
{
    public function index()
    {
        return view('tampilan.index');
    }
    public function about()
    {
        return view('tampilan.about');
    }
    public function contact()
    {
        return view('tampilan.contact');
    }
    public function error()
    {
        return view('tampilan.error');
    }
    public function panduan_guru()
    {
        return view('tampilan.panduan_guru');
    }
    public function panduan_siswa()
    {
        return view('tampilan.panduan_siswa');
    }
}
