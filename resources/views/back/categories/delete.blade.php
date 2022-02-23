@extends('back.index')
@section('title')
    پنل مدیریت - مدیریت دسته بندی ها
@endsection
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
      <!-- Page Title Header Starts-->
      <div class="row page-title-header">
        <div class="col-12">
          <div class="page-header">
            <h4 class="page-title">مدیریت دسته بندی ها</h4>
          </div>
        </div>
      </div>
      <!-- Page Title Header Ends-->
      <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    @include('back.messages')
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>عنوان</th>
                                <th>فعال کردن</th>
                                <th>حذف</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)

                                <tr>
                                    <td>{{ $category->title }}</td>
                                    <td>
                                        <a href="{{route('restore-category',$category->id)}}"><label class="badge badge-success" style="font-size: 15px">فعال</label></a>
                                    </td>
                                    <td>
                                        <a href="{{route('force-delete-category',$category->id)}}"><label class="badge badge-danger"
                                                                                   onclick="return confirm('آیا کاربر مورد نظر حذف شود؟')" style="font-size: 15px">حذف</label></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
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
