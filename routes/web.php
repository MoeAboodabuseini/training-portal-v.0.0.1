<?php

use App\Http\Controllers\Admin\AdAdminController;
use App\Http\Controllers\Admin\AdCompanyController;
use App\Http\Controllers\Admin\AdOpportunityController;
use App\Http\Controllers\Admin\AdRequestController;
use App\Http\Controllers\Admin\AdSupervisorController;
use App\Http\Controllers\Admin\AdUserController;
use App\Http\Controllers\AgreedController;
use App\Http\Controllers\CompaniesController;
use App\Http\Controllers\OpportunityController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\UserController;
use App\Models\Opportunity;
use App\Models\Requested;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/companies/login', function () {
    return view('companies.companies_login');
})->name('companies_login')->middleware('guest');
Route::get('/admin/login', function () {
    return view('admins.admins_login');
})->name('admins_login')->middleware('guest');
Route::get('/Supervisor/login', function () {
    return view('supervisors.Supervisor_login');
})->name('Supervisor_login')->middleware('guest');
Route::get('/student/login', function () {
    return view('users.Student_login');
})->name('Student_login')->middleware('guest');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('redirect_to');
Route::resource('companies', CompaniesController::class);
//Route::get('admin/companies', [CompaniesController::class,'index'])->name( 'showCompanies')->middleware(['auth', 'isAdmin']);

//company manage opportunities
Route::get('create/opportunity', [OpportunityController::class, 'create'])->name('create_opp')->middleware(['auth', 'isCompany']);
Route::post('store/opportunity', [OpportunityController::class, 'store'])->name('store_opp')->middleware(['auth', 'isCompany']);
Route::get('show/opportunities/{id}', [OpportunityController::class, 'show'])->name('show_opp')->middleware(['auth', 'isCompany']);
Route::get('edit/opportunities/{id}', [OpportunityController::class, 'edit'])->name('edit_opp')->middleware(['auth', 'isCompany']);
Route::put('update/opportunities/{id}', [OpportunityController::class, 'update'])->name('update_opp')->middleware(['auth', 'isCompany']);
Route::delete('destroy/opportunities/{id}', [OpportunityController::class, 'destroy'])->name('destroy_opp')->middleware(['auth', 'isCompany']);
//company manage reports
Route::get('show/reports/{id}', [ReportController::class, 'show'])->name('show_report')->middleware(['auth', 'isCompany']);
Route::get('company/Report/Upload/page/', [ReportController::class, 'companyUploadPage'])->name('companyUploadPage')->middleware(['auth', 'isCompany']);
Route::post('company/Report/Upload', [ReportController::class, 'companyUploadFile'])->name('companyUploadFile')->middleware(['auth', 'isCompany']);

// Route::get('company/select/opportunity/page', [ReportController::class, 'companySelectOpportunityPage'])->name('companySelectOpportunityPage')->middleware(['auth', 'isCompany']);
//comopany manage requests
Route::get('show/requests/{id}', [RequestController::class, 'show'])->name('show_request')->middleware(['auth', 'isCompany']);
Route::put('update/requests/{id}', [RequestController::class, 'update'])->name('update_request')->middleware(['auth', 'isCompany']);
Route::get('showAccepted/requests', [RequestController::class, 'showAccepted'])->name('showAccepted_request')->middleware(['auth', 'isCompany']);
Route::get('showRejected/requests', [RequestController::class, 'showRejected'])->name('showRejected_request')->middleware(['auth', 'isCompany']);
Route::get('clickRequest/requests/{id}', [RequestController::class, 'clickRequest'])->name('clickRequest')->middleware(['auth', 'isStudent']);
Route::delete('cancel/requests/{id}', [RequestController::class, 'destroy'])->name('destroy.request')->middleware(['auth', 'isStudent']);



/*
*! user routes
*/
Route::get('show/opportunitiesDetails/{id}', [OpportunityController::class, 'opportunityDetails'])->name('showOpportunityDetails')->middleware(['auth', 'isStudent']);
Route::get('show/opportunities', [OpportunityController::class, 'index'])->name('showAllOpp')->middleware(['auth', 'isStudent']);
Route::get('showToUser/{id}', [OpportunityController::class, 'showToUser'])->name('showToUser')->middleware(['auth', 'isStudent']);
Route::get('alertUser', [CompaniesController::class, 'alertUser'])->name('alert')->middleware(['auth', 'isStudent']);
Route::get('filterOpportunities', [OpportunityController::class, 'filterOpportunities'])->name('filterOpportunities')->middleware(['auth', 'isStudent']);
Route::post('student/Profile/store', [UserController::class, 'studentProfile'])->name('studentProfile')->middleware(['auth', 'isStudent']);
Route::get('student/Report/Upload/page', [ReportController::class, 'userUploadPage'])->name('userUploadPage')->middleware(['auth', 'isStudent']);
Route::post('student/Report/Upload', [ReportController::class, 'userUploadFile'])->name('userUploadFile')->middleware(['auth', 'isStudent']);
Route::get('student/Profile', function () {

    $requests = Requested::where('user_id', Auth::user()->id)->where('status', '!=', 5)->get();
    if (!empty($requests)) {
        $opportunity_ids = [];
        foreach ($requests as $value) {
            array_push($opportunity_ids, $value->opportunity_id);
        }
        if (empty($opportunity_ids)) {
            $opportunity_ids = 0;
        }
        $opportunities = Opportunity::whereIn('id', [$opportunity_ids])->get();
        foreach ($opportunities as $value) {
            if (Carbon::now()->format('Y-m-d') > Carbon::createFromFormat('Y-m-d', $value->starting_date)->addWeeks(8)) {
                $requests = Requested::where('opportunity_id', $value->id)->get();
                // return $requests;
                foreach ($requests as $request ) {
                    $request->status = 5;
                    $request->save();
                }
                
            }
        }
    }

    $user = auth()->user();
    $skills = json_decode($user->skills);
    $str = "";
    if ($skills != null) {
        foreach ($skills as $skill) {
            $str = $str . ", $skill->value";
        }
    }

    return view('users.Student_profile', compact('user', 'str'));
})->name('studentProfileShow')->middleware(['auth', 'isStudent']);
Route::get('showUserRequest', [RequestController::class, 'showUserRequest'])->name('showUserRequest')->middleware(['auth', 'isStudent']);
////////////////////////////////////////////////////////////////////////////////

//Routes for admin dashboard

Route::resource('users', AdUserController::class)->middleware(['auth', 'isAdmin']);
Route::resource('admins', AdAdminController::class)->middleware(['auth', 'isAdmin']);
Route::resource('adminCompanies', AdCompanyController::class)->middleware(['auth', 'isAdmin']);
// Route::resource('adminRequest', AdRequestController::class)->middleware(['auth', 'isAdmin']);
Route::get('/admin/show/pending/requests', [AdRequestController::class, 'pendingRequest'])->name('show_pendingRequest')->middleware(['auth', 'isAdmin']);
Route::put('/admin/update/requests/{id}', [AdRequestController::class, 'update'])->name('adminUpdate_request')->middleware(['auth', 'isAdmin']);
Route::get('/admin/showAccepted/requests', [AdRequestController::class, 'showAccepted'])->name('showAccepted')->middleware(['auth', 'isAdmin']);
Route::get('/admin/showRejected/requests', [AdRequestController::class, 'showRejected'])->name('showRejected')->middleware(['auth', 'isAdmin']);

//Opportunities routes
Route::get('/admin/create/opportunity', [AdOpportunityController::class, 'create'])->name('create.Opportunity')->middleware(['auth', 'isAdmin']);
Route::post('/admin/store/opportunity', [AdOpportunityController::class, 'store'])->name('store.Opportunity')->middleware(['auth', 'isAdmin']);
Route::get('/admin/showAll/opportunities', [AdOpportunityController::class, 'index'])->name('show.Opportunities')->middleware(['auth', 'isAdmin']);
Route::get('/admin/edit/opportunities/{id}', [AdOpportunityController::class, 'edit'])->name('edit.Opportunity')->middleware(['auth', 'isAdmin']);
Route::put('/admin/update/opportunities/{id}', [AdOpportunityController::class, 'update'])->name('update.Opportunity')->middleware(['auth', 'isAdmin']);
Route::put('/admin/change/opportunities/status/{id}', [AdOpportunityController::class, 'ChangeStatus'])->name('ChangeStatus')->middleware(['auth', 'isAdmin']);
Route::delete('/admin/destroy/opportunities/{id}', [AdOpportunityController::class, 'destroy'])->name('destroy.Opportunity')->middleware(['auth', 'isAdmin']);

Route::resource('Supervisors', AdSupervisorController::class)->middleware(['auth', 'isAdmin']);
Route::get('assign/Supervisors', [AdSupervisorController::class,'assignSupervisorPage'])->name('assignSupervisorPage')->middleware(['auth', 'isAdmin']);
Route::post('admin/assign/Supervisors/{request_id}', [AdSupervisorController::class,'assignSupervisor'])->name('assignSupervisor')->middleware(['auth', 'isAdmin']);
//////////////////////////////////////

// supervisor routes 
Route::get('/Get-all-students', [AgreedController::class,'getAllStudents'])->name('getAllStudents')->middleware(['auth', 'isSupervisor']);
Route::get('/Get-all-reports', [ReportController::class,'getAllReports'])->name('getAllReports')->middleware(['auth', 'isSupervisor']);
Route::put('/Edit-reports-status/{id}', [ReportController::class,'update'])->name('updateReports')->middleware(['auth', 'isSupervisor']);
