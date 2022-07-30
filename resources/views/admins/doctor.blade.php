@extends('layouts.layout_admin_master')

@section('content')
    @if (session('msg'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('msg') }}
        </div>
    @endif
    <h1>Quản lý bác sĩ</h1>
    <table class="table">
        <thead>
            <tr>
                <th></th>
                <th>#</th>
                <th width='20%'>Image</th>
                <th>Name</th>
                <th>Email</th>
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
                        <td>{{ $doctor->user->email }}</td>
                        <td>{{ $doctor->user->status == 'wait' ? 'Chưa liên hệ' : 'Đã liên hệ' }}</td>
                        <td>{{ $doctor->level }}</td>
                        <td>
                            <form action="{{ route('admins.doctor.destroy', $doctor->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Xóa</button>
                            </form>
                            <form action="{{ route('admins.doctor.edit', $doctor->id) }}" method="get">
                                @csrf
                                <button type="submit" class="btn btn-primary">Edit</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
        </tbody>
    </table>
@endsection
