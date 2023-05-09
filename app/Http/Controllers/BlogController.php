<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Cache\RedisTagSet;
use Illuminate\Http\Request;

class BlogController extends Controller
{
  public function form(){
    return view('blog.form');
  }

  public function store(Request $request){

    $validated=$request->validate([
        'title'=>'required',
        'description'=>'required',
        'image'=>'required',
    ]);

    $data=new Blog();
    $data->title=$request->title;
    $data->description=$request->description;
    if($request->hasFile('image'))
    {
        $file=$request->image;
        $extension=$file->getClientOriginalExtension();
        $filename=time().'.'.$extension;
        $file->move('uploads',$filename);
        $data->image=$filename;
    }
    $data->save();
    return redirect()->route('blog.table')->with('msg','Data has been submit successfully');;
  }

  public  function table(){
    $data=Blog::paginate(4);
    return view('blog.table',compact('data'));
}
 public function edit($id){
    $data=Blog::find($id);
    return view('blog.edit',compact('data'));
 }

 public function update(Request $request,$id){
    $validated=$request->validate([
        'title'=>'required',
        'description'=>'required',
        'image'=>'required',
    ]);
    $data=Blog::find($id);
    $data->title=$request->title;
    $data->description=$request->description;
    if($request->hasFile('image'))

    {
        $file=$request->image;
        $extension=$file->getClientOriginalExtension();
        $filename=time().'.'.$extension;
        $file->move('uploads',$filename);
        $data->image=$filename;
    }
    
    $data->save();
    return redirect()->route('blog.table')->with('msg','Data has been update successfully');;
  }
   public function delete($id){
    $data=Blog::find($id);
    $data->delete($id);
    return redirect()->route('blog.table')->with('msg','Data has been delete successfully');;

   }

}

