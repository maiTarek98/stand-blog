<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Category;
use App\Models\BlogTag;
use App\Models\Tag;
use App\Http\Requests\Dashboard\StoreBlogRequest;
use App\Http\Requests\Dashboard\UpdateBlogRequest;
use Auth;
use Illuminate\Support\Str;

class BlogsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct()
    {
         $this->middleware('permission:blog-list|blog-create|blog-edit|blog-delete', ['only' => ['index','store']]);
         $this->middleware('permission:blog-create', ['only' => ['create','store']]);
         $this->middleware('permission:blog-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:blog-delete', ['only' => ['destroy']]);
    }
    
    public function index(Request $request)
    {
        $blogs = Blog::where(function ($q) use ($request) {
            return $q->when($request->search, function ($query) use ($request) {
            return $query->where('title', 'like', '%' . $request->search . '%');
          });
        })->orderBy('id','DESC')->paginate(5);
        return view('admin.blogs.index',compact('blogs'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorys = Category::get();
        $tags = Tag::get();
        return view('admin.blogs.create', compact('categorys','tags'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBlogRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBlogRequest $request)
    {
        $input = $request->except('_token');
        $input['admin_id']= Auth::guard('admin')->user()->id;
        $input['slug']= Str::slug($request->title);
        $blog = Blog::create($input);
       if(request()->hasFile('blog_image') && request()->file('blog_image')->isValid()){
            $blog->addMediaFromRequest('blog_image')->toMediaCollection('blog_image','blogs');
        }
        if($request->tag_id){
        foreach ($request->tag_id as $key => $value) {
            BlogTag::create([
                'blog_id' => $blog->id,
                'tag_id' => $value,
            ]);
        }
        }
        return redirect()->route('blogs.index')->with('success',trans('main.created successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\blog  $blogs
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        return view('admin.blogs.show',compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\blog  $blogs
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        $categorys = Category::get();
        $blogtags= BlogTag::select('blog_id')->where('blog_id', $blog->id)->get()->toArray();
        $tags = Tag::get();
        return view('admin.blogs.edit',compact('blog','categorys','blogtags','tags'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBlogRequest  $request
     * @param  \App\Models\Blog  $blogs
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBlogRequest $request, Blog $blog)
    {
        $input = $request->except('_token','_method');
        $blog->update($input);
        if(request()->hasFile('blog_image') && request()->file('blog_image')->isValid()){
            $blog->clearMediaCollection('blog_image');
            $blog->addMediaFromRequest('blog_image')->toMediaCollection('blog_image','blogs');
        }
        if($request->tag_id){
        foreach ($request->tag_id as $key => $value) {
            BlogTag::updateOrCreate([
                'blog_id' => $blog->id,
                'tag_id' => $value,
            ]);
        }
        }
        return redirect()->route('blogs.index')
                        ->with('success',trans('main.updated successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blogs
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        if($blog){
            $blog->clearMediaCollection('blog_image');
            $blog->delete();
        }
        
        return redirect()->route('blogs.index')
                        ->with('success', trans('main.deleted successfully'));

    }
}
