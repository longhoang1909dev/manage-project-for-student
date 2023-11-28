<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Response;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\HandleRequest;
use App\Http\Controllers\ProjectController;




use App\Models\Student;

Route::get('/', [LoginController::class, 'getLogin'])->name('login');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');


Route::post('/', [LoginController::class, 'checkLogin'])->name('checkLogin');

Route::prefix('student')->name('student.')->group(function () {

   Route::get('{/dashboard', [StudentController::class, 'dashboard'])->name('dashboard');

   Route::get('/infoStudent', [StudentController::class, 'getInfoStudent'])->name('infoStudent');

   Route::post('/infoStudent', [StudentController::class, 'updateInfoStudent'])->name('updateInfoStudent');

   // GROUP

   Route::get('/groupSV', [GroupController::class, 'studentGroup'])->name('groupSV');

   Route::get('/groupSV_detail', [GroupController::class, 'getInfoGroup'])->name('groupSV_detail');

   Route::get('/groupSV_update', [GroupController::class,'getUpdateProgress'])->name('groupSV_update');

   Route::get('/dowloadfile/{file_name}', [GroupController::class,'downloadFile'])->name('dowload');


   Route::post('/groupSV_update', [GroupController::class,'handleUpdateFile'])->name('handleUpdateFile');


   Route::get('/registerProject', [TeacherController::class, 'getAllProject'])->name('register');

   Route::get('/cancelRequest', [StudentController::class,'cancelRequest'])->name('cancel');

   Route::get('/cancelRequestGroup', [StudentController::class,'cancelRequestGroup'])->name('cancelGroup');

   Route::get('/registerProject/{p_id}/{t_id}', [HandleRequest::class, 'requestJoinProject'])->name('requestJoinProject');

   Route::get('/register_attend', [GroupController::class, 'getAllGroup'])->name('register_attend');

   Route::get('/register_attend/{group_id}', [StudentController::class, 'requestJoinGroup'])->name('requestJoinGroup');

   route::get('/turnback',[StudentController::class,'reSelectProject'])->name('reSelect');

   // Route::get('/handleRequestJoingroup/{id}/{status}', [HandleRequest::class,'handleRequestJoinProject'])->name('handleRequestJoinProject');

   Route::get('/seeInfoRequest/{stu_id}',[StudentController::class,'seeInfoRequest'])->name('infoRequest');

   Route::get('/leaveGroup', [GroupController::class,'leaveGroup'])->name('leaveGroup');

   Route::get('/leaveGroup1/{stu_id}', [GroupController::class,'DeleteStudentFromLeader'])->name('leaveGroup1');


   Route::get('/register_create/', [GroupController::class, 'getCreateGroup'])->name('register_create');

   Route::post('/register_create', [GroupController::class,'handleCreateGroup'])->name('handle_create');

   Route::get('/groupSV_request', [GroupController::class,'getRequestJoinGroup'])->name('groupSV_request');

   Route::get('/handleRequest/{id}/{status}', [HandleRequest::class,'handleRequestJoinGroup'])->name('handleRequestJoinGroup_accept');

   Route::get('/contact', [StudentController::class,'showChat'])->name('contact');

   Route::get('/calendar', [StudentController::class,'getCalender'])->name('calendar');

   Route::get('/contact', [StudentController::class,'showChat'])->name('contact');

   Route::post('/contact/', [StudentController::class,'handlePostmessage'])->name('handlePostMessage');

   Route::get('/infoAllTeacher',[StudentController::class,'seeInfoAllTeacher'])->name('infoAllTeacher');

   Route::get('/infoTeacher/{t_id}', [StudentController::class,'SeeInfoTeacherDetail'])->name('seeInfo');
});




//teacher

Route::prefix('teacher')->name('teacher.')->group(function () {

   //Giảng viên
   Route::get('/TE_dashboard', [TeacherController::class,'dashboard'])->name('TE_dashboard');

   Route::get('/infoTeacher', [TeacherController::class, 'getInfoTeacher'])->name('infoTeacher');


   Route::get('/register_list', [TeacherController::class,'getAllStudentRegis'])->name('register_list'); 

   Route::get('/Delete/{stu_id}',[TeacherController::class,'DeleteStudentFromProject'])->name('deleteStudent');

   Route::get('/seeInfoStudent/{stu_id}', [TeacherController::class,'seeInfoStudent'])->name('infoStudent');

   Route::get('/register_wait', [TeacherController::class,'getAllStudentRequestProject'])->name('register_wait');

   Route::get('/handleRequestJoinProject/{id}/{status}', [HandleRequest::class,'handleRequestJoinProject'])->name('handleRequestJoinProject');


   Route::get('/updateProject',[ProjectController::class,'getAllProject'] )->name('update');
   
   Route::get('/update_new', [ProjectController::class,'createNewProject'])->name('update_new');

   Route::post('/update', [ProjectController::class,'handleCreateProject'])->name('handleCreate');

   Route::post('/update1',[ProjectController::class,'handleNewOption'])->name('handleNewOption');

   Route::get('/deleteproject/{p_id}', [ProjectController::class,'deleteProject'])->name('deleteProject');

   Route::get('/monitor_process', [TeacherController::class,'getObserveGroup'])->name('monitor_process');


   Route::get('/monitor_group/{group_id}', [TeacherController::class,'observeGroup'])->name('monitor_group');

   Route::post('/set_noti/{group_id}', [TeacherController::class,'setNotification'])->name('set_noti');

   Route::post('/set_score/{group_id}', [TeacherController::class,'giveScoreGroup'])->name('set_score');

   Route::post('/set_meeting/{group_id}', [TeacherController::class,'setMeeting'])->name('set_meeting');

   Route::get('/contact', [TeacherController::class,'showChat'])->name('teacherChat');

   Route::get('/contact/{group_id}', [TeacherController::class,'showChatGroup'])->name('handleChat');
   Route::post('/contact/', [TeacherController::class,'handlePostmessage'])->name('handlePostMessage');

   
   Route::get('/calendar',[TeacherController::class, 'showCalendar'])->name('calendar');


});
