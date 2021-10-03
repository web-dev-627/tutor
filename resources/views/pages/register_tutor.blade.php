@extends('layouts.final_register')

@section('content')

    <!-- display success message -->
    @if (Session::has('message'))
        <div class="alert alert-success">{{ Session::get('message') }}</div>
    @endif

    <body>
        <div class="container-lg">
            <div class="row">
                <div class="col-md-10 mx-auto">
                    <div class="contact-form">
                        <h1>Tutor Register</h1>
                        <p class="hint-text">We'd love to be with you, please join "Towards".</p>
                        <form class="form-submit" action="/save_tutor" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-4 col-sm-4">
                                    <div class="form-group">
                                        <label for="inputName">Name</label>
                                        <input type="text" name="tutor_name" class="form-control" id="inputName" required>
                                    </div>
                                </div>

                                <div class="col-md-4 col-sm-4">
                                    <div class="form-group">
                                        <label>Country</label>
                                        <select class="form-control select2 select2-hidden-accessible" name="tutor_country"
                                            style="width: 100%;" tabindex="-1" aria-hidden="true">
                                            <option value="" selected>Select Country... </option>
                                            @foreach ($countries as $country)
                                                <option style="margin:auto;" value="{!! $country->country !!}">
                                                    {!! $country->country !!} </option>
                                            @endforeach
                                        </select>
                                    </div> <!-- /.form-group -->
                                </div>

                                <div class="col-md-4 col-sm-4">
                                    <div class="form-group">
                                        <label>Native language</label>
                                        <select class="form-control select2 select2-hidden-accessible" name="tutor_language"
                                            style="width: 100%;" tabindex="-1" aria-hidden="true">
                                            <option value="" selected>Select Language... </option>
                                            @foreach ($languages as $language)
                                                <option style="margin:auto;" value="{!! $language->language !!}">
                                                    {!! $language->language !!} </option>
                                            @endforeach
                                        </select>
                                    </div> <!-- /.form-group -->
                                </div>
                            </div>
                            <div class="row">
                                <div class=" col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label>Also speaks</label>
                                        <select class="form-control select2 select2-hidden-accessible" name="tutor_also[]"
                                            multiple="" data-placeholder="...also" style="width: 100%;" tabindex="-1"
                                            aria-hidden="true">
                                            @foreach ($alsospeaks as $alsospeak)
                                                <option style="margin: auto;" value="{!! $alsospeak->language !!}">
                                                    {!! $alsospeak->language !!} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <label for="inputSubject">I can teach you about...</label>
                                    <select class="form-control select2 select2-hidden-accessible " name="tutor_major"
                                        style="width: 100%;" tabindex="-1" aria-hidden="true">
                                        <option selected="selected"></option>

                                        @foreach ($subjects as $subject)
                                            <option style="margin: auto;" value="{!! $subject->major !!}">
                                                {!! $subject->major !!} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-6 form-group">
                                    <label for="inputPhone">Tuition</label>
                                    <div class="tuition_box">
                                        <input type="number" name="tutor_tuition" class="form-control tuition"
                                            id="inputPhone" required>
                                        <span class="per"> $/h </span>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 form-group">
                                    <label for="inputSubject">About Yourself(character)</label>
                                    <input type="text" name="tutor_character" class="form-control" id="inputSubject"
                                        required>
                                </div>
                            </div>

                            <div class="form-check che">
                                <label class="form-check-label" for="check1">
                                    <input type="checkbox" class="form-check-input" id="check1" name="tutor_option">
                                    I am over 18 years old.
                                </label>
                            </div>

                            <div class="form-group des">
                                <label for="inputMessage">Description</label>
                                <textarea class="form-control" name="tutor_des" id="inputMessage" rows="5"
                                    required></textarea>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group {{ $errors->has('fileUpload') ? 'has-error' : '' }}">
                                        <label class="label-control">Upload Photo</label>
                                        <input type="file" name="fileUpload" class="form-control fileinput"
                                            data-show-upload="false" required="required" accept="image/*">
                                        <i>Note: Only jpg,jpeg file allowed. Max size: 3MB</i>
                                        @if ($errors->has('fileUpload'))
                                            <span class="help-block alert alert-danger">
                                                <strong>{{ $errors->first('fileUpload') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group {{ $errors->has('fileUpload') ? 'has-error' : '' }}">
                                        <label class="label-control">Upload video</label>
                                        <input type="file" name="fileUpload_video"
                                            class="form-control fileinput fileinput_video" data-show-upload="false"
                                            accept="video/*">
                                        <i>Note: Only mp4 file allowed. 320 * 240 Max size: 500MB</i>
                                        @if ($errors->has('fileUpload'))
                                            <span class="help-block alert alert-danger">
                                                <strong>{{ $errors->first('fileUpload') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <input type="btn" class="btn btn-primary btn-register fa fa-paper-plane" value="Register"/>
                            {{-- <i class="fa fa-paper-plane"></i>
                                Register --}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>

    </html>

    @push('scripts')



        <script type="text/javascript">
            // for bootstrap file input
            $(function() {
                $("input.fileinput").fileinput({
                    allowedFileExtensions: ["jpg", "jpeg", "png", "webp", "mp4"], // set allowed file format
                    maxFileSize: 500000, //set file size limit, 1000 = 1MB
                });
            });
        </script>
        <script>
            $('.btn-register').on('click', function() {
                toastr.options = {
                    "closeButton": false,
                    "debug": false,
                    "newestOnTop": false,
                    "progressBar": false,
                    "positionClass": "toast-top-right",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "1000",
                    "hideDuration": "1000",
                    "timeOut": "4000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                };
                toastr.success("You became a tutor!", "Congratulation!");

                setTimeout(function() {
                    $(".form-submit").submit();
                }, 2000);
            });
        </script>

    @endpush

@stop
