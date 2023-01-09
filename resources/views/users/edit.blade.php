@extends('layouts1.app')
@section('title', ' ثبت یوزر ')
@section('content')



{{--  Starting of register modal--}}

<div class="content-wrapper">
    <div class="container-fluid">
    <form method="POST" action="{{ route('register') }}" id="generalInformation">
        @csrf
        @method('post')
        <div class="card">
            <div class="card-header">
                <div class="card-tools">
                    <div class="card-title text-center"><b>  دیوزر معلومات تغیرول</b></div>
                </div>
            </div>
            <div class="card-body">
                <div class="row" id="setHolderRow">
                    <div class="col-3">
                        <div class="form-group">
                            <label for="name"><span class="text-danger">*</span> کارمند نوم</label>
                            <input class="form-control" name="name" value="{{$users->name}}" type="text" placeholder="اسم کارمند">
                            @error('name')
                            <span name="name" class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="Fname"><span class="text-danger">*</span>پلار نوم</label>
                            <input class="form-control" name="Fname" value="{{$users->Fname }}" type="text" placeholder="پلار نوم">
                            @error('Fname')
                            <span name="name" class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="GFname"><span class="text-danger">*</span>د نیکه نوم</label>
                            <input class="form-control" name="GFname" value="{{ $users->GFname }}" type="text" placeholder="د نیکه نوم">
                            @error('GFname')
                            <span name="name" class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="NID"><span class="text-danger">*</span>د تذکره شمیره</label>
                            <input class="form-control" name="NID" value="{{ $users->NID }}" type="text" placeholder="د تذکره شمیره">
                            @error('NID')
                            <span name="name" class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row" >
                    <div class="col-3">
                        <div class="form-group">
                            <label for="CID"><span class="text-danger">*</span>دهویت کارت شمیره</label>
                            <input class="form-control" name="CID" value="{{$users->EID}}" type="text" placeholder="دهویت کارت شمیره">
                            @error('CID')
                            <span name="name" class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="mobile"><span class="text-danger">*</span> د موبایل شمیره</label>
                            <input class="form-control" name="mobile" value="{{ $users->phoneNO }}" type="text" placeholder="د موبایل شمیره">
                            @error('mobile')
                            <span name="name" class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="email"><span class="text-danger">*</span>ایمیل</label>
                            <input class="form-control" name="email" value="{{ $users->email  }}" type="email" placeholder=" ایمیل ">
                            @error('email')
                            <span name="name" class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="password">رمز <span class="text-danger">*</span></label>
                            <input class="form-control" value="{{ $users->password  }}" name="password" type="password" placeholder=" رمز">
                            @error('password')
                            <span name="password" class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <div class="form-group">
                            <label for="password-confirm"><span class="text-danger">*</span>تکرار رمز</label>
                            <input id='password-confirm' class="form-control" name="password_confirmation" type="text" placeholder="تکرار رمز">
                            @error('password-confirm')
                            <span name="name" class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    {{-- <div class="col-lg-3">
                        <div class="form-group">
                            <label for=""><span class="text-danger">*</span>ولایت</label>
                            <select name="province" id="province" class="form-control ">
                                <option disabled selected>ولایت انتخاب کړی</option>
                                @foreach ($provinces as $provence)
                                    <option value="{{ $provence->id }}" @if (old('province') == $provence->id)
                                        selected
                                    @endif
                                    >{{ $provence->provenceName }}</option>
                                @endforeach
                            </select>
                            @error('province')
                            <span name="name" class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div> --}}
                    {{-- <div class="col-lg-3">
                        <div class="form-group">
                            <label for="rutbaa"><span class="text-danger">*</span>رتبه</label>
                            <select name="rutbaa" id="rutbaa" class="form-control ">
                                <option disabled selected>رتبه انتخاب کړی</option>
                                @foreach ($rutbaas as $rutbaa)
                                    <option value="{{ $rutbaa->id }}" @if (old('rutbaa') == $rutbaa->id)
                                        selected
                                    @endif
                                    >{{ $rutbaa->name }}</option>
                                @endforeach
                            </select>
                            @error('rutbaa')
                            <span name="name" class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div> --}}

                   
                  
                    <div class="col-3">
                        <div class="form-group">
                            <label for="Base"><span class="text-danger">*</span>آمریت/مدیریت </label>
                            <input class="form-control" value="{{ $users->Management_Commander}}"  name="Base" value="{{ old('Base') }}" type="text"
                                placeholder="آمریت/مدیریت">
                                @error('Base')
                                <span name="name" class="text-danger">{{$message}}</span>
                                @enderror
                        </div>
                    </div>
                </div>
                   
                   
                   
              
                
            </div>
            <div class="card-footer pb-0">
                <div class="card-title">
                    <button class="btn btn-success" type="submit">ثپت <i class="fas fa-save"></i></button>
                </div>
            </div>
        </div>
    </form>
    {{-- End of Information Table --}}
</div>
</div>

{{--  end of register modal --}}


{{-- <div class="content-wrapper">
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
    </div> --}}
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
