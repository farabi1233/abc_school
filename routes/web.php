<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
Route::get('/', 'Frontend\FrontenController@index');
Route::get('/about-us', 'Frontend\FrontenController@aboutUs') -> name('about.us');
Route::get('/misson', 'Frontend\FrontenController@Misson') -> name('our.misson');
Route::get('/visson', 'Frontend\FrontenController@Visson') -> name('our.visson');
Route::get('/news-event', 'Frontend\FrontenController@newsEvent') -> name('news.event');
Route::get('/contract', 'Frontend\FrontenController@ContractUs') -> name('contract.us');
Route::post('/contract/store', 'Frontend\FrontenController@ContractStore') -> name('contract.store');
Route::get('/news-event/details/{id}', 'Frontend\FrontenController@newsDetails') -> name('news.event.details');
Auth::routes();
Route::get('/home', 'HomeController@index') -> name('home');

Route::prefix('users')->middleware(['test'])->group(function (){
    
        Route::get('/view', 'Backend\UserController@viewUser')-> name('users.view');
        Route::get('/add', 'Backend\UserController@addUser')-> name('users.add');
        Route::get('/edit/{id}', 'Backend\UserController@editUser') -> name('users.edit');
        Route::get('/delete/{id}', 'Backend\UserController@deleteUser') -> name('users.delete');
        Route::post('/update/{id}', 'Backend\UserController@updateUser') -> name('users.update');
        Route::post('/store', 'Backend\UserController@storeUser') -> name('users.store');
      
    });

// });



Route::prefix('profiles')->middleware(['test'])->group(function (){

    Route::get('/view', 'Backend\ProfileController@viewProfile') -> name('profiles.view');
    Route::get('/edit/{id}', 'Backend\ProfileController@editProfile') -> name('profiles.edit');
    Route::post('/store', 'Backend\ProfileController@updateProfile') -> name('profiles.update');
    Route::get('/password/view', 'Backend\ProfileController@passwordView') -> name('profiles.passwordView');
    Route::post('/password/update/', 'Backend\ProfileController@passwordUpdate') -> name('profiles.passwordUpdate');
  
});


Route::prefix('setups')->middleware(['test'])->group(function (){
    //student class

    Route::get('/student/class/view', 'Backend\Setup\StudentClassController@view') -> name('setups.student.class.view');
    Route::get('/student/class/add', 'Backend\Setup\StudentClassController@add') -> name('setups.student.class.add');
    Route::get('/student/class/edit/{id}', 'Backend\Setup\StudentClassController@edit') -> name('setups.student.class.edit');
    Route::get('/student/class/delete/{id}', 'Backend\Setup\StudentClassController@delete') -> name('setups.student.class.delete');
    Route::post('/student/class/update/{id}', 'Backend\Setup\StudentClassController@update') -> name('setups.student.class.update');
    Route::post('/student/class/store', 'Backend\Setup\StudentClassController@store') -> name('setups.student.class.store');

    //year or session

    Route::get('/student/year/view', 'Backend\Setup\StudentYearController@view') -> name('setups.student.year.view');
    Route::get('/student/year/add', 'Backend\Setup\StudentYearController@add') -> name('setups.student.year.add');
    Route::get('/student/year/edit/{id}', 'Backend\Setup\StudentYearController@edit') -> name('setups.student.year.edit');
    Route::get('/student/year/delete/{id}', 'Backend\Setup\StudentYearController@delete') -> name('setups.student.year.delete');
    Route::post('/student/year/update/{id}', 'Backend\Setup\StudentYearController@update') -> name('setups.student.year.update');
    Route::post('/student/year/store', 'Backend\Setup\StudentYearController@store') -> name('setups.student.year.store');

     //Student Group
     Route::get('/student/group/view', 'Backend\Setup\StudentGroupController@view') -> name('setups.student.group.view');
     Route::get('/student/group/add', 'Backend\Setup\StudentGroupController@add') -> name('setups.student.group.add');
     Route::get('/student/group/edit/{id}', 'Backend\Setup\StudentGroupController@edit') -> name('setups.student.group.edit');
     Route::get('/student/group/delete/{id}', 'Backend\Setup\StudentGroupController@delete') -> name('setups.student.group.delete');
     Route::post('/student/group/update/{id}', 'Backend\Setup\StudentGroupController@update') -> name('setups.student.group.update');
     Route::post('/student/group/store', 'Backend\Setup\StudentGroupController@store') -> name('setups.student.group.store');

     //Student shift
    Route::get('/student/shift/view', 'Backend\Setup\StudentShiftController@view') -> name('setups.student.shift.view');
    Route::get('/student/shift/add', 'Backend\Setup\StudentShiftController@add') -> name('setups.student.shift.add');
    Route::get('/student/shift/edit/{id}', 'Backend\Setup\StudentShiftController@edit') -> name('setups.student.shift.edit');
    Route::get('/student/shift/delete/{id}', 'Backend\Setup\StudentShiftController@delete') -> name('setups.student.shift.delete');
    Route::post('/student/shift/update/{id}', 'Backend\Setup\StudentShiftController@update') -> name('setups.student.shift.update');
    Route::post('/student/shift/store', 'Backend\Setup\StudentShiftController@store') -> name('setups.student.shift.store');
     //Student Fee Category
    Route::get('/student/fee/category/view', 'Backend\Setup\FeeCategoryController@view') -> name('setups.student.fee.category.view');
    Route::get('/student/fee/category/add', 'Backend\Setup\FeeCategoryController@add') -> name('setups.student.fee.category.add');
    Route::get('/student/fee/category/edit/{id}', 'Backend\Setup\FeeCategoryController@edit') -> name('setups.student.fee.category.edit');
    Route::get('/student/fee/category/delete/{id}', 'Backend\Setup\FeeCategoryController@delete') -> name('setups.student.fee.category.delete');
    Route::post('/student/fee/category/update/{id}', 'Backend\Setup\FeeCategoryController@update') -> name('setups.student.fee.category.update');
    Route::post('/student/fee/category/store', 'Backend\Setup\FeeCategoryController@store') -> name('setups.student.fee.category.store');
     //Student Fee Category ammount
    Route::get('/student/fee/ammount/view', 'Backend\Setup\FeeAmmountController@view') -> name('setups.student.fee.ammount.view');
    
    Route::get('/student/fee/ammount/add', 'Backend\Setup\FeeAmmountController@add') -> name('setups.student.fee.ammount.add');
    Route::get('/student/fee/ammount/edit/{fee_category_id}', 'Backend\Setup\FeeAmmountController@edit') -> name('setups.student.fee.ammount.edit');
    Route::get('/student/fee/ammount/details/{fee_category_id}', 'Backend\Setup\FeeAmmountController@details') -> name('setups.student.fee.ammount.details');
    Route::get('/student/fee/ammount/delete/{id}', 'Backend\Setup\FeeAmmountController@delete') -> name('setups.student.fee.category.delete');
    Route::post('/student/fee/ammount/update/{id}', 'Backend\Setup\FeeAmmountController@update') -> name('setups.student.fee.ammount.update');
    Route::post('/student/fee/ammount/store', 'Backend\Setup\FeeAmmountController@store') -> name('setups.student.fee.ammount.store');
  
});




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
