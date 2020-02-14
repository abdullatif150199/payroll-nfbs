@extends('tabler::layouts.main')
@section('title', 'Dashboard | ' . config('tabler.suffix'))
@section('content')
<div class="row row-cards">
    <div class="col-6 col-sm-4 col-lg-2">
        <div class="card">
            <div class="card-body p-3 text-center">
                <div class="text-right text-green">
                    <i class="fe fe-activity"></i>
                </div>
                <div class="h1 m-0">{{ $karyawan->count() }}</div>
                <div class="text-muted mb-4">Karyawan</div>
            </div>
        </div>
    </div>
    <div class="col-6 col-sm-4 col-lg-2">
        <div class="card">
            <div class="card-body p-3 text-center">
                <div class="text-right text-green">
                    <i class="fe fe-activity"></i>
                </div>
                <div class="h1 m-0">{{ $bidang }}</div>
                <div class="text-muted mb-4">Bidang</div>
            </div>
        </div>
    </div>
    <div class="col-6 col-sm-4 col-lg-2">
        <div class="card">
            <div class="card-body p-3 text-center">
                <div class="text-right text-green">
                    <i class="fe fe-activity"></i>
                </div>
                <div class="h1 m-0">{{ $unit }}</div>
                <div class="text-muted mb-4">Unit</div>
            </div>
        </div>
    </div>
    <div class="col-6 col-sm-4 col-lg-2">
        <div class="card">
            <div class="card-body p-3 text-center">
                <div class="text-right text-green">
                    <i class="fe fe-activity"></i>
                </div>
                <div class="h1 m-0">{{ $golongan }}</div>
                <div class="text-muted mb-4">Golongan</div>
            </div>
        </div>
    </div>
    <div class="col-6 col-sm-4 col-lg-2">
        <div class="card">
            <div class="card-body p-3 text-center">
                <div class="text-right text-green">
                    <i class="fe fe-activity"></i>
                </div>
                <div class="h1 m-0">{{ $kepala_keluarga }}</div>
                <div class="text-muted mb-4">Kepala Keluarga</div>
            </div>
        </div>
    </div>
    <div class="col-6 col-sm-4 col-lg-2">
        <div class="card">
            <div class="card-body p-3 text-center">
                <div class="text-right text-green">
                    <i class="fe fe-activity"></i>
                </div>
                <div class="h1 m-0">{{ $cuti }}</div>
                <div class="text-muted mb-4">Sedang Cuti</div>
            </div>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Status Karyawan</h3>
            </div>
            <div class="card-body">
                <div id="chart-bar" style="height: 12rem;">

                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Filled</h3>
                    </div>
                    <div class="card-body">
                        <div id="chart-donut" style="height: 12rem;">

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Persentase Golongan</h3>
                    </div>
                    <div class="card-body">
                        <div id="chart-pie" style="height: 12rem;">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row row-cards row-deck">
    <div class="col-12">
        <div class="card">
            <table class="table table-responsive-sm table-hover table-outline table-vcenter card-table">
                <thead>
                    <tr>
                        <th class="text-center w-1"><i class="icon-people"></i></th>
                        <th>User</th>
                        <th>Usage</th>
                        <th class="text-center">Payment</th>
                        <th>Activity</th>
                        <th class="text-center">Satisfaction</th>
                        <th class="text-center"><i class="icon-settings"></i></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-center">
                            <div class="avatar d-block" style="background-image: url(demo/faces/female/26.jpg)">
                                <span class="avatar-status bg-green"></span>
                            </div>
                        </td>
                        <td>
                            <div>Elizabeth Martin</div>
                            <div class="small text-muted">
                                Registered: Feb 23, 2018
                            </div>
                        </td>
                        <td>
                            <div class="clearfix">
                                <div class="float-left">
                                    <strong>42%</strong>
                                </div>
                                <div class="float-right">
                                    <small class="text-muted">Jun 11, 2015 - Jul 10, 2015</small>
                                </div>
                            </div>
                            <div class="progress progress-xs">
                                <div class="progress-bar bg-yellow" role="progressbar" style="width: 42%" aria-valuenow="42" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </td>
                        <td class="text-center">
                            <i class="payment payment-visa"></i>
                        </td>
                        <td>
                            <div class="small text-muted">Last login</div>
                            <div>4 minutes ago</div>
                        </td>
                        <td class="text-center">
                            <div class="mx-auto chart-circle chart-circle-xs" data-value="0.42" data-thickness="3" data-color="blue"><canvas width="40" height="40"></canvas>
                                <div class="chart-circle-value">42%</div>
                            </div>
                        </td>
                        <td class="text-center">
                            <div class="item-action dropdown">
                                <a href="javascript:void(0)" data-toggle="dropdown" class="icon"><i class="fe fe-more-vertical"></i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fe fe-tag"></i> Action </a>
                                    <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fe fe-edit-2"></i> Another action </a>
                                    <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fe fe-message-square"></i> Something else here</a>
                                    <div class="dropdown-divider"></div>
                                    <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fe fe-link"></i> Separated link</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">
                            <div class="avatar d-block" style="background-image: url(demo/faces/female/17.jpg)">
                                <span class="avatar-status bg-green"></span>
                            </div>
                        </td>
                        <td>
                            <div>Michelle Schultz</div>
                            <div class="small text-muted">
                                Registered: Feb 7, 2018
                            </div>
                        </td>
                        <td>
                            <div class="clearfix">
                                <div class="float-left">
                                    <strong>0%</strong>
                                </div>
                                <div class="float-right">
                                    <small class="text-muted">Jun 11, 2015 - Jul 10, 2015</small>
                                </div>
                            </div>
                            <div class="progress progress-xs">
                                <div class="progress-bar bg-red" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </td>
                        <td class="text-center">
                            <i class="payment payment-googlewallet"></i>
                        </td>
                        <td>
                            <div class="small text-muted">Last login</div>
                            <div>5 minutes ago</div>
                        </td>
                        <td class="text-center">
                            <div class="mx-auto chart-circle chart-circle-xs" data-value="0.0" data-thickness="3" data-color="blue"><canvas width="40" height="40"></canvas>
                                <div class="chart-circle-value">0%</div>
                            </div>
                        </td>
                        <td class="text-center">
                            <div class="item-action dropdown">
                                <a href="javascript:void(0)" data-toggle="dropdown" class="icon"><i class="fe fe-more-vertical"></i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fe fe-tag"></i> Action </a>
                                    <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fe fe-edit-2"></i> Another action </a>
                                    <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fe fe-message-square"></i> Something else here</a>
                                    <div class="dropdown-divider"></div>
                                    <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fe fe-link"></i> Separated link</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">
                            <div class="avatar d-block" style="background-image: url(demo/faces/female/21.jpg)">
                                <span class="avatar-status bg-green"></span>
                            </div>
                        </td>
                        <td>
                            <div>Crystal Austin</div>
                            <div class="small text-muted">
                                Registered: Mar 14, 2018
                            </div>
                        </td>
                        <td>
                            <div class="clearfix">
                                <div class="float-left">
                                    <strong>96%</strong>
                                </div>
                                <div class="float-right">
                                    <small class="text-muted">Jun 11, 2015 - Jul 10, 2015</small>
                                </div>
                            </div>
                            <div class="progress progress-xs">
                                <div class="progress-bar bg-green" role="progressbar" style="width: 96%" aria-valuenow="96" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </td>
                        <td class="text-center">
                            <i class="payment payment-mastercard"></i>
                        </td>
                        <td>
                            <div class="small text-muted">Last login</div>
                            <div>a minute ago</div>
                        </td>
                        <td class="text-center">
                            <div class="mx-auto chart-circle chart-circle-xs" data-value="0.96" data-thickness="3" data-color="blue"><canvas width="40" height="40"></canvas>
                                <div class="chart-circle-value">96%</div>
                            </div>
                        </td>
                        <td class="text-center">
                            <div class="item-action dropdown">
                                <a href="javascript:void(0)" data-toggle="dropdown" class="icon"><i class="fe fe-more-vertical"></i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fe fe-tag"></i> Action </a>
                                    <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fe fe-edit-2"></i> Another action </a>
                                    <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fe fe-message-square"></i> Something else here</a>
                                    <div class="dropdown-divider"></div>
                                    <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fe fe-link"></i> Separated link</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">
                            <div class="avatar d-block" style="background-image: url(demo/faces/male/32.jpg)">
                                <span class="avatar-status bg-green"></span>
                            </div>
                        </td>
                        <td>
                            <div>Douglas Ray</div>
                            <div class="small text-muted">
                                Registered: Dec 23, 2017
                            </div>
                        </td>
                        <td>
                            <div class="clearfix">
                                <div class="float-left">
                                    <strong>6%</strong>
                                </div>
                                <div class="float-right">
                                    <small class="text-muted">Jun 11, 2015 - Jul 10, 2015</small>
                                </div>
                            </div>
                            <div class="progress progress-xs">
                                <div class="progress-bar bg-red" role="progressbar" style="width: 6%" aria-valuenow="6" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </td>
                        <td class="text-center">
                            <i class="payment payment-shopify"></i>
                        </td>
                        <td>
                            <div class="small text-muted">Last login</div>
                            <div>a minute ago</div>
                        </td>
                        <td class="text-center">
                            <div class="mx-auto chart-circle chart-circle-xs" data-value="0.06" data-thickness="3" data-color="blue"><canvas width="40" height="40"></canvas>
                                <div class="chart-circle-value">6%</div>
                            </div>
                        </td>
                        <td class="text-center">
                            <div class="item-action dropdown">
                                <a href="javascript:void(0)" data-toggle="dropdown" class="icon"><i class="fe fe-more-vertical"></i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fe fe-tag"></i> Action </a>
                                    <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fe fe-edit-2"></i> Another action </a>
                                    <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fe fe-message-square"></i> Something else here</a>
                                    <div class="dropdown-divider"></div>
                                    <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fe fe-link"></i> Separated link</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">
                            <div class="avatar d-block" style="background-image: url(demo/faces/female/12.jpg)">
                                <span class="avatar-status bg-green"></span>
                            </div>
                        </td>
                        <td>
                            <div>Teresa Reyes</div>
                            <div class="small text-muted">
                                Registered: Feb 9, 2018
                            </div>
                        </td>
                        <td>
                            <div class="clearfix">
                                <div class="float-left">
                                    <strong>36%</strong>
                                </div>
                                <div class="float-right">
                                    <small class="text-muted">Jun 11, 2015 - Jul 10, 2015</small>
                                </div>
                            </div>
                            <div class="progress progress-xs">
                                <div class="progress-bar bg-red" role="progressbar" style="width: 36%" aria-valuenow="36" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </td>
                        <td class="text-center">
                            <i class="payment payment-ebay"></i>
                        </td>
                        <td>
                            <div class="small text-muted">Last login</div>
                            <div>2 minutes ago</div>
                        </td>
                        <td class="text-center">
                            <div class="mx-auto chart-circle chart-circle-xs" data-value="0.36" data-thickness="3" data-color="blue"><canvas width="40" height="40"></canvas>
                                <div class="chart-circle-value">36%</div>
                            </div>
                        </td>
                        <td class="text-center">
                            <div class="item-action dropdown">
                                <a href="javascript:void(0)" data-toggle="dropdown" class="icon"><i class="fe fe-more-vertical"></i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fe fe-tag"></i> Action </a>
                                    <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fe fe-edit-2"></i> Another action </a>
                                    <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fe fe-message-square"></i> Something else here</a>
                                    <div class="dropdown-divider"></div>
                                    <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fe fe-link"></i> Separated link</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">
                            <div class="avatar d-block" style="background-image: url(demo/faces/female/4.jpg)">
                                <span class="avatar-status bg-green"></span>
                            </div>
                        </td>
                        <td>
                            <div>Emma Wade</div>
                            <div class="small text-muted">
                                Registered: Feb 24, 2018
                            </div>
                        </td>
                        <td>
                            <div class="clearfix">
                                <div class="float-left">
                                    <strong>7%</strong>
                                </div>
                                <div class="float-right">
                                    <small class="text-muted">Jun 11, 2015 - Jul 10, 2015</small>
                                </div>
                            </div>
                            <div class="progress progress-xs">
                                <div class="progress-bar bg-red" role="progressbar" style="width: 7%" aria-valuenow="7" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </td>
                        <td class="text-center">
                            <i class="payment payment-paypal"></i>
                        </td>
                        <td>
                            <div class="small text-muted">Last login</div>
                            <div>a minute ago</div>
                        </td>
                        <td class="text-center">
                            <div class="mx-auto chart-circle chart-circle-xs" data-value="0.07" data-thickness="3" data-color="blue"><canvas width="40" height="40"></canvas>
                                <div class="chart-circle-value">7%</div>
                            </div>
                        </td>
                        <td class="text-center">
                            <div class="item-action dropdown">
                                <a href="javascript:void(0)" data-toggle="dropdown" class="icon"><i class="fe fe-more-vertical"></i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fe fe-tag"></i> Action </a>
                                    <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fe fe-edit-2"></i> Another action </a>
                                    <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fe fe-message-square"></i> Something else here</a>
                                    <div class="dropdown-divider"></div>
                                    <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fe fe-link"></i> Separated link</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">
                            <div class="avatar d-block" style="background-image: url(demo/faces/female/27.jpg)">
                                <span class="avatar-status bg-green"></span>
                            </div>
                        </td>
                        <td>
                            <div>Carol Henderson</div>
                            <div class="small text-muted">
                                Registered: Jan 29, 2018
                            </div>
                        </td>
                        <td>
                            <div class="clearfix">
                                <div class="float-left">
                                    <strong>80%</strong>
                                </div>
                                <div class="float-right">
                                    <small class="text-muted">Jun 11, 2015 - Jul 10, 2015</small>
                                </div>
                            </div>
                            <div class="progress progress-xs">
                                <div class="progress-bar bg-green" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </td>
                        <td class="text-center">
                            <i class="payment payment-visa"></i>
                        </td>
                        <td>
                            <div class="small text-muted">Last login</div>
                            <div>9 minutes ago</div>
                        </td>
                        <td class="text-center">
                            <div class="mx-auto chart-circle chart-circle-xs" data-value="0.8" data-thickness="3" data-color="blue"><canvas width="40" height="40"></canvas>
                                <div class="chart-circle-value">80%</div>
                            </div>
                        </td>
                        <td class="text-center">
                            <div class="item-action dropdown">
                                <a href="javascript:void(0)" data-toggle="dropdown" class="icon"><i class="fe fe-more-vertical"></i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fe fe-tag"></i> Action </a>
                                    <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fe fe-edit-2"></i> Another action </a>
                                    <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fe fe-message-square"></i> Something else here</a>
                                    <div class="dropdown-divider"></div>
                                    <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fe fe-link"></i> Separated link</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">
                            <div class="avatar d-block" style="background-image: url(demo/faces/male/20.jpg)">
                                <span class="avatar-status bg-green"></span>
                            </div>
                        </td>
                        <td>
                            <div>Christopher Harvey</div>
                            <div class="small text-muted">
                                Registered: Dec 29, 2017
                            </div>
                        </td>
                        <td>
                            <div class="clearfix">
                                <div class="float-left">
                                    <strong>83%</strong>
                                </div>
                                <div class="float-right">
                                    <small class="text-muted">Jun 11, 2015 - Jul 10, 2015</small>
                                </div>
                            </div>
                            <div class="progress progress-xs">
                                <div class="progress-bar bg-green" role="progressbar" style="width: 83%" aria-valuenow="83" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </td>
                        <td class="text-center">
                            <i class="payment payment-googlewallet"></i>
                        </td>
                        <td>
                            <div class="small text-muted">Last login</div>
                            <div>8 minutes ago</div>
                        </td>
                        <td class="text-center">
                            <div class="mx-auto chart-circle chart-circle-xs" data-value="0.83" data-thickness="3" data-color="blue"><canvas width="40" height="40"></canvas>
                                <div class="chart-circle-value">83%</div>
                            </div>
                        </td>
                        <td class="text-center">
                            <div class="item-action dropdown">
                                <a href="javascript:void(0)" data-toggle="dropdown" class="icon"><i class="fe fe-more-vertical"></i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fe fe-tag"></i> Action </a>
                                    <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fe fe-edit-2"></i> Another action </a>
                                    <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fe fe-message-square"></i> Something else here</a>
                                    <div class="dropdown-divider"></div>
                                    <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fe fe-link"></i> Separated link</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@stop

@push('scripts')
<script>
    var chartBar = c3.generate({
        bindto: '#chart-bar',
        data: {
            columns: [
                // each columns data
                @php
                    $i = 0;
                @endphp
                @foreach ($barChart as $key => $value)
                    ['data{{$i++}}', {{$value->count()}}],
                @endforeach
            ],
            type: 'bar', // default type of chart
            colors: {
                @php
                    $colors = ['#e4704d', '#44d49f', '#e2e44d', '#e24de4', '#3e2ae4', '#6e7687', '#7aab3a', '#49a5e4', '#5e75e6',
                    '#5e75e6', '#44d49f', '#49a5e4', '#e2e44d', '#e24de4', '#e44d4d', '#e4704d', '#6e7687', '#7aab3a', '#3e2ae4', '#e44d4d'];
                @endphp
                @foreach ($colors as $key => $value)
                    'data{{$key}}': '{{$value}}',
                @endforeach
            },
            names: {
                // name of each serie
                @php
                    $i = 0;
                @endphp
                @foreach ($barChart as $key => $value)
                    'data{{$i++}}': '{{App\Models\StatusKerja::find($key)->nama_status_kerja}}',
                @endforeach
            }
        },
        padding: {
            bottom: 0,
            top: 0
        }
    });

    var chartPie = c3.generate({
        bindto: '#chart-pie',
        data: {
            columns: [
                // each columns data
                @php
                    $i = 0;
                @endphp
                @foreach ($pieChart as $key => $value)
                    ['data{{$i++}}', {{ percent($value->count(), $karyawan->count()) }}],
                @endforeach
            ],
            type: 'pie', // default type of chart
            colors: {
                @php
                    $colors = ['#5e75e6', '#44d49f', '#49a5e4', '#e2e44d', '#e24de4', '#e44d4d', '#e4704d', '#6e7687', '#7aab3a', '#3e2ae4', '#5e75e6', '#44d49f', '#49a5e4', '#e2e44d', '#e24de4', '#e44d4d', '#e4704d',
                    '#6e7687', '#7aab3a', '#3e2ae4'];
                @endphp
                @foreach ($colors as $key => $value)
                    'data{{$key}}': '{{$value}}',
                @endforeach
            },
            names: {
                // name of each serie
                @php
                    $i = 0;
                @endphp
                @foreach ($pieChart as $key => $value)
                    'data{{$i++}}': '{{App\Models\Golongan::find($key)->kode_golongan}}',
                @endforeach
            }
        },
        legend: {
            show: false, //hide legend
        },
        padding: {
            bottom: 0,
            top: 0
        }
    });

    var chartDonut = c3.generate({
        bindto: '#chart-donut',
        data: {
            columns: [
                // each columns data
                ['data1', 63],
                ['data2', 37]
            ],
            type: 'donut', // default type of chart
            colors: {
                'data1': '#5eba00',
                'data2': '#e5e6e4'
            },
            names: {
                // name of each serie
                'data1': 'Terisi',
                'data2': 'Belum Terisi'
            }
        },
        legend: {
            show: false, //hide legend
        },
        padding: {
            bottom: 0,
            top: 0
        }
    });

    /**  */
    if ($('.chart-circle').length) {
        $('.chart-circle').each(function() {
          let $this = $(this);

          $this.circleProgress({
            fill: {
              color: '#49a5e4'
            },
            size: $this.height(),
            startAngle: -Math.PI / 4 * 2,
            emptyFill: '#F4F4F4',
            lineCap: 'round'
          });
        });
    }
</script>
@endpush
