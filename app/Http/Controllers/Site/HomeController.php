<?php

namespace App\Http\Controllers\Site;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\BlogComment;
use App\Models\Category;
use App\Models\ContactUs;
class HomeController extends Controller
{
    public function index()
    {
        $latest_blogs= Blog::where('status','show')->with('admin')->orderBy('id','DESC')->take(5)->get();
        return view('site.home', compact('latest_blogs'));
    }

    public function blogs()
    {
        $blogs= Blog::where('status','show')->with('admin')->orderBy('id','DESC')->paginate(6);
        if(request()->has('category')){
           $blogs= Blog::where('status','show')->with('admin')->whereHas('category',function($q){
            $q->where('category_name', request()->category);
           })->orderBy('id','DESC')->paginate(6);

        }
         if(request()->has('tag')){
           $blogs= Blog::where('status','show')->with('admin')->whereHas('tags',function($q){
            $q->whereHas('tag', function($w){
                $w->where('tag_name',request()->tag);
            });
           })->orderBy('id','DESC')->paginate(6);

        }
        return view('site.blogs', compact('blogs'));
    }

    public function single_blog($slug){
        $blog= Blog::where('status','show')->where('slug',$slug)->with('admin')->first();
        return view('site.single-blog', compact('blog'));
    }

    public function store_comment(Request $request,$id){
        $blog= Blog::where('status','show')->findOrFail($id);
        $blogComment= BlogComment::create([
            'name' => $request->name,
            'email' => $request->email,
            'comment' => $request->comment,
            'blog_id' => $blog->id,
        ]);

        return back()->with('success', trans('translate.comment added successfully'));
    }

    public function contactus(){
        return view('site.contactus');
    }

    public function store_contact(Request $request){
        $contact= ContactUs::create([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
            'subject' => $request->subject,
        ]);

        return back()->with('success', trans('translate.your message has been sent successfully'));
    }
}
