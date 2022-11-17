@extends('layouts.app')

@section('content')
    <div class="content-wrapper">

        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-tools">
                                د {{ $agent->agentName }} د مخابرو لیست چی د {{ $agent->companyName }} کمپنی لپاره یی راوړی
                                <input type="hidden" value="{{ $agent->id }}" id="agentId">
                              </div>
                            <div class="card-title">



{{--
                                <button type="button" class="btn btn-primary" data-mdb-ripple-color="dark"
                                    data-toggle="modal"data-target="#modal-xl">د مخابرو اضافه کول</button> --}}
                                    <a href="{{ route('add.transmittion0',['id'=>$agent->id,'cid'=>$company->id]) }}" data-mdb-ripple-color="dark" class="btn btn-primary">د نوو مخابرو اضافه کول</a>

                                {{-- <button type="button" class="btn btn-link" data-mdb-ripple-color="dark">Link 2</button> --}}

                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-head-fixed">
                            <thead>
                                {{-- <tr>
                                    <th>د مخابری ټایت</th>
                                     <th>تعداد</th>
                                     <th>کتل</th> --}}


                                     <th>د کمپنی نوم</th>
                                     <th>د نماینده نوم</th>
                                     <th>د غوښتنی د مراجعی نیټه</th>
                                     <th>ّپه غوښتنه کی د ټولو مخابرو شمیر</th>
                                     <th>حالت</th>
                                </tr>
                            </thead>
                            <tbody>

                                {{-- @foreach ($transmissions as $item)
                                    <tr>
                                        <td>{{ $item->transmissionTypeName }}</td>
                                        <td>{{ $item->tquantity }}</td>
                                        <td><button id="btn{{ $item->id }}" value="{{ $item->id }}" class="btn btn-primary btntr">+</button>

                                        </td>
                                    </tr>
                                    <tr class="btn{{ $item->id }}">

                                    </tr>


                                @endforeach --}}

                                @foreach ($orders as $order)

                                <tr>
                                    <td>{{ $order->company }}</td>
                                    <td>{{ $order->aname }}</td>
                                    <td>{{ $order->created_at }}</td>
                                    <td>{{ $order->total_transmissions }}</td>
                                     @if ($order->status==0)
                                        <td><span style="color: red" class="text-bold">د پروګرام په حال کی</span></td>
                                     @endif
                                     @if ($order->status==1)
                                     <td><span style="color: green" class="text-bold">پروګرام شوی</span></td>
                                     @endif

                                     <td><a href="{{ route('order.transmission',$order->order) }}" class="btn btn-primary">کتل</a></td>
                                     <td><button type="button" class="btn btn-danger">حذف/پاکول</button></td>


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



        {{-- Start of Second Dev --}}







        <!-- /.modal-dialog -->
    </div>








    {{-- End of Second Dev --}}












@endsection

@section('script')

<script>
    $(document).ready(function(){
        $(document).on('click','.btntr',function(){


            let data = {
                'agetnId':$('#agentId').val(),
                'ttypeId':ttypeId=$(this).val(),
            }
            let id=$(this).attr('id');
            $(this).addClass('rem');
            $(this).removeClass('btntr');
            $(this).html('-');


            $.ajax({
                    type: "GET",
                    url: "{{ route('transmission.details') }}",
                    data:data,
                    dataType: "json",
                    success: function(response) {

                         console.log(response);
                         $('.'+id).append('<tr><td>د مخابری ماډل</td><td>سریال نمبر</td><td>ولایت</td></tr>');
                         $.each(response.data, function(index, value) {
                             $('.'+id).append('<tr><td>'+value.mname+'</td><td>'+value.serialNo+'</td><td>'+value.pname+'</td></tr>');
                           });


                    }
                });



        });

        $(document).on('click','.rem',function(){
            let id=$(this).attr('id');
            $('.'+id).html('');
            $(this).html('+')
            $(this).addClass('btntr').removeClass('rem');

        })
    });
</script>



@endsection
