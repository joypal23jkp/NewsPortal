<?php

namespace App\Http\Controllers\Admin;

use App\Models\Comments;
use App\Models\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
   public function showall(){
       $all_news = News::all();
       return view('admin/all-news',['news'=>$all_news]);
   }
   public function singleNews($id){
//       return News::where('id',$id)->first();
     return view('admin/single_news',['news' => News::where('id',$id)->first()]);
   }
    public function delete(Request $request){
       Comments::where('news_id',News::where('id',$request->post('news_id'))->first()->id)->delete();
        News::where('id',$request->post('news_id'))->delete();
        return \Redirect::back();
    }
}
