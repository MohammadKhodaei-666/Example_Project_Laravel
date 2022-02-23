@extends('back.index')
@section('title')
    ویرایش دسته بندی
@endsection
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
      <!-- Page Title Header Starts-->
      <div class="row page-title-header">
        <div class="col-12">
          <div class="page-header">
            <h4 class="page-title">ویرایش دسته بندی</h4>
          </div>
        </div>
      </div>
      <!-- Page Title Header Ends-->
      <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    @include('back.messages')
                    <form action="{{ route('categories.update',$category->id) }}" method="POST">
                        @csrf
                        <input type="hidden" name="_method" value="PATCH" autocomplete="off">
                        <div class="form-group">
                            <label for="title">عنوان دسته بندی</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $category->title }}">
                            @error('title')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="slug">نام مستعار</label>
                            <input type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" value="{{ $category->slug }}">
                            @error('slug')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="body">محتوای مطلب</label>
                            <textarea id="editor" type="text" class="form-control @error('body')is-invalid @enderror" name="body">{{$category->body }}</textarea>
                            @error('body')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="title"></label>
                            <button type="submit" class="btn btn-success">ویرایش</button>
                            <a href="{{ route('categories.index') }}" class="btn btn-warning">انصراف</a>
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
