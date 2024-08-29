<?php

namespace App\Http\Controllers;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function comment($proId){
        $data = request()->all('comment');
        $data['product_id'] = $proId;
        $data['user_id'] = auth()->id();
        if(Comment::create($data)){
            return redirect()->back();
        }
        return redirect()->back();
    }
    public function show_comment(){
        
    }
}
