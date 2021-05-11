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
                                Edit Fee Ammount
                                @else
                                Add Fee Ammount
                                @endif
                                <a class=" btn btn-success float-right" href="{{ route('setups.student.fee.ammount.view')}}"> <i class="fa fa-plus-circle"></i> Fee ammount list</a>

                            </h4>

                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content p-0">


                                <form method="POST" action="{{route('setups.student.fee.ammount.update',$editData[0]->fee_category_id)}} " id="myForm" enctype="multipart/form-data">
                                    @csrf
                                    <div class="add_item">



                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label for="">Fee Category</label>
                                                <select class="form-control" name="fee_category_id">
                                                    <option value="">Select fee Category</option>
                                                    @foreach($fee_categories as $category)
                                                    <option value="{{$category->id}}" {{($editData['0']->fee_category_id == $category->id)?"selected":""}}>{{$category->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>


                                        @foreach($editData as $edit)
                                        <div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label for="">Class</label>
                                                <select class="form-control" name="class_id[]">
                                                    
                                                    @foreach($classes as $class)
                                                    <option value="{{$class->id}}" {{($edit->class_id == $class->id)?"selected":""}}>{{$class->name}}</option>
                                                    @endforeach

                                                </select>
                                            </div>


                                            <div class="form-group col-md-4">
                                                <label for="image">Fee Ammount</label>
                                                <input type="text" value="{{$edit->ammount}}" name="ammount[]" class="form-control" required>

                                            </div>


                                            <div class="form-group col-md-1" style="padding-top: 30px;">
                                                <span class="btn btn-success addeventmore"> <i class="fa fa-plus-circle"></i></span>
                                                <span class="btn btn-danger removeeventmore"> <i class="fa fa-minus-circle"></i></span>
                                            </div>
                                            </div>

                                        </div>
                                        @endforeach
                                    </div>
                                    <div class="form-group col-md-6 " style="padding-top: 60px;">

                                        <button type="submit" value="Submit" class="btn btn-primary">
                                            {{(@$editData)?'Update':'Submit'}} </button>
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

<div style="visibility: hidden;">
    <div class="whole_extra_item_add" id="whole_extra_item_add">
        <div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="">Class</label>
                    <select class="form-control" name="class_id[]">
                        <option value="">Select Class</option>
                        @foreach($classes as $class)
                        <option value="{{$class->id}}">{{$class->name}}</option>
                        @endforeach

                    </select>
                </div>


                <div class="form-group col-md-4">
                    <label for="image">Fee Ammount</label>
                    <input type="text" name="ammount[]" class="form-control" required>

                </div>


                <div class="form-group col-md-2" style="padding-top: 30px;">
                    <span class="btn btn-success addeventmore"> <i class="fa fa-plus-circle"></i></span>
                    <span class="btn btn-danger removeeventmore"> <i class="fa fa-minus-circle"></i></span>
                </div>

            </div>
        </div>
    </div>
</div>





<script type="text/javascript">
    $(document).ready(function() {
        var counter = 0;
        $(document).on("click", ".addeventmore", function() {
            var whole_extra_item_add = $("#whole_extra_item_add").html();
            $(this).closest(".add_item").append(whole_extra_item_add);
            counter++;
        });
        $(document).on("click", ".removeeventmore", function(event) {

            $(this).closest(".delete_whole_extra_item_add").remove();
            counter -= 1;
        });

    });
</script>



<script type="text/javascript">
    $(document).ready(function() {
        $('#myForm').validate({
            rules: {
                "fee_category_id": {
                    required: true,

                },
                "class_id[]": {
                    required: true,

                },
                "ammount[]": {
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