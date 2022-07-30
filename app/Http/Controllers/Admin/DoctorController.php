<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
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
        return view('admins.create-doctor');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    // Giá trị em mới truy vấn này là gì vậy?
    // e update 2 bảng, em create bên bảng user rồi lấy id user mới tạo đó ccho vào bảng doctor ạ
        $doctor = new Doctor();

        // $doctor->user->name = $request->nameuser;
        // $doctor->user->email = $request->emailuser;
        // $doctor->user->password = $request->password;
        // $doctor->user->role = '1';
        // dd($doctor);
        // $doctor->save();
        $data = [
            ''
        ];
        // user_id là em lấy giá trị Auth::id() (Auth::id là lấy id user hiện tại đang dăng nhập) phải không?

        $doctor->create($request->all());



        $doctor->user_id = $doctor->user->id;

        $doctor->save();

        return view('admins.doctor');
        // ok e
        // phần create này a này. em nghĩ em làm sai rồi,

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
