@extends('layouts1.app')

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
                                    <h4 style="background-color:#6b6865; width: 30%;border-radius: 4px 4px;padding: 0.3rem; color:white">د موسساتو او شرکتونو د ثبت برخه</h4>
                                </div>

                                <!-- /.card-header -->
                                <!-- form start -->
                                <form role="form" method="POST" action="{{ route('save.company1') }}" id="regForm"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body">
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

                                        <p style="background-color:#6b6865; width: 30%;border-radius: 4px 4px;padding: 0.2rem; color:white">د موسسی/بنسټ د آدرس برخه</p>
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

                                        <p  style="background-color:#6b6865; width: 30%;border-radius: 4px 4px;padding: 0.2rem; color:white">د موسسی/بنسټ د ریس معلومات</p>

                                        <div class="row" id="row3">

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

                                            <div class="col-md-4 country">

                                            </div>



                                        </div>


                                        <p style="background-color:#6b6865; width: 30%;border-radius: 4px 4px;padding: 0.2rem; color:white">د موسسی/بنسټ د جوازونو برخه</p>
                                        <div class="row license">



                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="">د جواز نمبر</label>
                                                     <select name="license_type_id" id="license_type_id" class="form-control">
                                                        <option selected disabled>د جواز مرجع انتخاب کړی</option>
                                                        @foreach ($licenseType as $item)

                                                        <option value="{{ $item->id }}">{{ $item->licenseTypeName }}</option>

                                                        @endforeach
                                                     </select>
                                                    <span class="text text-danger" role="alert">
                                                        @error('licenseNumber')
                                                            {{ $message }}
                                                        @enderror
                                                    </span>
                                                </div>
                                            </div>

                                        </div>

                                        {{-- <div class="row d-none" id="citizenship">

                                        </div> --}}





















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






      });
    </script>
  @endsection
