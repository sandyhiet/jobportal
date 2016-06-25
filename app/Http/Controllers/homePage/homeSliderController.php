<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers\homePage;
use App\Http\Controllers\homePage\homeSliderController;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Image;

use Illuminate\Http\Request;
use Validator;
use Redirect;
use DB;



class homeSliderController extends Controller
{
    public function insertHomeSlider(Request $res){
       
       

       $sliderImage        = $res->file('sliderImage');
       $slidertitle        = $res->slidertitle;
       $sliderh1           = $res->sliderh1;
       $sliderh2           = $res->sliderh2;
       $slidertxt          = $res->slidertxt;
       $slidetbtntxt1      = $res->slidetbtntxt1;
       $slidetbtnlink1     = $res->slidetbtnlink1;
       $slidetbtntxt2      = $res->slidetbtntxt2;
       $slidetbtnlink2     = $res->slidetbtnlink2;

       






        if($sliderImage){
            

            $destinationPath ='sliderHomeImage'; // upload path folder should be in public folder
            $thumb400x200 ='sliderHomeImage/thumb400x200';
            $thumb501x248 ='sliderHomeImage/thumb501x248';
            $thumb1350x690 ='sliderHomeImage/thumb1350x690';

            $extension = $sliderImage->getClientOriginalExtension(); // getting image extension
            $originalName = $sliderImage->getClientOriginalName();
            $size = $sliderImage->getSize();
            $fileName = time().$originalName; // renameing image

            // condition to check type of file and size of file..
            if((($extension=='jpg') || ($extension=='png') || ($extension=='jpeg') || ($extension=='JPEG') || ($extension=='JPG')
             || ($extension=='PNG'))&&($size<5000000)){

                Image::make($sliderImage,array(
                    'width' => 400,
                    'height' => 200,
                    'crop' => true
                ))->save($thumb400x200.'/'.$fileName);
                Image::make($sliderImage,array(
                    'width' => 501,
                    'height' =>248,
                    'crop' => true
                ))->save($thumb501x248.'/'.$fileName);
                Image::make($sliderImage,array(
                    'width' => 1350,
                    'height' =>690,
                    'crop' => true
                ))->save($thumb1350x690.'/'.$fileName);
                //save original
                Image::make($sliderImage)->save($destinationPath.'/'.$fileName);
                
            } else {
                return redirect()->back()->withInput()->with('error', 'Only maximum 5MB jpg or png image is allowed.' );
            }
        } else {
            $fileName = '';
        }

        
        
        DB::table('home_slider')->insert([
            'sliderImage'       => $fileName,
            'slidertitle'       => $slidertitle,
            'sliderh1'          => $sliderh1,
            'sliderh2'          => $sliderh2,
            'slidertxt'         => $slidertxt,
            'slidetbtntxt1'     => $slidetbtntxt1,
            'slidetbtnlink1'    => $slidetbtnlink1,
            'slidetbtntxt2'     => $slidetbtntxt2,
            'slidetbtnlink2'    => $slidetbtnlink2    
        ]);


        
        return redirect()->back()->with('message', 'Image Added.');


    }


    

/**************** EDIT HOME PAGE SILIDER  **********/

public function edittHomeSlider($id){
   // return"fdsfdg";
    $slider= DB::table('home_slider')->where('id', $id)->get();
    $data = array('pagetitle'=>'Update Slider');
    return view('admin.update_homebanner', $data)->with('slider',$slider);
}

/**************** EDIT HOME PAGE SILIDER  **********/


/********* Update home page slider **************/

public function UpdatetHomeSlider(Request $res){

       

        $sliderImage        = $res->file('sliderImage');
        $id                 = $res->id;
        $Presilderimage     = $res->Presilderimage;

        

        $sliderh1           = addslashes($res->sliderh1);
        $sliderh2           = addslashes($res->sliderh2);
        $status           = addslashes($res->status);
        


        // if(($slidetbtntxt1 && $slidetbtnlink1 == '') || ($slidetbtntxt1 == '' && $slidetbtnlink1)){
        //     return redirect()->back()->withInput()->with('error', 'Error in link or text of button 1. Please fill or leave empty both values.' );
        // }
        // if(($slidetbtntxt2 && $slidetbtnlink2 == '') || ($slidetbtntxt2 == '' && $slidetbtnlink2)){
        //     return redirect()->back()->withInput()->with('error', 'Error in link or text of button 2. Please fill or leave empty both values.' );
        // }

        $inputs = [

            // 'sliderImage'     => $sliderImage,

        ];

        $rules = [

            //'sliderText'      => 'required',
            // 'sliderImage'     => 'required',
            
        ];

        $messages = [

            //'sliderText.required'   => 'Please enter Slider text',
            // 'sliderImage.required'  => 'Please select an image',

        ];

        $validation = Validator::make($inputs, $rules, $messages);

        if( $validation->fails() ){
            //return redirect()->back()->withInput()->with('errors', $validation->errors() );
        }
        

        if($sliderImage){
            

            $destinationPath ='sliderHomeImage'; // upload path folder should be in public folder
            $thumb400x200 ='sliderHomeImage/thumb400x200';
            $thumb501x248 ='sliderHomeImage/thumb501x248';
             $thumb1350x690 ='sliderHomeImage/thumb1350x690';

            $extension = $sliderImage->getClientOriginalExtension(); // getting image extension
            $originalName = $sliderImage->getClientOriginalName();
            $size = $sliderImage->getSize();
            $fileName = time().$originalName; // renameing image

            // condition to check type of file and size of file..
            if((($extension=='jpg') || ($extension=='png') || ($extension=='jpeg') || 
                ($extension=='JPEG') || ($extension=='JPG') || ($extension=='PNG'))&&($size<5000000)){

                Image::make($sliderImage,array(
                    'width' => 400,
                    'height' => 200,
                    'crop' => true
                ))->save($thumb400x200.'/'.$fileName);
                Image::make($sliderImage,array(
                    'width' => 501,
                    'height' => 248,
                    'crop' => true
                ))->save($thumb501x248.'/'.$fileName);
                Image::make($sliderImage,array(
                    'width' => 1350,
                    'height' => 690,
                    'crop' => true
                ))->save($thumb1350x690.'/'.$fileName);
                //save original
                Image::make($sliderImage)->save($destinationPath.'/'.$fileName);
                
            } else {
                return redirect()->back()->withInput()->with('error', 'Only maximum 5MB jpg or png image is allowed.' );
            }
        } else {
            $fileName = $Presilderimage;
        }

      

       DB::table('home_slider')
            ->where('id', $id)
            ->update([
                'sliderImage'       => $fileName,
                
                'sliderh1'          => $sliderh1,
                'sliderh2'          => $sliderh2,
                'status'            => $status
                    
            ]);

       return redirect('admin/homepage_banner')->with('message', 'Banner Updated.');

    }

public function deleteslider($id){

DB::table('home_slider')->where('id', $id)->delete([

                 'id'   => $id,
]);

return redirect()->back()->with('message', ' deleted');

     


    }




/********* Update home page slider **************/



/*********  home page featured box **************/


    

     

    public function checkfeatureBoxId(Request $req){
        $featuredBoxId = $req->featureBox;
        $selectFeatureByIdValues = DB::select('call selectFeatureById("'.$featuredBoxId.'")');
        if(count($selectFeatureByIdValues) == 1){

            $data = array('pageTital'=>'Update Feature Box Content');
            return view('homePage.updateFeatureBox', $data)->with('selectFeatureByIdValues',$selectFeatureByIdValues);

        } else {
            return redirect()->back()->with('singleerror','Error.');
        }
    }

    public function selectFeature($id) {

        $selectFeature= DB::select('call selectFeatureById("'.$id.'")');
        $data = array('pageTital'=>'Feature Box');
        return view('homePage.updateFeatureBox', $data)->with('selectFeature', $selectFeature);


    }

    public function updatefeaturedBox(Request $req){

        $Heading        = $req->Heading;
        $oldHeading     = $req->oldHeading;

        $Heading        = addslashes($req->Heading);
        
        


        
        $id             = $req->id;
        $Description    = $req->Description;
        $SubHeading     = $req->SubHeading;
        $Image          = $req->file('Image');
        $icon           = $req->file('icon');
        $oldImage       = $req->oldImage;
        $oldicon        = $req->oldicon;
        $link           = $req->link;


        $inputs = [

            'Heading'           => $Heading,
            // 'Description'       => $Description,
            'SubHeading'        => $SubHeading,
            'link'              => $link,
        ];

        $rules = [

            'Heading'       => 'required',
            'SubHeading'    => 'required',
            // 'Description'   => 'required',
            'link'          => 'required'

        ];

        $messages = [

            'Heading.required'      => 'Please enter Heading',
            'SubHeading.required'   => 'Please enter Sub Heading',
            // 'Description.required'  => 'Please enter Description',
            'link.required'      => 'Please select see more link'

        ];

        $validation = Validator::make($inputs, $rules, $messages);

        if( $validation->fails() ){
            
            return redirect()->back()->withInput()->with('errors', $validation->errors() );
        }

        // image upload 
        if($Image){

            

            $destinationPath    = 'featuredboxImage'; 
            $thumb300x200       = 'featuredboxImage/thumb300x200'; 
            
            
            $extension = $Image->getClientOriginalExtension(); // getting image extension
            $originalName = $Image->getClientOriginalName();
            $size = $Image->getSize();
            $fileName = time().$originalName; // renameing image

            // condition to check type of file and size of file..
            if((($extension=='jpg') || ($extension=='png') || ($extension=='jpeg') || ($extension=='JPEG') || ($extension=='JPG') || ($extension=='PNG'))&&($size<5000000)){

                Image::make($Image,array(
                    'width' => 300,
                    'height' => 200,
                    'crop' => true
                ))->save($thumb300x200.'/'.$fileName);

                
                //save original
                Image::make($Image)->save($destinationPath.'/'.$fileName);

                

                
                
            } else {
                return redirect()->back()->withInput()->with('error', 'Only maximum 5MB jpg or png image is allowed.' );
            }

        } else {
            $fileName=$oldImage;
        }
        //ICON
        if($icon){

            

            $destinationPath    = 'featuredboxImage'; 
            $thumb300x200       = 'featuredboxImage/thumb300x200'; 
            
            
            $extension = $icon->getClientOriginalExtension(); // getting image extension
            $originalName = $icon->getClientOriginalName();
            $size = $icon->getSize();
            $fileName2 = time().$originalName; // renameing image

            // condition to check type of file and size of file..
            if((($extension=='jpg') || ($extension=='png') || ($extension=='jpeg') || ($extension=='JPEG') || ($extension=='JPG') || ($extension=='PNG'))&&($size<5000000)){

                Image::make($icon,array(
                    'width' => 300,
                    'height' => 200,
                    'crop' => true
                ))->save($thumb300x200.'/'.$fileName2);

                
                //save original
                Image::make($icon)->save($destinationPath.'/'.$fileName);

                

                
                
            } else {
                return redirect()->back()->withInput()->with('error', 'Only maximum 5MB jpg or png image is allowed.' );
            }

        } else {
            $fileName2=$oldicon;
        }



        DB::table('FeatureContantBox')
        ->where('id', $id)
        ->update([
            'Heading'      => $Heading,
            'Image'        => $fileName,
            'icon'         => $fileName2,
            'Description'  => $Description,
            'SubHeading'   => $SubHeading,
            'link'         => $link
        ]);



        
         return redirect()->back()->with('message', 'Content Updated');

        
    }


    public function update_header_contact(Request $req){
        $phone        = addslashes($req->phone);
        $address      = addslashes($req->address);

        $header_contact_count = DB::table('header_contact')->select('*')->count();
        if($header_contact_count == 0){
            
            DB::table('header_contact')->insert([
                'phone'       => $phone,
                'address'       => $address  
            ]);

        } else {
            //otherwise update for update get id
            $header_contact_id = DB::table('header_contact')->select('id')->get();
            DB::table('header_contact')
            ->where('id', $header_contact_id[0]->id)
            ->update([
                'phone'       => $phone,
                'Email'     => $Email  
            ]);

        }
        return redirect()->back()->with('message', 'Record Updated');
    }


    public function update_social_links(Request $req){

        
        $social_form        = addslashes($req->social_form);
        
        $facebook        = addslashes($req->facebook);
        if($social_form == 'facebook'){
            
            DB::table('social_links')
            ->where('social_network', 'facebook')
            ->update([
                'link'       => addslashes($req->facebook)
            ]);
            return redirect()->back()->with('message', 'Facebook link updated');
        }

        $twitter        = addslashes($req->twitter);
        if($social_form == 'twitter'){
            DB::table('social_links')
            ->where('social_network', 'twitter')
            ->update([
                'link'       => addslashes($req->twitter)
            ]);
            return redirect()->back()->with('message', 'Twitter link updated');
        }

        $pinterest        = addslashes($req->pinterest);
        if($social_form == 'pinterest'){
            DB::table('social_links')
            ->where('social_network', 'pinterest')
            ->update([
                'link'       => addslashes($req->pinterest)
            ]);
            return redirect()->back()->with('message', 'Pinterest link updated');
        }

        $youtube        = addslashes($req->youtube);
        if($social_form == 'youtube'){
            DB::table('social_links')
            ->where('social_network', 'youtube')
            ->update([
                'link'       => addslashes($req->youtube)
            ]);
            return redirect()->back()->with('message', 'Youtube link updated');
        }

        $google_plus        = addslashes($req->google_plus);
        if($social_form == 'google_plus'){
            DB::table('social_links')
            ->where('social_network', 'google_plus')
            ->update([
                'link'       => addslashes($req->google_plus)
            ]);
            return redirect()->back()->with('message', 'Google Plus link updated');
        }

        $flickr        = addslashes($req->flickr);
        if($social_form == 'flickr'){
            DB::table('social_links')
            ->where('social_network', 'flickr')
            ->update([
                'link' => addslashes($req->flickr)
            ]);
            return redirect()->back()->with('message', 'Flickr link updated');
        }

        $dribbble        = addslashes($req->dribbble);
        if($social_form == 'dribbble'){
            DB::table('social_links')
            ->where('social_network', 'dribbble')
            ->update([
                'link' => addslashes($req->dribbble)
            ]);
            return redirect()->back()->with('message', 'Dribbble link updated');
        }

        
    }






// News Start
    public function insertNews(Request $res){
       
        $newsTitle         = addslashes($res->newsTitle);
       

        $newsTitle = preg_replace('/[^A-Za-z0-9 ]/', '', $newsTitle); // Removes special chars single space allowed.
        $newsTitle = str_replace(' ', '_', $newsTitle); // Replaces all spaces with underscore.
        $newsTitle = preg_replace('/_+/', '_', $newsTitle); // Replaces multiple underscore with single one.
        $newsTitle = strtolower($newsTitle);

        $newsDescription      = $res->newsDescription;
        
       
       $newsImage      = $res->file('newsImage');
     
      



        $inputs = [

            'newsTitle'           => $newsTitle,
            
         

            
        ];

        $rules = [

            'newsTitle'        => 'required',
           
            
            
            
        ];

        $messages = [

            'newsTitle.required'               => 'Please enter news title',
           
           
        ];

        $validation = Validator::make($inputs, $rules, $messages);

        if( $validation->fails() ){
            return redirect()->back()->withInput()->with('errors', $validation->errors() );
        }


        if($newsImage){
            

            $destinationPath    ='newsImages'; // upload path folder should be in public folder
            $thumb50x75       ='newsImages/thumb50x75'; // upload 128*128
            

            $extension      = $newsImage->getClientOriginalExtension(); // getting image extension
            $originalName   = $newsImage->getClientOriginalName();
            $size           = $newsImage->getSize();
            $fileName1      = time().$originalName; // renameing image

            // condition to check type of file and size of file..
            if((($extension=='jpg') || ($extension=='png') || ($extension=='jpeg') || ($extension=='JPEG') || ($extension=='JPG') || ($extension=='PNG'))&&($size<5000000)){


                Image::make($newsImage,array(
                    'width' => 50,
                    'height' => 75,
                    'crop' => true
                ))->save($thumb50x75.'/'.$fileName1);
                //save original
                Image::make($newsImage)->save($destinationPath.'/'.$fileName1);


                
                
            } else {
                return redirect()->back()->withInput()->with('error', 'Only maximum 5MB jpg or png image is allowed.' );
            }
        } else {
            $fileName1 = $newsImage;
        }

  DB::table('news')->insert([
            'newsTitle'          => $newsTitle,
            'newsDescription'    => $newsDescription,
            // 'status'          => $status,
            'newsImage'          => $fileName1
            

        ]);
       
return redirect()->back()->with('message', 'News Added.');


    }
 public function update_news(Request $res){
       $id         = $res->id;


       $newsTitle  = addslashes($res->newsTitle);
      

       

        $newsTitle = preg_replace('/[^A-Za-z0-9 ]/', '', $newsTitle); // Removes special chars single space allowed.
        $newsTitle = str_replace(' ', '_', $newsTitle); // Replaces all spaces with underscore.
        $newsTitle = preg_replace('/_+/', '_', $newsTitle); // Replaces multiple underscore with single one.
        $newsTitle = strtolower($newsTitle);
        
     
       $newsDescription   = $res->newsDescription;
      
      

       $newsImage         = $res->file('newsImage');
      



if($newsImage){
            

            $destinationPath    ='newsImages'; // upload path folder should be in public folder
            $thumb50x75       ='newsImages/thumb50x75'; // upload 128*128
            

            $extension      = $newsImage->getClientOriginalExtension(); // getting image extension
            $originalName   = $newsImage->getClientOriginalName();
            $size           = $newsImage->getSize();
            $fileName1      = time().$originalName; // renameing image

            // condition to check type of file and size of file..
            if((($extension=='jpg') || ($extension=='png') || ($extension=='jpeg') || ($extension=='JPEG') || ($extension=='JPG') || ($extension=='PNG'))&&($size<5000000)){


                Image::make($newsImage,array(
                    'width' => 50,
                    'height' => 75,
                    'crop' => true
                ))->save($thumb50x75.'/'.$fileName1);
                //save original
                Image::make($newsImage)->save($destinationPath.'/'.$fileName1);


                
                
            } else {
                return redirect()->back()->withInput()->with('error', 'Only maximum 5MB jpg or png image is allowed.' );
            }
        } else {
            $fileName1 = $newsImage;
        }
        



DB::table('news')->where('id', $id)->update([

                 'id'            => $id,
                'newsTitle'      => $newsTitle,
                'newsDescription'=> $newsDescription,
                // 'status'         => $status, 
                'newsImage'      => $fileName1
              

        ]);
       return redirect()->back()->with('message', 'News updated.');

}

public function deletenews($id){

DB::table('news')->where('id', $id)->delete([

                 'id'   => $id,
]);

return redirect()->back()->with('message', 'News delete');

     


    }





   
    //LOGO ADD OR UPDATE

    public function save_logo(Request $req){

        $logoImage = $req->file('logoImage');
        $inputs = [

            'logoImage'                   => $logoImage
            
        ];

        $rules = [

            
            'logoImage'           => 'required'
            
        ];

        $messages = [

            'logoImage.required'  => 'Please select an image.'
            
        ];

        $validation = Validator::make($inputs, $rules, $messages);

        if( $validation->fails() ){
            return redirect()->back()->withInput()->with('errors', $validation->errors() );
        }

        $destinationPath    ='logoImage'; // upload path folder should be in public folder
        $thumb154x100       ='logoImage/thumb154x100'; // upload 128*128
            

        $extension      = $logoImage->getClientOriginalExtension(); // getting image extension
        $originalName   = $logoImage->getClientOriginalName();
        $size           = $logoImage->getSize();
        $fileName      = time().$originalName; // renameing image


        if($req->id){
            //update existing
            if((($extension=='jpg') || ($extension=='png') || ($extension=='jpeg') || ($extension=='JPEG') || ($extension=='JPG') || ($extension=='PNG'))&&($size<5000000)){


                Image::make($logoImage,array(
                    'width' => 154,
                    'height' => 100,
                    'crop' => true
                ))->save($thumb154x100.'/'.$fileName);
                //save original
                Image::make($logoImage)->save($destinationPath.'/'.$fileName);


                
                
            } else {
                return redirect()->back()->withInput()->with('error', 'Only maximum 5MB jpg or png image is allowed.' );
            }
            DB::table('logo')->where('id', $req->id)->update([
                
                'logoImage'      => $fileName
                
            ]);
            
        } else {
            //update existing
            if((($extension=='jpg') || ($extension=='png') || ($extension=='jpeg') || ($extension=='JPEG') || ($extension=='JPG') || ($extension=='PNG'))&&($size<5000000)){


                Image::make($logoImage,array(
                    'width' => 154,
                    'height' => 100,
                    'crop' => true
                ))->save($thumb154x100.'/'.$fileName);
                //save original
                Image::make($logoImage)->save($destinationPath.'/'.$fileName);


                
                
            } else {
                return redirect()->back()->withInput()->with('error', 'Only maximum 5MB jpg or png image is allowed.' );
            }
            DB::table('logo')->insert([
                
                'logoImage'      => $fileName 
            ]);
            
        }
        return redirect()->back()->with('message', 'Logo updated.');
    }





    public function Updatetpackage(Request $res)
    {


       

        $charge                = $res->charge;
        $award_job           = $res->award_job;
        $days               = $res->days;
        $id              = $res->id;


        //return $charge['1'];
        
        $a=0;
        foreach($id as $key=>$val){

           // return $id[$key];
            DB::table('tbl_package')->where('package_id', $id[$key])->update([
                'award_job'     => $award_job[$a],
                'days'          => $days[$a],
                'charge'        => $charge[$a]
            ]);
            $a++;
        }

        return redirect('admin/list_membership')->with('message', 'package Updated.');

        // echo "<pre>";
        // print_r($charge);
        // print_r($award_job);
        // print_r($days);
        // print_r($id);
        
         //$cnt        = count($id);

       
        // if($cnt>intval(0))
        // {
                    
        //     for($a=0;$a<$cnt;$a++)
        //     {
              
        //         DB::table('tbl_package')->where('package_id', $id[$a])->update(
        //             [
        //                 'award_job'     => $award_job[$a],
        //                 'days'          => $days[$a],
        //                 'charge'        => $charge[$a]

        //             ]);
        //             return redirect('admin/list_membership')->with('message', 'package Updated.');
        //         // echo '<script>window.location.href="http://192.168.1.158/jobportal/public/admin/list_membership";</script>';
        //      }
                
        //   }






   

   







           
        
}
}
