<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Classes;
use App\Models\Student;
use App\Models\User;
use App\Models\Section;
use Illuminate\Support\Facades\Hash;
use App\Helpers\Helper;
use Illuminate\Support\Facades\DB;
class StudentController extends Controller
{
    public function index(){
        // return view('admin.student.addstudent');
        $class = Classes::all();
        return view('admin.student.addstudent', ['values' => $class]);
    }
    public function addStudent(Request $request){
        $validatedata=$request;
        $id=$request->class;
        // $sec= new Section;
        // $value=new Classes;
        $values=DB::table('class_tbl')->where('class_tbl.classs','=',$id[0])->first();
        $section=Section::where('cid','=',$values->id)->get();

        $sec='';
        $sec_id=0;
        for($i=0;$i<sizeof($section);$i++)
        {

            if($section[$i]->current<=$section[$i]->max)
            {
                $section[$i]->current=+1;
                $section[$i]->update();
                $sec=$section[$i]->name;
                $sec_id = $section[$i]->id;
                break;
            }
            // else{
            //     $sec=$section[$i];

            // }
        }
        // dd($section);
        $low=strtolower($sec);

        $date=date("Y");
        $mid=strval($date[2].$date[3]);

        // $user = Helper::EmailGenerator(new User, 'email', 2, 'SCH',$date,'CL',$value,'STU');
        $value = Helper::IDGenerator(new Student, 'student_id', 3, 'SCH',$mid,'CL',$values->id,'STU');
        $lastnumber = Helper::LastNumberGenerator(3,$value,$values->id);

        $email=$date.'schcl'.$values->id.$low.$validatedata['fname'].$lastnumber.'@school.org';
        // dd($value,$lastnumber,$email);


        $user= new User;
        $user->name=$validatedata['fname'];
        $user->password= Hash::make($validatedata['password']);
        $user->email=$email;
        if (!$user->save()) {
            return redirect('admin/addstudent')->with('message', 'Please try again later');
        }
        $id = $user->id;
        // if($section->current==$section->max)
        $student = new Student;
        $student->sid = $sec_id;
        $student->student_id=$value;
        $student->lname=$validatedata['lname'];
        $student->address=$validatedata['address'];
        $student->state=$validatedata['state'];
        $student->secemail=$validatedata['email'];
        $student->phone=$validatedata['phone'];
        $student->zip=$validatedata['zip'];
        $student->city=$validatedata['city'];
        $student->dob=$validatedata['date'];
        $stugender = $validatedata->gender;
        if ($stugender[0] == 'Male') {
            $student->gender = "Male";
        } else {
            $student->gender = "Female";
        }
        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;

            $file->move('uploads/student/', $filename);
            $student->img = $filename;
        }
        $student->stid=$id;
        // $student->save();
        if (!$student->save()) {
            return redirect('admin/addstudent')->with('message', 'Please try again later');
        }
        return redirect('admin/displaystudent');
        // return redirect('admin/teachers');
        // $date=date("Y");
        // $mid=strval($date[2].$date[3]);
        // $student->student=$value;
        // $section= new Section;
        // $section->cid;
        // $student_id = Helper::IDGenerator(new Student, 'student_id', 2, 'SCH',$mid,'CL','','STU');



    }
    public function display(){

        $value=DB::table('student')->join('users','users.id','=','student.stid')
        ->join('section_tbl','section_tbl.id','=','student.sid')
        ->join('class_tbl','class_tbl.id','=','section_tbl.cid')
        ->select('class_tbl.classs','student.*','users.email','section_tbl.name','users.name')
        ->where('is_delete','=','0')->paginate(10);
        // dd($value);
        return view('admin.student.displaystudent',['show'=>$value]);
    }
}
