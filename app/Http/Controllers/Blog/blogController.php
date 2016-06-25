<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers\Blog;

use Illuminate\Http\Request;
use Validator;
use Redirect;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Image;


class blogController extends Controller
{
    public function Addblogs(Request $res){
       
        $title         = addslashes($res->title);
        // $news_category     = $res->news_category;

        $title = preg_replace('/[^A-Za-z0-9 ]/', '', $title); // Removes special chars single space allowed.
        $title = str_replace(' ', '_', $title); // Replaces all spaces with underscore.
        $title = preg_replace('/_+/', '_', $title); // Replaces multiple underscore with single one.
        $title = strtolower($title);
        $name = $res->name;
        $date = $res->date;


        $content      = addslashes($res->content);
        $status      = $res->status;
       
        $blogImage      = $res->file('blogImage');
        $blogThumbImage = $res->file('blogThumbImage');
      



        $inputs = [

            'title'           => $title,
            'name'            => $name,
            'date'            => $date,
            // 'news_category'        => $news_category,
            'content'         => $content,
            'blogImage'       => $blogImage,
            'blogThumbImage'  => $blogThumbImage,
            
        ];

        $rules = [

            'title'          => 'required',
            'name'           => 'required',
            'date'           => 'required',
            // 'news_category'     =>'required',
            'content'        => 'required',
            'blogImage'      => 'required',
            'blogThumbImage' => 'required',
            
            
        ];

        $messages = [

            'title.required'               => 'Please enter title',
            'name.required'                => 'Please enter name',

            'date.required'                => 'Please enter date',

            // 'news_category.required'           => 'Please select news category',
            'content.required'             => 'Please enter content',
            'blogImage.required'           => 'Please select blogImage',
            'blogThumbImage.required'      => 'Please select thumbnail image',
           
        ];

        $validation = Validator::make($inputs, $rules, $messages);

        if( $validation->fails() ){
            return redirect()->back()->withInput()->with('errors', $validation->errors() );
        }


        // $newsExist = DB::table('news')->select('*')->where('newsTitle', '=', $newsTitle)->count();
        // if($newsExist > 0){
        //     return redirect()->back()->withInput()->with('singleerror', 'Duplicate news title.' );
        // }

        $fileName = '';
        

        // Page image 


        if($blogImage){
            

            $destinationPath    ='blogImages'; // upload path folder should be in public folder
            $thumb750x395       ='blogImages/thumb750x395'; // upload 128*128
            

            $extension      = $blogImage->getClientOriginalExtension(); // getting image extension
            $originalName   = $blogImage->getClientOriginalName();
            $size           = $blogImage->getSize();
            $fileName      = time().$originalName; // renameing image

            // condition to check type of file and size of file..
            if((($extension=='jpg') || ($extension=='png') || ($extension=='jpeg') || ($extension=='JPEG') || ($extension=='JPG') || ($extension=='PNG'))&&($size<5000000)){


                Image::make($blogImage,array(
                    'width' => 750,
                    'height' => 395,
                    'crop' => true
                ))->save($thumb750x395.'/'.$fileName);
                //save original
                Image::make($blogImage)->save($destinationPath.'/'.$fileName);


                
                
            } else {
                return redirect()->back()->withInput()->with('error', 'Only maximum 5MB jpg or png image is allowed.' );
            }
        } else {
            $fileName1 = '';
        }


        // Thumbnail image


        if($blogThumbImage){
            

            $destinationPath    ='blogImages'; // upload path folder should be in public folder
            $thumb358x300       ='blogImages/thumb358x300'; // upload 128*128
            

            $extension      = $blogThumbImage->getClientOriginalExtension(); // getting image extension
            $originalName   = $blogThumbImage->getClientOriginalName();
            $size           = $blogThumbImage->getSize();
            $thumbnailfileName  = time().$originalName; // renameing image

            // condition to check type of file and size of file..
            if((($extension=='jpg') || ($extension=='png') || ($extension=='jpeg') || ($extension=='JPEG') || ($extension=='JPG') || ($extension=='PNG'))&&($size<5000000)){


                Image::make($blogThumbImage,array(
                    'width' => 358,
                    'height' =>300,
                    'crop' => true
                ))->save($thumb358x300.'/'.$thumbnailfileName);
                //save original
                Image::make($blogThumbImage)->save($destinationPath.'/'.$thumbnailfileName);


                
                
            } else {
                return redirect()->back()->withInput()->with('error', 'Only maximum 5MB jpg or png image is allowed.' );
            }
        } else {
            $thumbnailfileName = '';
        }

        //return $newsTitle;
        DB::table('blogs')->insert([
            'title'       => $title,
            'name'       => $name,
            'date'      => $date,
            'content'       => $content,
            'status'          => $status,
            'blogImage'          => $fileName, 
            'blogThumbImage'  => $thumbnailfileName
            // 'news_category_id' => $news_category

        ]);
       

        return redirect()->back()->with('message', 'Blogs Added.');


    }


     public function updateblogs(Request $res){
        $id = $res->id;
       
        $title         = addslashes($res->title);
        // $news_category     = $res->news_category;

        $title = preg_replace('/[^A-Za-z0-9 ]/', '', $title); // Removes special chars single space allowed.
        $title = str_replace(' ', '_', $title); // Replaces all spaces with underscore.
        $title = preg_replace('/_+/', '_', $title); // Replaces multiple underscore with single one.
        $title = strtolower($title);
        $name = $res->name;
        $date = $res->date;

        $content      = addslashes($res->content);
        $status       = $res->status;
        // $projectImage            = $res->file('projectImage');
        // $oldprojectImage         = $res->oldprojectImage;
      
        // $projectBannerImage       = $res->file('projectBannerImage');
        // $oldprojectBannerImage    = $res->oldprojectBannerImage;
       
        $blogImage                = $res->file('blogImage');
        $oldblogImage             = $res->oldblogImage;
        $blogThumbImage           = $res->file('blogThumbImage');
        $oldblogThumbImage        = $res->oldblogThumbImage;
      



        
        if($blogImage){
            

            $destinationPath    ='blogImages'; // upload path folder should be in public folder
            $thumb750x395       ='blogImages/thumb750x395'; // upload 128*128
            

            $extension      = $blogImage->getClientOriginalExtension(); // getting image extension
            $originalName   = $blogImage->getClientOriginalName();
            $size           = $blogImage->getSize();
            $fileName1      = time().$originalName; // renameing image

            // condition to check type of file and size of file..
            if((($extension=='jpg') || ($extension=='png') || ($extension=='jpeg') || ($extension=='JPEG') || ($extension=='JPG') || ($extension=='PNG'))&&($size<5000000)){


                Image::make($blogImage,array(
                    'width' => 750,
                    'height' => 395,
                    'crop' => true
                ))->save($thumb750x395.'/'.$fileName1);
                //save original
                Image::make($blogImage)->save($destinationPath.'/'.$fileName1);


                
                
            } else {
                return redirect()->back()->withInput()->with('error', 'Only maximum 5MB jpg or png image is allowed.' );
            }
        } else {
            $fileName1 = $oldblogImage;
        }


        // Thumbnail image


        if($blogThumbImage){
            

            $destinationPath    ='blogImages'; // upload path folder should be in public folder
            $thumb358x300       ='blogImages/thumb358x300'; // upload 128*128
            

            $extension      = $blogThumbImage->getClientOriginalExtension(); // getting image extension
            $originalName   = $blogThumbImage->getClientOriginalName();
            $size           = $blogThumbImage->getSize();
            $thumbnailfileName  = time().$originalName; // renameing image

            // condition to check type of file and size of file..
            if((($extension=='jpg') || ($extension=='png') || ($extension=='jpeg') || ($extension=='JPEG') || ($extension=='JPG') || ($extension=='PNG'))&&($size<5000000)){


                Image::make($blogThumbImage,array(
                    'width' => 358,
                    'height' =>300,
                    'crop' => true
                ))->save($thumb358x300.'/'.$thumbnailfileName);
                //save original
                Image::make($blogThumbImage)->save($destinationPath.'/'.$thumbnailfileName);


                
                
            } else {
                return redirect()->back()->withInput()->with('error', 'Only maximum 5MB jpg or png image is allowed.' );
            }
        } else {
            $thumbnailfileName = $oldblogThumbImage;
        }

        //return $newsTitle;
        DB::table('blogs')->where('id', $id)->update([
            'title'       => $title,
             'name'       => $name,
            'date'      => $date,
            'content'       => $content,
            'status'          => $status,
            'blogImage'          => $fileName1, 
            'blogThumbImage'  => $thumbnailfileName
            // 'news_category_id' => $news_category

        ]);
       

        return redirect()->back()->with('message', 'Blogs Added.');


    }


        public function delete_blogs($id){
        $getblogsImage = DB::table('blogs')->where('id', $id)->get();
        $blogsImage = $getblogsImage[0]->blogImage;
        $blogsImages = $getblogsImage[0]->blogThumbImage;

        DB::table('blogs')->where('id', $id)->delete();
        unlink("blogImages/".$blogsImages);
        unlink("blogImages/".$blogsImage);
        unlink("blogImages/thumb358x300/".$blogsImages);
        unlink("blogImages/thumb750x395/".$blogsImage);
        // unlink("gallery/filterGallery/thumb133x69".$clientImage);
        return redirect()->back()->with('message', 'One recoard deleted');

        }


     


}