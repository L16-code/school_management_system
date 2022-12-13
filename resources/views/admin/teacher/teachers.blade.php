@extends('layouts.admin')

@section('content')
{{-- delete modal start --}}
<form action="{{ url('admin/delete') }}" method="POST">
    @csrf
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">remove teacher </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="teacher_id" id="teacher_id">
                    <h5>Are you sure want to remove teacher ?</h5>
                </div>
                <div class="modal-footer">
                    {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}
                    <button type="submit" class="btn btn-primary">Yes Delete</button>
                </div>
            </div>
        </div>
    </div>
</form>
{{-- delete modal end     --}}

{{-- status modal start --}}
<form action="{{ url('admin/status') }}" method="POST">
    @csrf
    <div class="modal fade" id="statusModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">


            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">change state </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="status_id" id="status_id">
                <h5>Are you you want to change status ?</h5>
            </div>
            <div class="modal-footer">
                {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}
                <button type="submit" class="btn btn-primary">Yes Change</button>
            </div>

        </div>
    </div>
    </div>
</form>
{{-- status modal end --}}

    <div class="col-lg-12 stretch-card">
        <div class="card">

            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group row">
                            {{-- <label class="col-sm-3 col-form-label">First Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="fname">
                            </div> --}}

                        </div>
                        <h4 class="card-title">Teacher's table</h4>
                    </div>
                    <div class="col-md-5">
                        <form action="{{ url('admin/search') }}" method="GET">
                            <div class="input-group">
                                <div class="form-outline">
                                    <input type="search" name="search" id="form1" class="form-control" />

                                    {{-- <label class="form-label" for="form1">Search</label> --}}
                                </div>
                                {{-- <button type="Submit" class="btn btn-primary"> --}}
                                <button class="btn btn-primary" type="submit"><i
                                        class="mdi mdi-account-search"></i></button>
                                {{-- <button class="btn btn-primary my-2 my-sm-0 " type="submit"><i class="mdi mdi-account-search"></i></button> --}}

                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group row text-right">
                            <form action="{{ url('admin/teacher') }}">
                                <button type="Submit" class="btn btn-primary me-2 btn-rounded float-end">Add
                                    Teacher</button>
                            </form>
                        </div>
                    </div>
                </div>


                <p class="card-description">
                    all teachers</code>
                </p>
                <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>
                                    Teacher_id
                                </th>
                                <th>
                                    name
                                </th>
                                <th>
                                    Email
                                </th>
                                <th>
                                    Phone
                                </th>
                                <th>
                                    Gender
                                </th>
                                <th>
                                    Qualification
                                </th>
                                <th>
                                    Image
                                </th>
                                <th>
                                    Status
                                </th>
                                <th>
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (!empty($show) && $show->count())
                                @foreach ($show as $data)
                                    <tr>
                                        <td>
                                            {{ $data->teacher_id }}
                                        </td>
                                        <td>
                                            {{ $data->name }}
                                        </td>
                                        <td>
                                            {{ $data->email }}
                                        </td>
                                        <td>
                                            {{ $data->phone }}
                                        </td>
                                        <td>
                                            {{ $data->gender }}
                                        </td>
                                        <td>
                                            {{ $data->qualification }}
                                        </td>
                                        <td>
                                            <img src="{{ asset('uploads/teacher/' . $data->img) }}" width="1000px"
                                                height="1500px" alt="Image" />
                                        </td>
                                        <td>
                                            {{-- {{ $data->status == 1 ? 'Active' : 'inactive' }} --}}
                                            <button type="button" class="btn btn-info statusbtn" value="{{ $data->tid }}">{{ $data->status == 1 ? 'Active' : 'InActive' }}</button>
                                        </td>
                                        <td>
                                            <a href="{{ url('admin/teacher/' . $data->tid . '/edit') }}"
                                                class="btn btn-success">Edit</a>
                                            {{-- <a href="{{ url('admin/teacher/' . $data->tid . '/delete') }}"
                                                class="btn btn-danger">Delete</a> --}}
                                            <button type="button" class="btn btn-danger deleteteacherbtn"value="{{ $data->tid }}">Delete</button>
                                        </td>
                                @endforeach
                            @endif
                            {{-- </tr>
                            <tr class="table-warning">
                                <td>
                                    2
                                </td>
                                <td>
                                    Messsy Adam
                                </td>
                                <td>
                                    Flash
                                </td>
                                <td>
                                    $245.30
                                </td>
                                <td>
                                    July 1, 2015
                                </td>
                            </tr>
                            <tr class="table-danger">
                                <td>
                                    3
                                </td>
                                <td>
                                    John Richards
                                </td>
                                <td>
                                    Premeire
                                </td>
                                <td>
                                    $138.00
                                </td>
                                <td>
                                    Apr 12, 2015
                                </td>
                            </tr>
                            <tr class="table-success">
                                <td>
                                    4
                                </td>
                                <td>
                                    Peter Meggik
                                </td>
                                <td>
                                    After effects
                                </td>
                                <td>
                                    $ 77.99
                                </td>
                                <td>
                                    May 15, 2015
                                </td>
                            </tr>
                            <tr class="table-primary">
                                <td>
                                    5
                                </td>
                                <td>
                                    Edward
                                </td>
                                <td>
                                    Illustrator
                                </td>
                                <td>
                                    $ 160.25
                                </td>
                                <td>
                                    May 03, 2015
                                </td>
                            </tr> --}}
                        </tbody>
                    </table>
                </div>
                <div class="row">{{ $show->links() }}</div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
                    $(document).on('click', '.deleteteacherbtn', function(e) {
                            e.preventDefault();
                            var teacher_id = $(this).val();
                            $('#teacher_id').val(teacher_id);
                            $('#deleteModal').modal('show');


                    });
                    $(document).on('click', '.statusbtn', function(e) {
                            e.preventDefault();
                            var status_id = $(this).val();
                            $('#status_id').val(status_id);
                            $('#statusModal').modal('show');


                    });
                });
    </script>


@endsection
