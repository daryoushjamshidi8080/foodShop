@extends('layout.master')
@section('title', 'منو')

@section('content')

<!-- food section -->

<section class="food_section layout_padding">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-3">
                <div>
                    <label class="form-label">جستجو</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="نام محصول ..." />
                        <button class="input-group-text">
                            <i class="bi bi-search"></i>
                        </button>
                    </div>
                </div>
                <hr />
                <div class="filter-list">
                    <div class="form-label">
                        دسته بندی
                    </div>
                    <ul>
                        <li class="my-2 cursor-pointer filter-list-active">پیتزا</li>
                        <li class="my-2 cursor-pointer">برگر</li>
                        <li class="my-2 cursor-pointer">پیش غذا و سالاد</li>
                        <li class="my-2 cursor-pointer">نوشیدنی</li>
                    </ul>
                </div>
                <hr />
                <div>
                    <label class="form-label">مرتب سازی</label>
                    <div class="form-check my-2">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" />
                        <label class="form-check-label cursor-pointer">
                            بیشترین قیمت
                        </label>
                    </div>
                    <div class="form-check my-2">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" checked />
                        <label class="form-check-label cursor-pointer">
                            کمترین قیمت
                        </label>
                    </div>
                    <div class="form-check my-2">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" />
                        <label class="form-check-label cursor-pointer">
                            پرفروش ترین
                        </label>
                    </div>
                    <div class="form-check my-2">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" />
                        <label class="form-check-label cursor-pointer">
                            با تخفیف
                        </label>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 col-lg-9">
                <div class="row gx-3">

                    @foreach($products as $product)
                    <div class="col-sm-6 col-lg-4">
                        <div class="box">
                            <div>
                                <div class="img-box">
                                    <img class="img-fluid" src="{{ imageUrl($product->primary_image) }}" alt="" />
                                </div>
                                <div class="detail-box">
                                    <h5>
                                        <a href="{{ route('product.show', ['product' => $product->slug]) }}">
                                            {{ $product->name }}
                                        </a>
                                    </h5>
                                    <p>
                                        {{ $product->description }}
                                    </p>
                                    <div class="options">
                                        @if($product->is_sale)
                                        <h6>
                                            <del>{{ number_format($product->price) }}</del>
                                            <span>
                                                <span class="text-danger">(%{{ calculateDiscount((int)$product->price, (int)$product->sale_price) }})</span>
                                                {{ number_format($product->sale_price) }}
                                                <span>تومان</span>
                                            </span>
                                        </h6>
                                        @else

                                        <h6>
                                            <span>
                                                {{ number_format($product->price) }}
                                                <span>تومان</span>
                                            </span>
                                        </h6>

                                        @endif
                                        <div class="d-flex">
                                            <a class="me-2" href="">
                                                <i class="bi bi-cart-fill text-white fs-6"></i>
                                            </a>
                                            <a href="">
                                                <i class="bi bi-heart-fill  text-white fs-6"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach


                </div>
                <nav class="d-flex justify-content-center mt-5">
                    <ul class="pagination">
                        {{ $products->links('layout.paginate') }}
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</section>

<!-- end food section -->

@endsection
