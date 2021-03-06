<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\articles;
use App\Models\categories;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
            $id = Auth::user()->id;
            $categories=categories::get();
            $articles = articles::where('user_id', "$id")->orderBy('id', 'desc')->paginate(10);
            return view('profile', ['articles'=>$articles,'categories'=>$categories]);
    }
}
