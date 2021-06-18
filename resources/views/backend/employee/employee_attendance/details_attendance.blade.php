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
                <h5>  <i class="fas fa-list mr-1"></i> Employee Attendance Details <b>({{date('d-m-Y',strtotime($details['0']['date']))}}) </b> 
                    <a href="{{ route('employees.attendance.view') }}">
                        <button type="button" class="btn btn-info float-right btn-sm"> <i class="fas fa-list mr-1"></i> Employee Attendance List</button></a>
                </h5>
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          <th>SL.</th>
                          <th>ID No</th>
                          <th>Name</th>
                          <th>Date</th>
                          <th>Attendance Status</th>
                        </tr>
                        </thead>
                        <tbody>
                      @foreach($details as $key => $data)
                        <tr>
                          <td>{{$key+1}}</td>
                          <td>{{$data['user']['id_no']}}</td>
                          <td>{{$data['user']['name']}}</td>
                          <td>{{date('d-m-Y',strtotime($data['date']))}}</td>
                          <td>{{$data['attendance_status']}}</td>
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
