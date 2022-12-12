<?php
namespace App\Helpers;

class Helper
{

    public static function IDGenerator($model, $trow, $length = 4, $prefix,$date,$cl,$class,$name){
        $data = $model::orderBy('id','desc')->first();
        if(!$data){
            $og_length = $length-1;
            $last_number = '1';
        }else{
            // $code = substr($data->$trow, strlen($prefix)+1);
            $code = (int)(substr($data->$trow, strlen($prefix)+2+strlen($class)+strlen($cl)+strlen($name)));
            $actial_last_number = ($code/1)*1;
            $increment_last_number = ((int)$actial_last_number)+1;
            $last_number_length = strlen($increment_last_number);
            $og_length = $length - $last_number_length;
            $last_number = $increment_last_number;
        }

        $zeros = "";
        for($i=0;$i<$og_length;$i++){
            $zeros.="0";
        }
        return $prefix.$date.$cl.$class.$name.$zeros.$last_number;
    }

    // public static function EmailGenerator($model, $trow, $length = 4, $date,$class,$id,$name){
    //     $data = $model::orderBy('id','desc')->first();
    //     if(!$data){
    //         $og_length = $length;
    //         $last_number = '';
    //     }else{
    //         // $code = substr($data->$trow, strlen($prefix)+1);
    //         $code = (int)(substr($data->$trow, 10+strlen($class)+strlen($name)));
    //         $actial_last_number = ($code/1)*1;
    //         $increment_last_number = ((int)$actial_last_number)+1;
    //         $last_number_length = strlen($increment_last_number);
    //         $og_length = $length - $last_number_length;
    //         $last_number = $increment_last_number;
    //     }
    //     $zeros = "";
    //     for($i=0;$i<$og_length;$i++){
    //         $zeros.="0";
    //     }
    //     return $date.'schcl'.$class.$id.$name.$zeros.$last_number.'@school.org';
    // }

    public static function LastNumberGenerator($length,$value,$class){
        // $data=$last_number;
        $code = (int)(substr($value,10+strlen($class)));
        $actificial_last_number = ($code/1)*1;
        // $increment_last_number = ((int)$actial_last_number)+1;
        $artificial_last_number=+1;
        $last_number_length = strlen($actificial_last_number);
        $og_length = $length - $last_number_length;
        $zeros = "";
        for ($i = 0; $i < $og_length; $i++) {
            $zeros .= "0";
        }
        return  $zeros . $actificial_last_number;
        // $last_number = $artificial_last_number;
        // return $last_number.$class.$length;
    }

}
?>
