@extends('layouts1.app')

{{-- title --}}
@section('title', ' لیست یوزر ها')

{{-- Page Title --}}
{{-- @section('pageTitle')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">صفحه اصلی</h1>
                </div>
            </div>
        </div>
    </div>
@endsection --}}
{{-- Page Content --}}
@section('content')
    <div class="content-wrapper">
     
      <section class="content">
          <div class="container-fluid">
             
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-tools">
                                <h3 class="card-title"><b>لیست یوزر ها</b></h3>
                            </div>
                            <div class="card-title">
                                <a class="btn btn-primary" href="{{ route('register') }}">جدید</a>
                            </div>
                        </div>
                        <div id="tbody">
                            <div class="card-body table-responsive p-0">
                                @if ($users->isEmpty())
                                    <h1 style="text-align: center;">هیچ یوزر موجود نیست</h1>
                                @else
                                    <table class="table table-head-fixed text-nowrap">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>اسم یوزر</th>
                                                <th>ایمیل</th>
                                                <th style="text-align: center">اکشن/عمل</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                            
                                            @foreach ($users as $user)
                                                <tr>
                                                    <td>{{ $loop->index + 1 }}</td>
                                                    <td>{{ $user->name }}</td>
                                                    <td>{{ $user->email }}</td>
                                             
                                                    <td style="text-align: center">
                                                        <a href=""data-toggle="modal"
                                                            data-target="#userUpdateModal" title="تغیر معلومات یوزر">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        <a href="" title="حدف یوزر">
                                                            <i class="fas fa-window-close" style="color: red;"></i>
                                                        </a>
                                                        <a href="" data-toggle="modal"
                                                            data-target="#userPermissionsModal" title="صلاحیت یوزر">
                                                            <i class="fas fa-eye"></i>
                                                        </a>
                                                    </td> 
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                @endif
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
          </div>

      

    </div>
</section>
@endsection
