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
            <div class="float-right">
                <a href="{{ route('categories.create') }}" class="btn btn-success">دسته بندی جدید</a>
            </div>
            <br><br>
            <div class="float-right">
                <a href="{{route('show-delete-category')}}" class="btn btn-success">دسته بندی های غیر فعال</a>
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
                                <th>نام مستعار</th>
                                <th>محتوای مطلب</th>
                                <th>مدیریت</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)

                                <tr>
                                    <td>{{ $category->title }}</td>
                                    <td>{{ $category->slug }}</td>
                                    <td>{{$category->body}}</td>
                                    <td>
                                        <a href="{{ route('categories.edit',$category->id) }}"><label class="badge badge-success">ویرایش</label></a>
                                        {{--<a href="{{ route('categories.destroy',$category->id) }}"><label class="badge badge-danger"
                                                                                               onclick="return confirm('آیا کاربر مورد نظر حذف شود؟')">حذف</label></a>--}}
                                        <form action="{{route('categories.destroy',$category->id)}}" method="post">
                                            @csrf
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="submit" value="delete">
                                        </form>
                                     </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $categories->links() }}
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
