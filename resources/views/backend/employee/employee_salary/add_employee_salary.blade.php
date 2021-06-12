@extends('backend.layouts.master')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage Employee Salary</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add Employee Salary</li>
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
                        Employee Salary Increment
                        <a href="{{ route('employees.salary.view') }}">
                        <button type="button" class="btn btn-info float-right btn-sm"> <i class="fas fa-users mr-1"></i> Employee Salary List</button></a>
                    </h3>
                </div>
                <form id="myForm" action="{{route('employees.salary.increment.store',$editData['id'])}}" method="POST">@csrf
                <div class="card-body">
                        {{-- ROW 1 --}}
                      <div class="row">
                          <div class="col-12 col-sm-4">
                              <div class="form-group">
                                  <label class="col-form-label" for="inputName"> Salary</label>
                                  <input id="increment_salary" name="increment_salary"  type="text" class="form-control" placeholder="Enter Increment Salary Amount" required>
                              </div>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-12 col-sm-4">
                              <div class="form-group">
                                  <label class="col-form-label" for="inputName"> Effective Date</label>
                                  <input id="effective_date" name="effective_date"  type="date" class="form-control" required>
                              </div>
                          </div>
                      </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success" > Increment</button>
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
              increment_salary: {
                    required: true,
                   
                },
                effective_date: {
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
