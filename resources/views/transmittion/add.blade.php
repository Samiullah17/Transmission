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
                            <div class="card-title" id="ctitle">




                                <button type="button" id="btn" class="btn btn-primary" data-mdb-ripple-color="dark"
                                    data-toggle="modal"data-target="#modal-xl">د رسمی نماینده اضافه کول</button>

                                {{-- <button type="button" class="btn btn-link" data-mdb-ripple-color="dark">Link 2</button> --}}



                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">


                        <div class="row">
                            <div class="form-group col-md-5">
                                <label>د بنسټ/شرکت نوم</label>

                                <select name="company_id" id="company_id" class="form-control">

                                    <option selected disabled>د کمپنی نوم انتخاب کړی</option>
                                    @foreach ($companies as $company)
                                        <option value="{{ $company->id }}">{{ $company->companyName }}</option>
                                    @endforeach

                                </select>


                            </div>

                            <div class="form-group col-md-5">
                                <label>د مربوطه بنسټ/شرکت نماینده انتخاب کړی</label>
                                <select name="agent_id" id="agent_id" class="form-control">
                                    <option disabled selected>نماینده انتخاب کړی</option>



                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <table class="table table-striped table-bordered table-hover">
                                <thead id="thead">


                                    <tbody id="tbody">

                                    </tbody>
                                </thead>
                            </table>

                        </div>





                        {{--  --}}





                        <div class="row d-none">


                            <div class="form-group col-md-3">
                                <label>واکی ټاکی</label>
                                <input type="checkbox" name="wakitaki">
                                <input type="number" name="wakiTaki" id="wakiTaki" placeholder="د واکی ټاکی تعداد"
                                    class="form-control d-none">
                            </div>

                            <div class="form-group col-md-3">
                                <label>بیس ستیشن</label>
                                <input type="checkbox" name="wakitaki">
                                <input type="number" name="baseStation" id="baseStation" class="form-control d-none"
                                    placeholder="د بیس ستیشن تعداد ">
                            </div>

                            <div class="form-group col-md-2">
                                <label>کودان</label>
                                <input type="checkbox" name="wakitaki">
                                <input type="number" name="codeOn" id="codeOn" class="form-control d-none"
                                    placeholder="د کودان تعداد">
                            </div>

                            <div class="form-group col-md-2">

                                <label>رپیتر</label>
                                <input type="checkbox" name="wakitaki">
                                <input type="number" name="repeter" id="repeter" class="form-control d-none" placeholder="د رپیتر تعداد">
                            </div>

                            <div class="col-md-2">
                                <button class="btn btn-primary addTransmittion">اضافه کول</button>
                            </div>


                        </div>

                        <form action="{{ route('transmission.save') }}" method="POST" enctype="multipart/form-data">

                            @csrf

                            <div class="row d-none">
                                <div class="form-group col-md-4">
                                    <label for="">د فریکونسی تعداد</label>
                                    <input type="text" name="traQuantity" class="form-control" placeholder="د فریکونسی تعداد وارد کړی">
                                </div>

                                <div class="form-group">
                                    <label for="">د فریکونسی نمبر</label>
                                    <input type="text" name="frqNo" class="form-control" placeholder="د فریکونسی نمبر وارد کړی">
                                </div>
                            </div>

                            <div class="row" id="row">



                            </div>


                        </form>










                        {{--  --}}







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
                                                    <input type="text" name="NIC" class="form-control"
                                                        placeholder="د تذکری شمیره">
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
                                                            <option value="{{ $item->id }}">{{ $item->provenceName }}
                                                            </option>
                                                        @endforeach
                                                    </select>

                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="">ولسوالی</label>
                                                    <select name="odistrict_id" id="odistrict_id" class="form-control">
                                                        <option disabled selected>ولسوالی انتخاب کړی</option>
                                                        @foreach ($district as $item)
                                                            <option value="{{ $item->id }}">{{ $item->districtName }}
                                                            </option>
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
                                                            <option value="{{ $item->id }}">{{ $item->provenceName }}
                                                            </option>
                                                        @endforeach
                                                    </select>

                                                </div>


                                                <div class="form-group col-md-4">
                                                    <label for="">ولسوالی</label>
                                                    <select name="cdistrict_id" id="odistrict_id" class="form-control">
                                                        <option disabled selected>ولسوالی انتخاب کړی</option>
                                                        @foreach ($district as $item)
                                                            <option value="{{ $item->id }}">{{ $item->districtName }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="from-group col-md-4">
                                                    <label for="">کلی</label>
                                                    <input type="text" name="cvillage" class="form-control"
                                                        placeholder="د فعلی کلی نوم ولیکی">
                                                </div>

                                                 <input type="text" class="form-control"  name="ag_company_id" id="companyId">


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
        $(document).ready(function() {

          // Start of Agent Submitting
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
                        console.log(response);
                        $('#modal-xl').css('display', 'none');
                        $('[data-dismiss="modal"]').click();
                        $('#agentSave')[0].reset();
                    }
                });
            })


            // End of Agent Submiting

              $('#company_id').select2();

            // Start of Company on Change
            $(document).on('change', '#company_id', function() {

                var cid = $('#company_id').val();
                $('#companyId').val(cid);





                $.ajax({
                    type: "get",
                    url: "{{ route('company.agent') }}/" + cid,
                    dataType: "json",
                    success: function(response) {
                        $('#agent_id option').remove();
                        $('#tbody td').remove();
                        $('#thead th').remove();
                        $('#agent_id').append('<option disabled selected>نماینده انتخاب کړی</option>');
                        $.each(response.agent, function(index, value) {
                            $('#agent_id').append('<option value="'+value.id+'">'+value.agentName+'</option>');
                        });
                    }
                });

            });

            // End of Company on Change


            // Start of Agent on Change
            $('#agent_id').select2();
            $(document).on('change','#agent_id',function(e){
                e.preventDefault();


                var aid=$('#agent_id').val();


                $.ajax({
                    type: "get",
                    url: "{{ route('agent.details') }}/" + aid,
                    dataType: "json",
                    success: function(response) {
                        $('#tbody td').remove();
                        $('#thead th').remove();
                        // alert('called');
                         console.log(response.agent);
                         var  data = `<tr><th>نوم</th><th>د پلار نوم</th><th>آدرس</th><th>عکس</th></tr>`;
                         $('#thead').append(data);
                         var adata=`<tr><td>`+response.agent.agentName+`</td>/<td>`+response.agent.fName+`</td>
                            <td>`+response.agent.phone+`</td><td>`+response.agent.email+`</td></tr>`;
                         $('#tbody').append(adata);
                         var btn=` <button type="button" class="btn btn-primary" data-mdb-ripple-color="dark"
                         id="addTransmittion">د  مخابرو اضافه کول</button>`;
                         $('#btn').addClass('d-none');
                         $('#ctitle').append(btn);
                    }
                });



            });

            // End of Agent on Change


            $(document).on('click','#addTransmittion',function(e){
                e.preventDefault();
                 $('.row').removeClass('d-none');

            });




            $(document).on('change', '[name="wakitaki"]', function(e) {
                e.preventDefault();
                $(this).next().toggleClass('d-none');
            });

            $(document).on('click','.addTransmittion',function(e){
                e.preventDefault();
                var w=Number($('#wakiTaki').val());
                var b=Number($('#baseStation').val());
                var c=Number($('#codeOn').val());
                var r=Number($('#repeter').val());

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

                for(var i=0; i<w; i++){

                    $('#row').append(wakiTaki)

                }

                for(var i=0; i<b; i++){
                    $('#row').append(base);
                }

                for(i=0;i<c; i++){
                    $('#row').append(code);
                }

                for(i=0; i<r; i++){
                    $('#row').append(rep);
                }

                $('#row').append(`
                                <input type="text" name="company_agent_id" id="cm_ag_id"  class="form-control d-none">
                                <input type="text" name="tr_company_id" id="tr_company_id" class="form-control d-none">
                                <input type="submit" class="btn btn-primary col-md-12" value='ذخیره کردن'>
                             `);
                 $('#cm_ag_id').val($('#agent_id').val());
                 $('#tr_company_id').val($('#company_id').val());






            })









        });
    </script>
@endsection
