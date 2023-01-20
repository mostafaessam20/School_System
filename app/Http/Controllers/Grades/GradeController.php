<?php 

namespace App\Http\Controllers\Grades;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGrades;
use App\Models\Classroom;
use App\Models\Grade;
use Illuminate\Http\Request;

class GradeController extends Controller 
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    $Grades= Grade::all();
    return view('pages.grades.grades',compact('Grades') );
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
  public function store( StoreGrades $request)
  {

    try {
      $validated = $request->validated();
    $Grade= new Grade();
    $translations = ['en' => $request->Name_en, 'ar' =>  $request->Name];
    $Grade->setTranslations('name', $translations);
    $Grade->Notes = $request->Notes;
    $Grade->save();
    toastr(trans('messages.success'));
    return redirect()->route('grades.index');
        
  }

  catch (\Exception $e){
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
  public function update( StoreGrades $request)
  {
    try {
      $validated = $request->validated();
       $Grade = Grade::findOrFail($request->id);
       $Grade->update([
         $Grade->Name = ['ar' => $request->Name, 'en' => $request->Name_en],
         $Grade->Notes = $request->Notes,
      ]);
    toastr(trans('messages.Update'));
    return redirect()->route('grades.index');
        
  }

  catch (\Exception $e){
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
      //هنا انا بعمل تشيك لو المرحلة هنا ليها صفوف ميمسحهاش روح الاول امسح الصفوف وتعالي  امسح المرحلة 
      $Class_id= Classroom::where('Grade_id',$request->id)->pluck('Grade_id'); 

      if ($Class_id->count() == 0) {

        $Grades = Grade::findOrFail($request->id)->delete();
         toastr(trans('messages.Delete'),'error');
         return redirect()->route('grades.index');

      } else {
        
          toastr(trans('grades_trans.delete_Grade_Error'),'error');
          return redirect()->route('grades.index');


      }
      


    

  }

  
}

?>