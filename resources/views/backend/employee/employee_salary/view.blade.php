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
                    <a href="{{ route('employees.registration.add') }}">
                    <button type="button" class="btn btn-info float-right btn-sm"> <i class="fas fa-plus mr-1"></i> Add Employee</button></a>
                </h3>
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th>SL.</th>
                        <th>ID No</th>
                        <th>Designation</th>
                        <th>Name</th>
                        <th>Mobile No</th>
                        <th>Gender</th>
                        <th>Joined Date</th>
                        <th>Salary</th>
                        <th>Image</th>
                        <th>Action</th>
                      </tr>
                      </thead>
                      <tbody>
                    @foreach($allData as $key => $data)
                      <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$data['id_no']}}</td>
                        @php
                            $designation = App\Model\Designation::where('id',$data['designation_id'])->first();
                        @endphp
                        <td>{{$designation['name']}}</td>
                        <td>{{$data['name']}}</td>
                        <td>{{$data['mobile']}}</td>
                        <td>{{$data['gender']}}</td>
                        <td>{{date('d-m-Y'),strtotime($data['join_date'])}}</td>
                        <td>{{$data['salary']}}</td>
                        <td> <img id="showImage"
                          src="{{ !empty($data['image']) ? url('upload/employee_images/' . $data['image']) : url('upload/no_image.jpg') }}"
                          alt=""
                          style="width:75px; height:80px; border: 1px solid black #00"></td> 
                        <td>
                            <a title="Salary Increment" class=" btn btn-success mr-1"
                            href="{{ route('employees.salary.increment',$data['id']) }}"> <i class="fas fa-hand-holding-usd"></i> </a>
                            <a target="_blank" title="Salary Log" class=" btn btn-info mr-1"
                            href="{{ route('employees.salary.log',$data['id']) }}"> <i class="fas fa-file-invoice-dollar"></i> </a>
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
