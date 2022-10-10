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
                            <table class="table table-head-fixed">
                                <thead>
                                    <tr>
                                        <th>نام</th>
                                        <th>نام پدر</th>
                                        <th>شماره تلفون</th>
                                        <th>مسلک</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($teachers as $teacher)
                                        <tr>
                                            <td>{{ $teacher->name }}</td>
                                            <td>{{ $teacher->F_name }}</td>
                                            <td>{{ $teacher->phone }}</td>
                                            <td>{{ $teacher->pname }}</td>
                                            <td>

                                                <div class="input-group input-group-sm mb-3">
                                                    <div class="input-group-prepend">
                                                        <button type="button" class="btn btn-primary dropdown-toggle"
                                                            data-toggle="dropdown">
                                                            معلومات
                                                        </button>
                                                        <ul class="dropdown-menu">
                                                            <li class="dropdown-item"><a href="#"><i
                                                                        class="bi bi-archive"></i>ویرایش</a></li>
                                                            <li class="dropdown-item"><a href="#">معلومات کلی</a></li>
                                                            <li class="dropdown-item"><a href="#"
                                                                    class="text text-danger">حذف</a></li>
                                                            <li class="dropdown-divider"></li>
                                                        </ul>
                                                    </div>
                                                    <!-- /btn-group -->
                                                </div>
                                                <!-- /input-group -->


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
