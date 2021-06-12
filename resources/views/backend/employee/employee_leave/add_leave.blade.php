@extends('backend.layouts.master')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage Employee Leave</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">
                {{(!empty($editData))?' Edit Employee Leave':'Add Employee Leave'}}
              </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <section class="col-md-12 ">
            <div class="card">
                <div class="card-header">
                    <h3> <i class="fas fa-user-plus mr-1"></i>
                        {{(!empty($editData))?'Edit Employee Leave':'Add Employee Leave'}}
                        <a href="{{ route('employees.leave.view') }}">
                        <button type="button" class="btn btn-info float-right btn-sm"> <i class="fas fa-users mr-1"></i> Employee Leave List</button></a>
                    </h3>
                </div>
                <form action="{{(!empty($editData))?route('employees.leave.update',$editData['id']):route('employees.leave.store')}} " method="POST" id="myForm" name="addLeaveForm">@csrf
                <div class="card-body">
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
                          <div class="col-12 col-sm-4">
                                <div class="form-group">
                                    <label class="col-form-label">Employee <font style="color: red">*</font></label>
                                    <select name="employee_id" id="employee_id" class="form-control form-control-sm" required>
                                        <option  value="">Select Employee</option>
                                        @foreach ($employees as $employee)
                                        <option {{(!empty($editData) && $editData['employee_id'] == $employee['id'])?'selected':''}} value="{{ $employee['id'] }}">{{ $employee['name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                          </div>
                          <div class="col-12 col-sm-4">
                            <div class="form-group">
                                <label class="col-form-label">Leave Purpose <font style="color: red">*</font></label>
                                <select name="leave_purpose_id" id="leave_purpose_id" class="form-control form-control-sm" required>
                                    <option  value="">Select Leave Purpose</option>
                                    @foreach ($leave_purpose as $leave)
                                    <option {{(!empty($editData) && $editData['leave_purpose_id'] == $leave['id'])?'selected':''}} value="{{ $leave['id'] }}">{{ $leave['name'] }}</option>
                                    @endforeach
                                    <option  value="0">Add New Purpose</option>
                                </select>
                                <input type="text" name="new_purpose" class="form-control form-control-sm" placeholder="Enter New Leave Purpose" id="add_others" style="display:none;margin-top:5px;">
                            </div>
                      </div>
                      </div>
                      
                      <div class="row">
                            <div class="col-12 col-md-4 col-sm-4">
                                <div class="form-group">
                                    <label class="col-form-label">Start Date <font style="color: red">*</font></label>
                                    <input id="start_date" name="start_date"  type="date" class="form-control form-control-sm "  value="{{(!empty($editData))?$editData['start_date']:''}}"
                                    placeholder="Enter Date of Birth">
                                </div>
                            </div>
                            <div class="col-12 col-md-4 col-sm-4">
                                <div class="form-group">
                                    <label class="col-form-label">End Date <font style="color: red">*</font></label>
                                    <input id="end_date" name="end_date"  type="date" class="form-control form-control-sm "  value="{{(!empty($editData))?$editData['end_date']:''}}"
                                    placeholder="Enter Date of Birth">
                                </div>
                            </div>
                      </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">{{(!empty($editData))?'Update':'Submit'}}</button>
                </div>
                </form>
            </div>
            </section>
        </div>
      </div>
    </section>
  </div>


  <script type="text/javascript">
    $(document).ready(function() {
        $('#myForm').validate({
            rules: {
              employee_id: {
                    required: true,
                   
                },
                end_date: {
                    required: true,
                    
                },
               
                start_date: {
                    required: true,
                    
                },
                leave_purpose_id: {
                    required: true,
                    
                },
               
                
                
                
            },
            messages: {
                role: {
                    required: "Please select user role",
                    
                },
                email: {
                    required: "Please enter a email address",
                    email: "Please enter a vaild email address"
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
