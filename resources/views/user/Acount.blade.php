@extends('layouts1.app')

@section('content')
    <div class="content-wrapper">

        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-tools">
                                <a href="{{ URL::previous() }}" class="btn btn-info btn-sm"> <i
                                        class="fas fa-arrow-right"></i></a>
                            </div>
                            <div class="card-title">

                                {{ $uname }}


                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <div class="card-tools">
                                د مالی حساب تصفیه
                            </div>
                            
                        </div>

                        <div class="card-body table-reponsive">

                            <table class="table table-striped table-border">
                                <thead>
                                    <th>د غوښتنی د رواړلو نیټه</th>
                                    <th>د پروګرام کولو نیټه</th>
                                    <th>مجموعه قیمت</th>
                                    <th>عمل</th>
                                </thead>
                                <tbody>
                                    @foreach ($userA as $item)
                                        <tr>
                                            <td>{{ $item->created_at }}</td>
                                            <td>{{ $item->updated_at }}</td>
                                            <td>{{ $item->rate }}</td>
                                            <td><a id='accountdelete'
                                                    href="{{ url('delete/user/acount/' . $item->accountID . '/' . $item->uid )}}">
                                                    <i class="fas fa-trash text-danger"></i></a></td>
                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>




                        </div>

                        <div class="card-footer" style="float: left">
                            <p style="float: left" class="mr-40">مجموعه د قیمت : <a id="totalaccount">{{ $t }}</a></p>

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

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $(document).on('click', '#accountdelete', function(e) {
                e.preventDefault();
                let mainThis = this;
                $.ajax({
                    method: "Delete",
                    url: $(this).attr('href'),
                    success: function(response) {
                        mainThis.closest('tr').remove();
                      
                         $("#totalaccount").text(response.success);


                    },
                });
            });
        });
    </script>
@endsection
