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
                                Edit Profile
                                <a class=" btn btn-success float-right" href="{{ route('profiles.view')}}"> <i class="fa fa-plus-circle"></i> Your Pfofile</a>

                            </h4>




                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content p-0">
                                <!-- Morris chart - Sales -->
                                <form method="POST" action="{{ route('profiles.update',$editData->id)}}" id="myForm" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-row">
                                        
                                        <div class="form-group col-md-4">
                                            <label for="name">Name</label>
                                            <input type="text" name="name" class="form-control" required value="{{$editData->name}}">
                                            <font style="color: red;">
                                                {{($errors->has('name'))?($errors->first('name')):''}}

                                            </font>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="email">Email</label>
                                            <input type="text" name="email" class="form-control" required value="{{$editData->email}}">
                                            <font style="color: red;">
                                                {{($errors->has('email'))?($errors->first('email')):''}}

                                            </font>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="mobile">Mobile No</label>
                                            <input type="text" name="mobile" class="form-control" required value="{{$editData->mobile}}">
                                            <font style="color: red;">
                                                {{($errors->has('mobile'))?($errors->first('mobile')):''}}

                                            </font>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="address">Address</label>
                                            <input type="text" name="address" class="form-control" required value="{{$editData->address}}">
                                            <font style="color: red;">
                                                {{($errors->has('address'))?($errors->first('address')):''}}

                                            </font>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="gender">Gender</label>
                                            <select name="gender" id="gender" class="form-control">
                                                <option value="">Select Role</option>
                                                <option value="Male" 
                                                {{ ($editData->gender=="Male")?"selected": ""  }}
                                                 >Male</option>
                                                <option value="Female" {{ ($editData-> gender=="Female") ? "selected": ""  }}>Female</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="image">Image</label>
                                            <input type="file" name="image" class="form-control" id="image">
                                            
                                        </div>
                                        <div class="form-group col-md-2">
                                            <img id="showImage"  src="{{(!empty($editData->image))? url('upload/user_images/'.$editData->image):url('upload/no_image.jpg') }}" alt="" style="width:150px; height:160px; border: 1px solid black #00">
                                            
                                        </div>
                                        
                                        
                                        
                                        <div class="form-group col-md-6 " style="padding-top: 60px;">

                                            <input type="submit" value="Update" class="btn btn-primary">
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
                usertype: {
                    required: true,
                   
                },
                email: {
                    required: true,
                    email: true,
                },
                password: {
                    required: true,
                    equalTo: '#password'
                },
                password2: {
                    required: true,
                    minlength: 8
                },
                
                
                
            },
            messages: {
                usertype: {
                    required: "Please select user role",
                    
                },
                email: {
                    required: "Please enter a email address",
                    email: "Please enter a vaild email address"
                },
                password: {
                    required: "Please enter confirm password",
                    equalTo:  "Confirm password dose not match"
                },
                password2: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 8 characters long"
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