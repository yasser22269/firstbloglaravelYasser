<?php

namespace App\Http\Controllers\front;

use App\Tag;
use App\Post;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Like;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class WelcomeController extends Controller
{
    public function index(){

        $posts =Post::orderBy('id', 'DESC')->paginate(3);
        $posts_top =Post::orderBy('id', 'DESC')->limit(6)->get();



        return view('welcome',compact('posts','posts_top'));
    }

    public function getcontact(){

        $posts =Post::orderBy('id', 'DESC')->paginate(3);
        $tags =Tag::limit(10)->get();
        $posts_left =Post::orderBy('id', 'DESC')->limit(3)->get();
        return view('front/contact',compact('posts','tags','posts_left'));
    }

    public function getabout(){


        return view('front/about');
    }

    public function getcategory(){
        $posts =Post::orderBy('id', 'DESC')->paginate(3);
        $tags =Tag::limit(10)->get();
        $categories  =Category::limit(10)->get();
        $posts_left =Post::orderBy('id', 'DESC')->limit(3)->get();
        return view('front/category',compact('posts','tags','posts_left','categories'));

        // return view('front/category');
    }

    public function postContact(Request $request){
        $request->validate([
            'name'=> 'required',
            'email'=> 'required|email',
            'subject'=> 'required|min:5',
            'massage'=> 'required|min:5',
        ]);
        $data =array(
            'name'=> $request->name,
            'email'=> $request->email,
            'subject'=> $request->subject,
            'massage'=> $request->massage,
        );
            Mail::send('mail.contact', $data, function ($message) use ($data) {
                $message->from($data['email']);
                $message->to('yasser@johndoe.com');
                $message->subject($data['subject']);


            });
            return redirect()->route('Myblog');
    }



    public function postShow($id){

        $posts =Post::find($id);
        $tags =Tag::limit(10)->get();
        $posts_top =Post::orderBy('id', 'DESC')->limit(3)->get();

        return view('front/blogShow',compact('posts','posts_top','tags'));

    }

    public function search(Request $request){

        // $posts =Post::all();
        $posts = Post::where(function($query) use ($request){
            return $query->when($request->search,function($q) use ($request){
                 return $q->where('name','like','%'. $request->search .'%')
                 ->orwhere('title','like','%'. $request->search .'%');
             });

         })->latest()->paginate(5);
        return view('front/search',compact('posts'));

    }

        public function like(Request $request){
            $like_s = $request->like_s;
             $post_id =$request->post_id;
             $like_change =0;

             $like = DB::table('likes')->where('post_id',$post_id)->where('user_id',Auth::user()->id)->first();

             if(!$like){
                 $new_like = new Like;
                 $new_like->post_id =$post_id;
                 $new_like->user_id =Auth::user()->id;
                 $new_like->like =1;
                 $new_like->save();

                 $is_like =1;


             }
             elseif($like->like ==1){
                $like = DB::table('likes')->where('post_id',$post_id)->where('user_id',Auth::user()->id)->delete();

                   $is_like =0;
             }
             elseif($like->like ==0){
                $like = DB::table('likes')->where('post_id',$post_id)->where('user_id',Auth::user()->id)->update(

                   ['like' => 1]
                );

                   $is_like =1;
                   $like_change =1;
                   
             }


             $response = array(
                 'is_like' =>$is_like,
                 "like_change" =>$like_change,
             );

             return response()->json($response ,200);

        }




















        public function dislike(Request $request){
            $like_s = $request->like_s;
             $post_id =$request->post_id;
            $dislike_change =0;
             $dislike = DB::table('likes')->where('post_id',$post_id)->where('user_id',Auth::user()->id)->first();

             if(!$dislike){
                 $new_like = new Like;
                 $new_like->post_id =$post_id;
                 $new_like->user_id =Auth::user()->id;
                 $new_like->like =0;
                 $new_like->save();

                 $is_like =1;


             }
             elseif($dislike->like ==0){
                $like = DB::table('likes')->where('post_id',$post_id)->where('user_id',Auth::user()->id)->delete();

                   $is_like =0;

             }
             elseif($dislike->like ==1){
                $like = DB::table('likes')->where('post_id',$post_id)->where('user_id',Auth::user()->id)->update(

                   ['like' => 0]
                );

                   $is_like =1;
                   $dislike_change =1;

             }


             $response = array(
                 'is_like' =>$is_like,
                 "dislike_change" =>$dislike_change,
             );

             return response()->json($response ,200);

        }


}
