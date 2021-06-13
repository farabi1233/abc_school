@extends('backend.layouts.master')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage Grade Point</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Grade Point</li>
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
                <h3>  <i class="fas fa-list mr-1"></i> Grade Point List
                    <a href="{{ route('marks.grade.add') }}">
                    <button type="button" class="btn btn-info float-right btn-sm"> <i class="fas fa-plus mr-1"></i> Add Grade Point</button></a>
                </h3>
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th>SL.</th>
                        <th>Grade Name</th>
                        <th>Grade Point</th>
                        <th>Marks Range</th>
                        <th>Point Range</th>
                        <th>Remarks</th>
                        <th>Action</th>
                      </tr>
                      </thead>
                      <tbody>
                    @foreach($allData as $key => $data)
                      <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$data['grade_name']}}</td>
                        <td>{{number_format((float)$data['grade_point'],2)}}</td>
                        <td>{{$data['start_marks']}} - {{$data['end_marks']}}</td>
                        <td>{{number_format((float)$data['start_point'],2)}} - {{number_format((float)$data['end_point'],2)}}</td>
                        <td>{{$data['remarks']}}</td>
                        <td>
                            <a title="Edit" class=" btn btn-success mr-1"
                            href="{{ route('marks.grade.edit',$data['id']) }}"> <i class="fas fa-pencil-alt"></i></a>
                        </td>
                      </tr>
                    @endforeach
                    </table>
                </div>
            </div>
          </section>
        </div>
      </div>
    </section>
  </div>
@endsection
