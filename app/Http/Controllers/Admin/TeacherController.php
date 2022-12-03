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

class TeacherController extends Controller
{
    public function index(){
        return view('admin.teacher.index');


    }
    public function addteacher(TeacherFormRequest $request)
    {
        $validatedata=$request->validated();
        $teacher = new Teacher;
        $user= new User;
        $teacher->name= $validatedata['name'];
        $teacher->email= $validatedata['email'];
        $teacher->phone= $validatedata['phone'];
        $teacher->qualification= $validatedata['qualification'];
        $teacher->password= Hash::make($validatedata['password']);


        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;

            $file->move('uploads/teacher/', $filename);
            $teacher->img = $filename;
        }
        $teacher->save();
        $id=$teacher->id;
        $user->name=$validatedata['name'];
        $user->email=$validatedata['email'];
        $user->password= Hash::make($validatedata['password']);
        $user->role_as=1;
        $user->tid=$id;
        $user->save();


        return redirect('admin/teacher');
    }

    public function teachershow(){
        // $show=Teacher::all();
        // return $show;
        $show=DB::table('Teacher')->orderBy('id','asc')->where('is_delete','=','0')->paginate(3);
        return view('admin.teacher.teachers',['show'=>$show]);
    }
    public function edit(Teacher $tid)
    {
        return view ('admin.teacher.edit',compact('tid'));

    }

    // public function delete(Teacher $tid)
    // {
    //     $delete= new Teacher;
    //     $tid=$delete->is_delete=1;
    //     // return view ('admin.teacher.edit',compact('tid'));
    //     return redirect('admin.teacher.teachers');
        public function delete(Request $request, $id)

    {
        $teacher = Teacher::findOrFail($id);
        $teacher->is_delete = 1;
        $teacher->update();
        return redirect('admin/teachers/');
    }


    public function update(Request $request,$tid)
    {
        // return view ('admin.teacher.edit',compact('tid'));
        $teacher=Teacher::findOrFail($tid);
        $user=User::all()->where('tid',$tid)->first();
        $validatedata=$request;
        // $teacher = new Teacher;
        // $user= new User;
        $teacher->name= $validatedata['name'];
        // $teacher->email= $validatedata['email'];
        $teacher->phone= $validatedata['phone'];
        $teacher->qualification= $validatedata['qualification'];
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

        $user->name=$validatedata['name'];
        $user->email=$validatedata['email'];
        // $user->password= Hash::make($validatedata['password']);
        $user->role_as=1;
        $user->update();

        $teacher->update();
        return redirect('admin/teachers');
    }

}
