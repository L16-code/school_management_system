<?php

namespace App\Http\Controllers\Admin;
use App\Http\Requests\TeacherFormRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Helpers\Helper;

class TeacherController extends Controller
{
    public function index(){
        return view('admin.teacher.index');


    }
    public function addteacher(Request $request)
    {
        $validatedata=$request;
        $user= new User;
        $user->name=$validatedata['name'];
        $user->email=$validatedata['email'];
        $user->password= Hash::make($validatedata['password']);
        $user->role_as=1;
        // $user->tid=$id;
        $user->save();
        // $user->id;
        $id=$user->id;
        $date=date("Y");
        $mid=strval($date[2].$date[3]);
        $teacher_id = Helper::IDGenerator(new Teacher, 'teacher_id', 2, 'SCH',$mid,'','','TEC');
        $teacher = new Teacher;
        $teacher->teacher_id = $teacher_id;
        // $teacher->name= $validatedata['name'];
        // $teacher->email= $validatedata['email'];
        $teacher->phone= $validatedata['phone'];
        $teacher->phone= $validatedata['phone'];
        $value = $request->gender;
        if ($value[0] == 'M') {
            $teacher->gender = "Male";
        } else {
            $teacher->gender = "Female";
        }
        $teacher->qualification= $validatedata['qualification'];
        // $teacher->password= Hash::make($validatedata['password']);



        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;

            $file->move('uploads/teacher/', $filename);
            $teacher->img = $filename;
        }

        $teacher->tid=$id;
        // $teacher->save();
        // $id=$teacher->id;
        // $teacher->save();



        $teacher->save();

        return redirect('admin/teachers');
    }
public function search(Request $request){
    if($request->search){
        $search=DB::table('users')->join('teacher','users.id','=','teacher.tid')
        ->select('users.name','users.email','teacher.*')

        ->where('users.name','LIKE','%'.$request->search.'%' )
        ->orwhere('users.email','LIKE','%'.$request->search.'%' )
        ->orwhere('teacher.teacher_id','LIKE','%'.$request->search.'%' )
        ->where('is_delete','=','0')
        ->paginate(5);
        return view('admin.teacher.search',compact('search'));
    }
    else{
        return redirect('admin/teachers')->with('message', 'empty search');
    }

}
    public function teachershow(){
        // $show=Teacher::all();
        // return $show;
        $value=DB::table('users')->join('teacher','users.id','=','teacher.tid')->select('users.name','users.email','teacher.*')->where('is_delete','=','0')->paginate(5);
        // $show=DB::table('Teacher')->orderBy('id','asc')->where('is_delete','=','0')->paginate(3);
        return view('admin.teacher.teachers',['show'=>$value]);
    }
    public function edit($tid)
    {
        $value=DB::table('users')->join('teacher','users.id','=','teacher.tid')->select('users.name','users.email','teacher.*')->where('teacher.tid','=',$tid)->first();

        return view ('admin.teacher.edit',['tid'=>$value]);

    }

    // public function delete(Teacher $tid)
    // {
    //     $delete= new Teacher;
    //     $tid=$delete->is_delete=1;
    //     // return view ('admin.teacher.edit',compact('tid'));
    //     return redirect('admin.teacher.teachers');
    public function delete(Request $request, $id)

    {
        $teacher = Teacher::where('teacher.tid','=',$id)->first();
        // $teacher=Teacher::findorFail($id);

        $teacher->is_delete = 1;
        $teacher->update();
        $user=User::find($id);
        $user->role_as=3;
        $user->update();
        return redirect('admin/teachers/');
    }


    public function update(Request $request,$tid)
    {
        // return view ('admin.teacher.edit',compact('tid'));
        $teacher=Teacher::all()->where('tid','=',$tid)->first();
        // $value=DB::table('users')->join('teacher','users.id','=','teacher.tid')->select('users.name','users.email','teacher.*')->where('is_delete','=','0')->get();
        $user=User::all()->where('id','=',$tid)->first();
        $validatedata=$request;
        $user->name=$validatedata['name'];
        $user->email=$validatedata['email'];
        // $user->password= Hash::make($validatedata['password']);
        $user->role_as=1;
        $user->update();
        // $teacher = new Teacher;
        // $user= new User;
        // $teacher->name= $validatedata['name'];
        // $teacher->email= $validatedata['email'];
        $teacher->phone= $validatedata['phone'];
        $teacher->qualification= $validatedata['qualification'];
        // if()
        $status = $request->status;
        if($status[0]=='Active')
        {
            $teacher->status= 1;
        }
        else{
            $teacher->status= 0;
        }


        // $teacher->password= Hash::make($validatedata['password']);


        if ($request->hasFile('img')) {
            $path='uploads/teacher/'.$teacher->img;
            if(File::exists($path)){
                File::delete($path);
            }
            $file = $request->file('img');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;

            $file->move('uploads/teacher/', $filename);
            $teacher->img = $filename;
        }



        $teacher->update();
        return redirect('admin/teachers');
    }
    // public function save(Request $request){
    //     /** Validate name field */
    //     $request->validate([
    //         'name'=>'required',
    //     ]);

    //     $student_name = $request->name;
    //     $student_id = Helper::IDGenerator(new Student, 'student_id', 2, 'STD'); /** Generate id */
    //     // $q = new Student;
    //     // $q->student_id = $student_id;
    //     // $q->name = $student_name;
    //     // $save =  $q->save();

    //     if($save){
    //         return back()->with('success','New studen has been added');
    //     }else{
    //         return back()->with('faile','Something went wrong');
    //     }


    // }

}
