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
                                data-toggle="modal"data-target="#modal-xl">د رسمی نماینده اضافه کول</button>
                                {{-- <button type="button" class="btn btn-link" data-mdb-ripple-color="dark">Link 2</button> --}}



                            </div>
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
                                        <th>د ریس تابعیت</th>
                                        <th>د کمپنی ادرس</th>
                                        <th>لیتیتود</th>
                                        <th>لونک تیتود</th>

                                    </tr>
                                </thead>
                                <tbody>
                                     <td>{{ $company->companyName }}</td>
                                     <td>{{ $company->aname }}</td>
                                     <td>{{ $company->tname }}</td>
                                     <td>{{ $company->companyManagerName }}</td>
                                     <td>

                                        @if($company->country_id==1 || $company->country_id==3)
                                            داخلی
                                        @endif

                                         @if($company->country_id>4 || $company->country_id==2)
                                            خارجی
                                         @endif

                                     </td>

                                    {{-- <td>{{ $company->country_id }}</td> --}}
                                    <td>{{ $company->companyAddress }}</td>
                                    <td>{{ $company->latitude }}</td>
                                    <td>{{ $company->longtitude }}</td>
                                    <td><button type="button" class="btn btn-sm btn-primary jawaz">جوازونه</button></td>


                                </tbody>
                            </table>


                            <h6 id="jawaz1" class="d-none">د کمپنی/بنسټ د جوازونو او مراجعو معلومات</h6>


                            <table id="jawaz" class="table table-striped table-bordered table-hover d-none">

                                <thead>
                                    <th>د جواز نمبر</th>
                                    <th>د جواز مرجع</th>
                                    <th>د جواز د صدرو تاریخ</th>
                                    <th>عکس</th>
                                </thead>

                                <tbody>
                                    @foreach ($companylicense as $item)

                                    <tr>
                                        <td>{{ $item->licenseNumber }}</td>
                                        <td>{{ $item->ltname }}</td>
                                        <td>{{ $item->issueDate }}</td>
                                        <td>{{ $item->files }}</td>

                                    </tr>

                                    @endforeach
                                </tbody>
                            </table>



                             <table class="table table-striped table-hover table-border">
                                <thead>
                                    <th>د نماینده نوم</th>
                                    <th>د پلار نوم</th>
                                    <th>د تلفون شمیره</th>
                                    <th>ایمیل</th>
                                    <th>عکس</th>
                                    <th></th>
                                </thead>
                                <tbody>
                                    @foreach ($cagent as $item)
                                    <tr>
                                        <td>{{ $item->agentName }}</td>
                                        <td>{{ $item->fName }}</td>
                                        <td>{{ $item->phone }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td></td>
                                        <td><a href="{{ route('agent.cdetails',$item->id) }}" class="btn btn-primary">معلومات</a></td>
                                    </tr>

                                    @endforeach
                                </tbody>
                             </table>





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
                                                @csrf
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
                                                        <select name="odistrict_id" id="odistrict_id" class="form-control">
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
                                                        <select name="cdistrict_id" id="odistrict_id" class="form-control">
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

                                                    <input type="text" class="form-control" value="{{ $company->id }}" name="company_id" id="company_id">


                                                </div>

                                                <div class="row">
                                                    <label>د کوم ولایت مخابری</label>
                                                    <select name="provence_id" id="provence_id"  class="form-control select2">
                                                        <option selected  disabled>ولایت/ولایتونه انتخاب کړی</option>
                                                        @foreach ($provence as $item)

                                                        <option value="{{ $item->id }}">{{ $item->provenceName }}</option>

                                                        @endforeach

                                                    </select>
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

                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>



            {{-- Start of Second Dev --}}






















            {{-- End of Second Dev --}}












        </div>
    </div>
@endsection
@section('script')

<script>
    $(document).ready(function(){


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
                        $('#modal-xl').css('display', 'none');
                        $('[data-dismiss="modal"]').click();
                        $('#agentSave')[0].reset();
                    }
                });
            })

            $(document).on('click','.jawaz',function(){
                  $('#jawaz').toggleClass('d-none');
                  $('#jawaz1').toggleClass('d-none');
            })



    });
</script>



@endsection
