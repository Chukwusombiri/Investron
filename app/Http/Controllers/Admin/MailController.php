<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\MailSendMail;
use App\Models\User;
use App\Notifications\BulkEmailNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class MailController extends Controller
{
    public function getmail($email=null){ 
        $sentRecipients = [];        
        if(session()->has('isBulk')){
            session()->forget('isBulk');
        }   
        if($email==null){
            $emailList = User::select('email')->get();
            foreach ($emailList as $key => $value) {
                $sentRecipients[] = $value->email;
            }
            session()->put('isBulk','yes');
        }else{  
            $sentRecipients = json_decode($email,true);                   
        }       
        return view('admin.getmail')->with('sentRecipients',$sentRecipients);
    }    
}
