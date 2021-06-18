@extends('backend.layouts.master')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage Employee Monthly Salary</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Employee Monthly Salary</li>
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
                <h5>  <i class="fas fa-calendar-check    "></i> Select Date
                </h5>
                </div>
                
                
                
                <div class="card-body">
                    <div class="form-row col-md-4">
                        <label for="date" class="control-label">Date</label>
                        <input type="date" name="date" id="date" class="form-control form-control-sm"   >
                    </div>
                    <div class="form-gorup col-md-2">
                        <a class="btn btn-sm btn-success" id="searchMonthlySalary" style="margin-top: 29px; color:white">Search</a>
                    </div>
                </div>




                <div class="card-body">
                    <div id="DocumentResults"></div>
                    <script id="document-template" type="text/x-handlebars-template">
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
                    </script>
                </div>
            </div>
          </section>
        </div>
      </div>
    </section>
  </div>


</script>
<script type="text/javascript">
  $(document).on('click','#searchMonthlySalary', function(){
  var date = $('#date').val()
  if(date == ''){
    $.notify("Month Required", {
                    globalPosition: 'top right',
                    className: 'error'
                });
                return false;
  }
  $.ajax({
    url: 'get',
    type: 'get',
    data:{date:date},
    beforeSend: function(){

    },
    success: function(data){
      var source = $("#document-template").html()
      var template = Handlebars.compile(source)
      var html = template(data)
      $('#DocumentResults').html(html);
      $('[data-toggle="tooltip"]').tooltip();
    }
  });
});
</script>
@endsection
