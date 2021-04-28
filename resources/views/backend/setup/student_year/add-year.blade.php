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
                                @if(isset($editData))
                                Edit Student Year
                                @else
                                Add Student Year
                                @endif
                                <a class=" btn btn-success float-right" href="{{ route('setups.student.year.view')}}"> <i class="fa fa-plus-circle"></i> Class list</a>

                            </h4>

                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content p-0">
                                <!-- Morris chart - Sales -->
                                <form method="POST" action="{{(@$editData)?route('setups.student.year.update',$editData->id):route('setups.student.year.store')}} " id="myForm" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="image">Student Year</label>
                                            <input type="text" value="{{@$editData->name}}" name="name" class="form-control" id="name" required>
                                            <font style="color: red;"> {{ ($errors->has('name'))?$errors->first(('name')):''}}</font>
                                        </div>


                                        <div class="form-group col-md-6 " style="padding-top: 60px;">

                                            <button type="submit" value="Submit" class="btn btn-primary">
                                            {{(@$editData)?'Update':'Submit'}} </button>
                                        </div>


                                    </div>

                                </form>
















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