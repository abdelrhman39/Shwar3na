<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCity;
use App\Models\Location;
use App\Models\User;
use carbon\carbon;
use App\Http\Requests\AreaLocationRequest;

class AreaLocationController extends Controller
{
    public function Area_page(){
        
        $data = SubCity::Selection()->get();

        return view('dashboard.Area.show',  ['data' => $data]);
    }

    public function edit($area_id){

        $data = SubCity::selection()->find($area_id);

        if (!$data)
            return redirect()->route('admin.Area')->with(['error' => 'هذة المنطقة غير موجود ']);

        return view('dashboard.Area.edit', ['data' => $data]);
    }


    public function update($area_id, AreaLocationRequest $request){
        
        $data = SubCity::where('id', $area_id)->first();

        $updateArea = SubCity::where('id', $area_id)->update([
                                                                "name" => $request->name,
                                                                ]);

        return redirect()->route('admin.Area')->with(['success' => "تم تعديل المنطقة بنجاح"]);
    }


    public function destroy($area_id){
      
        $delete = SubCity::where('id', $area_id)->delete();
      
        return redirect()->route('admin.Area')->with(['success' => "تم حزف المنطقة بنجاح"]);

    }

    public function newArea (){
        return view('dashboard.Area.add');
    }


    public function add_area(AreaLocationRequest $request){
        
        $add = new SubCity;
        $add->name = $request->name;
        $add->city_id = 1;
        $add->save();
    
        $add_location = new Location;
        $add_location->name = $request->name;
        $add_location->subCity_id = $add->id;
        $add_location->save();
        
        return redirect()->route('admin.Area')->with(['success' => "تم أضافة المنطقة بنجاح"]);
    }


    public function location_page($area_id){
        
        $data = Location::Selection()->where('subCity_id',  $area_id)->get();

        $area_name = SubCity::where('id',  $area_id)->value('name');
        
        return view('dashboard.Area.location.show',  [ 'area_id' => $area_id , 'area_name' => $area_name,'data' => $data]);
    }


    public function location_Edit($location_id){
        $data = Location::selection()->find($location_id);

        if (!$data)
            return redirect()->route('admin.Area')->with(['error' => 'هذة المنطقة غير موجود ']);

        return view('dashboard.Area.location.edit', ['data' => $data]);
    }


    public function location_update($location_id, AreaLocationRequest $request){
        
        $data = Location::where('id', $location_id)->first();


        $updateCat = Location::where('id', $location_id)->update([ "name" => $request->name]);

        return redirect()->route('admin.location',$data->subCity_id)->with(['success' => "تم تعديل المنطقة بنجاح"]);
    }


    public function newLocation ($area_id){
        return view('dashboard.Area.location.add', ['area_id' => $area_id]);
    }


    public function add_location($area_id , AreaLocationRequest $request){
        
        $add = new Location;
        $add->name = $request->name;
        $add->subCity_id = $area_id;
        $add->save();

        return redirect()->route('admin.location', $area_id)->with(['success' => "تم أضافة المنطقة بنجاح"]);

    }


    public function destroy_location($location_id){
       
        $area_id = Location::where('id', $location_id)->value('subCity_id');
        $delete = Location::where('id', $location_id)->delete();
      
        return redirect()->route('admin.location', $area_id)->with(['success' => "تم حزف المنطقة بنجاح"]);

    }
}
