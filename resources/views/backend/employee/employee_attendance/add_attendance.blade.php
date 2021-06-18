@extends('backend.layouts.master')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage Employee Attendance</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Employee Attendance</li>
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
                <h5><i class="fas fa-plus mr-1"></i>  {{(!empty($editData))?'Edit Employee Attendance':'Add Employee Attendance'}}
                    <a href="{{ route('employees.attendance.view') }}">
                    <button type="button" class="btn btn-info float-right btn-sm"> <i class="fas fa-list mr-1"></i> Employee Attendance List</button></a>
                </h5>
                </div>
                

                  <form id="myForm" action="{{ route('employees.attendance.store') }} "method="POST">@csrf

                   @if (isset($editData))
                    <div class="card-body">
                      <div class="form-group row">
                          <div class="col-sm-4">
                              <input type="date" value="{{$editData['0']['date']}}" name="date" id="date" class="form-control form-control-sm" readonly>
                          </div>
                        </div>
                      <table class="table table-bordered">
                        <thead>
                          <tr class="text-center text-bold">
                            <td  rowspan="2"style="width: 10px;padding-top: 35px">#</td>
                            <td rowspan="2" style="padding-top: 35px">Employee ID</td>
                            <td rowspan="2" style="padding-top: 35px">Employee Name</td>
                            <td colspan="3">Attendance Status</td>
                          </tr>
                          <tr class="text-center">
                              <td > <button type="button"  id="present_all" class="btn btn-sm btn-info">Present</button></td>
                              <td><button type="button"  id="leave_all" class="btn btn-sm btn-info">Leave</button></td>
                              <td><button type="button"  id="absent_all"   class="btn btn-sm btn-info">Absent</button></td>
                          </tr>
                          
                        </thead>
                        <tbody>
                          @foreach ($editData as $key => $data)
                              <tr class="text-center">
                                  <input type="hidden" name="employee_id[]" value="{{$data['employee_id']}}" class="employee_id">
                                  <td>{{$key+1}}</td>
                                  <td>{{$data['user']['id_no']}}</td>
                                  <td>{{$data['user']['name']}}</td>
                                  <td width="10%">
                                          <div class="icheck-success d-inline">
                                            <input type="radio"  id="present{{$key}}" value="Present" name="attendance_status{{$key}}" 
                                            {{($data['attendance_status'] == 'Present'?'checked':'')}}
                                            >
                                            <label for="present{{$key}}">
                                                Present
                                            </label>
                                          </div>
                                  </td>
                                  <td width="10%">
                                      <div class="icheck-turquoise d-inline">
                                          <input type="radio" id="leave{{$key}}" value="Leave" name="attendance_status{{$key}}" 
                                          {{($data['attendance_status'] == 'Leave'?'checked':'')}} >
                                          <label for="leave{{$key}}">Leave
                                          </label>
                                        </div>
                                  </td>
                                  <td width="10%">
                                      <div class="icheck-danger d-inline">
                                          <input type="radio"  id="absent{{$key}}" value="Absent" name="attendance_status{{$key}}" 
                                          {{($data['attendance_status'] == 'Absent'?'checked':'')}} >
                                          <label for="absent{{$key}}">Absent
                                          </label>
                                        </div>
                                  </td>
                              </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                    <div class="card-footer">
                      <button type="submit" class="btn btn-info">Update</button>
                    </div>
                   @else
                    <div class="card-body">
                          <div class="form-group row">
                              <div class="col-sm-4">
                                  <input type="date" name="date" id="date" class="form-control form-control-sm" >
                              </div>
                            </div>
                          <table class="table table-bordered">
                            <thead>
                              <tr class="text-center text-bold">
                                <td  rowspan="2"style="width: 10px;padding-top: 35px">#</td>
                                <td rowspan="2" style="padding-top: 35px">Employee ID</td>
                                <td rowspan="2" style="padding-top: 35px">Employee Name</td>
                                <td colspan="3">Attendance Status</td>
                              </tr>
                              <tr class="text-center">
                                  <td > <button type="button"  id="present_all" class="btn btn-sm btn-info">Present</button></td>
                                  <td><button type="button"  id="leave_all" class="btn btn-sm btn-info">Leave</button></td>
                                  <td><button type="button"  id="absent_all"   class="btn btn-sm btn-info">Absent</button></td>
                              </tr>
                              
                            </thead>
                            <tbody>
                              @foreach ($employees as $key => $employee)
                                  <tr id="div{{$employee->id}}" class="text-center">
                                      <input type="hidden" name="employee_id[]" value="{{$employee->id}}" class="employee_id">
                                      <td>{{$key+1}}</td>
                                      <td>{{$employee['id_no']}}</td>
                                      <td>{{$employee['name']}}</td>
                                      <td width="10%">
                                              <div class="icheck-success d-inline">
                                                <input type="radio"  id="present{{$key}}" value="Present" name="attendance_status{{$key}}" checked="">
                                                <label for="present{{$key}}">
                                                    Present
                                                </label>
                                              </div>
                                      </td>
                                      <td width="10%">
                                          <div class="icheck-turquoise d-inline">
                                              <input type="radio" id="leave{{$key}}" value="Leave" name="attendance_status{{$key}}" >
                                              <label for="leave{{$key}}">Leave
                                              </label>
                                            </div>
                                      </td>
                                      <td width="10%">
                                          <div class="icheck-danger d-inline">
                                              <input type="radio"  id="absent{{$key}}" value="Absent" name="attendance_status{{$key}}">
                                              <label for="absent{{$key}}">Absent
                                              </label>
                                            </div>
                                      </td>
                                  </tr>
                              @endforeach
                            </tbody>
                          </table>
                        </div>
                        <div class="card-footer">
                          <button type="submit" class="btn btn-info">Submit</button>
                    </div>
                   @endif 
                </form>
            </div>
          </section>
        </div>
      </div>
    </section>
  </div>

  <script type="text/javascript">
    $(document).on('click','#present_all', function(){
  $("input[value=Present]").prop('checked',true);
  $("#leave_all").removeClass("btn-dark");
  $("#absent_all").removeClass("btn-dark");
  $(this).addClass("btn-dark");
});
$(document).on('click','#leave_all', function(){
  $("input[value=Leave]").prop('checked',true);
  $("#present_all").removeClass("btn-dark");
  $("#absent_all").removeClass("btn-dark");
  $("#present_all").addClass("btn-info");
  $("#absent_all").addClass("btn-info");
  $(this).addClass("btn-dark");
});
$(document).on('click','#absent_all', function(){
  $("input[value=Absent]").prop('checked',true);
  $("#present_all").removeClass("btn-dark");
  $("#leave_all").removeClass("btn-dark");
  $("#present_all").addClass("btn-info");
  $("#leave_all").addClass("btn-info");
  $(this).addClass("btn-dark");
});

</script>
  <script type="text/javascript">
    $(document).ready(function() {
        $('#myForm').validate({
            rules: {
              date: {
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
