@extends('layout.master')


@section('content')

<section class="profile_section layout_padding">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-3">
                <ul class="list-group">
                    <li class="list-group-item">
                        <a href="./index.html">اطلاعات کاربر</a>
                    </li>
                    <li class="list-group-item">
                        <a href="./addresses.html">آدرس ها</a>
                    </li>
                    <li class="list-group-item">
                        <a href="./orders.html">سفارشات</a>
                    </li>
                    <li class="list-group-item">
                        <a href="./transactions.html">تراکنش ها</a>
                    </li>
                    <li class="list-group-item">
                        <a href="#">لیست علاقه مندی ها</a>
                    </li>
                    <li class="list-group-item">
                        <a href="#">خروج</a>
                    </li>
                </ul>
            </div>
            <div class="col-sm-12 col-lg-9">
                <div class="vh-70">
                    <div class="row g-4">
                        <div class="col col-md-6">
                            <label class="form-label">نام و نام خانوادگی</label>
                            <input type="text" class="form-control" value="لورم ایپسوم" />
                        </div>
                        <div class="col col-md-6">
                            <label class="form-label">ایمیل</label>
                            <input type="text" class="form-control" value="test@gmail.com" />
                        </div>
                        <div class="col col-md-6">
                            <label class="form-label">شماره تلفن</label>
                            <input type="text" disabled class="form-control" value="09100000000" />
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mt-4">ویرایش</button>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
