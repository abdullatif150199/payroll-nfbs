@extends('layouts.main')
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
                        <h3 class="card-title">Progres Gaji</h3>
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
            <div class="card-header">
                <h3 class="card-title">Kontrak Karyawan Segera Berakhir</h3>
            </div>
            <table class="table table-responsive-sm table-hover table-outline table-vcenter card-table">
                <thead>
                    <tr>
                        <th class="text-center w-1"><i class="icon-people"></i></th>
                        <th>Nama</th>
                        <th>Status</th>
                        <th>Mulai kerja</th>
                        <th>Akhir kerja</th>
                        <th>Satisfaction</th>
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
                            <div>Admin</div>
                            <div class="small text-muted">
                                Registered: Feb 23, 2020
                            </div>
                        </td>
                        <td>
                            <span>fgh</span>
                        </td>
                        <td>
                            12-11-2019
                        </td>
                        <td>
                            12-12-2020
                        </td>
                        <td>
                            <div class="clearfix">
                                <div class="float-left">
                                    <strong>92%</strong>
                                </div>
                                <div class="float-right">
                                    <small class="text-muted">5 hari lagi</small>
                                </div>
                            </div>
                            <div class="progress progress-xs">
                                <div class="progress-bar bg-yellow" role="progressbar" style="width: 42%"
                                    aria-valuenow="42" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </td>
                        <td class="text-center">
                            <div class="item-action dropdown">
                                <a href="javascript:void(0)" data-toggle="dropdown" class="icon"><i
                                        class="fe fe-more-vertical"></i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="javascript:void(0)" class="dropdown-item"><i
                                            class="dropdown-icon fe fe-tag"></i> Action </a>
                                    <a href="javascript:void(0)" class="dropdown-item"><i
                                            class="dropdown-icon fe fe-edit-2"></i> Another action </a>
                                    <a href="javascript:void(0)" class="dropdown-item"><i
                                            class="dropdown-icon fe fe-message-square"></i> Something else here</a>
                                    <div class="dropdown-divider"></div>
                                    <a href="javascript:void(0)" class="dropdown-item"><i
                                            class="dropdown-icon fe fe-link"></i> Separated link</a>
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
