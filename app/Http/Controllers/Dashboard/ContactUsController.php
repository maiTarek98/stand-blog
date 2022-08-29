<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactUs;
use Auth;
class ContactUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct()
    {
         $this->middleware('permission:contact-list|contact-create|contact-edit|contact-delete', ['only' => ['index','store']]);
         $this->middleware('permission:contact-create', ['only' => ['create','store']]);
         $this->middleware('permission:contact-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:contact-delete', ['only' => ['destroy']]);
    }
    
    public function index(Request $request)
    {
        $contacts = ContactUs::where(function ($q) use ($request) {
            return $q->when($request->search, function ($query) use ($request) {
            return $query->where('name', 'like', '%' . $request->search . '%')->orwhere('phone', 'like', '%' . $request->search . '%')->orwhere('subject', 'like', '%' . $request->search . '%')->orwhere('message', 'like', '%' . $request->search . '%');
          });
        })->orderBy('id','DESC')->paginate(5);
        return view('admin.contacts.index',compact('contacts'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ContactUs  $contacts
     * @return \Illuminate\Http\Response
     */
    public function show(ContactUs $contacts)
    {
        return view('admin.contacts.show',compact('contacts'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ContactUs  $contacts
     * @return \Illuminate\Http\Response
     */
    public function destroy(ContactUs $contacts)
    {
        if($contacts){
            $contacts->delete();
        }
        
        return redirect()->route('contacts.index')
                        ->with('success', trans('main.deleted successfully'));

    }
}
