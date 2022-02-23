@extends('back.index')
@section('title')
    پنل مدیریت - مدیریت کاربران
@endsection
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
      <!-- Page Title Header Starts-->
      <div class="row page-title-header">
        <div class="col-12">
          <div class="page-header">
            <h4 class="page-title">مدیریت کاربران</h4>
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
                                <th>فعال کردن</th>
                                <th>حذف</th>
                            </tr>
                        </thead>
                        <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>
                                        {{--<form action="{{route('restore-user',$user->id)}}" method="GET">
                                            @csrf
                                            <input type="submit" value="فعال کردن">
                                        </form>--}}
                                        <a href="{{ route('restore-user',$user->id) }}"><label class="badge badge-success" style="font-size: 15px">فعال</label></a>

                                    </td>
                                    <td>
                                        {{--<form action="{{route('force-delete',$user->id)}}" method="GET">
                                            @csrf
                                            <input type="submit" value="حذف">
                                        </form>--}}
                                        @if(\Illuminate\Support\Facades\Auth::user()->can('delete-user',$user))
                                            <a href="{{ route('force-delete',$user->id) }}"><label class="badge badge-danger"
                                                                                                   onclick="return confirm('آیا کاربر مورد نظر حذف شود؟')" style="font-size: 15px">حذف</label></a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{--{{ $users->links() }}--}}
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
