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
                                Edit Logo
                                <a class=" btn btn-success float-right" href="{{ route('sliders.view')}}"> <i class="fa fa-plus-circle"></i> Your Slider</a>

                            </h4>




                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content p-0">
                                <!-- Morris chart - Sales -->
                                <form method="POST" action="{{ route('sliders.update',$editData->id)}}" id="myForm" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-row">
                                    <div class="form-group col-md-6">
                                            <label for="image">Short Title</label>
                                            <input type="text" name="short_title" class="form-control" id="short_title" value="{{$editData->short_title}}">

                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="image">Long Title</label>
                                            <input type="text" name="long_title" class="form-control" id="long_title" value="{{$editData->long_title}}">

                                        </div>
                                        
                                        
                                        
                                        <div class="form-group col-md-2">
                                            <img id="showImage"  src="{{(!empty($editData->image))? url('upload/slider_images/'.$editData->image):url('upload/no_image.jpg') }}" alt="" style="width:150px; height:160px; border: 1px solid black #00">
                                            
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="image">Image</label>
                                            <input type="file" name="image" class="form-control" id="image">
                                            
                                        </div>
                                        
                                        
                                        
                                        <div class="form-group col-md-6 " style="padding-top: 60px;">

                                            <input type="submit" value="Update" class="btn btn-primary">
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