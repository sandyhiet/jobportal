<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers\ServiceCategory;

use Illuminate\Http\Request;
use Validator;
use Redirect;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Image;



class categoryController extends Controller
{
    /*///////////////////////update category//////////////////////*/

    public function update_sub_category(Request $req){
        $sub_category_id = $req->sub_category_id;
        $sub_category_title = $req->sub_category_title;
        DB::table('tbl_sub_category')->where('sub_category_id', $sub_category_id)->update([
            'sub_category_title'=>$sub_category_title
        ]);
        return redirect()->back();
    }
   

    public function add_category(Request $req){
       
        
        
        $category_name = addslashes($req->category_name);
        $category_name = str_replace(' ', '_', $category_name); // Replaces all spaces with underscore.
        $category_name = preg_replace('/[^A-Za-z0-9_]/', '', $category_name); // Removes special chars includ _.
        $category_name = preg_replace('/_+/', '_', $category_name); // Replaces multiple underscore with single one.
        $category_name = strtolower($category_name);

        $inputs = [

            'category_name'              => $category_name
           
        ];

        $rules = [

            'category_name'          => 'required'
            
        ];

        $messages = [

           
            'category_name.required'    => 'Please Enter Category Name.',
            'category_name.unique'    => 'Category name already exist.'

           
        ];

        $validation = Validator::make($inputs, $rules, $messages);

        if( $validation->fails() ){
            return redirect()->back()->withInput()->with('errors', $validation->errors() );
        }

         $category_id = DB::table('tbl_category')->insert([
             'category_name'  =>$category_name,
            ]);

        return redirect()->back()->with('message', 'Category Added.');

    }

    public function add_Sub_Category(Request $req){
       
        
        
        $sub_category_name = addslashes($req->sub_category_name);
        $sub_category_name = str_replace(' ', '_', $sub_category_name); // Replaces all spaces with underscore.
        $sub_category_name = preg_replace('/[^A-Za-z0-9_]/', '', $sub_category_name); // Removes special chars includ _.
        $sub_category_name = preg_replace('/_+/', '_', $sub_category_name); // Replaces multiple underscore with single one.
        $sub_category_name = strtolower($sub_category_name);
        $sub_category_title = $req->sub_category_title;

        $inputs = [

            'sub_category_title'              => $sub_category_title
           
        ];

        $rules = [

            'sub_category_title'          => 'required',
            
        ];

        $messages = [

           
            'sub_category_title.required'    => 'Please Enter Title.',
          
           
        ];

        $validation = Validator::make($inputs, $rules, $messages);

        if( $validation->fails() ){
            return redirect()->back()->withInput()->with('errors', $validation->errors() );
        }

         DB::table('tbl_sub_category')->insert([
             'category_id'  =>$sub_category_name,
             'sub_category_title' =>$sub_category_title,
            ]);

        return redirect()->back()->with('message', 'Sub Category Added.');

    }


    public function all_category(){

        $all_category = DB::select('select * FROM tbl_category, tbl_sub_category WHERE tbl_category.category_id = tbl_sub_category.category_id');
        $data = array('pagetitle'=>'All category');
        return view('admin.all_category', $data)->with('all_category',$all_category);
        
    }


    public function deletesubcategory($sub_category_id){
        // DB::table('users')->where('votes', '<', 100)->delete();
       DB::table('tbl_sub_category')->where('sub_category_id', $sub_category_id)->delete();
        return redirect()->back()->with('message', 'Category Deleted.');


    }


    //////////////////////////////KEYSKILLS///////////////////////////////////////////////////////////

    public function add_keyskills(Request $req){
       
        
        
        $Keyskill_name = $req->Keyskill_name;
        // $Keyskill_name = str_replace(' ', '_', $Keyskill_name); // Replaces all spaces with underscore.
        // $Keyskill_name = preg_replace('/[^A-Za-z0-9_]/', '', $Keyskill_name); // Removes special chars includ _.
        // $Keyskill_name = preg_replace('/_+/', '_', $Keyskill_name); // Replaces multiple underscore with single one.
        // $Keyskill_name = strtolower($Keyskill_name);

        $inputs = [

            'Keyskill_name'              => $Keyskill_name
           
        ];

        $rules = [

            'Keyskill_name'          => 'required'
            
        ];

        $messages = [

           
            'Keyskill_name.required'    => 'Please Enter Keyskill Name.'

           
        ];

        $validation = Validator::make($inputs, $rules, $messages);

        if( $validation->fails() ){
            return redirect()->back()->withInput()->with('errors', $validation->errors() );
        }

         DB::table('keyskills')->insert([
             'Keyskill_name'  =>$Keyskill_name,
            ]);

        return redirect()->back()->with('message', 'Keyskill Name Added.');

    }


      public function all_keyskills(){

        $all_keyskills = DB::table('keyskills')->select('Keyskill_name');
        $data = array('pagetitle'=>'All keyskills');
        return view('admin.all_keyskills', $data)->with('all_keyskills',$all_keyskills);
        
    }


     public function deletekeyskill($id){
        // DB::table('users')->where('votes', '<', 100)->delete();
       DB::table('keyskills')->where('id', $id)->delete();
        return redirect()->back()->with('message', 'skill Deleted.');


    }

   public function update_skill(Request $req){
        $id = $req->id;
        $Keyskill_name = $req->Keyskill_name;
        DB::table('keyskills')->where('id', $id)->update([
            'Keyskill_name'=>$Keyskill_name
        ]);
        return redirect()->back()->with('message', 'Skill Updated');
    }

    //////////////////////////// ROLE   //////////////////////////////////////////////


    public function add_role_category(Request $req){


        $role_category_name = $req->role_category_name;


        $inputs   = [

            'role_category_name' =>$role_category_name

        ];

        $rules   = [


            'role_category_name'  => 'required|MAX:50'
        ];


        $messages  = [

            'role_category_name'   => 'Please Enter Role Category'

        ];

          $validation = Validator::make($inputs, $rules, $messages);

        if( $validation->fails() ){
            return redirect()->back()->withInput()->with('errors', $validation->errors() );
        }

         DB::table('role_category')->insert([
             'role_category_name'  =>$role_category_name,
            ]);

        return redirect()->back()->with('message', 'Role  Category Added.');

    }



     public function all_role_category(){

        $all_role_category = DB::table('role_category')->select('role_category_name');
        $data = array('pagetitle'=>'All keyskills');
        return view('admin.all_role_category', $data)->with('all_keyskills',$all_keyskills);
        
    }

    public function deleteRolecategory($id){
        
       DB::table('role_category')->where('id', $id)->delete();
        return redirect()->back()->with('message', 'Role Category Deleted.');


    }


    public function update_role(Request $req){
        $id = $req->id;
        $role_category_name = $req->role_category_name;
        DB::table('role_category')->where('id', $id)->update([
            'role_category_name'=>$role_category_name
        ]);
        return redirect()->back();
    }
   

    public function add_Event(Request $req){
       
        
        $event_category          = $req->event_category;
        $heading                 = addslashes(trim($req->heading));

        $heading = str_replace(' ', '_', $heading); // Replaces all spaces with underscore.
        $heading = preg_replace('/[^A-Za-z0-9_]/', '', $heading); // Removes special chars includ _.
        $heading = preg_replace('/_+/', '_', $heading); // Replaces multiple underscore with single one.
        $heading = strtolower($heading);

        $location                = addslashes($req->location);
        $cityStateCountry        = addslashes($req->cityStateCountry);
        $event_timeTo            = $req->event_timeTo;
        $event_timeFrom          = $req->event_timeFrom;
        $event_date              = $req->event_date;
        $event_overview          = addslashes($req->event_overview);
        $event_banner            = $req->file('event_banner');
        $event_icon              = $req->file('event_icon');
        $eventSummary            = $req->eventSummary;

     
        
        // $Edate=strtotime($event_date);
        // $EventDate=date("y-m-d",$Edate);

        

        $inputs = [

            'heading'              => $heading,
            'event_category'       => $event_category,
            'location'             => $location,
            'cityStateCountry'     => $cityStateCountry,
            'event_timeTo'         => $event_timeTo,
            'event_timeFrom'       => $event_timeFrom,
            'event_date'           => $event_date,
            'event_overview'       => $event_overview,

            'event_banner'         => $event_banner,
            'event_icon'           => $event_icon,
            'eventSummary'         => $eventSummary,
             
            
        ];

        $rules = [

            'heading'            => 'required|max:50|unique:event,heading',
            'event_category'     => 'required',
            'location'           => 'required',
            'cityStateCountry'   => 'required|max:50',
            'event_timeTo'       => 'required',
            'event_timeFrom'     => 'required',
            'event_date'         => 'required',
            'event_overview'     => 'required',
               
            'event_banner'       => 'required',
            'event_icon'         => 'required',
            'eventSummary'       => 'required',
            
        ];

        $messages = [

            'heading.required'           => 'Please Enter Title.',
            'heading.unique'             => 'Event Title already exist.',
            'event_category.required'    => 'Please Select Event Category.',
            'location.required'          => 'Please Enter Address.',
            'cityStateCountry.required'  => 'Please Enter city/State/Country.',
            'event_timeTo.required'      => 'Please Select Event Time To.',
            'event_timeFrom.required'    => 'Please Select Event Time From.',
            'event_date.required'        => 'Please Select Event Date.',
            'event_overview.required'    => 'Please Enter Event Overview.',
            
            'event_banner.required'      => 'Please Upload Banner Image.',
            'event_icon.required'        => 'Please Upload Icon Image.',
            'eventSummary.required'      => 'Please Enter Event Summary.'

        ];

        $validation = Validator::make($inputs, $rules, $messages);

        if( $validation->fails() ){
            return redirect()->back()->withInput()->with('errors', $validation->errors() );
        }

        

        

        // Event Banner Image  


        if($event_banner){
            

            $destinationPath    ='eventImage'; // upload path folder should be in public folder
            $thumb298X170       ='eventImage/thumb298X170'; // upload 128*128
            $thumb358X250       ='eventImage/thumb358X250'; // upload 128*128
            $thumb750X430       ='eventImage/thumb750X430'; // upload 128*128
            $thumb235X134       ='eventImage/thumb235X134'; // upload 128*128
            

            $extension      = $event_banner->getClientOriginalExtension(); // getting image extension
            $originalName   = $event_banner->getClientOriginalName();
            $size           = $event_banner->getSize();
            $fileName1      = time().$originalName; // renameing image

            // condition to check type of file and size of file..
            if((($extension=='jpg') || ($extension=='png') || ($extension=='jpeg') || ($extension=='JPEG') || ($extension=='JPG') || ($extension=='PNG'))&&($size<5000000)){


                Image::make($event_banner,array(
                    'width' => 298,
                    'height' => 170,
                    'crop' => true
                ))->save($thumb298X170.'/'.$fileName1);

                 Image::make($event_banner,array(
                    'width' => 358,
                    'height' => 250,
                    'crop' => true
                ))->save($thumb358X250.'/'.$fileName1);

                Image::make($event_banner,array(
                    'width' => 750,
                    'height' => 430,
                    'crop' => true
                ))->save($thumb750X430.'/'.$fileName1);

                 Image::make($event_banner,array(
                    'width' => 235,
                    'height' => 134,
                    'crop' => true
                ))->save($thumb235X134.'/'.$fileName1);
                //save original
                Image::make($event_banner)->save($destinationPath.'/'.$fileName1);


                
                
            } else {
                return redirect()->back()->withInput()->with('error', 'Only maximum 5MB jpg or png image is allowed.' );
            }
        } else {
            $fileName1 = '';
        }


        if($event_icon){
            

            $destinationPath    ='eventImage/eventIconImage'; // upload path folder should be in public folder
            $thumb58x76       ='eventImage/eventIconImage/thumb58x76'; // upload 128*128
            

            $extension      = $event_icon->getClientOriginalExtension(); // getting image extension
            $originalName   = $event_icon->getClientOriginalName();
            $size           = $event_icon->getSize();
            $fileName      = time().$originalName; // renameing image

            // condition to check type of file and size of file..
            if((($extension=='jpg') || ($extension=='png') || ($extension=='jpeg') || ($extension=='JPEG') || ($extension=='JPG') || ($extension=='PNG'))&&($size<5000000)){


                Image::make($event_icon,array(
                    'width' => 58,
                    'height' => 76,
                    'crop' => true
                ))->save($thumb58x76.'/'.$fileName);
                //save original
                Image::make($event_icon)->save($destinationPath.'/'.$fileName);


                
                
            } else {
                return redirect()->back()->withInput()->with('error', 'Only maximum 5MB jpg or png image is allowed.' );
            }
        } else {
            $fileName = '';
        }


        $event_id = DB::table('event')->insertGetId([
            'heading'       => $heading,
            'address'       => $location,
            'citystate'         => $cityStateCountry,
            'event_date'          => $event_date,
            'event_timeTo'          => $event_timeTo,
            'event_timeFrom'          => $event_timeFrom,
            'event_overview'          => $event_overview,
            'event_category_id'          => $event_category,
            'event_banner'          => $fileName1,
            'event_icon'          => $fileName
            
        ]);

        foreach($eventSummary as $key=>$val){
            DB::table('event_summary')->insert([
                'event_summary'          => $eventSummary[$key],
                'event_id'          => $event_id
            ]);
        }


         // DB::statement('call addEvent("'.$heading.'", "'.$location.'", "'.$cityStateCountry.'", "'.$event_date.'", "'.$event_timeTo.'", "'.$event_overview.'", "'.$event_category.'", "'.$fileName1.'", "'.$fileName.'", "'.$event_timeFrom.'")');

        return redirect()->back()->with('message', 'Event Added');

    }

    public function updateEvent(Request $req){
       

        
        $id                      = $req->id;
        $oldheading              = $req->oldheading;
        $event_category          = $req->event_category1;
        $heading                 = addslashes($req->heading);

        $heading = str_replace(' ', '_', $heading); // Replaces all spaces with underscore.
        $heading = preg_replace('/[^A-Za-z0-9_]/', '', $heading); // Removes special chars includ _.
        $heading = preg_replace('/_+/', '_', $heading); // Replaces multiple underscore with single one.
        $heading = strtolower($heading);

        $location                = addslashes($req->location);
        $cityStateCountry        = addslashes($req->cityStateCountry);
        $event_timeTo            = $req->event_timeTo;
        $event_timeFrom          = $req->event_timeFrom;
        $event_date              = $req->event_date;
        $event_overview          = addslashes($req->event_overview);
        $event_banner            = $req->file('event_banner');
        $event_icon              = $req->file('event_icon');
        $eventSummary            = $req->eventSummary;
        //print_r($event_date);
         // $Edate=strtotime($event_date);
         // $EventDate=date("y-m-d",$Edate);


        $oldevent_icon           = $req->oldevent_icon;
        $oldevent_banner         = $req->oldevent_banner;
        

        

        $inputs = [

            'heading'              => $heading,
            'event_category'       => $event_category,
            'location'             => $location,
            'cityStateCountry'     => $cityStateCountry,
            'event_timeTo'         => $event_timeTo,
            'event_timeFrom'       => $event_timeFrom,
            'event_date'           => $event_date,
            'event_overview'       => $event_overview
            
            
        ];

        $rules = [

            'heading'            => 'required|max:50',
            'event_category'     => 'required',
            'location'           => 'required',
            'cityStateCountry'   => 'required|max:50',
            'event_timeTo'       => 'required',
            'event_timeFrom'     => 'required',
            'event_date'         => 'required',
            'event_overview'     => 'required'
             
        ];

        $messages = [

            'heading.required'           => 'Please Enter Title.',
            'event_category.required'    => 'Please Select Event Category.',
            'location.required'          => 'Please Enter Address.',
            'cityStateCountry.required'  => 'Please Enter city/State/Country.',
            'event_timeTo.required'      => 'Please Select Event Time To.',
            'event_timeFrom.required'    => 'Please Select Event Time From.',
            'event_date.required'        => 'Please Select Event Date.',
            'event_overview.required'    => 'Please Enter Event Overview.'
            
        ];

        $validation = Validator::make($inputs, $rules, $messages);

        if( $validation->fails() ){
            return redirect()->back()->withInput()->with('errors', $validation->errors() );
        }

        
        if($heading != $oldheading){

            $ExistHeading = DB::table('event')->where('heading', '=', $heading)->count();
            if($ExistHeading == 1){
                return redirect()->back()->withInput()->with('singleerror', 'Event Allready Exits.' );
            }
        }

        // Event Banner Image  


        if($event_banner){
            

            $destinationPath    ='eventImage'; // upload path folder should be in public folder
            $thumb298X170       ='eventImage/thumb298X170'; // upload 128*128
            $thumb358X250       ='eventImage/thumb358X250'; // upload 128*128
            $thumb750X430       ='eventImage/thumb750X430'; // upload 128*128
            $thumb235X134       ='eventImage/thumb235X134'; // upload 128*128
            

            $extension      = $event_banner->getClientOriginalExtension(); // getting image extension
            $originalName   = $event_banner->getClientOriginalName();
            $size           = $event_banner->getSize();
            $fileName1      = time().$originalName; // renameing image

            // condition to check type of file and size of file..
            if((($extension=='jpg') || ($extension=='png') || ($extension=='jpeg') || ($extension=='JPEG') || ($extension=='JPG') || ($extension=='PNG'))&&($size<5000000)){


                Image::make($event_banner,array(
                    'width' => 298,
                    'height' => 170,
                    'crop' => true
                ))->save($thumb298X170.'/'.$fileName1);

                 Image::make($event_banner,array(
                    'width' => 358,
                    'height' => 250,
                    'crop' => true
                ))->save($thumb358X250.'/'.$fileName1);

                Image::make($event_banner,array(
                    'width' => 750,
                    'height' => 430,
                    'crop' => true
                ))->save($thumb750X430.'/'.$fileName1);

                 Image::make($event_banner,array(
                    'width' => 235,
                    'height' => 134,
                    'crop' => true
                ))->save($thumb235X134.'/'.$fileName1);
                //save original
                Image::make($event_banner)->save($destinationPath.'/'.$fileName1);


                
                
            } else {
                return redirect()->back()->withInput()->with('error', 'Only maximum 5MB jpg or png image is allowed.' );
            }
        } else {
            $fileName1 = $oldevent_banner;
        }


        if($event_icon){
            

            $destinationPath    ='eventImage/eventIconImage'; // upload path folder should be in public folder
            $thumb58x76       ='eventImage/eventIconImage/thumb58x76'; // upload 128*128
            

            $extension      = $event_icon->getClientOriginalExtension(); // getting image extension
            $originalName   = $event_icon->getClientOriginalName();
            $size           = $event_icon->getSize();
            $fileName      = time().$originalName; // renameing image

            // condition to check type of file and size of file..
            if((($extension=='jpg') || ($extension=='png') || ($extension=='PNG') || ($extension=='jpeg') || ($extension=='JPEG') || ($extension=='JPG'))&&($size<5000000)){


                Image::make($event_icon,array(
                    'width' => 58,
                    'height' => 76,
                    'crop' => true
                ))->save($thumb58x76.'/'.$fileName);
                //save original
                Image::make($event_icon)->save($destinationPath.'/'.$fileName);


                
                
            } else {
                return redirect()->back()->withInput()->with('error', 'Only maximum 5MB jpg or png image is allowed.' );
            }
        } else {
            $fileName = $oldevent_icon;
        }


         // DB::statement('call UpdateEvent("'.$id.'", "'.$heading.'", "'.$location.'", "'.$cityStateCountry.'", "'.$event_date.'", "'.$event_timeTo.'", "'.$event_overview.'", "'.$event_category.'", "'.$fileName1.'", "'.$fileName.'", "'.$event_timeFrom.'")');
         DB::table('event')->where('id', $id)->update([
            'heading'               => $heading,
            'address'               => $location,
            'citystate'             => $cityStateCountry,
            'event_date'            => $event_date,
            'event_timeTo'          => $event_timeTo,
            'event_timeFrom'        => $event_timeFrom,
            'event_overview'        => $event_overview,
            'event_category_id'     => $event_category,
            'event_banner'          => $fileName1,
            'event_icon'            => $fileName
            
        ]);

        DB::table('event_summary')->where('event_id', '=', $id)->delete();
        foreach($eventSummary as $key=>$val){
            DB::table('event_summary')->insert([
                'event_summary'          => $eventSummary[$key],
                'event_id'              => $id
            ]);
        }
        
        return redirect()->back()->with('message', 'Event Update');
    }

    public function all_event(){

        $event=DB::select('call getEvent()');
        $data = array('pagetitle'=>'All Event');
        return view('admin.all_event', $data)->with('event',$event);
        
    }

    public function deleteEvent($id){

        $eventdelete=DB::statement('call deleteEvent("'.$id.'")');
        return redirect()->back()->with('message', 'Event Deleted.');


    }




    // public function onHomeNews($id){

    //     $selectNews= DB::select('call selectByIdNews("'.$id.'")');
    //     $onHomePage = $selectNews[0]->onHomePage;
    //     if($onHomePage == 'yes'){
    //         $var = 'no';
    //     } else {
    //         $var = 'yes';
    //     }
    //     $onHomeNews= DB::statement('call onHomeNews("'.$id.'","'.$var.'")');
    //     return redirect()->back()->with('message', 'Set on home page.');
        
    // }


}
