@extends('layouts.admin')

@section('content')
    <div class="col-lg-12 stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Teacher's table</h4>
                <p class="card-description">
                    all teachers</code>
                </p>
                <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>
                                    #
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
                            @if(!empty($show)&& $show->count())
                            @foreach($show as $data)
                            <tr >
                                <td>
                                    {{ $data->id}}
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
                                    {{ $data->qualification}}
                                </td>
                                <td>
                                    <img src="{{ asset('uploads/teacher/'.$data->img) }}" width="1000px" height="1500px" alt="Image" />
                                </td>
                                <td>
                                    {{ $data->status}}
                                </td>
                                <td>
                                    <a href="" class="btn btn-success">Edit</a>
                                    <a href="" class="btn btn-danger">Update</a>
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
                <div class="row">{{$show->links()}}</div>
            </div>
        </div>
    </div>
@endsection