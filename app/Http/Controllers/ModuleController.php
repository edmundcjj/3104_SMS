<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Course;
use App\Module;
use Auth;
use DB;
use Log;
use Session;

class ModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Display a listing of the module of a particular course.
     *
     * @return \Illuminate\Http\Response
     */
    public function view_module($id)
    {
        //Retrieve particular course
        $courseID = $id;

        //Retrieve the course name
        $retrieveCourse = DB::table('course')
            ->where('courseID', '=', $courseID)
            ->get();

        //Retrieve a List of module of a particular course
        $viewModule = DB::table('module')
            ->join('course', 'course.courseID', '=', 'module.courseID')
            ->join('lecturer', 'lecturer.lecturerID', '=', 'module.lecturerID')
            ->where('course.courseID', '=', $courseID)
            ->orderBy('module.moduleID', 'asc')
            ->get();

        return view('module.viewModule')->with('retrievecourse', $retrieveCourse)->with('viewmodule', $viewModule);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //Retrieve particular course
        $courseID = $id;

        //Retrieve a list of lecturer
        $viewLecturer = DB::table('lecturer')
            ->select('lecturerID', 'lecturerName')
            ->get();

        return view('module.createModule')->with('retrieveid', $courseID)->with('viewlecturer', $viewLecturer);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate_moduleID = $request->input('module_id');
        $validate_moduleName = $request->input('module_name');

        if(Module::where('moduleID', '=', $validate_moduleID)->exists()){
            return redirect()->back()->with('error', 'Module ID exists! Please enter a different ID.');
        }
        else if(Module::where('moduleName', '=', $validate_moduleName)->exists()){
            return redirect()->back()->with('error', 'Module Name exists! Please enter a different Name.');
        }

        $insert_Module = new Module;
        $insert_Module->moduleID = $validate_moduleID;
        $insert_Module->moduleName = $validate_moduleName;
        $insert_Module->courseID = $request->input('module_course');
        $insert_Module->lecturerID = $request->input('module_lecturer');
        $insert_Module->save();

        return redirect()->intended('view_module/'.$request->input('module_course'))->with('message', 'Module have been added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $editModule = DB::table('module')
            ->join('lecturer', 'lecturer.lecturerID', '=', 'module.lecturerID')
            ->where('moduleID' ,'=', $id)
            ->get();

        //Retrieve a list of lecturer
        $viewLecturer = DB::table('lecturer')
            ->select('lecturerID', 'lecturerName')
            ->get();


        return view('module.editModule')->with('editmodule', $editModule)->with('viewlecturer', $viewLecturer);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $module = DB::table('module')->where('moduleID' ,$id)->first();

        $validate_moduleName = $request->input('module_name');

        // if Module Name remain unchanged
        if($validate_moduleName == $module->moduleName){
            DB::table('module')
                ->where('moduleID', $id)
                ->update(['lecturerID' => $request->input('module_lecturer')]);

            return redirect()->intended('view_module/'.$module->courseID)->with('message', 'Module Lecturer In-Charge have been updated successfully!');

        }
        // change in Module Name
        else
        {
            // Validate for duplicate Module Name in other rows
            if(Module::where('moduleID', '!=', $module->moduleID )->where('moduleName', $validate_moduleName)->exists() ){

                return redirect()->back()->with('error', 'Module Name exists! Please enter a different name.');
            }
            else{

                if ($request->input('module_lecturer') == $module->lecturerID)
                {
                    DB::table('module')
                        ->where('moduleID', $id)
                        ->update(['moduleName' => $validate_moduleName]);

                    return redirect()->intended('view_module/'.$module->courseID)->with('message', 'Module Name have been updated successfully!');
                }
                else{
                    DB::table('module')
                        ->where('moduleID', $id)
                        ->update(['lecturerID' => $request->input('module_lecturer'),
                            'moduleName' => $validate_moduleName
                        ]);

                    return redirect()->intended('view_module/'.$module->courseID)->with('message', 'Module Lecturer In-Charge and Name have been updated successfully!');

                }
            }

        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Retrieve particular module id
        $moduleID = $id;

        $modules = DB::table('module')->where('moduleID' ,$id)->first();

        // Remove Module Entry Row
        DB::table('module')
            ->where('moduleID', '=', $moduleID)
            ->delete();

        return redirect()->intended('view_module/'.$modules->courseID)->with('message', 'Module have been deleted successfully!');

    }
}
