<?php

namespace App\Http\Controllers;

use App\Http\Requests\SectionRequest;
use App\Models\Classroom;
use App\Models\Grade;
use App\Models\Section;
use App\Models\Teacher;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $Grades =Grade::with(['Sections'])->get();
        $list_Grades=Grade::all();
        $teachers=Teacher::all();
        return view('pages.section.index' , compact('Grades','list_Grades','teachers'));
    }


    public function store(SectionRequest $request)
    {
        $validated = $request->validated();
        $section=new Section();
        $section->name_section=['ar'=>$request->name_section_ar, 'en'=>$request->name_section_en];
        $section->grade_id=$request->grade_id;
        $section->class_id=$request->class_id;
        $section->status=1;
        $section->save();
        $section->teachers()->attach($request->teacher_id);
        return redirect()->route('sections.index');
    }

    public function update(SectionRequest $request)
    {
        $validated = $request->validated();

        $section=Section::find($request->id);

        $section->name_section=['ar'=>$request->name_section_ar, 'en'=>$request->name_section_en];
        $section->grade_id=$request->grade_id;
        $section->class_id=$request->class_id;
        if(isset($request->status))
        {
            $section->status=1;
        }
        else
        {
            $section->status=2;
        }

        // update pivot tABLE
        if (isset($request->teacher_id)) {
            $section->teachers()->sync($request->teacher_id);
        } else {
            $section->teachers()->sync(array());
        }
        $section->save();

        return redirect()->route('sections.index');
    }


    public function destroy(Request $request)
    {
        $section=Section::find($request->id);
        $section->delete();
        return redirect()->route('sections.index');
    }

    public function getclasses($id)
    {
        $list_classes = Classroom::where("Grade_id", $id)->pluck("Name_Class", "id");
        return $list_classes;
    }
}
