<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Student;

use DB;

class StudentsController extends Controller
{
  //
  public function __construct()
  {
    //$this->middleware('auth');
  }


  public function index(Request $request)
  {
      $model = 'students';
    return view('students.index', compact('model'));
  }

  public function create(Request $request)
  {
      $model = 'students';
    return view('students.add',compact('model'));
  }

  public function edit(Request $request, $id)
  {
    $student = Student::findOrFail($id);
    return view('students.add', [
      'model' => $student    ]);
  }

  public function show(Request $request, $id)
  {
    $student = Student::findOrFail($id);
    return view('students.show', [
      'model' => $student    ]);
  }

  public function grid(Request $request)
  {
    $len = $_GET['length'];
    $start = $_GET['start'];

    $select = "SELECT *,1,2 ";
    $presql = " FROM students a ";
    if($_GET['search']['value']) {
      $presql .= " WHERE name LIKE '%".$_GET['search']['value']."%' ";
    }

    $presql .= "  ";

    //------------------------------------
    // 1/2/18 - Jasmine Robinson Added Orderby Section for the Grid Results
    //------------------------------------
    $orderby = "";
    $columns = array('id','name','email','image','description','created_at','updated_at',);
    $order = $columns[$request->input('order.0.column')];
    $dir = $request->input('order.0.dir');
    $orderby = "Order By " . $order . " " . $dir;

    $sql = $select.$presql.$orderby." LIMIT ".$start.",".$len;
    //------------------------------------

    $qcount = DB::select("SELECT COUNT(a.id) c".$presql);
    //print_r($qcount);
    $count = $qcount[0]->c;

    $results = DB::select($sql);
    $ret = [];
    foreach ($results as $row) {
      $r = [];
      foreach ($row as $value) {
        $r[] = $value;
      }
      $ret[] = $r;
    }

    $ret['data'] = $ret;
    $ret['recordsTotal'] = $count;
    $ret['iTotalDisplayRecords'] = $count;

    $ret['recordsFiltered'] = count($ret);
    $ret['draw'] = $_GET['draw'];

    echo json_encode($ret);

  }


  public function update(Request $request) {
    //
    /*$this->validate($request, [
    'name' => 'required|max:255',
  ]);*/
  $student = null;
  if($request->id > 0) { $student = Student::findOrFail($request->id); }
  else {
    $student = new Student;
  }


  
    $student->id = $request->id?:0;
    
  
      $student->name = $request->name;
  
  
      $student->email = $request->email;
  
  
      $student->image = $request->image;
  
  
      $student->description = $request->description;
  
  
      $student->created_at = $request->created_at;
  
  
      $student->updated_at = $request->updated_at;
  
    //$student->user_id = $request->user()->id;
  $student->save();

  return redirect('/students');

}

public function store(Request $request)
{
  return $this->update($request);
}

public function destroy(Request $request, $id) {

  $student = Student::findOrFail($id);

  $student->delete();
  return "OK";

}


}
