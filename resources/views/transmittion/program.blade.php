@extends('layouts.app')

@section('style')
    <style>
        #toast-container * {
            z-index: 3000;
            background-color: #2ad606;
            color: black;
            font: bold;

        }

        .swal2-header * {
            z-index: 9000,

        }
    </style>
@endsection

@section('content')
    <div class="content-wrapper">

        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">

                            <div id="divprint" style="float: left;" class="card-title">
                                <button value="{{ $order }}" data-toggle="modal" data-target="#modal-sm"
                                    style="width: 5rem" class="btn btn-primary btn-sm">تکمیل<i
                                        class="fa fa-print"></i></button>
                            </div>



                            <div class="card-tools">

                                <button class="btn btn-primary btn-sm discount">
                                    تخفیف ورکول
                                </button>

                            </div>

                        </div>

                        <div class="card-body">
                            <div class="row">


                                <div class="form-group col-md-4 transmission_type_id d-none">
                                    <label>د تخفیف لپاره د مخابری نوعه انتخاب کړی</label>
                                    <select name="transmission_type_id" id="transmission_type_id" class="form-control">
                                        <option selected disabled>د مخابری نوعه انتخاب کړی</option>
                                        @foreach ($transmissionTypes as $item)
                                            <option value="{{ $item->id }}">{{ $item->transmissionTypeName }}</option>
                                        @endforeach
                                    </select>

                                </div>


                                <div class="form-group col-md-4  discountAmount d-none">
                                    <label>د تخفیف اندازه</label>
                                    <input type="text" id="discountAmount" name="dicount" class="form-control input-sm"
                                        placeholder="د تخفیف مقدار وارد کړی">
                                </div>

                                <div class="col-md-2 discountAmount d-none mt-4">
                                    <input type="button" id="srate" value="ثبت" name="srate"
                                        class="btn btn-success">
                                </div>



                            </div>



                        </div>



                    </div>


                    <div class="card">

                        <table class="table table-striped table-hover">
                            <thead>

                                <tr>
                                    <th>د مخابری نوعه</th>
                                    <th>د مخابری ماډل</th>
                                    <th>سریال نمبر</th>
                                    <th>ولایت</th>
                                    <th>قیمت</th>
                                    <th></th>
                                </tr>

                            </thead>

                            <tbody>
                                @foreach ($transmissinos as $item)
                                    <tr>
                                        <td>{{ $item->tname }}</td>
                                        <td>{{ $item->mname }}</td>
                                        <td>{{ $item->sNo }}</td>
                                        <td>{{ $item->pname }}</td>
                                        <td><span id="rateSpan{{ $item->id }}"
                                                class="rate{{ $item->tid }}">{{ $item->rate }}</span></td>
                                        <td><button type="button" id="btn{{ $item->id }}" value="{{ $item->id }}"
                                                class="btnpdone badge badge-info">پروګرام</button></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>


                        <div class="modal fade" id="modal-sm">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">پیغام</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>آیا تاسو مطمین یې چي مخابری پروګرم شوی؟؟؟</p>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">نه</button>
                                        <button type="button" value="{{ $order }}"
                                            class="btn btn-primary btnprint">هو</button>
                                    </div>
                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>


                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).on('click', '.btnpdone', function(e) {
            e.preventDefault();
            var value = $(this).val();
            $(this).html('پروګرام شوه').removeClass('btnpdone').addClass('cls').addClass('badge-success')
                .removeClass('badge-info badge-danger');
            // $(this).removeClass('btnpdone');
            // $('#btn'+value).addClass('cls');
            // $(this).addClass('text-primary').removeClass('text-danger');

            var data = {
                'id': $(this).val(),
                'status': 'pdone',
            }

            $.ajax({
                type: "get",
                url: "{{ route('transmission.status') }}",
                data: data,
                dataType: "json",
                success: function(response) {
                    fireToastSuccess();
                    console.log(response);
                    $('#rateSpan' + value).html(response.rate);
                    $('#rateSpan' + value).addClass('badge badge-success').removeClass('badge-danger');

                    // $('#rate' + id1).html(response.rate);
                    // $('#status' + sid).html('پروګرام شوه');
                    // $('#status' + sid).attr('style', 'color:rgb(25,140,255)');
                }
            });

        });


        function fireToastSuccess() {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-center',
                showConfirmButton: false,
                timer: 3000
            });
            Toast.fire({
                type: 'success',
                title: 'مخابره په بریالیتوب سره پروګرام شوه!'
            })
        };

        $(document).on('click', '.cls', function(e) {
            e.preventDefault();
            var value = $(this).val();
            $(this).html('ستونزه لری').removeClass('cls').addClass('btnpdone').removeClass(
                'badge-success').addClass(
                'badge-danger');
            var data = {
                'id': $(this).val(),
                'status': 'pnotdone',
            }

            $.ajax({
                type: "get",
                url: "{{ route('transmission.status') }}",
                data: data,
                dataType: "json",
                success: function(response) {
                    // $('#rate' + id1).html(response.rate);
                    $('#rateSpan' + value).html(response.rate);
                    $('#rateSpan' + value).removeClass('badge-success').addClass('badge-danger');
                    fireToastError();

                    // $('#status' + sid).html('پروګرام شوه');
                    // $('#status' + sid).attr('style', 'color:rgb(25,140,255)');
                }
            });
        })

        function fireToastError() {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-center',
                showConfirmButton: false,
                timer: 3000
            });
            Toast.fire({
                type: 'warning',
                title: 'مخابره ستونز لری'
            })
        };



        $(document).on('click', '#srate', function() {


            var data = {
                'tra': $('#transmission_type_id').val(),
                'rate': $('#discountAmount').val(),
            }

            let tid = $('#transmission_type_id').val();

            $.ajax({
                type: "get",
                url: "{{ route('transmission.rate') }}",
                data: data,
                dataType: "json",
                success: function(response) {
                    console.log(response);
                    $('.rate' + tid).html(response.rate);
                    $('#discountAmount').val('');
                }
            });


        })



        $(document).on('click', '.discount', function(e) {
            e.preventDefault();

            $('.transmission_type_id').removeClass('d-none');
        })

        $(document).on('change', '#transmission_type_id', function(e) {
            e.preventDefault();

            $('.discountAmount').removeClass('d-none');

        })




        $(document).on('click', '.btnprint', function() {
            var id = $(this).val();
            $.ajax({
                type: "get",
                url: "{{ route('order.status') }}/" + id,
                dataType: "json",
                success: function(response) {
                    // $('#rate' + id1).html(response.rate);
                    console.log(response);
                    $('.btnpdone').removeClass('btnpdone').addClass('done');
                    $('.cls').removeClass('cls').addClass('done');
                    $('.btnprint').removeClass('btnprint').addClass('done');
                    $('.discount').removeClass('discount').addClass('done');
                    $('#modal-sm').css('display', 'none');
                    $('[data-dismiss="modal"]').click();
                    swal("مسج", "مخابری په بریالیتوب سره پروګرام شوی!!!", "success");



                    // $('#status' + sid).html('پروګرام شوه');
                    // $('#status' + sid).attr('style', 'color:rgb(25,140,255)');
                }
            });


        })

        $(document).on('click', '.done', function(e) {
            e.preventDefault();
            fireToesterdone();

        })

        function fireToesterdone() {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top',
                showConfirmButton: false,
                timer: 3000
            });
            Toast.fire({
                type: 'warning',
                title: 'مخابری پرورګرام شوی تغیرات نشی پکی راوړلی!!!',
            })
        };

    </script>
@endsection
