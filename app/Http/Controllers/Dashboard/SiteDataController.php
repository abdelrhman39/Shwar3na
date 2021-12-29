<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AboutRequest;
use carbon\carbon;
use App\Models\AboutUs;
use App\Models\Team;
use App\Models\Testimonials;
use App\Http\Controllers\Manage\BaseController;
use File;

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
    public function team_data()
    {
        $team = Team::get();

        return view('dashboard.site_data.team.index' , ['team' => $team]);
    }

    public function add_team(Request $request)
    {
        $team = Team::get();
        $validated = $request->validate([
            'name' => 'required',
            'title' => 'required',
            'image'=>'required|image|mimes:png,jpg,jpeg',
            'facebook'=>'required',
            'twitter'=>'required',
        ]);
        $validated['image'] = $request->file('image') ? BaseController::saveImage("team" , $request->file('image')) : "img.png";

        $result = Team::create($validated);

        if($result){
            return redirect()->back()->with('success' , "تم  الاضافة بنجاح");
        }else{
            return redirect()->back()->with('erorr' , "هناك خطأما يرجي المحاولة!");
        }

        return view('dashboard.site_data.team.index' , ['team' => $team]);
    }

    public function delete_team($id)
    {
        $id_updete = Team::findorfail($id);
        file::delete('uploads/team/'.$id_updete->image);
        $deleteTeam = Team::where('id', $id)->delete();
        if($deleteTeam){
            return redirect()->back()->with('success','تم الحذف بنجاح');
        }else{
            return redirect()->back()->with('erorr' , "هناك خطأما يرجي المحاولة!");
        }
    }

    public function testimonials()
    {
        $testimonials = Testimonials::select()
        ->join('users','users.id','=','testimonials.user_id')
        ->select('testimonials.*','users.name','users.image')->get();

        return view('dashboard.site_data.testimonials.index' , ['testimonials' => $testimonials]);
    }
    public function delete_testimonials($id)
    {
        $result = Testimonials::where('id',$id)->delete();
        if($result){
            return redirect()->back()->with('success','تم الحذف بنجاح');
        }else{
            return redirect()->back()->with('erorr' , "هناك خطأ ما يرجي المحاولة!");
        }

    }

    public function approv_testimonials($id)
    {
        $aponin = Testimonials::where('id',$id)->get();

        if($aponin[0]->is_active == 0){
            $is = 1;
            session()->flash('success','تم القبول بنجاح');
        }else{
            $is = 0;
            session()->flash('success','تم الرفض بنجاح');
        }
        $result = Testimonials::where('id',$id)->update([
            'is_active' => $is,
        ]);
        if($result){
            return redirect()->back();
        }else{
            return redirect()->back()->with('erorr' , "هناك خطأ ما يرجي المحاولة!");
        }

    }
}
