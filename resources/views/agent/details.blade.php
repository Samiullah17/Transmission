@extends('layouts.app')

@section('content')
    <div class="content-wrapper">

        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-tools">
                               د {{ $cagent->agentName }} د مخابرو لیست چی د {{ $cagent->cname }} کمپنی/بیسټ لپاره یی راوړی
                            </div>
                            <div class="card-title">




                                {{-- <button type="button" class="btn btn-primary" data-mdb-ripple-color="dark"
                                    data-toggle="modal"data-target="#modal-xl">د مخابرو اضافه کول</button> --}}
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
                                    <th>د مخابری ماډل</th>
                                    <th>ولایت</th>
                                    <th>سریال نمبر</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($agents as $agent)
                                    <tr>
                                        <td>{{ $agent->ttname }}</td>
                                        <td>{{ $agent->tmname }}</td>
                                        <td>{{ $agent->tpname }}</td>
                                        <td>{{ $agent->sno }}</td>
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
