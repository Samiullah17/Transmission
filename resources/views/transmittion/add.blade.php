@extends('layouts1.app')
@section('content')
   <style>
    .error{
        color: red;
    }
   </style>
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title" style="float: right">
                                <a href="{{ URL::previous() }}" class="btn btn-info btn-sm"> <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>



                        <div class="card-body table-responsive">

                            <div class="row agent d-none">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <th>د نماینده نوم</th>
                                        <th>د پلار نوم</th>
                                        <th>د تذکری شمیره</th>
                                        <th>عکس</th>
                                    </thead>
                                    <tbody id="agentTBody">

                                    </tbody>
                                </table>

                            </div>

                        </div>

                    </div>

                    <form action="{{ route('transmission.save') }}" method="POST" id="frm34"
                        enctype="multipart/form-data">
                        <div class="card">

                            @csrf
                            <div class="card-header">





                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label>د بنسټ نماینده انتخاب کړی</label>
                                        <select name="agent_id" id="agent_id" class="form-control">
                                            <option selected disabled>د بنسټ نماینده انتخاب کړی</option>
                                            @foreach ($agent as $item)
                                                <option value="{{ $item->id }}">{{ $item->agentName }}</option>
                                            @endforeach
                                        </select>
                                        <span class="text text-danger" role="alert">
                                            @error('agent_id')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label>پشنهادی فایل</label>
                                        <input type="hidden" name="agent_id1" id="orderAgentId" class="form-control">
                                        <input type="file" name="suggestion_file" id="sugesstionFile"
                                            placeholder="پشنهادی فایل وارد کړی" class="form-control">
                                            <span class="text text-danger" role="alert">
                                                @error('suggestion_file')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label>د فریکونسی تعداد</label>
                                        <input type="text" id="traQuantity" name="traQuantity"
                                            placeholder="د فریکونسی تعداد وارد کړی" class="form-control">
                                            <span class="text text-danger" role="alert">
                                                @error('suggestion_file')
                                                    {{ $message }}
                                                @enderror
                                            </span>

                                    </div>
                                </div>


                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <label>واکی ټاکی</label>
                                        <input type="checkbox" name="w" class="w">
                                        <input type="number" name="wakiTaki" id="wakiTaki" placeholder="د واکی ټاکی تعداد"
                                            class="form-control d-none">
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label>بیس ستیشن</label>
                                        <input type="checkbox" name="b" class="w">
                                        <input type="number" name="baseStation" id="baseStation"
                                            class="form-control d-none" placeholder="د بیس ستیشن تعداد ">
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
                                        <input type="number" name="repeter" id="repeter" class="form-control d-none"
                                            placeholder="د رپیتر تعداد">
                                    </div>



                                    <div class="col-md-2">
                                        <button class="btn btn-primary addTransmittion">اضافه کول</button>
                                    </div>


                                </div>
                            </div>
                            <div class="card-tools addFreq">

                            </div>
                            <div class="card-body table-responsive d-none cardAddTransmission">
                                <div class="row row0">

                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body table-responsive d-none cardAddTransmission">

                                <div id="row12">

                                </div>
                                <div id="rowSub">

                                </div>

                            </div>
                        </div>



                    </form>

                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
@endsection

@section('script')
<script>
    $(document).ready(function() {

        $('#frm34').validate({
            ignore:[],
            rules:{
                'transmission_type_id[]':'required',
                'transmission_model_id[]':'required',
                'provence_id[]':'required',
                'serialNo[]':'required',
                'agent_id':'required',
                'suggestion_file':'required',
            },
            messages:{

                'transmission_type_id[]':'په مهربانی سره د مخابری ډول انتخاب کړی!',
                'transmission_model_id[]':'په مهربانی سره د مخابری ماډل انتخاب کړی',
                'provence_id[]':'په مهربانی سره ولایت انتخاب کړی',
                'serialNo[]':'په مهربانی سره سریال نمبر داخل کړی',
                'agent_id':'د بنسټ نماینده انتخاب کړی',
                'suggestion_file':'پشنهادی فایل داخل کړی!',
            }
        });

        $('#company_id').select2();

        $(document).on('click','#addTransmittion',function(){
             $('.row').removeClass('d-none');
             $(this).addClass('d-none');
        });

        $(document).on('change','#agent_id',function(e){
            e.preventDefault();
            let id=$(this).val();

            $.ajax({
                type:"Get",
                url:"{{ route('agent.details') }}/"+id,
                dataType:"json",
                success:function(response){
                     if(response.status==true){
                      $('.agent').removeClass('d-none');
                      $('#agentTBody').html('');
                      $('#orderAgentId').val(response.agent.id);
                      $('#agentTBody').append('<tr><td>'+response.agent.agentName+'</td><td>'+response.agent.fName+'</td><td>'+response.agent.NIC+'</td><td> <img class="img-circle" height="90px" width="100px"  src="http://localhost:8000/storage/' + response.agent.photo.replace('public/', '') +'" /></td></tr>')
                     }else{
                        swal('','نماینده پیدا نشو!','error');
                     }
                },
                error:function(e){
                    swal('','نماینده پیدا نشو بیا کوشش وکړی','error');
                }
            });
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
            $(this).addClass('d-none');
            $('.cardAddTransmission').removeClass('d-none');
            $('.addFreq').append('<button type="button" style="float: right;" class="btn btn-primary btn-sm mt-2 ml-2 addSingleFreq"><i class="fas fa-plus-circle"></i></button>');
            var wakiTaki=`<div class="row pb-1"> <div class="form-group col-md-3">
                            <label for="">د دستګاه ډول</label>
                            <select name="transmission_type_id[]" id="" class="form-control">

                                @foreach ($transmissionType as $item)
                                @if($item->id==1)
                                <option  value="{{ $item->id }}">{{ $item->transmissionTypeName }}</option>
                                @endif
                                @endforeach
                            </select>
                            <span class="text text-danger" role="alert">
                                @error('transmission_type_id')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>


                        <div class="form-group col-md-3">
                            <label for="">د واکی ټاکی ماډل</label>
                            <select name="transmission_model_id[]" id="" class="form-control wmodal">
                                <option disabled selected>د واکی تاکی ماډل انتخاب کړی</option>
                                @foreach ($transmissionModel as $item)
                                <option value="{{ $item->id }}">{{ $item->transmissionModelName }}</option>

                                @endforeach
                            </select>
                            <span class="text text-danger" role="alert">
                                @error('transmission_model_id')
                                    {{ $message }}
                                @enderror
                             </span>
                        </div>


                        <div class="form-group col-md-3">
                            <label for="">ولایت</label>
                            <select name="provence_id[]" id="pro" class="form-control wprovence">
                                <option selected disabled>ولایت انتخاب کړی</option>
                                @foreach ($provence as $item)
                                <option value="{{ $item->id }}">{{ $item->provenceName }}</option>

                                @endforeach
                            </select>
                            <span class="text text-danger" role="alert">
                                @error('provence_id')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>


                        <div class="form-group col-md-2">
                            <label>سریال نمبر</label>
                            <input type="text" name="serialNo[]" placeholder="سریال نمبر ولیکی" class="form-control wserial">
                            <span class="text text-danger" role="alert">
                                @error('serialNo')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="col-1"><div class="card-title mt-4">
                            <i class="fas fa-window-close" style="color:red"></i></div></div></div>`;

            var base=`<div class="row pb-1"> <div class="form-group col-md-3">
                            <label for="">د دستګاه ډول</label>
                            <select name="transmission_type_id[]" id="" class="form-control">

                                @foreach ($transmissionType as $item)
                                @if($item->id==2)
                                <option value="{{ $item->id }}">{{ $item->transmissionTypeName }}</option>
                                @endif
                                @endforeach
                            </select>
                            <span class="text text-danger" role="alert">
                                @error('transmission_type_id')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>


                        <div class="form-group col-md-3">
                            <label for="">د بیس ستیشن ماډل</label>
                            <select name="transmission_model_id[]" id="" class="form-control bmodal">
                                <option selected disabled>د بیس سټیشن ماډل انتخاب کړی</option>

                                @foreach ($transmissionModel as $item)
                                <option value="{{ $item->id }}">{{ $item->transmissionModelName }}</option>

                                @endforeach
                            </select>
                            <span class="text text-danger" role="alert">
                                @error('transmission_model_id')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>


                        <div class="form-group col-md-3">
                            <label for="">ولایت</label>
                            <select name="provence_id[]" id="provence_id[]" class="form-control bprovence">
                                <option selected disabled>ولایت انتخاب کړی</option>
                                @foreach ($provence as $item)
                                <option value="{{ $item->id }}">{{ $item->provenceName }}</option>

                                @endforeach
                            </select>
                            <span class="text text-danger" role="alert">
                                @error('provence_id')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>


                        <div class="form-group col-md-2">
                            <label>سریال نمبر</label>
                            <input type="text" name="serialNo[]" placeholder="سریال نمبر ولیکی" class="form-control bserial">
                            <span class="text text-danger" role="alert">
                                @error('serialNo')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="col-1"><div class="card-title mt-4">
                            <i class="fas fa-window-close" style="color:red"></i></div></div></div>`;

            var code=`<div class="row pb-1"> <div class="form-group col-md-3">
                            <label for="">د دستګاه ډول</label>
                            <select name="transmission_type_id[]" id="" class="form-control">
                                @foreach ($transmissionType as $item)
                                @if($item->id==3)
                                 <option value="{{ $item->id }}">{{ $item->transmissionTypeName }}</option>
                                @endif
                                @endforeach
                            </select>
                            <span class="text text-danger" role="alert">
                                @error('transmission_type_id')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>


                        <div class="form-group col-md-3">
                            <label for="">د کودان ماډل</label>
                            <select name="transmission_model_id[]" id="" class="form-control cmodal">
                                <option disabled selected>د کودان ماډل انتخاب کړی</option>
                                @foreach ($transmissionModel as $item)
                                <option value="{{ $item->id }}">{{ $item->transmissionModelName }}</option>

                                @endforeach
                            </select>
                            <span class="text text-danger" role="alert">
                                @error('transmission_model_id')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>


                        <div class="form-group col-md-3">
                            <label for="">ولایت</label>
                            <select name="provence_id[]" id="pro" class="form-control cprovence">
                                <option selected disabled>ولایت انتخاب کړی</option>
                                @foreach ($provence as $item)
                                <option value="{{ $item->id }}">{{ $item->provenceName }}</option>

                                @endforeach
                            </select>
                            <span class="text text-danger" role="alert">
                                @error('provence_id')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>


                        <div class="form-group col-md-2">
                            <label>سریال نمبر</label>
                            <input type="text" name="serialNo[]" placeholder="سریال نمبر ولیکی" class="form-control cserial">
                            <span class="text text-danger" role="alert">
                                @error('serialNo')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="col-1"><div class="card-title mt-4">
                            <i class="fas fa-window-close" style="color:red"></i></div></div></div>`;

            var rep=`<div class="row pb-1"> <div class="form-group col-md-3">
                            <label for="">د دستګاه ډول</label>
                            <select name="transmission_type_id[]" id="" class="form-control">

                                @foreach ($transmissionType as $item)
                                @if($item->id==4)
                                <option value="{{ $item->id }}">{{ $item->transmissionTypeName }}</option>
                                @endif
                                @endforeach
                            </select>
                            <span class="text text-danger" role="alert">
                                @error('transmission_type_id')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>


                        <div class="form-group col-md-3">
                            <label for="">د رپیټر ماډل</label>
                            <select name="transmission_model_id[]" id="" class="form-control rmodal">
                                <option disabled selected>د رپیتر ماډل انتخاب کړی</option>
                                @foreach ($transmissionModel as $item)
                                <option value="{{ $item->id }}">{{ $item->transmissionModelName }}</option>

                                @endforeach
                            </select>
                            <span class="text text-danger" role="alert">
                                @error('transmission_model_id')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>


                        <div class="form-group col-md-3">
                            <label for="">ولایت</label>
                            <select name="provence_id[]" id="pro" class="form-control rprovence">
                                <option selected disabled>ولایت انتخاب کړی</option>
                                @foreach ($provence as $item)
                                <option value="{{ $item->id }}">{{ $item->provenceName }}</option>

                                @endforeach
                            </select>
                            <span class="text text-danger" role="alert">
                                @error('provence_id')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>


                        <div class="form-group col-md-2">
                            <label>سریال نمبر</label>
                            <input type="text" name="serialNo[]" placeholder="سریال نمبر ولیکی" class="form-control rserial">
                            <span class="text text-danger" role="alert">
                                @error('serialNo')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="col-1"><div class="card-title mt-4">
                            <i class="fas fa-window-close" style="color:red"></i></div></div></div>`;
            var f=`<div class="col-md-3 pb-2" id="div`+i+`">
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

            if(w>0){
                for(var i=0; i<w; i++){
                  $('#row12').append(wakiTaki);
                  $('.wmodal').attr('id','wm'+i);
                    $('.wprovence').attr('id','wp'+i);
                   $('.wserial').attr('id','ws'+i);
                   $('.wmodal').removeClass('wmodal');
                  $('.wprovence').removeClass('wprovence');
                  $('.wserial').removeClass('wserial');
                }

            }



            if(b>0){
              for(var i=0; i<b; i++){
                $('#row12').append(base);

                $('.bmodal').attr('id','bm'+i);
                $('.bprovence').attr('id','bp'+i);
                $('.bserial').attr('id','bs'+i);
                $('.bmodal').removeClass('bmodal');
                $('.bprovence').removeClass('bprovence');
                $('.bserial').removeClass('bserial');
              }
            }
            if(c>0){
              for(i=0;i<c; i++){
                $('#row12').append(code);

                $('.cmodal').attr('id','cm'+i);
                $('.cprovence').attr('id','cp'+i);
                $('.cserial').attr('id','cs'+i);
                $('.cmodal').removeClass('cmodal');
                $('.cprovence').removeClass('cprovence');
                $('.cserial').removeClass('cserial');
              }
            }
            if(r>0){
              for(i=0; i<r; i++){
                $('#row12').append(rep);
                $('.rmodal').attr('id','rm'+i);
                $('.rprovence').attr('id','rp'+i);
                $('.rserial').attr('id','rs'+i);
                $('.rmodal').removeClass('rmodal');
                $('.rprovence').removeClass('rprovence');
                $('.rserial').removeClass('rserial');
              }
            }
            if(freq>0){
              for(i=1; i<=freq; i++){

                $('.row0').append(`<div class="col-md-3 pb-2" id="div`+i+`">
                    <button type="button" class="btn btn-sm removFreq"  onclick="$('#div`+i+`').remove()"><i class="fas fa-window-close" style="color:red"></i></button>
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
                            </div>`);
              }
           }

            $('#rowSub').append(`<div class="col-md-12">
                            <input type="submit" class="btn btn-success" value='ذخیره کردن'>
                            <button type="button" style="float: left;" class="btn btn-primary btn-sm mt-2 ml-0 addSingleTransmission"><i class="fas fa-plus-circle"></i></button>
                            </div>
                         `);
        });

        $(document).on('click','.addSingleTransmission',function(){
            var rep=`<div class="row pb-1"> <div class="form-group col-md-3">
                            <label for="">د دستګاه ډول</label>
                            <select name="transmission_type_id[]" id="" class="form-control">
                                <option selected disabled>د مخابری نوعه انتخاب کړی</option>

                                @foreach ($transmissionType as $item)
                                <option value="{{ $item->id }}">{{ $item->transmissionTypeName }}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="form-group col-md-3">
                            <label for="">د رپیټر ماډل</label>
                            <select name="transmission_model_id[]" id="" class="form-control">
                                <option disabled selected>د مخابری ماډل انتخاب کړی</option>
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


                        <div class="form-group col-md-2">
                            <label>سریال نمبر</label>
                            <input type="text" name="serialNo[]" placeholder="سریال نمبر ولیکی" class="form-control">

                        </div>
                        <div class="col-1"><div class="card-title mt-4">
                            <i class="fas fa-window-close" style="color:red"></i></div></div></div>`;

                        $('#row12').append(rep);



        });

        $(document).on('click','.addSingleFreq',function(e){
            e.preventDefault();
            let i=parseInt($('#traQuantity').val())+1;
            if(i>0){
                $('#traQuantity').val(i);

            }
            else{
                $('#traQuantity').val(1);
            }


            $('.row0').append(`<div class="col-md-3 pb-2" id="div`+i+`">
                    <button type="button" class="btn btn-sm removFreq" onclick="$('#div`+i+`').remove()"><i class="fas fa-window-close" style="color:red"></i></button>
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
                            </div>`);
        })

        $(document).on('click','.removFreq',function(e){
            e.preventDefault();
            let i=parseInt($('#traQuantity').val());

            if(i>0){
                 i=i-1;
                 $('#traQuantity').val(i);

            }
            else{
                $('#traQuantity').val(0);
            }

        })

        $(document).on('click','[class="fas fa-window-close"]',function(e){
            e.preventDefault();
            $(this).closest("[class='row pb-1']").remove();
        });

    });
</script>
@endsection
