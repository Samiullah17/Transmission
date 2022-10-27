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
                                                    <input type="text" class="form-control" name="compnayID"
                                                        id="compnayID" placeholder="د موسسی یا شرکت ای دی نمبر">
                                                    <span class="text text-danger" role="alert">
                                                        @error('compnayID')
                                                            {{ $message }}
                                                        @enderror
                                                    </span>
                                                </div>
                                            </div>



                                            <div class="col-md-3">
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
                                                        @error('company_active_type_id')
                                                            {{ $message }}
                                                        @enderror
                                                    </span>
                                                </div>
                                            </div>





                                        </div>

                                        <div class="row">



                                            <div class="col-md-2">
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






                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>د فریکونسی تعداد</label>
                                                    <input type="text" id="freQuantity" name="freQuantity"
                                                        placeholder="د فریکونسی تعداد ولیکی" class="form-control">
                                                        <span class="text text-danger" role="alert">
                                                            @error('freQuantity')
                                                                {{ $message }}
                                                            @enderror
                                                        </span>
                                                </div>
                                            </div>


                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>د بنسټ/کمپنی آدرس</label>
                                                    <input type="text" placeholder="د کمپنی آدرس ولیکی" name="companyAddress" class="form-control">
                                                </div>
                                            </div>

                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>لیتیتود</label>
                                                    <input type="text" placeholder="لیتیتود داخل کړی" name="letitude" class="form-control">
                                                </div>
                                            </div>

                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>لونګ تیتود</label>
                                                    <input type="text" placeholder="لونګ تیتود داخل کړی" name="longtutude" class="form-control">
                                                </div>
                                            </div>



                                        </div>

                                        <div class="row" id="row3">

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

                                            <div class="col-md-3 country">

                                            </div>



                                        </div>

                                        {{-- <div class="row d-none" id="citizenship">

                                        </div> --}}


                                        <h6>د بنست/کمپنی د رسمی نماینده معلومات</h6>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>د نماینده نوم</label>
                                                    <input type="text" name="agentName" class="form-control"
                                                        placeholder="د نماینده نوم ولیکی">
                                                        <span class="text text-danger" role="alert">
                                                            @error('agentName')
                                                                {{ $message }}
                                                            @enderror
                                                        </span>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">د پلار نوم</label>
                                                    <input type="text" name="fName" class="form-control"
                                                        placeholder="د نماینده د پلار نوم ">
                                                        <span class="text text-danger" role="alert">
                                                            @error('fName')
                                                                {{ $message }}
                                                            @enderror
                                                        </span>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">د نیکه نوم</label>
                                                    <input type="text" name="gFName" class="form-control"
                                                        placeholder="د نماینده د نکیه نوم">
                                                        <span class="text text-danger" role="alert">
                                                            @error('gFName')
                                                                {{ $message }}
                                                            @enderror
                                                        </span>
                                                </div>
                                            </div>


                                        </div>

                                        <div class="row">



                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">د تذکره شمیره</label>
                                                    <input type="text" name="NIC" class="form-control"
                                                        placeholder="د تذکری شمیره">
                                                        <span class="text text-danger" role="alert">
                                                            @error('NIC')
                                                                {{ $message }}
                                                            @enderror
                                                        </span>
                                                </div>
                                            </div>





                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">د تلفون شمیره</label>
                                                    <input type="text" name="phone" class="form-control"
                                                        placeholder="د نماینده داړیکی شمیره">
                                                        <span class="text text-danger" role="alert">
                                                            @error('phone')
                                                                {{ $message }}
                                                            @enderror
                                                        </span>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">ایمیل آدرس</label>
                                                    <input type="text" name="email" class="form-control"
                                                        placeholder="د نماینده ایمیل آدرس">
                                                        <span class="text text-danger" role="alert">
                                                            @error('email')
                                                                {{ $message }}
                                                            @enderror
                                                        </span>
                                                </div>
                                            </div>
                                        </div>
                                        <h5>د رسمی نماینده اصلی استوګنځی</h5>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>هیواد</label>
                                                    <input type="text" disabled value="افغانستان"
                                                        class="form-control">

                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="">ولایت</label>
                                                    <select name="provence" id="provence" class="form-control">
                                                        <option disabled selected>ولایت انتخاب کړی</option>
                                                        @foreach ($provence as $item)
                                                            <option value="{{ $item->id }}">{{ $item->provenceName }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <span class="text text-danger" role="alert">
                                                        @error('provence')
                                                            {{ $message }}
                                                        @enderror
                                                    </span>
                                                </div>
                                            </div>



                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="">ولسوالی</label>
                                                    <select name="odistrict_id" id="odistrict_id" class="form-control">
                                                        <option disabled selected>ولسوالی انتخاب کړی</option>
                                                        @foreach ($district as $item)
                                                            <option value="{{ $item->id }}">{{ $item->districtName }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <span class="text text-danger" role="alert">
                                                        @error('odistrict_id')
                                                            {{ $message }}
                                                        @enderror
                                                    </span>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="">کلی</label>
                                                    <input type="text" name="ovillage" class="form-control"
                                                        placeholder="د اصلی کلی نوم ولیکی">
                                                        <span class="text text-danger" role="alert">
                                                            @error('ovillage')
                                                                {{ $message }}
                                                            @enderror
                                                        </span>
                                                </div>
                                            </div>


                                        </div>

                                        <h5>فعلی استوګنځی</h5>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>هیواد</label>
                                                    <input type="text" disabled value="افغانستان"
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="">ولایت</label>
                                                    <select name="provence" id="provence" class="form-control">
                                                        <option disabled selected>ولایت انتخاب کړی</option>
                                                        @foreach ($provence as $item)
                                                            <option value="{{ $item->id }}">{{ $item->provenceName }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="">ولسوالی</label>
                                                    <select name="cdistrict_id" id="cdistrict_id" class="form-control">
                                                        <option disabled selected>ولسوالی انتخاب کړی</option>
                                                        @foreach ($district as $item)
                                                            <option value="{{ $item->id }}">{{ $item->districtName }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <span class="text text-danger" role="alert">
                                                        @error('cdistrict_id')
                                                            {{ $message }}
                                                        @enderror
                                                    </span>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="">کلی</label>
                                                    <input type="text" name="cvillage" class="form-control"
                                                        placeholder="د فعلی کلی نوم ولیکی">
                                                        <span class="text text-danger" role="alert">
                                                            @error('cvillage')
                                                                {{ $message }}
                                                            @enderror
                                                        </span>
                                                </div>
                                            </div>



                                        </div>

                                        <h5>د مخابرو د ثبت برخه</h5>

                                        <div class="row">

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>واکی ټاکی</label>
                                                    <input type="checkbox" name="wakitaki">
                                                    <input type="number" name="wakiTaki" id="wakiTaki"
                                                        placeholder="د واکی ټاکی تعداد" class="form-control d-none">
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>بیس ستیشن</label>
                                                    <input type="checkbox" name="wakitaki">
                                                    <input type="number" name="baseStation" id="baseStation"
                                                        class="form-control d-none" placeholder="د بیس ستیشن تعداد ">
                                                </div>
                                            </div>

                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>کودان</label>
                                                    <input type="checkbox" name="wakitaki">
                                                    <input type="number" name="codeOn" id="codeOn"
                                                        class="form-control d-none" placeholder="د کودان تعداد">
                                                </div>
                                            </div>

                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>رپیتر</label>
                                                    <input type="checkbox" name="wakitaki">
                                                    <input type="number" name="repeter" id="repeter"
                                                        class="form-control d-none" placeholder="د رپیتر تعداد">
                                                </div>
                                            </div>


                                            <div class="col-md-2">
                                                <button class="btn btn-primary addTransmittion">اضافه کول</button>
                                            </div>


                                        </div>

                                        <h6 class="d d-none">د فریکونسی نمبر/نمبرونه داخل کړی</h6>


                                        <div class="row d-none d" id="row1">

                                        </div>

                                        <h6 class="d d-none">د مخابرو او وسایلو ډولونه داخل کړی</h6>


                                        <div class="row d-none" id="row2">



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



                // $('#tfalse').change(function() {

                //     $('.tra').addClass('collapse');
                //     $('.tr').prop('disabled', true);

                // });

                // $('#ttrue').change(function() {

                //     $('.tra').removeClass('collapse');
                //     $('.tr').removeAttr('disabled');

                // });

                $(document).on('change', '[name="wakitaki"]', function(e) {
                    e.preventDefault();

                    $(this).next().toggleClass('d-none');
                });


                // $('#regForm').on('submit', function(e) {

                //     e.preventDefault();
                //     $.ajax({
                //         type: "POST",
                //         url: "{{ route('save.company') }}",
                //         data: $(this).serialize(),
                //         dataType: "json",
                //         success: function(response) {
                //             console.log(response);

                //             alert('successfuly added company ');

                //         }
                //     });
                // })





            $(document).on('click','.addTransmittion',function(e){
                e.preventDefault();
                var w=Number($('#wakiTaki').val());
                var b=Number($('#baseStation').val());
                var c=Number($('#codeOn').val());
                var r=Number($('#repeter').val());
                var f=Number($('#freQuantity').val());
                $('#row2').removeClass('d-none');
                $('.d').removeClass('d-none');

                var sum=w+b+c+r;

                var wakiTaki=` <div class="form-group col-md-3">
                                  <label for="">د دستګاه ډول</label>
                                  <select name="transmission_type_id[]" id="" class="form-control">

                                    @foreach ($transmissionType as $item)

                                    <option  value="{{ $item->id }}">{{ $item->transmissionTypeName }}</option>
                                    @endforeach
                                  </select>
                                </div>


                            <div class="form-group col-md-3">
                                <label for="">د واکی ټاکی ماډل</label>
                                <select name="transmission_model_id[]" id="" class="form-control">
                                    <option disabled selected>د واکی تاکی ماډل انتخاب کړی</option>
                                    @foreach ($transmissionModel as $item)
                                    <option value="{{ $item->id }}">{{ $item->transmissionModelName }}</option>

                                    @endforeach
                                </select>
                            </div>


                            <div class="form-group col-md-3">
                                <label for="">ولایت</label>
                                <select name="provence_id[]" id="pro" class="form-control">
                                    <option selected disabled>ولایت انتخاب کړی</option>
                                    @foreach ($provence as $item)
                                    <option value="{{ $item->id }}">{{ $item->provenceName }}</option>

                                    @endforeach
                                </select>
                            </div>


                            <div class="form-group col-md-3">
                                <label>سریال نمبر</label>
                                <input type="text" name="serialNo[]" placeholder="سریال نمبر ولیکی" class="form-control">

                            </div>`;

                var base=` <div class="form-group col-md-3">
                                <label for="">د دستګاه ډول</label>
                                <select name="transmission_type_id[]" id="" class="form-control">

                                    @foreach ($transmissionType as $item)


                                    <option value="{{ $item->id }}">{{ $item->transmissionTypeName }}</option>



                                    @endforeach
                                </select>
                            </div>


                            <div class="form-group col-md-3">
                                <label for="">د بیس ستیشن ماډل</label>
                                <select name="transmission_model_id[]" id="" class="form-control">

                                    @foreach ($transmissionModel as $item)
                                    <option value="{{ $item->id }}">{{ $item->transmissionModelName }}</option>

                                    @endforeach
                                </select>
                            </div>


                            <div class="form-group col-md-3">
                                <label for="">ولایت</label>
                                <select name="provence_id[]" id="provence_id[]" class="form-control">
                                    <option selected disabled>ولایت انتخاب کړی</option>
                                    @foreach ($provence as $item)
                                    <option value="{{ $item->id }}">{{ $item->provenceName }}</option>

                                    @endforeach
                                </select>
                            </div>


                            <div class="form-group col-md-3">
                                <label>سریال نمبر</label>
                                <input type="text" name="serialNo[]" placeholder="سریال نمبر ولیکی" class="form-control">

                            </div>`;

                var code=` <div class="form-group col-md-3">
                                <label for="">د دستګاه ډول</label>
                                <select name="transmission_type_id[]" id="" class="form-control">
                                    @foreach ($transmissionType as $item)
                                     <option value="{{ $item->id }}">{{ $item->transmissionTypeName }}</option>

                                    @endforeach
                                </select>
                            </div>


                            <div class="form-group col-md-3">
                                <label for="">د کودان ماډل</label>
                                <select name="transmission_model_id[]" id="" class="form-control">
                                    <option disabled selected>د کودان ماډل انتخاب کړی</option>
                                    @foreach ($transmissionModel as $item)
                                    <option value="{{ $item->id }}">{{ $item->transmissionModelName }}</option>

                                    @endforeach
                                </select>
                            </div>


                            <div class="form-group col-md-3">
                                <label for="">ولایت</label>
                                <select name="provence_id[]" id="pro" class="form-control">
                                    <option selected disabled>ولایت انتخاب کړی</option>
                                    @foreach ($provence as $item)
                                    <option value="{{ $item->id }}">{{ $item->provenceName }}</option>

                                    @endforeach
                                </select>
                            </div>


                            <div class="form-group col-md-3">
                                <label>سریال نمبر</label>
                                <input type="text" name="serialNo[]" placeholder="سریال نمبر ولیکی" class="form-control">

                            </div>`;

                var rep=` <div class="form-group col-md-3">
                                <label for="">د دستګاه ډول</label>
                                <select name="transmission_type_id[]" id="" class="form-control">

                                    @foreach ($transmissionType as $item)


                                    <option value="{{ $item->id }}">{{ $item->transmissionTypeName }}</option>



                                    @endforeach
                                </select>
                            </div>


                            <div class="form-group col-md-3">
                                <label for="">د رپیټر ماډل</label>
                                <select name="transmission_model_id[]" id="" class="form-control">
                                    <option disabled selected>د رپیتر ماډل انتخاب کړی</option>
                                    @foreach ($transmissionModel as $item)
                                    <option value="{{ $item->id }}">{{ $item->transmissionModelName }}</option>

                                    @endforeach
                                </select>
                            </div>


                            <div class="form-group col-md-3">
                                <label for="">ولایت</label>
                                <select name="provence_id[]" id="pro" class="form-control">
                                    <option selected disabled>ولایت انتخاب کړی</option>
                                    @foreach ($provence as $item)
                                    <option value="{{ $item->id }}">{{ $item->provenceName }}</option>

                                    @endforeach
                                </select>
                            </div>


                            <div class="form-group col-md-3">
                                <label>سریال نمبر</label>
                                <input type="text" name="serialNo[]" placeholder="سریال نمبر ولیکی" class="form-control">

                            </div>`;

                var freQuantity=`<div class="col-md-3"><div class="form-group">

                    <label>د فریکونسی نمبر</lable>
                    <input type="text" name="frqNo[]" placeholder="د فرکونسی نمبر" class="form-control">
                    <select name="provenceid" id="provenceid" class="form-control">

                        <option disabled selected>ولایت انتخاب کړی</option>
                        @foreach($provence as $item)

                        <option value="{{ $item->id }}">{{ $item->provenceName }}</option>


                        @endforeach

                    </select>
                    </div>
                    </div>
                    `;

                for(let i=0; i<f; i++){

                    $('#row1').append(freQuantity);

                }

                for(var i=0; i<w; i++){

                    $('#row2').append(wakiTaki)

                }

                for(var i=0; i<b; i++){
                    $('#row2').append(base);
                }

                for(i=0;i<c; i++){
                    $('#row2').append(code);
                }

                for(i=0; i<r; i++){
                    $('#row2').append(rep);
                }









            })


            $(document).on('change','#citizenship_id',function(){
                let ctId=$('#citizenship_id').val();
                if(ctId==2){
                    let country=`
                        <div class="form-group">
                            <label>هیواد انتخاب کړی</label>
                            <select name="country" class="form-control">
                                <option selected disabled>د بنسټ د ریس هیواد انتخاب کړی</option>
                                @foreach($countires as $country)
                                <option value="{{ $country->id }}">{{ $country->contryName }}</option>
                                @endforeach
                                </select>
                        </div>`;



                        $('.country').append(country);


                }

                else{
                     $('.country').html('');
                }
            });






        });
        </script>
    @endsection
