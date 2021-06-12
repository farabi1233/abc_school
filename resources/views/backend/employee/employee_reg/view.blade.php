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
                                    Employee List
                                    <a class=" btn btn-success float-right"
                                        href="{{ route('employees.registration.add') }}"> <i class="fa fa-plus-circle"></i>
                                        Add Employee</a>
                                </h4>
                            </div><!-- /.card-header -->

                            
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
                                    <th>Address</th>
                                    <th>Joined Date</th>
                                    <th>Salary</th>
                                    @if (Auth::User()->role == 'Admin' || Auth::User()->role == 'SuperAdmin')
                                    <th>Password Code</th>
                                   @endif
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
                                    <td>{{$data['address']}}</td>
                                    <td>{{date('d-m-Y'),strtotime($data['join_date'])}}</td>
                                    <td>{{$data['salary']}}</td>
                                    @if (Auth::User()->role == 'Admin' || Auth::User()->role == 'SuperAdmin')
                                    <td>{{$data['code']}}</td> 
                                    @endif
                                    <td>
                                    
                                    <img id="showImage"
                                                                src="{{ !empty($data['image']) ? url('upload/employee_images/' . $data['image']) : url('upload/no_image.jpg') }}"
                                                                alt=""
                                                                style="width:75px; height:80px; border: 1px solid black #00">
                                    </td> 
                                    <td>
                                        <a title="Edit" class=" btn btn-success mr-1"
                                        href="{{ route('employees.registration.edit',$data['id']) }}"> <i class="fas fa-pencil-alt"></i></a>
                                        <a target="_blank" title="Details" class=" btn btn-info mr-1"
                                        href="{{ route('employees.registration.details',$data['id']) }}"> <i class="fas fa-print    "></i> </a>
                                    </td>
                                  </tr>
                                @endforeach
                                </table>
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





@endsection