<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

// get -> get Request
Route::get('/', function (){
    return view('auth.login');
    /* return the View with the File name called welcome.blade.php
		File is located in Resources dir/ Views dir / welcome.blade.php */
});

Route::get('about', function(){
	return view('about');
});


// Route::get('course' , function(){
// 	$course = App\Course::all();
// 	foreach($course as $courses){
// 		echo $courses->courseID . '  ' .$courses->courseName;
// 	}

// });

// Route::get('create_Student', 'StudentController@create');

Auth::routes();

Route::resource('course', 'CourseController');

Route::resource('locked_accounts', 'AdminController@acc_index');

Route::resource('unlock', 'AdminController@unlock_acc');

Route::post('create_Course', 'CourseController@store');

Route::get('course_incharge','CourseController@course_incharge');

Route::resource('students', 'StudentController');

Route::resource('studentparticular', 'StudentController@edit_student');

// Archive Student Records
Route::get('/students/archive/{id}', 'StudentController@archive_student');

// View a List of ALumni Record
Route::get('archive_students', 'StudentController@viewGraduateStudents');

// View Individual Alumni Record
Route::get('/graduate_Students/view/{id}', 'StudentController@showGradStudentInfo');

Route::resource('studentresults', 'StudentController@student_grade');

Route::post('add_grades', 'GradeController@store');

Route::resource('create_grades', 'GradeController@create_index');

Route::resource('choose_mod', 'GradeController@choose_mod');

Route::resource('execute_list', 'GradeController@execute_list');

Route::resource('executeApprove', 'GradeController@executeapprove');

Route::resource('executeReject', 'GradeController@executereject');

Route::resource('approve', 'GradeController@approve');

Route::resource('reject', 'GradeController@reject');

Route::resource('recommendation', 'GradeController@recommend_index');

//GRADE FUNCTION
//Student view gpa
//Route::resource('student_view_gpa', 'GradeController@compute_gpa');
Route::get('student_view_gpa/{studentID}','GradeController@compute_gpa');

//Lecturer view student grade of a test
Route::resource('grades_details', 'GradeController@details_index');
//Lecturer edit student grade
Route::get('grades_details_edit/{resultID}','GradeController@details_edit');
//Lecturer update student grade
Route::post('grades_details_update/{resultID}','GradeController@details_update');
//Lecturer update submit student grade to hod
Route::get('grades_details_submit/{resultID}','GradeController@details_submit');
//Hod view test to moderate or publish
Route::resource('hod_view_grades', 'GradeController@hod_view_index');
//Hod view specific test grade of Student
Route::resource('hod_grades_details', 'GradeController@hod_details_index');
//Hod moderate grade
Route::get('hod_grades_details_moderate/{testID}','GradeController@moderateGrade');
Route::post('hod_grades_details_moderate/store/{testID}','GradeController@moderateStore');
//Hod publish grade
Route::get('hod_grades_details_publish/{testID}','GradeController@publish');

// Admin update Recommended Grades
Route::post('updateRecommendation/{id}/{grade}' , ['as' => 'updateRecommendedResults', 'uses' => 'GradeController@updateRecommendedResults'] );

// Admin backup application
Route::resource('backup', 'AdminController@index');
Route::get('backup_application','AdminController@backupApplication');
Route::get('backup_database','AdminController@backupDatabase');


Route::resource('view_grades', 'GradeController@view_index');

Route::resource('lecturerparticular', 'LecturerController@edit_lecturer');

Route::resource('lecturers', 'LecturerController');

Route::resource('courseParticular', 'hodCourseController');
//Route::resource('gradeParticular', 'hodGradeController');
// Route::get('gradeParticular/index/{testID}','hodGradeController@index');

// Route::get('gradeParticular/moderateGrade/{testID}','hodGradeController@moderateGrade');

// Route::post('gradeParticular/moderateGrade/store/{testID}','hodGradeController@store');

Route::get('home', 'HomeController@index');

Route::post('check', 'HomeController@check_otp');

Route::get('resend', 'HomeController@resend_otp');

Route::resource('log_out', 'HomeController@otp_fail');


//Module
Route::get('view_module/{courseID}','ModuleController@view_module');
Route::get('create_module/{courseID}', 'ModuleController@create');
Route::post('create_module/store/{courseID}', 'ModuleController@store');
Route::resource('module', 'ModuleController');
