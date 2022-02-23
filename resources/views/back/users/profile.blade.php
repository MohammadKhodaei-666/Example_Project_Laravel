@extends('back.index')
@section('title')
    ویرایش کاربر
@endsection
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
      <!-- Page Title Header Starts-->
      <div class="row page-title-header">
        <div class="col-12">
          <div class="page-header">
            <h4 class="page-title">ویرایش کاربر</h4>
          </div>
        </div>
      </div>
      <!-- Page Title Header Ends-->
      <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('users.update',$user->id) }}" method="POST">
                        @csrf
                        <input type="hidden" name="_method" value="PATCH">
                        <div class="form-group">
                            <label for="title">نام و نام خانوادگی</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}">
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="title">ایمیل</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}">
                            @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="title">تلفن همراه</label>
                            <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ $user->phone }}">
                            @error('phone')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="roles">انتخاب نقش ها</label>
                            <div id="output"></div>
                            <select name="roles[]" class="chosen-select" multiple style="width: 400px">
                                @foreach ($roles as $role_id => $role_name)
                                    <option value="{{ $role_id }}" @if (in_array($role_id,$user->roles->pluck('id')->toArray())) @endif>
                                        {{ $role_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="title">رمز ورود</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password">
                            @error('password')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="title">تکرار رمز ورود</label>
                            <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation">
                            @error('password_confirmation')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="title"></label>
                            <button type="submit" class="btn btn-success">ویرایش پروفایل</button>
                            <a href="{{ route('users.index') }}" class="btn btn-warning">انصراف</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </div>
    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->
    @include('back.footer')
    <!-- partial -->
</div>
@endsection
