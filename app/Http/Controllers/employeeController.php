<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use Laravel\Ui\Presets\React;
use PDO;

class employeeController extends Controller
{
    public function index()
    {
        $employers = Employee::all();
        return view('employee.index', compact('employers'));
    }
    public function store(Request $request){
        $request->validate([
            'firstname'=> 'required|regex:/^[a-zA-Z\s]+$/u|max:255',
            'lastname'=> 'required|regex:/^[a-zA-Z\s]+$/u|max:255',
            'DOB' => 'required|date|before:today',
            'phone' => 'required|regex:/^[0-9\-]+$/|max:11',
        ],
          [
            'firstname.required' => 'First name is required',
            'firstname.regex' => 'Only alphabets are allowed',
            'lastname.required' => 'Last name is required',
            'lastname.regex' => 'Only alphabets are allowed',
            'DOB.required' => 'Date of Birth is required',
            'DOB.date' => 'Date of Birth must be a valid date',
            'DOB.before' => 'Date of Birth must be a date before today',
            'phone.required' => 'Phone number is required',
            'phone.regex' => 'Phone number can only contain numbers and dashes',
            'phone.max' => 'Phone number cannot be longer than 11 characters',
          ]);
        $employeeData = [
            'firstname' => $request->input('firstname'),
            'lastname'=> $request->input('lastname'),
            'DOB'=> $request->input('DOB'),
            'phone'=> $request->input('phone')
        ];
        Employee::create($employeeData);
        return redirect('/employee');
    }
    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        return view('employee.edit', compact('employee'));
    }
    public function update(Request $request, int $id)
    {
        $employee = Employee::findOrFail($id);
        $employee->update($request->all());

        return redirect()->route('employee.index');
    }
    public function destroy(int $id){
        $employee = Employee::findOrFail($id);
        $employee->delete();
        return redirect()->route('employee.index');
    }

}
