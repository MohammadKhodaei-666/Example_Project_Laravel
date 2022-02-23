@extends('back.index')
@section('title')
    پنل مجوزها
@endsection
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
      <!-- Page Title Header Starts-->
      <div class="row page-title-header">
        <div class="col-12">
          <div class="page-header">
            <h4 class="page-title">مدیریت مجوزها</h4>
          </div>
            <div class="float-right">
                <a href="{{ route('permissions.create') }}" class="btn btn-success">مجوز جدید</a>
            </div>
            <br><br>
            <div class="float-right">
                <a href="{{route('show-delete-permission')}}" class="btn btn-success">مجوزهای غیر فعال</a>
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
                                <th>نام</th>
                                {{--<th>وضعیت</th>--}}
                                <th>مدیریت</th>
                            </tr>
                        </thead>
                        <tbody>
                                @foreach($permissions as $permission)
                                <tr>
                                    <td>{{$permission->name}}</td>
                                    {{--<td>{!! $status !!}</td>--}}
                                    <td>
                                        <a href="{{route('permissions.edit',$permission->id)}}"><label class="badge badge-success" style="font-size: 15px">ویرایش</label></a>
                                        <form action="{{route('permissions.destroy',$permission->id)}}" method="POST">
                                            @csrf
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="submit" value="حذف">
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $permissions->links() }}
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
