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
                <h5><i class="fas fa-plus mr-1"></i>  {{(!empty($editData))?'Edit Grade Point':'Add Grade Point'}}
                    <a href="{{ route('marks.grade.view') }}">
                    <button type="button" class="btn btn-info float-right btn-sm"> <i class="fas fa-list mr-1"></i> Grade Point List</button></a>
                </h5>
                </div>
                <form action="{{ (@$editData) ? route('marks.grade.update',$editData['id']) : route('marks.grade.store')  }}" method="post" id="addGradePointForm">@csrf
                  <div class="card-body">
                    <div class="form-row">
                      <div class="form-group col-md-4">
                        <label for="Grade Name">Grade Name</label>
                        <input type="text" name="grade_name" value="{{@$editData->grade_name}}" class="form-control" required>
                      </div>
                      <div class="form-group col-md-4">
                        <label for="Grade Name">Grade Point</label>
                        <input type="text" name="grade_point" value="{{@$editData->grade_point}}" class="form-control" required>
                      </div>
                      <div class="form-group col-md-4">
                        <label for="Grade Name">Start Marks</label>
                        <input type="text" name="start_marks" value="{{@$editData->start_marks}}" class="form-control" required>
                      </div>
                      <div class="form-group col-md-4">
                        <label for="Grade Name">End Marks</label>
                        <input type="text" name="end_marks" value="{{@$editData->end_marks}}" class="form-control" required>
                      </div>
                      <div class="form-group col-md-4">
                        <label for="Grade Name">Start Point</label>
                        <input type="text" name="start_point" value="{{@$editData->start_point}}" class="form-control" required>
                      </div>
                      <div class="form-group col-md-4">
                        <label for="Grade Name">End Point</label>
                        <input type="text" name="end_point" value="{{@$editData->end_point}}" class="form-control" required>
                      </div>
                      <div class="form-group col-md-4">
                        <label for="Grade Name">Remarks</label>
                        <input type="text" name="remarks" value="{{@$editData->remarks}}" class="form-control" required>
                      </div>
                    </div>
                  </div>
                  <div class="card-footer">
                    <button type="submit" class="btn btn-success">{{(@$editData) ? 'Update' : ' Submit'}}</button>
                  </div>
                </form>
            </div>
          </section>
        </div>
      </div>
    </section>
  </div>
@endsection
