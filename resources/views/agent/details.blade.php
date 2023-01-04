@extends('layouts1.app')

@section('content')
    <div class="content-wrapper">

        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-tools">
                                <a href="{{ URL::previous() }}" class="btn btn-info"> <i class="fas fa-arrow-right"></i></a>

                                 <input type="hidden" value="{{ $aname->id }}" id="agentId">
                              </div>
                            <div class="card-title">
                                     {{-- <a href="{{ Storage::url($curentAgent->photo) }}">kdfjdkjf</a> --}}


{{--
                                <button type="button" class="btn btn-primary" data-mdb-ripple-color="dark"
                                    data-toggle="modal"data-target="#modal-xl">د مخابرو اضافه کول</button> --}}
                                    {{-- <a href="{{ route('add.transmittion0',['id'=>$agent->id,'cid'=>$company->id]) }}" data-mdb-ripple-color="dark" class="btn btn-primary">د نوو مخابرو اضافه کول</a> --}}

                                {{-- <button type="button" class="btn btn-link" data-mdb-ripple-color="dark">Link 2</button> --}}

                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive">
                        <table class="table table-striped table-bordred table-hover">
                            <thead>
                                <th>د نماینده نوم</th>
                                <th>د پلار نوم</th>
                                <th>د نیکه نوم</th>
                                <th>د تلفون شمیره</th>
                                <th>ایمیل</th>
                                <th>د تذکری شمیره</th>
                                <th>اصلی ولسوالی</th>
                                <th>اصلی کلی</th>
                                <th>اوسنی ولسوالی</th>
                                <th>اوسنی کلی</th>
                                <th>عکس</th>


                            </thead>
                            <tbody>


                                <tr>
                                    <td>{{ $curentAgent->agentName }}</td>
                                    <td>{{ $curentAgent->fName }}</td>
                                    <td>{{ $curentAgent->gFName }}</td>
                                    <td>{{ $curentAgent->phone }}</td>
                                    <td>{{ $curentAgent->email }}</td>
                                    <td>{{ $curentAgent->NIC }}</td>
                                    <td>{{ $curentAgent->oname }}</td>
                                    <td>{{ $curentAgent->ovillage }}</td>
                                    <td>{{ $curentAgent->cname }}</td>
                                    <td>{{ $curentAgent->cvillage }}</td>
                                    <td><img width="70px" height="80px" src="{{ Storage::url($curentAgent->photo) }}" alt=""></td>
                                </tr>


                            </tbody>
                        </table>

                        <h6 style="background-color:#7f8f7f; width: 40%;border-radius: 4px 4px;padding: 0.4rem; color:white">د بنسټ رسمی نماینده  لخوا د راوړل شویو وړاندیزونو لیست</h6>
                        <table class="table table-head-fixed">
                            <thead>
                                     <th>د کمپنی نوم</th>
                                     <th>د نماینده نوم</th>
                                     <th>د غوښتنی د مراجعی نیټه</th>
                                     <th>ّپه غوښتنه کی د ټولو مخابرو شمیر</th>
                                     <th>حالت</th>
                                </tr>
                            </thead>
                            <tbody>


                                @foreach ($orders as $order)

                                <tr>
                                    <td>{{ $order->company }}</td>
                                    <td>{{ $order->aname }}</td>
                                    <td>{{ $order->created_at }}</td>
                                    <td>{{ $order->total_transmissions }}</td>
                                     @if ($order->status==0)
                                        <td><span class="badge badge-danger text-bold">د پروګرام په حال کی</span></td>
                                     @endif
                                     @if ($order->status==1)
                                     <td><span class="badge badge-warning text-bold">پروګرام شوی</span></td>
                                     @endif
                                     @if ($order->status==1)
                                     <td><a href="{{ route('order.transmission',$order->order) }}" class="btn btn-primary"><i class="fas fa-eye"></i></a></td>
                                     @endif
                                     @if ($order->status==0)

                                     <td><a href="{{ route('order.transmission',$order->order) }}" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                                     @if($company->status==1)
                                     <button type="button" class="btn btn-danger" data-toggle="modal"data-target="#modal-danger"><i class="fas fa-trash-alt"></button>@endif</td>
                                     @endif
                                </tr>

                                @endforeach

                            </tbody>
                        </table>




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
                                        <p>آیا تاسو ډاډه یاست چي لاندینی غوښتنه پاکه کړی؟؟؟</p>
                                     </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-outline-light" data-dismiss="modal">نه</button>
                                        <button type="button" class="btn btn-outline-light">هو</button>
                                    </div>
                                </div>

                            </div>

                        </div>
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
