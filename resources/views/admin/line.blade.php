@extends('layouts.admin-layout')

@section('title','Send message to line')

@section('content')
<style>
    .content {
        margin: 2%;
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
        min-height: 75px;
        outline: none;
        resize: none;
        border: 1px solid grey;
    }

    .title {
        font-size: 84xp;
    }
</style>
<div class="container">
    <div class=" aqua-gradient content">
        <a href="/" class="text-center">
            <h1 class="title"><b>SE499-Test Line</b></h1>
        </a>
        <h3 class="text-center">Test send message to <img src="./STK/line.svg" width="30px">line group</h3>

        <form action="{{route('LineNotify.sent')}} " method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group row">
                <label for="text_message" class="col-sm-1 col-form-label">Message</label>
                <div class="col-sm-10 table-responsive">
                    <textarea name="text_message" id="text_message" class="textinput" maxlength="1000"></textarea>
                </div>
            </div>

            {{-- <div class="form-group">
                <div class="row">
                    <label class="col-form-label col-sm-1 pt-0">Sticker</label>
                    <div class="col-sm-10 row">
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="stkpkgid" id="gridRadios1" value="1">
                            <label class="form-check-label" for="gridRadios1">
                                Moon James
                            </label>
                        </div>
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="stkpkgid" id="gridRadios2" value="2">
                            <label class="form-check-label" for="gridRadios2">
                                Brown Cony
                            </label>
                        </div>
                    </div>
                </div>
            </div> --}}

            {{-- <div class="form-group row" id="sticker_list" style="display:none">
            </div> --}}
            <div class="form-group row" id="sticker_list">
                <label for="sticker" class="col-sm-1 col-form-label"></label>
                <div class="col-sm-10 table-responsive">
                    @foreach ($collection as $key => $item)
                    <label>
                        <input type="radio" name="stkid" value="{{$item->sticker_id}}" />
                        <img src="./STK/MoonJames/{{$item->sticker_id}}.jpg" />
                    </label>
                    @endforeach
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-1 col-form-label">Image</label>
                <div class="col-sm-10">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="image" id="image" accept=".png, .jpeg, .jpg">
                        <label class="custom-file-label" for="image">Choose file...</label>
                        <div class="invalid-feedback">Example invalid custom file feedback</div>
                    </div>
                </div>
            </div>

            <div class="text-center">
                <button type="submit" class="btn blue-gradient">
                    <i class="fas fa-paper-plane"> Sent...</i>
                </button>
            </div>
        </form>
    </div>
</div>

<script type="text/javascript">
    if($('#gridRadios1').is(':checked')) {
        sticker_list.style.display = "block";
        alert('gridRadios1 is checked!');
    }
</script>
@endsection