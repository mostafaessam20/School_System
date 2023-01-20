<?php 

namespace App\Http\Controllers\Classrooms;
use App\Models\Grade;
use App\Models\Classroom;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreClassroom;

class ClassroomController extends Controller 
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
   $Classes= Classroom::all();
   $Grades= Grade::all();

   return view('pages.Classes.Classes',compact('Classes','Grades'));
   
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
    
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(StoreClassroom $request)
    {
     
        $List_Classes = $request->List_Classes;

        try {
          $validated = $request->validated();
            foreach ($List_Classes as $List_Class) {

                $Classes = new Classroom();
                $translations=['en' => $List_Class['Name_class_en'], 'ar' =>  $List_Class['Name']];
                $Classes->setTranslations('Name_Class',$translations);
                $Classes->Grade_id = $List_Class['Grade_id'];
                $Classes->save();

            }

            toastr(trans('messages.success'));
            return redirect()->route('ClassRooms.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }
  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {
    
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
    
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update(Request $request)
    {

        try {

            $Classrooms = Classroom::findOrFail($request->id);

            $Classrooms->update([

                $Classrooms->Name_Class = ['ar' => $request->Name, 'en' => $request->Name_en],
                $Classrooms->Grade_id = $request->Grade_id,
            ]);
            toastr(trans('messages.Update'));
            return redirect()->route('ClassRooms.index');
        }

        catch
        (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }


    }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy(Request $request)
  {
        



        $Classrooms= Classroom::findorfail($request->id)->delete();
        toastr(trans('messages.Delete'),'error');

        return redirect()->route('ClassRooms.index');



  }

  public function delete_all(Request $request)
    {
        $delete_all_id = explode(",", $request->delete_all_id);

        Classroom::whereIn('id', $delete_all_id)->Delete();
        toastr(trans('messages.Delete'),'error');
        return redirect()->route('ClassRooms.index');
    }


    public function Filter_Classes(Request $request)
    {
        $Grades = Grade::all();
        $Search = Classroom::select('*')->where('Grade_id','=',$request->Grade_id)->get();
        return view('pages.Classes.Classes',compact('Grades'))->withDetails($Search);

    }




  
}

?>