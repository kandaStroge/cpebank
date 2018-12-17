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
            <form method="post" action="./deposit" id="deposit_send">
                {{csrf_field()}}

                <div class="card bg-light mb-3" style="max-width: 40rem;">
                    <div class="card-header">
                        <h1 id="none-header">กรุณาเลือกบัญชี</h1>
                        <div class="row " >
                            <div class="col-4" id="result"></div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group" id="">
                            <label for="customer_id">หมายเลขบัญชี</label>
                            <div class="input-group" id="customer-number">
                                <input type="text" class="form-control col-9" name="name" id="showname"
                                       placeholder="Customer ID" value="">
                                <input type="hidden" name="cid" id="cid-hidden" value="">
                                <input class="form-control btn-warning col-3" type="button" id="check-user"
                                       onclick="checkUser();"
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
                            <button type="reset" class="btn btn-secondary btn-lg" onclick="edit()">ล้างค่า</button>
                        </div>
                    </div>
                </div>


            </form>
        </div>
    </div>


    <script>


        function edit() {
            $("#showname").val('').prop('disabled', false);
            $("#cid-hidden").val('');
            $("#result").html( '');
            $("#none-header").html( 'กรุณาเลือกบัญชี');
            $("#check-user").remove();
            $("#customer-number")
                .append('<input class="form-control btn-warning col-3" type="button" id="check-user"\n' +
                    '                               onclick="checkUser();"\n' +
                    '                               value="ตรวจสอบบัชชี">');
            $("#submit").remove();
            // $("#submit_div").prepend('<input type="button" id="submit" class="btn btn-primary btn-lg col-4" value="Submit">');
        }


        function checkUser() {
            $.ajax({
                type: 'POST',
                url: './check',
                data: {
                    _token: "{{csrf_token()}}",
                    "id": $("#showname").val()
                },
                success: function (data) {
                    var cid_hide = $("#showname").val();
                    $("#showname").val(data.user).prop('disabled', true);
                    $("#cid-hidden").val(cid_hide);
                    $("#result").html( 'ยอดเงินคงเหลือ '+data.result+' บาท');
                    $("#none-header").html( 'สรุปข้อมูล');
                    $("#check-user").remove();
                    $("#customer-number")
                        .append('<input class="form-control btn-secondary col-3" type="button" id="check-user"\n' +
                            'onclick="edit();"\n' +
                            'value="แก้ไข">');
                    $("#submit").remove();
                    $("#submit_div").prepend('<button type="submit" id="submit" class="btn btn-primary btn-lg">ฝากเงิน</button>')
                },
                error: function () {
                    alert('ไม่พบผู้ใช้')
                }
            });

        }
    </script>



@endsection