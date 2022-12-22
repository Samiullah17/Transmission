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
                                    data-toggle="modal" data-target="#modal-xl">د نوی کمپنی اضافه کول</button>
                                {{-- <button type="button" class="btn btn-link" data-mdb-ripple-color="dark">Link 2</button> --}}

                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive ">
                            <table class="table  table-hover  user_datatable ">
                                <thead> 
                                    <tr>
                                        <th class="col-md-3" style="text-align: start">د کمپنی نوم</th>
                                        <th class="col-md-3" style="text-align:  start">د فعالیت ډول</th>
                                        <th class="col-md-2" style="text-align:  start">د موسسی/بنست ډول</th>
                                        <th  class="col-md-2" style="text-align:  start">د ریس نوم</th>
                                        <th class="col-md-2" style="text-align:  start">معلومات</th>

                                    </tr>
                                </thead>
                                <tbody id="tbody">


                                    {{-- @foreach ($companies as $company)

                                    <tr>
                                        <td>{{ $company->companyName }}</td>
                                        <td>{{ $company->aname }}</td>
                                        <td>{{ $company->tname }}</td>
                                        <td>{{ $company->companyManagerName }}</td>
                                        <td> <div class="input-group input-group-sm mb-3">
                                            <div class="input-group-prepend">
                                                <button type="button" class="btn btn-primary dropdown-toggle"
                                                    data-toggle="dropdown">
                                                    معلومات
                                                </button>
                                                <ul class="dropdown-menu"> 
                                                    <li class="dropdown-item"><a href="#"><i
                                                                class="bi bi-archive"></i>ویرایش</a></li>
                                                    <li class="dropdown-item"><a href="{{ route('details.company',$company->id) }}">تاریخچه</a></li>
                                                    <li class="dropdown-item"><a href="{{ route('saveRight.company',$company->id) }}">حق ثبت</a></li>
                                                    <li class="dropdown-item"><a href="{{ route('licence.company',$company->id) }}">تمدید</a></li>
                                                    <li class="dropdown-item"><a href="{{ route('fine.company',$company->id) }}">جریمه</a></li>


                                                    <li class="dropdown-item"><a href="#"
                                                            class="text text-danger">حذف</a></li>
                                                    <li class="dropdown-divider"></li>
                                                </ul>
                                            </div> --}}
                                            <!-- /btn-group -->
                                        {{-- </div></td>

                                    </tr>

                                    @endforeach
 --}}


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

        {{-- <div class="modal fade" id="modal-xl">
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
        </div> --}}





        {{-- End of Agent Register --}}

        {{-- Start Of Company Registration Model --}}

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
                        <form action="{{ route('save.company') }}" method="POST" id="agentSave" enctype="multipart/form-data">
                            @csrf
                            <div class="row">

                                <div class="col-md-4">
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

                                <div class="col-md-4">
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


                                <div class="col-md-4">
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
                            <h6>د موسسی/بنسټ د ادرس برخه</h6>

                            <div class="row">



                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>د بنسټ/کمپنی آدرس</label>
                                        <input type="text" placeholder="د کمپنی آدرس ولیکی" name="companyAddress" class="form-control">
                                    </div>
                                </div>


                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>لیتیتود</label>
                                        <input type="text" placeholder="لیتیتود داخل کړی" name="letitude" class="form-control">
                                    </div>
                                </div>


                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>لونګ تیتود</label>
                                        <input type="text" placeholder="لونګ تیتود داخل کړی" name="longtutude" class="form-control">
                                    </div>
                                </div>

                            </div>
                            <h6>د بنسټ د ریس معلومات</h6>
                            <div class="row">
                                <div class="col-md-4">
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

                                <div class="col-md-4">
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

                            <h6>د موسسی/بنسټ د جواز او د جواز مراجعو برخه</h6>


                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">

                                        <label>د جواز مرجع</label>
                                        <select name="license_type_id" id="license_type_id"  class="form-control">
                                            <option selected disabled>د جواز مرجع انتخاب کړی</option>
                                            @foreach ($licenseType as $item)

                                            <option value="{{ $item->id }}">{{ $item->licenseTypeName }}</option>

                                            @endforeach


                                        </select>

                                    </div>
                                </div>


                            </div>
                            <div class="row license">

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

        {{-- End of Company Registration Model --}}







    </div>





@endsection
@section('script')
    <script>

$(function () {
    var table = $('.user_datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('users.index') }}",
        columns: [
            {data:'companyName'},
            {data: 'aname'},
            {data: 'tname'},
            {data: 'companyManagerName'},
            {data: 'action',
            //   name:'action'
            //   orderable:true,
            //   searchable:true
        },
            // {data: 'action', name: 'action', orderable: false, searchable: false},
        ],
        language: {
                    "emptyTable": "دیتا موجود نیست .",
                   "lengthMenu": "نمایش _MENU_ معلومات",
                    "info": "معلومات شماره START الی END مجموعه معلومات TOTAL",
                    "infoEmpty": "معلومات شماره 0 الی 0 از 0 تعداد مجموعه",
                    "search": "جستجو کردن : ",
                    "sProcessing": "در حال اضافه نمودن معلومات...",
                    "paginate": {
                        "first": "اول",
                        "last": "آخر",
                        "next": "بعدی",
                        "previous": "قبلی"
                    },
                },
    });
  });


        $(document).ready(function() {


            function loadData(){

                $.ajax({
                    type: "GET",
                    url: "{{ route('list.company') }}",
                    dataType: "json",
                    success: function(response) {
                        console.log(response);
                        // $("#exampleModal").modal("hide");
                        // alert('samiullah it was successfuly added ');
                        // $('#exampleModal').modal('hide');
                        // $('#exampleModal').css('display', 'none');
                        // $('[data-dismiss="modal"]').click();
                        // $('#regForm')[0].reset();
                    }
                });

            }


            // $('#regForm').on('submit', function(e) {
            //     e.preventDefault();
            //     $.ajax({
            //         type: "POST",
            //         url: "{{ route('save.company') }}",
            //         data: $(this).serialize(),
            //         dataType: "json",
            //         success: function(response) {
            //             // $("#exampleModal").modal("hide");
            //             // alert('samiullah it was successfuly added ');
            //             // $('#exampleModal').modal('hide');
            //             $('#exampleModal').css('display', 'none');
            //             $('[data-dismiss="modal"]').click();
            //             $('#regForm')[0].reset();
            //         }
            //     });
            // })




            // $('#agentSave').on('submit', function(e) {
            //     e.preventDefault();
            //     $.ajax({
            //         type: "POST",
            //         url: "{{ route('save.agent') }}",
            //         data: $(this).serialize(),
            //         dataType: "json",
            //         success: function(response) {
            //             // $("#exampleModal").modal("hide");
            //             // alert('samiullah it was successfuly added ');
            //             // $('#exampleModal').modal('hide');
            //             $('#exampleModal').css('display', 'none');
            //             $('[data-dismiss="modal"]').click();
            //             $('#regForm')[0].reset();
            //         }
            //     });
            // })





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


            $(document).on('change','#license_type_id',function(){

                var id = $(this).val();
                 var economical=`<div class="form-group col-md-3" id="div`+id+`">
                    <button type="button" class="btn btn-sm btn-danger" onclick="$('#div`+id+`').remove()">Colse</button>
                    <label>د اقتصاد وزارت جواز نمبر  </label>
                    <input type="hidden" name="licenseTypeId[]" id="economical" value="`+id+`" class="form-control">
                    <input type="date" name="issueDate[]" id="issueDate" class="form-control">
                    <input type="text"  placeholder="د اقتصاد وزارت جواز نمبر ولیکی"  name="licenseNumber[]" class="form-control">
                    <input type="file" name="licenseFile[]" id="economicalId" class="form-control">
                     </div>
                    `;

                    $('.license').append(economical);
                    // $('#license_type_id').attr('disabled',true);
                    // var mani=`<div class="form-group col-md-3">
                    // <label>د شاروالی جواز نمبر  </label>
                    // <input type="text" name="mani[]" id="mani" class="form-control">
                    // <input type="text" placeholder="د شاروالی جواز نمبر ولیکی"  name="mani[]" class="form-control">
                    // <input type="file" name="mani[]" id="maniId" class="form-control">
                    //  </div>
                    // `;


                    // var bank=`<div class="form-group col-md-3">
                    // <label>د بانک جواز نمبر  </label>
                    // <input type="text" name="bank[]" id="bank" class="form-control">
                    // <input type="text" placeholder="د افغانتسان بانک جواز نمبر ولیکی"  name="bank[]" class="form-control">
                    // <input type="file" name="bank[]" id="bankId" class="form-control">
                    //  </div>
                    // `;
                    // if($('#license_type_id').val()==1){

                    //     $('.license').append(economical);
                    //     $('#economical').val($('#license_type_id').val());

                    // }

                    // if($('#license_type_id').val()==2){

                    //     $('.license').append(mani);
                    //     $('#mani').val($('#license_type_id').val());
                    // }
                    // if($('#license_type_id').val()==3){
                    //     $('.license').append(bank);
                    //     $('#bank').val($('#license_type_id').val());
                    // }





            });




        })


    </script>
@endsection
