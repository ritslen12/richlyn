@extends('layouts.app')

@section('content')

    <div class="container">

        <h3 align="center" class="">Employee Management</h3>

        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">
            <!--@if ($errors->any())
            <div>
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
            @endif -->
            <div class="form-area mt-5">
                <form method="POST" action="{{ route('employee.store') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mt-3">
                            <label>First Name</label>
                            <input type="text" class="form-control" name="firstname" value="{{ old('firstname') }}" placeholder="Enter Firstname">
                            @if ($errors->has('firstname'))
                                <ul class="text-danger mt-2"><li>{{ $errors->first('firstname') }}</li></ul>
                            @endif
                        </div>
                        <div class="col-md-6 mt-3">
                            <label>Last Name</label>
                            <input type="text" class="form-control" name="lastname" value="{{ old('lastname') }}" placeholder="Enter Lastname">
                            @if ($errors->has('firstname'))
                                <ul class="text-danger mt-2"><li>{{ $errors->first('lastname') }}</li></ul>
                            @endif
                        </div>
                        <div class="col-md-6 mt-3">
                            <label>DATE OF BIRTH</label>
                            <input type="date" class="form-control" name="DOB" value="{{ old('DOB') }}">
                            @if ($errors->has('firstname'))
                                <ul class="text-danger mt-2"><li>{{ $errors->first('DOB') }}</li></ul>
                            @endif

                        </div>
                        <div class="col-md-6 mt-3">
                            <label>Phone</label>
                            <input type="text" class="form-control" name="phone" value="{{ old('phone') }}" placeholder="Enter Phone Number">
                            @if ($errors->has('firstname'))
                                <ul class="text-danger mt-2"><li>{{ $errors->first('phone') }}</li></ul>
                            @endif
                        </div>
                        <div class="col-md-6 mt-3">
                            <input type="submit" class="btn btn-info" value="Register">
                        </div>
                    </div>
                </form>
            </div>

            <h3 align="center" class="mt-5">Employee List</h3>
                <table class="table mt-5 border">
                    <thead>
                      <tr>
                        <th scope="col" class="border border-dark">#</th>
                        <th scope="col" class="border border-dark">Employee First Name</th>
                        <th scope="col" class="border border-dark">Employee Last Name</th>
                        <th scope="col" class="border border-dark">DOB</th>
                        <th scope="col" class="border border-dark">Phone</th>
                        <th scope="col" class="border border-dark">Action</th>
                      </tr>
                    </thead>
                    <tbody class="">

                    @foreach($employers as $employee)
                        <tr>
                        <td class="border border-dark">{{ $employee->id }}</td>
                            <td class="border border-dark">{{ $employee->firstname }}</td>
                            <td class="border border-dark">{{ $employee->lastname }}</td>
                            <td class="border border-dark">{{ $employee->DOB }}</td>
                            <td class="border border-dark">{{ $employee->phone }}</td>
                            <td class="border border-dark">
                            <a href="{{ url('employees/' . $employee->id . '/edit') }}" class="btn btn-success btn-sm">Edit</a>
                            <a href="{{ url('employees/' . $employee->id . '/delete') }}" class="btn btn-danger btn-sm">Delete</a>
                            </form>
                            </td>

                          </tr>

                        @endforeach




                    </tbody>
                  </table>
            </div>
        </div>
    </div>

@endsection


@push('css')
    <style>
        .form-area{
            padding: 20px;
            margin-top: 20px;
              background-color:#FFFF00;
        }

        .bi-trash-fill{
            color:red;
            font-size: 18px;
        }

        .bi-pencil{
            color:green;
            font-size: 18px;
            margin-left: 20px;
        }
    </style>
@endpush