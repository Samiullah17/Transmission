@extends('layouts.app')
@section('content')
    <style>
        th {
            border: 1px solid black !important;
        }

        tr td {
            border: 1px solid black !important;
        }

        .title th {
            font-weight: bold;
        }

        .ui-datepicker {
            z-index: 444444444;
        }

        @media print {
            .hidden-print {
                display: none;
            }

            @page {
                size: A5  !important   ;
            }
            body{
                height: 200px !important;
            }

            | .card {
                margin-bottom: unset !important;
                margin-left: 10px !important;
                margin-right: -250px !important;
            }

            .container-fluid {
                padding-right: unset !important;
                padding-left: unset !important;
            }

            .content-wrapper>.content {
                padding: unset !important;
            }

            @page {
                /* size: landscape !important; */
            }
        }
    </style>
    <div class="card">

        <div class="card-body">
            <div class="row">
                <div class="col-4">
                    <img src="{{ asset('dist/img/moi.png') }}" style="width: 35%;">

                </div>
                <div class="col-4">
                    <h4 style="white-space: nowrap;" class="text-center">د افغانستان اسلامی امارت</h4>
                    <h4 style="white-space: nowrap;" class="text-center">د کورنیو چارو وزارت</h4>
                    <h4 style="white-space: nowrap;" class="text-center">د مخابری او معلوماتی ټکنالوژی لوی ریاست</h4>
                    <h4 style="white-space: nowrap;" class="text-center">د مخابروی وسایلو د پرورګرام رسید</h4>

                </div>
                <div class="col-4" style="text-align: left;">
                    <img src="{{ asset('dist/img/moi_logo.png') }}" style="width: 35%;">

                </div>
            </div>
            {{-- <div class="table-responsive mt-2" id="table-data">
            @include('reports.pagination_data')
		</div> --}}
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <div class="card-tools">
                <p style="float: right">د رسید نمبر</p>: 0000{{ $order->id }}
            </div>
            <div class="card-tools" style="float: left">
                <p>د مراجعی نیټه</p>: {{ $order->created_at }}
            </div>
        </div>

        <div class="card-body">
            <table class="table table-hover table-sm">
                <thead>
                    <th>د مخابری نوعه</th>
                    <th>د مخابری ماډل</th>
                    <th>ولایت</th>
                    <th>سریال نمبر</th>
                    <th>قیمت</th>
                </thead>
                <tbody>
                    @foreach ($transmissions as $item)
                        <tr>
                            <td>{{ $item->tname }}</td>
                            <td>{{ $item->mname }}</td>
                            <td>{{ $item->pname }}</td>
                            <td>{{ $item->serialNo }}</td>
                            <td>
                                @if ($item->rate != 0)
                                    {{ $item->rate }}
                                    @endif @if ($item->rate == 0)
                                        <span class="text-danger">ستونزه لری</span>
                                    @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer" style="float: left">
            <p style="float: left">مجموعه: {{ $curent }}</p>
            <p style="display: inline"><span style="margin:600px">تلفون شمیره: {{ $agent->phone }}</span></p>



        </div>
    </div>
    <button class="btn btn-info btn-sm hidden-print"  style="float: left; margin-left:20px" onclick="window.print()">چاپ</button>
@endsection
