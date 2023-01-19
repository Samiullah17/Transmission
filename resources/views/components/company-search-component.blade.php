
@if ($companys->isEmpty())
    <tr >
        <td colspan="5" class='text-danger text-center'> معلومات پیدا نشول</td colspan="5">
    </tr>
@else
    @foreach ($companys as $company)
        <tr>
            <td>{{ $company->companyName }}</td>
            <td>{{ $company->aname }}</td>
            <td>{{ $company->tname }}</td>
            <td>{{ $company->companyManagerName }}</td>
            <td>
                @if ($company->status == 0)
                    <span class="badge badge-danger">غیر فعال</span>
                @endif
                @if ($company->status == 1)
                    <span class="badge badge-success">فعال</span>
                @endif
            </td>
            <td>
                <div class="input-group input-group-sm mb-3">
                    <div class="input-group-prepend">
                        
                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                            عملیات
                        </button>
                     
                        <ul class="dropdown-menu">
                            <li class="dropdown-item"><a href="{{ route('details.company',$company->id) }}">معلومات</a></li>
                           
                            <li class="dropdown-item"><a href="{{ route('saveRight.company',$company->id) }}"> د کمپنی حق الثبت</a></li>

                            <li class="dropdown-item"><a href="{{ route('licence.company',$company->id) }}">د فریکونسیو جواز</a></li>

                            <li class="dropdown-item"><a href="{{ route('fine.company',$company->id) }}">د کمپنی جریمه</a></li>

                        </ul>
                    </div>
                    <!-- /btn-group -->
                </div>
            </td>
        </tr>
    @endforeach
    {{-- <tr class="d-flex justify-content-center"> --}}
        {{-- <td class="text-center d-flex justify-content-center w-100">{{ $companys->links() }}</td> --}}
    {{-- </tr> --}}
    @endif

 <tr><td> {{ $companys->links() }}</td></tr>


