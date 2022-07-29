@extends('layouts.layout_admin_master')

@section('content')
    <h1>Quản lý bệnh nhân</h1>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Image</th>
            <th scope="col">Name</th>
            <th scope="col">YOB</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th scope="col">Address</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        {{-- <tbody>
            @php($stt = 1)
            @foreach($listPatient as $Patient)
                <tr>
                    <th scope="row">{{ $stt++ }}</th>
                    <td>{{ $Patient->user->image }}</td>
                    <td>{{ $Patient->user->name }}</td>
                    <td>{{ $Patient->user->yob }}</td>
                    <td>{{ $Patient->user->email }}</td>
                    <td>{{ $Patient->user->phone }}</td>
                    <td>{{ $Patient->user->address }}</td>
                    <td>
                        <a href="#" class="btn btn-danger" onclick="return confirm('Are you want to delete?')">Xóa</a>
                        <a href="#" class="btn btn-primary">edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody> --}}
      </table>
@endsection
