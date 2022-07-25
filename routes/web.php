<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Role\RoleController;
use App\Http\Controllers\HomeController;

use App\Http\Controllers\User\UserController;
include_once 'resume.php';
include_once 'business.php';

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

     Auth::routes(['register' => false]);
     // Auth::routes();
     
     Route::get('logout', 'App\Http\Controllers\Auth\LoginController@logout');

     Route::group(['middleware' => ['auth'] ], function() {
          Route::get('/', 'App\Http\Controllers\Expense\DashboardController@index')->name('dashboard');
          Route::group(['prefix'=>'expense/categories'], function(){
               Route::get('/', 'App\Http\Controllers\Expense\CategoryController@index')->name('categories');
               Route::get('/add', 'App\Http\Controllers\Expense\CategoryController@add')->name('addCategory');
               Route::post('/save', 'App\Http\Controllers\Expense\CategoryController@save')->name('saveCategory');
               Route::get('/edit/{id}', 'App\Http\Controllers\Expense\CategoryController@edit')->name('editCategory');
               Route::post('/update/{id}', 'App\Http\Controllers\Expense\CategoryController@update')->name('updateCategory');
               Route::get('/delete/{id}/{type?}', 'App\Http\Controllers\Expense\CategoryController@delete')->name('deleteCategory');
               Route::get('/publish/{id}', 'App\Http\Controllers\Expense\CategoryController@publish')->name('publishCategory');
               Route::post('/archive', 'App\Http\Controllers\Expense\CategoryController@archive')->name('archiveCategory');
               Route::get('/unarchive/{id}', 'App\Http\Controllers\Expense\CategoryController@unarchive')->name('unarchiveCategory');
               
          });

          Route::group(['prefix'=>'expense/beneficiary'], function() {
               Route::get('/', 'App\Http\Controllers\Expense\BeneficiaryController@index')->name('beneficiaries');
               Route::get('/add', 'App\Http\Controllers\Expense\BeneficiaryController@add')->name('addBeneficiary');
               Route::post('/save', 'App\Http\Controllers\Expense\BeneficiaryController@save')->name('saveBeneficiary');
               Route::get('/edit/{id}', 'App\Http\Controllers\Expense\BeneficiaryController@edit')->name('editBeneficiary');
               Route::post('/update/{id}', 'App\Http\Controllers\Expense\BeneficiaryController@update')->name('updateBeneficiary');
               Route::get('/delete/{id}', 'App\Http\Controllers\Expense\BeneficiaryController@delete')->name('deleteBeneficiary');
               Route::get('/unarchive/{id}', 'App\Http\Controllers\Expense\BeneficiaryController@unarchive')->name('unArchiveBeneficiary');
               Route::post('/archive', 'App\Http\Controllers\Expense\BeneficiaryController@archive')->name('archiveBeneficaiary');
          
          });

          Route::group(['prefix'=>'expense/bank-account'], function() {
               Route::get('/', 'App\Http\Controllers\Expense\BankAccountController@index')->name('bankaccounts');
               Route::get('/add', 'App\Http\Controllers\Expense\BankAccountController@add')->name('addBankAccount');
               Route::post('/save', 'App\Http\Controllers\Expense\BankAccountController@save')->name('saveBankAccount');
               Route::get('/edit/{id}', 'App\Http\Controllers\Expense\BankAccountController@edit')->name('editBankAccount');
               Route::post('/update/{id}', 'App\Http\Controllers\Expense\BankAccountController@update')->name('updateBankAccount');
               Route::get('/delete/{id}/{type?}', 'App\Http\Controllers\Expense\BankAccountController@delete')->name('deleteBankAccount');
               Route::post('/archive', 'App\Http\Controllers\Expense\BankAccountController@archive')->name('archiveBank');
               Route::post('/validateAccountNo', 'App\Http\Controllers\Expense\BankAccountController@Check_account_no')->name('validateAccountNo');
          
          });

          Route::group(['prefix'=>'expense/expenses'], function() {
               Route::get('/', 'App\Http\Controllers\Expense\ExpenseController@index')->name('expenses');
               Route::get('/add', 'App\Http\Controllers\Expense\ExpenseController@add')->name('addExpense');
               Route::post('/save', 'App\Http\Controllers\Expense\ExpenseController@save')->name('saveExpense');
               Route::get('/edit/{id}', 'App\Http\Controllers\Expense\ExpenseController@edit')->name('editExpense');
               Route::post('/update/{id}', 'App\Http\Controllers\Expense\ExpenseController@update')->name('updateExpense');
               Route::get('/delete/{id}', 'App\Http\Controllers\Expense\ExpenseController@delete')->name('deleteExpense');
               Route::get('/filter', 'App\Http\Controllers\Expense\ExpenseController@index')->name('filterExpense');
               Route::get('/export', 'App\Http\Controllers\Expense\ExpenseController@export')->name('exportExpense');
               Route::post('/export', 'App\Http\Controllers\Expense\ExpenseController@exportingExpense')->name('exportingExpense');
               Route::get('/unarchive/{id}', 'App\Http\Controllers\Expense\ExpenseController@unarchive')->name('unArchiveExpense');
               Route::post('/archive', 'App\Http\Controllers\Expense\ExpenseController@archive')->name('archiveExpense');
               Route::get('/import', 'App\Http\Controllers\Expense\ExpenseController@import')->name('importExpense');
               Route::post('/import', 'App\Http\Controllers\Expense\ExpenseController@importExcelSheet')->name('importExcelSheet');
               Route::get('/import/edit/{id}', 'App\Http\Controllers\Expense\ExpenseController@editImport')->name('editImport');
               Route::any('/import/update/{id}', 'App\Http\Controllers\Expense\ExpenseController@updateDraftExpense')->name('updateDraftExpense');
               Route::any('/import/download/{id}', 'App\Http\Controllers\Expense\ExpenseController@download')->name('download');
               Route::get('/import/delete/{id}', 'App\Http\Controllers\Expense\ExpenseController@deleteDraft')->name('deleteDraft');
          });

          Route::group(['prefix'=>'users/'], function() {
               Route::resource('roles', RoleController::class);
               Route::resource('users', UserController::class);
          });

            
          
     });
     // Auth::routes();

     /*Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
     Route::get('/', 'App\Http\Controllers\Expense\DashboardController@index')->name('dashboard');*/