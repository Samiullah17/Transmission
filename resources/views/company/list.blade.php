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
                        <div class="card-body table-responsive">
                            {{-- <table class="table table-head-fixed table-hover table-striped d-none">
                                <thead>
                                    <tr>
                                        <th>د کمپنی نوم</th>
                                        <th>د فعالیت ډول</th>
                                        <th>د موسسی/بنست ډول</th>
                                        <th>د ریس نوم</th>
                                    </tr>
                                </thead>
                                <tbody id="tbody">


                                    @foreach ($companies as $company)

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
                                                    <li class="dropdown-item"><a href="{{ route('details.company',$company->id) }}">تاریخچه</a></li>
                                                    <li class="dropdown-item"><button id="companyId" value="{{ $company->id }}" data-mdb-ripple-color="dark" data-toggle="modal"data-target="#modal-xl1" class="text-primary">د مخابرو ثبت</button></li>

                                                </ul>
                                            </div>
                                            <!-- /btn-group -->
                                        </div></td>

                                    </tr>

                                    @endforeach
                                </tbody>
                            </table> --}}

                            <table class="table table-hover user_datatable">

                                <thead >

                                    <tr>
                                        <th style="text-align: start">د کمپنی نوم</th>
                                        <th style="text-align: start">د فعالیت ډول</th>
                                        <th style="text-align: start">د موسسی/بنست ډول</th>
                                        <th style="text-align: start">د ریس نوم</th>
                                        <th style="text-align: start">معلومات</th>
                                        <th></th>
                                        {{-- <th></th> --}}
                                    </tr>

                                </thead>

                                <tbody>

                                </tbody>

                            </table>
                        </div>

                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>


        {{-- Start Of Company Registration Model --}}

        <div class="modal fade" id="modal-xl">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">د بنسټ د ثبت برخه</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body mr-5">
                        <form action="{{ route('save.company') }}" method="POST" id="companySave" enctype="multipart/form-data">
                            @csrf
                            <div class="row">

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">د موسسی/ بنسټ نوم<span class="text-danger">*</span></label>
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
                                        <label for="text">د بنست ډول<span class="text-danger">*</span></label>
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
                                        <label for="">د فعالیت ډول<span class="text-danger">*</span></label>
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
                            <p style="background-color:#dfe1e8; width: 30%;border-radius: 4px 4px;padding: 0.2rem; color:black" class="text-bold">د موسسی/بنسټ د ادرس برخه</p>

                            <div class="row">



                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>د بنسټ/کمپنی آدرس<span class="text-danger">*</span></label>
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
                            <p style="background-color:#dfe1e8; width: 30%;border-radius: 4px 4px;padding: 0.2rem; color:black" class="text-bold">د بنسټ د ریس معلومات</p>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="text">د بنست د ریس نوم<span class="text-danger">*</span></label>
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
                                        <label for="text">د بنست د ریس تابعیت<span class="text-danger">*</span></label>
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

                            <p style="background-color:#dfe1e8; width: 35%;border-radius: 4px 4px;padding: 0.2rem; color:black" class="text-bold">د موسسی/بنسټ د جواز او د جواز مراجعو برخه</p>


                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">

                                        <label>د جواز مرجع<span class="text-danger">*</span></label>
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
            {data: 'action'},
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
                    agentName: "د نماینده نوم ضروری ده",
                    fName: "د نماینده د پلار نوم ضروری ده",
                    gFName: "د نماینده د نیکه نوم ضروری ده",
                    NIC: "د تذکری شمیره ضروری ده",
                    phone:{
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

            $('#companySave').validate({
                rules:{
                    companyName:"required",
                    company_type_id:"required",
                    company_active_type_id:"required",
                    companyAddress:"required",
                    companyManagerName:"required",
                    citizenship_id:"required",
                    license_type_id:"required",
                },
                messages:{
                    companyName:"د کمپنی نوم ضروری ده",
                    company_type_id:"د کمپنی/بنسټ ډول ضروری ده",
                    company_active_type_id:"د کمپنی/بنسټ د فعالیت ډول انتخاب کړی",
                    companyAddress:"د کمپنی آدرس ضروری ده",
                    companyManagerName:"د کمپنی/بنسټ د ریس نوم داخل کړی",
                    citizenship_id:"د ریس تابعیت انتخاب کړی",
                    license_type_id:"لیګ تر لیګه د یوه د جواز مرجع انتخاب کړی",
                }
            })


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
                    <label>جواز نمبر</label>
                    <input type="hidden" name="licenseTypeId[]" id="economical" value="`+id+`" class="form-control">
                    <input type="date" name="issueDate[]" id="issueDate" class="form-control">
                    <input type="text"  placeholder="جواز نمبر ولیکی"  name="licenseNumber[]" class="form-control">
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



            $(document).on('click','#companyId',function(e){
                $('#company_id').val($(this).val());
                var id=$(this).val();
                $('#adetails').html('');

                $.ajax({
                    type: "GET",
                    url: "{{ route('company.agent') }}/"+id,
                    dataType: "json",
                    success: function(response) {
                        console.log(response);
                        $('#agent_id').html('');
                        $('#agent_id').append('<option selected>د بنسټ نماینده انتخاب کړی</option>');

                        $.each(response.agent, function(index, value) {
                             $('#agent_id').append('<option value="'+value.id+'">'+value.agentName+'</option>');
                           });
                        // $("#exampleModal").modal("hide");
                        // alert('samiullah it was successfuly added ');
                        // $('#exampleModal').modal('hide');
                        // $('#exampleModal').css('display', 'none');
                        // $('[data-dismiss="modal"]').click();
                        // $('#regForm')[0].reset();
                    }
                });

            })




            $(document).on('change','#agent_id',function(){
                var id=$(this).val();


                $.ajax({
                    type: "GET",
                    url: "{{ route('agent.details') }}/"+id,
                    dataType: "json",
                    success: function(response) {
                        $('.table-agent').removeClass('d-none');
                             $('#adetails').html('');
                             console.log(response);
                        // $.each(response.agent, function(index, value) {
                             $('#adetails').html('<tr><td>'+response.agent.agentName+'</td><td>'+response.agent.fName+'</td><td>'+response.agent.NIC+'</td><td>'+response.agent.NIC+'</td><td><form method="POST" id="frmSugest" action="'+response.route+'">@csrf<input type="hidden" name="agent_id" value="'+response.agent_id+'"><input type="hidden" name="company_id" value="'+response.company_id+'"><div class="form-inline"><lable>پشنهادی فایل</lable><input type="file" name="suggestion_file" class="form-control"><input type="submit" value="ثبت" class="btn btn-primary"></div></form></tr>');
                        //    });
                        // $("#exampleModal").modal("hide");
                        // alert('samiullah it was successfuly added ');
                        // $('#exampleModal').modal('hide');
                        // $('#exampleModal').css('display', 'none');
                        // $('[data-dismiss="modal"]').click();
                        // $('#regForm')[0].reset();
                    }
                });

            })




        })




    </script>


@endsection
