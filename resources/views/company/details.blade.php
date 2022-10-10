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
                                @if ($company->agentName==Null)



                                <button type="button" class="btn btn-primary" data-mdb-ripple-color="dark"
                                data-toggle="modal"data-target="#modal-xl">د رسمی نماینده اضافه کول</button>
                                {{-- <button type="button" class="btn btn-link" data-mdb-ripple-color="dark">Link 2</button> --}}
                                @endif


                            </div>
                        </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-head-fixed">
                                <thead>
                                    <tr>
                                        <th>د کمپنی نوم</th>
                                        <th>د کمپنی/بنست آی</th>
                                        <th>د فعالیت ډول</th>
                                        <th>د موسسه/بسنت جواز نمبر</th>
                                        <th>د موسسی/بنست ډول</th>
                                        <th>د ریس نوم</th>
                                        <th>د موسسه/بسنت د ریس تابعیت</th>

                                    </tr>
                                </thead>
                                <tbody>
                                     <td>{{ $company->companyName }}</td>
                                     <td>{{ $company->companyId }}</td>
                                     <td>{{ $company->aname }}</td>
                                     <td>{{ $company->licenceNo }}</td>
                                     <td>{{ $company->tname }}</td>
                                     <td>{{ $company->companyManagerName }}</td>
                                     <td>{{ $company->cname }}</td>

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





          @if ($company->agentName!=Null)



          <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-tools">
                             <h6>د بنسټ د رسمی نماینده/نماینده ګانو لیست</h6>
                        </div>
                        <div class="card-title">



                        </div>
                    </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-head-fixed">
                            <thead>
                                <tr>
                                    <th>د نماینده نوم</th>
                                    <th>د پلار نوم</th>
                                    <th>د تلفون شمیره</th>
                                    <th>ایمیل</th>
                                    <th>عکس</th>
                                </tr>
                            </thead>
                            <tbody>
                                  <td>{{ $company->agentName }}</td>
                                  <td>{{ $company->fName }}</td>
                                  <td>{{ $company->phone }}</td>
                                  <td>{{ $company->email }}</td>
                            </tbody>
                        </table>














                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>




          @endif









            {{-- End of Second Dev --}}












        </div>
    </div>
@endsection
@section('script')

<script>
    $(document).ready(function(){


        $('#agentSave').on('submit', function(e) {
                e.preventDefault();
                alert('form is submiting')
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

    });
</script>



@endsection
