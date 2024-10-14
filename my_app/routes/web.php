<?php

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\UserController;
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

// ================= MAIN ROUTE FOR INDEX PAGE ==================== //
Route::get('/', function () {
    return view('welcome');
});


// =================  GET ROUTERS ==================         //
Route::get('/login', [UserController::class, 'login']);
Route::get('/register', [UserController::class, 'register']);
Route::get('/projet_profile', [UserController::class, 'projet_profile'])->name('projet_profile');
Route::get('/add_photoVideo', [UserController::class, 'add_photoVideo'])->name('add_photoVideo');
Route::get('/add_rapport', [UserController::class, 'add_rapport'])->name('add_rapport');


Route::get('/admin_dash', [UserController::class, 'admin_dash'])->name('admin_dash');
Route::get('/show_files', [UserController::class, 'show_files'])->name('show_files');
Route::get('/admin_dashPTBA', [UserController::class, 'admin_dashPTBA'])->name('admin_dashPTBA');
Route::get('/admin_dashPassation_Marchés', [UserController::class, 'admin_dashPassation_Marchés'])->name('admin_dashPassation_Marchés');
Route::get('/admin_dashCadre_Résultats_Logique', [UserController::class, 'admin_dashCadre_Résultats_Logique'])->name('admin_dashCadre_Résultats_Logique');

Route::get('/admin_dash_categorie_depense', [UserController::class, 'admin_dash_categorie_depense'])->name('admin_dash_categorie_depense');
Route::get('/create_project', [UserController::class, 'create_project'])->name('create_project');
Route::get('/logout', [ProjectController::class, 'logout'])->name('auth.logout');
Route::get('/upload_file', [ProjectController::class, 'upload_file'])->name('upload_file');
Route::get('/edit', [ProjectController::class, 'edit'])->name('edit');
Route::get('/edit_ptba', [ProjectController::class, 'edit_ptba'])->name('edit_ptba');
Route::get('/edit_passation_method', [ProjectController::class, 'edit_passation_method'])->name('edit_passation_method');
Route::get('/edit_cadre_logique', [ProjectController::class, 'edit_cadre_logique'])->name('edit_cadre_logique');

Route::get('/fetchAllFiles', [ProjectController::class, 'fetchAllFiles'])->name('fetchAllFiles');
Route::get('/fetchAll_Categorie_Depense', [ProjectController::class, 'fetchAll_Categorie_Depense'])->name('fetchAll_Categorie_Depense');
Route::get('/fetchAll_PTBA_METHOD', [ProjectController::class, 'fetchAll_PTBA_METHOD'])->name('fetchAll_PTBA_METHOD');
Route::get('/fetchAll_Passation', [ProjectController::class, 'fetchAll_Passation'])->name('fetchAll_Passation');
Route::get('/fetchAll_Passation_Two', [ProjectController::class, 'fetchAll_Passation_Two'])->name('fetchAll_Passation_Two');
Route::get('/fetchAll_CadreResult_method', [ProjectController::class, 'fetchAll_CadreResult_method'])->name('fetchAll_CadreResult_method');
Route::get('/fetchAll_CadreResult_method_Two', [ProjectController::class, 'fetchAll_CadreResult_method_Two'])->name('fetchAll_CadreResult_method_Two');
Route::get('/fetchAll_Profile_METHOD', [ProjectController::class, 'fetchAll_Profile_METHOD'])->name('fetchAll_Profile_METHOD');
Route::get('/fetchAllFiles_Rapport', [ProjectController::class, 'fetchAllFiles_Rapport'])->name('fetchAllFiles_Rapport');
Route::get('/fetchAllFiles_Photo', [ProjectController::class, 'fetchAllFiles_Photo'])->name('fetchAllFiles_Photo');
Route::get('/fetchAllFiles_Video', [ProjectController::class, 'fetchAllFiles_Video'])->name('fetchAllFiles_Video');
Route::get('/fetchAll_Categorie_Depense_TWO', [ProjectController::class, 'fetchAll_Categorie_Depense_TWO'])->name('fetchAll_Categorie_Depense_TWO');
Route::get('/fetchAll_PTBA_METHOD_TWO', [ProjectController::class, 'fetchAll_PTBA_METHOD_TWO'])->name('fetchAll_PTBA_METHOD_TWO');
Route::get('/fetchAll_PTBA_ADMIN_ONE', [ProjectController::class, 'fetchAll_PTBA_ADMIN_ONE'])->name('fetchAll_PTBA_ADMIN_ONE');
Route::get('/fetchAll_PTBA_COMPOSANTE', [ProjectController::class, 'fetchAll_PTBA_COMPOSANTE'])->name('fetchAll_PTBA_COMPOSANTE');
Route::get('/fetchAll_PTBA_SOUS_COMPOSANTE', [ProjectController::class, 'fetchAll_PTBA_SOUS_COMPOSANTE'])->name('fetchAll_PTBA_SOUS_COMPOSANTE');

Route::get('/fetchAll_PASSATION_ONE_ADMIN', [ProjectController::class, 'fetchAll_PASSATION_ONE_ADMIN'])->name('fetchAll_PASSATION_ONE_ADMIN');
Route::get('/fetchAll_PASSATION_TWO_ADMIN', [ProjectController::class, 'fetchAll_PASSATION_TWO_ADMIN'])->name('fetchAll_PASSATION_TWO_ADMIN');


// =================== GET MIDDLEWARE ==============         //
Route::group(['middleware' => ['LoginCheck']], function () {
    Route::get('/admin_dash', [UserController::class, 'admin_dash'])->name('admin_dash');
    Route::get('/admin_dashPTBA', [UserController::class, 'admin_dashPTBA'])->name('admin_dashPTBA');
    Route::get('/admin_dashPassation_Marchés', [UserController::class, 'admin_dashPassation_Marchés'])->name('admin_dashPassation_Marchés');
    Route::get('/admin_dashCadre_Résultats_Logique', [UserController::class, 'admin_dashCadre_Résultats_Logique'])->name('admin_dashCadre_Résultats_Logique');
    Route::get('/projet_profile', [UserController::class, 'projet_profile'])->name('projet_profile');
    Route::get('/add_photoVideo', [UserController::class, 'add_photoVideo'])->name('add_photoVideo');
    Route::get('/add_rapport', [UserController::class, 'add_rapport'])->name('add_rapport');
    Route::get('/show_files', [UserController::class, 'show_files'])->name('show_files');
});


// =================  POST ROUTERS ==================         //

Route::post('/add_rapport', [ProjectController::class, 'add_rapport'])->name('add_rapport');

Route::post('/login', [UserController::class, 'login_user'])->name('auth.login');
Route::post('/register', [UserController::class, 'register_user'])->name('auth.register');
Route::post('/create_project', [ProjectController::class, 'create_project_function'])->name('create_project_function');
Route::post('/upload_file', [ProjectController::class, 'upload_file'])->name('upload_file');
Route::post('/admin_dash_categorie_depense', [UserController::class, 'admin_dash_categorie_depense'])->name('admin_dash_categorie_depense');
Route::post('/add_categorie_depense', [UserController::class, 'add_categorie_depense'])->name('add_categorie_depense');
Route::post('/admin_dashCadre_Résultats_Logique', [UserController::class, 'admin_dashCadre_Résultats_Logique'])->name('admin_dashCadre_Résultats_Logique');

Route::post('/add_resultats_logique', [ProjectController::class, 'add_resultats_logique'])->name('add_resultats_logique');

//########### start handel PTBA

Route::post('/admin_dashPTBA', [UserController::class, 'admin_dashPTBA'])->name('admin_dashPTBA');
Route::post('/add_ptba', [UserController::class, 'add_ptba'])->name('add_ptba');
Route::post('/delete_ptba_record', [ProjectController::class, 'delete_ptba_record'])->name('delete_ptba_record');
Route::post('/delete_passation_record', [ProjectController::class, 'delete_passation_record'])->name('delete_passation_record');
Route::post('/delete_file_photo_record', [ProjectController::class, 'delete_file_photo_record'])->name('delete_file_photo_record');
Route::post('/delete_file_video_record', [ProjectController::class, 'delete_file_video_record'])->name('delete_file_video_record');


//###########  end handel PTBA

Route::post('/delete_record', [ProjectController::class, 'delete_record'])->name('delete_record');
Route::post('/delete_file_rapport_record', [ProjectController::class, 'delete_file_rapport_record'])->name('delete_file_rapport_record');
Route::post('/delete_file_record', [ProjectController::class, 'delete_file_record'])->name('delete_file_record');
Route::post('/delete_cadre_record', [ProjectController::class, 'delete_cadre_record'])->name('delete_cadre_record');

Route::post('/update_project_records', [ProjectController::class, 'update_project_records'])->name('update_project_records');
Route::post('/update_project_ptba_records', [ProjectController::class, 'update_project_ptba_records'])->name('update_project_ptba_records');
Route::post('/update_project_passation_records', [ProjectController::class, 'update_project_passation_records'])->name('update_project_passation_records');
Route::post('/update_project_cadre_records', [ProjectController::class, 'update_project_cadre_records'])->name('update_project_cadre_records');



//########### handle passation de marche

Route::post('/add_passation_marche', [ProjectController::class, 'add_passation_marche'])->name('add_passation_marche');
Route::post('/admin_dashPassation_Marchés', [UserController::class, 'admin_dashPassation_Marchés'])->name('admin_dashPassation_Marchés');

Route::post('/projet_profile', [UserController::class, 'projet_profile'])->name('projet_profile');
Route::post('/update_profile_method', [ProjectController::class, 'update_profile_method'])->name('update_profile_method');

Route::post('/add_photoVideo', [ProjectController::class, 'add_photoVideo'])->name('add_photoVideo');
Route::post('/add_video_photo_method', [ProjectController::class, 'add_video_photo_method'])->name('add_video_photo_method');
