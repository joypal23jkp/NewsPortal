<?php

namespace App\Http\Controllers;

use App\Models;
use App\User;
use Encore\Admin\Form\NestedForm;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use function Sodium\add;
use Illuminate\Support\Arr;

class NewsController extends Controller
{

    public function show($slug){

          $news = Models\News::whereSlug($slug)->first();
          $matching_category_news = [];
          $all_news = Models\News::where('category',$news->category);
          foreach ($all_news as $news_m){
              if ($news_m->category == $news->category){
                  $matching_category_news = $news_m;
              }
          }

          $category = $news->category;
//        $news = Model\News::findOrFail(1);
        return view('news',['news' => $news,'category' => $category]);

    }

    public function update($id){
        $news = Models\News::find($id);
        $news->likes = $news->likes+1;
        $news->save();
        return \Redirect::back();
      }


}
