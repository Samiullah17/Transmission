<form action="" method="POST" id="registrationSave" enctype="multipart/form-data">
    {{-- @csrf --}}
    <div class="row">
        <div class="col-lg-3 col-6">
            <div class="form-group">
                <label for="startDate">کال : </label>
                <input type="date" class="form-control" id="startDate" name="startDate">
                <span id="1startDate" name="startDate" class="text-danger "></span>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="form-group">
                <label for="">د مالی ریاست مکتوب ګڼه</label>
                <input type="number" class="form-control" name="financeNumber"
                    placeholder="د مالی ریاست مکتوب ګڼه ">
                <span id="1financeNumber" class="text text-danger" name="financeNumber"
                    role="alert">

                </span>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="form-group">
                <label for="finacetDate">د مالی ریاست مکتوب نیټه : </label>
                <input type="date" class="form-control" id="finacetDate" name="financetDate">
                <span id="1financetDate" name="finaceDate" class="text-danger"></span>
            </div>
        </div>
        <div class="col-lg-2">
            <div class="form-group">
                <label for="">د آویز نمبر</label>
                <input type="number" class="form-control" name="billNumber"
                    placeholder="د آویز نمبر ">
                <span id="1billNumber" class="text text-danger" name="billNumber" role="alert">

                </span>
            </div>
        </div>
    </div>
    <div class="row">



        <div class="col-lg-3">
            <div class="form-group">
                <label for="">د تعرفه نمبر</label>
                <input type="number" class="form-control" name="reciptNumber"
                    placeholder="د تعرفه نمبر ">
                <span id="1reciptNumber" class="text text-danger" name="reciptNumber"
                    role="alert">

                </span>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="form-group">
                <label for="startDate">د تعرفه نیټه : </label>
                <input type="date" class="form-control" id="recipttDate" name="recipttDate">
                <span id="1recipttDate" name="reciptDate" class="text-danger"></span>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="form-group">
                <label for=""> مقدار د حق الثبت </label>
                <input type="number" class="form-control" name="totalfee"
                    placeholder="مقدار د حق الثبت ">
                <span id="1totalfee" class="text text-danger" name="totalfee" role="alert">

                </span>
            </div>
        </div>

        <div class="col-lg-2">
            <div class="form-group">
                <label for="">بانک</label>
                <input type="text" class="form-control" name="bank" placeholder="بانک">
                <span id="1bank" class="text text-danger" name="bank" role="alert">

                </span>
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-lg-3">
            <div class="form-group">
                <label for="finacnceDocfile">د مکتوب فایل </label>
                <input class="form-control" name="finacnceDocfile" type="file"
                    placeholder="مکتوب">
                <span class="text-danger" id="1finacnceDocfile"></span>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="form-group">
                <label for="finacnceReciptfile">د تعرفه فایل </label>
                <input class="form-control" name="finacnceReciptfile" type="file"
                    placeholder="مکتوب">
                <span class="text-danger" id="1finacnceReciptfile"></span>
            </div>
        </div>
    </div>