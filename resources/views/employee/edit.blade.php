@extends('layouts.app')

@section('content')

    <div class="container">

        <h3 align="center" class="">Employee Management</h3>

        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">
            <div class="form-area">
                <form method="POST" action="{{ route('employee.update', $employee->id) }}">
                {!! csrf_field() !!}
                  @method("PATCH")
                  
                    <div class="row mt-5">
                        <div class="col-md-6">
                            <label>Employee Firstname</label>
                            <input type="text" class="form-control" name="firstname" value="{{ $employee->firstname }}">
                            @if ($errors->has('firstname'))
                                <ul class="text-danger mt-2"><li>{{ $errors->first('firstname') }}</li></ul>
                            @endif                            
                        </div>
                        <div class="col-md-6">
                            <label>Employee Lastname</label>
                            <input type="text" class="form-control" name="lastname" value="{{ $employee->lastname }}">
                            @if ($errors->has('firstname'))
                                <ul class="text-danger mt-2"><li>{{ $errors->first('lastname') }}</li></ul>
                            @endif
                        </div>
                        <div class="col-md-6 mt-3">
                            <label>Employee DOB</label>
                            <input type="date" class="form-control" name="DOB" value="{{ $employee->DOB }}">
                        </div>
                        <div class="col-md-6 mt-3">
                            <label>Phone</label>
                            <input type="text" class="form-control" name="phone" value="{{ $employee->phone }}">
                            @if ($errors->has('firstname'))
                                <ul class="text-danger mt-2"><li>{{ $errors->first('phone') }}</li></ul>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mt-3">
                        <button type="submit" class="btn btn-primary">Update</button>
                     </div>

                    </div>
                </form>
            </div>

            </div>
        </div>
    </div>

@endsection


@push('css')
    <style>
        .form-area{
            padding: 20px;
            margin-top: 20px;
            background-color:#b3e5fc;
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