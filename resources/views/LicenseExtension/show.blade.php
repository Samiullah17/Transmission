@extends('layouts.app')

@section('content')
    <div class="content-wrapper">

        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-tools">
                                د تمدید برخه
                            </div>
                            <div class="card-title">
                                <button type="button" id="licenseExt" class="btn btn-primary" data-mdb-ripple-color="dark"
                                    data-toggle="modal" data-target="#modal-xl">د نوی تمدید اضاقه کول </button>
                                {{-- <button type="button" class="btn btn-link" data-mdb-ripple-color="dark">Link 2</button> --}}

                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-head-fixed table-hover table-striped">
                                <thead>
                                    <tr style="text-align:center">
                                        <th>کمپنی</th>
                                        <th>د مراجعه نیټه</th>
                                        <th>ولایت</th>
                                        <th>فریکونسی</th>
                                        <th>د فریکونسی د جواز پای نیټه</th>
                                        <th>د تمدید موده</th>
                                        <th>د تمدید مکتوب ګڼه </th>
                                        <th>د تمدید مکتوب نیټه </th>
                                        <th>عمل</th>
                                    </tr>
                                </thead>
                                <tbody id="tbody">
                                    @foreach ($licenseExtensions as $item)
                                       
                                        <tr style="text-align:center">
                                            <td>{{ $item->cname }}</td>
                                            <td>{{ $item->coming_date }}</td>

                                            <td>{{ $item->pname }}</td>
                                            
                                            <td>{{ $item->frname }}</td>

                                            <td>{{ $item->licence_expiry_date }}</td>
                                            <td>{{ $item->valid_upto }}</td>
                                            <td>{{ $item->extension_doc_number }}</td>
                                            <td>{{ $item->extension_doc_date }}</td>

                                            <td class="d-flex justify-content-between">
                                                <a class="btn btn-app" id="LicenseExtEdit" href="{{route('licenseExtEdit.company',$item->id)}}" data-toggle="modal"
                                                    data-target="#EditModal">
                                                    <i class="fas fa-edit text-blue"></i>
                                                </a>
                                                <a class="btn btn-app" id="deleteExt"
                                                    href="{{ route('delteLicenseExt.company', $item->id) }}">
                                                    <i class="fas fa-trash text-danger"></i>
                                                </a>
                                            </td>


                                        </tr>
                                    @endforeach


                                </tbody>
                            </table>
                        </div>




                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>

        {{-- starting of extension  modal --}}
        <div class="modal fade" id="modal-xl">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">د بنسټ تمدید اضافه کول </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body mr-5">
                        {{-- {{ route('saveRegistration.company') }} --}}
                        <form action="" method="POST" id="licenseExtensionForm" enctype="multipart/form-data">
                            {{-- @csrf --}}
                            <div class="row">
                                <div class="col-lg-3 col-6">
                                    <div class="form-group">
                                        <label for="startDate">کال : </label>
                                        <input type="date" class="form-control" id="startDate" name="startDate">
                                        <span id="1startDate" name="startDate" class="text-danger "></span>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="">ولایت</label>
                                        <select name="province" id="province" class="form-control">
                                            <option disabled selected>ولایت انتخاب کړی</option>
                                            @foreach ($companies as $item)
                                                <option value="{{ $item->id }}">{{ $item->provenceName }}</option>
                                            @endforeach
                                        </select>
                                        <span id="province" class="text text-danger" name="province" role="alert">
                                        </span>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="frequency">فریکونسی</label>
                                        <select name="frequency" id="frequency" class="form-control">
                                            <option disabled selected>فریکونسی انتخاب کړی</option>

                                        </select>
                                        <span id="1frequency" class="text text-danger" name="frequency" role="alert">
                                        </span>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-6">
                                    <div class="form-group">
                                        <label for="frequenceyEndDate">د فریکونسی د جواز پای نیټه : </label>
                                        <input type="date" class="form-control" id="frequenceyEndDate"
                                            name="frequenceyEndDate">
                                        <span id="frequenceyEndDate" name="frequenceyEndDate" class="text-danger "></span>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-6">
                                    <div class="form-group">
                                        <label for="ExtensionDate">د تمدید موده : </label>
                                        <input type="date" class="form-control" id="ExtensionDate" name="ExtensionDate">
                                        <span id="ExtensionDate" name="ExtensionDate" class="text-danger "></span>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="">د تمدید مکتوب ګڼه</label>
                                        <input type="number" class="form-control" name="reciptNumber"
                                            placeholder="د تمدید مکتوب ګڼه">
                                        <span id="1reciptNumber" class="text text-danger" name="reciptNumber"
                                            role="alert">

                                        </span>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-6">
                                    <div class="form-group">
                                        <label for="ExtensionDocDate">د تمدید مکتوب نیټه : </label>
                                        <input type="date" class="form-control" id="ExtensionDocDate"
                                            name="ExtensionDocDate">
                                        <span id="ExtensionDocDate" name="ExtensionDocDate" class="text-danger"></span>
                                    </div>
                                </div>


                            </div>


                    </div>


                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" id="disMis"
                            data-dismiss="modal">بندول</button>
                        {{-- {{ --}}
                        <a class="btn btn-success" href="{{ route('CreatelicenseExtension.company', $id) }}"
                            type="submit" name="savelicenseExtension">ثپت <i class="fas fa-save"></i></a>
                        </form>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        {{-- End of Company Registration Model --}}
           
        {{-- starting of extension Edit modal --}}
        <div class="modal fade" id="EditModal">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">د بنسټ تمدید تغیرول </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body mr-5">
                        {{-- {{ route('saveRegistration.company') }} --}}
                        <form action="" method="PUT" id="licenseExtensionEditForm" enctype="multipart/form-data">
                            {{-- @csrf --}}
                            @method('put')
                            <div class="row">
                                <input type="hidden" name="licenseExtId" id="licenseExtID">
                                <div class="col-lg-3 col-6">
                                    <div class="form-group">
                                        <label for="startDate">د مراجعه نیټه : </label>
                                        <input type="date" class="form-control" id="ExtstartDate" name="startDate">
                                        <span id="1startDate" name="startDate" class="text-danger "></span>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="">ولایت</label>
                                        <select name="province" id="extprovince" class="form-control">
                                            <option disabled selected>ولایت انتخاب کړی</option>
                                            @foreach ($companies as $item)
                                                <option value="{{ $item->id }}">{{ $item->provenceName }}</option>
                                            @endforeach
                                        </select>
                                        <span id="province" class="text text-danger" name="province" role="alert">
                                        </span>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="frequency">فریکونسی</label>
                                        <select name="Extfrequency" id="Extfrequency" class="form-control">
                                            <option disabled selected>فریکونسی انتخاب کړی</option>

                                        </select>
                                        <span id="1Extfrequency" class="text text-danger" name="frequency" role="alert">
                                        </span>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-6">
                                    <div class="form-group">
                                        <label for="frequenceyEndDate">د فریکونسی د جواز پای نیټه : </label>
                                        <input type="date" class="form-control" id="ExtfrequenceyEndDate"
                                            name="frequenceyEndDate">
                                        <span id="frequenceyEndDate" name="frequenceyEndDate" class="text-danger "></span>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-6">
                                    <div class="form-group">
                                        <label for="ExtensionDate">د تمدید موده : </label>
                                        <input type="date" class="form-control" id="EditExtensionDate" name="ExtensionDate">
                                        <span id="ExtensionDate" name="ExtensionDate" class="text-danger "></span>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="">د تمدید مکتوب ګڼه</label>
                                        <input type="number" class="form-control" id="ExtreciptNumber" name="reciptNumber"
                                            placeholder="د تمدید مکتوب ګڼه">
                                        <span id="1reciptNumber" class="text text-danger" name="reciptNumber"
                                            role="alert">

                                        </span>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-6">
                                    <div class="form-group">
                                        <label for="ExtensionDocDate">د تمدید مکتوب نیټه : </label>
                                        <input type="date" class="form-control" id="EditExtensionDocDate"
                                            name="ExtensionDocDate">
                                        <span id="ExtensionDocDate" name="ExtensionDocDate" class="text-danger"></span>
                                    </div>
                                </div>


                            </div>


                    </div>


                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" id="disMis"
                            data-dismiss="modal">بندول</button>
                        {{-- {{ --}}
                        <a class="btn btn-success" href="{{ route('EditlicenseExtension.company', $id) }}"
                            type="submit" name="savelicenseExtensionEdit">ثپت <i class="fas fa-save"></i></a>
                    </form>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        {{-- End of Company Registration Edit Model --}}
        


    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(document).on('click', "[type='date']", function(e) {
                e.preventDefault();
            });
            $(".date").datepicker({
                changeMonth: true,
                changeYear: true,
                showButtonPanel: true,
                dateFormat: "yy-mm-dd"
            });
            $("[type='date']").datepicker({
                changeMonth: true,
                changeYear: true,
                showButtonPanel: true,
                dateFormat: "yy-mm-dd"
            });
            $(document).on('click', '#licenseExt', function(e) {
                clearErrorMesseges();
            });

            $(document).on('click', '[name="savelicenseExtension"]', function(e) {
                e.preventDefault();
                licenseExtensionFormData = $("#licenseExtensionForm").serialize();
                //let saveRegRightFormData = new FormData($('#registrationSave')[0]);
                $.ajax({
                    method: "POST",
                    url: $(this).attr('href'),
                    data: licenseExtensionFormData,
                    // contentType: false,
                    // processData: false,
                    success: function(response) {
                        window.location.replace(response.success);
                    },
                    error: function(response, error) {
                        displayRegRightError(response.responseJSON.errors);
                    }
                });
            });
            $(document).on('click', '[name="savelicenseExtensionEdit"]', function(e) {
                e.preventDefault();
                licenseExtensionEditFormData = $("#licenseExtensionEditForm").serialize();
                //let saveRegRightFormData = new FormData($('#registrationSave')[0]);
                $.ajax({
                    method: "GET",
                    url: $(this).attr('href'),
                    data: licenseExtensionEditFormData,
                    // contentType: false,
                    // processData: false,
                    success: function(response) {
                        window.location.replace(response.success);
                    },
                    error: function(response, error) {
                        displayRegRightError(response.responseJSON.errors);
                    }
                });
            });

            $("#province").change(function() {

                var url = "{{ route('giveFrequency', ['provinceId'=>':id','companyId'=>$id]) }}";
                url = url.replace(':id', $(this).val());

                $.ajax({
                    url: url,
                    method: "GET",
                    success: function(response) {
                        $('#frequency').html('');
                        $('#frequency').append(
                            '<option selected disabled>فریکونسی انتخاب کړی</option>')
                        $.each(response.success, function(key, item) {
                            $('#frequency').append('<option  value="' + item.id + '">' +
                                item.frequenceyNo + '</option>');
                        });
                    },
                    error: function(response) {}
                });

            });
            $("#extprovince").change(function() {

                var url = "{{ route('giveFrequency', ['provinceId'=>':id','companyId'=>$id]) }}";
                url = url.replace(':id', $(this).val());

                $.ajax({
                    url: url,
                    method: "GET",
                    success: function(response) {
                        $('#Extfrequency').html('');
                        $('#Extfrequency').append(
                            '<option selected disabled>فریکونسی انتخاب کړی</option>')
                        $.each(response.success, function(key, item) {
                            $('#Extfrequency').append('<option  value="' + item.id + '">' +
                                item.frequenceyNo + '</option>');
                        });
                    },
                    error: function(response) {}
                });

            });
            $(document).on('click', '#deleteExt', function(e) {
                e.preventDefault();
                let mainThis = this;
    
                $.ajax({
                    method: "Delete",
                    url: $(this).attr('href'),
                    success: function(response) {
                        mainThis.closest('tr').remove();
                    },
                });
            });
            $(document).on('click','#LicenseExtEdit', function (e) {
                e.preventDefault();
                $.ajax({
                     method:'Get',
                    url:$(this).attr('href'),
                    success: function (response) {
                        $('#licenseExtID').val(response.success.id);
                        $('#ExtstartDate').val(response.success.coming_date);
                        $('#ExtfrequenceyEndDate').val(response.success.licence_expiry_date);
                        $('#EditExtensionDate').val(response.success.valid_upto);
                         $('#ExtreciptNumber').val(response.success.extension_doc_number);
                         $('#EditExtensionDocDate').val(response.success.extension_doc_date);
                        //alert(response.success.id);

                    }
                });
                
            });



            function clearEditErrorMesseges() {
                $('span').html('');

            }

            function clearErrorMesseges() {
                $('span').html('');
                $('input').val('');

            }

            function displayRegRightError(errors) {
                $.each(errors, function(key, value) {
                    //  $('#1' + key).html(value[0]);
                    $('span[name="' + key + '"]').html(value[0]);
                });
            }
        });
    </script>
@endsection
