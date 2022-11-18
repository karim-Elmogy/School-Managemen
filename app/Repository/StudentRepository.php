<?php
namespace App\Repository;



use App\Models\Classroom;
use App\Models\Gender;
use App\Models\Grade;
use App\Models\Image;
use App\Models\My_Parent;
use App\Models\Nationlitie;
use App\Models\Section;
use App\Models\Student;
use App\Models\Type_Blood;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class StudentRepository implements StudentRepositoryInterface
{


    public function Get_Student()
    {
        $students = Student::all();
        return view('pages.Students.index',compact('students'));
    }

    public function Create_Student()
    {
        $data['my_classes'] = Grade::all();
        $data['parents'] = My_Parent::all();
        $data['Genders'] = Gender::all();
        $data['nationals'] = Nationlitie::all();
        $data['bloods'] = Type_Blood::all();
        return view('pages.Students.add',$data);
    }

    public function Get_classrooms($id)
    {
        $list_classes = Classroom::where("Grade_id", $id)->pluck("Name_Class", "id");
        return $list_classes;
    }

    public function Get_Sections($id)
    {
        $list_sections = Section::where("Class_id", $id)->pluck("name_section", "id");
        return $list_sections;
    }

    public function Store_Student($request)
    {
        DB::beginTransaction();

        try {
            $students = new Student();
            $students->name = ['en' => $request->name_en, 'ar' => $request->name_ar];
            $students->email = $request->email;
            $students->password = Hash::make($request->password);
            $students->gender_id = $request->gender_id;
            $students->nationalitie_id = $request->nationalitie_id;
            $students->blood_id = $request->blood_id;
            $students->Date_Birth = $request->Date_Birth;
            $students->Grade_id = $request->Grade_id;
            $students->Classroom_id = $request->Classroom_id;
            $students->section_id = $request->section_id;
            $students->parent_id = $request->parent_id;
            $students->academic_year = $request->academic_year;
            $students->save();

       //      insert img
            if($request->hasfile('photos'))
            {
                foreach($request->file('photos') as $file)
                {
                    $name = $file->getClientOriginalName();
                    $file->storeAs('attachments/students/'.$students->name, $file->getClientOriginalName(),'upload_attachments');

                    // insert in image_table
                    $images= new Image();
                    $images->filename=$name;
                    $images->imageable_id= $students->id;
                    $images->imageable_type = 'App\Models\Student';
                    $images->save();
                }
            }
            DB::commit(); // insert data
            toastr()->success(trans('messages.success'));
            return redirect()->route('Students.index');

        }

        catch (\Exception $e){
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function Edit_Student($id)
    {
        $data['Grades'] = Grade::all();
        $data['parents'] = My_Parent::all();
        $data['Genders'] = Gender::all();
        $data['nationals'] = Nationlitie::all();
        $data['bloods'] = Type_Blood::all();
        $Students =  Student::findOrFail($id);
        return view('pages.Students.edit',$data,compact('Students'));
    }

    public function Show_Student($id)
    {

        $Student =  Student::findOrFail($id);
        return view('pages.Students.show',compact('Student'));
    }

    public function Update_Student($request)
    {
        try {
            $students = Student::findOrFail($request->id);
            $students->name = ['en' => $request->name_en, 'ar' => $request->name_ar];
            $students->email = $request->email;
            $students->password = Hash::make($request->password);
            $students->gender_id = $request->gender_id;
            $students->nationalitie_id = $request->nationalitie_id;
            $students->blood_id = $request->blood_id;
            $students->Date_Birth = $request->Date_Birth;
            $students->Grade_id = $request->Grade_id;
            $students->Classroom_id = $request->Classroom_id;
            $students->section_id = $request->section_id;
            $students->parent_id = $request->parent_id;
            $students->academic_year = $request->academic_year;
            $students->save();


            toastr()->success(trans('messages.success'));
            return redirect()->route('Students.index');

        }

        catch (\Exception $e){
//            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function Delete_Student($request)
    {
        Student::destroy($request->id);
        return redirect()->route('Students.index');
    }

    public function Upload_attachment($request)
    {

        foreach($request->file('photos') as $file)
        {
            $name = $file->getClientOriginalName();
            $file->storeAs('attachments/students/'.$request->student_name, $file->getClientOriginalName(),'upload_attachments');

            // insert in image_table
            $images= new image();
            $images->filename=$name;
            $images->imageable_id = $request->student_id;
            $images->imageable_type = 'App\Models\Student';
            $images->save();
        }
        toastr()->success(trans('messages.success'));
        return redirect()->route('Students.show',$request->student_id);
    }

    public function Download_attachment($studentsname, $filename)
    {
        return response()->download(public_path('attachments/students/'.$studentsname.'/'.$filename));
    }

    public function Delete_attachment($request)
    {
        // Delete img in server disk
        Storage::disk('upload_attachments')->delete('attachments/students/'.$request->student_name.'/'.$request->filename);

        // Delete in data
        image::where('id',$request->id)->where('filename',$request->filename)->delete();
        toastr()->error(trans('messages.Delete'));
        return redirect()->route('Students.show',$request->student_id);
    }
}
