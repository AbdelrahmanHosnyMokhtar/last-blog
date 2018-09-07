<?php

namespace App\Http\Controllers;

use App\Article;
use App\Comment;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth ;
use Illuminate\Http\RedirectResponse ;
use Image ;


class manage extends Controller
{


    public function __construct()
    {
        $this->middleware('auth')->except('view','read','prof','pro');
    }

    public function Add_article(Request $request){

        if ($request-> isMethod('post')){
            $ar = new Article();
            $ar -> title =$request->input('title') ;
            $ar -> body =$request->input('body') ;
            $ar-> user_id=Auth::user()->id ;
            if ($request->hasFile('image')    ){
                $image = $request->file('image');
                $filename= time() . '.' . $image->getClientOriginalExtension() ;
                $location= public_path('image/'.$filename);
                Image::make($image)->resize(800,400)->save($location);
                
                $ar-> image = $filename ;
            }
            $ar->save();

            return redirect('view')  ;
        }
        return view('manage.Add_article') ;

    }


    public function view(){
        $articles=Article::all();
        $ar=Array('articles'=>$articles,);
        return view('manage.view',$ar );
    }


    public function read(Request $request , $id){
        if ($request->isMethod('post')){
            $ar= new Comment() ;
            $ar->comment=$request->input('body');
            $ar->article_id=$id ;
            $ar->save() ;

        }
        $article=Article::find($id);
        $artc=Array('article'=>$article);
        return view ('manage.read',$artc) ;
    }
    public function profile(){
        return view('profile', array('user' => Auth::user()) );
    }
    public function update_avatar(Request $request){
        // Handle the user upload of avatar
        if($request->hasFile('avatar')){
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300, 300)->save( public_path('/image/' . $filename ) );
            $user = Auth::user();
            $user-> avatar = $filename;
            $user->save();

        }
        if($request->isMethod('post')){
            $inf = Auth::user();
            $inf->inform = $request-> input('inform') ;
            $inf->save() ;
        }

        return view('profile', array('user' => Auth::user()) );
    }



 public function prof(Request $request ,$id){
        $yee=User::find($id) ;
     $ye=Array('user'=>$yee);
     return view('prof',$ye);

 }
    public function pro(Request $request ,$id){
        $yee=User::find($id) ;
        $ye=Array('us'=>$yee);
        return view('manage.aut',$ye);

    }
}
