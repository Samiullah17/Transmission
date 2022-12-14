@extends('layouts.app')

@section('content')
    <div class="content-wrapper">

        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-tools">
                                د جریمی برخه
                            </div>
                            <div class="card-title">
                                <button type="button" class="btn btn-primary" data-mdb-ripple-color="dark"
                                    data-toggle="modal" id="modalclick" data-target="#modal-xl">د نوی جریمی اضافه کول
                                </button>
                                {{-- <button type="button" class="btn btn-link" data-mdb-ripple-color="dark">Link 2</button> --}}

                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive">
                            <table class="table table-head-fixed table-hover table-striped findata-table">
                                <thead>
                                    <tr style="text-align:center">
                                        <th>کمپنی</th>
                                        <th>ولایت</th>
                                        <th style="width: 130px">د مراجعه نیټه</th>
                                        <th>د جریمی موده</th>
                                        <th>مقدار د جریمی </th>
                                        <th>د مالی ریاست مکتوب ګڼه </th>
                                        <th>د مالی ریاست مکتوب نیټه </th>
                                        <th>د آویز نمبر </th>
                                        <th>د تعرفه نمبر </th>
                                        <th style="width: 130px">د تعرفه نیټه </th>
                                        <th>بانک</th>
                                        <th>د مالی دریاست مکتوب</th>
                                        <th>د مالی دیاست تعرفه</th>
                                        <th>عمل</th>
                                        <th></th>

                                    </tr>
                                </thead>
                                <tbody id="tbody" >
                                    {{-- @foreach ($companyfines as $item)
                                        <tr style="text-align:center">
                                            <td>{{ $item->cname }}</td>
                                            <td>{{ $item->pname }}</td>
                                            <td>{{ $item->fine_date }}</td>

                                            <td>{{ $item->number_of_days }}</td>
                                            <td>{{ $item->fine_fee }}</td>
                                            <td>{{ $item->finance_fine_number }}</td>
                                            <td>{{ $item->finace_fine_date }}</td>
                                            <td>{{ $item->fine_bill_number }}</td>
                                            <td>{{ $item->fine_recipt_number }}</td>
                                            <td>{{ $item->fine_recipt_date }}</td>
                                            <td>{{ $item->bank }}</td>
                                            <td><a href="{{ Storage::url($item->fine_finance_document) }}"
                                                    download="FinanceFineDoc.jpg" target="_blank">د مالی دیاست مکتوب کته
                                                    کول</a></td>
                                            <td>
                                                <a href="{{ Storage::url($item->fine_finance_recipt) }}"
                                                    download="FinanveReciptDoc.jpg" target="_blank">د مالی ریاست تعرفه کته
                                                    کول</a>
                                            </td>
                                            <td class="d-flex ">
                                                <a class="btn btn-app" id="FineEdit"
                                                    href="{{ route('EditFine.company', $item->id) }}" data-toggle="modal"
                                                    data-target="#FineEditModal">
                                                    <i class="fas fa-edit text-blue"></i>
                                                </a>
                                                <a class="btn btn-app" id="deleteFine"
                                                    href="{{ route('delteFine.company', $item->id) }}">
                                                    <i class="fas fa-trash text-danger"></i>
                                                </a>

                                            </td>

                                        </tr>
                                    @endforeach --}}


                                </tbody>
                            </table>
                        </div>




                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
        {{-- starting of fine modal --}}
        <div class="modal fade" id="modal-xl">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">د بنسټ د جریمی اضافه کول </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body mr-5">
                        {{-- {{ route('saveRegistration.company') }} --}}
                        <form action="" method="POST" id="FineSaveForm" enctype="multipart/form-data">
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
                                        <span id="1province" class="text text-danger" name="province" role="alert">
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
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="">د مالی ریاست مکتوب ګڼه</label>
                                        <input type="number" class="form-control" name="financeNumber"
                                            placeholder="د مالی ریاست مکتوب ګڼه ">
                                        <span id="1financeNumber" class="text text-danger" name="financeNumber"
                                            role="alert">

                                        </span>
                                    </div>
                                </div>

                            </div>
                            <div class="row">

                                <div class="col-lg-3 col-6">
                                    <div class="form-group">
                                        <label for="finacetDate">د مالی ریاست مکتوب نیټه : </label>
                                        <input type="date" class="form-control" id="finacetDate" name="financetDate">
                                        <span id="1financetDate" name="finaceDate" class="text-danger"></span>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="">د آویز نمبر</label>
                                        <input type="number" class="form-control" name="billNumber"
                                            placeholder="د آویز نمبر ">
                                        <span id="1billNumber" class="text text-danger" name="billNumber"
                                            role="alert">

                                        </span>
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="">د تعرفه نمبر</label>
                                        <input type="number" class="form-control" name="reciptNumber"
                                            placeholder="د تعرفه نمبر ">
                                        <span id="1reciptNumber" class="text text-danger" name="reciptNumber"
                                            role="alert">

                                        </span>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-6">
                                    <div class="form-group">
                                        <label for="startDate">د تعرفه نیټه : </label>
                                        <input type="date" class="form-control" id="recipttDate" name="recipttDate">
                                        <span id="1recipttDate" name="reciptDate" class="text-danger"></span>
                                    </div>
                                </div>



                            </div>
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="totalFinefee"> مقدار د جریمه </label>
                                        <input type="number" class="form-control" name="totalFinefee"
                                            placeholder="مقدار د جریمی  ">
                                        <span id="1totalFinefee" class="text text-danger" name="totalFinefee"
                                            role="alert">

                                        </span>
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="bank">بانک</label>
                                        <input type="text" class="form-control" name="bank" placeholder="بانک">
                                        <span id="1bank" class="text text-danger" name="bank" role="alert">

                                        </span>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="finacncefile">د مکتوب فایل </label>
                                        <input class="form-control" name="finacncefile" type="file"
                                            placeholder="مکتوب">
                                        <span class="text-danger" id="1finacncefile"></span>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="finacnceReciptfile">د تعرفه فایل </label>
                                        <input class="form-control" name="finacnceReciptfile" type="file"
                                            placeholder="مکتوب">
                                        <span class="text-danger" id="1finacnceReciptfile"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <label for="FineDays">د جریمی موده</label>
                                    <input type="number" class="form-control" name="FineDays" placeholder="بانک">
                                    <span id="1FineDays" class="text text-danger" name="FineDays" role="alert">

                                    </span>
                                </div>

                            </div>

                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" id="disMis"
                            data-dismiss="modal">بندول</button>
                        {{-- {{ route('createsaveRight.company', $id) }} --}}
                        <a class="btn btn-success" href="{{ route('createFine.company', $id) }}" type="submit"
                            id='ComFineSave' name="saveFine">ثپت <i class="fas fa-save"></i></a>
                        </form>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        {{-- end of fine modal --}}

        {{-- starting of FineEditmodal --}}
        <div class="modal fade" id="FineEditModal">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">د بنسټ د جریمی اضافه کول </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body mr-5">
                        {{-- {{ route('saveRegistration.company') }} --}}
                        <form action="" method="PUT" id="FineUpdateForm" enctype="multipart/form-data">
                            @method('put')

                            <div class="row">
                                <input type="hidden" name="ComFineId" id='ComFineId'>
                                <div class="col-lg-3 col-6">
                                    <div class="form-group">
                                        <label for="startDate">کال : </label>
                                        <input type="date" class="form-control" id="FinestartDate" name="startDate">
                                        <span id="1startDate" name="startDate" class="text-danger "></span>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="">ولایت</label>
                                        <select name="province" id="Fineprovince" class="form-control">
                                            <option disabled selected>ولایت انتخاب کړی</option>
                                            @foreach ($companies as $item)
                                                <option value="{{ $item->id }}">{{ $item->provenceName }}</option>
                                            @endforeach
                                        </select>
                                        <span id="1province" class="text text-danger" name="province" role="alert">
                                        </span>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="frequency">فریکونسی</label>
                                        <select name="frequency" id="Finefrequency" class="form-control">
                                            <option disabled selected>فریکونسی انتخاب کړی</option>

                                        </select>
                                        <span id="1frequency" class="text text-danger" name="frequency" role="alert">
                                        </span>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="">د مالی ریاست مکتوب ګڼه</label>
                                        <input type="number" class="form-control"  id='financeNumber'
                                            name="financeNumber" placeholder="د مالی ریاست مکتوب ګڼه ">
                                        <span id="1financeNumber" class="text text-danger" name="financeNumber"
                                            role="alert">

                                        </span>
                                    </div>
                                </div>

                            </div>
                            <div class="row">

                                <div class="col-lg-3 col-6">
                                    <div class="form-group">
                                        <label for="finacetDate">د مالی ریاست مکتوب نیټه : </label>
                                        <input type="date" class="form-control" id="FinefinacetDate"
                                            name="financetDate">
                                        <span id="1financetDate" name="finaceDate" class="text-danger"></span>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="">د آویز نمبر</label>
                                        <input type="number" class="form-control" id='billNumber' name="billNumber"
                                            placeholder="د آویز نمبر ">
                                        <span id="1billNumber" class="text text-danger" name="billNumber"
                                            role="alert">

                                        </span>
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="">د تعرفه نمبر</label>
                                        <input type="number" class="form-control" id='reciptNumber' name="reciptNumber"
                                            placeholder="د تعرفه نمبر ">
                                        <span id="1reciptNumber" class="text text-danger" name="reciptNumber"
                                            role="alert">

                                        </span>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-6">
                                    <div class="form-group">
                                        <label for="startDate">د تعرفه نیټه : </label>
                                        <input type="date" class="form-control" id="FinerecipttDate"
                                            name="recipttDate">
                                        <span id="1recipttDate" name="recipttDate" class="text-danger"></span>
                                    </div>
                                </div>



                            </div>
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="totalFinefee"> مقدار د جریمه </label>
                                        <input type="number" class="form-control" id='totalFinefee' name="totalFinefee"
                                            placeholder="مقدار د جریمی  ">
                                        <span id="1totalFinefee" class="text text-danger" name="totalFinefee"
                                            role="alert">

                                        </span>
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="bank">بانک</label>
                                        <input type="text" class="form-control" id='bank' name="bank"
                                            placeholder="بانک">
                                        <span id="1bank" class="text text-danger" name="bank" role="alert">

                                        </span>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="finacncefile">د مکتوب فایل </label>
                                        <input class="form-control" name="finacncefile" type="file"
                                            placeholder="مکتوب">
                                        <span class="text-danger" id="1finacncefile"></span>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="finacnceReciptfile">د تعرفه فایل </label>
                                        <input class="form-control" name="finacnceReciptfile" type="file"
                                            placeholder="مکتوب">
                                        <span class="text-danger" id="1finacnceReciptfile"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <label for="FineDays">د جریمی موده</label>
                                    <input type="number" class="form-control" id='FineDays' name="FineDays"
                                        placeholder="بانک">
                                    <span id="1FineDays" class="text text-danger" name="FineDays" role="alert">

                                    </span>
                                </div>

                            </div>

                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" id="disMis"
                            data-dismiss="modal">بندول</button>
                        {{-- {{ route('createsaveRight.company', $id) }} --}}
                        <a class="btn btn-success" href="{{ route('UpdateFine.company', $id) }}" type="submit"
                            id='ComFineUpdate' name="saveFine">ثپت <i class="fas fa-save"></i></a>
                        </form>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        {{-- end of FinEditmodal --}}

    </div>
@endsection
@section('script')
    <script src="{{ asset('persiandtpicker/bootstrap-datepicker.fa.min.js') }}"></script>
    {{-- <script src="{{ asset('plugins/persiandtpicker/bootstrap-datepicker.fa.min.js') }}"></script> --}}
    <script src="{{ asset('persiandtpicker/bootstrap-datepicker.js') }}"></script>
    <script>

$(function () {
    var table = $('.findata-table').DataTable({
        processing: true,
        serverSide: true,
        
        ajax: "{{ route('fine.show',$id) }}",
        columns: [
            {data:'cname'},
            {data:'pname'},
            {data:'fine_date'},
            {data:'number_of_days'},
            {data:'fine_fee'},
            {data:'finance_fine_number'},
            {data:'finace_fine_date'},
            {data:'fine_bill_number'},
            
            {data:'fine_recipt_number'},
            {data:'fine_recipt_date'},
            {data:'bank'},
            {data:'fine_recipt_date'},
            {data:'fine_recipt_date'},
            {data:'action'},
            {data:'a'},
            // {data: 'action', name: 'action', orderable: false, searchable: false},
        ],
        language: {
                    "emptyTable": "دیتا موجود نیست .",
                    "lengthMenu": "نمایش MENU معلومات",
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

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(document).on('click', "[type='date']", function(e) {
                e.preventDefault();
            });

            $("#Fineprovince").change(function() {

                var url = "{{ route('giveFrequency', ['provinceId' => ':id', 'companyId' => $id]) }}";
                url = url.replace(':id', $(this).val());

                $.ajax({
                    url: url,
                    method: "GET",
                    success: function(response) {
                        $('#Finefrequency').html('');
                        $('#Finefrequency').append(
                            '<option selected disabled>فریکونسی انتخاب کړی</option>')
                        $.each(response.success, function(key, item) {
                            $('#Finefrequency').append('<option  value="' + item.id + '">' +
                                item.frequenceyNo + '</option>');
                        });
                    },
                    error: function(response) {}
                });

            });
            $("#province").change(function() {

                var url = "{{ route('giveFrequency', ['provinceId' => ':id', 'companyId' => $id]) }}";
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

            $("[type='date']").datepicker({
                changeMonth: true,
                changeYear: true,
                showButtonPanel: true,
                dateFormat: "yy-mm-dd"
            });



            $(document).on('click', '#ComFineSave', function(e) {
                e.preventDefault();
                //  saveRegRightFormData = $("#registrationSave").serialize();
                let FineFormData = new FormData($('#FineSaveForm')[0]);
                $.ajax({
                    method: "POST",
                    url: $(this).attr('href'),
                    data: FineFormData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        window.location.replace(response.success);
                    },
                    error: function(response, error) {
                        displayRegRightError(response.responseJSON.errors);
                    }
                });
            });

            $(document).on('click', '#ComFineUpdate', function(e) {
                e.preventDefault();
                //  saveRegRightFormData = $("#registrationSave").serialize();
                let FineFormData = new FormData($('#FineUpdateForm')[0]);
                $.ajax({
                    method: "PUT",
                    url: $(this).attr('href'),
                    data: FineFormData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        window.location.replace(response.success);
                    },
                    error: function(response, error) {
                        displayRegRightError(response.responseJSON.errors);
                    }
                });
            });

            $(document).on('click', '#deleteFine', function(e) {
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

            $(document).on('click', '#FineEdit', function(e) {
                e.preventDefault();


                $.ajax({
                    url: $(this).attr('href'),
                    method: 'GET',
                    success: function(response) {
                        $('#ComFineId').val(response.success.id);
                        $('#FinestartDate').val(response.success.fine_date);
                        $('#financeNumber').val(response.success.finance_fine_number);
                        $('#FinefinacetDate').val(response.success.finace_fine_date);
                        $('#billNumber').val(response.success.fine_bill_number);
                        $('#reciptNumber').val(response.success.fine_recipt_number);
                        $('#FinerecipttDate').val(response.success.fine_recipt_date);
                        $('#totalFinefee').val(response.success.fine_fee);
                        $('#bank').val(response.success.bank);
                        $('#FineDays').val(response.success.number_of_days);
                    }
                });
            });

            $(document).on('click', '#modalclick', function(e) {
                e.preventDefault();
                clearErrorMesseges();
            });


            function clearErrorMesseges() {
                $('span').html('');
                $('input').val('');
            }

            function displayRegRightError(errors) {
                $.each(errors, function(key, value) {
                    $('#1' + key).html(value[0]);
                });
            }
        });
    </script>
@endsection
