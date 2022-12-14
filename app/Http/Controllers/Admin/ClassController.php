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
        $value=DB::table('class_tbl')->join('section_tbl','class_tbl.id','=','section_tbl.cid')->select('class_tbl.classs','section_tbl.*')->orderBy('cid','asc')->paginate(10);
        // $show=DB::table('class')->orderBy('id','asc')->paginate(3);
        // dd($show);
        return view('admin.class.display',['show'=>$value]);
    }

    public function edit($id){
        $value=DB::table('class_tbl')->join('section_tbl','class_tbl.id','=','section_tbl.cid')->select('class_tbl.classs','section_tbl.*')->where('section_tbl.id',"=",$id)->first();
        // dd($value);
        return view ('admin.class.editclass',['id'=>$value]);
    }

    public function update(Request $request,$id){
        $class=Section::all()->where('id','=',$id)->first();
        $input=$request->max;
        if($class->current > $input)
        {
            return redirect('admin/class/'.$id.'/edit')->with('message',"student is greater than max student");

        }
        $class->max=$input;
        // $current=$class->current;

        $class->update();
        return redirect('admin/display');

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

            // $temp->max = $max_value;
            // $temp->update();

            return redirect('admin/class')->with('message',"already exists");
        }

    }

    public function search(Request $request){
        if($request->search){
            $search=DB::table('class_tbl')
            ->join('section_tbl','class_tbl.id','=','section_tbl.cid')
            ->select('class_tbl.classs','section_tbl.*')
            ->where('class_tbl.classs','LIKE','%'.$request->search)
            ->orderBy('cid','asc')
            ->paginate(10);
            return view('admin.class.search',compact('search'));
        }
        else{
            return redirect('admin/display')->with('message', 'empty search');
        }
    }
}
