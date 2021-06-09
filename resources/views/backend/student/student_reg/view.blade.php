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
                                    Student List
                                    <a class=" btn btn-success float-right"
                                        href="{{ route('students.registration.add') }}"> <i class="fa fa-plus-circle"></i>
                                        Add Student</a>
                                </h4>
                            </div><!-- /.card-header -->

                            <div class="card-body">
                                <div class="tab-content p-0">
                                    <!-- Morris chart - Sales -->
                                    <form method="GET" id="myForm" action="{{ route('students.year.class.wise') }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label for="">Year <font style="color: red;">*</font></label>
                                                <select class="form-control  form-control-sm" name="year_id">
                                                    <option value="">Select Year</option>
                                                    @foreach ($years as $year)
                                                        <option value="{{ $year->id }}"
                                                            {{ @$year_id == $year->id ? 'selected' : '' }}>
                                                            {{ $year->name }}
                                                        </option>
                                                    @endforeach

                                                </select>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="">Class <font style="color: red;">*</font></label>
                                                <select class="form-control  form-control-sm" name="class_id">
                                                    <option value="">Selsect Class</option>
                                                    @foreach ($classes as $class)
                                                        <option value="{{ $class->id }}"
                                                            {{ @$class_id == $class->id ? 'selected' : '' }}>
                                                            {{ $class->name }}</option>
                                                    @endforeach

                                                </select>
                                            </div>

                                            <div class="form-group col-md-4 ">
                                                <div class="form-group col-md-6 form-control-sm "
                                                    style="padding-top: 30px;">

                                                    <button type="submit" name="search" class="btn btn-primary btn-sm">
                                                        Search </button>
                                                    <a class="btn btn-sm btn-success"
                                                        href="{{ route('students.registration.download') }}">
                                                        <i class="fa fa-arrow-right"></i>
                                                    </a>



                                                </div>
                                            </div>

                                        </div>
                                    </form>








                                </div>
                            </div><!-- /.card-body -->


                            <div class="card-body">




                                <div class="tab-content p-0">
                                    @if (!@$search)
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th width="7%">SL.</th>
                                                    <th>Name</th>
                                                    <th>ID NO</th>
                                                    <th>Roll</th>
                                                    <th>Year</th>
                                                    <th>Class</th>
                                                    <th>Image</th>
                                                    @if (Auth::User()->role == 'Admin')
                                                        <th>Code</th>
                                                    @endif


                                                    <th width="12%">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($allData as $key => $value)
                                                    <tr>
                                                        <td>{{ $key + 1 }}</td>
                                                        <td>{{ $value['student']['name'] }}</td>
                                                        <td>{{ $value['student']['id_no'] }}</td>
                                                        <td>{{ $value->roll }}</td>
                                                        <td>{{ $value['student_year']['name'] }} </td>
                                                        <td>{{ $value['student_class']['name'] }}</td>

                                                        <td><img id="showImage"
                                                                src="{{ !empty($value['student']['image']) ? url('upload/student_images/' . $value['student']['image']) : url('upload/no_image.jpg') }}"
                                                                alt=""
                                                                style="width:75px; height:80px; border: 1px solid black #00">
                                                        </td>
                                                        @if (Auth::User()->role == 'Admin')
                                                            <td>{{ $value['student']['code'] }}</td>
                                                        @endif
                                                        <td>

                                                            <a target="_blank" class="btn btn-sm btn-primary"
                                                                href="{{ route('students.registration.details', $value->student_id) }}">
                                                                <i class="fa fa-eye"></i>
                                                            </a>
                                                            <a class="btn btn-sm btn-primary"
                                                                href="{{ route('students.registration.edit', $value->student_id) }}">
                                                                <i class="fa fa-edit"></i>
                                                            </a>
                                                            <a class="btn btn-sm btn-success"
                                                                href="{{ route('students.registration.promotion', $value->student_id) }}">
                                                                <i class="fa fa-arrow-right"></i>
                                                            </a>

                                                        </td>



                                                    </tr>

                                                @endforeach


                                            </tbody>

                                        </table>
                                    @else
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th width="7%">SL.</th>
                                                    <th>Name</th>
                                                    <th>ID NO</th>
                                                    <th>Roll</th>
                                                    <th>Year</th>
                                                    <th>Class</th>
                                                    <th>Code</th>
                                                    @if (Auth::User()->role == 'Admin')

                                                    @endif

                                                    <th>Image</th>
                                                    <th width="12%">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($allData as $key => $value)
                                                    <tr>
                                                        <td>{{ $key + 1 }}</td>
                                                        <td>{{ $value['student']['name'] }}</td>
                                                        <td>{{ $value['student']['id_no'] }}</td>
                                                        <td>{{ $value->roll }}</td>
                                                        <td>{{ $value['student_year']['name'] }} </td>
                                                        <td>{{ $value['student_class']['name'] }}</td>

                                                        <td><img id="showImage"
                                                                src="{{ !empty($value['student']['image']) ? url('upload/student_images/' . $value['student']['image']) : url('upload/no_image.jpg') }}"
                                                                alt=""
                                                                style="width:75px; height:80px; border: 1px solid black #00">
                                                        </td>
                                                        @if (Auth::User()->role == 'Admin')
                                                            <td>{{ $value['student']['code'] }}</td>
                                                        @endif
                                                        <td>

                                                            <a target="_blank" class="btn btn-sm btn-primary"
                                                                href="{{ route('students.registration.details', $value->student_id) }}">
                                                                <i class="fa fa-eye"></i>
                                                            </a>
                                                            <a class="btn btn-sm btn-primary"
                                                                href="{{ route('students.registration.edit', $value->student_id) }}">
                                                                <i class="fa fa-edit"></i>
                                                            </a>
                                                            <a class="btn btn-sm btn-success"
                                                                href="{{ route('students.registration.promotion', $value->student_id) }}">
                                                                <i class="fa fa-arrow-right"></i>
                                                            </a>

                                                        </td>



                                                    </tr>

                                                @endforeach


                                            </tbody>

                                        </table>


                                    @endif













                                </div>
                            </div><!-- /.card-body -->




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



    <script type="text/javascript">
        $(document).ready(function() {
            $('#myForm').validate({
                rules: {

                    "year_id": {
                        required: true,

                    },
                    "class_id": {
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
