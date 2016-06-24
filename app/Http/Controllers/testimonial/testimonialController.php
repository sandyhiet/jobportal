<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers\testimonial;

use App\Http\Controllers\testimonial\testimonialController;
use Illuminate\Http\Request;
use Validator;
use Redirect;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Image;


class testimonialController extends Controller
{
    public function insertTestimonial(Request $res){
       
       $clientName         = $res->clientName;
       $clientCompany      = $res->clientCompany;
       // $clientDesignation  = $res->clientDesignation;
       $testiMonial        = $res->testiMonial;
       $clientImage        = $res->file('clientImage');
	   
	   
     $inputs = [

            'clientName'        => $clientName,
            // 'news_category'        => $news_category,
            'clientCompany'     => $clientCompany,
            'testiMonial'     => $testiMonial,
            // 'newsThumbImage'     => $newsThumbImage,
            
        ];

        $rules = [

            'clientName'        => 'required',
            // 'news_category'     =>'required',
            'clientCompany'  => 'required',
            'testiMonial'  => 'required',
            // 'newsThumbImage'  => 'required',
            
            
        ];

        $messages = [

            'clientName.required'               => 'Please enter news title',
            // 'news_category.required'           => 'Please select news category',
            'clientCompany.required'  => 'Please enter news description',
            'testiMonial.required'  => 'Please select news main image',
            // 'newsThumbImage.required'  => 'Please select news thumbnail image',
           
        ];

        $validation = Validator::make($inputs, $rules, $messages);

        if( $validation->fails() ){
            return redirect()->back()->withInput()->with('errors', $validation->errors() );
        }




        if($clientImage){
            

            $destinationPath ='testimonialsImages'; // upload path folder should be in public folder
            $thumb128 ='testimonialsImages/thumb128'; // upload 128*128
            $thumb50 ='testimonialsImages/thumb50'; // upload 64*64
            $extension = $clientImage->getClientOriginalExtension(); // getting image extension
            $originalName = $clientImage->getClientOriginalName();
            $size = $clientImage->getSize();
            $fileName = time().$originalName; // renameing image

            // condition to check type of file and size of file..
            if((($extension=='jpg') || ($extension=='png'))&&($size<5000000)){

                //resize here
                Image::make($clientImage,array(
                    'width' => 128,
                    'height' => 128,
                    'crop' => true
                ))->save($thumb128.'/'.$fileName);

                Image::make($clientImage,array(
                    'width' => 50,
                    'height' => 50,
                    'crop' => true
                ))->save($thumb50.'/'.$fileName);
               
                $clientImage->move($destinationPath, $fileName); // uploading file to given path
                
            } else {
                return redirect()->back()->withInput()->with('error', 'Only maximum 5MB jpg or png image is allowed.' );
            }
        } else {
            $fileName = '';
        }

        DB::table('testimonials')->insert([
            'clientName'             => $clientName,
            'clientCompany'         => $clientCompany,
            'testiMonial'                => $testiMonial,
            'clientImage'                    => $fileName
        ]);

        return redirect()->back()->with('message', 'add testimonial.');


      }




  
    public function updateTestimonials(Request $res){

       $clientName         = $res->clientName;
       $clientCompany      = $res->clientCompany;
       // $clientDesignation  = $res->clientDesignation;
       $testiMonial        = $res->testiMonial;
	   
       
       $clientImage        = $res->clientImage;
       $clientImageFile    = $res->file('clientImage');

       $id                = $res->id;
      

        if($clientImageFile){
            

            $destinationPath    ='testimonialsImages'; // upload path folder should be in public folder
            $thumb128           ='testimonialsImages/thumb128'; // upload 128*128
            $thumb50 ='testimonialsImages/thumb50'; // upload 64*64
            $extension = $clientImageFile->getClientOriginalExtension(); // getting image extension
            $originalName = $clientImageFile->getClientOriginalName();
            $size = $clientImageFile->getSize();
            $fileName = time().$originalName; // renameing image

            // condition to check type of file and size of file..
            if((($extension=='jpg') || ($extension=='png'))&&($size<5000000)){

                //resize here
                Image::make($clientImageFile,array(
                    'width' => 128,
                    'height' => 128,
                    'crop' => true
                ))->save($thumb128.'/'.$fileName);

                Image::make($clientImageFile,array(
                    'width' => 50,
                    'height' => 50,
                    'crop' => true
                ))->save($thumb50.'/'.$fileName);
              
                $clientImageFile->move($destinationPath, $fileName); // uploading file to given path
                
            } else {
                return redirect()->back()->withInput()->with('error', 'Only maximum 5MB jpg or png image is allowed.' );
            }

            $updateFileName = $fileName;

        } else {
            $updateFileName = $clientImage;
        }

     
            DB::table('testimonials')
            ->where('id', $id)
            ->update([
             // 'id'                => $id,
            'clientName'              => $clientName,
            'clientCompany'           => $clientCompany,
            'testiMonial'             => $testiMonial,
            'clientImage'            => $updateFileName

                    
            ]);

           return redirect()->back()->with('message', 'add testimonial.');

     

    }



             public function deletetestimonial($id){

                DB::table('testimonials')->where('id', $id)->delete([

                      'id'   => $id,
                ]);

        return redirect()->back()->with('message', 'testimonial delete');

     


      }


                     
   

   


}
