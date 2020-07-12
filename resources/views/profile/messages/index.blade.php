@extends('layouts.profile')
@section('content')
<div class="col-lg-8">
    <div class="card">
        <div class="card-header">
            <div class="media-object avatar avatar-md mr-4">HR</div>
            Tim HRD
        </div>
        <div class="card-body" style="height:60vh;overflow-y: auto;">
            <div class="container-fluid">
                <div class="media py-4">
                    <div class="media-object avatar mr-4" style="background-image: url(demo/faces/male/32.jpg)"></div>
                    <div class="media-body bg-blue-lightest rounded px-4 py-4"
                        style="max-width:70%;word-break: break-word;">
                        <strong>Bu Fitri </strong><br>
                        Donec id elit non mi porta gravida at eget metus. Vivamus sagittis lacus vel augue laoreet
                        rutrum faucibus dolor auctor. Donec ullamcorper nulla non metus
                        auctor fringilla. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Sed
                        posuere consectetur est at lobortis.
                        <small class="pull-right text-muted">4 min</small>
                    </div>
                </div>
                {{-- pemilik akun --}}
                <div class="float-right bg-blue-lightest rounded px-4 py-4 mb-4"
                    style="max-width:70%;word-break: break-word;">
                    Donec id elit non mi porta gravida at eget metus. Vivamus sagittis lacus vel augue laoreet rutrum
                    faucibus dolor auctor. Donec ullamcorper nulla non metus
                    auctor fringilla. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Sed posuere
                    consectetur est at lobortis.
                    <small class="pull-right text-muted">4 min</small>
                </div>
                <div class="float-right bg-blue-lightest rounded px-4 py-4 mb-4"
                    style="max-width:70%;word-break: break-word;">
                    Donec id elit non mi porta gravida at eget metus. Vivamus sagittis lacus vel augue laoreet rutrum
                    faucibus dolor auctor. Donec ullamcorper nulla non metus
                    auctor fringilla. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Sed posuere
                    consectetur est at lobortis.
                    <small class="pull-right text-muted">4 min</small>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Ketik disini...">
                <div class="input-group-btn">
                    <button type="button" class="btn btn-secondary">
                        <i class="fe fe-send"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
