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
                                    <h4 style="background-color:#6b6865; width: 30%;border-radius: 4px 4px;padding: 0.3rem; color:white">د موسساتو او شرکتونو د ثبت برخه</h4>
                                </div>


                            </div>


                            <div class="card-body">
                                <form id="regForm" action="#" method="POST">

                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">نوم</label>
                                                <input type="text" name="name" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">ایمیل</label>
                                                <input type="text" name="email" class="form-control">
                                            </div>
                                        </div>

                                        <input type="submit" class="btn btn-primary">
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
        $(document).ready(function(){



            $("#regForm").validate({
                rules: {
                    name: "required",
                    email: "required",
                },

                messages: {
                    name: "نوم ضروری ده",
                    email: "ایمیل ضروری ده",
                }
            });

            $(document).on('submit','#regForm',function(e){

                alert('samiullah');

            })
        })
    </script>

    @endsection
