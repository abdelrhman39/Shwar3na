<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AboutRequest;
use carbon\carbon;
use App\Models\AboutUs;
use App\Models\TeamShwar3na;
use App\Models\Testimonials;
use App\Models\User;
use App\Models\Admin;
use App\Http\Controllers\Manage\BaseController;
use File;
use Bavix\Wallet\Models\Wallet;
use Bavix\Wallet\Models\Transaction;
use Bavix\Wallet\Models\Transfer;


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
            'name'=> $request->name,
            "email" => $request->email,
            "phone" => $request->phone,
            "address" => $request->address,
            "facbook" => $request->facbook,
            "instgram" => $request->instgram,
            "whatsApp" => $request->whatsApp,
            "about_data" => $request->about_data,
            "updated_at" => $dateTime,
        ]);

        if ($request->hasFile('image')) {
            $id_updete = AboutUs::findorfail(1);
            $result_del = file::delete('uploads/about_us/'.$id_updete->image);
            $update = AboutUs::where('id' , 1)->update([
                'image'=> $request->file('image') ? BaseController::saveImage("about_us" , $request->file('image')) : "img.png",
            ]);
        }




        return redirect()->route('admin.aboutus')->with(['success' => "تم تعديل البيانات بنجاح"]);
    }
    public function team_data()
    {
        $team = TeamShwar3na::get();

        return view('dashboard.site_data.team.index' , ['team' => $team]);
    }

    public function add_team(Request $request)
    {
        $team = TeamShwar3na::get();
        $validated = $request->validate([
            'name' => 'required',
            'title' => 'required',
            'description'=> 'required|min:200',
            'image'=>'required|image|mimes:png,jpg,jpeg',
            'facebook'=>'required',
            'twitter'=>'required',
        ]);
        $validated['image'] = $request->file('image') ? BaseController::saveImage("team" , $request->file('image')) : "img.png";

        $result = TeamShwar3na::create($validated);

        if($result){
            return redirect()->back()->with('success' , "تم  الاضافة بنجاح");
        }else{
            return redirect()->back()->with('erorr' , "هناك خطأما يرجي المحاولة!");
        }

        return view('dashboard.site_data.team.index' , ['team' => $team]);
    }

    public function delete_team($id)
    {
        $id_updete = TeamShwar3na::findorfail($id);
        file::delete('uploads/team/'.$id_updete->image);
        $deleteTeam = TeamShwar3na::where('id', $id)->delete();
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

    public function all_wallet()
    {
        // $wallet_Transaction = Transaction::get();
        // $wallet_Transfer = Transfer::get();
        // $wallets = Wallet::get();


        // $transactions_user = Transaction::select()
        // ->join('users','users.id','=','transactions.payable_id')
        // ->select('transactions.*','users.name','users.email','users.id as user_id')
        // ->where('payable_type','App\Models\User')->get();

        // $transactions_admin = Transaction::select()
        // ->join('admins','admins.id','=','transactions.payable_id')
        // ->select('transactions.*','admins.name','admins.email','admins.id as user_id')
        // ->where('payable_type','App\Models\Admin')->get();

        // $Transfer = Transfer::select()
        // ->join('wallets','wallets.id','=','transfers.from_id')
        // ->join('users','users.id','=','transactions.payable_id')
        // ->select('transactions.*','users.name','users.email','users.id as user_id')
        // ->where('from_id','Bavix\Wallet\Models\Wallet')->get();

        $admins = Admin::get();
        $users = User::get();

        //Start All transactions Wallet ( Admins )
        foreach($admins as $admin){
            if(count($admin->transactions) > 0){
                $transactions_admin = $admin->transactions()
                ->join('Admins','Admins.id','=','transactions.payable_id')
                ->join('wallets','wallets.id','=','transactions.wallet_id')
                ->select('transactions.*','Admins.name','Admins.email','Admins.id as admin_id','wallets.balance as admin_balance')
                ->orderBy('transactions.id', 'desc')->get();
            }
        }

        //End All transactions Wallet ( Admins )

        //Start All transactions Wallet ( Users )
        foreach($users as $user){
            if(count($user->transactions) > 0){
                $transactions_users =$user->transactions()
                ->join('users','users.id','=','transactions.payable_id')
                ->join('wallets','wallets.id','=','transactions.wallet_id')
                ->select('transactions.*','users.name','users.email','users.id as user_id','wallets.balance as user_balance')
                ->orderBy('transactions.id', 'desc')->get();
            }
        }

        //End All transactions Wallet ( Users )


        //Start All transfers Wallet (User , Admins)
        foreach($users as $user){
            if(count($user->transfers) > 0){
                $transfers = $user->transfers()
                ->join('wallets','wallets.id','=','transfers.from_id')
                ->join('users','users.id','=','wallets.holder_id')
                ->join('Admins','Admins.id','=','transfers.to_id')
                ->join('transactions','transactions.id','=','transfers.deposit_id')
                ->select('transfers.*','transactions.amount','users.name','users.email','users.id as user_id','Admins.name as admin_name')
                ->orderBy('transfers.id', 'desc')->get();
            }
        }
        // dd($transfers);

        //End All transfers Wallet (User , Admins)


        return view('dashboard.site_data.wallets.index' ,
            ['transfers' => $transfers,'transactions_users'=>$transactions_users,
            'transactions_admin'=>$transactions_admin]);

    }
}
