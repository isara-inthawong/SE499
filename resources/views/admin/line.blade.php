@extends('layouts.admin-layout')

@section('title','Line')

@section('content')
<style>
    .content {
        width: 90%;
        margin: 2% 5% 5% 5%;
        padding: 5%;
        border-radius: 10px;
        -webkit-box-shadow: 5px 5px 15px 5px #000000;
        box-shadow: 5px 5px 15px 5px #000000;
    }

    .btn:hover {
        -webkit-box-shadow: 5px 5px 15px 5px #000000;
        box-shadow: 5px 5px 15px 5px #000000;
    }

    input[type="radio"] {
        display: none;
    }

    input[type="radio"]:checked {
        display: block;
    }

    .textinput {
        float: left;
        width: 100%;
        outline: none;
        resize: none;
        border: 1px solid grey;
    }

    .title {
        font-size: 50px;
    }

    .img_size {
        width: 50px;
    }

    .stk_active {
        border: 2px solid black;
    }
</style>
<div class="content">
    <a href="{{route('linenotify.index')}}" class="text-center">
        <h1 class="title"><b>ไลน์บรอดแคส</b></h1>
    </a>
    <h3 class="text-center">ส่งข้อความไปยัง <img src="{{url('./STK/line.svg')}}" width="30px">กลุ่มไลน์</h3>
    <form action="{{route('linenotify.sent')}} " method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group row">
            <label for="text_message" class="col-sm-1 col-form-label">ข้อความ</label>
            <div class="col-sm-10 table-responsive">
                <textarea name="text_message" id="text_message" class="textinput" maxlength="1000"></textarea>
            </div>
        </div>

        <div class="form-group row" id="sticker_list">
            <label for="sticker" class="col-sm-1 col-form-label"></label>
            <div class="col-sm-10 table-responsive">
                @foreach ($collection as $key => $item)
                <label for="{{$item->id}}">
                    <input type="radio" name="stkid" value="{{$item->sticker_id}}" id="{{$item->id}}"
                        style="display:none;" />
                    <img src="{{url('./STK/MoonJames')}}/{{$item->sticker_id}}.jpg" class="img_size"
                        id="img{{$item->id}}" />
                </label>
                @endforeach
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-1 col-form-label">รูปภาพ</label>
            <div class="col-sm-10">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="image" id="image" accept=".png, .jpeg, .jpg">
                </div>
            </div>
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-paper-plane"> Sent...</i>
            </button>
        </div>
    </form>
</div>
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
    $(function () {
    add_data('1');
    add_data('2');
    add_data('3');
    add_data('4');
    add_data('5');
    add_data('6');
    add_data('7');
    add_data('8');
    add_data('9');
    add_data('10');

    add_data('11');
    add_data('12');
    add_data('13');
    add_data('14');
    add_data('15');
    add_data('16');
    add_data('17');
    add_data('18');
    add_data('19');
    add_data('20');

    add_data('21');
    add_data('22');
    add_data('23');
    add_data('24');
    add_data('25');
    add_data('26');
    add_data('27');
    add_data('28');
    add_data('29');
    add_data('30');

    add_data('31');
    add_data('32');
    add_data('33');
    add_data('34');
    add_data('35');
    add_data('36');
    add_data('37');
    add_data('38');
    add_data('39');
    add_data('40');

    add_data('41');
    add_data('42');
    add_data('43');
    add_data('44');
    add_data('45');
    add_data('46');
    add_data('47');
    add_data('48');
    add_data('49');
    add_data('50');

    add_data('51');
    add_data('52');
    add_data('53');
    add_data('54');
    add_data('55');
    add_data('56');
    add_data('57');
    add_data('58');
    add_data('59');
    add_data('60');

    add_data('61');
    add_data('62');
    add_data('63');
    add_data('64');
    add_data('65');
    add_data('66');
    add_data('67');
    add_data('68');
    add_data('69');
    add_data('70');

    add_data('71');
    add_data('72');
    add_data('73');
    add_data('74');
    add_data('75');
    add_data('76');
    add_data('77');
    add_data('78');
    add_data('79');
    add_data('80');

    add_data('81');
    add_data('82');
    add_data('83');
    add_data('84');
    add_data('85');
    add_data('86');
    add_data('87');
    add_data('88');
});

function add_data(id) {
    $('#' + id).on('click', function () {
        $('input#' + id).prop('checked', true);
        $('.img_size').removeClass('stk_active');
        $('#img' + id).addClass('stk_active');
    });
}
</script>
@endsection
