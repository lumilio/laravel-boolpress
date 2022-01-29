@extends('admin.layouts.DashboardTemplate')

@section('table')
<div class="container">
    <div class="">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                    {{ Auth::user()->name }}, {{ __('you are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection



