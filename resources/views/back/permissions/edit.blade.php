@extends('back.index')
@section('title')
    ویرایش مجوزها
@endsection
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
      <!-- Page Title Header Starts-->
      <div class="row page-title-header">
        <div class="col-12">
          <div class="page-header">
            <h4 class="page-title">ویرایش مجوز</h4>
          </div>
        </div>
      </div>
      <!-- Page Title Header Ends-->
      <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('permissions.update',$permission->id) }}" method="POST">
                        @csrf
                        <input type="hidden" name="_method" value="PATCH" autocomplete="off">
                        <div class="form-group">
                            <label for="title">نام</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $permission->name }}">
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="title"></label>
                            <button type="submit" class="btn btn-success">ویرایش پروفایل</button>
                            <a href="{{ route('permissions.index') }}" class="btn btn-warning">انصراف</a>
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
