@extends('dash.layouts.app')

@section('Title1', 'Edit Profile')

@section('content')
<div class="hk-pg-wrapper">
    <!-- Container -->
    <div class="container mt-xl-50 mt-sm-30 mt-15">
        <!-- Title -->
        <div class="hk-pg-header align-items-top">
            <div>
                <h2 class="hk-pg-title font-weight-600 mb-10">@yield('Title1', 'Edit Profile !')</h2>
                <p>Questions about onboarding lead data? <a href="#">Learn more.</a></p>
            </div>
        </div>
        <!-- Title -->

        <!-- Row -->
        <div class="row">
            <div class="col-xl-12">
                <div class="hk-row">

                    {{-- // Start Edit --}}

                    {{-- {{ dd($profileName); }} --}}
                    <div class="col-xl-12" data-select2-id="12">
                        <section class="hk-sec-wrapper" data-select2-id="11">
                            <h5 class="hk-sec-title">Default Layout</h5>
                            <p class="mb-25">More complex forms can be built using the grid classes. Use these for form
                                layouts that require multiple columns, varied widths, and additional alignment options.
                            </p>
                            <div class="row">
                                <div class="col-sm">
                                    <form action="{{ route('dash.profileName.update', $profileName->id) }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')

                                        <div class="form-group mb-3">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"
                                                        id="inputGroup-sizing-default">Age</span>
                                                </div>
                                                <input type="text" value="{{ $profileName->age }}" name="age" class="form-control"
                                                    aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                            </div>
                                            @error('age')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <hr>
                                        <div class="form-group mb-3">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"
                                                        id="inputGroup-sizing-default">Birthday</span>
                                                </div>
                                                <input type="text" value="{{ $profileName->birthday }}" name="birthday" class="form-control"
                                                    aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                            </div>
                                            @error('birthday')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <hr>
                                        <div class="form-group mb-3">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"
                                                        id="inputGroup-sizing-default">City</span>
                                                </div>
                                                <input type="text" value="{{ $profileName->city }}" name="city" class="form-control"
                                                    aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                            </div>
                                            @error('city')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <hr>
                                        <div class="form-group mb-3">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"
                                                        id="inputGroup-sizing-default">Country</span>
                                                </div>
                                                <input type="text" value="{{ $profileName->country }}" name="country" class="form-control"
                                                    aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                            </div>
                                            @error('country')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <hr>
                                        <div class="form-group mb-3">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"
                                                        id="inputGroup-sizing-default">Address</span>
                                                </div>
                                                <input type="text" value="{{ $profileName->address }}" name="address" class="form-control"
                                                    aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                            </div>
                                            @error('address')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <hr>
                                        <div class="form-group mb-3">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"
                                                        id="inputGroup-sizing-default">Github</span>
                                                </div>
                                                <input type="text" value="{{ $profileName->github }}" name="github" class="form-control"
                                                    aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                            </div>
                                            @error('github')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <hr>
                                        <div class="form-group mb-3">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"
                                                        id="inputGroup-sizing-default">Telegram</span>
                                                </div>
                                                <input type="text" value="{{ $profileName->telegram }}" name="telegram" class="form-control"
                                                    aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                            </div>
                                            @error('telegram')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <hr>
                                        <div class="form-group mb-3">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"
                                                        id="inputGroup-sizing-default">Whatsapp</span>
                                                </div>
                                                <input type="text" value="{{ $profileName->whatsapp }}" name="whatsapp" class="form-control"
                                                    aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                            </div>
                                            @error('whatsapp')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <hr>
                                        <div class="form-group mb-3">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"
                                                        id="inputGroup-sizing-default">skype</span>
                                                </div>
                                                <input type="text" value="{{ $profileName->skype }}" name="skype" class="form-control"
                                                    aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                            </div>
                                            @error('skype')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <hr>
                                        <div class="form-group mb-3">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"
                                                        id="inputGroup-sizing-default">Website</span>
                                                </div>
                                                <input type="text" value="{{ $profileName->website }}" name="website" class="form-control"
                                                    aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                            </div>
                                            @error('website')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <hr>
                                        <button class="btn btn-primary" type="submit">Edit</button>
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
