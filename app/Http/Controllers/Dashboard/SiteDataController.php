<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AboutRequest;
use carbon\carbon;
use App\Models\AboutUs;

class SiteDataController extends Controller
{

    public function aboutUs_data(){
        
        $data = AboutUs::where('id', 1)->first();

        return view('dashboard.site_data.about_us.show' , ['data' => $data]);
    }

    public function update_aboutUs(AboutRequest $request){
        $created_at = carbon::now()->toDateTimeString();
        $dateTime = date('Y-m-d H:i:s',strtotime('+2 hours',strtotime($created_at)));
       
        $update = AboutUs::where('id' , 1)->update([
            "email" => $request->email,
            "phone" => $request->phone,
            "address" => $request->address,
            "facbook" => $request->facbook,
            "instgram" => $request->instgram,
            "whatsApp" => $request->whatsApp,
            "about_data" => $request->about_data,
            "updated_at" => $dateTime,
        ]);

        return redirect()->route('admin.aboutus')->with(['success' => "تم تعديل البيانات بنجاح"]);
    }
}
