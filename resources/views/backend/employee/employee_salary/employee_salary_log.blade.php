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
              <li class="breadcrumb-item active">Employee Salary</li>
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
                <h3>  <i class="fas fa-list mr-1"></i> Employee List
                </h3>
                </div>
                <div class="card-header">
                    <h6>
                        Name : <b>{{$details['name']}}</b>
                        
                    </h6>
                    <h6>
                        Employee ID : <b> {{$details['id_no']}}</b>
                    </h6>
                    <h6>
                        Joining Salary : <b> {{$salary_log[0]['previous_salary']}}</b>
                    </h6>
                    <h6>
                        Present Salary : <b> {{$details['salary']}}</b>
                    </h6>
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th>SL.</th>
                        <th>Previous Salary</th>
                        <th>Increment Salary</th>
                        <th>Present Salary</th>
                        <th>Effective Date</th>
                      </tr>
                      </thead>
                      <tbody>
                    @foreach($salary_log as $key => $data)
                      <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$data['previous_salary']}}</td>
                        <td><span class="text-success">{{$data['increment_salary']}} <i class="fas fa-arrow-up"></i></span></td>
                        <td>{{$data['present_salary']}}</td>
                        <td>{{date('d-m-Y',strtotime($data['effective_date']))}}</td>
                      </tr>
                    @endforeach
                    </table>
                  </div>
            </div>
          </section>
        </div>
      </div>
    </section>
  </div>
@endsection
