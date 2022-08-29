<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GeneralSettings;
use App\Http\Traits\UploadImageTrait;
class SettingsController extends Controller
{
    use UploadImageTrait;
    public function index(GeneralSettings $settings){
        return view('admin.settings', compact('settings'));
    }

    public function update(GeneralSettings $settings, Request $request){
        $settings->site_name = $request->input('site_name');
        $settings->email = $request->input('email');
        $settings->mobile = $request->input('mobile');
        $settings->address = $request->input('address');
        if( $file = $request->file('logo') ) {
            $path = 'settings';
            $url = $this->uploadImg($file,$path,300,400);
            $settings->logo= $url;
        }
        $settings->save();
        
        return redirect()->back();
    }
}