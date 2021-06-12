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
                                Edit Employee data
                                @else
                                Add Employee
                                @endif
                                <a class=" btn btn-success float-right" href="{{ route('employees.registration.view')}}"> <i class="fa fa-plus-circle"></i> Employee list</a>

                            </h4>

                        </div><!-- /.card-header -->
                        <div class="card">
                            
                            <form action="{{(!empty($editData))?route('employees.registration.update',$editData['id']):route('employees.registration.store')}} "  method="POST" id="myForm" enctype="multipart/form-data" name="addEmployeeRegForm">@csrf
                            <div class="card-body">
                              <input type="hidden" name="id" value=" {{(!empty($editData))?$editData['id']:''}}">
                                  @if($errors->any())
                                  <div class="alert alert-danger alert-dismissible">
                                    @foreach ($errors->all() as $error)
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <i class="icon fas fa-ban"></i> {{$error}}
                                    @endforeach
                                  </div>
                                  @endif
                                    {{-- ROW 1 --}}
                                  <div class="row">
                                      <div class="col-12 col-md-4 col-sm-4">
                                          <div class="form-group">
                                              <label class="col-form-label">Employee Name <font style="color: red">*</font></label>
                                              <input id="name" name="name"  type="text" class="form-control form-control-sm"  value="{{(!empty($editData))?$editData['name']:''}}" placeholder="Enter Employee Name">
                                          </div>
                                      </div>
                                      <div class="col-12 col-md-4 col-sm-4">
                                          <div class="form-group">
                                              <label class="col-form-label">Father's Name <font style="color: red">*</font></label>
                                              <input id="father_name" name="father_name"  type="text" class="form-control form-control-sm"  value="{{(!empty($editData))?$editData['fname']:''}}" placeholder="Enter Father's Name">
                                          </div>
                                      </div>
                                      <div class="col-12 col-md-4 col-sm-4">
                                          <div class="form-group">
                                              <label class="col-form-label">Mother's Name <font style="color: red">*</font></label>
                                              <input id="mother_name" name="mother_name"  type="text" class="form-control form-control-sm"  value="{{(!empty($editData))?$editData['mnames']:''}}" placeholder="Enter Mother's Name">
                                          </div>
                                      </div>
                                      <div class="col-12 col-md-4 col-sm-4">
                                          <div class="form-group">
                                              <label class="col-form-label">Mobile No <font style="color: red">*</font></label>
                                              <input id="mobile" name="mobile"  type="text" class="form-control form-control-sm"  value="{{(!empty($editData))?$editData['mobile']:''}}" placeholder="Enter Mobile No">
                                          </div>
                                      </div>
                                      <div class="col-12 col-md-4 col-sm-4">
                                          <div class="form-group">
                                              <label class="col-form-label">Address <font style="color: red">*</font></label>
                                              <input id="address" name="address"  type="text" class="form-control form-control-sm"  value="{{(!empty($editData))?$editData['address']:''}}" placeholder="Enter Address">
                                          </div>
                                      </div>
                                      <div class="col-12 col-md-4 col-sm-4">
                                          <div class="form-group">
                                              <label class="col-form-label">Gender <font style="color: red">*</font></label>
                                              <select name="gender" id="gender" class="form-control form-control-sm">
                                                  <option  value="">Select Gender</option>
                                                  <option {{(!empty($editData) && $editData['gender'] == 'Male')?'selected':''}} value="Male">Male</option>
                                                  <option {{(!empty($editData) && $editData['gender'] == 'Female')?'selected':''}} value="Female">Female</option>
                                                  <option {{(!empty($editData) && $editData['gender'] == 'Others')?'selected':''}} value="Others">Others</option>
                                              </select>
                                          </div>
                                      </div>
                                      <div class="col-12 col-md-4 col-sm-4">
                                          <div class="form-group">
                                              <label class="col-form-label">Religion <font style="color: red">*</font></label>
                                              <select name="religion" id="religion" class="form-control form-control-sm">
                                                  <option  value="">Select religion</option>
                                                  <option {{(!empty($editData) && $editData['religion'] == 'Islam')?'selected':''}} value="Islam">Islam</option>
                                                  <option {{(!empty($editData) && $editData['religion'] == 'Hindu')?'selected':''}} value="Hindu">Hindu</option>
                                                  <option {{(!empty($editData) && $editData['religion'] == 'Christian')?'selected':''}} value="Christian">Christian</option>
                                              </select>
                                          </div>
                                      </div>
                                      <div class="col-12 col-md-4 col-sm-4">
                                        <div class="form-group">
                                            <label class="col-form-label">Date of Birth (DOB) <font style="color: red">*</font></label>
                                            <input id="dob" name="dob"  type="date" class="form-control form-control-sm "  value="{{(!empty($editData))?$editData['dob']:''}}"
                                             placeholder="Enter Date of Birth">
                                        </div>
                                      </div>
                                      @if(empty($editData['salary']))
                                      <div class="col-12 col-md-4 col-sm-4">
                                        <div class="form-group">
                                            <label class="col-form-label">Salary <font style="color: red">*</font></label>
                                            <input id="salary" name="salary"  type="text" class="form-control form-control-sm"  value="{{(!empty($editData))?$editData['salary']:''}}" placeholder="Enter Salary">
                                        </div>
                                      </div>
                                      @endif
                                      
                                      <div class="col-12 col-md-4 col-sm-4">
                                        <div class="form-group">
                                            <label class="col-form-label">Designation <font style="color: red">*</font></label>
                                            <select name="designation_id" id="designation_id" class="form-control form-control-sm">
                                                <option  value="">Select Designation</option>
                                                @foreach ($designations as $designation)
                                                <option {{(!empty($editData) && $editData['designation_id'] == $designation['id'])?'selected':''}} value="{{ $designation['id'] }}">{{ $designation['name'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                       </div>
                                       @if(empty($editData['join_date']))
                                      <div class="col-12 col-md-4 col-sm-4">
                                        <div class="form-group">
                                            <label class="col-form-label">Joining Date <font style="color: red">*</font></label>
                                            <input id="join_date" name="join_date"  type="date" class="form-control form-control-sm "  value="{{(!empty($editData))?$editData['join_date']:''}}"
                                             placeholder="Enter Date of Birth">
                                        </div>
                                       </div>
                                       @endif
                                     
                                       <div class="form-group col-md-2">
                                        <label for="image">Image</label>
                                        <input type="file" name="image" class="form-control" id="image">

                                    </div>
                                    <div class="form-group col-md-2">
                                        <img id="showImage" src="{{(!empty(@$editData['image']))? url('upload/employee_images/'.@$editData['image']):url('upload/no_image.jpg') }}" alt="" style=" border: 1px solid #ddd; border-radius: 4px; padding: 5px; width: 150px; ">

                                    </div>
                                       
                                  </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">{{(!empty($editData))?'Update':'Submit'}}</button>
                            </div>
                            </form>
                        </div>
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
                "father_name": {
                    required: true,

                },
                "mother_name": {
                    required: true,

                },
                "mobile": {
                    required: true,

                },
                "address": {
                    required: true,

                },
                "designation_id": {
                    required: true,

                },
                "gender": {
                    required: true,

                },
                "religion": {
                    required: true,

                },
                "salary": {
                    required: true,

                },
               
                "join_date": {
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