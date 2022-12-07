<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Classes;
use App\Models\Section;
class ClassController extends Controller
{
    public function class(){
        return view('admin.class.class');
    }
    public function display(){
        // $show=Classes::all();
        $value=DB::table('class_tbl')->join('section_tbl','class_tbl.id','=','section_tbl.cid')->select('class_tbl.classs','section_tbl.*')->paginate(2);
        // $show=DB::table('class')->orderBy('id','asc')->paginate(3);
        // dd($show);
        return view('admin.class.display',['show'=>$value]);
    }
    public function addclass(Request $request){
        $recived_class = $request->class;
        $recived_section = $request->sec;
        $max_value = $request->max;

        $class = Classes::where('classs', '=', $recived_class[0])->first();
        $class_id = $class->id;

        $temp = Section::where('name', '=', $recived_section[0])->where('cid', '=', $class_id)->first();
        // die($temp);
        if (empty($temp)) {

            $section = new Section;

            $section->name = $recived_section[0];
            $section->max = $max_value;
            $section->cid = $class_id;
            $section->save();

            return redirect('admin/class');
        } else {

            $temp->max = $max_value;
            $temp->update();

            return redirect('admin/class');
        }

    }

}
