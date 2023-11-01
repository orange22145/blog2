<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogComment;
//コメント投稿のコントローラー
class CommentController extends Controller
{
//コメント投稿
    public function postComment(Request $request)
    {
        $name = $request->input('name');

   
        $data = ([

            'article_id'  => $request->input('article_id'),
                
            'comment_content' => $request->input('comment_content'),
            'comment_name' => $request->input('comment_name'),
            'comment_date' => now(),
        ]);

        BlogComment::create($data);

        return redirect()->back();
    }
   

}
