@extends('layouts.app')

@section('content')
    <div class="content-wrapper">

        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">

                            <div class="card-tools">

                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive">


                            <table class="table table-striped table-hover ordersTable">
                                <thead>
                                    <th style="text-align: start">د کمپنی نوم</th>
                                    <th style="text-align: start">د نماینده نوم</th>
                                    <th style="text-align: start">د غوښتنی د مراجعی نیټه</th>
                                    <th style="text-align: start">حالت</th>
                                    <th style="text-align: start"></th>
                                    <th style="text-align: start"></th>
                                </thead>
                                <tbody>

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
@section('script')
    <script>
        $(document).ready(function() {
            $(function() {

                var table = $('.ordersTable').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('companies.orders') }}",
                    columns: [{
                            data: 'cname'
                        },
                        {
                            data: 'aname'
                        },
                        {
                            data: 'created_at'
                        },
                        {
                            data: 'status'
                        },
                        {
                            data: 'action'

                        },


                    ],
                    orderable: true,
                    searchable: true,
                    language: {
                        "emptyTable": "دیتا موجود نیست .",
                        "lengthMenu": "نمایش MENU معلومات",
                        "info": "معلومات شماره START الی END مجموعه معلومات TOTAL",
                        "infoEmpty": "معلومات شماره 0 الی 0 از 0 تعداد مجموعه",
                        "search": "جستجو کردن : ",
                        "sProcessing": "در حال اضافه نمودن معلومات...",
                        "paginate": {
                            "first": "اول",
                            "last": "آخر",
                            "next": "بعدی",
                            "previous": "قبلی"
                        },
                    },
                });

                // $('.agentsTable').removeClass('agentsTable').addClass('showCOrder');
            });

        })
    </script>
@endsection
