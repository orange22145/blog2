<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogPost;
use App\Models\BlogComment;
//  ブログ記事を投稿&取得するコントローラー
class BlogPostController extends Controller
{

<<<<<<< HEAD
    public function zzzzz(){
        dd("aaaak");
                
            }
=======
<<<<<<< HEAD
    public function fuck(){
        dd("fっっｚ");
                
            }
=======
    public function aaaaaaa22111(){
dd("更新--aaaaa");
        
    }
>>>>>>> cecbfe1573a39ae5b9efb9dfad4cda1d72825aeb
>>>>>>> 94e8a0f7a539e74efd0fd86e2e1fa81a24cb24aa
    //ブログ記事を投稿
 public function postBlogArticle(Request $request)
    {
        $data = ([

            'post_content' => $request->input('post_content'),
            'post_title' => $request->input('post_title'),
            'post_date' => now(),
        ]);

        BlogPost::create($data);

        return redirect()->back()->with('success', $request->input('post_title').':投稿完了');
    }
    //ブログ記事のトップ表示
    public function index()
    {
        //1ページに表示する記事数
        $post_limit=5;    
        //ブログ記事を取得
     $posts = BlogPost::paginate($post_limit); 
     //サイドバーの記事を取得。
     $sidebar_posts = BlogPost::take($post_limit)->get();
    
    //コメント数取得。
     $commentCounts=[];
     foreach ($posts as $post) {
      
       

$comment_count = BlogComment::where('article_id', $post->id)->count();

array_push($commentCounts, $comment_count);
  
}



      
        return view('welcome', compact('posts','commentCounts','sidebar_posts')); // 
    }
}
