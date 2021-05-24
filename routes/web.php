<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();

Route::group(['middleware' => 'web'], function () {

    // Route::post('password/email','Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    // Route::get('password/reset','Auth\ResetPasswordController@showLinkRequestForm');
    // Route::post('password/reset','Auth\ResetPasswordController@sendResetLinkEmail');
    // Route::get('password/reset/{token}','Auth\ResetPasswordController@showResetForm')->name('password.reset');



    Route::get('/upload_employee', 'UploadController@uploadEmployee');
    Route::get('/upload_kpi', 'UploadController@uploadKPI');
    Route::get('/reset-password/{nik}/{newpass}', 'UploadController@resetPassword');

    if (config('app.env') != 'production') {
        Route::get('/truncate_all_tables/{password}', 'UploadController@truncateAllTables');
	}
    
    // Route::get('/password/reset', 'Auth\ResetPasswordController@showLinkRequestForm');
    // Route::post('/password/reset', 'Auth\ResetPasswordController@sendResetLinkEmail');

    Route::get('/register_admin', 'RegisterController@registerAdmin'); 
    Route::get('login', 'AppAuthController@login')->name('login');
    Route::post('/login', 'AppAuthController@doLogin');
    Route::post('/logout', 'AppAuthController@doLogout');


    Route::get('/', function() {
        if (Auth::check()) {
            if (Auth::user()->acl_assigned_id == 300) {
                return redirect('/od/dashboard');
            } else {
                return redirect('/em/dashboard');
            }
        } else {
            return redirect('/login');
        }
    });

    Route::group(['middleware' => ['auth', 'acl']], function() {
        Route::post('/em/change-password', 'EmployeeController@actionChangePassword');
                // For SUPERADMIN app
        // Route::get('/sa/dashboard', 'SuperAdmin@viewDashboard');

        // Authentication

        // Ajax: general
        Route::get('/od/get_locations_by_company/{company_id}', 'AjaxController@getLocationByCompany');

        // For OD app
        Route::get('/od/dashboard', 'OrgDevController@viewDashboard');
        Route::get('/od/dashboard2', 'OrgDevController@viewDashboard2');
        Route::get('/od/people', 'OrgDevController@viewAllPeople');
        Route::get('/od/people/download/all', 'OrgDevController@downloadAllPeople');
        Route::get('/od/evaluation', 'OrgDevController@viewEvaluation');
        Route::get('/od/evaluation/{id}', 'OrgDevController@viewEvaluationSingle');
        Route::post('/od/evaluation/{id}', 'OrgDevController@saveKPI');
        Route::get('/od/evaluation/{userId}/download/{year}', 'OrgDevController@downloadKPI');
        Route::get('/od/announcement', 'OrgDevController@viewAnnouncement');
        Route::post('/od/announcement/{id}/active', 'OrgDevController@setAnnouncementActive');
        Route::post('/od/announcement/{id}/inactive', 'OrgDevController@setAnnouncementInactive');
        Route::delete('/od/announcement/{id}/delete', 'OrgDevController@deleteAnnouncement');
        Route::get('/od/activity', 'OrgDevController@viewActivity');
        Route::get('/od/logs', 'OrgDevController@viewAuditTrail');
        Route::get('/od/faq', 'OrgDevController@viewFAQ');
        Route::post('/od/faq/add-new', 'OrgDevController@addNewFAQ');
        Route::post('/od/faq/update', 'OrgDevController@updateFAQ');
        Route::delete('/od/faq/{id}/delete', 'OrgDevController@deleteFAQ');
        Route::get('/od/setting', 'OrgDevController@viewSetting');
        Route::post('/od/people/change/superior', 'OrgDevController@saveSuperior');
        Route::post('/od/people/change/subordinate', 'OrgDevController@saveSubordinate');
        Route::post('/od/people/change/password', 'OrgDevController@changePassword');
        Route::post('/od/announcement', 'OrgDevController@saveAnnouncement');

        Route::get('/od/mutasi', 'OrgDevController@showMutasi');

        Route::get('/od/mutasi/new', 'OrgDevController@showNewEmployee');
        Route::get('/od/mutasi/new/template', 'OrgDevController@downloadNewEmployeeTemplate');
        Route::post('/od/mutasi/new/uploadcsv', 'OrgDevController@uploadNewEmployeeCSV');

        Route::get('/od/mutasi/mutation', 'OrgDevController@showMutasiMutation');
        Route::get('/od/mutasi/mutation/template', 'OrgDevController@downloadMutation');
        Route::post('/od/mutasi/mutation/uploadcsv', 'OrgDevController@uploadMutationCSV');

        Route::get('/od/mutasi/termination', 'OrgDevController@showTermination');
        Route::get('/od/mutasi/termination/template', 'OrgDevController@downloadTermination');
        Route::post('/od/mutasi/termination/uploadcsv', 'OrgDevController@uploadTerminationCSV');

        Route::get('/od/getuser', 'OrgDevController@getUser');

        Route::post('/od/mutasi', 'OrgDevController@saveMutasi');
        Route::post('/od/set-deadline', 'OrgDevController@setDeadline');
        Route::post('/od/setting/delete-kpi-template', 'OrgDevController@deleteKPITemplate');
        Route::post('/od/faq/upload', 'OrgDevController@uploadFAQ');
        Route::post('/od/faq/upload_video', 'OrgDevController@uploadVideoFAQ');

        // For employees
        Route::get('/em/dashboard', 'EmployeeController@viewDashboard');
        Route::get('/em/me', 'EmployeeController@viewMyProfile');
        Route::get('/em/profile/{id}', 'EmployeeController@viewProfileId');
        Route::get('/em/evaluation', 'EmployeeController@viewEvaluation');
        Route::get('/em/download/{year}', 'EmployeeController@actionDownload');
        Route::get('/em/view', 'EmployeeController@viewOnly');


        Route::delete('/em/kpi/{id}', 'EmployeeController@deleteKPI');

        //for print
        Route::get('/em/evaluation/print', 'EmployeeController@printEvaluation');
        Route::get('/em/evaluation/{year}/print', 'EmployeeController@printEvaluation');

        Route::get('/em/getselfappraisal','EmployeeController@getSelfAppraisal');
        Route::get('/em/totalweight','EmployeeController@getTotalWeight');
        Route::get('/em/get_indicators_text', 'EmployeeController@getIndicatorsText');

        Route::get('/em/evaluation/{year}', 'EmployeeController@viewEvaluationByYear');
        Route::get('/em/kpi', 'EmployeeController@viewKPIIndex');
        Route::get('/em/kpi/subordinate', 'EmployeeController@viewKPIIndexSubordinate');
        Route::get('/em/kpi/subordinate/custom', 'EmployeeController@viewSubordinateCustom');
        Route::get('/em/kpi/subordinate/upload/result', 'EmployeeController@viewSubordinateUploadResult');
        Route::get('/em/kpi/subordinate/upload/kpi', 'EmployeeController@viewSubordinateUploadKPI');
        Route::get('/em/kpi/subordinate/upload/kpi/template', 'EmployeeController@downloadSubordinateUploadKPI');
        Route::get('/em/kpi/subordinate/upload/achievement', 'EmployeeController@viewSubordinateUploadAchievement');
        Route::get('/em/kpi/subordinate/upload/achievement/template', 'EmployeeController@downloadSubordinateUploadAchievement');
        Route::get('/em/kpi/review', 'EmployeeController@viewKPIIndexReview');
        Route::get('/em/announcement', 'EmployeeController@viewAnnouncement');
        Route::get('/em/activity', 'EmployeeController@viewActivity');
        Route::get('/em/faq', 'EmployeeController@viewFAQ');
        Route::get('/em/setting', 'EmployeeController@viewSetting');

        Route::post('/em/ajaxupload', 'EmployeeController@uploadPhoto');

        Route::get('/em/getposbyloc', 'EmployeeController@ajaxGetPositionByLocation');
        Route::get('/em/getkpi', 'EmployeeController@ajaxGetKpisByBscAndPosition');
        Route::get('/em/getkpi/custom', 'EmployeeController@ajaxGetKpisByBscOnly');
        Route::get('/em/getkpi/user', 'EmployeeController@ajaxGetKpisByUser');
        Route::get('/em/gettrackkpi/{employee_id}', 'EmployeeController@ajaxGetTrackKPI');

        Route::post('/em/kpi/subordinate/custom', 'EmployeeController@saveSubordinateCustom');
        // Route::post('/em/kpi/subordinate/upload', 'UploadController@saveSubordinateUpload');
        Route::post('/em/kpi/subordinate', 'EmployeeController@addKPIIndexSubordinate');
        Route::post('/em/kpi/subordinate/score', 'EmployeeController@addKPIIndexSubordinateScore');
        Route::post('/em/kpi/self/score', 'EmployeeController@addKPIIndexSelfScore');
        Route::post('/em/kpi/update/{id}', 'EmployeeController@updateKPI');
        Route::post('/em/kpi/add-new', 'EmployeeController@addNewKPI');
        Route::post('/em/kpi/schedule/add', 'EmployeeController@addSchedule');
        Route::post('/em/kpi/schedule/review', 'EmployeeController@addScheduleReview');
        Route::post('/em/kpi/schedule/approval', 'EmployeeController@addScheduleApproval');
        Route::post('/em/kpi/schedule/remove', 'EmployeeController@removeSchedule');

        Route::post('em/kpi/subordinate/achievement/upload', 'EmployeeController@saveSubordinateAchievementUpload');
        Route::post('/em/kpi/subordinate/kpi/upload', 'EmployeeController@saveSubordinateKpiUpload');

    });

});
