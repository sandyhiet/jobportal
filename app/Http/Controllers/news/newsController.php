<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers\news;

use Illuminate\Http\Request;
use Validator;
use Redirect;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Image;



class newsController extends Controller
{
    public function insertNews(Request $res){
       
        $newsTitle         = addslashes($res->newsTitle);
        // $news_category     = $res->news_category;

        $newsTitle = preg_replace('/[^A-Za-z0-9 ]/', '', $newsTitle); // Removes special chars single space allowed.
        $newsTitle = str_replace(' ', '_', $newsTitle); // Replaces all spaces with underscore.
        $newsTitle = preg_replace('/_+/', '_', $newsTitle); // Replaces multiple underscore with single one.
        $newsTitle = strtolower($newsTitle);

        $newsDescription      = addslashes($res->newsDescription);
        $status      = $res->status;
       
       $newsImage      = $res->file('newsImage');
       // $newsThumbImage = $res->file('newsThumbImage');
      



        $inputs = [

            'newsTitle'        => $newsTitle,
            // 'news_category'        => $news_category,
            'newsDescription'     => $newsDescription,
            'newsImage'     => $newsImage,
            // 'newsThumbImage'     => $newsThumbImage,
            
        ];

        $rules = [

            'newsTitle'        => 'required',
            // 'news_category'     =>'required',
            'newsDescription'  => 'required',
            'newsImage'  => 'required',
            // 'newsThumbImage'  => 'required',
            
            
        ];

        $messages = [

            'newsTitle.required'               => 'Please enter news title',
            // 'news_category.required'           => 'Please select news category',
            'newsDescription.required'  => 'Please enter news description',
            'newsImage.required'  => 'Please select news main image',
            // 'newsThumbImage.required'  => 'Please select news thumbnail image',
           
        ];

        $validation = Validator::make($inputs, $rules, $messages);

        if( $validation->fails() ){
            return redirect()->back()->withInput()->with('errors', $validation->errors() );
        }


        $newsExist = DB::table('news')->select('*')->where('newsTitle', '=', $newsTitle)->count();
        if($newsExist > 0){
            return redirect()->back()->withInput()->with('singleerror', 'Duplicate news title.' );
        }

        $fileName = '';
        

        // Page image 


        if($newsImage){
            

            $destinationPath    ='newsImages'; // upload path folder should be in public folder
            $thumb800x530       ='newsImages/thumb800x530'; // upload 128*128
            

            $extension      = $newsImage->getClientOriginalExtension(); // getting image extension
            $originalName   = $newsImage->getClientOriginalName();
            $size           = $newsImage->getSize();
            $fileName      = time().$originalName; // renameing image

            // condition to check type of file and size of file..
            if((($extension=='jpg') || ($extension=='png') || ($extension=='jpeg') || ($extension=='JPEG') || ($extension=='JPG') || ($extension=='PNG'))&&($size<5000000)){


                Image::make($newsImage,array(
                    'width' => 800,
                    'height' => 530,
                    'crop' => true
                ))->save($thumb800x530.'/'.$fileName);
                //save original
                Image::make($newsImage)->save($destinationPath.'/'.$fileName);


                
                
            } else {
                return redirect()->back()->withInput()->with('error', 'Only maximum 5MB jpg or png image is allowed.' );
            }
        } else {
            $fileName1 = '';
        }


        // Thumbnail image


        

        //return $newsTitle;
        DB::table('news')->insert([
            'newsTitle'       => $newsTitle,
            'newsDescription'       => $newsDescription,
            'status'          => $status,
            'newsImage'          => $fileName,
            // 'newsThumbImage'  => $thumbnailfileName,
            // 'news_category_id' => $news_category

        ]);
       

        return redirect()->back()->with('message', 'News Added.');


    }




   

        public function Delete_news($id){

                DB::table('news')->where('id', $id)->delete([

                      'id'   => $id,
                ]);

        return redirect()->back()->with('message', 'news delete');

     


      }
    
  

   
    public function updateNews(Request $res){

       $newsTitle         = addslashes($res->newsTitle);
       $oldnewsTitle      = $res->oldnewsTitle;

       

        $newsTitle = preg_replace('/[^A-Za-z0-9 ]/', '', $newsTitle); // Removes special chars single space allowed.
        $newsTitle = str_replace(' ', '_', $newsTitle); // Replaces all spaces with underscore.
        $newsTitle = preg_replace('/_+/', '_', $newsTitle); // Replaces multiple underscore with single one.
        $newsTitle = strtolower($newsTitle);
        
       // $news_category     = $res->news_category;
       $newsDescription   = addslashes($res->newsDescription);
       $id                = $res->id;
       $status            = $res->status;       
       $newsImage         = $res->file('newsImage');
        $oldnewsImage      = $res->oldnewsImage;


       $inputs = [

            'newsTitle'        => $newsTitle,
            'newsDescription'     => $newsDescription,
            
        ];

        $rules = [

            'newsTitle'        => 'required',
            'newsDescription'  => 'required',
            
            
        ];

        $messages = [

            'newsTitle.required'               => 'Please enter News title',
            'newsDescription.required'  => 'Please enter News description',
           
        ];

        $validation = Validator::make($inputs, $rules, $messages);

        if( $validation->fails() ){
            return redirect()->back()->withInput()->with('errors', $validation->errors() );
        }

        if($newsTitle != $oldnewsTitle){
            $newsExist = DB::table('news')->select('*')->where('newsTitle', '=', $newsTitle)->count();
            if($newsExist > 0){
                return redirect()->back()->withInput()->with('singleerror', 'Duplicate news title.' );
            }
        }


        // Page image 

        if($newsImage){
            

            $destinationPath    ='newsImages'; // upload path folder should be in public folder
            $thumb800x530       ='newsImages/thumb800x530'; // upload 128*128
            

            $extension      = $newsImage->getClientOriginalExtension(); // getting image extension
            $originalName   = $newsImage->getClientOriginalName();
            $size           = $newsImage->getSize();
            $fileName      = time().$originalName; // renameing image

            // condition to check type of file and size of file..
            if((($extension=='jpg') || ($extension=='png') || ($extension=='jpeg') || ($extension=='JPEG') || ($extension=='JPG') || ($extension=='PNG'))&&($size<5000000)){


                Image::make($newsImage,array(
                    'width' => 800,
                    'height' => 530,
                    'crop' => true
                ))->save($thumb800x530.'/'.$fileName);
                //save original
                Image::make($newsImage)->save($destinationPath.'/'.$fileName);


                
                
            } else {
                return redirect()->back()->withInput()->with('error', 'Only maximum 5MB jpg or png image is allowed.' );
            }
        } else {
            $fileName = $oldnewsImage;
        }
        

        DB::table('news')
            ->where('id', $id)
            ->update([
                'newsTitle'      => $newsTitle,
                'newsDescription'=> $newsDescription,
                'status'         => $status,
                'newsImage'      => $fileName
                

        ]);
       return redirect()->back()->with('message', 'News updated.');

    }

   

   


     


    


}
