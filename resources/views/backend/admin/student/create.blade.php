@extends('backend.layout.master')


@section('page_title', 'Add new student')
@section('dashboard_link', route('backend.admin.dashboard'))

@push('css')

@endpush

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Admission Form</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="post" action="{{ route('backend.admin.students.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label for="student_name">Student's name <span style="color: red;">*</span></label>
                                        <input type="text" name="student_name" id="student_name" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label for="student_image">Student's image</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="student_image" name="student_image">
                                                <label class="custom-file-label" for="student_image">Choose
                                                    file</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label for="course">Course <span style="color: red;">*</span></label>
                                        <select name="course" id="course" class="form-control">
                                            <option value="" selected disabled>Select course</option>
                                            @foreach($courses as $course)
                                                <option value="{{$course['id']}}">{{$course['name']}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xm-12">
                                    <div class="form-group">
                                        <label for="student_batch">Student's Batch  <span style="color: red;">*</span></label>
                                        <input type="text" name="student_batch" id="student_batch" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label for="father_name">Father's name  <span style="color: red;">*</span></label>
                                        <input type="text" name="father_name" id="father_name" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label for="mother_name">Mother's name  <span style="color: red;">*</span></label>
                                        <input type="text" name="mother_name" id="mother_name" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label for="father_occupation">Father's occupation</label>
                                        <input type="text" name="father_occupation" id="father_occupation"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label for="permanent_address">Permanent address  <span style="color: red;">*</span></label>
                                        <input type="text" name="permanent_address" id="permanent_address"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label for="p_state">State <span style="color: red;">*</span></label>
                                        <input type="text" name="p_state" id="p_state" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label for="p_pin_code">Pin code <span style="color: red;">*</span></label>
                                        <input type="text" name="p_pin_code" id="p_pin_code" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label for="telephone">Telephone</label>
                                        <input type="text" name="telephone" id="telephone" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label for="fax">Fax</label>
                                        <input type="text" name="fax" id="fax" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label for="mobile">Mobile  <span style="color: red;">*</span></label>
                                        <input type="text" name="mobile" id="mobile" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label for="email">Email  <span style="color: red;">*</span></label>
                                        <input type="email" name="email" id="email" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label for="correspondence_address">Correspondence address</label>
                                        <input type="text" name="correspondence_address" id="correspondence_address"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label for="c_state">State</label>
                                        <input type="text" name="c_state" id="c_state" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label for="c_pin_code">Pin code</label>
                                        <input type="text" name="c_pin_code" id="c_pin_code" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label for="date_of_birth">Date of birth <span style="color: red;">*</span></label>
                                        <input type="date" name="date_of_birth" id="date_of_birth" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label for="nationality">Nationality <span style="color: red;">*</span></label>
                                        <input type="text" name="nationality" id="nationality" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label for="sex">Sex <span style="color: red;">*</span></label>
                                        <select name="sex" id="sex" class="form-control">
                                            <option value="" selected disabled>Select sex</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                            <option value="Others">Others</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label for="physical_challenges">Physical Challenges (if any, please
                                            specify)</label>
                                        <input type="text" name="physical_challenges" id="physical_challenges"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label for="national_id_card_no">National id card no <span style="color: red;">*</span></label>
                                        <input type="text" name="national_id_card_no" id="national_id_card_no"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-12" style="margin-top: 10px;">
                                    <div class="form-group">
                                        <h3 for="doqe">Details of Qualifying Examinations</h3>
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Name of Examination</th>
                                                    <th>Name of Board / University</th>
                                                    <th>Year of Passing</th>
                                                    <th>% of Marks</th>
                                                    <th>Division</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>10th / Equivalent</td>
                                                    <td>
                                                        <input type="text" name="10th_board" id="10th_board"
                                                            class="form-control">
                                                    </td>
                                                    <td>
                                                        <input type="text" name="10th_passing_year"
                                                            id="10th_passing_year" class="form-control">
                                                    </td>
                                                    <td>
                                                        <input type="text" name="10th_mark" id="10th_mark"
                                                            class="form-control">
                                                    </td>
                                                    <td>
                                                        <input type="text" name="10th_division" id="10th_division"
                                                            class="form-control">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>12th / Equivalent</td>
                                                    <td>
                                                        <input type="text" name="12th_board" id="12th_board"
                                                            class="form-control">
                                                    </td>
                                                    <td>
                                                        <input type="text" name="12th_passing_year"
                                                            id="12th_passing_year" class="form-control">
                                                    </td>
                                                    <td>
                                                        <input type="text" name="12th_mark" id="12th_mark"
                                                            class="form-control">
                                                    </td>
                                                    <td>
                                                        <input type="text" name="12th_division" id="12th_division"
                                                            class="form-control">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Graduation</td>
                                                    <td>
                                                        <input type="text" name="graduation_board" id="graduation_board"
                                                            class="form-control">
                                                    </td>
                                                    <td>
                                                        <input type="text" name="graduation_passing_year"
                                                            id="graduation_passing_year" class="form-control">
                                                    </td>
                                                    <td>
                                                        <input type="text" name="graduation_mark" id="graduation_mark"
                                                            class="form-control">
                                                    </td>
                                                    <td>
                                                        <input type="text" name="graduation_division"
                                                            id="graduation_division" class="form-control">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Post graduation</td>
                                                    <td>
                                                        <input type="text" name="post_graduation_board"
                                                            id="post_graduation_board" class="form-control">
                                                    </td>
                                                    <td>
                                                        <input type="text" name="post_graduation_passing_year"
                                                            id="post_graduation_passing_year" class="form-control">
                                                    </td>
                                                    <td>
                                                        <input type="text" name="post_graduation_mark"
                                                            id="post_graduation_mark" class="form-control">
                                                    </td>
                                                    <td>
                                                        <input type="text" name="post_graduation_division"
                                                            id="post_graduation_division" class="form-control">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Any Other(s)</td>
                                                    <td>
                                                        <input type="text" name="others_board" id="others_board"
                                                            class="form-control">
                                                    </td>
                                                    <td>
                                                        <input type="text" name="others_passing_year"
                                                            id="others_passing_year" class="form-control">
                                                    </td>
                                                    <td>
                                                        <input type="text" name="others_mark" id="others_mark"
                                                            class="form-control">
                                                    </td>
                                                    <td>
                                                        <input type="text" name="others_division" id="others_division"
                                                            class="form-control">
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-12" style="margin-top: 10px;">
                                    <h3 for="dlg">Details of Local Guardian (if any)</h3>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label for="lg_name">Name</label>
                                        <input type="text" name="lg_name" id="lg_name" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label for="lg_address">Address</label>
                                        <input type="text" name="lg_address" id="lg_address" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label for="lg_mobile">Mobile</label>
                                        <input type="text" name="lg_mobile" id="lg_mobile" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label for="lg_email">email</label>
                                        <input type="text" name="lg_email" id="lg_email" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary" style="float: right;">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('js')
    <!-- bs-custom-file-input -->
    <script
        src="{{ asset('public/assets/backend') }}/plugins/bs-custom-file-input/bs-custom-file-input.min.js">
    </script>
    <script>
        $(function () {
            bsCustomFileInput.init();
        });

    </script>
@endpush
