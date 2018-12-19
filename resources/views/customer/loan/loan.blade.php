@extends('customer.layout')

@section('content')

    <br/>
    <div class="row">

        @if($loan->count() <= 0)
            <div class="jumbotron jumbotron-fluid">
                <div class="container">
                    <h1 class="display-4">คุณไม่มีหนี้สินค้างชำระ</h1>
                    <p class="lead">ใหม่! คุณสามารถเลือกรับโปรโมทชั่นเพื่อการลงทุน สามารถดูรายละเอียดได้ที่ <a
                                href="/customer/promotion">หน้าโปรโมชั่น</a></p>
                </div>
            </div>
        @else
            @php
                $sum = 0;
                foreach ($loan as $ln){
                    $sum += $ln->amount;
                }
            @endphp
            <div class="jumbotron jumbotron-fluid">
                <div class="container">
                    <h1 class="display-4">คุณมีหนี้สินรวม {{$sum}} บาท</h1>
                    <p class="lead">และนี่คือรายการหนี้สินดังกล่าว</p>
                    <p>
                    <table class="table">
                        <thead>
                        <tr>
                            <th>หมายเลขรายการ</th>
                            <th>จำนวนเงิน</th>
                            <th>คืนแล้ว</th>
                            <th>ใช้คืน</th>
                        </tr>
                        </thead>
                        <tbdoy>
                            @foreach($loan as $ln)
                                <td>{{$ln->id}}</td>
                                <td>{{$ln->amount}}</td>
                                <td>{{$ln->payback}}</td>
                                <td>
                                    <form action="/customer/loan/payback">
                                        <input type="submit" value="จ่ายหนี้">
                                    </form>
                                </td>
                            @endforeach
                        </tbdoy>
                    </table>
                    </p>
                </div>
            </div>

        @endif


    </div>




@endsection