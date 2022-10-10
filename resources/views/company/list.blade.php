@extends('layouts.app')

@section('content')
    <div class="content-wrapper">

        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-tools">
                                اضافی معلومات
                            </div>
                            <div class="card-title">
                                <button type="button" class="btn btn-primary" data-mdb-ripple-color="dark"
                                    data-toggle="modal" data-target="#exampleModal">د نوی کمپنی اضافه کول</button>
                                {{-- <button type="button" class="btn btn-link" data-mdb-ripple-color="dark">Link 2</button> --}}

                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-head-fixed">
                                <thead>
                                    <tr>
                                        <th>د کمپنی نوم</th>
                                        <th>د فعالیت ډول</th>
                                        <th>د موسسی/بنست ډول</th>
                                        <th>د ریس نوم</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($companies as $company)
                                        <tr>
                                            <td>{{ $company->name }}</td>
                                            <td>{{ $company->aname }}</td>
                                            <td>{{ $company->tname }}</td>
                                            <td>{{ $company->mname }}</td>
                                            <td>

                                                <div class="input-group input-group-sm mb-3">
                                                    <div class="input-group-prepend">
                                                        <button type="button" class="btn btn-primary dropdown-toggle"
                                                            data-toggle="dropdown">
                                                            معلومات
                                                        </button>
                                                        <ul class="dropdown-menu">
                                                            <li class="dropdown-item"><a href="{{ route('details.company',$company->comp_id) }}"><i
                                                                        class="bi bi-archive"></i>جزیات</a></li>
                                                            <li class="dropdown-item"><a href="">تغیر د معلوماتو</a>
                                                            </li>
                                                            <li class="dropdown-item"><button
                                                                    onclick="khan({{ $company->comp_id }})"
                                                                    class="text-primary" data-toggle="modal"data-target="#modal-xl">د بنست نمایند

                                                                    ثبت/تغیر</button>
                                                            </li>

                                                            <li class="dropdown-item"><a href="#"
                                                                    class="text text-danger">پاکول/حذف</a></li>
                                                            <li class="dropdown-divider"></li>
                                                        </ul>
                                                    </div>
                                                    <!-- /btn-group -->
                                                </div>
                                                <!-- /input-group -->


                                            </td>
                                        </tr>
                                    @endforeach


                                </tbody>
                            </table>
                        </div>




                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>

        {{-- Start of Agent Register  --}}

        <div class="modal fade" id="modal-xl">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">د بنسټ د رسمی نماینده د ثبت برخه</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body mr-5">
                        <form action="#" id="agentSave" enctype="multipart/form-data">
                            <div class="row">

                                <div class="form-group col-md-4">
                                    <label for="">د نماینده نوم</label>
                                    <input type="text" name="agentName" class="form-control"
                                        placeholder="د نماینده نوم ولیکی">
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="">د پلار نوم</label>
                                    <input type="text" name="fName" class="form-control"
                                        placeholder="د نماینده د پلار نوم ">
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="">د نیکه نوم</label>
                                    <input type="text" name="gFName" class="form-control"
                                        placeholder="د نماینده د نکیه نوم">
                                </div>




                            </div>

                            <div class="row">


                                <div class="form-group col-md-4">
                                    <label for="">د تذکره شمیره</label>
                                    <input type="text" name="NIC" class="form-control" placeholder="د تذکری شمیره">
                                </div>


                                <div class="form-group col-md-4">
                                    <label for="">د تلفون شمیره</label>
                                    <input type="text" name="phone" class="form-control"
                                        placeholder="د نماینده داړیکی شمیره">

                                </div>

                                <div class="form-group col-md-4">
                                    <label for="">ایمیل آدرس</label>
                                    <input type="text" name="email" class="form-control"
                                        placeholder="د نماینده ایمیل آدرس">
                                </div>


                            </div>
                            <p>اصلی استوګنځی:</p>

                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="">ولایت</label>
                                    <select name="provence" id="provence" class="form-control">
                                        <option disabled selected>ولایت انتخاب کړی</option>
                                        @foreach ($provence as $item)
                                            <option value="{{ $item->id }}">{{ $item->provenceName }}</option>
                                        @endforeach
                                    </select>

                                </div>

                                <div class="form-group col-md-4">
                                    <label for="">ولسوالی</label>
                                    <select name="odistrict_id " id="odistrict_id " class="form-control">
                                        <option disabled selected>ولسوالی انتخاب کړی</option>
                                        @foreach ($district as $item)
                                            <option value="{{ $item->id }}">{{ $item->districtName }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="from-group col-md-4">
                                    <label for="">کلی</label>
                                    <input type="text" name="ovillage" class="form-control"
                                        placeholder="د اصلی کلی نوم ولیکی">
                                </div>

                            </div>
                            <p>فعلی استوګنځی:</p>

                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="">ولایت</label>
                                    <select name="provence" id="provence" class="form-control">
                                        <option disabled selected>ولایت انتخاب کړی</option>
                                        @foreach ($provence as $item)
                                            <option value="{{ $item->id }}">{{ $item->provenceName }}</option>
                                        @endforeach
                                    </select>

                                </div>

                                <div class="form-group col-md-4">
                                    <label for="">ولسوالی</label>
                                    <select name="cdistrict_id " id="odistrict_id " class="form-control">
                                        <option disabled selected>ولسوالی انتخاب کړی</option>
                                        @foreach ($district as $item)
                                            <option value="{{ $item->id }}">{{ $item->districtName }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="from-group col-md-4">
                                    <label for="">کلی</label>
                                    <input type="text" name="cvillage" class="form-control"
                                        placeholder="د فعلی کلی نوم ولیکی">
                                </div>

                                <input type="hidden" class="form-control" name="company_id" id="company_id">





                            </div>


                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">بندول</button>
                        <button type="submit" class="btn btn-primary">ذخیره کول</button>
                    </form>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>





        {{-- End of Agent Register --}}

        {{-- Start Of Company Registration Model --}}
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form role="form" method="POST" action="{{ route('save.company') }}" id="regForm"
                    enctype="multipart/form-data">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">د نوی مووسی/بنست اضافه کول</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">



                            @csrf
                            <div class="card-body">
                                <div class="row">


                                    <div class="form-group">
                                        <label for="">د موسسی/ بنسټ نوم</label>
                                        <input type="text" class="form-control" name="companyName"
                                            placeholder="د موسسی نوم داخل کړی">
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





                                    <div class="form-group">
                                        <label for="">آی ډی نمبر</label>
                                        <input type="text" class="form-control" name="compnayID" id="compnayID"
                                            placeholder="د موسسی یا شرکت ای دی نمبر">
                                        <span class="text text-danger" role="alert">
                                            @error('companyID')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>

                                <div class="row">






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




                                <div class="row">


                                    <div class="form-group">
                                        <label for="text">د بنست ډول</label>
                                        <select name="company_type_id" id="company_type_id" class="form-control">
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
                            <!-- /.card-body -->
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">بندول</button>
                            <button type="submit" class="btn btn-primary">ذخیره کول</button>

                        </div>
                        <input type="reset" value="" hidden>
                </form>
            </div>
        </div>
        {{-- End of Company Registration Model --}}







    </div>




    </div>
@endsection
@section('script')
    <script>
        function khan(id) {

            $('#company_id').val(id);



        }
        $(document).ready(function() {


            $('#regForm').on('submit', function(e) {
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "{{ route('save.company') }}",
                    data: $(this).serialize(),
                    dataType: "json",
                    success: function(response) {
                        // $("#exampleModal").modal("hide");
                        // alert('samiullah it was successfuly added ');
                        // $('#exampleModal').modal('hide');
                        $('#exampleModal').css('display', 'none');
                        $('[data-dismiss="modal"]').click();
                        $('#regForm')[0].reset();
                    }
                });
            })




            $('#agentSave').on('submit', function(e) {
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "{{ route('save.agent') }}",
                    data: $(this).serialize(),
                    dataType: "json",
                    success: function(response) {
                        // $("#exampleModal").modal("hide");
                        // alert('samiullah it was successfuly added ');
                        // $('#exampleModal').modal('hide');
                        $('#exampleModal').css('display', 'none');
                        $('[data-dismiss="modal"]').click();
                        $('#regForm')[0].reset();
                    }
                });
            })




        })


    </script>
@endsection
