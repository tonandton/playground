@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{-- {{ __('You are logged in!') }} --}}
                        <ul>
                            <li>
                                <a href="/cal">{{ __('คำนวณโกดังเช่า') }}</a>
                            </li>
                            <li>
                                <a href="/cal2">{{ __('คำนวณโกดังเช่าแบบใหม่') }}</a>
                            </li>
                            <li>
                                <a href="/delivery">{{ __('คำนวณค่าขนส่ง') }}</a>
                            </li>
                            <li>
                                <a href="/equiments">{{ __('อุปกรณ์') }}</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
