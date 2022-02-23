@extends('back.index')
@section('title')
    مدیریت نقش ها
@endsection
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
      <!-- Page Title Header Starts-->
      <div class="row page-title-header">
        <div class="col-12">
          <div class="page-header">
            <h4 class="page-title">مدیریت نقش ها</h4>
          </div>
            <div class="float-right">
                <a href="{{ route('roles.create') }}" class="btn btn-success">ایجاد نقش جدید</a>
            </div>
            <br><br>
            <div class="float-right">
                <a href="{{route('show-delete-role')}}" class="btn btn-success">نقش های حذف شده</a>
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
                                <th>وضعیت</th>
                                <th>مجوزها</th>
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
                                @foreach($roles as $role)
                                    @switch($role->status)
                                        @case(1)
                                        @php
                                            $status='<a class="badge badge-success">فعال</a>'
                                        @endphp
                                        @break
                                        @case(0)
                                        @php
                                            $status='<a class="badge badge-warning">غیر فعال</a>'
                                        @endphp
                                        @break
                                        @default
                                    @endswitch
                                <tr>
                                    <td>{{ $role->name }}</td>
                                    <td>{!! $status !!}</td>
                                    {{--<td>{{$role->status}}</td>--}}
                                    <td>
                                        @foreach($role->permissions()->pluck('name') as $permission)
                                            <span class="badge badge-warning">{{ $permission }}</span>
                                        @endforeach
                                    </td>
                                    <td>
                                        <a href="{{ route('roles.edit',$role->id) }}"><label class="badge badge-success" style="font-size: 15px">ویرایش</label></a>
                                        <form action="{{route('roles.destroy',$role->id)}}" method="POST">
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
                {{ $roles->links() }}
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
