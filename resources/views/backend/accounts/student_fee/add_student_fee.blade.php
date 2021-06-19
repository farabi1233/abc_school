@extends('backend.layouts.master')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage Students Fee</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Students Fee</li>
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
                <h5><i class="fas fa-plus mr-1"></i>  Add/Edit Students Fee
                    <a href="{{ route('accounts.fee.view') }}">
                    <button type="button" class="btn btn-info float-right btn-sm"> <i class="fas fa-list mr-1"></i> Students Fee List</button></a>
                </h5>
                </div>
                <div class="card-body">
                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <label for="year_id">Academic Year</label>
                            <select name="year_id" id="year_id" class="form-control">
                                <option value="">Select Year</option>
                                @foreach ($years as $year)
                                    <option value="{{$year->id}}">{{$year->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="class_id">Class</label>
                            <select name="class_id" id="class_id" class="form-control">
                                <option value="">Select Class</option>
                                @foreach ($classes as $class)
                                    <option value="{{$class->id}}">{{$class->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="fee_category_id">Fee Type</label>
                            <select name="fee_category_id" id="fee_category_id" class="form-control">
                                <option value="">Select Fee Type</option>
                                @foreach ($fee_categories as $fee)
                                    <option value="{{$fee->id}}">{{$fee->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="year_id">Date</label>
                            <input type="date" name="date" id="date" class="form-control" >
                        </div>
                        <div class="form-group col-md-2" style="margin-top: 30px;">
                            <button id="searchStudentFee" name="searchStudentFee" type="submit" class="btn btn-info"> <i class="fas fa-search  nav-icon"></i> Search</button>
                        </div>
                    </div>
                </div>
      
      
                <div class="card-body">
                    <div id="DocumentResults"></div>.
                    <script id="document-template" type="text/x-handlebars-template">
                        <form action="{{ route('accounts.fee.store') }}" method="post">@csrf
                            <table class="table-sm table-bordered table-striped" style="width: 100%">
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
                            <button type="submit" class="btn btn-success" style="margin-top: 15px;">Submit</button>
                        </form>
                    </script>
                </div>
            </div>
          </section>
        </div>
      </div>
    </section>
  </div>



  <script type="text/javascript">

    $(document).on('click','#searchStudentFee', function(e){
      e.preventDefault()
      var year_id = $("#year_id").val();
      var class_id = $("#class_id").val();
      var fee_category_id = $("#fee_category_id").val();
      var date = $('#date').val();
      if(year_id == ""){
        $.notify("Year Required", {
                    globalPosition: 'top right',
                    className: 'error'
                });
                return false;
      }
      if(class_id == ""){
        $.notify("Class Required", {
                    globalPosition: 'top right',
                    className: 'error'
                });
                return false;
      }
      if(fee_category_id == ""){
        $.notify("Fee Category Required", {
                    globalPosition: 'top right',
                    className: 'error'
                });
                return false;
      }
      if(date == ""){
        $.notify("Date Required", {
                    globalPosition: 'top right',
                    className: 'error'
                });
                return false;
      }
      $.ajax({
        url: "getstudent",
        type:"GET",
        data: {year_id:year_id,class_id:class_id,fee_category_id:fee_category_id,date:date},
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
