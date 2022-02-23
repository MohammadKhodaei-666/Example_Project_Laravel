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
          <div class="float-right">
              <a href="{{route('show-block-user')}}" class="btn btn-success">کاربران غیر فعال</a>
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
                                <th>ایمیل</th>
                                <th>تلفن</th>
                                <th>نقش</th>
                                {{--<th>وضعیت</th>--}}
                                <th>مدیریت</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{--@foreach ($users as $user)
                                @switch($user->role)
                                    @case(1)
                                        @php $role="مدیر" @endphp
                                        @break
                                    @case(2)
                                        @php $role="کاربر" @endphp
                                        @break
                                    @default
                                @endswitch

                                @switch($user->status)
                                    @case(1)
                                        @php
                                            $url=route('admin.user.status',$user->id);
                                            $status='<a href="'.$url.'" class="badge badge-success">فعال</a>'
                                        @endphp
                                        @break
                                    @case(0)
                                        @php
                                            $url=route('admin.user.status',$user->id);
                                            $status='<a href="'.$url.'" class="badge badge-warning">غیر فعال</a>'
                                        @endphp
                                        @break
                                    @default
                                @endswitch--}}
                                @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td>
                                        @foreach($user->roles()->pluck('name') as $role)
                                            <span class="badge badge-warning">{{$role}}</span>
                                        @endforeach
                                    </td>
                                    {{--<td>{!! $status !!}</td>--}}
                                    <td>
                                        <a href="{{ route('users.edit',$user->id) }}"><label class="badge badge-success" style="font-size: 15px">ویرایش</label></a>
                                        {{--<a href="{{ route('users.destroy',$user->id) }}"><label class="badge badge-danger"
                                            onclick="return confirm('آیا کاربر مورد نظر حذف شود؟')">حذف</label></a>--}}
                                        <form action="{{route('users.destroy',$user->id)}}" method="POST">
                                            @csrf
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="submit" value="بلاک">
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $users->links() }}
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
