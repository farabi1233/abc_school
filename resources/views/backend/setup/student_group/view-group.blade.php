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
                                View Studetn Group


                                <a class=" btn btn-success float-right" href="{{ route('setups.student.group.add')}}"> <i class="fa fa-plus-circle"></i> Add Group</a>


                            </h4>




                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content p-0">
                                <!-- Morris chart - Sales -->



                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>SL.</th>
                                            <th>Group Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach($allData as $key => $group)
                                        <tr>
                                            <td>{{ $key+1 }}</td>


                                            
                                            <td>{{ $group->name}}</td>
                                           

                                            <td>
                                                <a class="btn btn-sm btn-primary" href="{{ route('setups.student.group.edit',$group->id)}}"> <i class="fa fa-edit"></i>Edit</a>
                                                <a class="btn btn-sm btn-danger" id="delete" href="{{ route('setups.student.group.delete',$group->id)}}"> <i class="fa fa-trash"></i>Delete</a>
                                            </td>



                                        </tr>

                                        @endforeach


                                    </tbody>

                                </table>













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
@endsection