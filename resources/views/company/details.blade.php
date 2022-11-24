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







                                <button type="button" id="companyDelete" value="{{ $company->id }}" class="btn btn-danger"
                                    data-toggle="modal" data-target="#modal-danger"><i
                                        class="fas fa-trash-alt"></i></button>

                                <button type="button" id="companyEdit" value="{{ $company->id }}" class="btn btn-primary"
                                    data-mdb-ripple-color="dark" data-toggle="modal"data-target="#modal-xl"><i
                                        class="fas fa-edit"></i></button>


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
                            <tbody id="cbody">
                                <td>{{ $company->companyName }}</td>
                                <td>{{ $company->aname }}</td>
                                <td>{{ $company->tname }}</td>
                                <td>{{ $company->companyManagerName }}</td>
                                <td>

                                    @if ($company->country_id == 3)
                                        داخلی
                                    @endif

                                    @if ($company->country_id != 3)
                                        خارجی
                                    @endif

                                </td>


                                <td>{{ $company->companyAddress }}</td>
                                <td>{{ $company->latitude }}</td>
                                <td>{{ $company->longtitude }}</td>
                                <td><button type="button" class="btn btn-sm btn-primary jawaz">جوازونه<i
                                            class="far fa-file-contract"></i></button></td>


                            </tbody>
                        </table>


                        <h6 style="background-color:#6b6865; width: 30%;border-radius: 4px 4px;padding: 0.4rem; color:white"
                            id="jawaz1" class="d-none">د کمپنی/بنسټ د جوازونو او مراجعو معلومات</h6>


                        <table id="jawaz" class="table table-striped table-bordered table-hover d-none">

                            <thead>
                                <th>د جواز نمبر</th>
                                <th>د جواز مرجع</th>
                                <th>د جواز د صدرو تاریخ</th>
                                <th>عکس</th>
                                <th></th>
                            </thead>
                            <tbody>


                                @foreach ($companylicense as $item)
                                    <tr>
                                        <td>{{ $item->licenseNumber }}</td>
                                        <td>{{ $item->ltname }}</td>
                                        <td>{{ $item->issueDate }}</td>
                                        <td>{{ $item->files }}</td>
                                        <td><button type="button" value="{{ $item->id }}" id="licenseEdit"
                                                class="btn btn-primary" data-toggle="modal" data-target="#modal-lg"><i class="fas fa-edit"></i></button>
                                            <button type="button" id="licenseDelete" value="{{ $item->id }}"
                                                class="btn btn-danger"><i
                                                    class="fas fa-trash-alt"></i></button>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <h6
                            style="background-color:#6b6865; width: 30%;border-radius: 4px 4px;padding: 0.4rem; color:white">
                            د بنسټ رسمی نماینده معلومات</h6>



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
                                        <td><a href="{{ route('agent.cdetails', ['id' => $item->id, 'cid' => $company->id]) }}"
                                                class="btn btn-primary">معلومات</a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>





                        <div class="modal fade" id="modal-xl">
                            <div class="modal-dialog modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">د کمپنی/بنسټ د معلوماتو تغیرول</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body mr-5">
                                        <form action="#" id="updateCompany" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">

                                                <input type="hidden" name="company_id" class="form-control"
                                                    value="{{ $company->id }}">

                                                <div class="form-group col-md-4">
                                                    <label for="">د کمپنی/بنسټ نوم</label>
                                                    <input type="text" name="companyName" id="companyName"
                                                        class="form-control" placeholder="د نماینده نوم ولیکی">
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="">د کمپنی/بنسټ نوعه</label>
                                                    <select name="company_type_id" id="company_type_id"
                                                        class="form-control"></select>
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="">د کمپنی/بنسټ د فعالیت ډول</label>
                                                    <select name="company_active_type_id" id="company_active_type_id"
                                                        class="form-control"></select>
                                                </div>

                                            </div>

                                            <div class="row">


                                                <div class="form-group col-md-4">
                                                    <label for="">د کمپنی آدرس</label>
                                                    <input type="text" name="companyAddress" id="companyAddress"
                                                        class="form-control" placeholder="د کمپنی آدرس">
                                                </div>


                                                <div class="form-group col-md-4">
                                                    <label for="">لیتیتود</label>
                                                    <input type="text" name="latitude" id="latitude"
                                                        class="form-control">

                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="">لونګ تیتود</label>
                                                    <input type="text" name="longtitude" id="longtitude"
                                                        class="form-control">
                                                </div>


                                            </div>

                                            <div class="row">
                                                <div class="form-group col-md-4">
                                                    <label for="">د کمپنی/بنسټ د ریس نوم</label>
                                                    <input type="text" name="companyManagerName"
                                                        id="companyManagerName" class="form-control">
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="">تابعیت</label>
                                                    <select name="citizenship_id" id="citizenship_id"
                                                        class="form-control"></select>
                                                </div>

                                                <div class="form-group col-md-4 country">

                                                </div>

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



        <div class="modal fade" id="modal-danger">
            <div class="modal-dialog">
                <div class="modal-content bg-danger">
                    <div class="modal-header">
                        <h4 class="modal-title">اخطار</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>آیا تاسو مطمین یې چی د ( {{ $company->companyName }} ) کمپنی/بنسټ حذف کړی؟</p>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-outline-light" data-dismiss="modal">نه</button>
                        <button type="button" class="btn btn-outline-light">هو</button>
                    </div>
                </div>

            </div>

        </div>


        {{-- End of Second Dev --}}
        {{-- Start of License Edit --}}



        <div class="modal fade" id="modal-lg">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">د {{ $company->companyName }} کمپنی/بنسټ د جواز د تغیر برخه</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                         <div id="LicenseEditDev" class="row">

                         </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">بندول</button>
                        <button type="button" class="btn btn-primary">ثبت</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>





        {{-- End of License Edit --}}










    </div>
    </div>
@endsection
@section('script')
    <script>
        var citizenship = 0;
        $(document).ready(function() {



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

            $(document).on('click', '.jawaz', function() {
                $('#jawaz').toggleClass('d-none');
                $('#jawaz1').toggleClass('d-none');
            })


            $(document).on('click', '#companyEdit', function(e) {
                e.preventDefault();


                let url = "{{ route('company.edit', ':id') }}";
                url = url.replace(':id', $(this).val());
                console.log(url);


                $.ajax({
                    type: "get",
                    url: url,
                    dataType: "json",
                    success: function(response) {


                        console.log(response);
                        $('#companyName').val(response.name);
                        $('#companyAddress').val(response.address);
                        $('#latitude').val(response.lat);
                        $('#longtitude').val(response.lan);
                        $('#companyManagerName').val(response.manager);
                        $('#citizenship_id').html('');
                        $('#company_type_id').html('');
                        $('#company_active_type_id').html('');
                        $('#country').html('');
                        $('.country').html('');

                        $.each(response.companyType, function(index, value) {

                            if (value.id == response.type) {
                                $('#company_type_id').append(
                                    '<option selected value="' + value.id + '">' +
                                    value.companyTypeName + '</option>')
                            } else {
                                $('#company_type_id').append('<option value="' + value
                                    .id + '">' + value.companyTypeName + '</option>'
                                )
                            }

                        });

                        $.each(response.companyActiveType, function(index, value) {
                            if (value.id == response.activeType) {
                                $('#company_active_type_id').append(
                                    '<option selected value="' + value.id + '">' +
                                    value.companyName + '</option>')
                            } else {
                                $('#company_active_type_id').append('<option value="' +
                                    value.id + '">' + value.companyName +
                                    '</option>')
                            }

                        });

                        $.each(response.citizenships, function(index, value) {

                            if (response.country == 3) {
                                citizenship = 3;
                                if (value.id == 1) {
                                    $('#citizenship_id').append(
                                        '<option selected value="' + value.id +
                                        '">' + value.citizenshipName + '</option>')
                                } else {

                                    $('#citizenship_id').append('<option value="' +
                                        value.id + '">' + value.citizenshipName +
                                        '</option>')

                                }
                            } else {
                                $('.country').html('');
                                $('.country').append('<lable>هیواد</lable>')
                                $('.country').append(
                                    '<select name="country_id" id="country_id" class="form-control"></select>'
                                );

                                if (value.id == 2) {

                                    $('#citizenship_id').append(
                                        '<option selected value="' + value.id +
                                        '">' + value.citizenshipName + '</option>')
                                } else {

                                    $('#citizenship_id').append('<option value="' +
                                        value.id + '">' + value.citizenshipName +
                                        '</option>')

                                }

                                $.each(response.countries, function(index, value) {
                                    if (response.country == value.id) {

                                        $('#country_id').append(
                                            '<option selected value="' +
                                            value.id + '">' + value
                                            .contryName + '</option>')

                                    } else {
                                        $('#country').append(
                                            '<option selected value="' +
                                            value.id + '">' + value
                                            .contryName + '</option>')


                                    }



                                });

                            }

                        });



                    }
                });
            })

            $(document).on('change', '#citizenship_id', function(e) {

                if ($(this).val() == 2) {

                    $.ajax({
                        type: "get",
                        url: "{{ route('get.country') }}",
                        dataType: "json",
                        success: function(response) {
                            $('.country').html('');
                            $('.country').append('<lable>هیواد انتخاب کړی</lable>')

                            $('.country').append(
                                '<select name="country_id" id="country_id" class="form-control"><option selected disabled>هیواد انتخاب کړی</option></select>'
                            )

                            $.each(response.country, function(index, value) {
                                $('#country_id').append('<option value="' + value.id +
                                    '">' + value.contryName + '</option>')
                            });

                        }
                    })
                } else {
                    $('.country').html('');
                }



            })


            $(document).on('submit', '#updateCompany', function(e) {
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "{{ route('update.company') }}",
                    data: $(this).serialize(),
                    dataType: "json",
                    success: function(response) {
                        console.log(response);

                        $('#modal-xl').css('display', 'none');
                        $('[data-dismiss="modal"]').click();
                        $('#updateCompany')[0].reset();
                        swal(response.message);
                        $('#cbody').html('');
                        if (response.company.country_id == 3) {

                            var company = `<tr><td>` + response.company.companyName +
                                `</td><td>` + response.company.aname + `</td>
                            <td>` + response.company.tname + `</td><td>` + response.company.companyManagerName + `</td><td>داخلی</td>
                            <td>` + response.company.companyAddress + `</td><td>` + response.company.latitude +
                                `</td><td>` + response.company.longtitude +
                                `</td>
                            <td><button type="button" class="btn btn-sm btn-primary jawaz">جوازونه<i class="far fa-file-contract"></i></button></td></tr>`;

                        } else {

                            var company = `<tr><td>` + response.company.companyName +
                                `</td><td>` + response.company.aname + `</td>
                            <td>` + response.company.tname + `</td><td>` + response.company.companyManagerName + `</td><td>خارجی</td>
                            <td>` + response.company.companyAddress + `</td><td>` + response.company.latitude +
                                `</td><td>` + response.company.longtitude +
                                `</td>
                            <td><button type="button" class="btn btn-sm btn-primary jawaz">جوازونه<i class="far fa-file-contract"></i></button></td></tr>`;

                        }

                        $('#cbody').append(company);

                    }
                })
            })


            $(document).on('click', '#licenseEdit', function(e) {
                e.preventDefault();
                let url="{{ route('license.edit',':id') }}";
                url=url.replace(':id',$(this).val());

                $.ajax({
                    type:"Get",
                    url: url,
                    dataType:"json",
                    success:function(response){
                        $('#LicenseEditDev').html('');

                         let lNumber=`<div class="form-group col-md-3"><lable>د جواز نمبر</lable><input type="text" name="licenseNumber" class="form-control"
                            value="`+response.companyLicense.licenseNumber+`"></div>`;

                        $('#LicenseEditDev').append(lNumber);
                        $('#LicenseEditDev').append('<div class="form-group col-md-3"><lable>د جواز مرجع</lable><select id="license_type_id" name="license_type_id" class="form-control"></select></div>');

                        $.each(response.licenseType, function(index,value){
                            if(value.id==response.licenseTypeId){
                            $('#license_type_id').append('<option selected value="'+value.id+'">'+value.licenseTypeName+'</option>');
                            }
                            else{
                                $('#license_type_id').append('<option value="'+value.id+'">'+value.licenseTypeName+'</option>');
                            }
                        })

                        let lData=`<div class="form-group col-md-3"><lable>د جواز د صدور نیټه</lable><input type="date" name="issueDate" class="form-control"
                            value="`+response.companyLicense.issueDate+`"></div>`;

                         $('#LicenseEditDev').append(lData);

                         let file=`<div class="form-group col-md-3"><lable>سکن شوی فایل</lable><input type="file" name="files" class="form-control"
                            value="`+response.companyLicense.files+`"></div>`;

                         $('#LicenseEditDev').append(file);





                    }
                })

            })

            $(document).on('click', '#licenseDelete', function(e) {
                e.preventDefault();

            })

        });
    </script>
@endsection
