<?php
namespace App\Http\Controllers;
namespace App\Http\Controllers\cms;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Redirect;
use DB;
use App\Http\Requests;
use Image;
use File;
use Mail;




class cmsController extends Controller
{
    public function saveNewPage(Request $req){
       
        $PageTitle         = addslashes($req->PageTitle);
        
        $PageTitle = str_replace(' ', '_', $PageTitle); // Replaces all spaces with underscore.
        //$PageTitle = preg_replace('/[^A-Za-z0-9\_]/', '', $PageTitle); // Removes special chars.
        $PageTitle = preg_replace('/[^A-Za-z0-9_]/', '', $PageTitle); // Removes special chars includ _.
        $PageTitle = preg_replace('/_+/', '_', $PageTitle); // Replaces multiple underscore with single one.
        $PageTitle = strtolower($PageTitle);
        
        $PageContent       = addslashes($req->PageContent);
        $PageStatus        = $req->PageStatus;
        $ParentPageId      = '';
        
        $onNavigation      = $req->onNavigation;
        $featuredContent   = '';
        $showSideBar       = '';
        $PageImageTmp      = $req->file('PageImage');
        $sidebarsection    = ''; 
        $eventid           = '';

        $page_title             = $req->page_title;
        $metakeywords           = $req->metakeywords;
        $metadescription        = $req->metadescription;
        

        $inputs = [

            'PageTitle'        => $PageTitle,
            'page_title'        => $page_title,
        ];

        $rules = [

            'PageTitle'        => 'required|max:25',
            'page_title'        => 'required|max:25',
        ];

        $messages = [

            'PageTitle.required'  => 'Please Enter Page Name',
            'page_title.required'  => 'Please Enter Page Title',
        ];

        $validation = Validator::make($inputs, $rules, $messages);

        if( $validation->fails() ){
            return redirect()->back()->withInput()->with('errors', $validation->errors() );
        }

        $pageExist = DB::table('Pages')->select('*')->where('PageTitle', '=', $PageTitle)->count();
        if($pageExist > 0){
            return redirect()->back()->withInput()->with('singleerror', 'Duplicate page name.' );
        }

        $fileName = '';
        

        // Page image 


        if($PageImageTmp){
            

            $destinationPath    ='pageImage'; // upload path folder should be in public folder
            $thumb750x395       ='pageImage/thumb750x395'; // upload 128*128
            

            $extension      = $PageImageTmp->getClientOriginalExtension(); // getting image extension
            $originalName   = $PageImageTmp->getClientOriginalName();
            $size           = $PageImageTmp->getSize();
            $fileName1      = time().$originalName; // renameing image

            // condition to check type of file and size of file..
            if((($extension=='jpg') || ($extension=='png'))&&($size<5000000)){


                Image::make($PageImageTmp,array(
                    'width' => 750,
                    'height' => 395,
                    'crop' => true
                ))->save($thumb750x395.'/'.$fileName1);
                //save original
                Image::make($PageImageTmp)->save($destinationPath.'/'.$fileName1);


                
                
            } else {
                return redirect()->back()->withInput()->with('error', 'Only maximum 5MB jpg or png image is allowed.' );
            }
        } else {
            $fileName1 = '';
        }


        DB::statement('call addCmsPages("'.$PageTitle.'", "'.$PageContent.'", "'.$fileName.'", "'.$PageStatus.'", "'.$ParentPageId.'" , "'.$onNavigation.'" , "'.$featuredContent.'" , "'.$showSideBar.'", "'.$fileName1.'","'.$sidebarsection.'","'.$eventid.'", "'.$page_title.'","'.$metakeywords.'","'.$metadescription.'")');
        return redirect()->back()->with('message', 'New Page Added.');

    }



    public function updateCmsPage(Request $req){
       
        $PageTitle         = addslashes($req->PageTitle);
        $oldPageTitle      = $req->oldPageTitle;
        
        $PageTitle = str_replace(' ', '_', $PageTitle); // Replaces all spaces with underscore.
        //$PageTitle = preg_replace('/[^A-Za-z0-9\_]/', '', $PageTitle); // Removes special chars.
        $PageTitle = preg_replace('/[^A-Za-z0-9_]/', '', $PageTitle); // Removes special chars includ _.
        $PageTitle = preg_replace('/_+/', '_', $PageTitle); // Replaces multiple underscore with single one.
        //$PageTitle = strtolower($PageTitle);
        
        $PageContent       = addslashes($req->PageContent);
        $PageStatus        = $req->PageStatus;
        $ParentPageId      = '';
        
        $onNavigation      = $req->onNavigation;
        $featuredContent   = '';
        $showSideBar       = '';
        $PageImageTmp      = $req->file('PageImage');
        $sidebarsection    = ''; 
        $eventid           = '';
        $oldPageImage      = $req->oldPageImage;

        $page_title             = $req->page_title;
        $metakeywords           = $req->metakeywords;
        $metadescription        = $req->metadescription;
        


        

        $inputs = [

            'PageTitle'        => $PageTitle,
            'page_title'        => $page_title,
        ];

        $rules = [

            'PageTitle'        => 'required|max:25',
            'page_title'        => 'required|max:25',
        ];

        $messages = [

            'PageTitle.required'  => 'Please Enter Page Name',
            'page_title.required'  => 'Please Enter Page Title',
        ];

        $validation = Validator::make($inputs, $rules, $messages);

        if( $validation->fails() ){
            return redirect()->back()->withInput()->with('errors', $validation->errors() );
        }

        if($PageTitle != $oldPageTitle){
            $pageExist = DB::table('Pages')->select('*')->where('PageTitle', '=', $PageTitle)->count();
            if($pageExist > 0){
                return redirect()->back()->withInput()->with('singleerror', 'Duplicate page name.' );
            }
        }

        if($PageImageTmp){
            
            $destinationPath    ='pageImage'; // upload path folder should be in public folder
            $thumb750x395       ='pageImage/thumb750x395'; // upload 128*128
            
            $extension      = $PageImageTmp->getClientOriginalExtension(); // getting image extension
            $originalName   = $PageImageTmp->getClientOriginalName();
            $size           = $PageImageTmp->getSize();
            $fileName1      = time().$originalName; // renameing image

            // condition to check type of file and size of file..
            if((($extension=='jpg') || ($extension=='png'))&&($size<5000000)){

                Image::make($PageImageTmp,array(
                    'width' => 750,
                    'height' => 395,
                    'crop' => true
                ))->save($thumb750x395.'/'.$fileName1);
                //save original
                Image::make($PageImageTmp)->save($destinationPath.'/'.$fileName1);
                
            } else {
                return redirect()->back()->withInput()->with('error', 'Only maximum 5MB jpg or png image is allowed.' );
            }

        } else {
            
            $fileName1 = $oldPageImage;
        }

        DB::table('Pages')->where('PageTitle', $oldPageTitle)->update([
            'PageTitle'     =>$PageTitle,
            'page_title'     =>$page_title,
            'metakeywords'     =>$metakeywords,
            'metadescription'     =>$metadescription,
            'PageContent'   =>$PageContent,
            'PageStatus'    =>$PageStatus,
            'PageImage'     =>$fileName1,
            'onNavigation'  =>$onNavigation
        ]);

        return redirect('admin/pages')->with('activeNavigation', 'sssssssss')->with('message', 'Record update successfully!!');
    }




    public function homepagegallery(Request $res){

        $GalleryId         = $res->GalleryId;

        $inputs = [
            'GalleryId'        => $GalleryId,
        ];

        $rules = [
            'GalleryId'        => 'required',
        ];

        $messages = [
            'GalleryId.required'  => 'Please select an option',
        ];

        $validation = Validator::make($inputs, $rules, $messages);

        if( $validation->fails() ){
            return redirect()->back()->withInput()->with('errors', $validation->errors() );
        }
        
        DB::statement('call resetHomePageGallery()');
        DB::statement('call setHomePageGallery("'.$GalleryId.'")');
        return redirect()->back()->with('message', 'Record update.');

    }

    public function postGalleryImages(Request $res){

        $GalleryId = $res->GalleryId;
        
        $GalleryImages        = $res->file('GalleryImages');

        if(!$GalleryImages){
            return redirect()->back()->withInput()->with('singleerror', 'Please choose an image.' );
        }

        $destinationPath    ='public/galleryImages'; // upload path folder should be in public folder
        $thumbFolder128     ='public/galleryImages/thumb128'; // upload 128*128
        $thumbFolder64      ='public/galleryImages/thumb64'; // upload 64*64
        
        $extension      = $GalleryImages->getClientOriginalExtension(); // getting image extension
        $originalName   = $GalleryImages->getClientOriginalName();
        $size           = $GalleryImages->getSize();
        $fileName       = time().$originalName; // renameing image

        // condition to check type of file and size of file..
        if((($extension=='jpg') || ($extension=='png') || ($extension=='gif'))&&($size<5000000)){

            //resize here
            $resizedimg = Image::make($GalleryImages)->resize(128, 128);
            $resizedimg->save($thumbFolder128.'/'.$fileName);

            $resizedimg = Image::make($GalleryImages)->resize(64, 64);
            $resizedimg->save($thumbFolder64.'/'.$fileName);

            $GalleryImages->move($destinationPath, $fileName); // uploading file to given path

            //INSERT IN DATABASE
            DB::statement('call insertGalleryImages("'.$fileName.'", "'.$GalleryId.'")');
          


            return redirect()->back()->withInput()->with('message', 'Image saved.' );

        } else {

            return redirect()->back()->withInput()->with('singleerror', 'Only maximum 5MB jpg, png or gif image is allowed.' );

        }

    }

    public function postgalleryupdate(Request $res){



        $GalleryName    = addslashes($res->GalleryName);
        $EventId        = $res->EventId;
        $id             = $res->id;
       
        $inputs = [

            'GalleryName'       => $GalleryName,
            'id'                => $GalleryName,
        ];

        $rules = [

            'GalleryName'       => 'required',
            'id'                => 'required',
        ];

        $messages = [

            'GalleryName.required'               => 'Gallery name can not be blank',
        ];

        $validation = Validator::make($inputs, $rules, $messages);

        if( $validation->fails() ){
            return redirect()->back()->withInput()->with('errors', $validation->errors() );
        }

        DB::statement('call updateGallery("'.$id.'","'.$GalleryName.'", "'.$EventId.'")');
        return redirect()->back()->with('message', 'Record Update.');



    }

    /*************** SaveGoogle Analytics start   *******************************/
    public function saveGoogleAnalytics(Request $req){
       
        $google_analyticsCode            = $req->google_analyticsCode;
       
       

        // $inputs = [

        //     'google_analyticsCode'     => $google_analyticsCode,
            
        // ];

        // $rules = [

        //     'google_analyticsCode'        => 'required',
           
        // ];

        // $messages = [

        //     'google_analyticsCode.required'  => 'Please Enter Google Analytics Code',
            
        // ];

        // $validation = Validator::make($inputs, $rules, $messages);

        // if( $validation->fails() ){
        //     return redirect()->back()->withInput()->with('errors', $validation->errors() );
        // }

       
         $count= DB::table('google_analytics')->select('*')->count();

        if($count > 0){
            //update
            $google_analytics_id= DB::table('google_analytics')->select('id')->get();
            DB::table('google_analytics')->where('id', $google_analytics_id[0]->id)->update([
                'google_analytics_code'=>$google_analyticsCode
                
            ]);
        } else {
             DB::table('google_analytics')->insert([
                'google_analytics_code'=>$google_analyticsCode
                
            ]);   
        }


       
        return redirect()->back()->with('message', 'Update Google Analytics Code.');

    }

     /***************  saveGoogleAnalytics end   *******************************/
    /*below code not used*/




    public function selectAllTestimonial(){

        //return 'ssss';

        $testimonials=DB::select('call selectAllTestimonials()');
        $data = array('pageTital'=>'Testimonials');
        return view('testimonial.viewTestimonial', $data)->with('testimonials',$testimonials);
        //return View::make('testimonial.viewTestimonial')->with('testimonials', $testimonials);

    }


    public function deleteTestimonials($id){


          DB::statement('call deleteTestimonials("'.$id.'")');
          
         //return Redirect('testimonial.viewTestimonial');
          return redirect()->back()->with('message', 'One record deleted.');


    }

    public function editTestimonials($id){

        $selectTestimonials= DB::select('call selectByIdAlltestimonials("'.$id.'")');
        $data = array('pageTital'=>'Testimonial Update');
        return view('testimonial.updateTestimonial', $data)->with('selectTestimonials', $selectTestimonials);


    }

    

    public function testimonialContent($id){
        
        $selectTestimonials= DB::select('call selectByIdAlltestimonials("'.$id.'")');
        return $selectTestimonials[0]->testiMonial;
    }

    public function saveNavigation(Request $res){
        if($res->savemenu_text){
            //remove old menu order
            DB::table('menu')->truncate();
            
            DB::table('menu')->insert(
                ['menu' => $res->savemenu_text]
            );
            return redirect()->back()->with('message', 'Menu saved.');
        }
    }

    public function saveNewtab(Request $req){
       
        $mainheading         = addslashes($req->mainheading);
        
        $mainheading = str_replace(' ', '_', $mainheading); // Replaces all spaces with underscore.
        $mainheading = preg_replace('/[^A-Za-z0-9_]/', '', $mainheading); // Removes special chars includ _.
        $mainheading = preg_replace('/_+/', '_', $mainheading); // Replaces multiple underscore with single one.
        $mainheading = strtolower($mainheading);
        
        $content       = addslashes($req->content);
        $subheading    = $req->subheading;
        $tab           = $req->tab;
        $link           = $req->link;
        $tabimage      = $req->file('tabimage');
        

        

        $inputs = [

            'tab'                   => $tab,
            'mainheading'           => $mainheading,
            'content'               => $content,
            'tabimage'              => $tabimage,
            'link'                  => $link
            
        ];

        $rules = [

            'tab'               => 'required|max:30',
            'mainheading'       => 'required|max:50',
            'content'           => 'required',
            'tabimage'          => 'required',
            'link'              => 'required'
            
        ];

        $messages = [

            'tab.required'  => 'Please enter tab name.',
            'mainheading.required'  => 'Please enter main heading.',
            'content.required'  => 'Please enter content.',
            'tabimage.required'  => 'Please select an image.',
            'link.required'  => 'Please select a see more link.'
            
        ];

        $validation = Validator::make($inputs, $rules, $messages);

        if( $validation->fails() ){
            return redirect()->back()->withInput()->with('errors', $validation->errors() );
        }

        $mainheadingExist = DB::table('tabcontent')->select('*')->where('mainheading', '=', $mainheading)->count();
        if($mainheadingExist > 0){
            return redirect()->back()->withInput()->with('singleerror', 'Duplicate tab main heading.' );
        }

        $fileName = '';
        

        // tab image 


        if($tabimage){
            

            $destinationPath    ='tabimage'; // upload path folder should be in public folder
            $thumb410X441       ='tabimage/thumb410X441'; // upload 128*128
             $thumb950X350       ='tabimage/thumb950X350';
            

            $extension      = $tabimage->getClientOriginalExtension(); // getting image extension
            $originalName   = $tabimage->getClientOriginalName();
            $size           = $tabimage->getSize();
            $fileName1      = time().$originalName; // renameing image

            // condition to check type of file and size of file..
            if((($extension=='jpg') || ($extension=='png') || ($extension=='jpeg') || ($extension=='JPEG') || ($extension=='JPG') || ($extension=='PNG'))&&($size<5000000)){


                Image::make($tabimage,array(
                    'width' => 410,
                    'height' => 441,
                    'crop' => true
                ))->save($thumb410X441.'/'.$fileName1);


                Image::make($tabimage,array(
                    'width' => 950,
                    'height' => 350,
                    'crop' => true
                ))->save($thumb950X350.'/'.$fileName1);
                //save original
                Image::make($tabimage)->save($destinationPath.'/'.$fileName1);


                
                
            } else {
                return redirect()->back()->withInput()->with('error', 'Only maximum 5MB jpg or png image is allowed.' );
            }
        } else {
            $fileName1 = '';
        }

        DB::table('tabcontent')->insert([
            'tab'           => $tab,
            'subheading'    => $subheading,
            'mainheading'   => $mainheading,
            'content'       => $content,
            'tabimage'      => $fileName1 
        ]);

        return redirect()->back()->with('message', 'New tab added.');

    }

    public function updatetab(Request $req){
       
        
        $id      = $req->id;
        
        

        $mainheading        = addslashes($req->mainheading);
        $mainheading        = str_replace(' ', '_', $mainheading); // Replaces all spaces with underscore.
        $mainheading        = preg_replace('/[^A-Za-z0-9_]/', '', $mainheading); // Removes special chars includ _.
        $mainheading        = preg_replace('/_+/', '_', $mainheading); // Replaces multiple underscore with single one.
        $mainheading        = strtolower($mainheading);
        
        $content       = addslashes($req->content);
        $subheading    = addslashes($req->subheading);
        $tab           = addslashes($req->tab);
        $tabimage      = $req->file('tabimage');
        $oldtabimage   = $req->oldtabimage;
        $old_mainheading   = $req->old_mainheading;
        $link   = $req->link;

        
        $inputs = [

            'tab'                   => $tab,
            'mainheading'           => $mainheading,
            'content'               => $content,
            'link'                  => $link
            
        ];

        $rules = [

            'tab'               => 'required|max:30',
            'mainheading'       => 'required|max:50',
            'content'           => 'required',
            'link'              => 'required'
            
        ];

        $messages = [

            'tab.required'            => 'Please enter tab name.',
            'mainheading.required'    => 'Please enter main heading.',
            'content.required'        => 'Please enter content.',
            'link.required'           => 'Please select a see more link.'
            
        ];

        $validation = Validator::make($inputs, $rules, $messages);

        if( $validation->fails() ){
            return redirect()->back()->withInput()->with('errors', $validation->errors() );
        }

        if($mainheading != $old_mainheading){
            $mainheadingExist = DB::table('tabcontent')->select('*')->where('mainheading', '=', $mainheading)->count();
            if($mainheadingExist > 0){
                return redirect()->back()->withInput()->with('singleerror', 'Duplicate tab main heading.' );
            }    
        }

        

        if($tabimage){
            

            $destinationPath    ='tabimage'; // upload path folder should be in public folder
            $thumb410X441       ='tabimage/thumb410X441'; // upload 128*128
             $thumb950X350       ='tabimage/thumb950X350';
            

            $extension      = $tabimage->getClientOriginalExtension(); // getting image extension
            $originalName   = $tabimage->getClientOriginalName();
            $size           = $tabimage->getSize();
            $fileName1      = time().$originalName; // renameing image

            // condition to check type of file and size of file..
            if((($extension=='jpg') || ($extension=='png') || ($extension=='jpeg') || ($extension=='JPEG') || ($extension=='JPG') || ($extension=='PNG'))&&($size<5000000)){


                Image::make($tabimage,array(
                    'width' => 410,
                    'height' => 441,
                    'crop' => true
                ))->save($thumb410X441.'/'.$fileName1);
                 Image::make($tabimage,array(
                    'width' => 950,
                    'height' => 350,
                    'crop' => true
                ))->save($thumb950X350.'/'.$fileName1);
                //save original
                Image::make($tabimage)->save($destinationPath.'/'.$fileName1);


                
                
            } else {
                return redirect()->back()->withInput()->with('error', 'Only maximum 5MB jpg or png image is allowed.' );
            }
        } else {
            $fileName1 = $oldtabimage;
        }

        

        DB::table('tabcontent')->where('id', $id)->update([
            'tab'           => $tab,
            'subheading'    => $subheading,
            'mainheading'   => $mainheading,
            'content'       => $content,
            'tabimage'      => $fileName1,
            'link'          => $link 
        ]);

       

        return redirect()->back()->with('message', 'Tab updated.');
    }


    public function saveNewvtab(Request $req){
       
        
        
        $tab       = addslashes($req->tab);
        $content    = addslashes($req->content);
        $link       = $req->link;
        $vtabimage      = $req->file('vtabimage');
        

        

        $inputs = [

            'tab'                   => $tab,
            
            'content'               => $content,
            'vtabimage'              => $vtabimage,
            'link'                  => $link 
        ];

        $rules = [

            'tab'               => 'required|max:30',
            'content'           => 'required',
            'vtabimage'         => 'required',
            'link'              => 'required'   
        ];

        $messages = [

            'tab.required'         => 'Please enter tab name.',
            'content.required'     => 'Please enter content.',
            'vtabimage.required'   => 'Please select an image.',
            'link.required'        => 'Please select a see more link.'
        ];

        $validation = Validator::make($inputs, $rules, $messages);

        if( $validation->fails() ){
            return redirect()->back()->withInput()->with('errors', $validation->errors() );
        }

        
        $fileName = '';
        

        // tab image 


        if($vtabimage){
            

            $destinationPath    ='vtabimage'; // upload path folder should be in public folder
            $thumb64X64         ='vtabimage/thumb64X64'; // upload 128*128
            $thumb950X350       ='vtabimage/thumb950X350'; 
            

            $extension      = $vtabimage->getClientOriginalExtension(); // getting image extension
            $originalName   = $vtabimage->getClientOriginalName();
            $size           = $vtabimage->getSize();
            $fileName1      = time().$originalName; // renameing image

            // condition to check type of file and size of file..
            if((($extension=='jpg') || ($extension=='png') || ($extension=='jpeg') || ($extension=='JPEG') || ($extension=='JPG') || ($extension=='PNG'))&&($size<5000000)){


                Image::make($vtabimage,array(
                    'width' => 64,
                    'height' => 64,
                    'crop' => true
                ))->save($thumb64X64.'/'.$fileName1);

                Image::make($vtabimage,array(
                    'width' => 950,
                    'height' => 350,
                    'crop' => true
                ))->save($thumb950X350.'/'.$fileName1);
                //save original
                Image::make($vtabimage)->save($destinationPath.'/'.$fileName1);


                
                
            } else {
                return redirect()->back()->withInput()->with('error', 'Only maximum 5MB jpg or png image is allowed.' );
            }
        } else {
            $fileName1 = '';
        }

        DB::table('vtabcontent')->insert([
            'tab'           => $tab,
            'link'          => $link,
            'content'       => $content,
            'vtabimage'     => $fileName1 
        ]);

        return redirect()->back()->with('message', 'New tab added.');

    }

    public function updatevtab(Request $req){
       
        
        $id      = $req->id;
        
        

        
        
        $content       = addslashes($req->content);
        
        $tab           = addslashes($req->tab);
        $vtabimage     = $req->file('vtabimage');
        $oldtabimage   = $req->oldtabimage;
        
        $link   = $req->link;

        
        $inputs = [

            'tab'                   => $tab,
            
            'content'               => $content,
            'link'               => $link
            
        ];

        $rules = [

            'tab'               => 'required|max:30',
            
            'content'           => 'required',
            'link'           => 'required'
            
        ];

        $messages = [

            'tab.required'  => 'Please enter tab name.',
            
            'content.required'  => 'Please enter content.',
            'link.required'  => 'Please select a see more link.'
            
        ];

        $validation = Validator::make($inputs, $rules, $messages);

        if( $validation->fails() ){
            return redirect()->back()->withInput()->with('errors', $validation->errors() );
        }

        
        

        if($vtabimage){
            

            $destinationPath    ='vtabimage'; // upload path folder should be in public folder
            $thumb64X64       ='vtabimage/thumb64X64'; // upload 128*128
            $thumb950X350       ='vtabimage/thumb950X350';
            

            $extension      = $vtabimage->getClientOriginalExtension(); // getting image extension
            $originalName   = $vtabimage->getClientOriginalName();
            $size           = $vtabimage->getSize();
            $fileName1      = time().$originalName; // renameing image

            // condition to check type of file and size of file..
            if((($extension=='jpg') || ($extension=='png') || ($extension=='jpeg') || ($extension=='JPEG') || ($extension=='JPG') || ($extension=='PNG'))&&($size<5000000)){


                Image::make($vtabimage,array(
                    'width' => 64,
                    'height' => 64,
                    'crop' => true
                ))->save($thumb64X64.'/'.$fileName1);

                 Image::make($vtabimage,array(
                    'width' => 950,
                    'height' => 350,
                    'crop' => true
                ))->save($thumb950X350.'/'.$fileName1);
                //save original
                Image::make($vtabimage)->save($destinationPath.'/'.$fileName1);


                
                
            } else {
                return redirect()->back()->withInput()->with('error', 'Only maximum 5MB jpg or png image is allowed.' );
            }
        } else {
            $fileName1 = $oldtabimage;
        }

        

        DB::table('vtabcontent')->where('id', $id)->update([
            'tab'           => $tab,
            
            'content'       => $content,
            'vtabimage'      => $fileName1,
            'link'          => $link 
        ]);

       

        return redirect()->back()->with('message', 'Tab updated.');
    }
    public function save_vtab_banner(Request $req){

        $vtabbanner = $req->file('vtabbanner');
        $inputs = [

            'vtabbanner'                   => $vtabbanner
            
        ];

        $rules = [

            
            'vtabbanner'           => 'required'
            
        ];

        $messages = [

            'vtabbanner.required'  => 'Please select an image.'
            
        ];

        $validation = Validator::make($inputs, $rules, $messages);

        if( $validation->fails() ){
            return redirect()->back()->withInput()->with('errors', $validation->errors() );
        }

        $destinationPath    ='vtabimage'; // upload path folder should be in public folder
        $banner       ='vtabimage/banner'; // upload 128*128
            

        $extension      = $vtabbanner->getClientOriginalExtension(); // getting image extension
        $originalName   = $vtabbanner->getClientOriginalName();
        $size           = $vtabbanner->getSize();
        $fileName1      = time().$originalName; // renameing image


        if($req->id){
            //update existing
            if((($extension=='jpg') || ($extension=='png') || ($extension=='jpeg') || ($extension=='JPEG') || ($extension=='JPG') || ($extension=='PNG'))&&($size<5000000)){


                Image::make($vtabbanner,array(
                    'width' => 973,
                    'height' => 522,
                    'crop' => true
                ))->save($banner.'/'.$fileName1);
                //save original
                Image::make($vtabbanner)->save($destinationPath.'/'.$fileName1);


                
                
            } else {
                return redirect()->back()->withInput()->with('error', 'Only maximum 5MB jpg or png image is allowed.' );
            }
            DB::table('vtabbanner')->where('id', $req->id)->update([
                
                'vtabbanner'      => $fileName1
                
            ]);
            
        } else {
            //update existing
            if((($extension=='jpg') || ($extension=='png') || ($extension=='jpeg') || ($extension=='JPEG') || ($extension=='JPG') || ($extension=='PNG'))&&($size<5000000)){


                Image::make($vtabbanner,array(
                    'width' => 973,
                    'height' => 522,
                    'crop' => true
                ))->save($banner.'/'.$fileName1);
                //save original
                Image::make($vtabbanner)->save($destinationPath.'/'.$fileName1);


                
                
            } else {
                return redirect()->back()->withInput()->with('error', 'Only maximum 5MB jpg or png image is allowed.' );
            }
            DB::table('vtabbanner')->insert([
                
                'vtabbanner'      => $fileName1 
            ]);
            
        }
        return redirect()->back()->with('message', 'Banner updated.');
    }

    
        /*contact us queries start */

      public function  saveFeedback(Request $req){

         $name         = $req->name;
         $email        = $req->email;
         $subject      = $req->subject;
         $feedback     = $req->feedback;
        
       

         $inputs = [

            'name'        => $name,
            'email'        => $email,
            'subject'        => $subject,
            'feedback'        => $feedback,
        ];

        $rules = [

            'name'            => 'required|min:5',
            'email'            => 'required|email',
            'subject'         => 'required',
            'feedback'         => 'required',
        ];

        // $messages = [

        //     'name.required'  => 'Please Enter Name',
        //     'email.required'  => 'Please Enter Email',
        //     'subject.required'  => 'Please Enter Subject',
        //     'feedback.required'  => 'Please Write Message',
        // ];

        $validation = Validator::make($inputs, $rules);

        if( $validation->fails() ){
            return redirect()->back()->withInput()->with('errors', $validation->errors() );
        }

        DB::table('contactus_queries')->insert([

            'name'      => $name,
            'email'     => $email,
            'subject'   => $subject,
            'feedback'  => $feedback
        ]);

          /*subscriber email start*/
        $mailmessage    = 'Thank you for Asking a Question.';
        $subject        = 'kamsar-o-bar Queries Notification';
        $mailData       = array('mailmessage'=>$mailmessage);
        $data           = array( 'email' => stripslashes($email), 'name' => 'Dastagir','subject' => $subject );
       
        Mail::send('layout.mail.contactus_queries', $mailData, function ($message) use ($data) {
        //return $CandidateEmail;
       $message->from(env('EMAILFROM'), env('EMAILNAME'));
        //$message->to($CandidateEmail)->cc('bar@example.com');
       $message->to($data['email'], $name = $data['name']);
       $message->cc('mohammad.dastagir@intactinnovations.com', $name = 'Dastagir');
          // $message->bcc($address, $name = null);
          // $message->replyTo($address, $name = null);
          $message->subject($data['subject']); 
       });

    
    // return redirect()->back()->withInput(['kbfregistrationForm'=>'1'])->with('message', 'Message Send successfully!!');
    return redirect()->back()->withInput()->with('message', 'Message Sent successfully!!');

    }

 /*contact us queries end */


    public function saveNewContactuk(Request $req){
       
        $Location            = $req->Location;
        $PhoneNumber1        = $req->PhoneNumber1;
        $PhoneNumber2        = $req->PhoneNumber2;
        $Email               = $req->Email;
       
       

        

        $inputs = [

            'Location'        => $Location,
            'PhoneNumber1'    => $PhoneNumber1,
            'Email'           => $Email,
        ];

        $rules = [

            'Location'        => 'required',
            'PhoneNumber1'    => 'required',
            'Email'           => 'required',
        ];

        $messages = [

            'Location.required'       => 'Please Enter UK Location',
            'PhoneNumber1.required'   => 'Please Enter UK Phone Number',
            'Email.required'          => 'Please Enter UK Email Id',
        ];

        $validation = Validator::make($inputs, $rules, $messages);

        if( $validation->fails() ){
            return redirect()->back()->withInput()->with('errors', $validation->errors() );
        }

        // $pageExist = DB::table('Pages')->select('*')->where('PageTitle', '=', $PageTitle)->count();
        // if($pageExist > 0){
        //     return redirect()->back()->withInput()->with('singleerror', 'Duplicate page name.' );
        // }
       
        $count= DB::table('contact_uk')->select('*')->count();

        if($count > 0){
            //update
            $contact_uk_id= DB::table('contact_uk')->select('id')->get();
            DB::table('contact_uk')->where('id', $contact_uk_id[0]->id)->update([
                'Location'=>$Location,
                'PhoneNumber1'=>$PhoneNumber1,
                'PhoneNumber2'=>$PhoneNumber2,
                'Email'=>$Email
            ]);
        } else {
            DB::statement('call insertContactUk("'.$Location.'", "'.$PhoneNumber1.'", "'.$PhoneNumber2.'", "'.$Email.'")');    
        }

        
         

        return redirect()->back()->with('message', 'Saved UK Contact.');

    }

    public function saveNewContactusa(Request $req){
       
        $UsaLocation            = $req->UsaLocation;
        $UsaPhoneNumber1        = $req->UsaPhoneNumber1;
        $UsaPhoneNumber2        = $req->UsaPhoneNumber2;
        $UsaEmail               = $req->UsaEmail;
       

        $inputs = [

            'UsaLocation'        => $UsaLocation,
            'UsaPhoneNumber1'    => $UsaPhoneNumber1,
            'UsaEmail'           => $UsaEmail,
        ];

        $rules = [

            'UsaLocation'        => 'required',
            'UsaPhoneNumber1'    => 'required',
            'UsaEmail'           => 'required',
        ];

        $messages = [

            'UsaLocation.required'  => 'Please Enter USA Location',
            'UsaPhoneNumber1.required'  => 'Please Enter USA Phone Number',
            'UsaEmail.required'  => 'Please Enter USA Email Id',
        ];

        $validation = Validator::make($inputs, $rules, $messages);

        if( $validation->fails() ){
            return redirect()->back()->withInput()->with('errors', $validation->errors() );
        }

       
         $count= DB::table('contact_usa')->select('*')->count();

        if($count > 0){
            //update
            $contact_usa_id= DB::table('contact_usa')->select('id')->get();
            DB::table('contact_usa')->where('id', $contact_usa_id[0]->id)->update([
                'Location'=>$UsaLocation,
                'PhoneNumber1'=>$UsaPhoneNumber1,
                'PhoneNumber2'=>$UsaPhoneNumber2,
                'Email'=>$UsaEmail
            ]);
        } else {
             DB::statement('call insertContactUSA("'.$UsaLocation.'", "'.$UsaPhoneNumber1.'", "'.$UsaPhoneNumber2.'", "'.$UsaEmail.'")');   
        }


       
        return redirect()->back()->with('message', 'Saved USA Contact.');

    }

    public function saveFooterContact(Request $req){

        return 's';
       
        $FooterLocation            = $req->FooterLocation;
        $FooterPhoneNumber1        = $req->FooterPhoneNumber1;
        $FooterPhoneNumber2        = $req->FooterPhoneNumber2;
        $FooterEmail               = $req->FooterEmail;
       

        $inputs = [

            'FooterLocation'        => $FooterLocation,
            'FooterPhoneNumber1'    => $FooterPhoneNumber1,
            'FooterEmail'           => $FooterEmail,
        ];

        $rules = [

            'FooterLocation'        => 'required',
            'FooterPhoneNumber1'    => 'required',
            'FooterEmail'           => 'required',
        ];

        $messages = [

            'FooterLocation.required'  => 'Please Enter Location',
            'FooterPhoneNumber1.required'  => 'Please Enter Phone Number',
            'FooterEmail.required'  => 'Please Enter Email Id',
        ];

        $validation = Validator::make($inputs, $rules, $messages);

        if( $validation->fails() ){
            return redirect()->back()->withInput()->with('errors', $validation->errors() );
        }

       
         $count= DB::table('footer_contact')->select('*')->count();

        if($count > 0){
            //update
            $contact_footer_id= DB::table('footer_contact')->select('id')->get();
            DB::table('footer_contact')->where('id', $contact_footer_id[0]->id)->update([
                'Location'=>$FooterLocation,
                'PhoneNumber1'=>$FooterPhoneNumber1,
                'PhoneNumber2'=>$FooterPhoneNumber2,
                'Email'=>$FooterEmail
            ]);
        } else {
             DB::statement('call insertFooterContact("'.$FooterLocation.'", "'.$FooterPhoneNumber1.'", "'.$FooterPhoneNumber2.'", "'.$FooterEmail.'")');   
        }


       
        return redirect()->back()->with('message', 'Saved Footer Contact.');

    }

    public function saveFeaturedpost(Request $req){
       
        
        
        $FeaturedTitle          = addslashes($req->FeaturedTitle);
        $FeaturedContent        = addslashes($req->FeaturedContent);
        $link                   = $req->link;
        $FeaturedImage          = $req->file('FeaturedImage');
        

        

        $inputs = [

            'FeaturedTitle'              => $FeaturedTitle,
            'FeaturedContent'            => $FeaturedContent,
            'FeaturedImage'              => $FeaturedImage,
            'link'                       => $link 
        ];

        $rules = [

            'FeaturedTitle'          => 'required|max:30',
            'FeaturedContent'        => 'required',
            'FeaturedImage'          => 'required',
            'link'                   => 'required'   
        ];

        $messages = [

            'FeaturedTitle.required'    => 'Please Enter Featured Title.',
            'FeaturedContent.required'  => 'Please Enter Featured Content.',
            'FeaturedImage.required'    => 'Please Upload Featured Image.',
            'link.required'             => 'Please Select Featured Link.'
        ];

        $validation = Validator::make($inputs, $rules, $messages);

        if( $validation->fails() ){
            return redirect()->back()->withInput()->with('errors', $validation->errors() );
        }

        

        // Featured Post Image  


        if($FeaturedImage){
            

            $destinationPath    ='featurePostImage'; // upload path folder should be in public folder
            $thumb555X530       ='featurePostImage/thumb555X530'; // upload 128*128
            

            $extension      = $FeaturedImage->getClientOriginalExtension(); // getting image extension
            $originalName   = $FeaturedImage->getClientOriginalName();
            $size           = $FeaturedImage->getSize();
            $fileName1      = time().$originalName; // renameing image

            // condition to check type of file and size of file..
            if((($extension=='jpg') || ($extension=='png') || ($extension=='jpeg') || ($extension=='JPEG') || ($extension=='JPG') || ($extension=='PNG'))&&($size<5000000)){


                Image::make($FeaturedImage,array(
                    'width' => 555,
                    'height' => 530,
                    'crop' => true
                ))->save($thumb555X530.'/'.$fileName1);
                //save original
                Image::make($FeaturedImage)->save($destinationPath.'/'.$fileName1);


                
                
            } else {
                return redirect()->back()->withInput()->with('error', 'Only maximum 5MB jpg or png image is allowed.' );
            }
        } else {
            $fileName1 = '';
        }

         DB::statement('call insertFeaturedPost("'.$FeaturedTitle.'", "'.$FeaturedContent.'", "'.$fileName1.'", "'.$link.'")');

        return redirect()->back()->with('message', 'Featured Post Added successfully!!');

    }

    public function updateFeaturedpost(Request $req){
       
        
        $id                     = $req->id;
        $FeaturedContent        = addslashes($req->FeaturedContent);
        $FeaturedTitle          = addslashes($req->FeaturedTitle);
        $FeaturedImage          = $req->file('FeaturedImage');
        $oldFeaturedImage       = $req->oldFeaturedImage;
        $link                   = $req->link;

        
        $inputs = [

            'FeaturedTitle'                 => $FeaturedTitle,
            'FeaturedContent'               => $FeaturedContent,
            'link'                          => $link
            
        ];

        $rules = [

            'FeaturedTitle'               => 'required|max:30',
            'FeaturedContent'             => 'required',
            'link'                        => 'required'
            
        ];

        $messages = [

            'FeaturedTitle.required'    => 'Please Enter Featured Title.',
            'FeaturedContent.required'  => 'Please Enter Featured Content.',
            'link.required'             => 'Please Select Featured Link.'
            
        ];

        $validation = Validator::make($inputs, $rules, $messages);

        if( $validation->fails() ){
            return redirect()->back()->withInput()->with('errors', $validation->errors() );
        }

        
        

        if($FeaturedImage){
            

            $destinationPath    ='featurePostImage'; // upload path folder should be in public folder
            $thumb555X530       ='featurePostImage/thumb555X530'; // upload 128*128
            

            $extension      = $FeaturedImage->getClientOriginalExtension(); // getting image extension
            $originalName   = $FeaturedImage->getClientOriginalName();
            $size           = $FeaturedImage->getSize();
            $fileName1      = time().$originalName; // renameing image

            // condition to check type of file and size of file..
            if((($extension=='jpg') || ($extension=='png') || ($extension=='jpeg') || ($extension=='JPEG') || ($extension=='JPG') || ($extension=='PNG'))&&($size<5000000)){


                Image::make($FeaturedImage,array(
                    'width' => 555,
                    'height' => 530,
                    'crop' => true
                ))->save($thumb555X530.'/'.$fileName1);
                //save original
                Image::make($FeaturedImage)->save($destinationPath.'/'.$fileName1);


                
                
            } else {
                return redirect()->back()->withInput()->with('error', 'Only maximum 5MB jpg or png image is allowed.' );
            }
        } else {
            $fileName1 = $oldFeaturedImage;
        }

        

        DB::table('featured_post')->where('id', $id)->update([
            'FeaturedTitle'         => $FeaturedTitle,
            'FeaturedContent'       => $FeaturedContent,
            'FeaturedImage'         => $fileName1,
            'FeaturedLink'          => $link 
        ]);

       

        return redirect()->back()->with('message', 'Featured Post Update successfully!!');
    }

    public function saveGalleryImage(Request $req){
        
        $GalleryImage      = $req->file('GalleryImage');
        

        $inputs = [
            
            'GalleryImage'                  => $GalleryImage 
        ];

        $rules = [
            
            'GalleryImage'              => 'required'   
        ];

        $messages = [

            'GalleryImage.required'  => 'Please Upload Image.'
        ];

        $validation = Validator::make($inputs, $rules, $messages);

        if( $validation->fails() ){
            return redirect()->back()->withInput()->with('errors', $validation->errors() );
        }

        
      

        // Gallery image 


        if($GalleryImage){
            

            $destinationPat       ='galleryImage'; // upload path folder should be in public folder
            $thumb337X249         ='galleryImage/thumb337X249'; // upload 128*128
            $thumb700X517         ='galleryImage/thumb700X517'; // upload 128*128
            $thumb64X64           ='galleryImage/thumb64X64'; // upload 128*128
            $thumb61X61           ='galleryImage/thumb61X61';
            $thumb387X400         ='galleryImage/thumb387X400';

            $extension      = $GalleryImage->getClientOriginalExtension(); // getting image extension
            $originalName   = $GalleryImage->getClientOriginalName();
            $size           = $GalleryImage->getSize();
            $fileName1      = time().$originalName; // renameing image

            // condition to check type of file and size of file..
            if((($extension=='jpg') || ($extension=='png') || ($extension=='jpeg') || ($extension=='JPEG') || ($extension=='JPG') || ($extension=='PNG'))&&($size<5000000)){


                Image::make($GalleryImage,array(
                    'width' => 337,
                    'height' => 249,
                    'crop' => true
                ))->save($thumb337X249.'/'.$fileName1);

                Image::make($GalleryImage,array(
                    'width' => 700,
                    'height' => 517,
                    'crop' => true
                ))->save($thumb700X517.'/'.$fileName1);

                 Image::make($GalleryImage,array(
                    'width' => 64,
                    'height' => 64,
                    'crop' => true
                ))->save($thumb64X64.'/'.$fileName1);
                  Image::make($GalleryImage,array(
                    'width' => 61,
                    'height' => 61,
                    'crop' => true
                ))->save($thumb61X61.'/'.$fileName1);
                   Image::make($GalleryImage,array(
                    'width' => 387,
                    'height' => 400,
                    'crop' => true
                ))->save($thumb387X400.'/'.$fileName1);

                //save original
                Image::make($GalleryImage)->save($destinationPath.'/'.$fileName1);


                
                
            } else {
                return redirect()->back()->withInput()->with('error', 'Only maximum 5MB jpg or png image is allowed.' );
            }
        } else {
            $fileName1 = '';
        }

        DB::table('gallery_image')->insert([
            
            'GalleryImage'      => $fileName1 
        ]);

        return redirect()->back()->with('message', 'Gallery Image Added successfully!!');

    }

     public function updateGalleryimage(Request $req){
       
        
        $id                     = $req->id;
        $GalleryImage          = $req->file('GalleryImage');
        $oldGalleryImage       = $req->oldGalleryImage;
       


        if($GalleryImage){
            

            $destinationPath    ='galleryImage'; // upload path folder should be in public folder
            $thumb337X249       ='galleryImage/thumb337X249'; // upload 128*128
            $thumb700X517       ='galleryImage/thumb700X517'; // upload 128*128
            $thumb64X64         ='galleryImage/thumb64X64'; // upload 128*128
            $thumb61X61         ='galleryImage/thumb61X61';
            $thumb387X400       ='galleryImage/thumb387X400';

            $extension      = $GalleryImage->getClientOriginalExtension(); // getting image extension
            $originalName   = $GalleryImage->getClientOriginalName();
            $size           = $GalleryImage->getSize();
            $fileName1      = time().$originalName; // renameing image

            // condition to check type of file and size of file..
            if((($extension=='jpg') || ($extension=='png') || ($extension=='jpeg') || ($extension=='JPEG') || ($extension=='JPG') || ($extension=='PNG'))&&($size<5000000)){


                Image::make($GalleryImage,array(
                    'width' => 337,
                    'height' => 249,
                    'crop' => true
                ))->save($thumb337X249.'/'.$fileName1);

                 Image::make($GalleryImage,array(
                    'width' => 700,
                    'height' => 517,
                    'crop' => true
                ))->save($thumb700X517.'/'.$fileName1);

                 Image::make($GalleryImage,array(
                    'width' => 64,
                    'height' => 64,
                    'crop' => true
                ))->save($thumb61X61.'/'.$fileName1);
                 Image::make($GalleryImage,array(
                    'width' => 61,
                    'height' => 61,
                    'crop' => true
                ))->save($thumb61X61.'/'.$fileName1);
                  Image::make($GalleryImage,array(
                    'width' => 387,
                    'height' => 400,
                    'crop' => true
                ))->save($thumb387X400.'/'.$fileName1);
                //save original
                Image::make($GalleryImage)->save($destinationPath.'/'.$fileName1);


                
                
            } else {
                return redirect()->back()->withInput()->with('error', 'Only maximum 5MB jpg or png image is allowed.' );
            }
        } else {
            $fileName1 = $oldGalleryImage;
        }

        

        DB::table('gallery_image')->where('id', $id)->update([
            
            'GalleryImage'         => $fileName1
           
        ]);

       

        return redirect()->back()->with('message', 'Gallery Image Update successfully!!');
    }

    public function saveHomepageCounter(Request $req){
       
        
        
        $CounterTitle          = addslashes($req->CounterTitle);
        $CounterNumber         = $req->CounterNumber;
        $CounterImage          = $req->file('CounterImage');
        

        

        $inputs = [

            'CounterTitle'              => $CounterTitle,
            'CounterImage'              => $CounterImage,
            'CounterNumber'             => $CounterNumber 
        ];

        $rules = [

            'CounterTitle'          => 'required|max:30',
            'CounterImage'          => 'required',
            'CounterNumber'         => 'required'   
        ];

        $messages = [

            'CounterTitle.required'    => 'Title is required.',
            'CounterNumber.required'   => 'Number is required.',
            'CounterImage.required'    => 'Icon image is required.'
        ];

        $validation = Validator::make($inputs, $rules, $messages);

        if( $validation->fails() ){
            return redirect()->back()->withInput()->with('errors', $validation->errors() );
        }

        

        // Counter Image  


        if($CounterImage){
            

            $destinationPath    ='counterImage'; // upload path folder should be in public folder
            $thumb64X64       ='counterImage/thumb64X64'; // upload 128*128
            

            $extension      = $CounterImage->getClientOriginalExtension(); // getting image extension
            $originalName   = $CounterImage->getClientOriginalName();
            $size           = $CounterImage->getSize();
            $fileName1      = time().$originalName; // renameing image

            // condition to check type of file and size of file..
            if(($extension=='png' || $extension=='PNG') && $size<5000000){


                Image::make($CounterImage,array(
                    'width' => 64,
                    'height' => 64,
                    'crop' => true
                ))->save($thumb64X64.'/'.$fileName1);
                //save original
                Image::make($CounterImage)->save($destinationPath.'/'.$fileName1);


                
                
            } else {
                return redirect()->back()->withInput()->with('error', 'Only maximum 5MB png image is allowed.' );
            }
        } else {
            $fileName1 = '';
        }

         DB::statement('call insertHomepageCounter("'.$CounterTitle.'", "'.$CounterNumber.'", "'.$fileName1.'")');

        return redirect()->back()->with('message', 'Counter Added.');

    }

    public function updateCounter(Request $req){
       
        
        $id                    = $req->id;
        $CounterNumber         = $req->CounterNumber;
        $CounterTitle          = addslashes($req->CounterTitle);
        $CounterImage          = $req->file('CounterImage');
        $oldCounterImage       = $req->oldCounterImage;
        

        
        $inputs = [

            'CounterTitle'                 => $CounterTitle,
            'CounterNumber'               => $CounterNumber
           
            
        ];

        $rules = [

            'CounterTitle'               => 'required|max:30',
            'CounterNumber'             => 'required'
            
            
        ];

        $messages = [

            
            'CounterTitle.required'    => 'Title is required.',
            'CounterNumber.required'   => 'Number is required.',
            
            
            
        ];

        $validation = Validator::make($inputs, $rules, $messages);

        if( $validation->fails() ){
            return redirect()->back()->withInput()->with('errors', $validation->errors() );
        }

        
        

        if($CounterImage){
            

            $destinationPath    ='counterImage'; // upload path folder should be in public folder
            $thumb64X64       ='counterImage/thumb64X64'; // upload 128*128
            

            $extension      = $CounterImage->getClientOriginalExtension(); // getting image extension
            $originalName   = $CounterImage->getClientOriginalName();
            $size           = $CounterImage->getSize();
            $fileName1      = time().$originalName; // renameing image

            // condition to check type of file and size of file..
            if(($extension=='png' || $extension=='PNG') && $size<5000000){


                Image::make($CounterImage,array(
                    'width' => 64,
                    'height' => 64,
                    'crop' => true
                ))->save($thumb64X64.'/'.$fileName1);
                //save original
                Image::make($CounterImage)->save($destinationPath.'/'.$fileName1);


                
                
            } else {
                return redirect()->back()->withInput()->with('error', 'Only maximum 5MB png image is allowed.' );
            }
        } else {
            $fileName1 = $oldCounterImage;
        }

        

        DB::table('homepage_counter')->where('id', $id)->update([
            'CounterTitle'         => $CounterTitle,
            'CounterNumber'       => $CounterNumber,
            'CounterImage'         => $fileName1
             
        ]);

       

        return redirect()->back()->with('message', 'Content Updated.');
    }

    public function saveCountDown(Request $req){
       
        
        
        $Heading          = addslashes($req->Heading);
        $CountdownDate         = $req->CountdownDate;
      

        $inputs = [

            'Heading'                    => $Heading,
            'CountdownDate'              => $CountdownDate
           
        ];

        $rules = [

            'Heading'                => 'required',
            'CountdownDate'          => 'required'
             
        ];

        $messages = [

            'Heading.required'         => 'Please Enter Heading.',
            'CountdownDate.required'   => 'Please Enter Date masks.'
           
        ];

        $validation = Validator::make($inputs, $rules, $messages);

        if( $validation->fails() ){
            return redirect()->back()->withInput()->with('errors', $validation->errors() );
        }


         $count= DB::table('home_countdown')->select('*')->count();

        if($count > 0){
            //update
            $home_countdown_id= DB::table('home_countdown')->select('id')->get();
            DB::table('home_countdown')->where('id', $home_countdown_id[0]->id)->update([
                'Heading'=>$Heading,
                'CountdownDate'=>$CountdownDate
                
            ]);
        } else {
            DB::statement('call insertHomeCountDown("'.$Heading.'", "'.$CountdownDate.'")');   
        }


        return redirect()->back()->with('message', 'Saved successfully!!');

    }

    public function updateCountDown(Request $req){
       
        
        $id                     = $req->id;
        $Heading                = addslashes($req->Heading);
        $CountdownDate          = $req->CountdownDate;
       

        
        $inputs = [

            'Heading'                 => $Heading,
            'CountdownDate'               => $CountdownDate
           
            
        ];

        $rules = [

            'Heading'               => 'required',
            'CountdownDate'             => 'required'
            
            
        ];

        $messages = [

            'Heading.required'    => 'Please Enter Heading.',
            'CountdownDate.required'  => 'Please Enter Date masks.'
            
            
        ];

        $validation = Validator::make($inputs, $rules, $messages);

        if( $validation->fails() ){
            return redirect()->back()->withInput()->with('errors', $validation->errors() );
        }

       

        DB::table('home_countdown')->where('id', $id)->update([
            'Heading'             => $Heading,
            'CountdownDate'       => $CountdownDate
            
             
        ]);

       

        return redirect()->back()->with('message', 'Count Down Updated successfully!!');
    }

    public function saveSingleFeaturedpost(Request $req){
       
        
        
        $FeaturedTitle          = addslashes($req->FeaturedTitle);
        $FeaturedContent        = addslashes($req->FeaturedContent);
        $link                   = $req->link;
        $FeaturedImage          = $req->file('FeaturedImage');
        

        

        $inputs = [

            'FeaturedTitle'              => $FeaturedTitle,
            'FeaturedContent'            => $FeaturedContent,
            'FeaturedImage'              => $FeaturedImage,
            'link'                       => $link 
        ];

        $rules = [

            'FeaturedTitle'          => 'required|max:30',
            'FeaturedContent'        => 'required',
            'FeaturedImage'          => 'required',
            'link'                   => 'required'   
        ];

        $messages = [

            'FeaturedTitle.required'    => 'Please Enter Featured Title.',
            'FeaturedContent.required'  => 'Please Enter Featured Content.',
            'FeaturedImage.required'    => 'Please Upload Featured Image.',
            'link.required'             => 'Please Select Featured Link.'
        ];

        $validation = Validator::make($inputs, $rules, $messages);

        if( $validation->fails() ){
            return redirect()->back()->withInput()->with('errors', $validation->errors() );
        }

        

        // Featured Post Image  


        if($FeaturedImage){
            

            $destinationPath    ='singleFeaturePostImage'; // upload path folder should be in public folder
            $thumb555X255       ='singleFeaturePostImage/thumb555X255'; // upload 128*128
            

            $extension      = $FeaturedImage->getClientOriginalExtension(); // getting image extension
            $originalName   = $FeaturedImage->getClientOriginalName();
            $size           = $FeaturedImage->getSize();
            $fileName1      = time().$originalName; // renameing image

            // condition to check type of file and size of file..
            if((($extension=='jpg') || ($extension=='png') || ($extension=='jpeg') || ($extension=='JPEG') || ($extension=='JPG') || ($extension=='PNG'))&&($size<5000000)){


                Image::make($FeaturedImage,array(
                    'width' => 555,
                    'height' => 255,
                    'crop' => true
                ))->save($thumb555X255.'/'.$fileName1);
                //save original
                Image::make($FeaturedImage)->save($destinationPath.'/'.$fileName1);


                
                
            } else {
                return redirect()->back()->withInput()->with('error', 'Only maximum 5MB jpg or png image is allowed.' );
            }
        } else {
            $fileName1 = '';
        }

         DB::statement('call insertSingleFeaturedPost("'.$FeaturedTitle.'", "'.$FeaturedContent.'", "'.$fileName1.'", "'.$link.'")');

        return redirect()->back()->with('message', 'Single Featured Post Added successfully!!');

    }

    public function updateSingleFeaturedpost(Request $req){
       
        
        $id                     = $req->id;
        $FeaturedContent        = addslashes($req->FeaturedContent);
        $FeaturedTitle          = addslashes($req->FeaturedTitle);
        $FeaturedImage          = $req->file('FeaturedImage');
        $oldFeaturedImage       = $req->oldFeaturedImage;
        $link                   = $req->link;

        
        $inputs = [

            'FeaturedTitle'                 => $FeaturedTitle,
            'FeaturedContent'               => $FeaturedContent,
            'link'                          => $link
            
        ];

        $rules = [

            'FeaturedTitle'               => 'required|max:30',
            'FeaturedContent'             => 'required',
            'link'                        => 'required'
            
        ];

        $messages = [

            'FeaturedTitle.required'    => 'Please Enter Featured Title.',
            'FeaturedContent.required'  => 'Please Enter Featured Content.',
            'link.required'             => 'Please Select Featured Link.'
            
        ];

        $validation = Validator::make($inputs, $rules, $messages);

        if( $validation->fails() ){
            return redirect()->back()->withInput()->with('errors', $validation->errors() );
        }

        
        

        if($FeaturedImage){
            

            $destinationPath    ='singleFeaturePostImage'; // upload path folder should be in public folder
            $thumb555X255       ='singleFeaturePostImage/thumb555X255'; // upload 128*128
            

            $extension      = $FeaturedImage->getClientOriginalExtension(); // getting image extension
            $originalName   = $FeaturedImage->getClientOriginalName();
            $size           = $FeaturedImage->getSize();
            $fileName1      = time().$originalName; // renameing image

            // condition to check type of file and size of file..
            if((($extension=='jpg') || ($extension=='png') || ($extension=='jpeg') || ($extension=='JPEG') || ($extension=='JPG') || ($extension=='PNG'))&&($size<5000000)){


                Image::make($FeaturedImage,array(
                    'width' => 555,
                    'height' => 255,
                    'crop' => true
                ))->save($thumb555X255.'/'.$fileName1);
                //save original
                Image::make($FeaturedImage)->save($destinationPath.'/'.$fileName1);


                
                
            } else {
                return redirect()->back()->withInput()->with('error', 'Only maximum 5MB jpg or png image is allowed.' );
            }
        } else {
            $fileName1 = $oldFeaturedImage;
        }

        

        DB::table('singlefeatured_post')->where('id', $id)->update([
            'FeaturedTitle'         => $FeaturedTitle,
            'FeaturedContent'       => $FeaturedContent,
            'FeaturedImage'         => $fileName1,
            'FeaturedLink'          => $link 
        ]);

       

        return redirect()->back()->with('message', 'Single Featured Post Updated successfully!!');
    }

    public function saveActionBox(Request $req){
       
        
        
        $ActionTitle          = addslashes($req->ActionTitle);
        $ActionSubTitle       = addslashes($req->ActionSubTitle);
        $ActionbuttonText     = addslashes($req->ActionbuttonText);
        $link                 = $req->link;
        
        

        

        $inputs = [

            'ActionTitle'              => $ActionTitle,
            'ActionSubTitle'           => $ActionSubTitle,
            'ActionbuttonText'         => $ActionbuttonText,
            'link'                     => $link 
        ];

        $rules = [

            'ActionTitle'          => 'required',
            'ActionSubTitle'       => 'required',
            'ActionbuttonText'     => 'required',
            'link'                 => 'required'   
        ];

        $messages = [

            'ActionTitle.required'      => 'Please Enter heading.',
            'ActionSubTitle.required'   => 'Please Enter subheading.',
            'ActionbuttonText.required' => 'Please Enter button text.',
            'link.required'             => 'Please Select a link.'
        ];

        $validation = Validator::make($inputs, $rules, $messages);

        if( $validation->fails() ){
            return redirect()->back()->withInput()->with('errors', $validation->errors() );
        }
        DB::table('action_box')->truncate();
        DB::table('action_box')->insert([
            'ActionTitle'=>$ActionTitle,
            'ActionSubTitle'=>$ActionSubTitle,
            'ActionbuttonText'=>$ActionbuttonText,
            'link'=>$link
        ]);

        // $count= DB::table('action_box')->select('*')->count();
        // if($count > 0){
            
        //     $action_box__id= DB::table('action_box')->select('id')->get();
        //     DB::table('action_box')->where('id', $action_box__id[0]->id)->update([
        //         'ActionTitle'=>$ActionTitle,
        //         'ActionSubTitle'=>$ActionSubTitle,
        //         'link'=>$link
                
        //     ]);
        // } else {
        //      DB::statement('call insertActionBox("'.$ActionTitle.'", "'.$ActionSubTitle.'", "'.$link.'")'); 
        // }




        return redirect()->back()->with('message', 'Content Updated.');

    }

     public function updateActionbox(Request $req){
       
        
        $id                     = $req->id;
        $ActionTitle            = addslashes($req->ActionTitle);
        $ActionSubTitle         = addslashes($req->ActionSubTitle);
        $link                   = $req->link;

        
        $inputs = [

            'ActionTitle'              => $ActionTitle,
            'ActionSubTitle'           => $ActionSubTitle,
            'link'                     => $link 
        ];

        $rules = [

            'ActionTitle'          => 'required',
            'ActionSubTitle'        => 'required',
            'link'                   => 'required'   
        ];

        $messages = [

            'ActionTitle.required'    => 'Please Enter Action Title.',
            'ActionSubTitle.required'  => 'Please Enter Action Sub Title.',
            'link.required'             => 'Please Select Action Link.'
        ];

        $validation = Validator::make($inputs, $rules, $messages);

        if( $validation->fails() ){
            return redirect()->back()->withInput()->with('errors', $validation->errors() );
        }


        DB::table('action_box')->where('id', $id)->update([
            'ActionTitle'          => $ActionTitle,
            'ActionSubTitle'       => $ActionSubTitle,
            'link'                 => $link 
        ]);

       

        return redirect()->back()->with('message', 'Action Box Updated successfully!!');
    }


    public function add_address(Request $req){
       
        $officename = addslashes($req->officename);
        $address    = addslashes($req->address);
        $phone1     = addslashes($req->phone1);
        $phone2     = addslashes($req->phone2);
        $email      = addslashes($req->email);
    
        $inputs = [
            'officename' => $officename,
            'address'    => $address
        ];

        $rules = [
            'officename' => 'required',
            'address'    => 'required'
        ];

        $messages = [
            'officename.required'  => 'Office name is required.',
            'address.required'  => 'Address is required.'
        ];

        $validation = Validator::make($inputs, $rules, $messages);

        if( $validation->fails() ){
            return redirect()->back()->withInput()->with('errors', $validation->errors() );
        }

        

        try{

            DB::table('contactus_address')->insert([
                'officename'    => $officename,
                'address'       => $address,
                'phone1'        => $phone1,
                'phone2'        => $phone2,
                'email'         => $email
            ]);
            return redirect()->back()->with('message', 'Address saved.');

        } catch(\Exception $e) {
            return redirect()->back()->withinput()->with('singleerror', 'Exception Error!');
        }
    }


    public function update_address(Request $req){
       
        $officename = addslashes($req->officename);
        $address    = addslashes($req->address);
        $phone1     = addslashes($req->phone1);
        $phone2     = addslashes($req->phone2);
        $email      = addslashes($req->email);
        $id         = $req->id;
    
        $inputs = [
            'officename' => $officename,
            'address'    => $address
        ];

        $rules = [
            'officename' => 'required',
            'address'    => 'required'
        ];

        $messages = [
            'officename.required'  => 'Office name is required.',
            'address.required'  => 'Address is required.'
        ];

        $validation = Validator::make($inputs, $rules, $messages);

        if( $validation->fails() ){
            return redirect()->back()->withInput()->with('errors', $validation->errors() );
        }

        try{

            DB::table('contactus_address')->where('id', '=', $id)->update([
                'officename'    => $officename,
                'address'       => $address,
                'phone1'        => $phone1,
                'phone2'        => $phone2,
                'email'         => $email
            ]);
            return redirect()->back()->with('message', 'Address updated.');

        } catch(\Exception $e) {
            return redirect()->back()->withinput()->with('singleerror', 'Exception Error!');
        }
    }

    public function checkemailexist(Request $req){
        $val = addslashes($req->val);
        $count = DB::table('users')->where('email', '=', $val)->count();
        return trim($count);
    }

    public function save_aboutkbf(Request $req){

        $Kbf_Text            = $req->Kbf_Text;
        $Mail_id            = $req->Mail_id;
        $Contact_no        = $req->Contact_no;
        
     
        $inputs = [

            'Kbf_Text'        => $Kbf_Text,
            'Mail_id'         => $Mail_id,
            'Contact_no'           => $Contact_no,
        ];

        $rules = [

            'Kbf_Text'        => 'required',
            'Mail_id'    => 'required',
            'Contact_no'           => 'required',
        ];

        $messages = [

            'Kbf_Text.required'  => 'Please Enter Text',
            'Mail_id.required'  => 'Please Enter Email',
            'Contact_no.required'  => 'Please Enter Phone no.',
        ];

        $validation = Validator::make($inputs, $rules, $messages);

        if( $validation->fails() ){
            return redirect()->back()->withInput()->with('errors', $validation->errors() );
        }

        // $pageExist = DB::table('Pages')->select('*')->where('PageTitle', '=', $PageTitle)->count();
        // if($pageExist > 0){
        //     return redirect()->back()->withInput()->with('singleerror', 'Duplicate page name.' );
        // }
       
        $count= DB::table('organizer_detail')->select('*')->count();

        if($count > 0){
            //update
            $contact_uk_id= DB::table('organizer_detail')->select('id')->get();
            DB::table('organizer_detail')->where('id', $contact_uk_id[0]->id)->update([
                'Kbf_Text'=>$Kbf_Text,
                'Mail_id'=>$Mail_id,
                'Contact_no'=>$Contact_no
                
            ]);
        } else {
            DB::statement('call insertorganizer_detail("'.$Kbf_Text.'", "'.$Mail_id.'", "'.$Contact_no.'")');    
        }

        
         

        return redirect()->back()->with('message', 'Saved .');

    }

    

    public function saveCftMap(Request $req){

        $map_link            = $req->map_link;
        $city                = $req->city;
        $address             = $req->address;
       
        
     
        $inputs = [

            'map_link'        => $map_link,
            'city'            => $city,
            'address'         => $address,
        ];

        $rules = [

            'map_link'        => 'required',
            'city'            => 'required',
            'address'         => 'required',
            
        ];

        $messages = [

            'map_link.required'  => 'Please Enter Map Link',
            'city.required'      => 'Please Enter City',
            'address.required'   => 'Please Enter Address',
            
        ];

        $validation = Validator::make($inputs, $rules, $messages);

        if( $validation->fails() ){
            return redirect()->back()->withInput()->with('errors', $validation->errors() );
        }

       
        $count= DB::table('map_link')->select('*')->count();

        if($count > 0){
            //update
            $map_link_id= DB::table('map_link')->select('id')->get();
            DB::table('map_link')->where('id', $map_link_id[0]->id)->update([
                'map_api' =>$map_link,
                'city'    =>$city,
                'address' =>$address
                
            ]);
        } else {

            DB::table('map_link')->insert([
                'map_api'    => $map_link,
                'city'       =>$city,
                'address'    =>$address
                
            ]);
        }


        return redirect()->back()->with('message', 'Saved Map.');

    }




    

    


}
