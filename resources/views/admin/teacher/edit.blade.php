@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Teacher</h4>
                    <form class="forms-sample" action="{{ url('admin/addteacher/'.$tid->id) }}" method="Post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="exampleInputName1">Name</label>
                            <input name="name" type="text" class="form-control" id="exampleInputName1"
                            value="{{ $tid->name }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail3">Email address</label>
                            <input name="email" type="email" class="form-control" id="exampleInputEmail3"
                            value="{{ $tid->email }}">
                        </div>
                        {{-- <div class="form-group">
                            <label for="exampleInputPassword4">Password</label>
                            <input name="password" type="password" class="form-control" id="exampleInputPassword4"
                                placeholder="Password">
                        </div> --}}
                        <div class="form-group">
                            <label for="exampleInputMobile">Mobile</label>
                            <input name="phone" type="number" class="form-control" id="exampleInputMobile"
                            value="{{ $tid->phone }}">
                        </div>
                        <div class="form-group">
                            <label>Photo</label>
                            <input type="file" name="img" class="form-control">
                            <img src="{{ asset('uploads/teacher/'.$tid->img) }}" width="100px" height="170px" alt="Image" />
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect2">Status</label>
                            <select class="form-control" id="exampleFormControlSelect2">
                                @if ($tid->status == 1)
                                    <option>Active</option>
                                @else
                                    <option>In Active</option>
                                @endif
                                <option>Active</option>
                                <option>In Active</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleTextarea1">Qualification</label>
                            <textarea name="qualification" class="form-control" id="exampleTextarea1" rows="4">{{ $tid->qualification }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary me-2">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
