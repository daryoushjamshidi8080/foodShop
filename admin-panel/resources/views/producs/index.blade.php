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
                                <th>دسته بندی</th>
                                <th>قیمت</th>
                                <th>تعداد</th>
                                <th>وضعیت</th>
                                <th>عملیات</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $product)
                                <tr>
                                    <th>
                                        <img src="{{ asset('images/products/' . $product->primary_image ) }}" width="80" alt="">
                                    </th>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->category->name }}</td>
                                    <td>{{ number_format($product->price) }}</td>
                                    <td>{{ $product->quantity }}</td>
                                    <td>{{ $product->status == '1' ? 'فعال' : 'غیرفعال' }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a style="height:32px;" href="{{ route('product.show' , ['product' => $product->id]) }}"  class="btn btn-sm btn-outline-info me-2">نمایش</a>
                                            <a style="height:32px;" href="{{ route('product.edit', ['product' => $product->id]) }}" class="btn btn-sm btn-outline-primary me-2">ویرایش</a>
                                            <form method="POST" class="inline-block " action="{{ route('product.destroy' , ['product' => $product->id ])  }}">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-danger">حذف</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>



                <div class="d-flex justify-content-center mt-4">
                    <nav aria-label="navigation">
                        {{ $products->links('layout.paginate') }}
                    </nav>
                </div>
        </div>
    </div>

@endsection


<tbody>
