@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    {{-- <h4 class="card-title">Add Studdent</h4> --}}
                    @if (Session::has('message'))
                    <p class="alert alert-info">{{ Session::get('message') }}</p>
                @endif
                <div class="col-md-3 ">
                    <div class="form-group row text-right">
                            <form action="{{ url('admin/displaystudent') }}">
                            <button type="Submit" class="btn btn-danger me-2 btn-rounded float-right">Back</button>
                            </form>
                    </div>
                </div>
                    <form class="forms-sample" action="{{ url('admin/addstudent') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">First Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="fname">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Last Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="lname">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Gender</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" name="gender[]">
                                            <option>Male</option>
                                            <option>Female</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Date of Birth</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="date" placeholder="dd/mm/yyyy" name="date">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Class</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" name="class[]">
                                            @foreach ($values as $data)
                                                <option>{{ $data->classs }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Section</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" name="section[]">
                                            <option>Category1</option>
                                            <option>Category2</option>
                                            <option>Category3</option>
                                            <option>Category4</option>
                                        </select>
                                    </div>
                                </div>
                            </div> --}}
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Image</label>
                                    <div class="col-sm-9">
                                        <div class="form-check">
                                            <input type="file" name="img" class="form-control">
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Mobile</label>
                                    <div class="col-sm-9">
                                        <div class="form-check">
                                            <input name="phone" type="tel" class="form-control"
                                                placeholder="Mobile number" required>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Email</label>
                                    <div class="col-sm-9">
                                        <div class="form-check">
                                            <input name="email" type="email" class="form-control" placeholder="Email"
                                                required>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Password</label>
                                    <div class="col-sm-9">
                                        <div class="form-check">
                                            <input name="password" type="password" class="form-control"
                                                placeholder="Password" required>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Address </label>
                                    <div class="col-sm-9">
                                        <input name="address" type="text" class="form-control" required>
                                    </div>
                                </div>
                            </div>

                        </div>
                        {{-- <p class="card-description">
                            Address
                        </p> --}}
                        <div class="row">
                            {{-- <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Address </label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                            </div> --}}
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">State</label>
                                    <div class="col-sm-9">
                                        <select name="state" id="state" class="form-control">
                                            <option value="Andhra Pradesh">Andhra Pradesh</option>
                                            <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                                            <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                            <option value="Assam">Assam</option>
                                            <option value="Bihar">Bihar</option>
                                            <option value="Chandigarh">Chandigarh</option>
                                            <option value="Chhattisgarh">Chhattisgarh</option>
                                            <option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
                                            <option value="Daman and Diu">Daman and Diu</option>
                                            <option value="Delhi">Delhi</option>
                                            <option value="Lakshadweep">Lakshadweep</option>
                                            <option value="Puducherry">Puducherry</option>
                                            <option value="Goa">Goa</option>
                                            <option value="Gujarat">Gujarat</option>
                                            <option value="Haryana">Haryana</option>
                                            <option value="Himachal Pradesh">Himachal Pradesh</option>
                                            <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                                            <option value="Jharkhand">Jharkhand</option>
                                            <option value="Karnataka">Karnataka</option>
                                            <option value="Kerala">Kerala</option>
                                            <option value="Madhya Pradesh">Madhya Pradesh</option>
                                            <option value="Maharashtra">Maharashtra</option>
                                            <option value="Manipur">Manipur</option>
                                            <option value="Meghalaya">Meghalaya</option>
                                            <option value="Mizoram">Mizoram</option>
                                            <option value="Nagaland">Nagaland</option>
                                            <option value="Odisha">Odisha</option>
                                            <option value="Punjab">Punjab</option>
                                            <option value="Rajasthan">Rajasthan</option>
                                            <option value="Sikkim">Sikkim</option>
                                            <option value="Tamil Nadu">Tamil Nadu</option>
                                            <option value="Telangana">Telangana</option>
                                            <option value="Tripura">Tripura</option>
                                            <option value="Uttar Pradesh">Uttar Pradesh</option>
                                            <option value="Uttarakhand">Uttarakhand</option>
                                            <option value="West Bengal">West Bengal</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">City</label>
                                    <div class="col-sm-9">
                                        <div class="form-check">
                                            <input name="city" type="text" class="form-control" placeholder="city"
                                                required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Postcode</label>
                                    <div class="col-sm-9">
                                        {{-- <input type="text" class="form-control"> --}}
                                        <input id="zip" name="zip" type="text" pattern="[0-9]*">
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="row"> --}}
                        {{-- <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Address 2</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control">
                                    </div>
                                </div> --}}
                        {{-- </div> --}}

                        {{-- </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">City</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                            </div> --}}


                </div>
                <button type="submit" class="btn btn-primary me-2 btn-rounded">Add student</button>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection
