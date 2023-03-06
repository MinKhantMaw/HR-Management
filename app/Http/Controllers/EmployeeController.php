<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Employee;
use App\Models\Department;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Http\Requests\StoreEmployee;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UpdateEmployee;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('employees.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function ssd()
    {
        $employees  = User::query();
        return Datatables::of($employees)
            ->addColumn('department_name', function ($each) {
                return $each->department ? $each->department->title : '-';
            })
            ->editColumn('is_present', function ($each) {
                if ($each->is_present == 1) {
                    return '<span class="badge bage-pill badge-success border border-success pill">Present</span>';
                } else {
                    return '<span class="badge bage-pill badge-danger border border-danger pill">Leave</span>';
                }
            })
            ->editColumn('updated_at', function ($each) {
                return Carbon::parse($each->updated_at)->format('Y-m-d H:i:s');
            })
            ->addColumn('plus-icon', function ($each) {
                return null;
            })
            ->addColumn('action', function ($each) {
                $edti_icon = '<a href=" ' . route('employees.edit', $each->id) . '" class="text-warning"><i class="fas fa-edit"></i></a>';
                $show_icon = '<a href=" ' . route('employees.show', $each->id) . '" class="text-primary"><i class="fas fa-info-circle"></i></a>';
                $delete_icon = '<a href=" #" class="text-danger delete-btn" data-id="' . $each->id . '"><i class="fas fa-trash-alt"></i></a>';
                return '<div class="action-icon">' . $edti_icon . $show_icon .  $delete_icon . '</div>';
            })
            ->rawColumns(['is_present', 'action'])
            ->make(true);
    }
    public function create()
    {
        $departments = Department::orderBy('title')->get();
        return view('employees.create', ['departments' => $departments]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmployee $request)
    {
        $profile_image_name = '';
        if ($request->has('profile_image')) {
            $profile_image_file = $request->file('profile_image');
            $profile_image_name = uniqid() . '.' . $profile_image_file->getClientOriginalExtension();
            Storage::disk('public')->put('employees/' . $profile_image_name, file_get_contents($profile_image_file));
        }
        $employee = User::create([
            'employee_id' => $request->employee_id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'nrc_number' => $request->nrc_number,
            'gender' => $request->gender,
            'birthday' => $request->birthday,
            'department_id' => $request->department_id,
            'date_of_join' => $request->date_of_join,
            'is_present' => $request->is_present,
            'profile_image' => $profile_image_name,
            'address' => $request->address,
            'password' => Hash::make($request->password),
        ]);
        return redirect()->route('employees.index')->with(['create' => 'Employee Create Successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = User::findOrFail($id);
        return view('employees.show', ['employee' => $employee]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = User::findOrFail($id);
        $departments = Department::get();
        return view('employees.edit', ['employee' => $employee, 'departments' => $departments]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update($id, UpdateEmployee $request)
    {

        $employee = User::findOrFail($id);

        $profile_image_name = $employee->profile_image;
        if ($request->hasFile('profile_image')) {

            Storage::disk('public')->delete('employees/' . $employee->profile_image);
            $profile_image_file = $request->file('profile_image');
            $profile_image_name = uniqid() . '.' . $profile_image_file->getClientOriginalExtension();
            Storage::disk('public')->put('employees/' . $profile_image_name, file_get_contents($profile_image_file));
        }

        $employee->employee_id = $request->employee_id;
        $employee->name = $request->name;
        $employee->email = $request->email;
        $employee->phone = $request->phone;
        $employee->nrc_number = $request->nrc_number;
        $employee->gender = $request->gender;
        $employee->birthday = $request->birthday;
        $employee->department_id = $request->department_id;
        $employee->date_of_join = $request->date_of_join;
        $employee->is_present = $request->is_present;
        $employee->address = $request->address;
        $employee->profile_image = $profile_image_name;
        $employee->password = $request->password ? Hash::make($request->password) : $employee->password;
        $employee->update();
        return redirect()->route('employees.index')->with(['update' => 'Employee Updated Successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        //
    }
}
