@extends('layouts.main')
@section('title',  'Успешный заказ' )

@section('content')
    <div class="container text-center mt-5">
        <h2 class="text-danger mb-3">Ошибка оплаты!</h2>
        <p>К сожалению, оплата не прошла. Попробуйте еще раз или свяжитесь с поддержкой.</p>
        <a href="{{ route('main') }}" class="btn btn-primary no-underline mt-3">Вернуться на главную</a>
    </div>
@endsection
