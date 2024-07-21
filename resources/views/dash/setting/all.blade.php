@extends('dash.layouts.app')

@yield('title', 'Settings')
@yield('title1', 'Settings')

@push('custom_css')

    <link href="https://cdn.datatables.net/v/bs4/jq-3.7.0/dt-2.0.8/datatables.min.css" rel="stylesheet">
@endpush

@push('custom_js')

    <script src="https://cdn.datatables.net/v/bs4/jq-3.7.0/dt-2.0.8/datatables.min.js"></script>
    <script>
        let table = new DataTable('#settingsTable');
    </script>
@endpush



@section('content')
    <div class="hk-pg-wrapper">
        <!-- Container -->
        <div class="container mt-xl-50 mt-sm-30 mt-15">
            <!-- Title -->
            <div class="hk-pg-header align-items-top">
                <div>
                    <h2 class="hk-pg-title font-weight-600 mb-10">@yield('title1', 'Settings !')</h2>
                    <p>Questions about onboarding lead data? <a href="#">Learn more.</a></p>
                </div>
            </div>
            <!-- Title -->

            <!-- Row -->
            <div class="row">
                <div class="col-xl-12">
                    <div class="hk-row">


                        <div class="card col-12">
                            <div class="card-body pa-0">
                                <div class="table-wrap">
                                    <a href="{{ route('dash.setting.create') }}"
                                        class="btn btn-info mb-xl-10 mb-sm-30 mb-15 mt-xl-10"> Add New</a>
                                    <div class="table-responsive">
                                        <table class="table table-hover mb-0" id="settingsTable">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>User</th>
                                                    <th>Favicon</th>
                                                    <th>Logo</th>
                                                    <th>Facebook</th>
                                                    <th>E-mail</th>
                                                    <th>Linkedin</th>
                                                    <th>Instagram</th>
                                                    <th>Twitter</th>
                                                    <th>Phone</th>
                                                    <th>Options</th>
                                                </tr>
                                            </thead>
                                            <tbody>


                                                @foreach ($data as $setting)
                                                {{-- @dd($setting->media) --}}
                                                <tr>
                                                    <td>{{ $loop->index + 1 }}</td>
                                                    <td>{{ $setting->user->name /**??'None'*/ }}</td>

                                                    @foreach ( $setting->media as $images)
                                                        <td>
                                                            <img src="{{ $images->getUrl() }}" class="img-fluid" width="75px" height="75px"alt="">
                                                        </td>
                                                    @endforeach
                                                    <td>{{ $setting->facebook}}</td>
                                                    <td>{{ $setting->email}}</td>
                                                    <td>{{ $setting->linkedin}}</td>
                                                    <td>{{ $setting->instagram}}</td>
                                                    <td>{{ $setting->twitter}}</td>
                                                    <td>{{ $setting->phone}}</td>

                                                    @if ($setting->deleted_at)
                                                        <td>
                                                            <a class="btn btn-icon btn-primary btn-icon-style-1" href="{{ route('dash.settings.restore', $setting->id) }}">
                                                                <span class="btn-icon-wrap" class="icon-like">
                                                                    <i class="icon-like"></i></span></a>
                                                            <a class="btn btn-icon btn-danger btn-icon-style-1" href="{{ route('dash.settings.erase', $setting->id) }}">
                                                                <span class="btn-icon-wrap">
                                                                    <i class="fa fa-trash"></i></span></a>
                                                        </td>
                                                    @else

                                                    <td><div class="button-list d-flex align-items-center">
                                                        <a class="m-0 mx-1 btn btn-icon btn-secondary btn-icon-style-1" href="{{ route('dash.setting.edit', $setting->id) }}">
                                                            <span class="btn-icon-wrap">
                                                                <i class="fa fa-pencil"></i></span></a>

                                                           <div class="col-sm">
                                                            <!-- Button trigger modal -->
                                                            <button type="button" class="btn btn-primary p-3" data-toggle="modal" data-target="#exampleModalCenter{{ $setting->id }}">
                                                                <span class="btn-icon-wrap"><i class="icon-trash"></i></span>
                                                            </button>

                                                            <!-- Modal -->
                                                            <div class="modal fade" id="exampleModalCenter{{ $setting->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter{{ $setting->id }}" aria-hidden="true" style="display: none;">
                                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title">Are You Sure To Delete This Setting ?</h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">×</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <p>Deleting This Setting</p>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                            <form action="{{ route('dash.setting.destroy', $setting->id) }}" method="post">
                                                                                @csrf
                                                                                @method('DELETE')
                                                                                <button  class="btn btn-danger">Delete</button>
                                                                           </form>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    </td>
                                                    @endif
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
