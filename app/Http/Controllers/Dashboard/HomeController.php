<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Charts\UserChart;
use App\Models\Admin;
use Location;

use DB;
use App;
class HomeController extends Controller
{
    public function index()
    {
        $users = User::select(\DB::raw("COUNT(*) as count"))
                    ->whereYear('created_at', date('Y'))
                    ->groupBy(\DB::raw("Month(created_at)"))
                    ->pluck('count');

        $usersChart = new UserChart;
        $usersChart->labels(['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']);
        $usersChart->dataset(trans('main.usersChart'), 'line', $users)->options([
            'fill' => 'true',
            'borderColor' => '#51C1C0'
        ]);

        $ip = Admin::orderBy('id','DESC')->take(10)->get();
        $admin_ip=[];
        foreach($ip as $val){
            array_push($admin_ip, Location::get($val->ip_address));
        }
        $adminsCount = Admin::count();
        $usersCount = User::count();
        return view('admin.home' , compact('adminsCount','usersCount','usersChart','admin_ip'));
    }

    public function loginPage(){
        return view('admin.login');
    }

    public function signin(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
   
        $credentials = $request->only('email', 'password');
        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->intended('admin/dashboard')
                        ->with('success',trans('main.signed in'));
        }
        return redirect("admin/login")->with('error',trans('main.invalid data'));

    }

    public function adminLogout()
    {
        Auth::guard('admin')->logout();
        return redirect("admin/login")->with('error',trans('main.logout success'));
    }


    function changeLang($langcode){
    
      App::setLocale($langcode);
      session()->put("lang_code",$langcode);
      return redirect()->back();
  }  

}
