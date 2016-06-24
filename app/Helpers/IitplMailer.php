<?php
namespace App\Helpers;
use Mail;
class IitplMailer {
	public static function sendemail($pagename='',$mailData='',$data='') {
        
        if($pagename == '' || $mailData == '' || $data==''){
        	return 'Missing Args';
        }

		Mail::send($pagename, $mailData, function ($message) use ($data) {
            $message->from(env('EMAILFROM'), env('EMAILNAME'));
            $message->to($data['email'], $name = $data['name']);
            $message->bcc(env('ADMINEMAIL1'), $name = env('ADMINNAME1'));
            $message->bcc(env('ADMINEMAIL2'), $name = env('ADMINNAME2'));
            $message->subject($data['subject']); 
        });
        
        return true;	 
    }
    public static function sendemailwithoutname($pagename='',$mailData='',$data='') {
        
        if($pagename == '' || $mailData == '' || $data==''){
            return 'Missing Args';
        }

        Mail::send($pagename, $mailData, function ($message) use ($data) {
            $message->from(env('EMAILFROM'), env('EMAILNAME'));
            $message->to($data['email']);
            $message->bcc(env('ADMINEMAIL1'), $name = env('ADMINNAME1'));
            $message->bcc(env('ADMINEMAIL2'), $name = env('ADMINNAME2'));
            $message->subject($data['subject']); 
        });
        
        return true;     
    }

    public static function sendemailwithattach($pagename,$mailData,$data) {
    	if($pagename == '' || $mailData == '' || $data==''){
        	return 'Missing Args';
        }
		Mail::send($pagename, $mailData, function ($message) use ($data) {
		    $message->from(env('EMAILFROM'), env('EMAILNAME'));
		    $message->to($data['email']);
		    $message->bcc(env('ADMINEMAIL1'), $name = env('ADMINNAME1'));
		    $message->bcc(env('ADMINEMAIL2'), $name = env('ADMINNAME2'));
		    $message->subject($data['subject']); 
		    $message->attach($data['pathToFile']);
		});
		return true;
	}
}
?>