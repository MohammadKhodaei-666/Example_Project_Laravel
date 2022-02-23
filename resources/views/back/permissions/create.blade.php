@extends('back.index')
@section('title')
    مجوز جدید
@endsection
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
      <!-- Page Title Header Starts-->
      <div class="row page-title-header">
        <div class="col-12">
          <div class="page-header">
            <h4 class="page-title">مجوز جدید</h4>
          </div>
        </div>
      </div>
      <!-- Page Title Header Ends-->
      <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    @include('back.messages')
                    <form action="{{ route('permissions.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">نام مجوز</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}">
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="title"></label>
                            <button type="submit" class="btn btn-success">ذخیره</button>
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
