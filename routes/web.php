<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashboard\Analytics;
use App\Http\Controllers\pages\AccountSettingsAccount;
use App\Http\Controllers\pages\AccountSettingsNotifications;
use App\Http\Controllers\pages\AccountSettingsConnections;
use App\Http\Controllers\pages\MiscError;
use App\Http\Controllers\pages\MiscUnderMaintenance;
use App\Http\Controllers\authentications\LoginBasic;
use App\Http\Controllers\authentications\RegisterBasic;
use App\Http\Controllers\authentications\ForgotPasswordBasic;
use App\Http\Controllers\Comptabilite as ControllersComptabilite;
use App\Http\Controllers\user_interface\Accordion;
use App\Http\Controllers\ExcelController;
use App\Http\Controllers\user_interface\Alerts;
use App\Http\Controllers\user_interface\Badges;
use App\Http\Controllers\user_interface\Buttons;
use App\Http\Controllers\user_interface\Carousel;
use App\Http\Controllers\user_interface\Collapse;
use App\Http\Controllers\user_interface\Dropdowns;
use App\Http\Controllers\user_interface\Footer;
use App\Http\Controllers\user_interface\ListGroups;
use App\Http\Controllers\user_interface\Modals;
use App\Http\Controllers\user_interface\Navbar;
use App\Http\Controllers\user_interface\Offcanvas;
use App\Http\Controllers\user_interface\PaginationBreadcrumbs;
use App\Http\Controllers\user_interface\Progress;
use App\Http\Controllers\user_interface\Spinners;
use App\Http\Controllers\user_interface\TabsPills;
use App\Http\Controllers\user_interface\Toasts;
use App\Http\Controllers\user_interface\TooltipsPopovers;
use App\Http\Controllers\user_interface\Typography;
use App\Http\Controllers\form_elements\BasicInput;
use App\Http\Controllers\form_elements\InputGroups;
use App\Http\Controllers\form_layouts\VerticalForm;
use App\Http\Controllers\form_layouts\HorizontalForm;
use App\Http\Controllers\tables\Basic as TablesBasic;
use App\Http\Controllers\tables\Regellement_yes as Regellement_yes ;

use App\Http\Controllers\SumMontantPController;
//I'm created
use App\Http\Controllers\GestionopController;

// Main Page Route
Route::get('/', [Analytics::class, 'index'])->name('dashboard-analytics');




// pages
Route::get('/pages/account-settings-account', [AccountSettingsAccount::class, 'index'])->name('pages-account-settings-account');
Route::get('/pages/account-settings-notifications', [AccountSettingsNotifications::class, 'index'])->name('pages-account-settings-notifications');
Route::get('/pages/account-settings-connections', [AccountSettingsConnections::class, 'index'])->name('pages-account-settings-connections');
Route::get('/pages/misc-error', [MiscError::class, 'index'])->name('pages-misc-error');
Route::get('/pages/misc-under-maintenance', [MiscUnderMaintenance::class, 'index'])->name('pages-misc-under-maintenance');

// authentication
Route::get('/auth/login-basic', [LoginBasic::class, 'index'])->name('auth-login-basic');
Route::get('/auth/register-basic', [RegisterBasic::class, 'index'])->name('auth-register-basic');
Route::get('/auth/forgot-password-basic', [ForgotPasswordBasic::class, 'index'])->name('auth-reset-password-basic');



// User Interface
Route::get('/ui/accordion', [Accordion::class, 'index'])->name('ui-accordion');
Route::get('/ui/alerts', [Alerts::class, 'index'])->name('ui-alerts');
Route::get('/ui/badges', [Badges::class, 'index'])->name('ui-badges');
Route::get('/ui/buttons', [Buttons::class, 'index'])->name('ui-buttons');
Route::get('/ui/carousel', [Carousel::class, 'index'])->name('ui-carousel');
Route::get('/ui/collapse', [Collapse::class, 'index'])->name('ui-collapse');
Route::get('/ui/dropdowns', [Dropdowns::class, 'index'])->name('ui-dropdowns');
Route::get('/ui/footer', [Footer::class, 'index'])->name('ui-footer');
Route::get('/ui/list-groups', [ListGroups::class, 'index'])->name('ui-list-groups');
Route::get('/ui/modals', [Modals::class, 'index'])->name('ui-modals');
Route::get('/ui/navbar', [Navbar::class, 'index'])->name('ui-navbar');
Route::get('/ui/offcanvas', [Offcanvas::class, 'index'])->name('ui-offcanvas');
Route::get('/ui/pagination-breadcrumbs', [PaginationBreadcrumbs::class, 'index'])->name('ui-pagination-breadcrumbs');
Route::get('/ui/progress', [Progress::class, 'index'])->name('ui-progress');
Route::get('/ui/spinners', [Spinners::class, 'index'])->name('ui-spinners');
Route::get('/ui/tabs-pills', [TabsPills::class, 'index'])->name('ui-tabs-pills');
Route::get('/ui/toasts', [Toasts::class, 'index'])->name('ui-toasts');
Route::get('/ui/tooltips-popovers', [TooltipsPopovers::class, 'index'])->name('ui-tooltips-popovers');
Route::get('/ui/typography', [Typography::class, 'index'])->name('ui-typography');


// form elements
Route::get('/forms/basic-inputs', [BasicInput::class, 'index'])->name('forms-basic-inputs');
Route::get('/forms/input-groups', [InputGroups::class, 'index'])->name('forms-input-groups');

// form layouts
Route::get('/form/layouts-vertical', [VerticalForm::class, 'index'])->name('form-layouts-vertical');
Route::get('/form/layouts-horizontal', [HorizontalForm::class, 'index'])->name('form-layouts-horizontal');
Route::post('form/layouts-horizontal', [HorizontalForm::class, 'store'])->name('layouts.horizontal.store');


// table
Route::get('/table/all', [TablesBasic::class, 'index'])->name('tables-basic');
Route::get('/table/payment', [Regellement_yes::class, 'index'])->name('tables-basic-P');
Route::get('/table/non_payment', [Regellement_yes::class, 'index0'])->name('tables-basic-NP');
Route::get('/Comptabilite/{id}', [ControllersComptabilite::class, 'comptabilite'])->name('Comptabilite');

//this is the route I'm created 
Route::get('/gestionops', [GestionopController::class, 'index'])->name('gestionops.index');
Route::get('/gestionops/create', [GestionopController::class, 'create'])->name('gestionops.create');
Route::post('/gestionops', [GestionopController::class, 'store'])->name('gestionops.store');
Route::get('/gestionops/{gestionop}', [GestionopController::class, 'show'])->name('gestionops.show');
Route::get('/gestionops/{gestionop}/edit', [GestionopController::class, 'edit'])->name('gestionops.edit');
Route::put('/gestionops/{gestionop}', [GestionopController::class, 'update'])->name('gestionops.update');
Route::delete('/gestionops/{gestionop}', [GestionopController::class, 'destroy'])->name('gestionops.destroy');
Route::get('/api/sum-montant-regellement-yes', [GestionopController::class, 'getSumOfMontantWithRegellement'])->name('sum_montant');
Route::get('sum-regellement', [SumMontantPController::class, 'sumMontantP'])->name('api.sum_regellement');
Route::get('/api/sum-montant-regellement-yes', [SumMontantPController::class, 'getSumOfMontantWithRegellement'])->name('sum_montant');


// form elements
Route::get('/forms/basic-inputs', [BasicInput::class, 'index'])->name('forms-basic-inputs');
Route::get('/forms/input-groups', [InputGroups::class, 'index'])->name('forms-input-groups');

// form layouts
Route::get('/form/layouts-horizontal', [HorizontalForm::class, 'index'])->name('form-layouts-horizontal');

//Excel
Route::get('/excel', [ExcelController::class, 'excel'])->name('excel');
Route::post('/import', [ExcelController::class, 'import'])->name('import');
Route::get('/export/{id}', [ExcelController::class, 'export'])->name('export');
Route::post('/export/{id}', [ExcelController::class, 'export'])->name('export');
Route::get('/exportall', [ExcelController::class, 'exportall'])->name('exportall');
