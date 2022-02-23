@extends('back.index')
@section('title')
    آموزش لاراول - پنل مدیریت
@endsection
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
      <!-- Page Title Header Starts-->
      <div class="row page-title-header">
        <div class="col-12">
          <div class="page-header">
            <h4 class="page-title">پنل مدیریت</h4>
          </div>
        </div>
      </div>
      <!-- Page Title Header Ends-->
      {{-- <div class="row">
          <div>
            <p>
                خدایا شکرت به شغل دلخواه برنامه نویسی رسیدم
                و عالی و مفید در حال آموزش دیدن , کار کردن و ثروتمندی و پیشرفت هستم
            </p>
          </div>
          <hr>
          <div>
            <p>
                پروردگارا سپاس گذارم   پروردگارا سپاس گذارم   پروردگارا سپاس گذارم
            </p>
          </div>
      </div>--}}
    </div>
    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->
    @include('back.footer')
    <!-- partial -->
</div>
@endsection
