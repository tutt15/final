<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Product;
use App\News;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function postComment($id, Request $rq){
		$product             = Product::find($id);
		$new             	 = News::find($id);
		$comment             = new Comment;
		$comment->product_id = $id;
		$comment->new_id 	 = $id;
		$comment->user_id    = Auth::user()->id;
		$comment->comment    = $rq->comment;
		$comment->save();
		return redirect()->back()->with('thongbao', 'Bình luận thành công');
    }
}
