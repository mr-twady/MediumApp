<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreatePostRequest; 
use Auth;
use DB;
use Log;
use Exception;
use App\Post;
use App\Tag;

class ArticlesController extends Controller
{
    
    //The responsibility of this function is to display the view/page for all posts/articles
    public function index()
    {
        return view('articles');
    }

    
    //The only responsibility of this function is to display details of a single post/article
    public function show($postId)
    {
        $postId = preg_replace("/[^0-9]+/", "",$postId); // sanitize post id, allow only integers
        return view('single-article', ['postId'=>$postId]);
    }


    public function create(CreatePostRequest $createPostRequest)
    {

        try
        {
            $data = [
                'title' => $createPostRequest->title,
                'author' => Auth::user()->id,
                'content' => $createPostRequest->content,
                'tags' => $createPostRequest->tags
            ];
            // 'thumbnail_path' => json_encode($createPostRequest->photos),

            $imagePath = [];
            $photos = $createPostRequest->photos;
            for ($i=0; $i<count($photos); $i++)
            {
                $imageName = time().'.'.request()->photos[$i]->getClientOriginalExtension();
                request()->photos[$i]->move(public_path('images'), $imageName);
                $imagePath[$i] = 'images/'.$imageName;
            }

            $data['thumbnail_path'] = json_encode($imagePath);

            $post = Post::create($data);
            $tag = new Tag;
            $tag->name = json_encode($createPostRequest->tags);
            $tag->save();
            $post_tag = DB::table('post_tags')->insert(['post_id'=>$post->id, 'tag_id'=>$tag->id]);
            
            return view('home' , ['result' => 'Post Created']);
        }
        catch(Exception $e)
        {
            Log::error('Exception '.$e);
            return view('home' , ['result' => 'Some error occured on attempt to save post']);
        }
            
        
    }

}
