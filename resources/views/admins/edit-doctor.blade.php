@extends('layouts.layout_admin_master')

@section('content')
    <h1>Thông tin chi bác sĩ</h1>
    @if (session('msg'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('msg') }}
        </div>
    @endif
    <div class="container">
        <form action="{{ route('admins.doctor.handle-edit-doctor', $doctor->user->id) }}" method="post"
            enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" name="nameuser" class="form-control" value="{{ $doctor->user->name }}"
                    placeholder="Name">
                @error('nameuser')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="emailuser" class="form-control" value="{{ $doctor->user->email }}"
                    placeholder="name@example.com">
                @error('emailuser')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Year of birth</label>
                <input type="text" name="yob" class="form-control" value="{{ $doctor->user->yob }}"
                    placeholder="Year of birth">
                @error('yob')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label">Phone</label>
                <input class="form-control" name="phoneuser" value="{{ $doctor->user->phone }}" type="text">
                @error('phoneuser')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <img src="{{ asset('img/') }}" alt="">
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label">Image</label>
                <input class="form-control" name="image" type="file">
                @error('imageuser')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="row">
                <div class="col-6">
                    <label for="formFile" class="form-label">Gender</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="male"
                            {{ $doctor->user->gender == 'male' ? 'checked' : '' }} name="gender" id="gender1">
                        <label class="form-check-label" for="gender1">
                            Male
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="female" name="gender"
                            {{ $doctor->user->gender == 'female' ? 'checked' : '' }} id="gender2">
                        <label class="form-check-label" for="gender2">
                            Female
                        </label>
                    </div>
                    @error('gender')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-6">
                    <div>
                        <label for="formFile" class="form-label">Level</label>
                    </div>
                    <select class="form-select" name="select">
                        <option value="0">Select this option</option>
                        @foreach ($listLevel as $value)
                            <option value="{{ $value->id }}" {{ $doctor->id_level == $value->id ? 'Selected' : '' }}>
                                {{ $value->level_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="mb-3">
                <div class="form-floating">
                    <label for="formFile" class="form-label">Description</label>
                    <textarea class="form-control" name="description" placeholder="Leave a comment here" id="floatingTextarea">{{ $doctor->user->description }}</textarea>
                    @error('description')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            @csrf
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
