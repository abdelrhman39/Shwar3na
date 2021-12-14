<?php

namespace App\Http\Controllers\Apis\UserAuthentication;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiResponseTrait;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Validator,Auth,Artisan,Hash,File,Crypt;
use App\Models\User;
use Carbon\carbon;

class ForgetPassController extends Controller
{
    use ApiResponseTrait;


    public function forget_password (Request $request){
    
        $user_email = $request->input('email');
        
        $check_email = User::where('email' , $user_email)->first();

        if($check_email == NULL){
            return $this->apiResponseMessage( 0, "البريد الالكترونى غير موجود ");
        }

        $generate_code = mt_rand(100000, 999999);
        
        $update_code_pass = User::where('email', $user_email)->update(['password_code' => $generate_code]);
        
        
        
            $to = $user_email;
            $subject = " Shwar3na App";
            
            $msg = '
            <html>
            <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
            <title>Shwar3na Password</title>
            </head>
            <body>
            <h2>Shwar3na Reset Password</h2>
            
            <p style="display:rlt;">Shwar3na App has recieved a request to reset the password for your account. If you did not request to reset your password, please ignore this email. </p>
            <h4 style="text-align:center;"> Confirmation code : <br>'.$generate_code.'</h4>
            </body>
            </html>
            ';
            
            // Always set content-type when sending HTML email
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            
            // More headers
            $headers .= 'From: <abdelrahman@shwar3na.com>' . "\r\n";  

            mail($to,$subject,$msg,$headers);
            
             
            return $this->apiResponseMessage( 1, "تم أرسال كود التأكيد على بريدك الخاص");

    }


    public function Verification_code(Request $request){
        
        $email = $request->input('email');
           
        $check_email = User::where('email' , $email)->first();

        if($check_email == NULL){
            return $this->apiResponseMessage( 0, "البريد الالكترونى غير موجود");
        }
        $code = $request->input('code');
        
        $check_code = User::where([['email', $email],['password_code', $code]])->first();
        $uniqid = uniqid(30);
        $rand_start = rand(100000,1000000);
        
        $generate_pass = $uniqid.$rand_start;
        
        $update_code = User::where([['email', $email],['password_code', $code]])->update(["password_code" => $generate_pass]);

        $code = User::where([['email', $email]])->value('password_code');

        return $this->apiResponseData( $code , "كود التأكيد موجود بالفعل");

    }

    public function Reset_password(Request $request){

        $email = $request->input('email');
           
            $check_email = User::where('email' , $email)->first();

            if($check_email == NULL){
                return $this->apiResponseMessage( 0, "البريد الالكترونى غير موجود");
            }
            $code = $request->input('code');
            
            $password = bcrypt($request->password);
            
            $check_code = User::where([['email', $email],['password_code', $code]])->first();
            
            if($check_code != NULL){
                $update_pass = User::where([['email', $email], ['password_code', $code]])->update(['password' =>$password , 'password_code' => NULL]);
            
                return $this->apiResponseMessage( 1, "تم تغير كلمه السر بنجاح");
            }else{
                return $this->apiResponseMessage( 0, "يوجد خطأ حاول مره أخرى");

            }
    }

}
