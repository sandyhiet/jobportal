<?php

namespace App\Http\Controllers\Subscriber;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use DB;
use Mail;
use Image;

class SubscroberController extends Controller
{
   

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function subscribe(Request $request)
    {

        
     
        $SubscriberEmail    = $request->SubscriberEmail;
        $newsletter         = $request->newsletter;


        $inputs = [
            'SubscriberEmail'        => $SubscriberEmail,
        ];

        $rules = [

            'SubscriberEmail'        => 'required|email|unique:subscriber,SubscriberEmail',
        ];

        // $messages = [

        //     'SubscriberEmail.unique'  => 'Already Subscribed!',
        // ];

        $validation = Validator::make($inputs, $rules);

        if( $validation->fails() ){
           return redirect()->back()->withInput()->with('errors', $validation->errors() );
        }

        //DB::statement('call insertSubscribers("'.$SubscriberEmail.'")');

        DB::table('subscriber')->insert([
            'SubscriberEmail' =>$SubscriberEmail
        ]);

        $subscribe_id = DB::table('subscriber')->select('*')->where('SubscriberEmail','=',$SubscriberEmail)->get();
        $id = $subscribe_id[0]->id;
        $hashvalue = rand(1,999999);
        // insert hash value in forget_password table
        
        DB::table('mailsubscriber_id')->insert([
              'mail_id' => $hashvalue,
              'subscriber_id' => $id
                
        ]);


         /*subscriber email start*/
        $mailmessage    = env('SITEURL').'/mailconfirm/'.$id.'/'.$hashvalue;
        $mailmessage1    =  'Please click the following link to activate your subscription immediately..';
        $subject         = 'Activate your Email Subscription';

        $mailData       = array('mailmessage'=>$mailmessage, 'mailmessage1'=>$mailmessage1);
        $data           = array( 'email' => stripslashes($SubscriberEmail),'subject' => $subject );       
        Mail::send('layout.mail.subscribers_mail_send', $mailData, function ($message) use ($data) {
            //return $CandidateEmail;
            $message->from(env('EMAILFROM'), env('EMAILNAME'));
            //$message->to($CandidateEmail)->cc('bar@example.com');
            $message->to($data['email']);
            $message->cc('mohammad.dastagir@intactinnovations.com');
            //$message->bcc($address, $name = null);
            //$message->replyTo($address, $name = null);
            $message->subject($data['subject']); 
        });



        /*subscriber email end*/

        /*subscriber email start*/

        // $mailmessage    = 'You have subscribe our newsletter successfully.';
        // $subject        = 'KBF Subscription Notification';
        // $mailData       = array('mailmessage'=>$mailmessage);
        // $data           = array('email' => $SubscriberEmail,'subject' => $subject);

        // Mail::raw($mailmessage, function ($message) use ($data) {
       
        //     $message->from(env('EMAILFROM'), env('EMAILNAME'));
        //     $message->to($data['email']);
        //     //$message->bcc('daud.csbt@gmail.com');
        //     $message->subject($data['subject']); 
            
        // });
        /*subscriber email end*/

        return redirect()->back()->withInput()->with('message', 'Subscription link is sent to your email..' );
    }

    public function deletesubscriber($id){


          DB::table('subscriber')->where('id', '=', $id)->delete();
          
         //return Redirect('testimonial.viewTestimonial');
          return redirect()->back()->with('message', 'Subscriber deleted.');


    }
    
    public function composemail(Request $req){
        $SendMessageTo = $req->SendMessageTo;
        $Subject = $req->Subject;
        $Message = $req->Message;
        $Attachment =$req->file('Attachment');
        $data = array('pageTital'=>'Compose Email');

        if($Attachment){
            

            $destinationPath ='mailattchment'; // upload path folder should be in public folder
            $extension = $Attachment->getClientOriginalExtension(); // getting image extension
            $originalName = $Attachment->getClientOriginalName();
            $size = $Attachment->getSize();
            $fileName = time().$originalName; // renameing image

            // condition to check type of file and size of file..
            if((($extension=='jpg') || ($extension=='png') || ($extension=='jpeg') || ($extension=='JPEG') || ($extension=='JPG') || ($extension=='PNG'))&&($size<5000000)){
                //save original
                Image::make($Attachment)->save($destinationPath.'/'.$fileName);
                
            } else {
                return redirect()->back()->withInput()->with('error', 'Only maximum 5MB jpg or png image is allowed.' );
            }
        } else {
            $fileName = '';
        }


        $allsubscribers = DB::table('subscriber')->select('SubscriberEmail')->get();    
            foreach ($allsubscribers as $key =>$subscriber) {

            $subscribermail = $allsubscribers[$key]->SubscriberEmail;

        //trigger email

            $mailmessage    =  $Message;
            
            $subject = 'subscribed successfuly';
            $pathToFile='mailattchment/'.$fileName;
            $mailData       = array('mailmessage'=>$mailmessage);
            $data           = array( 'email' => stripslashes($subscribermail),'subject' => $subject,'pathToFile' => $pathToFile );
           
            Mail::send('layout.mail.subscribers_reply', $mailData, function ($message) use ($data) {
                //return $CandidateEmail;
                $message->from(env('EMAILFROM'), env('EMAILNAME'));
                //$message->to($CandidateEmail)->cc('bar@example.com');
                $message->to($data['email']);
                $message->cc('daud.csbt@gmail.com');
                //$message->bcc($address, $name = null);
                //$message->replyTo($address, $name = null);
                $message->subject($data['subject']); 
                $message->attach($data['pathToFile']);
            });

         }

            return redirect()->back()->with('message', 'subscribed successfuly.');


    }

    

      
}
