@extends('layouts.main')
@section('title',  'Успешный заказ' )

@section('content')
    @if(isset($order))
        <div class="container text-center mt-5">
            <h2 class="text-success mb-3">Оплата прошла успешно!</h2>
            <p>Спасибо за ваш заказ. Мы уже начали его обработку.</p>
            <a href="{{ route('main') }}" class="btn btn-primary no-underline mt-3">Вернуться на главную</a>
        </div>
    @else
    <div class="container text-center mt-5">
        <h2 class="text-success mb-3">Спасибо за ваш заказ. Менеджер скоро свяжеться с вами.</h2>
        <a href="{{ route('main') }}" class="btn btn-primary no-underline mt-3">Вернуться на главную</a>
    </div>
    @endif

@endsection
