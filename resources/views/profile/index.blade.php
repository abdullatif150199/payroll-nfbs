@extends('tabler::layouts.profile')
@section('content')
<div class="page-content">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="card card-profile">
                    <div class="card-header" style="background-image: url(/images/src/eberhard-grossgasteiger-311213-500.jpg);"></div>
                    <div class="card-body text-center">
                        <img class="card-profile-img" src="/images/src/18.jpg">
                        <h3 class="mb-0">{{ $user->name }}</h3>
                        <p class="text-muted mb-2">Webdeveloper</p>
                        <p class="mb-4">
                            {{ $user->bio }}
                        </p>
                        <button class="btn btn-outline-primary btn-sm">
                            <span class="fe fe-edit"></span> edit
                        </button>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Social Media</h3>
                    </div>
                    <div class="card-body">
                        <div class="text-center">
                            <button type="button" class="btn btn-icon btn-facebook"><i class="fa fa-facebook"></i></button>
                            <button type="button" class="btn btn-icon btn-twitter"><i class="fa fa-twitter"></i></button>
                            <button type="button" class="btn btn-icon btn-google"><i class="fa fa-google"></i></button>
                            <button type="button" class="btn btn-icon btn-instagram"><i class="fa fa-instagram"></i></button>
                            <button type="button" class="btn btn-icon btn-green"><i class="fa fa-whatsapp"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-status bg-teal"></div>
                    <div class="card-header">
                        <h3 class="card-title">Info</h3>
                        <div class="card-options">
                            <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                            <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
                        </div>
                    </div>
                    <div class="card-body">
                        Donec id elit non mi porta gravida at eget metus. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Cum sociis natoque penatibus et magnis dis
                        parturient montes, nascetur ridiculus mus. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Message">
                            <div class="input-group-btn">
                                <button type="button" class="btn btn-secondary">
                                    <i class="fe fe-camera"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <ul class="list-group card-list-group">
                        <li class="list-group-item py-5">
                            <div class="media">
                                <div class="media-object avatar avatar-md mr-4" style="background-image: url(demo/faces/male/16.jpg)"></div>
                                <div class="media-body">
                                    <div class="media-heading">
                                        <small class="float-right text-muted">4 min</small>
                                        <h5>Peter Richards</h5>
                                    </div>
                                    <div>
                                        Aenean lacinia bibendum nulla sed consectetur. Vestibulum id ligula porta felis euismod semper. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cras
                                        justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Cum sociis natoque penatibus et magnis dis parturient montes,
                                        nascetur ridiculus mus.
                                    </div>
                                    <ul class="media-list">
                                        <li class="media mt-4">
                                            <div class="media-object avatar mr-4" style="background-image: url(demo/faces/female/17.jpg)"></div>
                                            <div class="media-body">
                                                <strong>Debra Beck: </strong>
                                                Donec id elit non mi porta gravida at eget metus. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Donec ullamcorper nulla non metus
                                                auctor fringilla. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Sed posuere consectetur est at lobortis.
                                            </div>
                                        </li>
                                        <li class="media mt-4">
                                            <div class="media-object avatar mr-4" style="background-image: url(demo/faces/male/32.jpg)"></div>
                                            <div class="media-body">
                                                <strong>Jack Ruiz: </strong>
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit
                                                amet risus.
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item py-5">
                            <div class="media">
                                <div class="media-object avatar avatar-md mr-4" style="background-image: url(demo/faces/male/16.jpg)"></div>
                                <div class="media-body">
                                    <div class="media-heading">
                                        <small class="float-right text-muted">12 min</small>
                                        <h5>Peter Richards</h5>
                                    </div>
                                    <div>
                                        Donec id elit non mi porta gravida at eget metus. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Cum sociis natoque penatibus et magnis dis
                                        parturient montes, nascetur ridiculus mus. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item py-5">
                            <div class="media">
                                <div class="media-object avatar avatar-md mr-4" style="background-image: url(demo/faces/male/16.jpg)"></div>
                                <div class="media-body">
                                    <div class="media-heading">
                                        <small class="float-right text-muted">34 min</small>
                                        <h5>Peter Richards</h5>
                                    </div>
                                    <div>
                                        Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Aenean eu leo quam. Pellentesque ornare sem lacinia quam
                                        venenatis vestibulum. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.
                                    </div>
                                    <ul class="media-list">
                                        <li class="media mt-4">
                                            <div class="media-object avatar mr-4" style="background-image: url(demo/faces/male/26.jpg)"></div>
                                            <div class="media-body">
                                                <strong>Wayne Holland: </strong>
                                                Donec id elit non mi porta gravida at eget metus. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Donec ullamcorper nulla non metus
                                                auctor fringilla. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Sed posuere consectetur est at lobortis.
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <form class="card">
                    <div class="card-body">
                        <h3 class="card-title">Edit Profile</h3>
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label class="form-label">Company</label>
                                    <input type="text" class="form-control" disabled="" placeholder="Company" value="Creative Code Inc.">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group">
                                    <label class="form-label">Username</label>
                                    <input type="text" class="form-control" placeholder="Username" value="michael23">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4">
                                <div class="form-group">
                                    <label class="form-label">Email address</label>
                                    <input type="email" class="form-control" placeholder="Email">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">First Name</label>
                                    <input type="text" class="form-control" placeholder="Company" value="Chet">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Last Name</label>
                                    <input type="text" class="form-control" placeholder="Last Name" value="Faker">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Address</label>
                                    <input type="text" class="form-control" placeholder="Home Address" value="Melbourne, Australia">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4">
                                <div class="form-group">
                                    <label class="form-label">City</label>
                                    <input type="text" class="form-control" placeholder="City" value="Melbourne">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group">
                                    <label class="form-label">Postal Code</label>
                                    <input type="number" class="form-control" placeholder="ZIP Code">
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label class="form-label">Country</label>
                                    <select class="form-control custom-select">
                                        <option value="">Germany</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group mb-0">
                                    <label class="form-label">About Me</label>
                                    <textarea rows="5" class="form-control" placeholder="Here can be your description" value="Mike">Oh so, your weak rhyme
    You doubt I'll bother, reading into it
    I'll probably won't, left to my own devices
    But that's the difference in our opinions.</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-primary">Update Profile</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
