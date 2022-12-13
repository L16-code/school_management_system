@extends('layouts.admin')

@section('content')
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
                        <h4 class="card-title">Student's table</h4>
                    </div>
                    {{-- <div class="col-md-3"> --}}
                        <div class="col-md-5">
                            <form action="{{ url('admin/searchstudent') }}" method="GET">
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
                    {{-- </div> --}}
                    <div class="col-md-3">
                        <div class="form-group row text-right">
                                <form action="{{ url('admin/displaystudent') }}">
                                <button type="Submit" class="btn btn-info me-2 btn-rounded float-end ">Back</button>
                                </form>
                        </div>
                    </div>
                </div>


                <p class="card-description">
                    all student</code>
                </p>
                <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>
                                    Student_id
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
                                    Class
                                </th>
                                <th>
                                    Image
                                </th>
                                <th>
                                    zip
                                </th>
                                <th>
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @if(!empty($show)&& $show->count()) --}}
                            @foreach($search as $data)
                            <tr >
                                <td>
                                    {{ $data->student_id}}
                                </td>
                                <td>
                                    {{ $data->name}}
                                </td>
                                <td>
                                    {{ $data->email}}
                                </td>
                                <td>
                                    {{ $data->phone}}
                                </td>
                                <td>
                                    {{ $data->gender}}
                                    </td>
                                <td>
                                    {{ $data->classs}}
                                </td>
                                <td>
                                    <img src="{{ asset('uploads/student/'.$data->img) }}" width="1000px" height="1500px" alt="Image" />
                                </td>
                                <td>
                                {{ $data->zip }}
                                </td>
                                <td>
                                    <a href="{{ url('admin/teacher/' .$data->id. '/edit') }}" class="btn btn-success">Edit</a>
                                    <a href="{{ url('admin/teacher/' .$data->id. '/delete') }}" class="btn btn-danger">Delete</a>
                                </td>
                                @endforeach
                                {{-- @endif --}}
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
                <div class="row">{{$search->links()}}</div>
            </div>
        </div>
    </div>
@endsection
