@extends('layouts1.app')
@section('title', ' ثبت یوزر ')
@section('content')
<div class="content-wrapper">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card  mt-5">
                    <div class="card-header text-bold text-center">ثپت یوزر جدید</div>

                    <div class="card-body" >
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            @method('Post')
                            <div class="form-group">
                                <label for="name">اسم کارمند <i class="text-danger">*</i></label>

                                <input id="name" type="text" class="form-control" name="name" autofocus>

                                <span class="text-danger" name="name"></span>
                            </div>

                            <div class="form-group">
                                <label for="email">ایمیل <i class="text-danger">*</i></label>

                                <input id="email" type="email" class="form-control" name="email">

                                <span class="text-danger" name="email"></span>
                            </div>

                            <div class="form-group">
                                <label for="password">رمز<i class="text-danger">*</i></label>

                                <input id="password" type="password" class="form-control" name="password">

                                <span class="text-danger" name="password"></span>
                            </div>

                            <div class="form-group">
                                <label for="password-confirm">تکرار رمز <i class="text-danger">*</i></label>

                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation">
                                <span class="text-danger" name="password_confirmation"></span>
                            </div>

                            <div class="w-100">
                                <button type="submit" class="btn btn-primary w-100">
                                    ثپت <i class="fas fa-save"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

{{-- @section('script')
    <script>
        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(document).on('click', '[type="submit"]', function(e) {
                e.preventDefault();

                clearErrorMessages();

                $.ajax({
                    url: $(this).closest('form').attr('action'),
                    method: $(this).closest('form').attr('method'),
                    data: $(this).closest('form').serialize(),
                    // beforeSend: function() {
                    //     displayLoading();
                    // },
                    success: function(response) {
                        window.location.replace(response.success);
                       // removeLoading();
                    },
                    error: function(response, error) {
                        displayLoginErrors(response.responseJSON.errors);
                        //removeLoading();
                    }
                });
            });

            function displayLoginErrors(errors) {
                $.each(errors, function(key, value) {
                    $('span[name="' + key + '"]').html(value[0]);
                });
            }

            function clearErrorMessages() {
                $('span').html('');
            }
        });
    </script>
@endsection --}}
