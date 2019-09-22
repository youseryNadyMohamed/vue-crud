<?php

namespace App\Http\Controllers\Api;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(['status'=>'success','data'=>Post::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $validation=Validator::make($request->all(),[
           'title'=>'required',
           'body'=>'required'
       ]);
       if ($validation->fails()){
           return response()->json(['status'=>'error','errors'=>$validation->errors(),422]);
       }
        $post =new Post();
        $post->title=$request->title;
        $post->body=$request->body;
        if ($post->save()){
            return response()->json(['status'=>'success','data'=>$post],201);
        }else{
            return response()->json(['status'=>'error'],500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post=Post::find($id);
        if (empty($post)){
            return response()->json(['status'=>'error'],404);
        }else{
            return response()->json(['status'=>'success','data'=>$post],200);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post =Post::find($id);

        if (empty($post)){
            return response()->json(['status'=>'error'],404);
        }

        $validation=Validator::make($request->all(),[
            'title'=>'required',
            'body'=>'required'
        ]);
        if ($validation->fails()){
            return response()->json(['status'=>'error','errors'=>$validation->errors(),422]);
        }
        $post->title=$request->title;
        $post->body=$request->body;
        if ($post->update()){
            return response()->json(['status'=>'success','data'=>$post],201);
        }else{
            return response()->json(['status'=>'error'],500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post =Post::find($id);

        if (empty($post)){
            return response()->json(['status'=>'error','message'=>'this post not found'],404);
        }elseif ($post->delete()){
            return response()->json(['status'=>'success','data'=>$post],200);
        }else{
            return response()->json(['status'=>'error'],500);
        }
    }
}
