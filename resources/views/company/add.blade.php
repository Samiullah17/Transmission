@extends('layouts.app')

@section('content')
    <div class="wrapper">


        <!-- Main Sidebar Container -->


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">

                        </div>
                        <div class="col-sm-6">

                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="card">
                                <div class="card-header">
                                    <h4>د موسساتو او شرکتونو د ثبت برخه</h4>
                                </div>

                                <!-- /.card-header -->
                                <!-- form start -->
                                <form role="form" method="POST" action="{{ route('save.company') }}" id="regForm"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body">
                                        <div class="row">



                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="">د موسسی/ بنسټ نوم</label>
                                                    <input type="text" class="form-control" name="companyName"
                                                        placeholder="د موسسی یا شرکت نوم داخل کړی">
                                                    <span class="text text-danger" role="alert">
                                                        @error('companyName')
                                                            {{ $message }}
                                                        @enderror
                                                    </span>
                                                    {{-- @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror --}}
                                                </div>
                                            </div>



                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="">آی ډی نمبر</label>
                                                    <input type="text" class="form-control" name="companyIی"
                                                        id="compnayID" placeholder="د موسسی یا شرکت ای دی نمبر">
                                                    <span class="text text-danger" role="alert">
                                                        @error('companyID')
                                                            {{ $message }}
                                                        @enderror
                                                    </span>
                                                </div>
                                            </div>


                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="">د فعالیت ډول</label>
                                                    <select name="company_active_type_id" id="company_active_type_id"
                                                        class="form-control">
                                                        <option disabled selected>د فعالیت دول انتخاب کړی</option>
                                                        @foreach ($companyActiveType as $item)
                                                            <option value="{{ $item->id }}">{{ $item->companyName }}
                                                            </option>
                                                        @endforeach
                                                    </select>

                                                    <span class="text text-danger" role="alert">
                                                        @error('activeType')
                                                            {{ $message }}
                                                        @enderror
                                                    </span>
                                                </div>
                                            </div>



                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="">د جواز نمبر</label>
                                                    <input type="text" class="form-control" name="licenseNumber"
                                                        id="licenseNumber" placeholder="د جواز نمبر داخل کړی">
                                                    <span class="text text-danger" role="alert">
                                                        @error('licenseNumber')
                                                            {{ $message }}
                                                        @enderror
                                                    </span>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row">







                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="text">د بنست ډول</label>
                                                    <select name="company_type_id" id="company_type_id"
                                                        class="form-control">
                                                        <option disabled selected>د بنست ډول انتخاب کړی</option>

                                                        @foreach ($companyType as $item)
                                                            <option value="{{ $item->id }}">{{ $item->companyTypeName }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <span class="text text-danger" role="alert">
                                                        @error('company_type_id')
                                                            {{ $message }}
                                                        @enderror
                                                    </span>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="text">د بنست د ریس نوم</label>
                                                    <input type="text" class="form-control" name="companyManagerName"
                                                        id="companyManagerName" placeholder="د بنست  ریس نوم ">
                                                    <span class="text text-danger" role="alert">
                                                        @error('companyManagerName')
                                                            {{ $message }}
                                                        @enderror
                                                    </span>
                                                </div>
                                            </div>



                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="text">د بنست د ریس تابعیت</label>
                                                    <select name="citizenship_id" id="citizenship_id" class="form-control">
                                                        <option selected disabled>تابعیت انتخاب کړی</option>
                                                        @foreach ($citizenships as $item)
                                                            <option value="{{ $item->id }}">
                                                                {{ $item->citizenshipName }}
                                                            </option>
                                                        @endforeach
                                                    </select>

                                                    <span class="text text-danger" role="alert">
                                                        @error('citizenship_id')
                                                            {{ $message }}
                                                        @enderror
                                                    </span>

                                                </div>
                                            </div>



                                        </div>

                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary col-md-12">ذخیره کردن</button>
                                    </div>
                                </form>
                            </div>
                        </div>


                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
    @endsection
    @section('script')
        <script>
            $(document).ready(function() {

                $('#tfalse').change(function() {

                    $('.tra').addClass('collapse');
                    $('.tr').prop('disabled', true);

                });

                $('#ttrue').change(function() {

                    $('.tra').removeClass('collapse');
                    $('.tr').removeAttr('disabled');

                });

                $(document).on('change', '[name="wakitaki"]', function(e) {
                    e.preventDefault();

                    $(this).next().toggleClass('d-none');
                });


                // $('#regForm').on('submit', function(e) {
                //     alert('samiullah jahani Stanikzai ');
                //     e.preventDefault();
                //     $.ajax({
                //         type: "POST",
                //         url: "{{ route('add.company') }}",
                //         data: $(this).serialize(),
                //         dataType: "json",
                //         success: function(response) {

                //             alert('successfuly added company ');

                //         }
                //     });
                // })




            });
        </script>
    @endsection
