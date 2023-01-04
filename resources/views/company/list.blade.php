@extends('layouts1.app')

@section('content')
<style>
    .error{
        color:red;
        font-size: 12px;
    }
</style>
    <div class="content-wrapper">

        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">


                        <div class="card-title">
                            <a href="{{ URL::previous() }}" class="btn btn-info"> <i class="fas fa-arrow-right"></i></a>
                            
                            <button type="button" style="float: left" class="btn btn-primary" data-mdb-ripple-color="dark"
                            data-toggle="modal" data-target="#modal-xl">د نوی کمپنی اضافه کول</button>

                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">

                                <form  id="frmSearch">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="">د کمپنی نوم</label>
                                                <input type="text" name="company_name" placeholder="د کمپنی نوم" class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>د فعالیت ډول</label>
                                                <select name="company_active_type_id" id="company_type_id" class="form-control">
                                                    <option selected >د کمپنی د فعالیت ډول انتخاب کړی</option>
                                                    @foreach ($companyActiveType as $item)
                                                    <option value="{{ $item->id }}">{{ $item->companyName }}</option>

                                                    @endforeach
                                                </select>

                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>د بنسټ ډول</label>
                                                <select name="company_type_id" id="company_type_id" class="form-control">
                                                    <option selected >د کمپنی نوعه انتخاب کړی</option>
                                                    @foreach ($companyType as $item)
                                                    <option value="{{ $item->id }}">{{ $item->companyTypeName }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>د ریس نوم</label>
                                                <input type="text" name="ManagerName" placeholder="د ریس نوم ولیکی" class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-md-1">

                                             <a href="{{ route('company.search') }}" id='searchcom' class="btn btn-success mt-4">
                                                <i class="fas fa-search"></i>
                                            </a>


                                        </div>


                                    </div>
                                </form>





                        </div>


                        <!-- /.card-header -->
                        <div class="card-body table-respone">
                            <table class="table table-sm table-border table-striped ctable">

                                <thead >

                                    <tr>
                                        <th style="text-align: start">د کمپنی نوم</th>
                                        <th style="text-align: start">د فعالیت ډول</th>
                                        <th style="text-align: start">د موسسی/بنست ډول</th>
                                        <th style="text-align: start">د ریس نوم</th>
                                        <th>حالت</th>
                                         <th></th>
                                        {{-- <th></th> --}}
                                    </tr>
                                </thead>
                                <tbody id="tbody1">
                                      <x-company-search-component :companys="$companys"></x-company-search-component>
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
        var liArr = [];
        $(document).ready(function() {


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

                if(liArr.includes(id)){
                    swal('.','جواز اضافه شوی دوهم ځل یې نشی اضافه کولی','error');

                }else{
                    let name=$('#license_type_id :selected').text();

                    var economical=`<div class="form-group col-md-3" id="div`+id+`">
                    <button type="button" class="btn btn-sm" onclick="deleteLicense(`+id+`)"><i class="fas fa-window-close" style="color:red"></i></button>
                    <label>د `+name+` جواز نمبر</label>
                    <input type="hidden" name="licenseTypeId[]" id="economical" value="`+id+`" class="form-control">
                    <input type="date" name="issueDate[]" id="issueDate" class="form-control">
                    <input type="text"  placeholder="د اقتصاد وزارت جواز نمبر ولیکی"  name="licenseNumber[]" class="form-control">
                    <input type="file" name="licenseFile[]" id="economicalId" class="form-control">
                     </div>
                    `;

                    $('.license').append(economical);
                     liArr.push(id);
                }
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


            $(document).on('click','#searchcom, .page-link',function(e){
                e.preventDefault();
                let searchformdata=$('#frmSearch').serialize();
                $.ajax({
                    url: $(this).attr('href'),
                    data: searchformdata,
                    success:function(response){
                        $('#tbody1').html(response.success)

                    }
                })
            })


        });

        function deleteLicense(id){
            liArr = $.grep(liArr, function(value) {
                        return value != id;
                    });
              $('#div'+id).remove();

        }
    </script>
@endsection
