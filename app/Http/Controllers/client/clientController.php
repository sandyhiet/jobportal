<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers\client;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Image;

use Illuminate\Http\Request;
use Validator;
use Redirect;
use DB;



class clientController extends Controller
{
 public function Gallery_clients(Request $res){
       
       

       $image        = $res->file('image');
        // $heading      = addslashes($res->heading);
        // $subheading   = addslashes($res->subheading);
        $tabid        = $res->tabid;
       

       




        $inputs = [

            //'sliderText'      => $sliderText,
            'image'     => $image,
            // 'tabid'     => $tabid,
        ];

        $rules = [

            
            'image'     => 'required',
            // 'tabid'      => 'required',

        ];

        $messages = [

            
            'image.required'  => 'Please select an image',
            // 'tabid.required'   => 'Please select tab',

        ];

        $validation = Validator::make($inputs, $rules, $messages);

        
        if( $validation->fails() ){
            return redirect()->back()->withInput()->with('errors', $validation->errors() );
        }




        if($image){
            

            $destinationPath    = 'gallery/filterGallery'; 
            $thumb550x300       = 'gallery/filterGallery/thumb550x300';
            $thumb600x300       = 'gallery/filterGallery/thumb600x300';
           
            $thumb133x69       = 'gallery/filterGallery/thumb133x69';
            $extension = $image->getClientOriginalExtension(); // getting image extension
            $originalName = $image->getClientOriginalName();
            $size = $image->getSize();
            $fileName = time().$originalName; // renameing image

            // condition to check type of file and size of file..
            if((($extension=='jpg') || ($extension=='png') || ($extension=='jpeg') || ($extension=='JPEG') || ($extension=='JPG') || ($extension=='PNG'))&&($size<5000000)){

                Image::make($image,array(
                    'width' => 133,
                    'height' => 69,
                    'crop' => true
                ))->save($thumb133x69.'/'.$fileName);
                Image::make($image,array(
                    'width' => 550,
                    'height' => 300,
                    'crop' => true
                ))->save($thumb550x300.'/'.$fileName);
                Image::make($image,array(
                    'width' => 600,
                    'height' => 300,
                    'crop' => true
                ))->save($thumb600x300.'/'.$fileName);
                //save original
                Image::make($image)->save($destinationPath.'/'.$fileName);
                
            } else {
                return redirect()->back()->withInput()->with('error', 'Only maximum 5MB jpg or png image is allowed.' );
            }
        } else {
            $fileName = '';
        }

        
        
        DB::table('filter_gallery')->insert([
            // 'heading'       => $heading,
            // 'subheading'    => $subheading,
            'image'         => $fileName
            // 'tabid'         => $tabid
        ]);


        
        return redirect()->back()->with('message', 'Image Added.');


    }



 public function update_images(Request $res){

       

        $image              = $res->file('image');
        $id                 = $res->id;
        $Preimage           = $res->Preimage;
        // $tabid              = $res->tabid;



        // $heading        = addslashes($res->heading);
        // $subheading           = addslashes($res->subheading);
        

        
        
        

        if($image){
            

            $destinationPath    = 'gallery/filterGallery'; 
            $thumb550x300       = 'gallery/filterGallery/thumb550x300';
            $thumb600x300       = 'gallery/filterGallery/thumb600x300';

            $thumb133x69       = 'gallery/filterGallery/thumb133x69';
            $extension = $image->getClientOriginalExtension(); // getting image extension
            $originalName = $image->getClientOriginalName();
            $size = $image->getSize();
            $fileName = time().$originalName; // renameing image

            // condition to check type of file and size of file..
            if((($extension=='jpg') || ($extension=='png') || ($extension=='jpeg') || ($extension=='JPEG') || ($extension=='JPG') || ($extension=='PNG'))&&($size<5000000)){

                Image::make($image,array(
                    'width' => 133,
                    'height' => 69,
                    'crop' => true
                ))->save($thumb133x69.'/'.$fileName);
                Image::make($image,array(
                    'width' => 550,
                    'height' => 300,
                    'crop' => true
                ))->save($thumb550x300.'/'.$fileName);
                Image::make($image,array(
                    'width' => 600,
                    'height' => 300,
                    'crop' => true
                ))->save($thumb600x300.'/'.$fileName);
                //save original
                Image::make($image)->save($destinationPath.'/'.$fileName);
                
            } else {
                return redirect()->back()->withInput()->with('error', 'Only maximum 5MB jpg or png image is allowed.' );
            }
        } else {
            $fileName = $Preimage;
        }

      

       DB::table('filter_gallery')
            ->where('id', $id)
            ->update([
                // 'heading'       => $heading,
                // 'subheading'    => $subheading,
                'image'         => $fileName
                // 'tabid'         => $tabid   
            ]);

       return redirect('admin/clients_happy')->with('message', 'Image Updated.');

    }




public function delete_clients($id){
$getclientImage = DB::table('filter_gallery')->where('id', $id)->get();
$clientImage = $getclientImage[0]->image;

DB::table('filter_gallery')->where('id', $id)->delete();
unlink("gallery/filterGallery/".$clientImage);
// unlink("gallery/filterGallery/thumb550x300".$clientImage);
// unlink("gallery/filterGallery/thumb133x69".$clientImage);
return redirect()->back()->with('message', 'One recoard deleted');

}
  
}