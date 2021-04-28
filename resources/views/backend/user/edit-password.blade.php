@extends('backend/layouts/master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard v1</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->






            <!-- /.row -->
            <!-- Main row -->
            <div class="row">
                <!-- Left col -->
                <section class="col-lg-12 connectedSortable">
                    <!-- Custom tabs (Charts with tabs)-->
                    <div class="card">
                        <div class="card-header">


                            <h4>
                                Change Password
                                <a class=" btn btn-success float-right" href="{{ route('users.view')}}"> <i class="fa fa-plus-circle"></i> User list</a>

                            </h4>




                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content p-0">
                                <!-- Morris chart - Sales -->
                                <form method="POST" action="{{ route('profiles.passwordUpdate')}}" id="myForm">
                                    @csrf
                                    <div class="form-row">
                                        
                                        <div class="form-group col-md-4">
                                            <label for="password">Current Password</label>
                                            <input type="password" name="current_password" id="current_password" class="form-control">
                                        </div>
                                        
                                        <div class="form-group col-md-4">
                                            <label for="password">New Password</label>
                                            <input type="password" name="new_password" id="new_password" class="form-control">
                                        </div>
                                       
                                        <div class="form-group col-md-4">
                                            <label for="password"> Confirm Password</label>
                                            <input type="password" name="confirm_password"" id="confirm_password" class="form-control">
                                        </div>
                                        
                                        
                                        <div class="form-group col-md-6">

                                            <input type="submit" value="submit" class="btn btn-primary">
                                        </div>

                                    </div>

                                </form>
















                            </div>
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.card -->


                </section>
                <!-- /.Left col -->
                <!-- right col (We are only adding the ID to make the widgets sortable)-->

                <!-- right col -->
            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>




<script type="text/javascript">
    $(document).ready(function() {
        $('#myForm').validate({
            rules: {
                
                current_password: {
                    required: true,
                    
                },
                new_password: {
                    required: true,
                    minlength: 8
                    
                },
                confirm_password: {
                    required: true,
                    
                    equalTo: '#new_password'
                },
                
                
                
            },
            messages: {
                
                current_password: {
                    required: "Please enter previous password",
                     
                },
                new_password: {
                    required: "Please Provide a Password",
                    minlength: "Your password must be at least 8 characters long"
                },
                
                confirm_password: {
                    required: "Please Enter Confirm Password",
                    qualTo: "Password dose not match!",
                    
                },
                
                
            },
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });
    });
</script>
@endsection