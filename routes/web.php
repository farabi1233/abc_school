<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', 'Frontend\FrontenController@index');
Route::get('/about-us', 'Frontend\FrontenController@aboutUs')->name('about.us');
Route::get('/misson', 'Frontend\FrontenController@Misson')->name('our.misson');
Route::get('/visson', 'Frontend\FrontenController@Visson')->name('our.visson');
Route::get('/news-event', 'Frontend\FrontenController@newsEvent')->name('news.event');
Route::get('/contract', 'Frontend\FrontenController@ContractUs')->name('contract.us');
Route::post('/contract/store', 'Frontend\FrontenController@ContractStore')->name('contract.store');
Route::get('/news-event/details/{id}', 'Frontend\FrontenController@newsDetails')->name('news.event.details');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('users')->middleware(['test'])->group(function () {

    Route::get('/view', 'Backend\UserController@viewUser')->name('users.view');
    Route::get('/add', 'Backend\UserController@addUser')->name('users.add');
    Route::get('/edit/{id}', 'Backend\UserController@editUser')->name('users.edit');
    Route::get('/delete/{id}', 'Backend\UserController@deleteUser')->name('users.delete');
    Route::post('/update/{id}', 'Backend\UserController@updateUser')->name('users.update');
    Route::post('/store', 'Backend\UserController@storeUser')->name('users.store');
});

// });



Route::prefix('profiles')->middleware(['test'])->group(function () {

    Route::get('/view', 'Backend\ProfileController@viewProfile')->name('profiles.view');
    Route::get('/edit/{id}', 'Backend\ProfileController@editProfile')->name('profiles.edit');
    Route::post('/store', 'Backend\ProfileController@updateProfile')->name('profiles.update');
    Route::get('/password/view', 'Backend\ProfileController@passwordView')->name('profiles.passwordView');
    Route::post('/password/update/', 'Backend\ProfileController@passwordUpdate')->name('profiles.passwordUpdate');
});


Route::prefix('setups')->middleware(['test'])->group(function () {
    //student class
    Route::get('/student/class/view', 'Backend\Setup\StudentClassController@view')->name('setups.student.class.view');
    Route::get('/student/class/add', 'Backend\Setup\StudentClassController@add')->name('setups.student.class.add');
    Route::get('/student/class/edit/{id}', 'Backend\Setup\StudentClassController@edit')->name('setups.student.class.edit');
    Route::get('/student/class/delete/{id}', 'Backend\Setup\StudentClassController@delete')->name('setups.student.class.delete');
    Route::post('/student/class/update/{id}', 'Backend\Setup\StudentClassController@update')->name('setups.student.class.update');
    Route::post('/student/class/store', 'Backend\Setup\StudentClassController@store')->name('setups.student.class.store');

    //year or session
    Route::get('/student/year/view', 'Backend\Setup\StudentYearController@view')->name('setups.student.year.view');
    Route::get('/student/year/add', 'Backend\Setup\StudentYearController@add')->name('setups.student.year.add');
    Route::get('/student/year/edit/{id}', 'Backend\Setup\StudentYearController@edit')->name('setups.student.year.edit');
    Route::get('/student/year/delete/{id}', 'Backend\Setup\StudentYearController@delete')->name('setups.student.year.delete');
    Route::post('/student/year/update/{id}', 'Backend\Setup\StudentYearController@update')->name('setups.student.year.update');
    Route::post('/student/year/store', 'Backend\Setup\StudentYearController@store')->name('setups.student.year.store');

    //Student Group
    Route::get('/student/group/view', 'Backend\Setup\StudentGroupController@view')->name('setups.student.group.view');
    Route::get('/student/group/add', 'Backend\Setup\StudentGroupController@add')->name('setups.student.group.add');
    Route::get('/student/group/edit/{id}', 'Backend\Setup\StudentGroupController@edit')->name('setups.student.group.edit');
    Route::get('/student/group/delete/{id}', 'Backend\Setup\StudentGroupController@delete')->name('setups.student.group.delete');
    Route::post('/student/group/update/{id}', 'Backend\Setup\StudentGroupController@update')->name('setups.student.group.update');
    Route::post('/student/group/store', 'Backend\Setup\StudentGroupController@store')->name('setups.student.group.store');

    //Student shift
    Route::get('/student/shift/view', 'Backend\Setup\StudentShiftController@view')->name('setups.student.shift.view');
    Route::get('/student/shift/add', 'Backend\Setup\StudentShiftController@add')->name('setups.student.shift.add');
    Route::get('/student/shift/edit/{id}', 'Backend\Setup\StudentShiftController@edit')->name('setups.student.shift.edit');
    Route::get('/student/shift/delete/{id}', 'Backend\Setup\StudentShiftController@delete')->name('setups.student.shift.delete');
    Route::post('/student/shift/update/{id}', 'Backend\Setup\StudentShiftController@update')->name('setups.student.shift.update');
    Route::post('/student/shift/store', 'Backend\Setup\StudentShiftController@store')->name('setups.student.shift.store');

    //Student Fee Category
    Route::get('/student/fee/category/view', 'Backend\Setup\FeeCategoryController@view')->name('setups.student.fee.category.view');
    Route::get('/student/fee/category/add', 'Backend\Setup\FeeCategoryController@add')->name('setups.student.fee.category.add');
    Route::get('/student/fee/category/edit/{id}', 'Backend\Setup\FeeCategoryController@edit')->name('setups.student.fee.category.edit');
    Route::get('/student/fee/category/delete/{id}', 'Backend\Setup\FeeCategoryController@delete')->name('setups.student.fee.category.delete');
    Route::post('/student/fee/category/update/{id}', 'Backend\Setup\FeeCategoryController@update')->name('setups.student.fee.category.update');
    Route::post('/student/fee/category/store', 'Backend\Setup\FeeCategoryController@store')->name('setups.student.fee.category.store');

    //Student Fee Category ammount
    Route::get('/student/fee/ammount/view', 'Backend\Setup\FeeAmmountController@view')->name('setups.student.fee.ammount.view');
    Route::get('/student/fee/ammount/add', 'Backend\Setup\FeeAmmountController@add')->name('setups.student.fee.ammount.add');
    Route::get('/student/fee/ammount/edit/{fee_category_id}', 'Backend\Setup\FeeAmmountController@edit')->name('setups.student.fee.ammount.edit');
    Route::get('/student/fee/ammount/details/{fee_category_id}', 'Backend\Setup\FeeAmmountController@details')->name('setups.student.fee.ammount.details');
    Route::get('/student/fee/ammount/delete/{id}', 'Backend\Setup\FeeAmmountController@delete')->name('setups.student.fee.category.delete');
    Route::post('/student/fee/ammount/update/{id}', 'Backend\Setup\FeeAmmountController@update')->name('setups.student.fee.ammount.update');
    Route::post('/student/fee/ammount/store', 'Backend\Setup\FeeAmmountController@store')->name('setups.student.fee.ammount.store');

    //Exam Type
    Route::get('/exam/type/view', 'Backend\Setup\ExamTypeController@view')->name('setups.exam.type.view');
    Route::get('/exam/type/add', 'Backend\Setup\ExamTypeController@add')->name('setups.exam.type.add');
    Route::get('/exam/type/edit/{id}', 'Backend\Setup\ExamTypeController@edit')->name('setups.exam.type.edit');
    Route::get('/exam/type/delete/{id}', 'Backend\Setup\ExamTypeController@delete')->name('setups.exam.type.delete');
    Route::post('/exam/type/update/{id}', 'Backend\Setup\ExamTypeController@update')->name('setups.exam.type.update');
    Route::post('/exam/type/store', 'Backend\Setup\ExamTypeController@store')->name('setups.exam.type.store');



    //subject
    Route::get('/subject/view', 'Backend\Setup\SubjectController@view')->name('backend.setups.subject.view');
    Route::get('/subject/add', 'Backend\Setup\SubjectController@add')->name('backend.setups.subject.add');
    Route::get('/subject/edit/{id}', 'Backend\Setup\SubjectController@edit')->name('backend.setups.subject.edit');
    Route::get('/subject/delete/{id}', 'Backend\Setup\SubjectController@delete')->name('backend.setups.subject.delete');
    Route::post('/subject/update/{id}', 'Backend\Setup\SubjectController@update')->name('backend.setups.subject.update');
    Route::post('/subject/store', 'Backend\Setup\SubjectController@store')->name('backend.setups.subject.store');

    //assign subject
    Route::get('/assign/subject/view', 'Backend\Setup\AssignSubjectController@view')->name('setups.assign.subject.view');
    Route::get('/assign/subject/add', 'Backend\Setup\AssignSubjectController@add')->name('setups.assign.subject.add');
    Route::get('/assign/subject/edit/{class_id}', 'Backend\Setup\AssignSubjectController@edit')->name('setups.assign.subject.edit');
    Route::get('/assign/subject/delete/{class_id}', 'Backend\Setup\AssignSubjectController@delete')->name('setups.assign.subject.delete');
    Route::post('/assign/subject/update/{class_id}', 'Backend\Setup\AssignSubjectController@update')->name('setups.assign.subject.update');
    Route::post('/assign/subject/store', 'Backend\Setup\AssignSubjectController@store')->name('setups.assign.subject.store');
    Route::get('/assign/subject/details/{class_id}', 'Backend\Setup\AssignSubjectController@details')->name('setups.assing.subject.details');

    //designation
    Route::get('/designation/view', 'Backend\Setup\DesignationController@view')->name('setups.designation.view');
    Route::get('/designation/add', 'Backend\Setup\DesignationController@add')->name('setups.designation.add');
    Route::get('/designation/edit/{id}', 'Backend\Setup\DesignationController@edit')->name('setups.designation.edit');
    Route::get('/designation/delete/{id}', 'Backend\Setup\DesignationController@delete')->name('setups.designation.delete');
    Route::post('/designation/update/{id}', 'Backend\Setup\DesignationController@update')->name('setups.designation.update');
    Route::post('/designation/store', 'Backend\Setup\DesignationController@store')->name('setups.designation.store');
});

Route::prefix('students')->middleware(['test'])->group(function () {

    Route::get('/reg/download-details', 'Backend\Student\StudentRegController@download')->name('students.registration.download');
    Route::get('/reg/view', 'Backend\Student\StudentRegController@view')->name('students.registration.view');
    Route::get('/reg/add', 'Backend\Student\StudentRegController@add')->name('students.registration.add');
    Route::get('/reg/edit/{student_id}', 'Backend\Student\StudentRegController@edit')->name('students.registration.edit');
    Route::get('/reg/promotion/{student_id}', 'Backend\Student\StudentRegController@promotion')->name('students.registration.promotion');
    Route::post('/reg/update/{student_id}', 'Backend\Student\StudentRegController@update')->name('students.registration.update');
    Route::post('/reg/store', 'Backend\Student\StudentRegController@store')->name('students.registration.store');
    Route::post('/promotion/store/{student_id}', 'Backend\Student\StudentRegController@promotionStore')->name('students.promotion.store');
    Route::get('/reg/details/{student_id}', 'Backend\Student\StudentRegController@details')->name('students.registration.details');

    Route::get('/reg/delete/{id}', 'Backend\Student\StudentRegController@delete')->name('students.registration.delete');
    Route::get('year-class-wise/', 'Backend\Student\StudentRegController@yearClassWise')->name('students.year.class.wise');


    //Roll generate 


    Route::get('/roll/view', 'Backend\Student\StudentRollController@view')->name('students.roll.view');
    Route::post('/roll/store', 'Backend\Student\StudentRollController@store')->name('students.roll.store');
    Route::get('/roll/get-student', 'Backend\Student\StudentRollController@getStudent')->name('students.roll.get-student');

    //Student Reg Fee
    Route::get('/reg_fee/view', 'Backend\Student\StudentRegFeeController@view')->name('students.reg_fee.view');
    Route::post('/reg_fee/store', 'Backend\Student\StudentRegFeeController@store')->name('students.reg_fee.store');
    Route::get('/reg_fee/get-student', 'Backend\Student\StudentRegFeeController@getStudent')->name('students.reg_fee.get-student');
    Route::get('/reg_fee/pay-slip', 'Backend\Student\StudentRegFeeController@paySlip')->name('students.reg.fee.payslip');

    //Student Monthly Reg Fee
    Route::get('/monthly_fee/view', 'Backend\Student\StudentMonthlyFeeController@view')->name('students.monthly_fee.view');
    Route::post('/monthly_fee/store', 'Backend\Student\StudentMonthlyFeeController@store')->name('students.monthly_fee.store');
    Route::get('/monthly_fee/get-student', 'Backend\Student\StudentMonthlyFeeController@getStudent')->name('students.monthly_fee.get-student');
    Route::get('/monthly_fee/pay-slip', 'Backend\Student\StudentMonthlyFeeController@paySlip')->name('students.monthly_fee.payslip');

    //Student exam Fee
    Route::get('/exam_fee/view', 'Backend\Student\StudentExamFeeController@view')->name('students.exam_fee.view');

    Route::get('/exam_fee/get-student', 'Backend\Student\StudentExamFeeController@getStudent')->name('students.exam_fee.get-student');
    Route::get('/exam_fee/pay-slip', 'Backend\Student\StudentExamFeeController@paySlip')->name('students.exam_fee.payslip');
});


Route::prefix('employees')->middleware(['test'])->group(function () {

    Route::get('/reg/view', 'Backend\Employee\EmployeeRegController@view')->name('employees.registration.view');
    Route::get('/reg/add', 'Backend\Employee\EmployeeRegController@add')->name('employees.registration.add');
    Route::get('/reg/edit/{employee_id}', 'Backend\Employee\EmployeeRegController@edit')->name('employees.registration.edit');
    Route::post('/reg/update/{employee_id}', 'Backend\Employee\EmployeeRegController@update')->name('employees.registration.update');
    Route::get('/reg/details/{employee_id}', 'Backend\Employee\EmployeeRegController@details')->name('employees.registration.details');
    Route::post('/reg/store', 'Backend\Employee\EmployeeRegController@store')->name('employees.registration.store');

    //  Employee salary  

    Route::get('/salary/view', 'Backend\Employee\EmployeeSalaryController@view')->name('employees.salary.view');
    Route::get('/salary/increment/{id}', 'Backend\Employee\EmployeeSalaryController@increment')->name('employees.salary.increment');
    Route::post('/salary/increment/store/{id}', 'Backend\Employee\EmployeeSalaryController@store')->name('employees.salary.increment.store');
    Route::get('/salary/log/{id}', 'Backend\Employee\EmployeeSalaryController@details')->name('employees.salary.log');

    // employee leave
    Route::get('/leave/view', 'Backend\Employee\EmployeeLeaveController@view')->name('employees.leave.view');
    Route::get('employee/leave/add', 'Backend\Employee\EmployeeLeaveController@add')->name('employees.leave.add');
    Route::post('employee/leave/store', 'Backend\Employee\EmployeeLeaveController@store')->name('employees.leave.store');
    Route::get('employee/leave/edit/{id}', 'Backend\Employee\EmployeeLeaveController@edit')->name('employees.leave.edit');
    Route::post('employee/leave/update/{id}', 'Backend\Employee\EmployeeLeaveController@update')->name('employees.leave.update');
    Route::get('employee/leave/details/{id}', 'Backend\Employee\EmployeeLeaveController@details')->name('employees.leave.details');



    //employee attendence 

    Route::get('/attendance/view', 'Backend\Employee\EmployeeAttendController@view')->name('employees.attendance.view');
    Route::get('/attendance/add', 'Backend\Employee\EmployeeAttendController@add')->name('employees.attendance.add');
    Route::post('/attendance/store', 'Backend\Employee\EmployeeAttendController@store')->name('employees.attendance.store');
    Route::get('/attendance/edit/{date}', 'Backend\Employee\EmployeeAttendController@edit')->name('employees.attendance.edit');
    Route::get('/attendance/details/{date}', 'Backend\Employee\EmployeeAttendController@details')->name('employees.attendance.details');
    //employee monthly salary

    Route::get('employee/monthly/salary/view', 'Backend\Employee\MonthlySalaryController@view')->name('employees.monthly.salary.view');
    Route::get('employee/monthly/salary/get', 'Backend\Employee\MonthlySalaryController@getSalary')->name('employees.monthly.salary.get');
    Route::get('employee/monthly/salary/payslip/{employee_id}', 'Backend\Employee\MonthlySalaryController@paySlip')->name('employees.monthly.salary.payslip');

    //monthly Salary


});




Route::prefix('marks')->middleware(['test'])->namespace('Backend\Marks')->group(function () {
    //Marks entry
    Route::get('/add', 'MarksController@add')->name('marks.add');
    Route::post('/store', 'MarksController@store')->name('marks.store');
    Route::get('/edit', 'MarksController@edit')->name('marks.edit');
    Route::post('/update', 'MarksController@update')->name('marks.update');
    Route::get('/get-student-marks', 'MarksController@getMarks')->name('get-student-marks');

    //grade point

    Route::get('/grade/view', 'GradeController@view')->name('marks.grade.view');
    Route::get('/grade/add', 'GradeController@add')->name('marks.grade.add');
    Route::post('/grade/store', 'GradeController@store')->name('marks.grade.store');
    Route::get('/grade/edit/{id}', 'GradeController@edit')->name('marks.grade.edit');
    Route::get('/grade/delete/{id}', 'GradeController@delete')->name('marks.grade.delete');
    Route::post('/grade/update/{id}', 'GradeController@update')->name('marks.grade.update');
    Route::post('/grade/details/{id}', 'GradeController@details')->name('marks.grade.details');
});
Route::prefix('accounts')->middleware(['test'])->namespace('Backend\Accounts')->group(function () {
    /*-------------------------------------------------------------------------------------------------------------------------------
            | Student Fee
            |-------------------------------------------------------------------------------------------------------------------------------*/
    Route::get('/student/fee/view', 'StudentFeeController@view')->name('accounts.fee.view');
    Route::get('/student/fee/add', 'StudentFeeController@add')->name('accounts.fee.add');
    Route::post('/student/fee/store', 'StudentFeeController@store')->name('accounts.fee.store');
    Route::get('/student/fee/getstudent', 'StudentFeeController@getStudent')->name('accounts.fee.get-student');
    /*-------------------------------------------------------------------------------------------------------------------------------
            | Employee Salary
            |-------------------------------------------------------------------------------------------------------------------------------*/
    Route::get('/employee/salary/view', 'SalaryController@view')->name('accounts.salary.view');
    Route::get('/employee/salary/add', 'SalaryController@add')->name('accounts.salary.add');
    Route::post('/employee/salary/store', 'SalaryController@store')->name('accounts.salary.store');
    Route::get('/employee/salary/get-employee', 'SalaryController@getEmployee')->name('accounts.salary.get-employee');
    /*-------------------------------------------------------------------------------------------------------------------------------
            | Others Cost
            |-------------------------------------------------------------------------------------------------------------------------------*/
    Route::get('/cost/view', 'OtherCostController@view')->name('accounts.cost.view');
    Route::get('/cost/add', 'OtherCostController@add')->name('accounts.cost.add');
    Route::post('/cost/store', 'OtherCostController@store')->name('accounts.cost.store');
    Route::get('/cost/edit/{id}', 'OtherCostController@edit')->name('accounts.cost.edit');
    Route::post('/cost/update/{id}', 'OtherCostController@update')->name('accounts.cost.update');
    Route::post('/delete', 'OtherCostController@delete')->name('accounts.cost.delete');
});



Route::get('/get-student', 'Admin\DefaultController@getStudent')->name('get-student');
Route::get('/get-subject', 'Admin\DefaultController@getSubject')->name('get-subject');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
