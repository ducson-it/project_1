@extends('layouts.layout_admin_master')

@section('content')
    <h1>Đăng ký user bác sĩ</h1>
    @if (session('msg'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('msg') }}
        </div>
    @endif
    <div class="container">
        <form action="{{ route('admins.doctor.store') }}" method="post">
            @csrf
            <div class="mb-3">
                <label class="form-label">Tên bác sĩ</label>
                <input type="text" name="name" class="form-control" value="{{ old('name') }}"
                    placeholder="Tên bác sĩ">
                @error('name')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Vị trí</label>
                <input type="text" name="level" class="form-control" value="{{ old('level') }}"
                    placeholder="Vị trí">
                @error('level')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Bệnh nhân đang đợi</label>
                <select name="user_id">
                    @foreach ($users as $user)
                    <option value="{{$user->getKey()}}">{{$user->name}}</option>
                    @endforeach
                </select>
                @error('user_id')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
            {{-- Teamplate admin nayf em laasy owr ddaau z? em lay tren mang anh oi. vào trang mạng đó a xem e cũng k rõ. để em xem --}}
            {{-- <div class="mb-3">
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
            </div> --}}
            {{-- <div class="mb-3">
                <label for="formFile" class="form-label">Image</label>
                <input class="form-control" name="image" type="file">
                @error('imageuser')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div> --}}
            {{-- <div class="row">
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
                </div> --}}
                {{-- <div class="col-6">
                    <div>
                        <label for="formFile" class="form-label">Level</label>
                    </div>
                    <select class="form-select" name="select">
                        <option value="thac si" {{($doctor->level == 'thac si')? 'selected' : ''}}>Thạc sĩ</option>
                        <option value="tien si" {{($doctor->level == 'tien si')? 'selected' : ''}}>Tiến sĩ</option>
                        <option value="giao su" {{($doctor->level == 'giao su')? 'selected' : ''}}>Giáo sư</option>
                    </select>
                </div> --}}
            </div>
            {{-- <div class="mb-3">
                <div class="form-floating">
                    <label for="formFile" class="form-label">Description</label>
                    <textarea class="form-control" name="description" placeholder="Leave a comment here" id="floatingTextarea">{{ $doctor->user->description }}</textarea>
                    @error('description')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div> --}}
            <button type="submit" class="btn btn-primary">Đăng ký</button>
        </form>
    </div>
@endsection
