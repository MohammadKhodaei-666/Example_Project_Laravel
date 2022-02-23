@extends('back.index')
@section('title')
    نقش جدید
@endsection
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
      <!-- Page Title Header Starts-->
      <div class="row page-title-header">
        <div class="col-12">
          <div class="page-header">
            <h4 class="page-title">نقش جدید</h4>
          </div>
        </div>
      </div>
      <!-- Page Title Header Ends-->
      <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    @include('back.messages')
                    <form action="{{ route('roles.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">نام</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}">
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="status">وضعیت</label>
                            <select name="status" class="form-control">
                                <option value="0">منتشر نشده</option>
                                <option value="1">منتشر شده</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="permissions">انتخاب مجوز ها</label>
                            <div id="output"></div>
                            <select name="permissions[]" class="chosen-select" multiple style="width: 400px">
                                @foreach ($permissions as $permission_id => $permission_name)
                                    <option value="{{ $permission_id }}">{{ $permission_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="title"></label>
                            <button type="submit" class="btn btn-success">ذخیره</button>
                            <a href="{{ route('roles.index') }}" class="btn btn-warning">انصراف</a>
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
