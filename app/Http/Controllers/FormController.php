<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\category;
use Illuminate\Http\Request;

class FormController extends Controller
{
    // public function contact(){
    //     return view('contact');
    // }

    // public function home(){
    //     return view('home');
    // }

    // public function about(){
    //     return view('about');
    // }


    public function welcome(){
        $categories=category::all();
        // dd($categories);
        //  for blog get data(title,description image)
        $blogs=Blog::all();
        //   dd($blogs);
        return view('welcome',compact('categories','blogs'));
    }

  public function detail($id){
    $detail=Blog::find($id);
    $categories=category::all();
 return view('layouts.detail',compact('detail','categories'));
  }

  public function dashboard(){
    return view('layouts.dashboard');
  }
}
