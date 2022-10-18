@extends('layouts.app')

@section('content')
    <div class="content-wrapper">

        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">

                            <div class="card-tools">

                                <div class="input-group input-group-sm" style="width: 150px;">

                                    <input type="text" name="table_search" class="form-control float-right"
                                        placeholder="Search">

                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default"><i
                                                class="fas fa-search"></i></button>
                                    </div>

                                </div>

                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <select name="provence_id" id="company_id" class="form-control">
                                <option selected disabled>د کمپنی یا بنسټ نوم انتخاب کړی</option>
                                @foreach ($companies as $company)
                                    <option value="{{ $company->id }}">{{ $company->companyName }}</option>
                                @endforeach
                            </select>



                           <table id="table" class="table table-striped table-hover table-border d-none">
                           <thead>
                            <tr>
                                <th>د مخابری ډول</th>
                                <th>د مخابری ماډل</th>
                                <th>ولایت</th>
                                <th>سریال نمبر</th>
                            </tr>
                           </thead>

                           <tbody id="tbody">

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
        $(document).ready(function(){
            $('#company_id').select2();
        });
        $(document).on('change', '#company_id', function() {

            var cid = $('#company_id').val();
            // $('#companyId').val(cid);





            $.ajax({
                type: "get",
                url: "{{ route('company.transmission') }}/" + cid,
                dataType: "json",
                success: function(response) {
                    // $('#agent_id option').remove();
                    // $('#tbody td').remove();
                    // $('#thead th').remove();
                    // $('#agent_id').append('<option disabled selected>نماینده انتخاب کړی</option>');
                    // $.each(response.agent, function(index, value) {
                    //     $('#agent_id').append('<option value="' + value.id + '">' + value
                    //         .agentName + '</option>');
                    // });


                    $('#table').removeClass('d-none');
                     $('#tbody td').remove();
                    console.log(response.order);
                    $.each(response.order, function(index, value) {
                             $('#tbody').append('<tr><td>'+value.tname+'</td><td>'+value.mname+'</td><td>'+value.pname+'</td><td>'+value.sname+'</td></tr>');
                    });



                }
            });

        });
    </script>
@endsection
