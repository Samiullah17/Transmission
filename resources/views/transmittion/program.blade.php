@extends('layouts.app')

@section('content')
    <div class="content-wrapper">

        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">

                            <div class="card-tools">

                                <div class="input-group input-group-sm" style="width: 150px;">

                                    <input type="text" name="table_search" class="form-control float-right"
                                        placeholder="Search">

                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default"><i
                                                class="fas fa-search"></i></button>
                                    </div>

                                </div>

                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">

                            <div class="row" id="row">
                                <div class="form-group col-md-3">
                                    <label  id="transmission_type_id1" class="d-none">تخفیف ورکول</label>
                                    <select name="transmission_type_id" id="transmission_type_id" class="form-control d-none">
                                    </select>

                                </div>


                                <div class="form-group col-md-3 d-none pro form-inline">
                                    <label>د مخابری د پروګرام کولو قیمت وارد کړی</label>
                                    <input type="text" id="nrate" name="rate" class="form-control" placeholder="د پروګرام قیمت اعلان کړه">

                                </div>

                                <input type="button" id="srate" value="ثبت کول" style="height: 2rem" class="btn btn-primary col-md-1 pro d-none btn-sm">

                            </div>






                            <label>د مخابرو د پروګرام لپاره د کمپنی یا بنسټ نوم انتخاب کړی</label>
                            <select name="company_id" id="company_id" class="form-control">
                                <option selected disabled>د کمپنی یا بنسټ نوم انتخاب کړی</option>
                                @foreach ($companies as $company)
                                    <option value="{{ $company->id }}">{{ $company->companyName }}</option>
                                @endforeach
                            </select>






                            <table id="table" class="table table-striped table-hover table-border">
                                <thead id="thead">
                                    <tr>
                                        <th>د کمپنی نوم</th>
                                        <th>د غوښتنی تاریخ</th>
                                        <th>په موجوده غوښتنه کی د ټولو مخابرو شمیر</th>
                                        <th></th>
                                    </tr>
                                </thead>

                                <tbody id="tbody">

                                </tbody>

                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).on('change', '[name=pdone]', function() {
            var id = $(this).attr('class');
            $('.' + id).toggleClass('d-none');
            $(this).removeClass('d-none');
            var sid = $(this).attr('id');
            var id1 = $(this).attr('id');

            var data = {
                'id': $(this).attr('id'),
                'status': 'pdone',
            }

            $.ajax({
                type: "get",
                url: "{{ route('transmission.status') }}",
                data: data,
                dataType: "json",
                success: function(response) {

                    $('#rate' + id1).html(response.rate);

                    $('#status' + sid).html('پروګرام شوه');
                    $('#status' + sid).attr('style', 'color:rgb(25,140,255)');
                }
            });

        })

        $(document).on('change', '[name=pndone]', function() {
            var id = $(this).attr('class');
            $('.' + id).toggleClass('d-none');
            $(this).removeClass('d-none');
            var sid = $(this).attr('id');

            var data = {
                'id': $(this).attr('id'),
                'status': 'pnotdone',
            }


            $.ajax({
                type: "get",
                url: "{{ route('transmission.status') }}",
                data: data,
                dataType: "json",
                success: function(response) {

                    console.log(response);
                    $('#status' + sid).html(' نده پروګرام شوی');
                    $('#status' + sid).attr('style', 'color:rgb(168,137,50)');

                }
            });

        })

        $(document).on('change', '[name=fails]', function() {
            var id = $(this).attr('class');
            $('.' + id).toggleClass('d-none');
            $(this).removeClass('d-none');
            var id1 = $(this).attr('id');



            var data = {
                'id': $(this).attr('id'),
                'status': 'fails',
            }
            var sid = $(this).attr('id');


            $.ajax({
                type: "get",
                url: "{{ route('transmission.status') }}",
                data: data,
                dataType: "json",
                success: function(response) {

                    console.log(response);
                    $('#status' + sid).html('خرابه ده');
                    $('#status' + sid).attr('style', 'color:red');
                    $('#rate' + id1).html('0');

                }
            });

        })

        $(document).on('click', '.btndetails', function() {

            var data = {
                'id': $(this).attr('id'),
                'status': 'details',
            }

            $.ajax({
                type: "get",
                url: "{{ route('transmission.status') }}",
                data: data,
                dataType: "json",
                success: function(response) {

                    console.log(response);
                }
            });

        })




        $(document).on('change', '#company_id', function(e) {
            e.preventDefault();
            var cid = $('#company_id').val();
            // $('#companyId').val(cid);
            $.ajax({
                type: "get",
                url: "{{ route('company.transmission') }}/" + cid,
                dataType: "json",
                success: function(response) {

                    // $('#agent_id option').remove();
                    // $('#tbody td').remove();
                    // $('#thead th').remove();
                    // $('#agent_id').append('<option disabled selected>نماینده انتخاب کړی</option>');
                    // $.each(response.agent, function(index, value) {
                    //     $('#agent_id').append('<option value="' + value.id + '">' + value
                    //         .agentName + '</option>');
                    // });


                    $('#table').removeClass('d-none');
                    $('#tbody').html('');
                    $('#thead').html('');
                    $('#thead').append(
                        '<tr><th>د کمپنی نوم</th><th>د غوښتنی د مراجعی نیته</th><th>په غوښتنه کی د ټولو مخابرو شمیر</th></tr>'
                        );
                    console.log(response.orders);


                    $.each(response.orders, function(index, value) {
                        $('#tbody').append('<tr id="tr"><td>' + value.company + '</td><td>' +
                            value.created_at + '</td><td>' + value.total_transmissions +
                            '</td><td><button type="button" value="' + value.order +
                            '" class="btn btn-primary btnprogram">پروګرام کول</button></td></tr>'
                            );

                    });
                }
            });

        });

        $(document).on('click', '.btnprogram', function(e) {
            e.preventDefault();
            var id = $(this).val();

            $.ajax({
                type: "get",
                url: "{{ route('transmission.program') }}/" + id,
                dataType: "json",
                success: function(response) {
                    console.log(response);
                    $('#tbody').html('');
                    $('#thead').html('');
                    $('#transmission_type_id').removeClass('d-none');
                    $('#transmission_type_id1').removeClass('d-none');
                    $('#company_id').addClass('d-none');
                    $('#thead').append(
                        '<tr><th>د مخابری ډول</th><th>د مخابری ماډل</th><th>سریال نمبر</th><th>ولایت</th><th>قیمت</th></tr>'
                        )
                    $.each(response.orders, function(index, value) {
                        $('#tbody').append('<tr id="tr"><td>' + value.tname + '</td><td>' +
                            value.mname + '</td><td>' + value.sNo + '</td><td>' + value
                            .pname + '</td><td>' + value.rate +
                            '</td><td><button type="button" id="btn' + value.id +
                            '" value="' + value.id +
                            '" class="btnpdone">پروګرام</button></td></tr>'
                            )

                    });

                    $('#transmission_type_id').append('<option selected disabled>د مخابری ډول انتخاب کړی</option>')

                    $.each(response.type, function(index,value) {
                       $('#transmission_type_id').append('<option value="'+value.id+'">'+value.transmissionTypeName+'</option>');

                    });
                }
            });

        })

        $(document).on('click', '.btnpdone', function(e) {
            e.preventDefault();
            var value = $(this).val();
            $(this).html('پروګرام شوه').removeClass('btnpdone').addClass('cls').addClass('text-primary').removeClass('text-danger').addClass('text-bold');
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
                    // $('#rate' + id1).html(response.rate);
                    // $('#status' + sid).html('پروګرام شوه');
                    // $('#status' + sid).attr('style', 'color:rgb(25,140,255)');
                }
            });

        })

        $(document).on('click','.cls',function(e){
            e.preventDefault();
            var value = $(this).val();
            $(this).html('ستونزه لری').removeClass('cls').addClass('btnpdone').removeClass('text-primary').addClass('text-danger');
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

                    // $('#status' + sid).html('پروګرام شوه');
                    // $('#status' + sid).attr('style', 'color:rgb(25,140,255)');
                }
            });
        })

        $(document).on('change','#transmission_type_id',function(e){
            e.preventDefault();
            $('.pro').removeClass('d-none');



         })

         $(document).on('click','#srate',function(){


            var data={
                'tra':$('#transmission_type_id').val(),
                'rate':$('#nrate').val(),
            }

            $.ajax({
                type: "get",
                url: "{{ route('transmission.rate') }}",
                data: data,
                dataType: "json",
                success: function(response) {
                    // $('#rate' + id1).html(response.rate);
                    console.log(response);

                    // $('#status' + sid).html('پروګرام شوه');
                    // $('#status' + sid).attr('style', 'color:rgb(25,140,255)');
                }
            });







         })
    </script>
@endsection
