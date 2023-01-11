@extends('layouts1.app')

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




                                {{-- <button type="button" class="btn btn-link" data-mdb-ripple-color="dark">Link 2</button> --}}



                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">


                         <div class="row">
                            <div class="form-group col-md-6">
                                <label>کمپنی/بنسټ انتخاب کړی</label>
                                <select name="company_id" id="company_id" class="form-control">
                                    <option selected disabled>د بنسټ نوم انتخاب کړی</option>
                                    @foreach ($companies as $company)
                                    <option value="{{ $company->id }}">{{ $company->companyName }}</option>

                                    @endforeach

                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label>د بنسټ نماینده انتخاب کړی</label>
                                <select name="agent_id" id="agent_id" class="form-control">
                                    <option selected disabled>نماینده انتخاب کړی</option>

                                </select>
                            </div>
                         </div>




                        <div class="row d-none fre">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>د فریکونسی تعداد</label>
                                    <input type="text" id="traQuantity" name="traQuantity" placeholder="د فریکونسی تعداد وارد کړی" class="form-control">

                                </div>
                            </div>
                        </div>




                            <form action="{{ route('transmission.save1') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="row d-none tra">


                                <div class="form-group col-md-3">
                                    <label>واکی ټاکی</label>
                                    <input type="checkbox" name="w" class="w">
                                    <input type="number" name="wakiTaki" id="wakiTaki" placeholder="د واکی ټاکی تعداد"
                                        class="form-control d-none">
                                </div>

                                <div class="form-group col-md-3">
                                    <label>بیس ستیشن</label>
                                    <input type="checkbox" name="b" class="w">
                                    <input type="number" name="baseStation" id="baseStation" class="form-control d-none"
                                        placeholder="د بیس ستیشن تعداد ">
                                </div>

                                <div class="form-group col-md-2">
                                    <label>کودان</label>
                                    <input type="checkbox" name="c" class="w">
                                    <input type="number" name="codeOn" id="codeOn" class="form-control d-none"
                                        placeholder="د کودان تعداد">
                                </div>

                                <div class="form-group col-md-2">

                                    <label>رپیتر</label>
                                    <input type="checkbox" name="r" class="w">
                                    <input type="number" name="repeter" id="repeter" class="form-control d-none" placeholder="د رپیتر تعداد">
                                </div>

                                <div class="col-md-2">
                                    <button class="btn btn-primary addTransmittion">اضافه کول</button>
                                </div>


                            </div>

                            <input type="hidden" name="agent_id" id="agentId"  class="form-control">
                            <input type="hidden" name="company_id" id="companyId" class="form-control">




                           <div class="row row0">

                           </div>

                            <div class="row" id="row">

                            </div>

                            </form>
                        {{--  --}}


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



            $(document).on('change','#company_id',function(e){
                e.preventDefault();
                $('#companyId').val($(this).val());
                $.ajax({
                        type: "get",
                        url: "{{ route('company.agent') }}/"+$(this).val(),
                        dataType: "json",
                        success: function(response) {

                            $('.fre').addClass('d-none');
                            $('.tra').addClass('d-none');

                            $('#agent_id option').remove();
                            $('#agent_id').append('<option selected disabled>نماینده انتخاب کړی</option>')

                            $.each(response.agent, function(index, value) {
                             $('#agent_id').append('<option value="'+value.id+'">'+value.agentName+'</option>');
                           });

                        }
                  });

            })

            $(document).on('change','#agent_id',function(e){
                e.preventDefault();
                $('#agentId').val($(this).val());
                $('.fre').removeClass('d-none');
                $('.tra').removeClass('d-none');

            })


            $(document).on('click','#addTransmittion',function(e){
                e.preventDefault();
                 $('.row').removeClass('d-none');

            });




            $(document).on('change', '.w', function(e) {
                e.preventDefault();
                $(this).next().toggleClass('d-none');
            });

            $(document).on('click','.addTransmittion',function(e){
                e.preventDefault();
                var w=Number($('#wakiTaki').val());
                var b=Number($('#baseStation').val());
                var c=Number($('#codeOn').val());
                var r=Number($('#repeter').val());
                var freq=Number($('#traQuantity').val());


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
                                    @if($item->id == 2)
                                    <option value="{{ $item->id }}" >{{ $item->transmissionTypeName }}</option>
                                    @endif
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
                var f=`   <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">د فریکونسی معلومات</label>
                                        <input type="text" name="freqNumber[]" placeholder="د فریکونسی نمبر" class="form-control">
                                        <select name="fprovence[]" class="form-control" id="provence">
                                            <option selected disabled>ولایت انتخاب کړی</option>
                                            @foreach ($provence as $item)
                                            <option value="{{ $item->id }}">{{ $item->provenceName }}</option>
                                            @endforeach
                                        </select>
                                        <input type="file" name="afile[]" class="form-control">
                                    </div>
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

                for(i=0; i<freq; i++){

                    $('.row0').append(f);

                }

                $('#row').append(`

                                <input type="submit" class="btn btn-primary col-md-12" value='ذخیره کردن'>
                             `);






            })
        });
    </script>
@endsection
