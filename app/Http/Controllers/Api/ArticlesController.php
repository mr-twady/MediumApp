<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Log;
use Exception;
use App\Post;

class ArticlesController extends Controller
{
    
    public function index()
    {
        try
        {
            $articles = Post::select('posts.id','posts.author','users.name','posts.title','posts.content','posts.thumbnail_path','posts.created_at')
                        ->join('users','posts.author','=','users.id')
                        ->orderBy('posts.created_at','desc')
                        ->get();

            return (
                !empty($articles)?
                response()->success($articles, 'Articles Found', 200) :
                response()->error(null, 'No Articles Found', 400)
            );
        }
        catch(Exception $e)
        {   
            Log::error("Exception Occured ".$e);
            return response()->error(null, 'Internal Server Error', 500);
        }

    }
    

    public function show($id)
    {
        try
        {
            $article = Post::select('posts.id','posts.author','users.name','posts.title','posts.content','posts.thumbnail_path','posts.created_at')
                        ->join('users','posts.author','=','users.id')
                        ->where('posts.id',$id)
                        ->first();

            return (
                !empty($article)?
                response()->success($article, 'Article Retrieved', 200) :
                response()->error(null, 'No Article Retrieved', 400)
            );
        }
        catch(Exception $e)
        {   
            Log::error("Exception Occured ".$e);
            return response()->error(null, 'Internal Server Error', 500);
        }
    }

}
