<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    public function getCreate(){
        $category=Category::all();
        $language=Language::all();
        return view('user.articles.index',["category"=>$category,"language"=>$language]);
    }

    public function postCreate(Request $request){
        $validateData=$request->validate([
            'title'=>'required',
            'category'=>'required',
            'language'=>'required',
            'description'=>'required',
            'image'=>'required',
        ]);

        $file=$request->file('image');
        $file_name=uniqid(time()).$file->getClientOriginalName();
        $file_path='image/'.$file_name;
        $file->storeAs('image',$file_name);

        $a= Article::create([
            'title'=>$request->title,
            'slug'=>uniqid(time()).str::slug($request->title),
            'category_id'=>$request->category,
            'user_id'=>Auth()->user()->id,
            'language_id'=>$request->language,
            'description'=>$request->description,
            'image'=>$file_path,
        ]);
        Article::find($a->id)->language()->sync($request->language);

        return redirect()->back()->with('success','Post Create Suuccessful');
    }
}
