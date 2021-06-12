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
              <li class="breadcrumb-item active">Employee Leave</li>
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
                    <a href="{{ route('employees.leave.add') }}">
                    <button type="button" class="btn btn-info float-right btn-sm"> <i class="fas fa-plus mr-1"></i> Add Employee Leave</button></a>
                </h3>
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th>SL.</th>
                        <th>ID No</th>
                        <th>Name</th>
                        <th>Leave Purpose</th>
                        <th>Leave Date</th>
                        <th>Action</th>
                      </tr>
                      </thead>
                      <tbody>
                    @foreach($allData as $key => $data)
                      <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$data['user']['id_no']}}</td>
                        <td>{{$data['user']['name']}}</td>
                        <td>{{$data['leave_purpose']['name']}}</td>
                        <td><i> {{date('d-m-Y',strtotime($data['start_date']))}}</i>   to <i> {{date('d-m-Y',strtotime($data['end_date']))}}</i></td>
                        <td>
                            <a title="Edit" class=" btn btn-success mr-1"
                            href="{{ route('employees.leave.edit',$data['id']) }}"> <i class="fas fa-pencil-alt"></i></a>
                            <a target="_blank" title="Details" class=" btn btn-info mr-1"
                            href="{{ route('employees.leave.details',$data['id']) }}"> <i class="fas fa-print    "></i> </a>
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
