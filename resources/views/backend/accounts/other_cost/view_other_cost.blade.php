@extends('backend.layouts.master')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage Other Cost</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Other Cost</li>
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
                <h5>  <i class="fas fa-list mr-1"></i> Other Cost List
                    <a href="{{ route('accounts.cost.add') }}">
                    <button type="button" class="btn btn-info float-right btn-sm"> <i class="fas fa-plus mr-1"></i> Add/Edit Other Cost</button></a>
                </h5>
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th>SL.</th>
                        <th>Date</th>
                        <th>Amount</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Action</th>
                      </tr>
                      </thead>
                      <tbody>
                    @foreach($allData as $key => $data)
                      <tr class="{{ $data['id']}} ">
                        <td>{{$key+1}}</td>
                        <td>{{ date('d-m-Y', strtotime($data['date'])) }}</td>
                        <td>{{(int)$data['amount'] }} ৳</td>
                        <td>{{$data['description']}}</td>
                        <td> <img src="{{ (empty($data['image']))?asset('upload/not_found.png'):asset(''.$data['image'])}}" class="img-fluid" style="height: 80px; width:80px;" alt=""> </td>
                        <td>
                            <a title="Edit" class=" btn btn-info mr-1"
                            href="{{ route('accounts.cost.edit',$data['id']) }}"> <i class="fas fa-pencil-alt"></i></a>
                            <a title="Delete" id="delete" class="confirmDelete  btn btn-danger"
                            href="{{ route('accounts.cost.delete') }}" data-token="{{ csrf_token() }}" data-id="{{ $data['id'] }}"><i class="fas fa-trash"></i></a>
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
