@extends('layout.master')
@section('title', 'Product Create')

@section('link')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/@majidh1/jalalidatepicker/dist/jalalidatepicker.min.css">
    <script type="text/javascript" src="https://unpkg.com/@majidh1/jalalidatepicker/dist/jalalidatepicker.min.js"></script>
@endsection


@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h4 class="fw-bold">نمایش محصول</h4>
    </div>

    <div  class="row gy-4 mb-6">
        @csrf

        <div class="col-md-12 mb-5">
            <div class="row justify-content-center">
                <div class="col-md-4" x-data="imageViewer()">
                    <label class="form-label">تصویر اصلی</label>

                        <img width=350 height=220 class="rounded" src="{{ asset('images/products/' . $product->primary_image) }}" alt="">


                    <div class="form-text text-danger">
                        @error('primary_image')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <label class="form-label">نام</label>
            <input name="name" type="text" disabled value="{{ $product->name }}" class="form-control" />
            <div class="form-text text-danger">
                @error('name')
                    {{ $message }}
                @enderror
            </div>
        </div>

        <div class="col-md-3">
            <label class="form-label">دسته بندی</label>
            <input type="text" disabled class="form-control" value="{{ $product->category->name }}">
            <div class="form-text text-danger">
                @error('category_id')
                    {{ $message }}
                @enderror
            </div>
        </div>

        <div class="col-md-3">
            <label class="form-label">وضعیت</label>
            <input type="text" disabled class="form-control" value="{{ $product->status == 1 ? 'فعال' : 'غیرفعال' }}">
            <div class="form-text text-danger">
                @error('status')
                    {{ $message }}
                @enderror
            </div>
        </div>

        <div class="col-md-3">
            <label class="form-label">قیمت</label>
            <input name="price" type="text" disabled value="{{ number_format($product->price) }}" class="form-control" />
            <div class="form-text text-danger">
                @error('price')
                    {{ $message }}
                @enderror
            </div>
        </div>

        <div class="col-md-3">
            <label class="form-label">تعداد</label>
            <input name="quantity" type="text" disabled value="{{  number_format($product->quantity )}}" class="form-control" />
            <div class="form-text text-danger">
                @error('quantity')
                    {{ $message }}
                @enderror
            </div>
        </div>

        <div class="col-md-3">
            <label class="form-label">قیمت حراجی</label>
            <input name="sale_price" type="text" disabled value="{{ number_format($product->sale_price) }}" class="form-control" />
            <div class="form-text text-danger">
                @error('sale_price')
                    {{ $message }}
                @enderror
            </div>
        </div>

        <div class="col-md-3">
            <label class="form-label">تاریخ شروع حراجی</label>
            <input data-jdp name="date_on_sale_from" disabled value="{{$product->date_on_sale_from == null ? ' ' : getShamsiDate($product->date_on_sale_from) }}" type="text" class="form-control" />
            <div class="form-text text-danger">
                @error('date_on_sale_from')
                    {{ $message }}
                @enderror
            </div>
        </div>

        <div class="col-md-3">
            <label class="form-label">تاریخ پایان حراجی</label>
            <input data-jdp name="date_on_sale_to" disabled value="{{ $product->date_on_sale_to == null ? ' ' : getShamsiDate($product->date_on_sale_to)}}" type="text" class="form-control" />
            <div class="form-text text-danger">
                @error('date_on_sale_to')
                    {{ $message }}
                @enderror
            </div>
        </div>

        <div class="col-md-12">
            <label class="form-label">توضیحات</label>
            <textarea name="description" rows="5" disabled class="form-control">{{ $product->description }}</textarea>
            <div class="form-text text-danger">
                @error('description')
                    {{ $message }}
                @enderror
            </div>
        </div>

        <div class="col-md-12">
            @foreach($product->images as $image)
                <img width="200" height="200" class=" p-1 rounded"  src="{{ asset('/images/products/' . $image->image) }}" alt="">
            @endforeach

        </div>

        <div>
            <button type="submit" class="btn btn-outline-dark mt-3">
                ویرایش محصول
            </button>
        </div>
    </ی>
@endsection
