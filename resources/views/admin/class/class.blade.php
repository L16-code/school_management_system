@extends('layouts.admin')

@section('content')
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                        </div>
                        <h4 class="card-title">Add Class</h4>
                    </div>
                    <div class="col-md-3">
                    </div>
                    <div class="col-md-3">
                        <div class="form-group row text-right">
                                <form action="{{ url('admin/display') }}">
                                <button type="Submit" class="btn btn-danger me-2 btn-rounded float-right">Back</button>
                                </form>
                        </div>
                    </div>
                </div>
                {{-- <h4 class="card-title">Add class</h4> --}}
                <p class="card-description">
                    @if(Session::has('message'))
                        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                    @endif
                </p>


            <form class="forms-sample" action="{{ url('admin/addclass') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Class</label>
                    <select class="form-control form-control-lg"name="class[]" id="exampleFormControlSelect1">
                        <option>class 1</option>
                        <option>class 2</option>
                        <option>class 3</option>
                        <option>class 4</option>
                        <option>class 5</option>
                        <option>class 6</option>
                        <option>class 7</option>
                        <option>class 8</option>
                        <option>class 9</option>
                        <option >class 10</option>
                        <option >class 11</option>
                        <option>class 12</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Section</label>
                    <select class="form-control form-control-lg"name="sec[]" id="exampleFormControlSelect1">
                        <option>A</option>
                        <option>B</option>
                        <option>C</option>
                        <option>D</option>
                        <option>E</option>
                        <option>F</option>
                        <option>G</option>
                        <option>H</option>
                        <option>I</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Max students in each section</label>
                    <input type="number" class="form-control form-control-sm"name="max" placeholder="maxstudents" aria-label="Username">
                </div>
                <button type="submit" class="btn btn-primary me-2">Submit</button>
            </form>
            </div>
        </div>
    </div>
@endsection
