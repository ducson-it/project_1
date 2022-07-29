@extends('layouts.layout_admin_master')

@section('content')
    @if (session('msg'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('msg') }}
        </div>
    @endif
    <h1>Quản lý bác sĩ</h1>
    {{-- <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th width='20%'>Image</th>
                <th>Name</th>
                <th>Gender</th>
                <th>YOB</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Level</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @php($stt = 1)
            @foreach ($listDoctor as $doctor)
                <tr>
                    <th>{{ $stt++ }}</th>
                    <td><img width="100%" src="{{ asset('img/ducson.jpg') }}" alt=""></td>
                    <td>{{ $doctor->user->name }}</td>
                    <td>{{ $doctor->user->gender }}</td>
                    <td>{{ $doctor->user->yob }}</td>
                    <td>{{ $doctor->user->email }}</td>
                    <td>{{ $doctor->user->phone }}</td>
                    <td>{{ $doctor->user->address }}</td>
                    <td>{{ $doctor->level->level_name }}</td>
                    <td>
                        <a href="{{ route('admins.doctor.show', $doctor->user->id) }}" class="btn btn-danger"
                            onclick="return confirm('Are you want to delete?')">Xóa</a>
                        <a href="{{ route('admins.doctor.edit-doctor', $doctor->user->id) }}"
                            class="btn btn-primary">edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table> --}}
@endsection
