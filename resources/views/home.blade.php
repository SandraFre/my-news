@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <table class="table">
                        <tr>
                            <td>{{__('E-mail')}}</td>
                            <td>{{$user->email}}</td>
                        </tr>
                        <tr>
                            <td>{{__('Registered from')}}</td>
                            <td>{{$user->created_at}}</td>
                        </tr>
                    </table>
                </div>
                <div class="card-footer">
                <a href="" class="btn btn-sm btn-outline-primary">{{__('Edit')}}</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
