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
                                <a href="{{ URL::previous() }}" class="btn btn-info btn-sm"> <i class="fas fa-arrow-right"></i></a>

                             </div>
                            <div class="card-title">
                                <a class="btn btn-primary btn-sm" href="{{ route('register') }}">جدید</a>
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
                                                <th>حالت</th>
                                                @can('Admin')
                                                <th style="text-align: center">اکشن/عمل</th>
                                                @endcan
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($users as $user)
                                                <tr>
                                                    <td>{{ $loop->index + 1 }}</td>
                                                    <td>{{ $user->name }}</td>
                                                    <td>{{ $user->email }}</td>
                                                    @if ($user->status==0)
                                                    <td>
                                                    <span class="badge badge-success" style="height: 30px">فعال</span>
                                                  </td>
                                                  @endif
                                                  @if ($user->status==1)
                                                  <td>
                                                      <span class="badge badge-danger" style="height: 30px">غیر فعال</span>
                                                  </td>
                                                  @endif
                                                  <td style="text-align: center">
                                                  @can('Admin')
                                                        <a href="{{ route('user.edit', $user->id) }}"
                                                            title="تغیر معلومات یوزر">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        {{-- <button value='{{$user->id}}'>klllkl</button> --}}
                                                        <button  value="{{$user->id}}" data-toggle="modal"
                                                        data-target="#modal-sm" id="deacivate" title="  غیر فعال/فعال نمودن یوزر ">
                                                           <i class="fas fa-lock" style="-webkit-text-fill-color: red"></i>
                                                        </button>
                                                        <a href="{{ route('user.permissions', $user->id) }}" data-toggle="modal"
                                                       data-target="#userPermissionsModal" title="صلاحیت یوزر">
                                                            <i class="fas fa-eye"></i>
                                                        </a>
                                                        <a href="{{ route('user.roles', $user->id) }}" data-toggle="modal"
                                                            data-target="#userRolesModal" title="رول یوزر">
                                                            <i class="fab fa-critical-role"></i>
                                                         </a>
                                                         <a href="{{ route('user.acount', $user->id) }}"
                                                            title="د یوزر مالی حساب">
                                                            <i class="fas fa-info-circle"></i>
                                                       </a>
                                                        @endcan
                                                       
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
{{-- end of user permission modal --}}
{{-- start of user roles --}}
<div class="modal fade show" id="userRolesModal" style="display: none;" aria-modal="true" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header " >
                <h5 class="modal-title">دیوزر رول</h5>

            </div>
            <div id="userRolesInfo">
                <form id="DeleteRoles" method="post" >
                    @csrf
                    @method('Delete')

                    <input type="hidden" name='userID' id='roleuserDeleteID'>
                    <div class="addrole form-group" style="display: inline" id='addrole'></div></form>
            <form  method="Post" id="roleForm">
                    <input type="hidden" name='userID' id='roleuserID'>
                    <div class="form-group">
                        <label for="roles">د نوی رول اضافه کول</label>
                        <select name="role" class="form-control">
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->name }}</option>
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
                <a class="btn btn-success" type="submit"  href="{{route('user.role.grant')}}"
                    name="grantRoleToUser">ثپت
                    <i class="fas fa-save"></i></a>

            </div>
        </div>
    </div>
</div>
{{-- end of user roles --}}

<div class="modal fade show" id="modal-sm" style="display: none; padding-right: 17px;" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-sm">
    <div class="modal-content">
    <div class="modal-header">
    <h4 class="modal-title">د یورز عیر فعاله کول</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">×</span>
    </button>
    </div>
    <div class="modal-body">
    <h3 style="-webkit-text-fill-color: red">مطمئن یاست چی یوزر غیر فعاله/فعاله کړی</h3>
    </div>
    <div class="modal-footer justify-content-between">
    <button type="button" class="btn btn-default" data-dismiss="modal">نه</button>
    <a  class="btn btn-primary" id='yes'  href="">هو </a>
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
            // start of permission jquery
            $(document).on('click', '[data-target="#userPermissionsModal"]', function(e) {
                e.preventDefault();

                $.ajax({
                    url: $(this).attr('href'),
                    method: 'GET',
                    beforeSend: function() {
                        displayLoading();
                    },
                    success: function(response) {
                      
                        removeLoading();
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
                    beforeSend: function() {
                        displayLoading();
                    },
                    success: function(response) {
                       
                        $('#userPermissionsModal').modal('hide');
                        // $('[data-dismiss="modal"]').click();
                        
                        removeLoading();
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
                    beforeSend: function() {
                        displayLoading();
                    },
                    success: function(response) {
                        $(mainThis).closest('a').remove();
                        removeLoading();
                    },
                    error: function(response) {
                        removeLoading();
                    }
                });
            });
            // end permission jquery

            //start roles jquery
            $(document).on('click', '[data-target="#userRolesModal"]', function(e) {
                e.preventDefault();

                $.ajax({
                    url: $(this).attr('href'),
                    method: 'GET',
                    beforeSend: function() {
                        displayLoading();
                    },
                    success: function(response) {
                        // $('#userPermissionsInfo').html(response.success);
                        removeLoading();
                        $('#addrole').html('');
                        $('#roleuserID').val(response.userID);
                        $('#roleuserDeleteID').val(response.userID);

                        $.each(response.success, function(key, item) {

                            $('#addrole').append('<div class="forbtn"><a class="btn btn-danger m-2 deleteonerole" href="'+'{!!URL::to('revoke/role')!!}'+'/'+item+'"> '+item+ '</a><input type="hidden" name="'+item+'btn" value='+item+'></div>');
                        });

                    },
                    error: function(response, error) {
                        removeLoading();
                    }
                });
            });

            $(document).on('click', '[name="grantRoleToUser"]', function(e) {
                e.preventDefault();
                clearErrorMessage();

                $.ajax({
                    url: $(this).attr('href'),
                    method: 'POST',
                    data: $('#roleForm').serialize(),
                    beforeSend: function() {
                        displayLoading();
                    },
                    success: function(response) {
                        $('#userRolesModal').modal('hide');
                        // $('[data-dismiss="modal"]').click();
                        removeLoading();
                    },
                    error: function(response, error) {
                        displayErrorMessages(response);
                        removeLoading();
                    }
                });
            });

            $(document).on('click', '.deleteonerole', function(e) {
                e.preventDefault();
                let mainThis = this;

                $.ajax({
                    url: $(this).attr('href'),
                    method: 'DELETE',
                    data:$('#DeleteRoles').serialize(),
                    beforeSend: function() {
                        displayLoading();
                    },
                    success: function(response) {
                        $(mainThis).closest('a').remove();
                        removeLoading();
                    },
                    error: function(response) {
                        removeLoading();
                    }
                });
            });

            // end roles jquery
                $(document).on('click','#deacivate', function (e) {
                    e.preventDefault();
                   var userID= $(this).closest('button').val();



                    $(document).on('click','#yes',function (e) {
                        e.preventDefault();
                        url = "{{ route('user.deactivate', ':id') }}";
                        url = url.replace(':id', userID);
                $.ajax({
                    url: url,
                    method: 'Put',
                    
                    beforeSend: function() {
                        displayLoading();
                    },
                    success: function(response) {
                        $('#modal-sm').modal('hide');
                       
                        window.location.replace(response.success);
                        removeLoading();
                    },
                    error: function(response) {
                        removeLoading();
                    }
                });




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
