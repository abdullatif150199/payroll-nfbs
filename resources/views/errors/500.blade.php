@extends('layouts.error')
@section('content')
    <div class="container text-center">
        <div class="display-1 text-muted mb-5">
            <i class="si si-exclamation"></i> 500
        </div>
        <h1 class="h2 mb-3">
            Oops.. Server error
        </h1>
        <p class="h4 text-muted font-weight-normal mb-7">
            Kami minta maaf, permintaan mengandung sintaks yang buruk dan tidak dapat dipenuhi...
        </p>
        <a class="btn btn-primary" href="{!! URL::previous() !!}">
            <i class="fe fe-arrow-left mr-2"></i> Kembali
        </a>
    </div>
@endsection