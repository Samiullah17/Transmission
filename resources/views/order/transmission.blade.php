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




                                {{-- <button type="button" class="btn btn-link" data-mdb-ripple-color="dark">Link 2</button> --}}



                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">

                        <input type="hidden" id="order" name="order" value="{{ $order }}">


                        <table class="table table-striped table-hover table-bordred">
                            <thead>
                                <tr>
                                    <th>د مخابری ډول</th>
                                    <th>د مخابری ماډل</th>
                                    <th>سریال نمبر</th>
                                    <th>ولایت</th>
                                    <th></th>
                                </tr>
                            </thead>

                            <tbody id="tbody">
                                @foreach ($transmissions as $item)
                                    <tr>
                                        <td>{{ $item->tname }}</td>
                                        <td>{{ $item->mname }}</td>
                                        <td>{{ $item->serialNo }}</td>
                                        <td>{{ $item->pname }}</td>
                                        <td><button type="button" id="btnEdit" value="{{ $item->id }}"
                                                class="btn btn-primary btn-sm" data-mdb-ripple-color="dark"
                                                data-toggle="modal" data-target="#modal-xl">تغیر</button>
                                        <button type="button" id="btnDelete" value="{{ $item->id }}"
                                                class="btn btn-danger btn-sm">حذف/پاکول</button></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>





                        <div class="modal fade" id="modal-xl">
                            <div class="modal-dialog modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">د بنسټ د ثبت برخه</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body mr-5">
                                        <form action="{{ route('save.company') }}" method="POST" id="traEdit"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <input type="hidden" name="transmission_id" id="tra_id"
                                                    class="form-control">
                                                <div class="form-group col-md-3">
                                                    <label>د مخابری نوع</label>
                                                    <select name="transmission_type_id" id="transmission_type_id"
                                                        class="form-control">
                                                    </select>
                                                </div>

                                                <div class="form-group col-md-3">
                                                    <label>د مخابری ماډل</label>
                                                    <select name="transmission_model_id" id="transmission_model_id"
                                                        class="form-control"></select>
                                                </div>

                                                <div class="form-group col-md-3">
                                                    <label>ولایت</label>
                                                    <select name="provence_id" id="provence_id" class="form-control">
                                                    </select>
                                                </div>

                                                <div class="form-group col-md-3">
                                                    <label for="">سریال نمبر</label>
                                                    <input type="text" name="serialNO" id="serialNo"
                                                        class="form-control">
                                                </div>
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





        {{-- End of Second Dev --}}












    </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).on('click', '#btnDelete', function() {

            var data = {
                'order': $('#order').val(),
                'id': $(this).val(),
            }

            $.ajax({
                type: "GET",
                url: "{{ route('transmission.delete') }}",
                data: data,
                dataType: "json",
                success: function(response) {
                    $('#tbody').html('');

                    $.each(response.data, function(index, value) {
                        $('#tbody').append('<tr><td>' + value.tname + '</td><td>' + value
                            .mname + '</td><td>' + value.serialNo + '</td><td>' + value
                            .pname + '</td><td><button type="button" id="btnEdit" value="' +
                            value.id +
                            '" class="btn btn-primary btn-sm" data-mdb-ripple-color="dark"  data-toggle="modal" data-target="#modal-xl">تغیر راوستل</button><button type="button" id="btnDelete" value="' +
                            value.id +
                            '" class="btn btn-danger btn-sm">حذف/پاکول</button></td></tr>');
                    });
                    console.log(response);
                }
            });


        })


        $(document).on('click', '#btnEdit', function() {
            var data = {
                'id': $(this).val(),
            }

            $('#tra_id').val($(this).val());


            $.ajax({
                type: "GET",
                url: "{{ route('transmission.edit') }}",
                data: data,
                dataType: "json",
                success: function(response) {

                    $('#transmission_type_id').html('');
                    $('#transmission_model_id').html('');
                    $('#provence_id').html('');
                    $('#serialNo').html('');


                    $.each(response.tra, function(index, value) {

                        if (value.id == response.tType) {
                            $('#transmission_type_id').append('<option selected value="' + value
                                .id + '">' + value.transmissionTypeName + '</option>')
                        } else {
                            $('#transmission_type_id').append('<option value="' + value.id +
                                '">' + value.transmissionTypeName + '</option>')
                        }
                    });


                    $.each(response.tram, function(index, value) {

                        if (value.id == response.tModel) {
                            $('#transmission_model_id').append('<option selected value="' +
                                value.id + '">' + value.transmissionModelName + '</option>')
                        } else {
                            $('#transmission_model_id').append('<option value="' + value.id +
                                '">' + value.transmissionModelName + '</option>')
                        }
                    });


                    $.each(response.pro, function(index, value) {

                        if (value.id == response.tProvence) {
                            $('#provence_id').append('<option selected value="' +
                                value.id + '">' + value.provenceName + '</option>')
                        } else {
                            $('#provence_id').append('<option value="' + value.id +
                                '">' + value.provenceName + '</option>')
                        }
                    });

                    $('#serialNo').val(response.tSerial);

                }
            });

        })

        function show() {


            let url = "{{ route('transmission.show', ':id') }}";
            url = url.replace(':id', $('#order').val());

            $.ajax({
                type: "get",
                url: url,
                data: $(this).serialize(),
                dataType: "json",
                success: function(response) {

                    $('#tbody').html('');

                    $.each(response.data, function(index, value) {
                        $('#tbody').append('<tr><td>' + value.tname + '</td><td>' + value
                            .mname + '</td><td>' + value.serialNo + '</td><td>' + value
                            .pname + '</td><td><button type="button" id="btnEdit" value="' +
                            value.id +
                            '" class="btn btn-primary btn-sm" data-mdb-ripple-color="dark"  data-toggle="modal" data-target="#modal-xl">تغیر راوستل</button><button type="button" id="btnDelete" value="' +
                            value.id +
                            '" class="btn btn-danger btn-sm">حذف/پاکول</button></td></tr>');
                    });

                    console.log(response);
                }
            });


        }


        $(document).on('submit', '#traEdit', function(e) {
            e.preventDefault();


            $.ajax({
                type: "POST",
                url: "{{ route('transmission.saveEdit') }}",
                data: $(this).serialize(),
                dataType: "json",
                success: function(response) {
                    $('#modal-xl').css('display', 'none');
                    $('[data-dismiss="modal"]').click();
                    $('#traEdit')[0].reset();
                    show();

                }
            });

        })
    </script>
@endsection
