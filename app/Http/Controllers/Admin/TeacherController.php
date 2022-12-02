<?php

namespace App\Http\Controllers\Admin;
use App\Http\Requests\TeacherFormRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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
        $user->name=$validatedata['name'];
        $user->email=$validatedata['email'];
        $user->password= Hash::make($validatedata['password']);
        $user->role_as=1;
        $user->save();

        $teacher->save();
        return redirect('admin/teacher');
    }

    public function teachershow(){
        // $show=Teacher::all();
        // return $show;
        $show=DB::table('Teacher')->orderBy('id','asc')->paginate(3);
        return view('admin.teacher.teachers',['show'=>$show]);
    }
}
