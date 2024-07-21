@extends('dash.layouts.app')

@section('Title_m','Messages')

@push('custom_css')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.min.css">
@endpush

@push('custom_js')

<script src="https://cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>
<script>
    let table = new DataTable('messagesTable');
</script>
@endpush

@section('content')
<div class="hk-pg-wrapper">
    <!-- Container -->
    <div class="container mt-xl-50 mt-sm-30 mt-15">
        <!-- Title -->
        <div class="hk-pg-header align-items-top">
            <div>
                <h2 class="hk-pg-title font-weight-600 mb-10">@yield('Titel_m', 'Messages !')</h2>
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
                                {{-- <a href="{{ route('dash.profileName.create') }}"
                                    class="btn btn-info mb-xl-10 mb-sm-30 mb-15 mt-xl-10"> Add New</a> --}}
                                <div class="table-responsive">
                                    <table class="table table-hover mb-0" id="messagesTable">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>E-mail</th>
                                                <th>Subject</th>
                                                <th>Message</th>
                                                <th>Options</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{-- {{ dd($massage_data) }} --}}
                                            @foreach ($message_data as $Message)
                                            {{-- @dd($profile) --}}
                                                <tr>
                                                    <td>{{ $loop->index + 1 }}</td>
                                                    <td>{{ $Message->name }}</td>
                                                    <td>{{ $Message->email }}</td>
                                                    <td>{{ $Message->subject }}</td>
                                                    <td>{{ $Message->message }}</td>


                                                        <td >
                                                            <a href="" class="btn btn-primary">Show</a>
                                                            <form
                                                                action="{{ route('dash.message.destroy', $Message->id) }}"
                                                                method="post">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button
                                                                    class="btn btn-danger">Delete</button>
                                                            </form>
                                                        </td>
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

