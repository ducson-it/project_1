<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Doctor;
use App\Models\User;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listDoctor = Doctor::with('user')->get();
        return view('admins.doctor', compact('listDoctor'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = Booking::where('status', 'wait')->get();
        return view('admins.create-doctor', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Doctor::create($request->all());

        return view('admins.doctor');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $listDoctor = Doctor::with('user')->get();
        return view('admins.doctor', compact('listDoctor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $doctor = new Doctor();

        //  $doctor = $doctor->findOrFail($id);
        //  $doctor = Doctor::findOrFail($id);
        // if ($request->name != '') {
        //     $doctor = $doctor->where('name', $request->name);
        // }
        // if ($request->name == '') {
        //     $doctor = $doctor->where('name', 'abc');
        // }
        $doctor = Doctor::findOrfail($id);
        return view('admins.edit-doctor', compact('doctor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $validated = $request->validate([
        //     'name' => 'required|unique:posts|max:255',
        //     'email' => 'required',
        // ],[
        //     'name.required' => 'A title is required',
        //     'name.max' => 'khong lon hon 255',
        //     'email.required' => 'A message is required',
        // ]);

        $doctor = Doctor::findOrfail($id);
        $doctor->level = $request->select;
        $doctor->save();

        $doctor->user()
         ->update([
             'name'=> $request->nameuser,
             'email'=> $request->emailuser,
         ]);

        return view('admins.doctor');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $doctor = Doctor::findOrfail($id);
        $doctor->delete();
        $doctor->user->delete();
    //    Doctor::where('user_id', '=', $id)->delete();

       return redirect()->route('admins.doctor.index')->with('msg', 'xoa thanh cong');
    }
}
