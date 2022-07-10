@extends('BCA.Admin.cashier-layout.index')

@section('page-title')
    Payments
@endsection
@section('contents')
@livewire('cashier.payment.student.index', ['payments' => $payments])
@endsection
