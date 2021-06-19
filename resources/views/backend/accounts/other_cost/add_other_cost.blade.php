@extends('backend.layouts.master')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage Others Cost</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Others Cost</li>
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
                <h5><i class="fas fa-plus mr-1"></i>  {{(!empty($editData))?'Edit Others Cost':'Add Others Cost'}}
                    <a href="{{ route('accounts.cost.view') }}">
                    <button type="button" class="btn btn-info float-right btn-sm"> <i class="fas fa-list mr-1"></i> Others Cost List</button></a>
                </h5>
                </div>
                <form action="{{(!empty($editData))?route('accounts.cost.update',$editData['id']):route('accounts.cost.store')}} " enctype="multipart/form-data"  method="POST" id="defaultForm" name="defaultForm">@csrf
                    <div class="card-body">
                        <div class="form-row">
                            <div class="col-12 col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Date</label>
                                    <input type="date" id="date" name="date"  class="form-control form-control-sm "  value="{{ (!empty($editData))?$editData['date']:'' }}"
                                    required>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Amount</label>
                                    <input required  type="text" id="amount" name="amount"  class="form-control form-control-sm "  value="{{(!empty($editData))?$editData['amount']:''}}"
                                    placeholder="Enter Cost Amount">
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Description</label>
                                    <textarea required rows="6"  type="text" id="description" name="description"  class="form-control form-control-sm "
                                    placeholder="Enter Cost Description">{{(!empty($editData))? $editData['description']:''}}</textarea>
                                </div>
                            </div>
                            <div class="col-12 col-md-4 col-sm-4">
                                <div class="form-group">
                                    <label class="col-form-label">Image</label>
                                        <div class=" custom-file">
                                            <input type="file" class="custom-file-input custom-file-input-sm" name="image" id="image"  accept="image/*" >
                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                        </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-2 col-sm-2">
                                <div class="form-group" style="margin-top: 37px">
                                    <div>
                                        <img class="img-bordered" id="showImage"  src="{{ (empty($editData['image']))?asset('upload/not_found.png'):asset(''.$editData['image'])}}"
                                        width="150px" height="150px" alt="" >
                                    </div>
                                
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">{{(!empty($editData))?'Update':'Submit'}}</button>
                    </div>
                </form>
            </div>
          </section>
        </div>
      </div>
    </section>
  </div>
@endsection
