@extends('BCA.Admin.cashier-layout.index')

@section('page-title')
    Pending Payments
@endsection
@section('contents')
@livewire('cashier.payment.pending.index', ['payments' => $payments])
@endsection
