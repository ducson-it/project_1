<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listPatient = Patient::with('user')->get();
        return view('admins.patient', compact('listPatient'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $listPatient = patient::with('user')->get();
        return view('admins.patient', compact('listPatient'));
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
        $patient = Patient::findOrfail($id);
        return view('admins.edit-patient', compact('patient'));
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

        $patient = Patient::findOrfail($id);
        $patient->user()
         ->update([
             'name'=> $request->nameuser,
             'email'=> $request->emailuser,
         ]);

        return view('admins.Patient');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $patient = Patient::findOrfail($id);
        $patient->delete();
        $patient->user->delete();
    //    Doctor::where('user_id', '=', $id)->delete();

       return redirect()->route('admins.patient.index')->with('msg', 'xoa thanh cong');
    }
}
