@extends('layouts1.app')

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
                              <input type="hidden" class="orders" value="{{ $order }}">

                            <div id="divprint" style="float: left;" class="card-title">
                                <button value="{{ $order }}" data-toggle="modal" data-target="#modal-sm"
                                    style="width: 5rem" class="btn btn-primary btn-sm">تکمیل</button>
                            </div>
                            <div class="card-tools">
                                <a href="{{ URL::previous() }}" class="btn btn-info"> <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>



                        <div class="card-body">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <th>د کمپنی نوم</th>
                                    <th>د نماینده نوم</th>
                                    <th>د غوښتنی د راوړلو نیټه</th>
                                    <th>حالت</th>
                                </thead>
                                <tbody>
                                    <td>{{ $company }}</td>
                                    <td>{{ $agent }}</td>
                                    <td>{{ $order1->created_at }}</td>
                                    <td><span class="badge badge-info statSpan ">د پروګرام په حال کی</span></td>

                                </tbody>

                            </table>
                        </div>






                    </div>

                    <div class="card">
                        <div class="card-header">

                            <div class="card-tools">

                                <button class="btn btn-primary btn-sm discount">
                                    تخفیف ورکول
                                </button>

                            </div>
                        </div>


                        <div class="card-body">
                            <div class="row">


                                <div class="form-group col-md-3 transmission_type_id d-none">
                                    <label>د تخفیف لپاره د مخابری نوعه انتخاب کړی</label>
                                    <select name="transmission_type_id" id="transmission_type_id" class="form-control">
                                        <option selected disabled>د مخابری نوعه انتخاب کړی</option>
                                        @foreach ($transmissionTypes as $item)
                                            <option value="{{ $item->id }}">{{ $item->transmissionTypeName }}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>

                            <div class="row">

                                <div class="form-group col-md-3  discountAmount d-none">
                                    <label>د تخفیف اندازه</label>
                                    <input type="number" id="discountAmount" name="dicount" class="form-control input-sm"
                                        placeholder="د تخفیف مقدار وارد کړی">
                                    <input type="hidden" name="zeroDiscount" id="zeroDiscount" class="form-control">
                                </div>


                                <div class="form-group col-md-3 d-none discountAmount">
                                    <label for="">د تخفیف پشنهادی فایل</label>
                                    <input type="file" name="discountFile" id="discountFile" class="form-control">

                                </div>

                                <div class="form-group col-md-4 d-none discountAmount">
                                    <label>د تخفیف وجه</label>
                                    <textarea name="discountreason" id="discountreason" class="form-control" id="discountreason" cols="40" rows="2" placeholder="د تخفیف وجه ولیکی"></textarea>

                                </div>


                                <div class="col-md-2 discountAmount d-none mt-4">
                                    <input type="button" id="srate" value="ثبت" name="srate"
                                        class="btn btn-success">
                                </div>
                            </div>



                        </div>

                    </div>


                    <div class="card">

                        <div class="card-header">
                            <div class="card-title" style="float: right">
                                <p>د مخابرو د پروګرام کولو برخه</p>
                            </div>

                        </div>

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
                                                class="btnpdone btnpdone{{ $item->id }} badge badge-info">پروګرام</button></td>
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

            // $(this).removeClass('btnpdone');
            // $('#btn'+value).addClass('cls');
            // $(this).addClass('text-primary').removeClass('text-danger');

            var data = {
                'id': $(this).val(),
                'status': 'pdone',
                'order': $('.orders').val(),
            }

            $.ajax({
                type: "get",
                url: "{{ route('transmission.status') }}",
                data: data,
                dataType: "json",
                success: function(response) {
                    if (response.status == true) {

                        $('#btn'+value).html(response.message).removeClass('btnpdone badge-info badge-danger')
                        .addClass('cls badge-success');
                        fireToastSuccess();
                        console.log(response);
                        $('#rateSpan' + value).html(response.rate);
                        $('#rateSpan' + value).addClass('badge badge-success').removeClass(
                            'badge-danger');

                    } else {
                        swal('', response.message, 'error');
                    }

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
             var data = {
                'id': $(this).val(),
                'status': 'pnotdone',
                'order': $('.orders').val(),
            }

            $.ajax({
                type: "get",
                url: "{{ route('transmission.status') }}",
                data: data,
                dataType: "json",
                success: function(response) {
                     if (response.status == true) {
                        $('#btn'+value).html(response.message).removeClass('cls badge-success').addClass('btnpdone badge-danger');
                        $('#rateSpan' + value).html(response.rate);
                        $('#rateSpan' + value).removeClass('badge-success').addClass('badge-danger');
                        fireToastError();
                    }
                    else{
                        swal('',response.message,'error');
                    }

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

            let d = $('#discountAmount').val();
            if (d) {

                var data = {
                    'tra': $('#transmission_type_id').val(),
                    'rate': $('#discountAmount').val(),
                    'order': $('.orders').val(),
                }

                let tid = $('#transmission_type_id').val();


                $.ajax({
                    type: "get",
                    url: "{{ route('transmission.rate') }}",
                    data: data,
                    dataType: "json",
                    success: function(response) {
                        if (response.status == true) {
                            $('.rate' + tid).html(response.rate);
                            $('#discountAmount').val('');
                            $('#zeroDiscount').val(response.discount);
                            swal('', response.message, 'success');
                        } else {
                            swal('', response.message, 'error');
                        }

                    }
                });

            }




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
            var data={
                'discountFile':$('#discountFile').val(),
                'discountreason':$('#discountreason').val(),
            }
             $.ajax({
                type: "get",
                url: "{{ route('order.status') }}/" + id,
                data:data,
                dataType: "json",
                success: function(response) {
                     if (response.status == true) {
                        $('.btnpdone').removeClass('btnpdone').addClass('done');
                        $('.cls').removeClass('cls').addClass('done');
                        $('.btnprint').removeClass('btnprint').addClass('done');
                        $('.statSpan').removeClass('badge-info').addClass('badge-success').html('پروګرام شوی');
                        $('.discount').removeClass('discount').addClass('done');
                        $('#modal-sm').css('display', 'none');
                        $('#discountFile').val('').prop('disabled',true);
                        $('#discountreason').val('').prop('disabled',true);
                        $('[data-dismiss="modal"]').click();
                        swal("", response.message, "success");

                    } else {
                        swal('', response.message, 'error');
                    }




                    // $('#status' + sid).html('پروګرام شوه');
                    // $('#status' + sid).attr('style', 'color:rgb(25,140,255)');
                },
                error: function(e) {
                    swal('', 'د مخابرو پروګرام برخه کی مشکل موجود ده ', 'error');
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
