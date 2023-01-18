
<!DOCTYPE html>
<html direction="{{ (App::getLocale() == 'en') ? 'ltr' : 'rtl' }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="robots" content="all,follow">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style>
        body
            {
            font-family: 'bahijfont';
            direction: rtl;
            }

            .table,td
            {
                font-size:14px;
                border:1px solid gray;
                border-collapse: collapse;
                padding-right: 5px
            }
        .lab{
            font-weight: bold;
            font-size: 12px;
        }
        .lab2{
            font-size: 12px;
            font-weight: bold;
            word-spacing: 2px;
        }
        .lab3{
            font-size: 14px;
            word-spacing: 2px;
        }
        .left {
            text-align: left;
            margin-right: -30px;
            }
        .left2 {
            text-align: left;
            margin-left: -70px;
            }
        .right {
            text-align: left;
            margin-left: -70px;
            }

            .center {
            text-align: center;
            align-items: center;
            align-content: center;
            width: 100px;
            }
            .no-border{
                border-right: 1px solid white; 
                border-left:1px solid white; 
                padding-top:15px; 
                padding-bottom:5px;
                border-top:1px solid white;
                border-bottom:1px solid white;
            }
            .header-label{
                font-size: 18px;
                font-weight:bold;
                text-align: center;
                word-spacing: 2px;
            }

            table.blueTable {
            border: 1px solid #1C6EA4;
            background-color: #EEEEEE;
            width: 100%;
            text-align: left;
            border-collapse: collapse;
        }

        table.blueTable td,
        table.blueTable th {
            border: 1px solid #5B5B5B;
            padding: 3px 2px;
        }

        table.blueTable tbody td {
            font-size: 13px;
            color: #0C0C0C;
        }

        table.blueTable tr:nth-child(even) {
            background: #EFF5E2;
        }

        table.blueTable thead {
            background: #7FA483;
            background: -moz-linear-gradient(top, #9fbba2 0%, #8bad8f 66%, #7FA483 100%);
            background: -webkit-linear-gradient(top, #9fbba2 0%, #8bad8f 66%, #7FA483 100%);
            background: linear-gradient(to bottom, #9fbba2 0%, #8bad8f 66%, #7FA483 100%);
            border-bottom: 2px solid #0E0A32;
        }

        table.blueTable thead th {
            font-size: 15px;
            font-weight: bold;
            color: #0C0C0C;
            border-left: 2px solid #CACECB;
        }

        table.blueTable thead th:first-child {
            border-left: none;
        }

        table.blueTable tfoot {
            font-size: 14px;
            font-weight: bold;
            color: #FFFFFF;
            background: #D0E4F5;
            background: -moz-linear-gradient(top, #dcebf7 0%, #d4e6f6 66%, #D0E4F5 100%);
            background: -webkit-linear-gradient(top, #dcebf7 0%, #d4e6f6 66%, #D0E4F5 100%);
            background: linear-gradient(to bottom, #dcebf7 0%, #d4e6f6 66%, #D0E4F5 100%);
            border-top: 2px solid #444444;
        }

        table.blueTable tfoot td {
            font-size: 14px;
        }

        table.blueTable tfoot .links {
            text-align: right;
        }

        table.blueTable tfoot .links a {
            display: inline-block;
            background: #1C6EA4;
            color: #FFFFFF;
            padding: 2px 8px;
            border-radius: 5px;
        }
            
    </style>
</head>
<body dir="{{ (App::getLocale() == 'en') ? 'ltr' : 'rtl' }}">
        <table  width="100%" style="margin-bottom: 10px">
            <tbody>
                <tr>
                    <td  class="center-img" style="border: 1px solid white" colspan="1">
                        <img class="w3-hover-opacity" class="center left" style="width: 130px; height: 120px "  src="{{public_path('images/moi_logo.png')}}">
                    </td> 
                    <td colspan='5' class="center"  style="border: 1px solid white">
                        <p class='header-label'>دافغانستان اسلامی امارت</p>
                        <p class='header-label'> د کورنیو چارو وزارت</p>
                        <p class='header-label'>د مخابری او ټکنالوژی لوی ریاست</p>
                    </td>
                    <td  class="center-img2" style="border: 1px solid white" colspan="1">
                        <img class="w3-hover-opacity" class="center left2" style="width: 160px; height: 120px" src="{{public_path('images/moi.png')}}">
                    </td>
                </tr>
            </tbody>
        </table>
        <table width="100%">
            <tbody style="width: auto;overflow-x: auto;white-space: nowrap;">
                        <tr>
                            <td colspan="5" style="border: 1px solid white">
                                <span class="lab2" style="font-size: 14px">د بنسټ مسلسله شمیره</span><br>
                                <span class="lab3" style="font-size: 14px">
                                   ({{$registrationRights->CUID}})
                                 </span>
                                
                              
                            </td>
                        </tr>
                        <hr>
            </tbody>
        </table>
        <table  width="100%">
            <tr>
                <td colspan="6" style="height: 30; border-right: 1px solid white; border-left:1px solid white; padding-top:15px; padding-bottom:5px;border-top:1px solid white;border-bottom:1px solid white;">
                    <span class="lab2">د بنسټونو د حق الثبت بل: </span>
                </td>
            </tr>
        </table>
        <div  style="text-align:center" class="table table-respionsive">
            <table class="blueTable">
                <thead>
                    <tr>
                        <th>کمپنی نوم</th>
                        <th>د ثبت کال</th>
                        <th>انقضاه نیټه</th>
                        <th>مقدار(افغانی)</th>
                        <th>بانک</th>
                    </tr>
                </thead>
                <tbody>
                    
                        <tr>
                            <td>{{$registrationRights->cname}}</td>
                            <td>{{$registrationRights->reg_year}}</td>
                            <td>{{$registrationRights->ExpireREg_year}}</td>
                            <td style="text-align: center">{{$registrationRights->total_registration_fee}}</td>
                            <td>{{$registrationRights->bank}}</td>
                        </tr>
                  
                </tbody>
              
            </table>
        </div>
        <div class="billdate" style="margin-block-end: 10px">
            <span  style="font-size: 14px">د رسید نیټه </span><span  style="font-size: 14px">{{$billDate}}</span>
        </div>
                  
                 
</body>
</html>

