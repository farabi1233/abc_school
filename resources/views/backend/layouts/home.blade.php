@extends('backend.layouts.master')
@section('content')
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
   
    <section class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-6">
                <div class="small-box bg-info">
                  <div class="inner">
                    <h3>{{ $all_users }}</h3>
                    <p>Total Users</p>
                  </div>
                  <div class="icon">
                    <i class="fas fa-users"></i>
                  </div>
                  <a href="{{ route('users.view') }}" class="small-box-footer" target="_blank">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{ $all_admins }}</h3>
                <p>Total Admins</p>
              </div>
              <div class="icon">
                <i class="fas fa-user-shield"></i>
              </div>
              <a href="{{ route('users.view') }}" class="small-box-footer" target="_blank">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{ $all_employees }}</h3>
                <p>Total Employees</p>
              </div>
              <div class="icon">
                <i class="fas fa-user-tie"></i>
              </div>
              <a href="{{ route('employees.registration.view') }}" class="small-box-footer"  target="_blank">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          
          <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{ $all_students }}</h3>

                <p>Total Students</p>
              </div>
              <div class="icon">
                <i class="fas fa-user-graduate"></i>
              </div>
              <a href="{{ route('students.registration.view') }}" class="small-box-footer"  target="_blank">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
         
        </div>
        <div class="row">
          <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
              <div class="inner">
                <h3><i class="fas fa-link"></i></h3>
                <p>Monthly/Yearly Profit</p>
              </div>
              <div class="icon">
                <i class="fas fa-hand-holding-usd"></i>
              </div>
              {{-- <a href="{{ route('reports.profit.view') }}" class="small-box-footer" target="_blank">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><i class="fas fa-link"></i></h3>
                <p>Marksheet Generate</p>
              </div>
              <div class="icon">
                <i class="far fa-file-alt"></i>
              </div>
              {{-- <a href="{{ route('reports.marksheet.view') }}" class="small-box-footer"  target="_blank">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><i class="fas fa-link"></i></h3>

                <p>Attendance Report</p>
              </div>
              <div class="icon">
                <i class="fas fa-file-signature"></i>
              </div>
              {{-- <a href="{{ route('reports.attendance.view') }}" class="small-box-footer"  target="_blank">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
              <div class="inner">
                <h3><i class="fas fa-link"></i></h3>
                <p>Student ID Card</p>
              </div>
              <div class="icon">
                <i class="fas fa-id-card"></i>
              </div>
              {{-- <a href="{{ route('reports.id_card.view') }}" class="small-box-footer" target="_blank">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box shadow-lg">
              <span class="info-box-icon bg-danger"><i class="fas fa-user-check"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Add User/Admin</span>
                <a href="{{ route('users.add') }}" class="small-box-footer" target="_blank">Click here <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box shadow-lg">
              <span class="info-box-icon bg-danger"><i class="fas fa-chalkboard-teacher"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Employee Registration</span>
                <a href="{{ route('employees.registration.add') }}" class="small-box-footer" target="_blank">Click here <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box shadow-lg">
              <span class="info-box-icon bg-danger"><i class="fas fa-file-signature"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Marks Entry</span>
                <a href="{{ route('marks.add') }}" class="small-box-footer" target="_blank">Click here <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box shadow-lg">
              <span class="info-box-icon bg-danger"><i class="fas fa-file-contract"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Employee Attendence</span>
                <a href="{{ route('employees.attendance.add') }}" class="small-box-footer" target="_blank">Click here <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
          </div>
          
        </div>
        <div class="row">
            <div class="col-md-3 col-sm-6 col-12">
              <div class="info-box shadow-lg">
                <span class="info-box-icon bg-danger"><i class="fas fa-user-check"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Student Registration</span>
                  <a href="{{ route('students.registration.add') }}" class="small-box-footer" target="_blank">Click here <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-sm-6 col-12">
              <div class="info-box shadow-lg">
                <span class="info-box-icon bg-danger"><i class="fas fa-chalkboard-teacher"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Employee Registration</span>
                  <a href="{{ route('employees.registration.add') }}" class="small-box-footer" target="_blank">Click here <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-sm-6 col-12">
              <div class="info-box shadow-lg">
                <span class="info-box-icon bg-danger"><i class="fas fa-file-signature"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Marks Entry</span>
                  <a href="{{ route('marks.add') }}" class="small-box-footer" target="_blank">Click here <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-sm-6 col-12">
              <div class="info-box shadow-lg">
                <span class="info-box-icon bg-danger"><i class="fas fa-file-contract"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Employee Attendence</span>
                  <a href="{{ route('employees.attendance.add') }}" class="small-box-footer" target="_blank">Click here <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
            </div>
            
          </div>
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-12 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-chart-pie mr-1"></i>
                  Activity
                </h3>
                <div class="card-tools">
                 
                </div>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content p-0">
                  <!-- Morris chart - Sales -->
                  <h6>No activity found!</h6>
                </div>
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </section>
          <!-- /.Left col -->
        </div>
      </div>
    </section>
  </div>
@endsection
