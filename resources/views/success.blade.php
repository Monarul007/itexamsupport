@extends('layouts.app')

@section('content')

<div class="container m-5">
    @if($data['bank_status'] == "SUCCESS")
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
    @else
        <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
    @endif
    <span><b>Order Number:</b> {{ substr($data['tx_id'],4) }}</span><br>
    <span><b>Transaction ID: </b>{{ $data['tx_id'] }}</span><br>
    <span><b>Bank Transaction ID:</b> {{ $data['bank_tx_id'] }}</span><br>
    <span><b>Amount</b> {{ $data['amount'] }}</span><br>
    <span><b>Bank Transaction Status: </b>{{ $data['bank_status'] }}</span><br>
    <span><b>Gateway Code: </b>{{ $data['sp_code'] }}</span><br>
    <span><b>Gateway Description: </b>{{ $data['sp_code_des'] }}</span><br>
    <span><b>Payment Option:</b> {{ $data['sp_payment_option'] }}</span>
</div>

@endsection