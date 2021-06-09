@php
$prefix = Request::route()->getPrefix();
$photo = Auth::user()->image;
$route = Route::current()->getName();
@endphp
<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="{{(!empty($photo))? url('upload/user_images/'.$photo):url('upload/no_image.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            <a href="{{ route ('profiles.view') }}" class="d-block">{{Auth::user()->name}}</a>
        </div>
    </div>  

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
@if(Auth::user()->role=='Admin')

            <li class="nav-item has-treeview {{($prefix=='/users')?'menu-open':''}}">
                <a href="#" class="nav-link">
                    <i class="fas fa-user-plus"></i>
                    <p>
                        Manage User
                        <i class="fas fa-angle-left right"></i>

                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-list">
                        <a href="{{ route ('users.view') }}" class="nav-link {{($route=='users.view')?'active':''}}">
                            <i class="fas fa-list"></i>
                            <p>View user</p>
                        </a>
                    </li>

                </ul>
            </li>
           
    @endif
    
            <li class="nav-item has-treeview {{($prefix=='/profiles')?'menu-open':''}}">
                <a href="#" class="nav-link ">
                    <i class="fas fa-user-lock"></i>
                    <p>
                        Manage Profile
                        <i class="fas fa-angle-left right"></i>

                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route ('profiles.view') }}" class="nav-link {{($route=='profiles.view')?'active':''}}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>View user</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route ('profiles.passwordView') }}" class="nav-link {{($route=='profiles.passwordView')?'active':''}}">
                            <i class="far fa-circle nav-icon"></i>
                            <p> Change password</p>
                        </a>
                    </li>

                </ul>
            </li>

<!-- Manage setup -->
            <li class="nav-item has-treeview {{($prefix=='/setups')?'menu-open':''}}">
                <a href="#" class="nav-link ">
                    <i class="fas fa-tasks"></i>
                    <p>
                        Setup Managment
                        <i class="fas fa-angle-left right"></i>

                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route ('setups.student.class.view') }}" class="nav-link {{($route=='setups.student.class.view')?'active':''}}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Student Class</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route ('setups.student.year.view') }}" class="nav-link {{($route=='setups.student.year.view')?'active':''}}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>View Year</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route ('setups.student.group.view') }}" class="nav-link {{($route=='setups.student.group.view')?'active':''}}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Student Group</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route ('setups.student.shift.view') }}" class="nav-link {{($route=='setups.student.shift.view')?'active':''}}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Student Shift</p>
                        </a>
                    </li>
                   
                    <li class="nav-item">
                        <a href="{{ route ('setups.student.fee.category.view') }}" class="nav-link {{($route=='setups.student.fee.category.view')?'active':''}}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Fee Category</p>
                        </a>
                    </li>
                   
                    <li class="nav-item">
                        <a href="{{ route ('setups.student.fee.ammount.view') }}" class="nav-link {{($route=='setups.student.fee.ammount.view')?'active':''}}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Fee Ammount</p>
                        </a>
                    </li>

                    
                    <li class="nav-item">
                        <a href="{{ route ('setups.exam.type.view') }}" class="nav-link {{($route=='setups.exam.type.view')?'active':''}}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Exam Type</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route ('backend.setups.subject.view') }}" class="nav-link {{($route=='backend.setups.subject.view')?'active':''}}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Subject View</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route ('setups.assign.subject.view') }}" class="nav-link {{($route=='setups.assign.asubject.view')?'active':''}}">
                            <i class="far fa-circle nav-icon"></i>
                            <p> Assign Subject</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route ('setups.designation.view') }}" class="nav-link {{($route=='setups.designation.view')?'active':''}}">
                            <i class="far fa-circle nav-icon"></i>
                            <p> Designation</p>
                        </a>
                    </li>
                   
                </ul>
            </li>

            <li class="nav-item has-treeview {{($prefix=='/students')?'menu-open':''}}">
                <a href="#" class="nav-link ">
                    <i class="fas fa-book-reader"></i>
                    <p>
                        Manage Student
                        <i class="fas fa-angle-left right"></i>

                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route ('students.registration.view') }}" class="nav-link {{($route=='students.registration.view')?'active':''}}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Student Registration</p>
                        </a>
                        
                    </li>
                    <li class="nav-item">
                        <a href="{{ route ('students.roll.view') }}" class="nav-link {{($route=='students.roll.view')?'active':''}}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Roll Generate</p>
                        </a>                                                                     
                    </li>
                    <li class="nav-item">
                        <a href="{{ route ('students.reg_fee.view') }}" class="nav-link {{($route=='students.reg_fee.view')?'active':''}}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Reg Fee</p>
                        </a>                                                                     
                    </li>
                    
                    <li class="nav-item">
                        <a href="{{ route ('students.monthly_fee.view') }}" class="nav-link {{($route=='students.monthly_fee.view')?'active':''}}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Monthly Fee</p>
                        </a>                                                                     
                    </li>
                    
                    <li class="nav-item">
                        <a href="{{ route ('students.exam_fee.view') }}" class="nav-link {{($route=='students.exam_fee.view')?'active':''}}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Exam Fee</p>
                        </a>                                                                     
                    </li>
                    
                  
                   
                </ul>
            </li>





        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>