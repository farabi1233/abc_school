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
                <h5>  <i class="fas fa-list mr-1"></i> Employee Salary List
                    <a href="{{ route('accounts.salary.add') }}">
                    <button type="button" class="btn btn-info float-right btn-sm"> <i class="fas fa-plus mr-1"></i> Add/Edit Employee Salary</button></a>
                </h5>
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th>SL.</th>
                        <th>ID No</th>
                        <th>Employee Name</th>
                        <th>Amount</th>
                        <th>Date</th>
                      </tr>
                      </thead>
                      <tbody>
                    @foreach($allData as $key => $data)
                      <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$data['user']['id_no']}}</td>
                        <td>{{$data['user']['name']}}</td>
                        <td>{{(int)$data['amount'] }} ৳</td>
                        <td>{{ date('M Y', strtotime($data['date'])) }}</td>
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
