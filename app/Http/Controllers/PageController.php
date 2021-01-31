<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\ArticleComment;
use App\Models\ArticleLike;
use App\Models\Category;
use App\Models\Language;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Expr\FuncCall;

class PageController extends Controller
{
    public function index(Request $request){
        if(isset($request->search)){
            $search=$request->search;
            $posts=Article::withCount('like','comment')
            ->where('title','like',"%{$search}")
            ->paginate(4);
            $posts->appends($request->all());
        }
        else{
            $posts=Article::withCount('like','comment')->paginate(4);
        }
        return view('index',['posts'=>$posts]);
    }

    public function getLogin(){
        return view('auth.login');
    }

    public function postLogin(Request $request){
        $validatedData=$request->validate([
            'mail'=>'required',
            'password'=>'required',
        ]);

        $auth=Auth::attempt(['email' => $request->mail, 'password' => $request->password]);

        if($auth){
            return redirect(url('/'))->with('success','successful login!');
        }
        else{
            return redirect()->back()->with('success','mail or password is wrong!');
        }

    }

    public function getRegister(){
        return view('auth.register');
    }

    public function postRegister(Request $request){
        $validatedData =$request->validate([
            'name'=>'required',
            'mail'=>'required',
            'password'=>'required',
            'image'=>'required|mimes:png,jpg'
        ]);

        $file=$request->file('image');
        $file_name=uniqid(time()).$file->getClientOriginalName();
        $file_path='image/'.$file_name;
        $file->storeAs('image',$file_path);

        User::create([
            'name'=>$request->name,
            'email'=>$request->mail,
            'password'=>Hash::make($request->password),
            'image'=>$file_path,
        ]);
        return redirect(route('login'))->with('success','Register Successful');
    }

    public function logout(){
        Auth::logout();
        return redirect(url('/'))->with('success','Logout Success');
    }

    public function articleByCategory(Request $request,$slug){
        $categoryId=Category::where('slug',$slug)->first()->id;
        $article=Article::withCount('like','comment')
        ->where('category_id',$categoryId)
        ->paginate(6);
        return view('index',[
            'posts'=>$article
        ]);
    }

    public function articleByLanguage(Request $request, $slug){
        $languageId=Language::where('slug',$slug)->first()->id;
        $article=Article::withCount('like','comment')
        ->whereHas('Language',function($q) use ($languageId){
            $q->where("language_id",$languageId);
        })
        ->paginate(6);
        return view('index',[
            'posts'=>$article
        ]);
    }

    public function detail(Request $request,$slug){
        $article=Article::where('slug',$slug)
        ->withCount('like','comment')
        ->with('category','language','comment.user')
        ->first();
        return view('detail',['article'=>$article]);
    }

    public function createLike($id){
        $user_id=Auth::user()->id;
            ArticleLike::create([
                'user_id'=>$user_id,
                'article_id'=>$id,
            ]);
            $like_count=ArticleLike::where('article_id',$id)->count();
            return response()->json(['data'=>$like_count]);
    }

    public function createComment(Request $request){
        $comment=$request->comment;
        $article_id=$request->article_id;
        ArticleComment::create([
            'user_id'=>Auth::user()->id,
            'article_id'=>$article_id,
            'comment'=>$comment,
        ]);
        $comment=ArticleComment::where('article_id',$article_id)->with('user')->latest()->get();

        $data='';

        foreach($comment as $c){
            $data .="
            <div class='card-dark mt-1'>
            <div class='card-body mb-2'>
                <div class='row'>
                        <div
                                class='col-md-4 d-flex align-items-center'>
                                {$c->user->name}
                        </div>
                </div>
                <hr>
                <p>{$c->comment}</p><br>
            </div>
        </div>
            ";
        }
        return response()->json(['data'=>$data]);
    }

}
