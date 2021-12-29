<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Manage\BaseController;
use App\Models\User;
use App\Models\UserRole;
use carbon\carbon;
use Auth;
use Mail;
use App\Exports\UsersExport;
use App\Imports\UsersImport;
use App\Exports\PlacesExport;
use App\Imports\PlacesImport;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    public function Users_page(){

        $data = User::select('users.id', 'users.name', 'users.email', 'users.phone', 'users.image', 'users.created_at')
                    ->join('user_roles' , 'users.id' ,'=', 'user_roles.user_id')
                    ->where('user_roles.type', 2)->get();

        return view('dashboard.Users.show',  ['data' => $data]);
    }

    public function addMoney(Request $request,$id)
    {
        $user = user::findOrFail($id);
        $validate = $request->validate([
            'money' => 'required|numeric|',
        ]);


        if($validate){
            $user_balance = $user->deposit($validate['money']);
            if($user_balance){
                $total_user_balance = $user->balance;
                Mail::send('mails.added_money',['money'=>$validate['money'],
                'total_user_balance'=>$total_user_balance,'user'=>$user], function($message) use($request){


                    $message->to($request->user_email);
                $message->subject('تم شحن رصيدك في شوارعنا');
            });
            }
            session()->flash('success','تم الشحن بنجاح');
        }
        $data = User::select('users.id', 'users.name', 'users.email', 'users.phone', 'users.image', 'users.created_at')
                    ->join('user_roles' , 'users.id' ,'=', 'user_roles.user_id')
                    ->where('user_roles.type', 2)->get();
        return view('dashboard.Users.show',  ['data' => $data]);
    }


    // Start import/Export Users

    /**
    * @return \Illuminate\Support\Collection
    */
    public function importExportUsers()
    {
       return view('dashboard.users.importData');
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function export_users()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
        return back();
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function import_users()
    {
        Excel::import(new UsersImport,request()->file('file'));

        return back();
    }

    // End import/Export Users

    // Start import/Export Places
    /**
    * @return \Illuminate\Support\Collection
    */
    public function export_places()
    {
        return Excel::download(new PlacesExport, 'places.xlsx');
        return back();
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function import_places()
    {
        Excel::import(new PlacesImport,request()->file('file'));

        return back();
    }

    // End import/Export Places


}
