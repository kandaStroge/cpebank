@extends('admin.layout.layout')
@section('title')
    {{$title}}
@endsection

@section('content-header')
    {{$content_header}}
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-9">
            <form method="post" action="./transfer" id="deposit_send">
                {{csrf_field()}}

                <div class="card bg-light mb-3" style="max-width: 40rem;">
                    <div class="card-header">
                        <h1 id="none-header">กรุณาเลือกบัญชี</h1>
                        <div class="row ">
                            <div class="col-4" id="result"></div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group" id="">
                            <label for="customer_id">หมายเลขบัญชี ผู้ส่ง</label>
                            <div class="input-group" id="source-customer-number">
                                <input type="text" class="form-control col-9 name" name="name" id="source-showname"
                                       placeholder="Customer ID" value="" onchange="re_checking()">
                                <input type="hidden" name="scid" id="source-cid-hidden" value="">
                                <input class="form-control btn-warning col-3" type="button" id="source-check-user"
                                       onclick="checkUser('source');"
                                       value="ตรวจสอบบัชชี">
                            </div>

                        </div>
                        <div class="form-group" id="">
                            <label for="customer_id">หมายเลขบัญชี ผู้รับ</label>
                            <div class="input-group" id="dest-customer-number">
                                <input type="text" class="form-control col-9 name" name="name" id="dest-showname"
                                       placeholder="Customer ID" value="" onchange="re_checking()">
                                <input type="hidden" name="dcid" id="dest-cid-hidden" value="">
                                <input class="form-control btn-warning col-3" type="button" id="dest-check-user"
                                       onclick="checkUser('dest');"
                                       value="ตรวจสอบบัชชี">
                            </div>

                        </div>
                        <div class="form-group" id="">
                            <label for="balance">จำนวนเงินฝาก</label>
                            <div class="input-group" id="customer-number">
                                <input type="number" min="0" step="0.01" class="form-control" name="balance"
                                       placeholder="Balance" required/>


                            </div>

                        </div>
                        <div class="form-group" id="submit_div">
                            <input type="button" id="recheck" class="btn btn-warning btn-lg" onclick="re_checking()"
                                   value="ตรวจสอบความถูกต้อง">
                            <button type="reset" class="btn btn-secondary btn-lg" onclick="cleary()">ล้างค่า</button>
                        </div>
                    </div>
                </div>


            </form>
        </div>
    </div>


    <script>
        function re_checking() {
            var count = 0;

            if ($("#source-showname").is(':disabled')) {
                count += 1;

            }
            if ($("#dest-showname").is(':disabled')) {
                count += 1;

            }
            if (count >= 2) {
                if ($("#source-showname").val() === $("#dest-showname").val()) {
                    alert("ไม่สามารถส่งให้ตัวเองได้");
                    cleary();
                } else {
                    $("#recheck").remove();
                    $("#submit_div").prepend('<button type="submit" id="submit" class="btn btn-primary btn-lg">ฝากเงิน</button>');
                }

            } else {
                $("#recheck").remove();
                $("#submit").remove();
                $("#submit_div").prepend('<input type="button" id="recheck" class="btn btn-warning btn-lg" onclick="re_checking()" value="ตรวจสอบความถูกต้อง">');
            }
        }

        function cleary() {
            $("#source-showname").val('').prop('disabled', false);
            $("#source-check-user").remove();
            $("#source-customer-number")
                .append('<input class="form-control btn-warning col-3" type="button" id="source-check-user"\n' +
                    '                               onclick="checkUser(\'source\');"\n' +
                    '                               value="ตรวจสอบบัชชี">');
            $("#dest-showname").val('').prop('disabled', false);
            $("#dest-check-user").remove();
            $("#dest-customer-number")
                .append('<input class="form-control btn-warning col-3" type="button" id="dest-check-user"\n' +
                    '                               onclick="checkUser(\'dest\');"\n' +
                    '                               value="ตรวจสอบบัชชี">');
            $("#recheck").remove();
            $("#submit").remove();
            $("#submit_div").prepend('<input type="button" id="recheck" class="btn btn-warning btn-lg" onclick="re_checking()" value="ตรวจสอบความถูกต้อง">');
        }

        function edit(source) {
            $("#" + source + "-showname").val('').prop('disabled', false);
            $("#" + source + "-cid-hidden").val('');
            $("#result").html('');
            $("#none-header").html('กรุณาเลือกบัญชี');
            $("#" + source + "-check-user").remove();
            $("#" + source + "-customer-number")
                .append('<input class="form-control btn-warning col-3" type="button" id="' + source + '-check-user"\n' +
                    '                               onclick="checkUser(\'' + source + '\');"\n' +
                    '                               value="ตรวจสอบบัชชี">');
        }


        function checkUser(source) {
            $.ajax({
                type: 'POST',
                url: './check',
                data: {
                    _token: "{{csrf_token()}}",
                    "id": $("#" + source + "-showname").val()
                },
                success: function (data) {
                    var cid_hide = $("#" + source + "-showname").val();
                    $("#" + source + "-showname").val(data.user).prop('disabled', true);
                    $("#" + source + "-cid-hidden").val(cid_hide);
                    $("#result").html('ยอดเงินคงเหลือ ' + data.result + ' บาท');
                    $("#none-header").html('สรุปข้อมูล');
                    $("#" + source + "-check-user").remove();
                    $("#" + source + "-customer-number")
                        .append('<input class="form-control btn-secondary col-3" type="button" id="' + source + '-check-user" onclick="edit(\'' + source + '\');" value="แก้ไข">');


                },
                error: function () {
                    alert('ไม่พบผู้ใช้')
                }
            });

        }
    </script>



@endsection