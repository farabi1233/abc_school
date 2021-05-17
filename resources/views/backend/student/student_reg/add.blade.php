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
                                @if(isset($editData))
                                Edit Student data
                                @else
                                Add Student
                                @endif
                                <a class=" btn btn-success float-right" href="{{ route('students.registration.view')}}"> <i class="fa fa-plus-circle"></i> Student list</a>

                            </h4>

                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content p-0">
                                <!-- Morris chart - Sales -->
                                <form method="POST" action="{{(@$editData)?route('students.registration.update',$editData->id):route('students.registration.store')}} " id="myForm" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="image">Student Name <font style="color: red;">*</font></label>
                                            <input type="text" value="{{@$editData->name}}" name="name" class="form-control form-control-sm" id="name" required>

                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="image">Fathers Name <font style="color: red;">*</font></label>
                                            <input type="text" value="{{@$editData->fname}}" name="fname" class="form-control form-control-sm" id="fname" required>

                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="image">Mothers Name <font style="color: red;">*</font></label>
                                            <input type="text" value="{{@$editData->mname}}" name="mname" class="form-control form-control-sm" id="mname" required>

                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="image">Mobile No <font style="color: red;">*</font></label>
                                            <input type="text" value="{{@$editData->mobile}}" name="mobile" class="form-control form-control-sm" id="mobile" required>

                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="image">Address <font style="color: red;">*</font></label>
                                            <input type="text" value="{{@$editData->address}}" name="address" class="form-control form-control-sm" id="address" required>

                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="gender">Genger <font style="color: red;">*</font></label>

                                            <select class="form-control form-control-sm" name="gender">
                                                <option value="">Select Gender <font style="color: red;">*</font>
                                                </option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                                <option value="Others">Others</option>
                                            </select>

                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="gender">Relegion <font style="color: red;">*</font></label>

                                            <select class="form-control form-control-sm" name="religion">
                                                <option value="">Select Religion</option>
                                                <option value="Male">Islam</option>
                                                <option value="Female">Hindu</option>
                                                <option value="Others">Others</option>
                                            </select>

                                        </div>



                                        <div class="form-group col-md-4">
                                            <label for="image">Date of Birth <font style="color: red;">*</font></label>
                                            <input id="datepicker" class="form-control form-control-sm singledatepicker" type="text" value="{{@$editData->dob}}" name="dob">

                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="image">Discount</label>
                                            <input class="form-control form-control-sm" type="text" value="{{@$editData->discount}}" name="discount">

                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="">Year <font style="color: red;">*</font></label>
                                            <select class="form-control  form-control-sm" name="year_id">
                                                <option value="">Select Year</option>
                                                @foreach($years as $year)
                                                <option value="{{$year->id}}">{{$year->name}}</option>
                                                @endforeach

                                            </select>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="">Class <font style="color: red;">*</font></label>
                                            <select class="form-control  form-control-sm" name="class_id">
                                                <option value="">Selsect Class</option>
                                                @foreach($classes as $class)
                                                <option value="{{$class->id}}">{{$class->name}}</option>
                                                @endforeach

                                            </select>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="">Group</label>
                                            <select class="form-control  form-control-sm " name="group_id">
                                                <option value="">Select Group</option>
                                                @foreach($groups as $group)
                                                <option value="{{$group->id}}">{{$group->name}}</option>
                                                @endforeach

                                            </select>
                                        </div>


                                        <div class="form-group col-md-4">
                                            <label for="">Shift</label>
                                            <select class="form-control  form-control-sm" name="shift_id">
                                                <option value="">Select Shift</option>
                                                @foreach($shifts as $shift)
                                                <option value="{{$shift->id}}">{{$shift->name}}</option>
                                                @endforeach

                                            </select>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="image">Image</label>
                                            <input type="file" name="image" class="form-control" id="image">

                                        </div>
                                        <div class="form-group col-md-2">
                                            <img id="showImage" src="{{url('upload/no_image.jpg') }}" alt="" style=" border: 1px solid #ddd; border-radius: 4px; padding: 5px; width: 150px; ">

                                        </div>






                                        <div class="form-group col-md-6 " style="padding-top: 60px;">

                                            <button type="submit" value="Submit" class="btn btn-primary btn-sm">
                                                {{(@$editData)?'Update':'Submit'}} </button>
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


<script>
    $('#datepicker').datepicker({
        uiLibrary: 'bootstrap4'
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#myForm').validate({
            rules: {
                "name": {
                    required: true,

                },
                "fname": {
                    required: true,

                },
                "mname": {
                    required: true,

                },
                "mobile": {
                    required: true,

                },
                "address": {
                    required: true,

                },
                "gender": {
                    required: true,

                },
                "religion": {
                    required: true,

                },
                "discount": {
                    required: true,

                },
                "year_id": {
                    required: true,

                },
                "class_id": {
                    required: true,

                },
                "dob": {
                    required: true,

                }
            },
            messages: {


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