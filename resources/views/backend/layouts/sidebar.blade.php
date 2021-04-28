@php
$prefix = Request::route()->getPrefix();

$route = Route::current()->getName();
@endphp
<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="{{(!empty($user->image))? url('upload/user_images/'.$user->image):url('upload/no_image.jpg') }}" class="img-circle elevation-2" alt="User Image">
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


            <li class="nav-item has-treeview {{($prefix=='/users')?'menu-open':''}}">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-copy"></i>
                    <p>
                        Manage User
                        <i class="fas fa-angle-left right"></i>

                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route ('users.view') }}" class="nav-link {{($route=='users.view')?'active':''}}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>View user</p>
                        </a>
                    </li>

                </ul>
            </li>

            <li class="nav-item has-treeview {{($prefix=='/profiles')?'menu-open':''}}">
                <a href="#" class="nav-link ">
                    <i class="nav-icon fas fa-copy"></i>
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

            <li class="nav-item has-treeview {{($prefix=='/setups')?'menu-open':''}}">
                <a href="#" class="nav-link ">
                    <i class="nav-icon fas fa-copy"></i>
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
                        <a href="{{ route ('setups.student.group.view') }}" class="nav-link {{($route=='setups.student.Group.view')?'active':''}}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>View Group</p>
                        </a>
                    </li>
                   
                </ul>
            </li>




        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>