<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator,Auth,Artisan,Hash,File,Crypt;
use App\Models\Notification;
use carbon\carbon;

define( 'API_ACCESS_KEY12', 'AAAAwSpc2jY:APA91bF8LVnSfNj2wjgYMjpXBQgkM113q0i9yt5iMRH91uKWcGbI-l9NtNK2EI2SLBRDTn_e77f9m0eFf-SNfNVQgMdPAmOC-mkIk2eGBpxrLHNxSqVuIV6UpWrXkXSV1YJv9M5A3jB_');

class BaseController extends Controller
{
    public  static function get_url(){
        return 'https://test.shwar3na.com';
    }

    public  static function getImageUrl($folder,$image){
        if($image)
            return BaseController::get_url() . '/uploads/'.$folder .'/'.$image;
        return BaseController::get_url() . '/uploads/Logo.png';

    }

    public static function saveImage($folder,$file)
    {
        $image = $file;
        $input['image'] = mt_rand(). time().'.'.$image->getClientOriginalExtension();
        $destinationPath_id = 'uploads/'.$folder.'/';
        $image->move($destinationPath_id, $input['image']);
        return $input['image'];

    }
    /*
     * TO Delete File From server storage
     */
    public static function deleteFile($folder,$file)
    {
        $destinationPath_id = '/uploads/'.$folder.'/'.$file;
        // $file = public_path('/uploads/'.$folder.'/'.$file);
        if(file_exists($file))
        {
            File::delete($file);
        }
    }



    public static function send_notification($firebase_token , $title, $body ,$user_id, $type, $data , $lang){
        
        $created_at = carbon::now()->toDateTimeString();
        $dateTime = date('Y-m-d H:i:s',strtotime('+2 hours',strtotime($created_at)));

                                 
        $msg = array
             (
           'body' 	=> $body,
           'title'	=> $title,
           'click_action' => "$type",
           "data" => "$data",
             );
       $fields = array
               (
                   'to'		=> $firebase_token,
                   'data'      => $msg,
                   'notification'	=> $msg
               );

       $headers = array
               (
                   'Authorization: key=' . API_ACCESS_KEY12,
                   'Content-Type: application/json'
               );
   #Send Reponse To FireBase Server	
           $ch = curl_init();
           curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
           curl_setopt( $ch,CURLOPT_POST, true );
           curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
           curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
           curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
           curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
           $result = curl_exec($ch );
           //echo $result;
           curl_close( $ch );
          

       $add =  new Notification;
       $add->title = $title;
       $add->body = $body;
       $add->user_id = $user_id;
       $add->type = $type;
       $add->data = $data;
       $add->is_read = 0;
       $add->created_at = $dateTime;
       $add->save();
}

}
