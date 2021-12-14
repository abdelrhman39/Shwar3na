<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Manage\BaseController;
use carbon\carbon;
use App\Models\Package;
use App\Models\PackageDetails;
use App\Http\Requests\PackageRequest;

class PackagesController extends Controller
{
    
    public function package_page(){
        
        $data = Package::Selection()->get();

        return view('dashboard.packages.show',  ['data' => $data]);
    }
    

    public function edit($package_id){

        $package = Package::selection()->find($package_id);

        if (!$package)
            return redirect()->route('admin.Packages')->with(['error' => 'هذة الباقة غير موجود ']);

        return view('dashboard.packages.edit', ['package' => $package]);
    }


    public function update($package_id, PackageRequest $request){
        
        $data = Package::where('id', $package_id)->first();

        $updateCat = Package::where('id', $package_id)->update([
                                                                "name" => $request->name,
                                                                "title" =>  $request->title,
                                                                "price" => $request->price,
                                                                "discount" => $request->discount,
                                                                ]);

        return redirect()->route('admin.Packages')->with(['success' => "تم تعديل الباقات بنجاح"]);
    }

  

    public function newPackDetails ($package_id){
        $package_name = Package::where('id',  $package_id)->value('name');
        
        return view('dashboard.packages.add', ['package_id' => $package_id , "package_name" => $package_name]);
    }


    public function add_PackDetails($package_id, Request $request){
        
        if( $request->text == null){
            return redirect()->route('admin.Packages.newDetails', $package_id)->with(['error' => "المحتوى مطلوب"]);

        }else{
            $add = new PackageDetails;
            $add->text = $request->text;
            $add->package_id = $package_id;
            $add->save();
        
            return redirect()->route('admin.Packages.details', $package_id)->with(['success' => "تم أضافة التفصيل بنجاح"]);
        }
    }


    public function packageDetails_page($package_id){
        
        $data = PackageDetails::Selection()->where('package_id',  $package_id)->get();

        $package_name = Package::where('id',  $package_id)->value('name');
        
        return view('dashboard.packages.details',  [ 'package_id' => $package_id , 'package_name' => $package_name,'data' => $data]);
    }

    public function destroy($packageDetails_id){
       
        $package_id = PackageDetails::where('id',  $packageDetails_id)->value('id');

        $delete = PackageDetails::where('id', $packageDetails_id)->delete();
      
        return redirect()->route('admin.Packages.details', $package_id)->with(['success' => "تم الحزف بنجاح"]);

    }

    public function PackDetails_Edit($packageDetails_id){

        $data = PackageDetails::selection()->find($packageDetails_id);
        $package_name = Package::where('id',  $data->package_id)->value('name');

        if (!$data)
            return redirect()->route('admin.Packages.details' , $data->package_id)->with(['error' => 'هذا القسم غير موجود ']);

        return view('dashboard.packages.editDetails', ['data' => $data , 'packageDetails_id' => $packageDetails_id , "package_id" => $data->package_id,  'package_name' => $package_name ]);
    }


    public function PackDetails_update($packageDetails_id, Request $request){
        
        $data = PackageDetails::where('id', $packageDetails_id)->first();

        if( $request->text == null){
            return redirect()->route('admin.Packages.editdetails', $packageDetails_id)->with(['error' => "المحتوى مطلوب"]);

        }else{
            $updateCat = PackageDetails::where('id', $packageDetails_id)->update([ "text" => $request->text]);
            
            return redirect()->route('admin.Packages.details',$data->package_id)->with(['success' => "تم تعديل المحتوى بنجاح"]);
        }
    }
}
