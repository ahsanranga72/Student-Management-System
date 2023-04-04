@extends('backend.layout.master')


@section('page_title', 'Edit student')
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
                        <h3 class="card-title">Edit Form</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="post" action="{{ route('backend.admin.students.update', $student['id']) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label for="student_name">Student's name <span style="color: red;">*</span></label>
                                        <input type="text" name="student_name" id="student_name" class="form-control" value="{{$student['name']}}">
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
                                        <label for="father_name">Father's name  <span style="color: red;">*</span></label>
                                        <input type="text" name="father_name" id="father_name" class="form-control" value="{{$student['father_name']}}">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label for="mother_name">Mother's name  <span style="color: red;">*</span></label>
                                        <input type="text" name="mother_name" id="mother_name" class="form-control" value="{{$student['mother_name']}}">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label for="father_occupation">Father's occupation</label>
                                        <input type="text" name="father_occupation" id="father_occupation" value="{{$student['father_occupation']}}"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label for="permanent_address">Permanent address  <span style="color: red;">*</span></label>
                                        <input type="text" name="permanent_address" id="permanent_address" value="{{$student['permanent_address']}}"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label for="p_state">State <span style="color: red;">*</span></label>
                                        <input type="text" name="p_state" id="p_state" class="form-control" value="{{$student['p_state']}}">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label for="p_pin_code">Pin code <span style="color: red;">*</span></label>
                                        <input type="text" name="p_pin_code" id="p_pin_code" class="form-control" value="{{$student['p_pin_code']}}">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label for="telephone">Telephone</label>
                                        <input type="text" name="telephone" id="telephone" class="form-control" value="{{$student['telephone']}}">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label for="fax">Fax</label>
                                        <input type="text" name="fax" id="fax" class="form-control" value="{{$student['fax']}}">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label for="mobile">Mobile  <span style="color: red;">*</span></label>
                                        <input type="text" name="mobile" id="mobile" class="form-control" value="{{$student['mobile']}}">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label for="correspondence_address">Correspondence address</label>
                                        <input type="text" name="correspondence_address" id="correspondence_address" value="{{$student['correspondence_address']}}"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label for="c_state">State</label>
                                        <input type="text" name="c_state" id="c_state" class="form-control" value="{{$student['c_state']}}">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label for="c_pin_code">Pin code</label>
                                        <input type="text" name="c_pin_code" id="c_pin_code" class="form-control" value="{{$student['c_pin_code']}}">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label for="date_of_birth">Date of birth <span style="color: red;">*</span></label>
                                        <input type="date" name="date_of_birth" id="date_of_birth" class="form-control" value="{{$student['date_of_birth']}}">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label for="nationality">Nationality <span style="color: red;">*</span></label>
                                        <input type="text" name="nationality" id="nationality" class="form-control" value="{{$student['nationality']}}">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label for="sex">Sex <span style="color: red;">*</span></label>
                                        <select name="sex" id="sex" class="form-control">
                                            <option value="" selected disabled>Select sex</option>
                                            <option value="Male" {{$student['sex']=='Male'?'selected':''}}>Male</option>
                                            <option value="Female" {{$student['sex']=='Female'?'selected':''}}>Female</option>
                                            <option value="Others" {{$student['sex']=='Others'?'selected':''}}>Others</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label for="physical_challenges">Physical Challenges (if any, please
                                            specify)</label>
                                        <input type="text" name="physical_challenges" id="physical_challenges" value="{{$student['physical_challenges']}}"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label for="national_id_card_no">National id card no <span style="color: red;">*</span></label>
                                        <input type="text" name="national_id_card_no" id="national_id_card_no" value="{{$student['national_id_card_no']}}"
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
                                                    @php($ten = $student_educations->where('exam', '10th / Equivalent')->first())
                                                    <td>10th / Equivalent</td>
                                                    <td>
                                                        <input type="text" name="10th_board" id="10th_board" value="{{$ten['board']??''}}"
                                                            class="form-control">
                                                    </td>
                                                    <td>
                                                        <input type="text" name="10th_passing_year" value="{{$ten['passing_year']??''}}"
                                                            id="10th_passing_year" class="form-control">
                                                    </td>
                                                    <td>
                                                        <input type="text" name="10th_mark" id="10th_mark" value="{{$ten['mark']??''}}"
                                                            class="form-control">
                                                    </td>
                                                    <td>
                                                        <input type="text" name="10th_division" id="10th_division" value="{{$ten['division']??''}}"
                                                            class="form-control">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    @php($twelve = $student_educations->where('exam', '12th / Equivalent')->first())
                                                    <td>12th / Equivalent</td>
                                                    <td>
                                                        <input type="text" name="12th_board" id="12th_board" value="{{$twelve['board']??''}}"
                                                            class="form-control">
                                                    </td>
                                                    <td>
                                                        <input type="text" name="12th_passing_year" value="{{$twelve['passing_year']??''}}"
                                                            id="12th_passing_year" class="form-control">
                                                    </td>
                                                    <td>
                                                        <input type="text" name="12th_mark" id="12th_mark" value="{{$twelve['mark']??''}}"
                                                            class="form-control">
                                                    </td>
                                                    <td>
                                                        <input type="text" name="12th_division" id="12th_division" value="{{$twelve['division']??''}}"
                                                            class="form-control">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    @php($graduation = $student_educations->where('exam', 'Graduation')->first())
                                                    <td>Graduation</td>
                                                    <td>
                                                        <input type="text" name="graduation_board" id="graduation_board" value="{{$graduation['board']??''}}"
                                                            class="form-control">
                                                    </td>
                                                    <td>
                                                        <input type="text" name="graduation_passing_year" value="{{$graduation['passing_year']??''}}"
                                                            id="graduation_passing_year" class="form-control">
                                                    </td>
                                                    <td>
                                                        <input type="text" name="graduation_mark" id="graduation_mark" value="{{$graduation['mark']??''}}"
                                                            class="form-control">
                                                    </td>
                                                    <td>
                                                        <input type="text" name="graduation_division" value="{{$graduation['division']??''}}"
                                                            id="graduation_division" class="form-control">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    @php($post_graduation = $student_educations->where('exam', 'Post graduation')->first())
                                                    <td>Post graduation</td>
                                                    <td>
                                                        <input type="text" name="post_graduation_board" value="{{$post_graduation['board']??''}}"
                                                            id="post_graduation_board" class="form-control">
                                                    </td>
                                                    <td>
                                                        <input type="text" name="post_graduation_passing_year" value="{{$post_graduation['passing_year']??''}}"
                                                            id="post_graduation_passing_year" class="form-control">
                                                    </td>
                                                    <td>
                                                        <input type="text" name="post_graduation_mark" value="{{$post_graduation['mark']??''}}"
                                                            id="post_graduation_mark" class="form-control">
                                                    </td>
                                                    <td>
                                                        <input type="text" name="post_graduation_division" value="{{$post_graduation['division']??''}}"
                                                            id="post_graduation_division" class="form-control">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    @php($others = $student_educations->where('exam', 'Others')->first())
                                                    <td>Any Other(s)</td>
                                                    <td>
                                                        <input type="text" name="others_board" id="others_board" value="{{$others['board']??''}}"
                                                            class="form-control">
                                                    </td>
                                                    <td>
                                                        <input type="text" name="others_passing_year" value="{{$others['passing_year']??''}}"
                                                            id="others_passing_year" class="form-control">
                                                    </td>
                                                    <td>
                                                        <input type="text" name="others_mark" id="others_mark" value="{{$others['mark']??''}}"
                                                            class="form-control">
                                                    </td>
                                                    <td>
                                                        <input type="text" name="others_division" id="others_division" value="{{$others['division']??''}}"
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
                                        <input type="text" name="lg_name" id="lg_name" class="form-control" value="{{$student['lg_name']}}">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label for="lg_address">Address</label>
                                        <input type="text" name="lg_address" id="lg_address" class="form-control" value="{{$student['lg_address']}}">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label for="lg_mobile">Mobile</label>
                                        <input type="text" name="lg_mobile" id="lg_mobile" class="form-control" value="{{$student['lg_mobile']}}">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label for="lg_email">email</label>
                                        <input type="text" name="lg_email" id="lg_email" class="form-control" value="{{$student['lg_email']}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary" style="float: right;">Update</button>
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
