<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use Redirect;

class StudentCouncilController extends Controller
{   

     public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function index() {
        $students = Student::where('role','=','Student Council')->paginate(20);
        $students->setPath('studentCouncil');

        return view('staff.studentCouncil')->with('students',$students);
    }
     public function create() {
    	return view('staff.addStudentCouncil');
    }

    public function insert(Request $request) {
    	$student = new Student;
    	$student->psu_passport = $request->input('id');
    	$student->title = $request->input('title');
    	$student->firstname = $request->input('firstname');
    	$student->lastname = $request->input('lastname');
    	$student->faculty = $request->input('faculty');
    	$student->major = $request->input('major');
        $student->org_id = 'null';
        $student->position = 'null';
    	$student->role = 'Student Council';
    	$student->begin_date = $request->input('begin_date');
    	$student->end_date = $request->input('end_date');
    	$student->phone = $request->input('phone');
    	$student->email = $request->input('email');

    	$student->save();

        $user = new User;
        $user->psu_pass = $request->input('id');
        $user->name = $request->input('firstname');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('phone'));
        $user->admin = 3;

        $user->save();


    	return Redirect::to('studentCouncil');
    }

    public function edit($id) {
        $student = Student::find($id);
        return view('staff.edit_studentCouncil')->with('student',$student);
    }

    public function update($id,Request $request) {
        $student = Student::find($id);
        $student->psu_passport = $request->input('id');
        $student->title = $request->input('title');
        $student->firstname = $request->input('firstname');
        $student->lastname = $request->input('lastname');
        $student->faculty = $request->input('faculty');
        $student->major = $request->input('major');
        $student->org_id = 'null';
        $student->position = 'null';
        $student->role = 'Student Council';
        $student->begin_date = $request->input('begin_date');
        $student->end_date = $request->input('end_date');
        $student->phone = $request->input('phone');
        $student->email = $request->input('email');

        $student->save();
        return Redirect::to('studentCouncil');
    }

    public function destroy($id) {
        $student = Student::find($id);
        $student->delete();

        return Redirect::to('studentCouncil');
    }
}
