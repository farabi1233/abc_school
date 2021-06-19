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
                <h5><i class="fas fa-plus mr-1"></i>  Add/Edit Employee Salary
                    <a href="{{ route('accounts.salary.view') }}">
                    <button type="button" class="btn btn-info float-right btn-sm"> <i class="fas fa-list mr-1"></i> Employee Salary List</button></a>
                </h5>
                </div>
                <div class="card-body">
                    <div class="form-row">
                        <div class="col-md-4">
                            <label for="date" class="control-label">Date</label>
                            <input type="date" name="date" id="date" class="form-control form-control-sm">
                        </div>
                        <div class="col-md-3">
                            <a class="btn btn-sm btn-success" id="searchEmployeeSalary" style="margin-top: 30px; color:white">
                              <i class="fas fa-search nav-icon"></i>  Search</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div id="DocumentResults"></div>.
                    <script id="document-template" type="text/x-handlebars-template">
                        <form action="{{ route('accounts.salary.store') }}" method="post">@csrf
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
@endsection
