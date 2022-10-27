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
                                    <a href="{{ route('add.transmittion0',$agent->id) }}" data-mdb-ripple-color="dark" class="btn btn-primary">د نوو مخابرو اضافه کول</a>

                                {{-- <button type="button" class="btn btn-link" data-mdb-ripple-color="dark">Link 2</button> --}}

                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-head-fixed">
                            <thead>
                                <tr>
                                    <th>د مخابری ټایت</th>
                                     <th>تعداد</th>
                                     <th>کتل</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($transmissions as $item)
                                    <tr>
                                        <td>{{ $item->transmissionTypeName }}</td>
                                        <td>{{ $item->tquantity }}</td>
                                        <td><button id="btn" value="{{ $item->id }}" class="btn btn-primary">+</button>

                                        </td>
                                    </tr>
                                    <tr class="btn{{ $item->id }}">

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
        $(document).on('click','#btn',function(){


            let data = {
                'agetnId':$('#agentId').val(),
                'ttypeId':ttypeId=$(this).val(),
            }

            $.ajax({
                    type: "GET",
                    url: "{{ route('transmission.details') }}",
                    data:data,
                    dataType: "json",
                    success: function(response) {

                        console.log(response);
                        // $('#modal-xl').css('display', 'none');
                        // $('[data-dismiss="modal"]').click();
                        // $('#agentSave')[0].reset();
                    }
                });



        });
    });
</script>



@endsection
