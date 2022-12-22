@extends('layouts1.app')
@section('style')
@endsection
<style>

</style>
@section('content')
<div class="content-wrapper">

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-tools">
                            د پخوانیو حق الثبتونو  معلومات
                        </div>

                        <div class="card-title">
                            <a type="button" id="OldRight"  href="{{ route('saveRight.company',$id)}}" class="btn btn-primary">
                                  شاتګ </a>
                            {{-- <button type="button" class="btn btn-link" data-mdb-ripple-color="dark">Link 2</button> --}}

                        </div>


                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-head-fixed table-hover table-striped">
                            <thead>
                                <tr style="text-align:center">
                                    <th>کمپنی</th>
                                    <th>کال</th>
                                    <th>د مالی ریاست د مکتوب ګڼه</th>
                                    <th>د مالی ریاست د مکتوب نیټه</th>
                                    <th>د آویز نمبر</th>
                                    <th>د تعرفه نمبر</th>
                                    <th>د تعرفه نیټه</th>
                                    <th>مقدار د حق الثبت</th>
                                    <th>بانک</th>
                                    <th>د مکتوب سکن</th>
                                    <th>د تعرفه سکن</th>
                                    <th>حالت</th>



                                </tr>
                            </thead>
                            <tbody id="tbody">

                                @foreach ($regRights as $item)

                                    <tr style="text-align:center">
                                        <td>{{ $item->cname }}</td>
                                        <td>{{ $item->reg_year }}</td>
                                        <td>{{ $item->finance_number }}</td>
                                        <td>{{ $item->finance_date }}</td>
                                        <td>{{ $item->bill_number }}</td>
                                        <td>{{ $item->recipt_number }}</td>
                                        <td>{{ $item->recipt_date }}</td>
                                        <td>{{ $item->total_registration_fee }}</td>
                                        <td>{{ $item->bank }}</td>
                                        <td><a href="{{ Storage::url($item->finance_document) }}"
                                                download="FinaceDoc.jpg" target="_blank">د مالی مکتوب کته کول</a>
                                        </td>
                                        <td> <a href="{{ Storage::url($item->finance_recipt) }}"
                                                download="financeRecipt.png" target="_blank">د تعرفه سکن کته کول</a>
                                        </td>

                                            <td>
                                                <span class="badge badge-danger" style="height: 30px">غیر فعال</span>
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
