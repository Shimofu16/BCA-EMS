@extends('BCA.Admin.cashier-layout.index')

@section('page-title')
    Confirmed Payments
@endsection
@section('contents')
@livewire('cashier.payment.confirmed.index', ['payments' => $payments])

@endsection
