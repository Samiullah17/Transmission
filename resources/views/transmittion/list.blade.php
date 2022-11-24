@extends('layouts.app')

@section('content')
    <div class="content-wrapper">

        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">

                            <div class="card-tools">

                                <div class="card-title">
                                    <button type="button" id="allTra" class="btn btn-primary cmp d-none">د ټولو مخابرو کتل</button>
                                    <button type="button" id="allOrder" class="btn btn-primary cmp d-none">د ټولو وړاندیزونو کتل</button>
                                     <button type="button" id="dOrder" class="btn btn-primary cmp d-none">د تاریخ په اساس د وړاندیزونو کتل</button>
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

                           <table id="table" class="table table-striped table-hover table-border">

                            <thead id="thead">

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

        $(document).on('change', '#company_id', function() {

            var cid = $(this).val();
            $('.cmp').val($(this).val());
            $('.cmp').removeClass('d-none');
            $(this).addClass('d-none');
        });



        $(document).on('click','#allTra',function(e){
            e.preventDefault();
            var id=$(this).val();
            let data={
                'id':id,
                'status':'allTra',
            }
            let url="{{ route('all.transmission') }}";
            $.ajax({
                type:"Get",
                url:url,
                data:data,
                dataType:"json",
                success:function(response){
                     console.log(response);
                     $('#thead').html('');
                     $('#tbody').html('');
                     $('#thead').append('<tr><th>د مخابری ډول</th><th>د مخابری ماډل</th><th>سریال نمبر</th><th>ولایت</th><th>حالت</th></tr>');
                     $.each(response.data, function(index, value){
                        if(value.status==0){

                            $('#tbody').append('<tr><td>'+value.tname+'</td><td>'+value.mname+'</td><td>'+value.serialNo+'</td><td>'+value.pname+'</td><td><span class="badge badge-warning">د پروګرام په حال کی</span></td></tr>');
                        }
                        else{

                            $('#tbody').append('<tr><td>'+value.tname+'</td><td>'+value.mname+'</td><td>'+value.serialNo+'</td><td>'+value.pname+'</td><td><span class="badge badge-success">پروګرام شوی</span></td></tr>');
                        }


                     });

                }
            })
        })


        $(document).on('click','#allOrder',function(e){
            e.preventDefault();
            var id=$(this).val();
            let data={
                'id':id,
                'status':'allOrders',
            }
            let url="{{ route('all.transmission') }}"
            $.ajax({
                type:"Get",
                url:url,
                data:data,
                dataType:"json",
                success:function(response){
                     console.log(response);

                     $('#thead').html('');
                     $('#tbody').html('');
                     $('#thead').append('<tr><th>د کمپنی نوم</th><th>د نماینده نوم</th><th>د غوښتنی د مراجعی نیټه</th><th>په غوښتنه کی د ټولو مخابرو شمیر</th></tr>');
                     $.each(response.data, function(index, value){
                        if(value.status==0){
                            $('#tbody').append('<tr><td>'+value.company+'</td><td>'+value.aname+'</td><td>'+value.created_at+'</td><td>'+value.total_transmissions+'</td><td style="color:red" class="text-bold"><span class="badge badge-warning">د پروګرام په حال کی</span></td></tr>');
                        }
                        else{

                            $('#tbody').append('<tr><td>'+value.company+'</td><td>'+value.aname+'</td><td>'+value.created_at+'</td><td>'+value.total_transmissions+'</td><td style="color:green" class="text-bold"><span class="badge badge-success">پروګرام شوی</span></td></tr>');
                        }

                     });


                }
            })
        })
    </script>
@endsection
