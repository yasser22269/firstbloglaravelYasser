<?php

namespace App\Http\Controllers\back;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use App\Tag;
use Illuminate\Support\Facades\Storage;

// use Intervention\Image\ImageManagerStatic as Image;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rows  =Post::paginate(5);
        return view('dashboard.posts.index',compact('rows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('dashboard.posts.create',compact('categories','tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=> 'required',
            'title'=> 'required',
            'body'=> 'required|min:20',
            'Big_image'=> 'image',
            'small_image'=> 'image',
            'category_id'=> 'required|numeric',
        ]);

        if($request->hasFile('Big_image')){
            $file = $request->file('Big_image');
                $fileName = time().'.'.$file->getClientOriginalExtension();
                $file->move(public_path('images/Big_image/') , $fileName);

          }
          if($request->hasFile('small_image')){
            $file = $request->file('small_image');
            $fileName2 = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('images/small_image/') , $fileName2);
          }
    $requestArray =  ['user_id' => auth()->user()->id , 'small_image' => $fileName2 , 'Big_image' => $fileName] + $request->except(['tags']) ;
    //
        $post = Post::create($requestArray);

        if($request->tags){
                // $post->tags()->sync($request->tags);
                $post->tags()->sync($request['tags']);

        }
        return redirect()->route('posts.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $posts = Post::findOrfail($id);
        $categories = Category::all();
        $array =  [
            'selectedTags' => [],
        ];
         $array['selectedTags']  = $posts->find(request()->route()->parameter('post'))
        ->tags()->pluck('tag_id')->toArray();
        $tags = Tag::all();
        return view('dashboard.posts.edit',compact('posts','categories','tags'))->with($array);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $posts = Post::find($id);
        $requestArray = $request->all();

        $request->validate([
            'name'=> 'required',
            'title'=> 'required',
            'body'=> 'required|min:20',
            'category_id'=> 'required|numeric',
        ]);

// , 'small_image' => $fileName2 , 'Big_image' => $fileName
        $post = ['user_id' => auth()->user()->id ] + $request->except(['tags']);
        $posts->update($post);

        if($request->tags){
                // $post->tags()->sync($request->tags);
                $posts->tags()->sync($request['tags']);

        }
        return redirect()->route('posts.index');
    }

    public function updateimage(Request $request, $id)
    {

        $posts = Post::find($id);
        $request->validate([
            'Big_image'=> 'image|nullable',
            'small_image'=> 'image|nullable',
        ]);
        $post =[];
        if($request->Big_image && $request->Big_image !=''){


            $file = $request->file('Big_image');
                $fileName = time().'.'.$file->getClientOriginalExtension();
                $file->move(public_path('images/Big_image/') , $fileName);
                $post = [  'Big_image' => $fileName ];

          }
          if($request->small_image && $request->Big_image !=''){

            $file = $request->file('small_image');
            $fileName2 = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('images/small_image/') , $fileName2);
            $post += ['small_image' => $fileName2];
          }

    // $requestArray =   $request->except(['tags']) ;
    //
        // $post = [ 'small_image' => $fileName2 , 'Big_image' => $fileName ];

        $posts->update($post);
        return redirect()->route('posts.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        // Storage::disk('public')->delete('small_image/'.$post->small_image);
        // Storage::disk('public')->delete('Big_image/'.$post->Big_image);
        // $post =  Post::findOrfail($id);
        $post->likes()->delete();

        $post->delete();

        return redirect()->route('posts.index');
    }
}
