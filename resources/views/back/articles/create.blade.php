@extends('back.index')
@section('title')
    مطلب جدید
@endsection
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
      <!-- Page Title Header Starts-->
      <div class="row page-title-header">
        <div class="col-12">
          <div class="page-header">
            <h4 class="page-title">مطلب جدید</h4>
          </div>
        </div>
      </div>
      <!-- Page Title Header Ends-->
      <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    @include('back.messages')
                    <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title">نام مطلب</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}">
                            @error('title')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="slug">نام مستعار</label>
                            <input type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" value="{{ old('slug') }}">
                            @error('slug')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="body">محتوای مطلب</label>
                            <textarea id="editor" type="text" class="form-control @error('body') is-invalid @enderror" name="body">{{ old('body') }}</textarea>
                            @error('body')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="price">قیمت محصول</label>
                            <input type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}">
                            @error('price')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">نویسنده : {{ Auth::user()->name }}</label>
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        </div>
                        <div class="form-group">
                            <label for="status">وضعیت</label>
                            <select name="status" class="form-control">
                                <option value="0">منتشر نشده</option>
                                <option value="1">منتشر شده</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="categories">انتخاب دسته بندی</label>
                            <div id="output"></div>
                            <select name="categories[]" class="chosen-select" multiple style="width: 400px">
                                @foreach ($categories as $category_id => $category_title)
                                    <option value="{{ $category_id }}">{{ $category_title }}</option>
                                @endforeach
                            </select>
                        </div>
                        {{--<div class="input-group">
                            <span class="input-group-btn">
                              <a href="#" id="lfm" data-input="image" data-preview="holder" class="btn btn-primary">
                                <i class="fa fa-picture-o"></i> انتخاب
                              </a>
                            </span>
                            <input id="image" class="form-control" type="text" name="image">
                        </div>
                        <img id="holder" style="margin-top:15px;max-height:100px;">--}}
                        <div class="input-group">
                            <span class="input-group-btn">
                                <input type="file" name="photo">
                            </span>
                        </div>
                        <img id="holder" style="margin-top:15px;max-height:100px;">
                        <hr>
                        <div class="form-group">
                            <label for="title"></label>
                            <button type="submit" class="btn btn-success">ذخیره</button>
                            <a href="{{ route('articles.index') }}" class="btn btn-warning">انصراف</a>
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
