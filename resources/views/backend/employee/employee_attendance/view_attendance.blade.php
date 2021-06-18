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
                <h3>  <i class="fas fa-list mr-1"></i> Employee Attendance List
                    <a href="{{ route('employees.attendance.add') }}">
                    <button type="button" class="btn btn-info float-right btn-sm"> <i class="fas fa-plus mr-1"></i> Add Employee Attendance</button></a>
                </h3>
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th>SL.</th>
                        <th>Date</th>
                        <th>Action</th>
                      </tr>
                      </thead>
                      <tbody>
                    @foreach($allData as $key => $data)
                      <tr>
                        <td>{{$key+1}}</td>
                        <td>{{date('d-m-Y',strtotime($data['date']))}}</td>
                        <td>
                            <a title="Edit" class=" btn btn-success mr-1"
                            href="{{ route('employees.attendance.edit',$data['date']) }}"> <i class="fas fa-pencil-alt"></i></a>
                            <a title="Details" class=" btn btn-info mr-1"
                            href="{{ route('employees.attendance.details',$data['date']) }}"> <i class="fas fa-eye    "></i> </a>
                        </td>
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
