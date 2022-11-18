<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGrade;
use App\Models\Classroom;
use App\Models\Grade;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grades=Grade::all();
        return view('pages.Grades.index')->with('grades',$grades);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGrade $request)
    {
        //        if (Grade::where('name->ar',$request->name)->orwhere('name->en',$request->name_en)->exists())
//        {
//            return redirect()->back()->withErrors(trans('Grades_trans.exists'));
//        }
        try {
            $validated = $request->validated();
            $Grade = new Grade();
            $Grade->name = ['en' => $request->name_en, 'ar' => $request->name];
            $Grade->nots = $request->nots;
            $Grade->save();
            toastr()->success(trans('messages.success'));
            return redirect()->route('Grades.index');


        }

        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function update(StoreGrade $request)
    {
        try {
            $validated = $request->validated();
            $Grade =Grade::find($request->id);
            $Grade->update([
                $Grade->name = ['en' => $request->name_en, 'ar' => $request->name],
                $Grade->nots = $request->nots
            ]);
            toastr()->success(trans('messages.Update'));
            return redirect()->route('Grades.index');
        }

        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy(request $request)
    {
        $MyClass_id = Classroom::where('Grade_id',$request->id)->pluck('Grade_id');

        if($MyClass_id->count() == 0){

            $Grades = Grade::findOrFail($request->id)->delete();
            return redirect()->route('Grades.index')->with('success',trans('messages.Delete'));
        }

        else{
            return redirect()->route('Grades.index')->with('success',trans('Grades_trans.delete_Grade_Error'));

        }

    }
}
