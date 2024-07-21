@extends('dash.layouts.app')

@section('titlee', 'Skills')

@push('custom_css')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.min.css">
@endpush

@push('custom_js')
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>
    <script>
        let table = new DataTable('#skillsTable');
    </script>
@endpush
@section('content')
    <div class="hk-pg-wrapper">
        <!-- Container -->
        <div class="container mt-xl-50 mt-sm-30 mt-15">
            <!-- Title -->
            <div class="hk-pg-header align-items-top">
                <div>
                    <h2 class="hk-pg-title font-weight-600 mb-10">@yield('titlee', 'Skills !')</h2>
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
                                    <a href="{{ route('dash.skill.create') }}"
                                        class="btn btn-info mb-xl-10 mb-sm-30 mb-15 mt-xl-10"> Add New</a>
                                    <div class="table-responsive">
                                        <table class="table table-hover mb-0" id="skillsTable">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Name</th>
                                                    <th>User</th>
                                                    <th>Image</th>
                                                    <th>Options</th>
                                                </tr>
                                            </thead>
                                            <tbody>


                                                @foreach ($data as $skill)
                                                    <tr>
                                                        <td>{{ $loop->index + 1 }}</td>


                                                        <td>{{ $skill->name }}</td>
                                                        {{-- @dd(request()); --}}

                                                        <td> {{ $skill->user->name }}</td>
                                                        <td>
                                                            <img src="{{ $skill->image }}" class="img-fluid" width="75px"
                                                                height="75px"alt="">
                                                        </td>
                                                        {{-- <td>{{ $skill->image}}</td> --}}

                                                        @if ($skill->deleted_at)
                                                            <td>
                                                                <a class="btn btn-icon btn-primary btn-icon-style-1"
                                                                    href="{{ route('dash.skill.restore', $skill->id) }}">
                                                                    <span class="btn-icon-wrap" class="icon-like">
                                                                        <i class="icon-like"></i></span></a>
                                                                <a class="btn btn-icon btn-danger btn-icon-style-1"
                                                                    href="{{ route('dash.skill.erase', $skill->id) }}">
                                                                    <span class="btn-icon-wrap">
                                                                        <i class="fa fa-trash"></i></span></a>
                                                            </td>
                                                        @else
                                                            <td>
                                                                <div class="button-list d-flex align-items-center">
                                                                    <a class="m-0 mx-1 btn btn-icon btn-secondary btn-icon-style-1"
                                                                        href="{{ route('dash.skill.edit', $skill->id) }}">
                                                                        <span class="btn-icon-wrap">
                                                                            <i class="fa fa-pencil"></i></span></a>

                                                                    <div class="col-sm">
                                                                        <!-- Button trigger modal -->
                                                                        <button type="button" class="btn btn-primary p-3"
                                                                            data-toggle="modal"
                                                                            data-target="#exampleModalCenter{{ $skill->id }}">
                                                                            <span class="btn-icon-wrap"><i
                                                                                    class="icon-trash"></i></span>
                                                                        </button>

                                                                        <!-- Modal -->
                                                                        <div class="modal fade"
                                                                            id="exampleModalCenter{{ $skill->id }}"
                                                                            tabindex="-1" role="dialog"
                                                                            aria-labelledby="exampleModalCenter{{ $skill->id }}"
                                                                            aria-hidden="true" style="display: none;">
                                                                            <div class="modal-dialog modal-dialog-centered"
                                                                                role="document">
                                                                                <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <h5 class="modal-title">Are You Sure
                                                                                            To Delete This Skill ?</h5>
                                                                                        <button type="button"
                                                                                            class="close"
                                                                                            data-dismiss="modal"
                                                                                            aria-label="Close">
                                                                                            <span
                                                                                                aria-hidden="true">×</span>
                                                                                        </button>
                                                                                    </div>
                                                                                    <div class="modal-body">
                                                                                        <p>Deleting This Skill</p>
                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                        <button type="button"
                                                                                            class="btn btn-secondary"
                                                                                            data-dismiss="modal">Close</button>
                                                                                        <form
                                                                                            action="{{ route('dash.skill.destroy', $skill->id) }}"
                                                                                            method="post">
                                                                                            @csrf
                                                                                            @method('DELETE')
                                                                                            <button
                                                                                                class="btn btn-danger">Delete</button>
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
