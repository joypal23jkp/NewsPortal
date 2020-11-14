<?php

namespace App\Http\Controllers\Admin;
use app\Charts;
use App\Charts\UserName;
use App\Models\Admin;
use App\Models\Comments;
use App\Models\News;
use App\User;
use Illuminate\Http\Request;
use ConsoleTVs\Charts\Classes\Echarts;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use PhpParser\Node\Stmt\Return_;

class AdminLoginController extends Controller
{
   public function index(){
       return view('admin/dashboard');
   }

   //Modify News
   public function modify(Request $request){
       $news = News::where('slug',$request->post('slug'))->first();

       if ($request->file('inputImage') !=null)
       {

           $this->validate($request,[
               'inputImage' =>'required|image|mimes:jpeg,jpg|max:1080'
           ]);

           $image = $request->file('inputImage');
           $new_name = rand().'.'.$image->getClientOriginalExtension();
           $image->move(public_path("image"),$new_name);
           $news->img_url = 'image/'.$new_name; ;
       }



       $news->category = $request->post('inputCategory');
       $news->title = $request->post('title');
       $news->body = $request->post('body');
       $news->save();
       return \Redirect::back();

   }
   public function profile(){
       return view('admin\admin_profile');
   }
 // Update Admin
   public function update(Request $request){

       $this->validate($request,[
           'inputImage' =>'required|image|mimes:jpeg,jpg|max:1080'
       ]);

       $image = $request->file('inputImage');
       $u_name = rand().'.'.$image->getClientOriginalExtension();

       $image->move(public_path("image/admin"),$u_name);

       $user = Admin::where('id', \Auth::guard('admin')->user()->id)->first();
       $user->name = $request->post('name');
       $user->img_url = 'image/admin/'.$u_name;
       $user->email = $request->post('email');
       $user->address = $request->post('address');
       $user->contact = $request->post('contact');
       $user->save();
       return \Redirect::back();
       return 'sdfsdf';
   }
   public function add(Request $request){
       $this->validate($request,[
           'inputImage' =>'required|image|mimes:jpeg,jpg,png|max:1080'
       ]);
//       dd($request);

       $image = $request->file('inputImage');
       $new_name = rand().'.'.$image->getClientOriginalExtension();
       $image->move(public_path("image"),$new_name);

       $title = $request->input('inputTitle');
       $category = $request->input('inputCategory');
       $body = $request->input('inputBody');
//      dd($title.$category.$body."  ".'image/'.$new_name." ".Str::slug($title, '-'));
       $news = new News;
       $news->title = $title;
       $news->category = $category;
       $news->body = $body;
       $news->likes = 0;
       $news->img_url = 'image/'.$new_name;
       $news->slug = Str::slug($title, '-');

       $news->save();
       return \Redirect::back();
//       return 'dfsfsdfsdfsdf';
   }
   public function showNewsForm(){
       return view('admin.create_news');
   }

   public function deleteUser(Request $request){
       User::where('id',$request->post('user_id'))->delete();
       return \Redirect::back();
   }

   //Update User
   public function modifyUser(Request $request){
       $user = User::where('id', $request->post('id') )->first();


       if ($request->file('inputImage') !=null)
       {
           $this->validate($request,[
           'inputImage' =>'required|image|mimes:jpeg,jpg,png|max:1080'
            ]);
           $image = $request->file('inputImage');

           $u_name = rand().'.'.$image->getClientOriginalExtension();
           $image->move(public_path("image/user"),$u_name);
           $user->img_url = 'image/user/'.$u_name;
           $user->name = $request->post('name');
           $user->email = $request->post('email');
           $user->address = $request->post('address');
           $user->contact = $request->post('contact');
           $user->save();
       }
       else{
           $user->name = $request->post('name');
           $user->email = $request->post('email');
           $user->address = $request->post('address');
           $user->contact = $request->post('contact');
           $user->save();
       }


       return \Redirect::back();
   }
   public function showModifyView($id){
//       return ;
   if (News::where('id',$id)->first()!= null)
       return view('admin.modify_news',['news' => News::where('id',$id)->first()]);
   else
       return redirect(route('admin-all-news'));
   }

   public function comment(Request $request){
       if ($request->post('comment') != null) {
           $comment = new Comments();
           $comment->user_id = \Auth::guard('admin')->user()->id;
           $comment->news_id = $request->post('news_id');
           $comment->comment_body = $request->post('comment');
           $comment->save();
           return \Redirect::back();
       } else {
           return \Redirect::back();
       }
   }


}
