<!DOCTYPE html>

<body lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        {{-- <meta http-equiv="X-UA-Compatible" content="ie=edge"> --}}
        {{-- Bootstrap css --}}
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
            integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <title></title>
        {{-- Fonts --}}
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <style>
            @font-face {
                font-family: 'THSarabunNew';
                font-style: normal;
                font-weight: normal;
                src: url("{{ asset('fonts/THSarabunNew.ttf') }}") format('truetype');
            }

            @font-face {
                font-family: 'THSarabunNew';
                font-style: normal;
                font-weight: bold;
                src: url("{{ asset('fonts/THSarabunNew Bold.ttf') }}") format('truetype');
            }

            @font-face {
                font-family: 'THSarabunNew';
                font-style: italic;
                font-weight: normal;
                src: url("{{ asset('fonts/THSarabunNew Italic.ttf') }}") format('truetype');
            }

            @font-face {
                font-family: 'THSarabunNew';
                font-style: italic;
                font-weight: bold;
                src: url("{{ asset('fonts/THSarabunNew BoldItalic.ttf') }}") format('truetype');
            }

            body {
                font-family: "THSarabunNew";
                font-size: 1.8em;
            }

            @page {
                size: auto;
                margin: 0mm;
            }
        </style>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    </head>

    <body>
        <div class="container" id="section-to-print">
            <input type="hidden" id="img_url" value="{{url(asset('images/logo.jpg'))}}">
            <center><img id="img" src="{{url(asset('images/logo.jpg'))}}" alt="logo" height="150px"></center>
            <center>
                กิจกรรม {{$show->activity->activity_name}},
                จัดวันที่ {{$show->activity->activity_date}} เวลา {{$show->activity->activity_time}}
                ถึงวันที่ {{$show->activity->activity_todate}} เวลา {{$show->activity->activity_totime}}
                จำนวนชัวโมง {{$show->activity->hour}}
            </center>
            <center>
                รายละเอียด {{$show->activity->activity_detail}}
            </center>
            <br>
            <center>
                นักศึกษาที่โหวตทั้งหมด {{$count_alljoin[$show->activity_id]}}
            </center>

            <center>
                นักศึกษาที่เข้าร่วมทั้งหมด {{$count_join[$show->activity_id]}} &nbsp;&nbsp;&nbsp;&nbsp;
                นักศึกษาไม่เข้าร่วมทั้งหมด {{$count_unjoin[$show->activity_id]}} &nbsp;&nbsp;&nbsp;&nbsp;
                นักศึกษายกเลิกเข้าการร่วมทั้งหมด {{$count_cancle_join[$show->activity_id]}} &nbsp;&nbsp;&nbsp;&nbsp;
            </center>
        </div>

        <center>
            <button id="printpagebutton" type="button" onclick="printpage()" class="btn btn-success">
                <i class="fas fa-print"> พิมพ์</i>
            </button>
        </center>
        {{-- Bootstrap js --}}
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
            integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
        </script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
            integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
        </script>
        <script type="text/javascript">
            function printpage() {
                //Get the print button and put it into a variable
                var printButton = document.getElementById("printpagebutton");
                //Set the print button visibility to 'hidden'
                printButton.style.visibility = 'hidden';
                //Print the page content
                window.print()
                printButton.style.visibility = 'visible';
            }
        </script>
    </body>

    </html>
