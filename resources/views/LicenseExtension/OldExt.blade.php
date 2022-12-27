@extends('layouts1.app')

@section('content')
    <div class="content-wrapper">

        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-tools">
                                د پخوانیو تمدید برخه
                            </div>
                            <div class="card-title">
                                    <a type="button" id="oldlicenseExt" href="{{ route('licence.company',$id)}}" class="btn btn-primary">شاتګ</a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-head-fixed table-hover table-striped">
                                <thead>
                                    <tr style="text-align:center">
                                        <th>کمپنی</th>
                                        <th>د مراجعه نیټه</th>
                                        <th>ولایت</th>
                                        <th>فریکونسی</th>
                                        <th>د فریکونسی د جواز پای نیټه</th>
                                        <th>د تمدید موده</th>
                                        <th>د تمدید مکتوب ګڼه </th>
                                        <th>د تمدید مکتوب نیټه </th>
                                        <th>حالت</th>

                                    </tr>
                                </thead>
                                <tbody id="tbody">
                                    @foreach ($licenseExtensions as $item)

                                        <tr style="text-align:center">
                                            <td>{{ $item->cname }}</td>
                                            <td>{{ $item->coming_date }}</td>

                                            <td>{{ $item->pname }}</td>

                                            <td>{{ $item->frname }}</td>

                                            <td>{{ $item->licence_expiry_date }}</td>
                                            <td>{{ $item->valid_upto }}</td>
                                            <td>{{ $item->extension_doc_number }}</td>
                                            <td>{{ $item->extension_doc_date }}</td>

                                            <td>
                                                <span class="badge badge-danger" style="height: 30px">غیرفعال</span>
                                            </td>





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






    </div>
@endsection

