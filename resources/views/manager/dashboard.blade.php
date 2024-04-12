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

                    {{ __('You are logged in as a Manager!') }}
                </div>
            </div>
        </div>
    </div>
    <br>
            <div class="col-md-8 offset-md-4" style="display: inline-block;margin-left:700px">
                <button type="submit" class="btn btn-secondary">
                   <a href="{{ route('showEmployee') }}" style="color:white;text-decoration: none;">{{ __('Shaw all Employee') }}</a>
                </button>
                <button type="submit" class="btn btn-secondary">
                   <a href="{{route('insertEmployee')}}" style="color:white;text-decoration: none;">{{ __('Insert Employee') }}</a>
                </button>
            </div>
</div>
@endsection
