@extends('layouts.app')

@section('content')
    <div class="wrapper">


        <!-- Main Sidebar Container -->


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">

                        </div>
                        <div class="col-sm-6">

                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="card">
                                <div class="card-header">
                                    <h3>اضافه کردن استاد جدید</h3>
                                </div>

                                <!-- /.card-header -->
                                <!-- form start -->
                                <form role="form" method="POST" action="{{ route('save.teacher') }}" id="regForm" enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">نام</label>
                                                    <input type="text" class="form-control" name="name"
                                                        placeholder="نام استاد">
                                                        <span class="text text-danger" role="alert">@error('name'){{ $message }}@enderror</span>
                                                    {{-- @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror --}}
                                                </div>
                                            </div>



                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">نام پدر</label>
                                                    <input type="text" class="form-control" name="F_name" id="fname"
                                                        placeholder="نام پدر">
                                                        <span class="text text-danger" role="alert">@error('F_name'){{ $message }}@enderror</span>
                                                </div>
                                            </div>


                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">نام پدر کلان</label>
                                                    <input type="text" class="form-control" name="gf_name" id="gfname"
                                                        placeholder="نام پدر کلان">
                                                        <span class="text text-danger" role="alert">@error('gf_name'){{ $message }}@enderror</span>
                                                </div>
                                            </div>



                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">شماره تذکره</label>
                                                    <input type="text" class="form-control" name="nic" id="nic"
                                                        placeholder="شماره تذکره">
                                                        <span class="text text-danger" role="alert">@error('nic'){{ $message }}@enderror</span>
                                                </div>
                                            </div>


                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">شماره تلفون</label>
                                                    <input type="text" class="form-control" name="phone" id="phone"
                                                        placeholder="شماره تلفون">
                                                        <span class="text text-danger" role="alert">@error('phone'){{ $message }}@enderror</span>
                                                </div>
                                            </div>


                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="email">ایمیل</label>
                                                    <input type="email" class="form-control" name="email" id="email"
                                                        placeholder=" ایمیل ادرس">
                                                        <span class="text text-danger" role="alert">@error('email'){{ $message }}@enderror</span>
                                                </div>
                                            </div>


                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>مضمون</label>
                                                    <select class="form-control select2" name="profession_id"
                                                        style="width: 100%;">
                                                        <option selected="selected" disabled>مضمون را انتخاب نماید</option>
                                                        @foreach ($propessions as $propession)
                                                            <option value="{{ $propession->id }}">{{ $propession->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <span class="text text-danger" role="alert">@error('profession_id'){{ $message }}@enderror</span>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">عکس</label>
                                                    <input type="file" style="width: 220px" name="image" id="image" class="form-control">
                                                    <span class="text text-danger" role="alert">@error('image'){{ $message }}@enderror</span>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <label>تجربه کاری</label>

                                                <div class="form-group">


                                                    ندارد <input type="radio" checked id="rad2" name="exp"
                                                        class="input-sm">
                                                    دارد<input type="radio" id="rad1" name="exp"
                                                        class="input-sm">

                                                </div>
                                            </div>

                                            <div id="exp" class="row collapse">
                                                <div class="form-group col-md-4">
                                                    <label for="">مرجع</label>
                                                    <input type="text" name="reference" disabled
                                                        class="form-control exp">
                                                    <span class="text text-danger" role="alert">@error('reference'){{ $message }}@enderror</span>
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="">مدت زمان</label>
                                                    <input type="text" name="experience" disabled
                                                        class="form-control exp">
                                                    <span class="text text-danger" role="alert">@error('experience'){{ $message }}@enderror</span>
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="">فایل</label>
                                                    <input type="file" name="contract" disabled
                                                        class="form-control exp">
                                                    <span class="text text-danger" role="alert">@error('contract'){{ $message }}@enderror</span>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary col-md-12">ذخیره کردن</button>
                                    </div>
                                </form>
                            </div>
                        </div>


                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
    @endsection
    @section('script')
        <script>
            $(document).ready(function() {

                $('#rad1').change(function() {

                    $('#exp').removeClass('collapse');
                    $('input').removeAttr('disabled');
                    // $('input[type=file]').removeAttribute('disabled');

                });

                $('#rad2').change(function() {

                    $('#exp').addClass('collapse');
                    $('.exp').prop('disabled', true);

                });


            });
        </script>
    @endsection
