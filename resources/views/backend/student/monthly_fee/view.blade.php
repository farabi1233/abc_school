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
                                    Student Monthly Fee
                                    
                                </h4>
                            </div><!-- /.card-header -->

                            <div class="card-body">
                                <div class="tab-content p-0">
                                    <!-- Morris chart - Sales -->
                                   
                                        <div class="form-row">
                                            <div class="form-group col-md-3">
                                                <label for="">Year <font style="color: red;">*</font></label>
                                                <select class="form-control  form-control-sm" id="year_id" name="year_id">
                                                    <option value="">Select Year</option>
                                                    @foreach ($years as $year)
                                                        <option value="{{ $year->id }}">
                                                            {{ $year->name }}
                                                        </option>
                                                    @endforeach

                                                </select>
                                            </div>

                                            <div class="form-group col-md-3">
                                                <label for="">Class <font style="color: red;">*</font></label>
                                                <select class="form-control  form-control-sm" id="class_id" name="class_id">
                                                    <option value="">Selsect Class</option>
                                                    @foreach ($classes as $class)
                                                        <option value="{{ $class->id }}">
                                                            {{ $class->name }}</option>
                                                    @endforeach

                                                </select>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <div class="form-group">
                                                    <label for="">Month <font style="color: red;">*</font></label>
                                                    <select name="month" id="month" class="form-control  form-control-sm">
                                                        <option  value="">Select Month</option>
                                                        <option  value="January">January</option>
                                                        <option  value="February">February</option>
                                                        <option  value="March">March</option>
                                                        <option  value="April">April</option>
                                                        <option  value="May">May</option>
                                                        <option  value="June">June</option>
                                                        <option  value="July">July</option>
                                                        <option  value="August">August</option>
                                                        <option  value="September">September</option>
                                                        <option  value="October">October</option>
                                                        <option  value="November">November</option>
                                                        <option  value="December">December</option>
                                                    </select>
                                                 </div>
                                            </div>

                                            <div class="form-group col-md-3 ">
                                                <div class="form-group col-md-6 form-control-sm "
                                                    style="padding-top: 30px;">


                                                    <a id="search" class="btn btn-sm btn-success" name="search">Search

                                                    </a>



                                                </div>
                                            </div>

                                        </div>
                                 </div>
                            </div><!-- /.card-body -->


                            <div class="card-body">
                                <div id="DocumentResults"></div>
                                    <script id="document-template" type="text/x-handlebars-template">
                                        <table class="table-sm table-bordered table striped" style="width: 100%">
                                            <thead>
                                                <tr>
                                                    @{{{thsource}}}
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @{{#each this}}
                                                <tr>
                                                  @{{{tdsource}}}
                                                </tr>
                                                @{{/each}}
                                            </tbody>
                                        </table>
                                    </script>
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

    <script type="text/javascript">
        $(document).on('click', '#search', function(e) {
            e.preventDefault()
            var year_id = $("#year_id").val();
            var class_id = $("#class_id").val();
            var month= $("#month").val();
            if (year_id == "") {
                $.notify("Class Required", {
                    globalPosition: 'top right',
                    className: 'error'
                });
                return false;
            }
            if (class_id == "") {
                $.notify("Class Required", {
                    globalPosition: 'top right',
                    className: 'error'
                });
                return false;
            }
            if (month == "") {
                $.notify("Month Required", {
                    globalPosition: 'top right',
                    className: 'error'
                });
                return false;
            }
            $.ajax({
    url: "{{ route('students.monthly_fee.get-student') }}",
    type:"GET",
    data: {'year_id':year_id,'class_id':class_id,'month':month},
    beforeSend: function() {

    },
    success: function(data){
      var source = $("#document-template").html();
      var template = Handlebars.compile(source);
      var html = template(data);
      $('#DocumentResults').html(html);
      $('[data-toggle="tooltip"]').tooltip();
    }
  });
           
        });

    </script>











@endsection
