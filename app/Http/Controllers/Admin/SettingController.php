<?php

namespace App\Http\Controllers\Admin;

use App\Models\Setting;



use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    
    public function index()
    {
        return view('admin.setting.index');
    }



    public function update(Request $request)
    {

        $keys = $request->except('_token');

        foreach ($keys as $key => $value)
        {
            Setting::set($key, $value);
        }

        return redirect()->route('admin.settings')->withMessage('Setting update successfully.');
    }


}
