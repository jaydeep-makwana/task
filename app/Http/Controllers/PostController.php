<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\post;

class PostController extends Controller
{
     function createPost(Request $request){
        $request->validate([       
            "title" => "required",
            "genre" => "required",
            "tag" => "required",
            "desc" => "required",
            "image" => "required | mimes:png,jpg,jpeg"
         ]);
      $img_name =  $request->file('image')->getClientOriginalName();
      $img_path = $request->file('image')->storeAs('posts',$img_name,'uploads');
      
       
        $data =  new Post;
        $data->title = $request->title; 
        $data->genre = $request->genre; 
        $data->tag = $request->tag; 
        $data->description = $request->desc; 
        $data->image = $img_path;
        $data->save();
         return redirect('user_dashboard')->with('post','Your post is created successfuly.');
     }
}
