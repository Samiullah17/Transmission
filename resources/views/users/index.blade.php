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
<style>
    .forbtn{
        display: inline;
    }
</style>
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
                                                        <a href="{{ route('user.permissions', $user->id) }}" data-toggle="modal"
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
{{-- user permmision models --}}
          <div class="modal fade show" id="userPermissionsModal" style="display: none;" aria-modal="true" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header " >
                        <h5 class="modal-title">صلاحیت های یوزر</h5>
                        
                    </div>
                    <div id="userPermissionsInfo">
                        <form id="DeletePermission" method="post" >
                            @csrf
                            @method('Delete')
                            <input type="hidden" name='userID' id='userDeleteID'>
                            <div class="addperm form-group" style="display: inline" id='addperm'></div></form>
                            <form  method="Post" id="permissionForm">
                            <input type="hidden" name='userID' id='userID'>
                            <div class="form-group">
                                <label for="permission">افزودن صلاحیت جدید</label>
                                <select name="permission" class="form-control">
                                    @foreach ($permissions as $permission)
                                        <option value="{{ $permission->id }}">{{ $permission->name }}</option>
                                    @endforeach
                                    {{-- <option value="">sdfasfasd</option>
                                    <option >sadfasfa</option>
                                    <option >safasf</option> --}}
                                </select>
                                <span class="text-danger" id="permission"></span>
                            </div>
                       
                    </div>
                </form>
                    <div class="modal-footer justify-content-between pb-1">
                        <button type="button" class="btn btn-default" data-dismiss="modal">بستن</button>
                        <input type="reset" hidden>
                        <a class="btn btn-success" type="submit"  href="{{route('user.permission.grant')}}"
                            name="grantPermissionToUser">ثپت
                            <i class="fas fa-save"></i></a>
                        
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            // Headers for Ajax Request
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // $(document).on('click', '[data-target="#userUpdateModal"]', function(e) {
            //     e.preventDefault();

            //     $.ajax({
            //         method: 'GET',
            //         url: $(this).attr('href'),
            //         beforeSend: function() {
            //             displayLoading();
            //         },
            //         success: function(response) {
            //             $('#userUpdateInfo').html(response.success);
            //             removeLoading();
            //         },
            //         error: function(response, error) {
            //             removeLoading();
            //         }
            //     });
            // });

            // $(document).on('click', '[name="updateUser"]', function(e) {
            //     e.preventDefault();

            //     $.ajax({
            //         method: 'PUT',
            //         url: $(this).attr('href'),
            //         data: $(this).closest('form').serialize(),
            //         beforeSend: function() {
            //             displayLoading();
            //         },
            //         success: function(response) {
            //             $('#userUpdateModal').hide();
            //             $('[data-dismiss="modal"]').click();

            //             $('#tbody').html(response.success);
            //             hideModal();
            //             removeLoading();
            //         },
            //         error: function(response, error) {
            //             displayErrorMessages(response);
            //             removeLoading();
            //         }
            //     });
            // });

            // $(document).on('click', '[class="fas fa-window-close"]', function(e) {
            //     e.preventDefault();
            //     let mainThis = this;

            //     $.ajax({
            //         url: $(this).closest('a').attr('href'),
            //         method: 'DELETE',
            //         beforeSend: function() {
            //             displayLoading();
            //         },
            //         success: function(response) {
            //             $(mainThis).closest('tr').remove();
            //             removeLoading();
            //         },
            //         error: function() {
            //             removeLoading();
            //         }
            //     });
            // });

            $(document).on('click', '[data-target="#userPermissionsModal"]', function(e) {
                e.preventDefault();

                $.ajax({
                    url: $(this).attr('href'),
                    method: 'GET',
                    // beforeSend: function() {
                    //     displayLoading();
                    // },
                    success: function(response) {
                        // $('#userPermissionsInfo').html(response.success);
                        // removeLoading();
                        $('#addperm').html('');
                        $('#userDeleteID').val(response.userID);
                        $('#userID').val(response.userID);
                        $.each(response.success, function(key, item) {
                       
                            $('#addperm').append('<div class="forbtn"><a class="btn btn-danger m-2" href="'+'{!!URL::to('revoke/premission')!!}'+'/'+item.id+'"> '+item.name + '</a><input type="hidden" name="'+item.id+'btn" value='+item.id+'></div>');
                        });
                     
                    },
                    error: function(response, error) {
                        // removeLoading();
                    }
                });
            });

            $(document).on('click', '[name="grantPermissionToUser"]', function(e) {
                e.preventDefault();
                clearErrorMessage();

                $.ajax({
                    url: $(this).attr('href'),
                    method: 'POST',
                    data: $('#permissionForm').serialize(),
                    // beforeSend: function() {
                    //     displayLoading();
                    // },
                    success: function(response) {
                        $('#userPermissionsModal').hide();
                        $('[data-dismiss="modal"]').click();
                        hideModal();
                        // removeLoading();
                    },
                    error: function(response, error) {
                        displayErrorMessages(response);
                        removeLoading();
                    }
                });
            });

            $(document).on('click', '[class="btn btn-danger m-2"]', function(e) {
                e.preventDefault();
                let mainThis = this;

                $.ajax({
                    url: $(this).attr('href'),
                    method: 'DELETE',
                    data:$('#DeletePermission').serialize(),
                    // beforeSend: function() {
                    //     displayLoading();
                    // },
                    success: function(response) {
                        $(mainThis).closest('a').remove();
                        // removeLoading();
                    },
                    error: function(response) {
                        removeLoading();
                    }
                });
            });

            function displayErrorMessages(response) {
                if (response.status === 403 || response.status === 404) $().html(response.message);
                else {
                    $.each(response.responseJSON.errors, function(key, error) {
                        $('span#' + key).html(error[0]);
                    });
                }
            }

            function clearErrorMessage() {
                $('span').html('');
            }
        });
    </script>
@endsection