<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SocialMedia;
use App\Http\Requests\Dashboard\StoreSocialRequest;
use App\Http\Requests\Dashboard\UpdateSocialRequest;
use Auth;
class SocialsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct()
    {
         $this->middleware('permission:social-list|social-create|social-edit|social-delete', ['only' => ['index','store']]);
         $this->middleware('permission:social-create', ['only' => ['create','store']]);
         $this->middleware('permission:social-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:social-delete', ['only' => ['destroy']]);
    }
    
    public function index(Request $request)
    {
        $socials = SocialMedia::where(function ($q) use ($request) {
            return $q->when($request->search, function ($query) use ($request) {
            return $query->where('social_name', 'like', '%' . $request->search . '%');
          });
        })->orderBy('id','DESC')->paginate(5);
        return view('admin.socials.index',compact('socials'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.socials.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSocialRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSocialRequest $request)
    {
        $input = $request->except('_token');
        $input['admin_id']= Auth::guard('admin')->user()->id;
        $social = SocialMedia::create($input);
       
        return redirect()->route('socials.index')->with('success',trans('main.created successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SocialMedia  $socials
     * @return \Illuminate\Http\Response
     */
    public function show(SocialMedia $social)
    {
        return view('admin.socials.show',compact('social'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SocialMedia  $socials
     * @return \Illuminate\Http\Response
     */
    public function edit(SocialMedia $social)
    {
        return view('admin.socials.edit',compact('social'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\SocialRequest  $request
     * @param  \App\Models\SocialMedia  $socials
     * @return \Illuminate\Http\Response
     */
    public function update(SocialRequest $request, SocialMedia $social)
    {
        $input = $request->except('_token','_method');
        $social->update($input);
        
        return redirect()->route('socials.index')
                        ->with('success',trans('main.updated successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SocialMedia  $socials
     * @return \Illuminate\Http\Response
     */
    public function destroy(SocialMedia $social)
    {
        if($social){
            $social->delete();
        }
        
        return redirect()->route('socials.index')
                        ->with('success', trans('main.deleted successfully'));

    }
}
