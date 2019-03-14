@extends('tabler::layouts.main')
@section('title', 'Dashboard | ' . config('tabler.suffix'))
@section('content')
<div class="row row-cards">
    <div class="col-6 col-sm-4 col-lg-2">
        <div class="card">
            <div class="card-body p-3 text-center">
                <div class="text-right text-green">
                    6%
                    <i class="fe fe-chevron-up"></i>
                </div>
                <div class="h1 m-0">{{ $karyawan }}</div>
                <div class="text-muted mb-4">Karyawan</div>
            </div>
        </div>
    </div>
    <div class="col-6 col-sm-4 col-lg-2">
        <div class="card">
            <div class="card-body p-3 text-center">
                <div class="text-right text-red">
                    -3%
                    <i class="fe fe-chevron-down"></i>
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
                    9%
                    <i class="fe fe-chevron-up"></i>
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
                    3%
                    <i class="fe fe-chevron-up"></i>
                </div>
                <div class="h1 m-0">{{ $golongan }}</div>
                <div class="text-muted mb-4">Golongan</div>
            </div>
        </div>
    </div>
    <div class="col-6 col-sm-4 col-lg-2">
        <div class="card">
            <div class="card-body p-3 text-center">
                <div class="text-right text-red">
                    -2%
                    <i class="fe fe-chevron-down"></i>
                </div>
                <div class="h1 m-0">{{ $kepala_keluarga }}</div>
                <div class="text-muted mb-4">Kepala Keluarga</div>
            </div>
        </div>
    </div>
    <div class="col-6 col-sm-4 col-lg-2">
        <div class="card">
            <div class="card-body p-3 text-center">
                <div class="text-right text-red">
                    -1%
                    <i class="fe fe-chevron-down"></i>
                </div>
                <div class="h1 m-0">621</div>
                <div class="text-muted mb-4">Products</div>
            </div>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Activity</h3>
            </div>
            <div class="card-body o-auto" style="height: 15rem">
                <ul class="list-unstyled list-separated">
                    <li class="list-separated-item">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <span class="avatar avatar-md d-block" style="background-image: url(demo/faces/female/12.jpg)"></span>
                            </div>
                            <div class="col">
                                <div>
                                    <a href="javascript:void(0)" class="text-inherit">Amanda Hunt</a>
                                </div>
                                <small class="d-block item-except text-sm text-muted h-1x">amanda_hunt
                                    @example.com</small>
                            </div>
                            <div class="col-auto">
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
                            </div>
                        </div>
                    </li>
                    <li class="list-separated-item">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <span class="avatar avatar-md d-block" style="background-image: url(demo/faces/female/21.jpg)"></span>
                            </div>
                            <div class="col">
                                <div>
                                    <a href="javascript:void(0)" class="text-inherit">Laura Weaver</a>
                                </div>
                                <small class="d-block item-except text-sm text-muted h-1x">lauraweaver
                                    @example.com</small>
                            </div>
                            <div class="col-auto">
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
                            </div>
                        </div>
                    </li>
                    <li class="list-separated-item">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <span class="avatar avatar-md d-block" style="background-image: url(demo/faces/female/29.jpg)"></span>
                            </div>
                            <div class="col">
                                <div>
                                    <a href="javascript:void(0)" class="text-inherit">Margaret Berry</a>
                                </div>
                                <small class="d-block item-except text-sm text-muted h-1x">margaret88
                                    @example.com</small>
                            </div>
                            <div class="col-auto">
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
                            </div>
                        </div>
                    </li>
                    <li class="list-separated-item">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <span class="avatar avatar-md d-block" style="background-image: url(demo/faces/female/2.jpg)"></span>
                            </div>
                            <div class="col">
                                <div>
                                    <a href="javascript:void(0)" class="text-inherit">Nancy Herrera</a>
                                </div>
                                <small class="d-block item-except text-sm text-muted h-1x">nancy_83
                                    @example.com</small>
                            </div>
                            <div class="col-auto">
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
                            </div>
                        </div>
                    </li>
                    <li class="list-separated-item">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <span class="avatar avatar-md d-block" style="background-image: url(demo/faces/male/34.jpg)"></span>
                            </div>
                            <div class="col">
                                <div>
                                    <a href="javascript:void(0)" class="text-inherit">Edward Larson</a>
                                </div>
                                <small class="d-block item-except text-sm text-muted h-1x">edward90
                                    @example.com</small>
                            </div>
                            <div class="col-auto">
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
                            </div>
                        </div>
                    </li>
                    <li class="list-separated-item">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <span class="avatar avatar-md d-block" style="background-image: url(demo/faces/female/11.jpg)"></span>
                            </div>
                            <div class="col">
                                <div>
                                    <a href="javascript:void(0)" class="text-inherit">Joan Hanson</a>
                                </div>
                                <small class="d-block item-except text-sm text-muted h-1x">joan.hanson
                                    @example.com</small>
                            </div>
                            <div class="col-auto">
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
                            </div>
                        </div>
                    </li>
                </ul>
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

                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Status Pegawai</h3>
                    </div>
                    <div class="card-body">

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
                <h3 class="card-title">Invoices</h3>
            </div>
            <div class="table-responsive">
                <table class="table card-table table-vcenter text-nowrap">
                    <thead>
                        <tr>
                            <th class="w-1">No.</th>
                            <th>Invoice Subject</th>
                            <th>Client</th>
                            <th>VAT No.</th>
                            <th>Created</th>
                            <th>Status</th>
                            <th>Price</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><span class="text-muted">001401</span></td>
                            <td><a href="invoice.html" class="text-inherit">Design Works</a></td>
                            <td>
                                Carlson Limited
                            </td>
                            <td>
                                87956621
                            </td>
                            <td>
                                15 Dec 2017
                            </td>
                            <td>
                                <span class="status-icon bg-success"></span> Paid
                            </td>
                            <td>$887</td>
                            <td class="text-right">
                                <div class="item-action dropdown">
                                    <a href="javascript:void(0)" data-toggle="dropdown" class="btn btn-secondary btn-sm dropdown-toggle">Actions</a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fe fe-edit-2"></i> Another action </a>
                                        <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fe fe-message-square"></i> Something else here</a>
                                        <div class="dropdown-divider"></div>
                                        <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fe fe-link"></i> Separated link</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><span class="text-muted">001402</span></td>
                            <td><a href="invoice.html" class="text-inherit">UX Wireframes</a></td>
                            <td>
                                Adobe
                            </td>
                            <td>
                                87956421
                            </td>
                            <td>
                                12 Apr 2017
                            </td>
                            <td>
                                <span class="status-icon bg-warning"></span> Pending
                            </td>
                            <td>$1200</td>
                            <td class="text-right">
                                <div class="item-action dropdown">
                                    <a href="javascript:void(0)" data-toggle="dropdown" class="btn btn-secondary btn-sm dropdown-toggle">Actions</a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fe fe-edit-2"></i> Another action </a>
                                        <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fe fe-message-square"></i> Something else here</a>
                                        <div class="dropdown-divider"></div>
                                        <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fe fe-link"></i> Separated link</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><span class="text-muted">001403</span></td>
                            <td><a href="invoice.html" class="text-inherit">New Dashboard</a></td>
                            <td>
                                Bluewolf
                            </td>
                            <td>
                                87952621
                            </td>
                            <td>
                                23 Oct 2017
                            </td>
                            <td>
                                <span class="status-icon bg-warning"></span> Pending
                            </td>
                            <td>$534</td>
                            <td class="text-right">
                                <div class="item-action dropdown">
                                    <a href="javascript:void(0)" data-toggle="dropdown" class="btn btn-secondary btn-sm dropdown-toggle">Actions</a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fe fe-edit-2"></i> Another action </a>
                                        <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fe fe-message-square"></i> Something else here</a>
                                        <div class="dropdown-divider"></div>
                                        <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fe fe-link"></i> Separated link</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><span class="text-muted">001404</span></td>
                            <td><a href="invoice.html" class="text-inherit">Landing Page</a></td>
                            <td>
                                Salesforce
                            </td>
                            <td>
                                87953421
                            </td>
                            <td>
                                2 Sep 2017
                            </td>
                            <td>
                                <span class="status-icon bg-secondary"></span> Due in 2 Weeks
                            </td>
                            <td>$1500</td>
                            <td class="text-right">
                                <div class="item-action dropdown">
                                    <a href="javascript:void(0)" data-toggle="dropdown" class="btn btn-secondary btn-sm dropdown-toggle">Actions</a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fe fe-edit-2"></i> Another action </a>
                                        <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fe fe-message-square"></i> Something else here</a>
                                        <div class="dropdown-divider"></div>
                                        <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fe fe-link"></i> Separated link</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><span class="text-muted">001405</span></td>
                            <td><a href="invoice.html" class="text-inherit">Marketing Templates</a></td>
                            <td>
                                Printic
                            </td>
                            <td>
                                87956621
                            </td>
                            <td>
                                29 Jan 2018
                            </td>
                            <td>
                                <span class="status-icon bg-danger"></span> Paid Today
                            </td>
                            <td>$648</td>
                            <td class="text-right">
                                <div class="item-action dropdown">
                                    <a href="javascript:void(0)" data-toggle="dropdown" class="btn btn-secondary btn-sm dropdown-toggle">Actions</a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fe fe-edit-2"></i> Another action </a>
                                        <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fe fe-message-square"></i> Something else here</a>
                                        <div class="dropdown-divider"></div>
                                        <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fe fe-link"></i> Separated link</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><span class="text-muted">001406</span></td>
                            <td><a href="invoice.html" class="text-inherit">Sales Presentation</a></td>
                            <td>
                                Tabdaq
                            </td>
                            <td>
                                87956621
                            </td>
                            <td>
                                4 Feb 2018
                            </td>
                            <td>
                                <span class="status-icon bg-secondary"></span> Due in 3 Weeks
                            </td>
                            <td>$300</td>
                            <td class="text-right">
                                <div class="item-action dropdown">
                                    <a href="javascript:void(0)" data-toggle="dropdown" class="btn btn-secondary btn-sm dropdown-toggle">Actions</a>
                                    <div class="dropdown-menu dropdown-menu-right">
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
</div>
@stop
