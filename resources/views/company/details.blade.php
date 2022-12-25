@extends('layouts1.app')

@section('content')
    <style>
        .error {
            color: red;
        }
    </style>
    <div class="content-wrapper">

        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-tools">
                                د {{ $company->companyName }} کمپنی/بنسټ

                            </div>
                            <div class="card-title">


                                {{-- <button type="button" value="{{ $company->id }}"
                                    class="btn btn-primary btnbtn">kdfjkdfj</button> --}}

                                <input type="hidden" id="thisid" name="coname" value="{{ $company->id }}">

                                <button type="button" value="{{ $company->id }}"
                                    class="btn btn-primary showOrder btn-sm">د بنسټ ټولی غوښتنی</button>


                                <button type="button" class="btn btn-primary  showAgents btn-sm">
                                    نماینده ګان</button>


                                <button type="button" class="btn btn-primary jawaz btn-sm" data-mdb-ripple-color="dark"
                                    value="{{ $company->id }}">جوازونه</button>



                                @if ($company->status == 1)
                                    <button type="button" id="companyDelete" value="{{ $company->id }}"
                                        class="btn btn-danger companyDelete btn-sm" data-toggle="modal"
                                        data-target="#modal-danger">د بنسټ غیر فعالول</button>



                                    <button type="button" id="companyEdit" value="{{ $company->id }}"
                                        class="btn btn-primary companyEdit btn-sm" data-mdb-ripple-color="dark"
                                        data-toggle="modal"data-target="#modal-xl"><i class="fas fa-edit"></i></button>
                                @endif

                                @if ($company->status == 0)
                                    <button type="button" id="companyDelete" value="{{ $company->id }}"
                                        class="btn btn-success companyDelete btn-sm" data-toggle="modal"
                                        data-target="#modal-success">د بنسټ فعالول</button>
                                @endif

                                {{-- <button type="button" class="btn btn-link" data-mdb-ripple-color="dark">Link 2</button> --}}

                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card">
                        <div class="card-header d-none backAgent">
                            <button type="button" style="float: right" class="btn btn-outline-primary">
                                <svg width="10" height="16" fill="currentColor" class="bi bi-arrow-right"
                                    viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z" />
                                </svg>
                            </button>
                        </div>
                        <div class="card-body">
                            <table class="table company">
                                <thead>
                                    <tr>
                                        <th>د کمپنی نوم</th>
                                        <th>د فعالیت ډول</th>
                                        <th>د موسسی/بنست ډول</th>
                                        <th>د ریس نوم</th>
                                        <th>د ریس تابعیت</th>
                                        <th>د کمپنی ادرس</th>
                                        <th>لیتیتود</th>
                                        <th>لونک تیتود</th>

                                    </tr>
                                </thead>
                                <tbody id="cbody">
                                    <td>{{ $company->companyName }}</td>
                                    <td>{{ $company->aname }}</td>
                                    <td>{{ $company->tname }}</td>
                                    <td>{{ $company->companyManagerName }}</td>
                                    <td>

                                        @if ($company->country_id == 3)
                                            داخلی
                                        @endif

                                        @if ($company->country_id != 3)
                                            خارجی
                                        @endif

                                    </td>


                                    <td>{{ $company->companyAddress }}</td>
                                    <td>{{ $company->latitude }}</td>
                                    <td>{{ $company->longtitude }}</td>
                                </tbody>
                            </table>


                            <div class="modal fade" id="modal-xl">
                                <div class="modal-dialog modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">د کمپنی/بنسټ د معلوماتو تغیرول</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body mr-5">
                                            <form action="#" id="updateCompany" enctype="multipart/form-data">
                                                @csrf
                                                <div class="row">

                                                    <input type="hidden" name="company_id" class="form-control"
                                                        value="{{ $company->id }}">

                                                    <div class="form-group col-md-4">
                                                        <label for="">د کمپنی/بنسټ نوم</label>
                                                        <input type="text" name="companyName" id="companyName"
                                                            class="form-control" placeholder="د نماینده نوم ولیکی">
                                                    </div>

                                                    <div class="form-group col-md-4">
                                                        <label for="">د کمپنی/بنسټ نوعه</label>
                                                        <select name="company_type_id" id="company_type_id"
                                                            class="form-control"></select>
                                                    </div>

                                                    <div class="form-group col-md-4">
                                                        <label for="">د کمپنی/بنسټ د فعالیت ډول</label>
                                                        <select name="company_active_type_id" id="company_active_type_id"
                                                            class="form-control"></select>
                                                    </div>

                                                </div>

                                                <div class="row">


                                                    <div class="form-group col-md-4">
                                                        <label for="">د کمپنی آدرس</label>
                                                        <input type="text" name="companyAddress" id="companyAddress"
                                                            class="form-control" placeholder="د کمپنی آدرس">
                                                    </div>


                                                    <div class="form-group col-md-4">
                                                        <label for="">لیتیتود</label>
                                                        <input type="text" name="latitude" id="latitude"
                                                            class="form-control">

                                                    </div>

                                                    <div class="form-group col-md-4">
                                                        <label for="">لونګ تیتود</label>
                                                        <input type="text" name="longtitude" id="longtitude"
                                                            class="form-control">
                                                    </div>


                                                </div>

                                                <div class="row">
                                                    <div class="form-group col-md-4">
                                                        <label for="">د کمپنی/بنسټ د ریس نوم</label>
                                                        <input type="text" name="companyManagerName"
                                                            id="companyManagerName" class="form-control">
                                                    </div>

                                                    <div class="form-group col-md-4">
                                                        <label for="">تابعیت</label>
                                                        <select name="citizenship_id" id="citizenship_id"
                                                            class="form-control"></select>
                                                    </div>

                                                    <div class="form-group col-md-4 country">

                                                    </div>

                                                </div>
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                            <button type="button" class="btn btn-default"
                                                data-dismiss="modal">بندول</button>
                                            <button type="submit" class="btn btn-primary">ذخیره کول</button>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>

                        </div>
                    </div>




                    <div class="d-none card mt-5 agentCard">
                        <div class="card-header">
                            د {{ $company->companyName }}د بنسټ/کمپنی د نمایندګانو لیست
                        </div>
                        <div class="card-title">

                            @if ($company->status == 1)
                                <button type="button" style="float: left"
                                    class="btn btn-primary abutton btn-sm mt-2 ml-2" data-toggle="modal"
                                    data-target="#modal-xl1">د
                                    نوی نماینده ثبت کول</button>
                            @endif
                        </div>
                        <div class="card-body">

                            <table class="table table-bordred table-striped agentsTable">

                                <thead>
                                    <th style="text-align: start">د نماینده نوم</th>
                                    <th style="text-align: start">د پلار نوم</th>
                                    <th style="text-align: start">د تلفون شمیره</th>
                                    <th style="text-align: start">ایمیل</th>
                                    <th style="text-align: start"></th>
                                </thead>

                                <tbody>

                                </tbody>

                            </table>

                        </div>

                    </div>


                    <div class="card mt-5 orderCard">

                        <div class="card-header">
                            د {{ $company->companyName }} بنسټ/کمپنی د غوښتنو/آرډرونو لیست
                        </div>

                        <div class="card-title">
                            @if ($company->status == 1)
                                <a href="{{ route('add.order', $company->id) }}" style="float: left"
                                    class="btn btn-primary abutton btn-sm mt-2 ml-2">د نوی آرډر/غوښتنی جوړول</a>
                            @endif

                        </div>
                        <div class="card-body">
                            <table class="table table-bordred table-striped OrdersTable">

                                <thead>
                                    <th style="text-align: start">د کمپنی نوم</th>
                                    <th style="text-align: start">د نماینده نوم</th>
                                    <th style="text-align: start">د غوښتنی د مراجعی نیټه</th>
                                    <th style="text-align: start">حالت</th>
                                    <th style="text-align: start"></th>

                                </thead>

                                <tbody style="text-align: start">

                                </tbody>

                            </table>
                        </div>

                    </div>

                    <div class="card d-none licenseCard mt-5">

                        <div class="card-header">
                            د {{ $company->companyName }} بنسټ/کمپنی د جوازونه
                        </div>

                        <div class="card-title">
                            @if ($company->status == 1)
                                <button type="button" style="float: left"
                                    class="btn btn-primary addLicense btn-sm mt-2 ml-2" data-toggle="modal"
                                    data-target="#modal-lg-add-license">د جواز اضافه کول</button>
                            @endif
                        </div>

                        <div class="card-body">
                            <table class="table table-striped table-bordered table-hover table-sm">

                                <thead>
                                    <th style="text-align: start">د جواز نمبر</th>
                                    <th style="text-align: start">د جواز مرجع</th>
                                    <th style="text-align: start">د جواز د صدرو تاریخ</th>
                                    {{-- <th style="text-align: start">فایل</th> --}}

                                </thead>
                                <tbody id="licenseTbody">


                                    @foreach ($companylicense as $item)
                                        <tr>
                                            <td id="lNumber{{ $item->id }}">{{ $item->licenseNumber }}</td>
                                            <td id="lTname{{ $item->id }}">{{ $item->ltname }}</td>
                                            <td id="issueDate{{ $item->id }}">{{ $item->issueDate }}</td>
                                            @if ($company->status == 1)
                                                <td><button type="button" value="{{ $item->id }}" id="licenseEdit"
                                                        class="btn btn-primary" data-toggle="modal"
                                                        data-target="#modal-lg"><i class="fas fa-edit"></i></button>
                                                    <button type="button" id="licenseDelete"
                                                        value="{{ $item->id }}" class="btn btn-danger"
                                                        data-toggle="modal" data-target="#modal-danger-license"><i
                                                            class="fas fa-trash-alt"></i></button>
                                                </td>
                                            @endif

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>



        {{-- Start of Second Dev --}}



        <div class="modal fade" id="modal-danger">
            <div class="modal-dialog">
                <div class="modal-content bg-danger">
                    <div class="modal-header">
                        <h4 class="modal-title">اخطار</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>آیا تاسو مطمین یې چی د ( {{ $company->companyName }} ) کمپنی/بنسټ غیر فعال کړی؟</p>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-outline-light" data-dismiss="modal">نه</button>
                        <a href="{{ route('company.deactive', $company->id) }}" class="btn btn-outline-light">هو</a>
                    </div>
                </div>

            </div>

        </div>

        {{-- Start of company Active --}}


        <div class="modal fade" id="modal-success">
            <div class="modal-dialog">
                <div class="modal-content bg-success">
                    <div class="modal-header">
                        <h4 class="modal-title">اخطار</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <p>آیا تاسو مطمین یې چي {{ $company->companyName }} کمپنی/بنسټ فعال کړی؟</p>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-outline-light" data-dismiss="modal">نه</button>
                        <a href="{{ route('company.active', $company->id) }}" class="btn btn-outline-light">هو</a>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->



        {{-- End of Company Active --}}


        <div class="modal fade" id="modal-danger-license">
            <div class="modal-dialog">
                <div class="modal-content bg-danger">
                    <div class="modal-header">
                        <h4 class="modal-title">اخطار</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                        </button>
                    </div>
                    <div class="modal-body">
                        <p>آیا تاسو مطمین یې چي د {{ $company->companyName }} (<span id="license-delete"></span>) جواز
                            پاک/حذف کړی؟</p>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-outline-light" data-dismiss="modal">نه</button>
                        <button type="button" id="btnDeleteLicense" value="{{ $company->id }}"
                            class="btn btn-outline-light">هو</button>
                    </div>
                </div>

            </div>

        </div>


        {{-- End of Second Dev --}}
        {{-- Start of License Edit --}}



        <div class="modal fade" id="modal-lg">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">د {{ $company->companyName }} کمپنی/بنسټ <span id="lEdit"></span>
                            جواز د تغیر برخه</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="licenseEditForm" enctype="multipart/form-data">
                            @csrf


                            <div id="LicenseEditDev" class="row">

                            </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">بندول</button>
                        <button type="submit" id="btnSubmit" class="btn btn-primary">ثبت</button>
                        </form>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>





        {{-- End of License Edit --}}

        {{-- Start of Adding Order --}}

        {{-- <div class="modal fade" id="modal-default">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">د نوی غوښتنی/آرډر جوړول</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="row">

                            <select name="agent_id" id="agent_id" style="width: 70%" class="form-control">
                                <option selected disabled>د بنسټ نماینده انتخاب کړی</option>
                                @foreach ($agents as $item)
                                    <option value="{{ $item->id }}">{{ $item->agentName }}</option>
                                @endforeach
                            </select>

                        </div>

                        <div class="row">
                            <table class="table table-striped aOrder table-border table-hover d-none">
                                <thead>
                                    <tr>
                                        <th>د نماینده نوم</th>
                                        <th>د پلار نوم</th>
                                        <th>د تذکری شمیره</th>
                                        <th>عکس</th>
                                    </tr>

                                </thead>
                                <tbody id="adetails">

                                </tbody>

                            </table>
                        </div>

                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">بندول</button>
                        <a href="#" id="nOrder" class="btn btn-success">آرډر جوړول</a>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div> --}}
        <!-- /.modal -->



        {{-- End of Adding Order --}}


        {{-- Start of License Adding --}}


        <div class="modal fade" id="modal-lg-add-license">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">د {{ $company->companyName }} کمپنی/بنسټ <span id="lEdit"></span>
                            جواز د ثبت برخه</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="#" id="licenseAddForm" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-3">
                                    <input type="hidden" name="company_id" value="{{ $company->id }}"
                                        class="form-control">
                                    <label>د جواز مرجع </label>
                                    <select name="license_type_id" id="license_type_id" class="form-control">
                                        <option selected disabled>د جواز مرجع انتخاب کړی</option>
                                        @foreach ($licenseType as $item)
                                            <option value="{{ $item->id }}">{{ $item->licenseTypeName }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-md-3">
                                    <label>د جواز نمبر</label>
                                    <input type="text" name="licenseNumber" placeholder="د جواز نمبر داخل کړی"
                                        class="form-control">
                                </div>

                                <div class="form-group col-md-3">
                                    <label>د جواز د صدور نیټه</label>
                                    <input type="date" name="issueDate" class="form-control">
                                </div>

                                <div class="form-group col-md-3">
                                    <label>د جواز سکن شوی فایل</label>
                                    <input type="file" name="files" class="form-control">
                                </div>
                            </div>



                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">بندول</button>
                        <button type="submit" id="licenseAddFormbutton" class="btn btn-primary">ثبت</button>
                        </form>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>



        {{-- End of License Adding --}}

        {{-- Start of Agent Registration --}}


        <div class="modal fade" id="modal-xl1">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">د بنسټ د رسمی نماینده د ثبت برخه</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body mr-5">
                        {{-- نوی نماینده:<input type="radio" class="input-sm"> --}}
                        {{-- پخوانی نماینده:<input type="radio" class="input-sm"> --}}



                        <form action="{{ route('save.agent') }}" id="agentSave" method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="form-group col-md-4">

                                    <label for="">د نماینده نوم<span class="text-danger">*</span></label>
                                    <input type="text" name="agentName" class="form-control"
                                        placeholder="د نماینده نوم ولیکی">
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="">د پلار نوم<span class="text-danger">*</span></label>
                                    <input type="text" name="fName" class="form-control"
                                        placeholder="د نماینده د پلار نوم ">
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="">د نیکه نوم<span class="text-danger">*</span></label>
                                    <input type="text" name="gFName" class="form-control"
                                        placeholder="د نماینده د نکیه نوم">
                                </div>
                            </div>

                            <div class="row">


                                <div class="form-group col-md-4">
                                    <label for="">د تذکره شمیره<span class="text-danger">*</span></label>
                                    <input type="text" name="NIC" class="form-control"
                                        placeholder="د تذکری شمیره">
                                </div>


                                <div class="form-group col-md-4">
                                    <label for="">د تلفون شمیره<span class="text-danger">*</span></label>
                                    <input type="text" name="phone" class="form-control"
                                        placeholder="د نماینده داړیکی شمیره">

                                </div>

                                <div class="form-group col-md-4">
                                    <label for="">ایمیل آدرس</label>
                                    <input type="text" name="email" class="form-control"
                                        placeholder="د نماینده ایمیل آدرس">
                                </div>


                            </div>
                            <p class="">اصلی استوګنځی:</p>

                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="">ولایت<span class="text-danger">*</span></label>
                                    <select name="provence" id="provence" class="form-control">
                                        <option disabled selected>ولایت انتخاب کړی</option>
                                        @foreach ($provence as $item)
                                            <option value="{{ $item->id }}">{{ $item->provenceName }}</option>
                                        @endforeach
                                    </select>

                                </div>

                                <div class="form-group col-md-4">
                                    <label for="">ولسوالی<span class="text-danger">*</span></label>
                                    <select name="odistrict_id" id="odistrict_id" class="form-control">
                                        <option disabled selected>ولسوالی انتخاب کړی</option>
                                        @foreach ($district as $item)
                                            <option value="{{ $item->id }}">{{ $item->districtName }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="from-group col-md-4">
                                    <label for="">کلی<span class="text-danger">*</span></label>
                                    <input type="text" name="ovillage" class="form-control"
                                        placeholder="د اصلی کلی نوم ولیکی">
                                </div>

                            </div>
                            <p class="">فعلی استوګنځی:</p>

                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="">ولایت<span class="text-danger">*</span></label>
                                    <select name="cprovence" id="provence" class="form-control">
                                        <option disabled selected>ولایت انتخاب کړی</option>
                                        @foreach ($provence as $item)
                                            <option value="{{ $item->id }}">{{ $item->provenceName }}</option>
                                        @endforeach
                                    </select>

                                </div>

                                <div class="form-group col-md-4">
                                    <label for="">ولسوالی<span class="text-danger">*</span></label>
                                    <select name="cdistrict_id" id="cdistrict_id" class="form-control">
                                        <option disabled selected>ولسوالی انتخاب کړی</option>
                                        @foreach ($district as $item)
                                            <option value="{{ $item->id }}">{{ $item->districtName }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="from-group col-md-4">
                                    <label for="">کلی<span class="text-danger">*</span></label>
                                    <input type="text" name="cvillage" class="form-control"
                                        placeholder="د فعلی کلی نوم ولیکی">
                                </div>

                                <input type="hidden" class="form-control" name="company_id" id="company_id"
                                    value="{{ $company->id }}">

                            </div>

                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label>د نماینده عکس<span class="text-danger">*</span></label>
                                    <input type="file" id="file" name="photo" class="form-control">
                                </div>
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



        {{-- End of Agent Registration --}}










    </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $("#agentSave").validate({
                rules: {
                    agentName: "required",
                    fName: "required",
                    gFName: "required",
                    NIC: "required",
                    phone: {
                        required: true,
                        number: true,
                        minlength: 10,
                        maxlength: 10,
                    },
                    provence: "required",
                    cprovence: "required",
                    odistrict_id: "required",
                    cdistrict_id: "required",
                    ovillage: "required",
                    cvillage: "required",
                    photo: "required",
                    suggestion_file: "required",

                },

                messages: {
                    agentName: "<span style='color:red;'>د نماینده نوم ضروری ده</span>",
                    fName: "د نماینده د پلار نوم ضروری ده",
                    gFName: "د نماینده د نیکه نوم ضروری ده",
                    NIC: "د تذکری شمیره ضروری ده",
                    phone: {
                        required: "د تلفون شمره ضروری ده",
                        maxlength: "د تلفون شمیره باید له لسو عددونو زیاته نوی",
                        minlength: "د تلفون شمیره باید له لسو عددونو څخه کمه نوی",
                        number: "د تلفون شمیره کی یوازی اعداد باید داخل شی"
                    },
                    provence: "په مهربانی سره اصلی ولایت انتخاب کړی",
                    cprovence: "په مهربانی سره اوسنی ولایت انتخاب کړی",
                    odistrict_id: "اصلی ولسوالی ضروری ده",
                    cdistrict_id: "فعلی ولسوالی ضروری ده",
                    ovillage: "اصلی کلی داخل کړی",
                    cvillage: "د اوسنی کلی نوم داخل کړی",
                    photo: "د نماینده عکس داخل کړی",
                    suggestion_file: "پشنهادی فایل ضروری ده",
                }
            });
        })

        $(document).ready(function() {
            $(function() {
                var id = $('#thisid').val();

                var table = $('.OrdersTable').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('company.orders') }}/" + id,
                    columns: [{
                            data: 'cname'
                        },
                        {
                            data: 'aname'
                        },
                        {
                            data: 'created_at'
                        },
                        {
                            data: 'status'
                        },
                        {
                            data: 'action'

                        },

                        // {data: 'action', name: 'action', orderable: false, searchable: false},
                    ],
                    language: {
                        "emptyTable": "غوښتنه/آرډر نلری",
                        "lengthMenu": "نمایش MENU معلومات",
                        "info": "معلومات شماره START الی END مجموعه معلومات TOTAL",
                        "infoEmpty": "معلومات شماره 0 الی 0 از 0 تعداد مجموعه",
                        "search": "پلټل/جستجو:",
                        "sProcessing": "د معلوماتو غوښتنو د معلوماتو د اضافه کول...",
                        "paginate": {
                            "first": "لومړی",
                            "last": "آخر",
                            "next": "وروسته",
                            "previous": "مخکی",
                        },
                    },
                });

                // $('.agentsTable').removeClass('agentsTable').addClass('showCOrder');
            });
        })



        $(document).on('change', '#agent_id', function() {
            var id = $(this).val();


            $.ajax({
                type: "GET",
                url: "{{ route('agent.details') }}/" + id,
                dataType: "json",
                success: function(response) {
                    $('#adetails').html('');
                    console.log(response);
                    // $.each(response.agent, function(index, value) {
                    $('#adetails').html('<tr><td>' + response.agent.agentName + '</td><td>' + response
                        .agent.fName + '</td><td>' + response.agent.NIC + '</td><td>' + response
                        .agent.photo + '</td></tr>');
                    $('.aOrder').removeClass('d-none');
                    //    });

                }
            });

        })


        $(document).on('click', '.showAgents', function(e) {
            e.preventDefault();
            $('.orderCard').addClass('d-none');
            $('.agentCard').removeClass('d-none');
            $('.licenseCard').addClass('d-none');
            $(this).removeClass('showAgents').addClass('agents');

            $(function() {
                var id = $('#thisid').val();
                var table = $('.agentsTable').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('company.agent') }}/" + id,
                    columns: [{
                            data: 'agentName'
                        },
                        {
                            data: 'fName'
                        },
                        {
                            data: 'phone'
                        },
                        {
                            data: 'email'
                        },
                        {
                            data: 'action'
                        },


                        // {data: 'action', name: 'action', orderable: false, searchable: false},
                    ],
                    language: {
                        "emptyTable": "دیتا موجود نیست .",
                        "lengthMenu": "نمایش MENU معلومات",
                        "info": "معلومات شماره START الی END مجموعه معلومات TOTAL",
                        "infoEmpty": "معلومات شماره 0 الی 0 از 0 تعداد مجموعه",
                        "search": "پلټل/جستجو: ",
                        "sProcessing": "در حال اضافه نمودن معلومات...",
                        "paginate": {
                            "first": "لومړی",
                            "last": "آخر",
                            "next": "وروسته",
                            "previous": "مخکی",
                        },
                    },
                });


            });


        })

        $(document).on('click', '.agents', function(e) {
            e.preventDefault();
            $('.orderCard').addClass('d-none');
            $('.agentCard').removeClass('d-none');
            $('.licenseCard').addClass('d-none');

        })




        $(document).on('click', '.showOrder', function(e) {
            e.preventDefault();
            $('.agentCard').addClass('d-none');
            $('.orderCard').removeClass('d-none');
            $('.licenseCard').addClass('d-none');
            $(this).removeClass('showOrder').addClass('order');
        })


        $(document).on('click', '.order', function(e) {
            e.preventDefault();
            $('.agentCard').addClass('d-none');
            $('.orderCard').removeClass('d-none');
            $('.licenseCard').addClass('d-none');

        })


        $(document).on('click', '.jawaz', function(e) {
            e.preventDefault();
            $('.licenseCard').removeClass('d-none');
            $('.agentCard').addClass('d-none');
            $('.orderCard').addClass('d-none');
        })





        var citizenship = 0;
        $(document).ready(function() {
            $('#agentSave').on('submit', function(e) {
                e.preventDefault();

                $.ajax({
                    type: "POST",
                    url: "{{ route('save.agent') }}",
                    data: new FormData(this),
                    dataType: "json",
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(response) {
                        // $("#exampleModal").modal("hide");
                        // alert('samiullah it was successfuly added ');
                        // $('#exampleModal').modal('hide');
                        console.log(response);
                        $('#modal-xl1').css('display', 'none');
                        $('[data-dismiss="modal"]').click();
                        $('#agentSave')[0].reset();
                        swal('', response.message, 'success');
                    }
                });

            })




            $(document).on('click', '#companyEdit', function(e) {
                e.preventDefault();


                let url = "{{ route('company.edit', ':id') }}";
                url = url.replace(':id', $(this).val());
                console.log(url);


                $.ajax({
                    type: "get",
                    url: url,
                    dataType: "json",
                    success: function(response) {


                        console.log(response);
                        $('#companyName').val(response.name);
                        $('#companyAddress').val(response.address);
                        $('#latitude').val(response.lat);
                        $('#longtitude').val(response.lan);
                        $('#companyManagerName').val(response.manager);
                        $('#citizenship_id').html('');
                        $('#company_type_id').html('');
                        $('#company_active_type_id').html('');
                        $('#country').html('');
                        $('.country').html('');

                        $.each(response.companyType, function(index, value) {

                            if (value.id == response.type) {
                                $('#company_type_id').append(
                                    '<option selected value="' + value.id + '">' +
                                    value.companyTypeName + '</option>')
                            } else {
                                $('#company_type_id').append('<option value="' + value
                                    .id + '">' + value.companyTypeName + '</option>'
                                )
                            }

                        });

                        $.each(response.companyActiveType, function(index, value) {
                            if (value.id == response.activeType) {
                                $('#company_active_type_id').append(
                                    '<option selected value="' + value.id + '">' +
                                    value.companyName + '</option>')
                            } else {
                                $('#company_active_type_id').append('<option value="' +
                                    value.id + '">' + value.companyName +
                                    '</option>')
                            }

                        });

                        $.each(response.citizenships, function(index, value) {

                            if (response.country == 3) {
                                citizenship = 3;
                                if (value.id == 1) {
                                    $('#citizenship_id').append(
                                        '<option selected value="' + value.id +
                                        '">' + value.citizenshipName + '</option>')
                                } else {

                                    $('#citizenship_id').append('<option value="' +
                                        value.id + '">' + value.citizenshipName +
                                        '</option>')

                                }
                            } else {
                                $('.country').html('');
                                $('.country').append('<lable>هیواد</lable>')
                                $('.country').append(
                                    '<select name="country_id" id="country_id" class="form-control"></select>'
                                );

                                if (value.id == 2) {

                                    $('#citizenship_id').append(
                                        '<option selected value="' + value.id +
                                        '">' + value.citizenshipName + '</option>')
                                } else {

                                    $('#citizenship_id').append('<option value="' +
                                        value.id + '">' + value.citizenshipName +
                                        '</option>')

                                }

                                $.each(response.countries, function(index, value) {
                                    if (response.country == value.id) {

                                        $('#country_id').append(
                                            '<option selected value="' +
                                            value.id + '">' + value
                                            .contryName + '</option>')

                                    } else {
                                        $('#country').append(
                                            '<option selected value="' +
                                            value.id + '">' + value
                                            .contryName + '</option>')
                                    }
                                });

                            }

                        });

                    }
                });
            })

            $(document).on('change', '#citizenship_id', function(e) {

                if ($(this).val() == 2) {

                    $.ajax({
                        type: "get",
                        url: "{{ route('get.country') }}",
                        dataType: "json",
                        success: function(response) {
                            $('.country').html('');
                            $('.country').append('<lable>هیواد انتخاب کړی</lable>')

                            $('.country').append(
                                '<select name="country_id" id="country_id" class="form-control"><option selected disabled>هیواد انتخاب کړی</option></select>'
                            )

                            $.each(response.country, function(index, value) {
                                $('#country_id').append('<option value="' + value.id +
                                    '">' + value.contryName + '</option>')
                            });

                        }
                    })
                } else {
                    $('.country').html('');
                }



            })


            $(document).on('submit', '#updateCompany', function(e) {
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "{{ route('update.company') }}",
                    data: $(this).serialize(),
                    dataType: "json",
                    success: function(response) {
                        console.log(response);

                        $('#modal-xl').css('display', 'none');
                        $('[data-dismiss="modal"]').click();
                        $('#updateCompany')[0].reset();
                        swal('', response.message, 'success');
                        $('#cbody').html('');
                        if (response.company.country_id == 3) {

                            var company = `<tr><td>` + response.company.companyName +
                                `</td><td>` + response.company.aname + `</td>
                            <td>` + response.company.tname + `</td><td>` + response.company.companyManagerName + `</td><td>داخلی</td>
                            <td>` + response.company.companyAddress + `</td><td>` + response.company.latitude +
                                `</td><td>` + response.company.longtitude +
                                `</td>
                            <td><button type="button" class="btn btn-sm btn-primary jawaz">جوازونه<i class="far fa-file-contract"></i></button></td></tr>`;

                        } else {

                            var company = `<tr><td>` + response.company.companyName +
                                `</td><td>` + response.company.aname + `</td>
                            <td>` + response.company.tname + `</td><td>` + response.company.companyManagerName + `</td><td>خارجی</td>
                            <td>` + response.company.companyAddress + `</td><td>` + response.company.latitude +
                                `</td><td>` + response.company.longtitude +
                                `</td>
                            <td><button type="button" class="btn btn-sm btn-primary jawaz">جوازونه<i class="far fa-file-contract"></i></button></td></tr>`;

                        }

                        $('#cbody').append(company);

                    }
                })
            })


            $(document).on('click', '#licenseEdit', function(e) {
                e.preventDefault();
                let url = "{{ route('license.edit', ':id') }}";
                url = url.replace(':id', $(this).val());

                $.ajax({
                    type: "Get",
                    url: url,
                    dataType: "json",
                    success: function(response) {
                        $('#LicenseEditDev').html('');

                        let lNumber = `<div class="form-group col-md-3"><lable>د جواز نمبر</lable><input type="text" name="licenseNumber" class="form-control"
                            value="` + response.companyLicense.licenseNumber + `"></div>`;

                        $('#LicenseEditDev').append(lNumber);
                        $('#LicenseEditDev').append(
                            '<div class="form-group col-md-3"><lable>د جواز مرجع</lable><select id="license_type_id" name="license_type_id" class="form-control"></select></div>'
                        );

                        $.each(response.licenseType, function(index, value) {
                            if (value.id == response.licenseTypeId) {
                                $('#lEdit').html(value.licenseTypeName);
                                $('#license_type_id').append(
                                    '<option selected value="' + value.id + '">' +
                                    value.licenseTypeName + '</option>');
                            } else {
                                $('#license_type_id').append('<option value="' + value
                                    .id + '">' + value.licenseTypeName + '</option>'
                                );
                            }
                        })

                        let lData = `<div class="form-group col-md-3"><lable>د جواز د صدور نیټه</lable><input type="date" name="issueDate" class="form-control"
                            value="` + response.companyLicense.issueDate + `"></div>`;

                        $('#LicenseEditDev').append(lData);

                        let file = `<div class="form-group col-md-3"><lable>سکن شوی فایل</lable><input type="file" name="files" class="form-control"
                            value="` + response.companyLicense.files + `"></div>`;

                        let companyLicenseId = `<div class="form-group col-md-3"><input type="hidden" id="company_license_id" name="company_license_id" class="form-control"
                        value="` + response.companyLicense.id + `"></div>`;

                        $('#LicenseEditDev').append(file);
                        $('#LicenseEditDev').append(companyLicenseId);





                    }
                })

            })

            $(document).on('submit', '#licenseEditForm', function(e) {
                e.preventDefault();
                let lId = $('#company_license_id').val();

                $.ajax({
                    type: "post",
                    url: "{{ route('license.update') }}",
                    data: $(this).serialize(),
                    dataType: "json",
                    success: function(response) {
                        // alert('Samiullah Jahani Stanikzai');
                        console.log(response);
                        $('#lNumber' + lId).html(response.companyLices.licenseNumber);
                        $('#lTname' + lId).html(response.companyLices.ltname);
                        $('#issueDate' + lId).html(response.companyLices.issueDate);
                        $('#modal-lg').css('display', 'none');
                        $('[data-dismiss="modal"]').click();
                        $('#licenseEditForm')[0].reset();
                        swal('', response.message, 'success');

                    }
                })

            })

            $(document).on('click', '#licenseDelete', function(e) {
                e.preventDefault();
                $('#license-delete').html($('#lTname' + $(this).val()).html());
                $('#btnDeleteLicense').val($(this).val());
            })

            $(document).on('click', '#btnDeleteLicense', function(e) {
                e.preventDefault();
                let data = {
                    'id': $(this).val(),
                    'cmpId': $('#companyEdit').val(),
                }
                let url = "{{ route('license.delete') }}";
                $.ajax({
                    type: "get",
                    url: url,
                    data: data,
                    dataType: "json",
                    success: function(response) {

                        if (response.status == false) {
                            swal('', response.message, 'error');
                            $('#modal-danger-license').css('display', 'none');
                            $('[data-dismiss="modal"]').click();

                        } else {
                            $('#licenseTbody').html('');
                            $('#jawaz').removeClass('d-none');
                            $.each(response.data, function(index, value) {

                                $('#licenseTbody').append('<tr><td id="lNumber' + value
                                    .id +
                                    '">' + value.licenseNumber +
                                    '</td><td id="lTname' +
                                    value.id + '">' + value.ltname +
                                    '</td><td id="issueDate' + value.id + '">' +
                                    value
                                    .issueDate +
                                    '</td><td><button type="button" value="' + value
                                    .id +
                                    '" id="licenseEdit" class="btn btn-primary" data-toggle="modal" data-target="#modal-lg"><i class="fas fa-edit"></i></button><button type="button" id="licenseDelete" value="' +
                                    value.id +
                                    '" class="btn btn-danger" data-toggle="modal" data-target="#modal-danger-license"><i class="fas fa-trash-alt"></i></button></td></tr>'
                                );
                            })
                            swal('.', response.message, 'success');
                            $('#modal-danger-license').css('display', 'none');
                            $('[data-dismiss="modal"]').click();
                        }



                    }
                })


            })



            $(document).on('submit', '#licenseAddForm', function(e) {
                e.preventDefault();

                // console.log();

                $.ajax({
                    type: "POST",
                    url: "{{ route('add.license') }}",
                    data: new FormData(this),
                    dataType: "json",
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(response) {
                        // $("#exampleModal").modal("hide");
                        // alert('samiullah it was successfuly added ');
                        // $('#exampleModal').modal('hide');
                        if (response.status == false) {
                            swal('', response.message, 'error');
                            $('#modal-lg-add-license').css('display', 'none');
                            $('[data-dismiss="modal"]').click();
                            $('#licenseAddForm')[0].reset();
                        } else {
                            $('#modal-lg-add-license').css('display', 'none');
                            $('[data-dismiss="modal"]').click();
                            $('#licenseAddForm')[0].reset();
                            swal('', response.message, 'success');
                            $('#licenseTbody').append('<tr><td>' + response.license
                                .licenseNumber +
                                '</td><td>' + response.license.lname + '</td><td>' +
                                response
                                .license.issueDate +
                                '</td><td><button type="button" value="' + response.license
                                .id +
                                '" id="licenseEdit" class="btn btn-primary" data-toggle="modal" data-target="#modal-lg"><i class="fas fa-edit"></i></button><button type="button" id="licenseDelete" value="' +
                                response.license.id +
                                '"class="btn btn-danger" data-toggle="modal"data-target="#modal-danger-license"><i class="fas fa-trash-alt"></i></button></td></tr>'
                            )

                        }


                    }
                });
            });


        });
    </script>
@endsection
