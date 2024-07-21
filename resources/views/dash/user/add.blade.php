@extends('dash.layouts.app')

@section('title1', 'Add User')

@section('content')
    <div class="hk-pg-wrapper">
        <!-- Container -->
        <div class="container mt-xl-50 mt-sm-30 mt-15">
            <!-- Title -->
            <div class="hk-pg-header align-items-top">
                <div>
                    <h2 class="hk-pg-title font-weight-600 mb-10">@yield('title1', 'User !')</h2>
                    <p>Questions about onboarding lead data? <a href="#">Learn more.</a></p>
                </div>
            </div>
            <!-- Title -->

            <!-- Row -->
            <div class="row">
                <div class="col-xl-12">
                    <div class="hk-row">

                        {{-- // Start Edit --}}


                        <div class="col-xl-12" data-select2-id="12">
                            <section class="hk-sec-wrapper" data-select2-id="11">
                                <h5 class="hk-sec-title">Default Layout</h5>
                                <p class="mb-25">More complex forms can be built using the grid classes. Use these for form
                                    layouts that require multiple columns, varied widths, and additional alignment options.
                                </p>
                                <div class="row">
                                    <div class="col-sm">
                                        <form action="{{ route('dash.setting.store') }}" method="post"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group mb-2">
                                                <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">Favicon</span>
                                                    </div>
                                                    <div class="form-control text-truncate" data-trigger="fileinput"><i
                                                            class="glyphicon glyphicon-file fileinput-exists"></i> <span
                                                            class="fileinput-filename"></span></div>
                                                    <span class="input-group-append">
                                                        <span class=" btn btn-primary btn-file"><span
                                                                class="fileinput-new">Select file</span><span
                                                                class="fileinput-exists">Change</span>
                                                            <input type="file" name="favicon">
                                                        </span>
                                                        <a href="#" class="btn btn-secondary fileinput-exists"
                                                            data-dismiss="fileinput">Remove</a>
                                                    </span>
                                                </div>

                                                @error('favicon')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <hr>

                                            <div class="form-group mb-2">
                                                <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">Logo</span>
                                                    </div>
                                                    <div class="form-control text-truncate" data-trigger="fileinput"><i
                                                            class="glyphicon glyphicon-file fileinput-exists"></i> <span
                                                            class="fileinput-filename"></span>
                                                    </div>
                                                    <span class="input-group-append">
                                                        <span class=" btn btn-primary btn-file"><span
                                                                class="fileinput-new">Select file</span><span
                                                                class="fileinput-exists">Change</span>
                                                            <input type="file" name="logo">
                                                        </span>
                                                        <a href="#" class="btn btn-secondary fileinput-exists"
                                                            data-dismiss="fileinput">Remove</a>
                                                    </span>
                                                </div>

                                                @error('logo')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <hr>


                                            <div class="form-group mb-3">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"
                                                            id="inputGroup-sizing-default">Facebook</span>
                                                    </div>
                                                    <input type="text" name="facebook" class="form-control"
                                                        aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                                </div>
                                                @error('facebook')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="form-group mb-3">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"
                                                            id="inputGroup-sizing-default">E-mail</span>
                                                    </div>
                                                    <input type="text" name="email" class="form-control"
                                                        aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                                </div>
                                                @error('email')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="form-group mb-3">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"
                                                            id="inputGroup-sizing-default">Linkedin</span>
                                                    </div>
                                                    <input type="text" name="linkedin" class="form-control"
                                                        aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                                </div>

                                                @error('linkedin')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="form-group mb-3">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"
                                                            id="inputGroup-sizing-default">Instagram</span>
                                                    </div>
                                                    <input type="text" name="instagram" class="form-control"
                                                        aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                                </div>

                                                @error('instagram')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="form-group mb-3">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"
                                                            id="inputGroup-sizing-default">Twitter</span>
                                                    </div>
                                                    <input type="text" name="twitter" class="form-control"
                                                        aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                                </div>

                                                @error('twitter')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="form-group mb-3">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"
                                                            id="inputGroup-sizing-default">Phone</span>
                                                    </div>
                                                    <input type="text" name="phone" class="form-control"
                                                        aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                                </div>
                                                @error('phone')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <button class="btn btn-primary" type="submit">Create</button>
                                        </form>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
