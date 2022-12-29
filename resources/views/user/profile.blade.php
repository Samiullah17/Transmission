@extends('layouts1.app')

@section('content')
    <div class="content-wrapper">

        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title" style="float: right">
                                <p style="float: right">د {{ $user->name }} د پروفایل برخه</p>
                            </div>

                        </div>


                        <!-- /.card-header -->
                        <div class="card-body table-respone">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group col-md-6">
                                        <label>د یوزو نوم</label>
                                        <input type="text" name="userName" value="{{ $user->name }}"
                                            class="form-control">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>ایمیل</label>
                                        <input type="text" name="email" value="{{ $user->email }}"
                                            class="form-control">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>پاسورد</label>
                                        <input type="text" name="password" placeholder="password" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <img src="{{ asset('dist/img/user2-160x160.jpg') }}" height="170px" width="200px"
                                        class="img-circle" alt="User Image"><br>
                                    <label for="">د عکس تغیرول</label>
                                    <input type="file" class="form-control">

                                </div>
                            </div>




                        </div>




                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>


    </div>
@endsection
