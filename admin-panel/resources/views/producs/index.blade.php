@extends('layout.master')
@section('title', 'Category')


@section('content')
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h4 class="fw-bold">محصولات</h4>
                    <a href="{{ route('product.create') }}" class="btn btn-sm btn-outline-primary">ایجاد محصول</a>
                </div>

                <div class="table-responsive">
                    <table class="table align-middle">
                        <thead>
                            <tr>
                                <th>تصویر</th>
                                <th>نام</th>
                                <th>قیمت</th>
                                <th>تعداد</th>
                                <th>وضعیت</th>
                                <th>عملیات</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>
                                    <img src="./images/b1.jpg" width="80" alt="">
                                </th>
                                <td>همبر ذغالی</td>
                                <td>89,000</td>
                                <td>15</td>
                                <td>فعال</td>
                                <td>
                                    <div class="d-flex">
                                        <button class="btn btn-sm btn-outline-info me-2">نمایش</button>
                                        <button class="btn btn-sm btn-danger">حذف</button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    <img src="./images/p1.jpg" width="80" alt="">
                                </th>
                                <td>پیتزا متخصص</td>
                                <td>150,000</td>
                                <td>5</td>
                                <td>فعال</td>
                                <td>
                                    <div class="d-flex">
                                        <button class="btn btn-sm btn-outline-info me-2">نمایش</button>
                                        <button class="btn btn-sm btn-danger">حذف</button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    <img src="./images/b2.jpg" width="80" alt="">
                                </th>
                                <td>همبر ذعالی بوقلمون</td>
                                <td>103,000</td>
                                <td>10</td>
                                <td>فعال</td>
                                <td>
                                    <div class="d-flex">
                                        <button class="btn btn-sm btn-outline-info me-2">نمایش</button>
                                        <button class="btn btn-sm btn-danger">حذف</button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    <img src="./images/p2.jpg" width="80" alt="">
                                </th>
                                <td>پیتزا رست بیف</td>
                                <td>193,000</td>
                                <td>8</td>
                                <td>فعال</td>
                                <td>
                                    <div class="d-flex">
                                        <button class="btn btn-sm btn-outline-info me-2">نمایش</button>
                                        <button class="btn btn-sm btn-danger">حذف</button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="d-flex justify-content-center mt-4">
                    <nav aria-label="navigation">
                        <ul class="pagination">
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                        </ul>
                    </nav>
                </div>
        </div>
    </div>

@endsection


<tbody>
