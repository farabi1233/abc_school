@extends('backend.layouts.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Manage Marks Entry</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Marks Edit</li>
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
                                <h3> <i class="fas fa-search"></i> Search Criteria
                                </h3>
                            </div>

                            <div class="card-body">
                                <form method="post" action="{{ route('marks.update') }}" id="marksForm" name="marksForm">
                                    @csrf
                                    <div class="form-row">

                                        <div class="col-md-2 col-sm-2">
                                            <div class="form-group">
                                                <label class="col-form-label">Academic Year</label>
                                                <select name="year_id" id="year_id" class="form-control">
                                                    <option value="">Select Academic Year</option>
                                                    @foreach ($years as $year)
                                                        <option value="{{ $year['id'] }}">{{ $year['name'] }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-2 col-sm-2">
                                            <div class="form-group">
                                                <label class="col-form-label">Class</label>
                                                <select name="class_id" id="class_id" class="form-control">
                                                    <option value="">Select Student Class</option>
                                                    @foreach ($classes as $class)
                                                        <option value="{{ $class['id'] }}">{{ $class['name'] }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-2 col-sm-2">
                                            <div class="form-group">
                                                <label class="col-form-label">Subject</label>
                                                <select name="assign_subject_id" id="assign_subject_id"
                                                    class="form-control">
                                                    <option value="">Select Subject</option>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-3">
                                            <div class="form-group">
                                                <label class="col-form-label">Exam Types</label>
                                                <select name="exam_type_id" id="exam_type_id" class="form-control">
                                                    <option value="">Select Exam Type</option>
                                                    @foreach ($exam_types as $exam)
                                                        <option value="{{ $exam['id'] }}">{{ $exam['name'] }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-3 col-sm-3">
                                            <div class="form-group" style="margin-top: 37px">
                                                <button class="btn btn-dark" name="searchMarksEntry" id="searchMarksEntry">
                                                    <i class="fas fa-search-plus"></i> Search</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row d-none" id="marks_entry">
                                        <div class="col-md-12">
                                            <table class="table table-bordered table-striped dt-responsive"
                                                style="width: 100%">
                                                <thead>
                                                    <tr>
                                                        <th>ID No</th>
                                                        <th>Student Name</th>
                                                        <th>Gender</th>
                                                        <th>Father's Name</th>
                                                        <th>Marks</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="marks_entry_tr">
                                                </tbody>
                                            </table>

                                            <div class="form-row">
                                                <div class="col-12 col-md-4 col-sm-4" style="margin-top: 20px">
                                                    <button type="submit" class="btn btn-success">Update</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </form>
                            </div>

                        </div>
                    </section>
                </div>
            </div>
        </section>
    </div>


    <script type="text/javascript">
        $(function() {
            $(document).on('change', '#class_id', function() {
                var class_id = $('#class_id').val();

                $.ajax({
                    url: "{{ route('get-subject') }}",
                    type: 'GET',
                    data: {
                        'class_id': class_id
                    },
                    success: function(data) {
                        var html = '<option value = "">Select Subject</option>';
                        $.each(data, function(key, v) {
                            html += '<option value = "' + v.id + '">' + v
                                .student_subject.name + '</option>';
                        });
                        $('#assign_subject_id').html(html)
                    }
                })
            })

        });

    </script>


    <script type="text/javascript">
        $(document).on('click', '#searchMarksEntry', function(e) {
            e.preventDefault()
            var year_id = $("#year_id").val();
            var class_id = $("#class_id").val();
            var assign_subject_id = $("#assign_subject_id").val();
            var exam_type_id = $('#exam_type_id').val();
            if (year_id == "") {
                $.notify("Year Required", {
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
            if (assign_subject_id == "") {
                $.notify("Subject Required", {
                    globalPosition: 'top right',
                    className: 'error'
                });
                return false;
            }
            if (exam_type_id == "") {
                toastr.error('Please select Exam Type', 'Error');
            }
            $.ajax({
                url: "{{ route('get-student-marks') }}",
                type: "GET",
                data: {
                    year_id: year_id,
                    class_id: class_id,
                    assign_subject_id: assign_subject_id,
                    exam_type_id: exam_type_id
                },
                success: function(data) {
                    $("#marks_entry").removeClass('d-none');
                    var html = '';
                    $.each(data, function(key, v) {
                        html +=
                            '<tr>' +
                            '<td>' + v.student.id_no +
                            '<input type="hidden" name="student_id[]" value="' + v.student_id +
                            '"><input type="hidden" name="id_no[]" value="' + v.student.id_no +
                            '"></td>' +
                            '<td>' + v.student.name + '</td>' +
                            '<td>' + v.student.gender + '</td>' +
                            '<td>' + v.student.fname + '</td>' +
                            '<td><input type="text" class="form-control form-control-sm" name="marks[]" value="' + v.marks +
                            '"></td>' +
                            '</tr>';
                    });
                    html = $('#marks_entry_tr').html(html)
                }
            });
        });

    </script>

@endsection
