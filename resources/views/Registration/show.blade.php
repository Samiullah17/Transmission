@extends('layouts.app')
@section('style')
@endsection
<style>

</style>
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
                            @if ($registrationRights->isEmpty())
                                <div class="card-title">
                                    <button type="button" id="modalclick" class="btn btn-primary"
                                        data-mdb-ripple-color="dark" data-toggle="modal" data-target="#modal-x2">د نوی حق
                                        الثبت اضافه کول </button>
                                    {{-- <button type="button" class="btn btn-link" data-mdb-ripple-color="dark">Link 2</button> --}}

                                </div>
                            @endif
                            @if($registrationRights->isNotEmpty())
                            <div class="card-title">
                                <a type="button" id="OldRight"  href="{{ route('oldRegRight.company',$id)}}" class="btn btn-primary">د پخوانیو حق
                                    الثبتونو  کتل </a>
                                {{-- <button type="button" class="btn btn-link" data-mdb-ripple-color="dark">Link 2</button> --}}

                            </div>
                            @endif

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-head-fixed table-hover table-striped">
                                <thead>
                                    <tr style="text-align:center">
                                        <th>کمپنی</th>
                                        <th>کال</th>
                                        <th>انقضاه نیټه</th>
                                        <th>د مالی ریاست د مکتوب ګڼه</th>
                                        <th>د مالی ریاست د مکتوب نیټه</th>
                                        <th>د آویز نمبر</th>
                                        <th>د تعرفه نمبر</th>
                                        <th>د تعرفه نیټه</th>
                                        <th>مقدار د حق الثبت</th>
                                        <th>بانک</th>
                                        <th>د مکتوب سکن</th>
                                        <th>د تعرفه سکن</th>
                                        <th>حالت</th>

                                        <th>عمل</th>

                                    </tr>
                                </thead>
                                <tbody id="tbody">
                                    
                                    @foreach ($registrationRights as $item)
                                   
                                        <tr style="text-align:center">
                                            <td>{{ $item->cname }}</td>
                                            <td>{{ $item->reg_year }}</td>
                                            <td>{{ $item->ExpireREg_year }}</td>
                                            <td>{{ $item->finance_number }}</td>
                                            <td>{{ $item->finance_date }}</td>
                                            <td>{{ $item->bill_number }}</td>
                                            <td>{{ $item->recipt_number }}</td>
                                            <td>{{ $item->recipt_date }}</td>
                                            <td>{{ $item->total_registration_fee }}</td>
                                            <td>{{ $item->bank }}</td>
                                            <td><a href="{{ Storage::url($item->finance_document) }}"
                                                    download="FinaceDoc.jpg" target="_blank">د مالی مکتوب کته کول</a>
                                            </td>
                                            <td> <a href="{{ Storage::url($item->finance_recipt) }}"
                                                    download="financeRecipt.png" target="_blank">د تعرفه سکن کته کول</a>
                                            </td>

                                            @if ($item->status == 0)
                                                <td>
                                                    <span class="badge badge-success" style="height: 30px">فعال</span>
                                                </td>
                                            @endif
                                            @if ($item->status == 1)
                                                <td>
                                                    <span class="badge badge-danger" style="height: 30px">غیر فعال</span>
                                                </td>
                                                <td class="d-flex justify-content-between">
                                                    {{-- data-mdb-ripple-color="dark"
                                                        data-toggle="modal" data-target="#modal-x2" --}}
                                                    <a class="btn btn-primary" id="RegRightEdit"
                                                        href="{{ route('EditRegRight.company', $item->id) }}"
                                                        data-toggle="modal" data-target="#RegistrationRightEdit">
                                                        تمدید
                                                    </a>
                                                    {{-- <a class="btn btn-app" id="deleteRight"
                                                            href="{{ route('delteRegRight.company', $item->id) }}">
                                                            <i class="fas fa-trash text-danger"></i>
                                                        </a> --}}
                                                </td>
                                            @endif



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
        {{-- starting modal of RegRight --}}
        <div class="modal fade" id="modal-x2">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">د بنسټ حق الثبت اضافه کول </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body mr-5">
                        {{-- {{ route('saveRegistration.company') }} --}}
                        <form action="" method="POST" id="registrationSave" enctype="multipart/form-data">
                            {{-- @csrf --}}
                            <div class="row">
                                <div class="col-lg-3 col-6">
                                    <div class="form-group">
                                        <label for="startDate"> د ثبت نیټه </label>
                                        <input type="date" class="form-control" id="startDate" name="startDate">
                                        <span id="1startDate" name="startDate" class="text-danger mdl "></span>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-6">
                                    <div class="form-group">
                                        <label for="ExpireDate"> د انقضاه نیټه </label>
                                        <input type="date" class="form-control" id="ExpireDate" name="ExpireDate">
                                        <span id="1ExpireDate" name="ExpireDate" class="text-danger mdl "></span>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="">د مالی ریاست مکتوب ګڼه</label>
                                        <input type="number" class="form-control" name="financeNumber"
                                            placeholder="د مالی ریاست مکتوب ګڼه ">
                                        <span id="1financeNumber" class="text text-danger mdl" name="financeNumber"
                                            role="alert">

                                        </span>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-6">
                                    <div class="form-group">
                                        <label for="finacetDate">د مالی ریاست مکتوب نیټه : </label>
                                        <input type="date" class="form-control" id="finacetDate" name="financetDate">
                                        <span id="1financetDate" name="financetDate" class="text-danger mdl"></span>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="row">
                                

                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="">د آویز نمبر</label>
                                        <input type="number" class="form-control" name="billNumber"
                                            placeholder="د آویز نمبر ">
                                        <span id="1billNumber" class="text text-danger mdl" name="billNumber" role="alert">

                                        </span>
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="">د تعرفه نمبر</label>
                                        <input type="number" class="form-control" name="reciptNumber"
                                            placeholder="د تعرفه نمبر ">
                                        <span id="1reciptNumber" class="text text-danger mdl" name="reciptNumber"
                                            role="alert">

                                        </span>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-6">
                                    <div class="form-group">
                                        <label for="startDate">د تعرفه نیټه : </label>
                                        <input type="date" class="form-control" id="recipttDate" name="recipttDate">
                                        <span id="1recipttDate" name="recipttDate" class="text-danger mdl"></span>
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for=""> مقدار د حق الثبت </label>
                                        <input type="number" class="form-control" name="totalfee"
                                            placeholder="مقدار د حق الثبت ">
                                        <span id="1totalfee" class="text text-danger mdl" name="totalfee" role="alert">

                                        </span>
                                    </div>
                                </div>
                               
                            </div>
                            <div class="row">
                               
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="">بانک</label>
                                        <input type="text" class="form-control" name="bank" placeholder="بانک">
                                        <span id="1bank" class="text text-danger mdl" name="bank" role="alert">

                                        </span>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="finacnceDocfile">د مکتوب فایل </label>
                                        <input class="form-control" name="finacnceDocfile" type="file"
                                            placeholder="مکتوب">
                                        <span class="text-danger mdl" id="1finacnceDocfile" name="finacnceDocfile"></span>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="finacnceReciptfile">د تعرفه فایل </label>
                                        <input class="form-control" name="finacnceReciptfile" type="file"
                                            placeholder="مکتوب">
                                        <span class="text-danger mdl" name="finacnceReciptfile"
                                            id="1finacnceReciptfile"></span>
                                    </div>
                                </div>
                            </div>

                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" id="disMis"
                            data-dismiss="modal">بندول</button>
                        <a class="btn btn-success" href="{{ route('createsaveRight.company', $id) }}" type="submit"
                            name="saveregright">ثپت <i class="fas fa-save"></i></a>
                        </form>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        {{-- End of Company Registration Model --}}

        {{-- starting modal of RegRightEdit --}}
        <div class="modal fade" id="RegistrationRightEdit">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">د بنسټ د حق الثبت بدلول </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="registrationEdit" enctype="multipart/form-data">
                        <div id="editbody" class="modal-body mr-5">
                            {{-- {{ route('saveRegistration.company') }} --}}
                            {{-- @csrf --}}
                            @method('put')
                            <div class="row">
                                <input type="hidden" name='REgID' id="regRightid">
                                <div class="col-lg-3 col-6">
                                    <div class="form-group">
                                        <label for="startDate">کال : </label>
                                        <input type="text" class="form-control date" id="yearDate" name="startDate">
                                        <span id="1startDate" name="startDate" class="text-danger mdl"></span>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-6">
                                    <div class="form-group">
                                        <label for="ExpireDate"> د انقضاه نیټه </label>
                                        <input type="text" class="form-control date" id="EExpireDate" name="ExpireDate">
                                        <span id="1ExpireDate" name="ExpireDate" class="text-danger mdl "></span>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="">د مالی ریاست مکتوب ګڼه</label>
                                        <input type="number" id="finance" class="form-control" name="financeNumber"
                                            placeholder="د مالی ریاست مکتوب ګڼه ">
                                        <span id="1financeNumber" class="text text-danger mdl" name="financeNumber"
                                            role="alert">

                                        </span>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-6">
                                    <div class="form-group">
                                        <label for="financetDate">د مالی ریاست مکتوب نیټه : </label>
                                        <input type="text" class="form-control date"  id="financetDate" name="financetDate">
                                        <span id="1financetDate" name="financetDate " class="text-danger mdl"></span>
                                    </div>
                                </div>
                               
                            </div>
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="">د آویز نمبر</label>
                                        <input type="number" class="form-control" id="billnum" name="billNumber"
                                            placeholder="د آویز نمبر ">
                                        <span id="1billNumber" class="text text-danger mdl" name="billNumber"
                                            role="alert">

                                        </span>
                                    </div>
                                </div>


                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="">د تعرفه نمبر</label>
                                        <input type="number" class="form-control" id="reciptnum" name="reciptNumber"
                                            placeholder="د تعرفه نمبر ">
                                        <span id="1reciptNumber" class="text text-danger mdl" name="reciptNumber"
                                            role="alert">

                                        </span>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-6">
                                    <div class="form-group">
                                        <label for="startDate">د تعرفه نیټه : </label>
                                        <input type="text" class="form-scontrol date" id="reciptDate"
                                            name="recipttDate">
                                        <span id="1recipttDate" name="recipttDate" class="text-danger mdl"></span>
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for=""> مقدار د حق الثبت </label>
                                        <input type="number" id="fee" class="form-control" name="totalfee"
                                            placeholder="مقدار د حق الثبت ">
                                        <span id="1totalfee" class="text text-danger mdl" name="totalfee" role="alert">

                                        </span>
                                    </div>
                                </div>

                              

                            </div>
                            <div class="row">

                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="">بانک</label>
                                        <input type="text" class="form-control" id='bank' name="bank"
                                            placeholder="بانک">
                                        <span id="1bank" class="text text-danger mdl" name="bank" role="alert">

                                        </span>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="finacnceDocfile">د مکتوب فایل </label>
                                        <input class="form-control" name="finacnceDocfile" type="file"
                                            placeholder="مکتوب">
                                        <span class="text-danger mdl" id="1finacnceDocfile"></span>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="finacnceReciptfile">د تعرفه فایل </label>
                                        <input class="form-control" name="finacnceReciptfile" type="file"
                                            placeholder="مکتوب">
                                        <span class="text-danger mdl" id="1finacnceReciptfile"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" id="disMis"
                                data-dismiss="modal">بندول</button>
                            <a class="btn btn-success" href="{{ route('updatesaveRight.company', $id) }}" type="submit"
                                name="saveregrightEdit">ثپت <i class="fas fa-save"></i></a>

                        </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        {{-- end of RegRightEdit modal --}}
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

            $(document).on('click', '[name="saveregright"]', function(e) {
                e.preventDefault();
                //  saveRegRightFormData = $("#registrationSave").serialize();
                let saveRegRightFormData = new FormData($('#registrationSave')[0]);
                $.ajax({
                    method: "POST",
                    url: $(this).attr('href'),
                    data: saveRegRightFormData,
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
            $(document).on('click', '#deleteRight', function(e) {
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
            $(document).on('click', '#modalclick', function(e) {
                e.preventDefault();
                clearErrorMesseges();
            });


            $(document).on('click', '#RegRightEdit', function(e) {
                e.preventDefault();
                clearEditErrorMesseges();

                $.ajax({
                    url: $(this).attr('href'),
                    method: 'GET',
                    success: function(response) {
                        $('#regRightid').val(response.success.id);
                        $('#yearDate').val(response.success.reg_year);
                        $('#EExpireDate').val(response.success.ExpireREg_year);
                        $('#finance').val(response.success.finance_number);
                        $('#financetDate').val(response.success.finance_date);
                        $('#billnum').val(response.success.bill_number);
                        $('#reciptnum').val(response.success.recipt_number);
                        $('#reciptDate').val(response.success.recipt_date);
                        $('#fee').val(response.success.total_registration_fee);
                        $('#bank').val(response.success.bank);
                    }
                });
            });

            $(document).on('click', '[name="saveregrightEdit"]', function(e) {
                e.preventDefault();
                //  saveRegRightFormData = $("#registrationSave").serialize();
                let EditRegRightFormData = new FormData($('#registrationEdit')[0]);

                $.ajax({
                    method: "POST",
                    url: $(this).attr('href'),
                    data: EditRegRightFormData,
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

            function clearEditErrorMesseges() {
                $('.mdl').html('');

            }

            function clearErrorMesseges() {
                $('.mdl').html('');
                $('input').val('');
            }

            function displayRegRightError(errors) {
                $.each(errors, function(key, value) {
                    //  $('#1' + key).html(value[0]);
                    $('[name="' + key + '"]').html(value[0]);
                });
            }
        });
    </script>
@endsection
