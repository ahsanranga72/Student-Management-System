@extends('backend.layout.master')


@section('page_title', 'Student')
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
                        <h3 class="card-title">Details</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <img src="{{ asset('storage/app/public/student') }}/{{ $student->image }}" height="220" width="229"
                                    onerror="this.src='{{ asset('public/assets/backend/dist/img/place.png') }}'"
                                    alt="" style="display: block; margin: auto;">
                            </div>
                        </div>
                        <div class="row" style="margin: 20px 0;">
                            <div class="col-4">
                                <b>Name:</b> {{$student->name}}<br>
                                <b>ID:</b> {{$student->student_id}}<br>
                                <b>Course name:</b> {{$student->course->name??''}}<br>
                                <b>Mobile:</b> {{$student->mobile}}<br>
                                <b>Email:</b> {{$student->email}}<br>
                                <b>Date of birth:</b> {{$student->date_of_birth}}<br>
                                <b>Sex:</b> {{$student->sex}}<br>
                                <b>Nationality:</b> {{$student->nationality}}<br>
                                <b>NID no:</b> {{$student->national_id_card_no}}<br>
                                <b>Physical challenges:</b> {{$student->physical_challenges}}<br>
                            </div>
                            <div class="col-4">
                                <b>Father's Name:</b> {{$student->father_name}}<br>
                                <b>Mother's Name:</b> {{$student->mother_name}}<br>
                                <b>Father's occupation:</b> {{$student->father_occupation}}<br>
                                <b>Local guardian name:</b> {{$student->lg_name}}<br>
                                <b>Local guardian mobile:</b> {{$student->lg_mobile}}<br>
                                <b>Local guardian email:</b> {{$student->lg_email}}<br>
                                <b>Local guardian address:</b> {{$student->lg_address}}<br>
                            </div>
                            <div class="col-4">
                                <b>Permanent address:</b> {{$student->permanent_address}}<br>
                                <b>Permanent state:</b> {{$student->p_state}}<br>
                                <b>Permanent pin code:</b> {{$student->p_pin_code}}<br>
                                <b>Correspondence address:</b> {{$student->correspondence_address}}<br>
                                <b>Correspondence state:</b> {{$student->c_state}}<br>
                                <b>Correspondence pin code:</b> {{$student->c_pin_code}}<br>
                                <b>Telephone:</b> {{$student->telephone}}<br>
                                <b>Fax:</b> {{$student->fax}}<br>
                            </div>
                        </div>
                        <div class="row">
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
                                                <td>{{$ten->board ?? ''}}</td>
                                                <td>{{$ten->passing_year ?? ''}}</td>
                                                <td>{{$ten->mark ?? ''}}</td>
                                                <td>{{$ten->division ?? ''}}</td>
                                            </tr>
                                            <tr>
                                                @php($twelve = $student_educations->where('exam', '12th / Equivalent')->first())
                                                <td>12th / Equivalent</td>
                                                <td>{{$twelve->board ?? ''}}</td>
                                                <td>{{$twelve->passing_year ?? ''}}</td>
                                                <td>{{$twelve->mark ?? ''}}</td>
                                                <td>{{$twelve->division ?? ''}}</td>
                                            </tr>
                                            <tr>
                                                @php($graduation = $student_educations->where('exam', 'Graduation')->first())
                                                <td>Graduation</td>
                                                <td>{{$graduation->board ?? ''}}</td>
                                                <td>{{$graduation->passing_year ?? ''}}</td>
                                                <td>{{$graduation->mark ?? ''}}</td>
                                                <td>{{$graduation->division ?? ''}}</td>
                                            </tr>
                                            <tr>
                                                @php($post_graduation = $student_educations->where('exam', 'Post graduation')->first())
                                                <td>Post graduation</td>
                                                <td>{{$post_graduation->board ?? ''}}</td>
                                                <td>{{$post_graduation->passing_year ?? ''}}</td>
                                                <td>{{$post_graduation->mark ?? ''}}</td>
                                                <td>{{$post_graduation->division ?? ''}}</td>
                                            </tr>
                                            <tr>
                                                @php($others = $student_educations->where('exam', 'Others')->first())
                                                <td>Any Other(s)</td>
                                                <td>{{$others->board ?? ''}}</td>
                                                <td>{{$others->passing_year ?? ''}}</td>
                                                <td>{{$others->mark ?? ''}}</td>
                                                <td>{{$others->division ?? ''}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        
                    </div>
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
