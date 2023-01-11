@extends('layouts1.app')

@section('content')
    <div class="content-wrapper">

        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-tools">
                                <a href="{{ URL::previous() }}" class="btn btn-info btn-sm"> <i class="fas fa-arrow-right"></i></a>
                            </div>
                            <div class="card-title">

                                {{ $uname }}


                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <div class="card-tools">
                            </div>
                            <div class="card-title" style="float: left">

                                <button class="btn btn-primary btn-sm">د مالی حساب تصفیه</button>

                            </div>

                        </div>

                        <div class="card-body table-reponsive">

                            <table class="table table-striped table-border">
                                <thead>
                                    <th>د غوښتنی د رواړلو نیټه</th>
                                    <th>د پروګرام کولو نیټه</th>
                                    <th>مجموعه قیمت</th>
                                </thead>
                                <tbody>
                                    @foreach ($userA as $item)
                                    <tr>
                                     <td>{{ $item->created_at }}</td>
                                     <td>{{ $item->updated_at }}</td>
                                     <td>{{ $item->rate }}</td>
                                    </tr>

                                    @endforeach
                                </tbody>

                            </table>




                        </div>

                        <div class="card-footer" style="float: left">
                            <p style="float: left" class="mr-40">مجموعه د قیمت : {{ $t }}</p>

                        </div>







                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>


    </div>
@endsection
