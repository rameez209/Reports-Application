<?php

namespace App\Http\Controllers;

use App\Models\Departments;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class DepartmentsController extends Controller
{
    // Show all departments
    public function index()
    {
        $departments = Departments::all();
        return view ('departments.index')->with('departments', $departments);
        
    }

    public function create()
    {
        return view('departments.add-department');
    }

    // Store report data
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'departments' => 'required'
        ]);

        Departments::create($formFields);
        return redirect('/reports/manage')->with('success', 'Department added successfully!');
    }

    // public function show(Departments $department)
    // {
    //     return view('departments.show', [
    //         'department' => $department
    //     ]);
    // }
    public function show($id)
    {
        $departments = Departments::find($id);
        return view('departments.show')->with('departments', $departments);
    }

    public function edit($id)
    {
        $department = Departments::find($id);
        return view('departments.edit')->with('departments', $department);
    }
    
    public function update(Request $request, $id)
    {
        $department = Departments::find($id);
        $input = $request->all();
        $department->update($input);
        return redirect('departments')->with('success', 'department Updated!');  
    }

    // Delete report
    // public function destroy($id)
    // {
    //     $departments = Departments::find($id);
    //     $departments::destroy($id);
    //     return redirect('/')->with('success', 'Department deleted!');  
    // }

    public function destroy(Departments $departments)
    {
        $departments->delete();
        return redirect()->back()->with('success','Department deleted successfully');
        // return view('reports.manage', ['departments' => $departments]);
    }
    // public function deleteDepartment(Request $request, $id)
    // {

    //     $departments = Departments::findOrFail($id);
    //     $departments->delete();
    //     return redirect('/');
    //     // return view('reports.manage', ['departments' => $departments]);
    // }
}
