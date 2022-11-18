<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClassroom;
use App\Models\Classroom;
use App\Models\Grade;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $My_Classes=Classroom::all();
        $Grades = Grade::all();
        return view('pages.My_Classes.index',compact('My_Classes','Grades'));
    }



    public function store(StoreClassroom $request)
    {
        $List_Classes = $request->List_Classes; //لازم تبقي براا try
        try
        {

            $validated = $request->validated();

            foreach ($List_Classes as $List_Class)
            {
                $Classroom = new Classroom();
                $Classroom->Name_Class = ['en' => $List_Class['Name_class_en'], 'ar' => $List_Class['Name']];
                $Classroom->Grade_id = $List_Class['Grade_id'];
                $Classroom->save();

            }
            toastr()->success(trans('messages.success'));
            return redirect()->route('Classrooms.index');

        }
        catch (\Exception $e)
        {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function update(StoreClassroom $request)
    {
        try {
            $validated = $request->validated();
            $Classroom =Classroom::find($request->id);
            $Classroom->update([
                $Classroom->Name_Class = ['en' => $request->Name_en, 'ar' => $request->Name],
                $Classroom->Grade_id = $request->Grade_id
            ]);
            toastr()->success(trans('messages.Update'));
            return redirect()->route('Classrooms.index');
        }

        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function destroy(request $request)
    {
        try {

            $Classroom =Classroom::find($request->id);
            $Classroom->delete();

            return redirect()->route('Classrooms.index')->with('success',trans('Grades_trans.delete'));;
        }

        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function Filter_Classes(request $request)
    {
        try {

            $Grades = Grade::all();
            $Search = Classroom::select('*')->where('Grade_id','=',$request->Grade_id)->get();
            return view('pages.My_Classes.index',compact('Grades'))->withDetails($Search);

        }

        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }




    public function delete_all(request $request)
    {
        try {

            $delete_all_id = explode(",", $request->delete_all_id);

            Classroom::whereIn('id', $delete_all_id)->Delete();
            return redirect()->route('Classrooms.index');

        }

        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
