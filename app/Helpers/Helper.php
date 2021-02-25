<?php

use App\Models\Backend\Module;
use App\Models\Backend\Permission;
use App\Models\Backend\Role;
use App\Models\Backend\Day;
use Carbon\Carbon;
use Symfony\Component\HttpFoundation\File\getClientOriginalName;

class Helper{
    
    public static function imgProcess($image, $name, $owner, $id, $directory, $method, $model=null)
    {  
            $image_path = public_path($directory);
            $pic_owner = $owner?strtolower(str_replace(' ','-', $owner)).'-':'';

            if($method == 'store'){

                if($image->hasFile($name)){

                   
                    $imageArr = [];
                    if(is_array($image->file($name))){

                        foreach ($images = $image->file($name) as $key => $img) {

                           if(!empty($img)){

                            $extension = $img->getClientOriginalExtension();
                            // $fileName = $image->getClientOriginalName();
                            $fileName    = $pic_owner.$key.date('d-m-Y').'-'.time().'.'.$extension;
                            $img->move($image_path, $fileName); 

                           }
  

                            $imageArr[$key][$name] = $fileName; 
                        }  

                        return $imageArr;

                    } else {

                        $image = $image->$name;
                        $extension = $image->getClientOriginalExtension();
                        // $fileName = $image->getClientOriginalName();
                        $fileName    = $pic_owner.date('d-m-Y').'-'.time().'.'.$extension;
                        $image->move($image_path, $fileName);  

                    }

                } else {

                    $fileName = "not found";

                }

                return $fileName;

            } elseif($method == 'update') {

                $getImage = $model::find($id)[$name];

                if($image->hasFile($name)){
                
                    $imageArr = [];
                    if(is_array($image->file($name))){

                        foreach ($images = $image->file($name) as $key => $img) {

                           if(!empty($img)){

                            $extension = $img->getClientOriginalExtension();
                            // $fileName = $image->getClientOriginalName();
                            $fileName    = $pic_owner.$key.date('d-m-Y').'-'.time().'.'.$extension;
                            $img->move($image_path, $fileName); 

                           }

                            $imageArr[$key][$name] = $fileName; 
                        }  

                        return $imageArr;

                    } else {
                        
                        if(!empty($getImage)){

                            unlink($image_path.'/'.$getImage);
                            
                        } 
       
                       $image       = $image->$name;
                       $extension   = $image->getClientOriginalExtension();
                       // $fileName = $image->getClientOriginalName();
                       $fileName    = $pic_owner.date('d-m-Y').'-'.time().'.'.$extension;
                       $image->move($image_path, $fileName);

                    }
                

                } else {

                   $fileName = $getImage;     

                }

                return $fileName;
            }      
        
    }

    public static function publicUrl($param){
        return url($param);
    }

    public static function sendSMS($userphone, $message){
        $curl = curl_init( 'http://api.boom-cast.com/boomcast/WebFramework/boomCastWebService/externalApiSendTextMessage.php?masking=NOMASK&userName=QUICKFIX&password=fcf0b716beaf8db65d8b2ac2f465a5e1&MsgType=TEXT&receiver='. $userphone .'&message='. $message);

        curl_setopt( $curl, CURLOPT_POST, true );
        curl_setopt( $curl, CURLOPT_RETURNTRANSFER, true );
        $response = curl_exec( $curl );
        curl_close( $curl );

        
    }

    public static function autoOtp() {
        $limit = 4;
        return rand(pow(10, $limit-1), pow(10, $limit)-1);
    }

    public static function permission($model){

        $module_id = Module::where('resource_name', $model)->first()->id;
        $permission = Permission::where('module_id', $module_id)->select('read', 'write', 'update', 'delete')->first();
        return $permission;

    }

    public static function role($id){
        $role = Role::find($id)->name;
        return $role;
    }


   public static function getModels(){
    $path = app_path() . "/Models";   
        $out = [];
        $results = scandir($path);
        foreach ($results as $result) {
            if ($result === '.' or $result === '..') continue;
            $filename = $path . '/' . $result;
            if (is_dir($filename)) {
                $out = array_merge($out, getModels($filename));
            }else{
                $out[] = substr($filename,0,-4);
            }
        }
        return $out;
    }
    //TIME ADD
    // Example Value 
    // $startTime = '3:30';
    // $endTime = '5:55';
    // $duration = 30;
    public static function allScheduleTimes($startTime, $endTime, $duration) {
        $start_time = new DateTime($startTime);
        $end_time = new DateTime($endTime); 
        $totalTime =  $start_time->diff($end_time)->format("%H:%I:%S");

        $hours = explode(':', $totalTime);
        $totalMinutes = $hours[0]*60+$hours[1];
        $totalNoOfSchedule = floor($totalMinutes/$duration);

        $singleSchedule = array();
        $time = strtotime($startTime);
        for($i=1; $i<=$totalNoOfSchedule; $i++) {
            $singleSchedule[] = date("H:i", strtotime('+'.$duration.' minutes', $time));
            $time = strtotime(date("H:i", strtotime('+'.$duration.' minutes', $time)));
        }

        return $singleSchedule;
    }

    //TIME ADD
    public static function addtime($startTime, $duration) {
        return date("H:i", strtotime('+'.$duration.' minutes', strtotime($startTime)));
    }

    //NEXT DAY WISE DATE
    public static function dayWiseDate($selectedDay) {
        // $selectedDay = 6; //monday
        $currentDay = date('l');
        $currentDay = Day::where('status', 1)->where('name', $currentDay)->first()->sl_no;
        if ($currentDay == $selectedDay) {
            $days = 0;
            return $date = date('Y-m-d', strtotime('+'.$days.' days'));
        } else {
            if ($selectedDay > $currentDay) {
                $days = $selectedDay - $currentDay;
                return $date = date('Y-m-d', strtotime('+'.$days.' days'));
            } else {
                $days = $currentDay - 1 + $selectedDay;
                return $date = date('Y-m-d', strtotime('+'.$days.' days'));
            }
        }
    }



}