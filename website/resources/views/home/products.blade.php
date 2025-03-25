@php
use App\Models\Product;

$bergers = Product::where('category_id' , 9)->take(3)->get();
$pizzas = Product::where('category_id' , 10)->take(3)->get();
$salads = Product::where('category_id' , 11)->take(3)->get();

@endphp

<section class="food_section layout_padding-bottom">
    <div class="container" x-data="{ tab: 1 }">
        <div class="heading_container heading_center">
            <h2>
                منو محصولات
            </h2>
        </div>

        <ul class="filters_menu">
            <li :class="tab === 1 ? 'active' : ''" @click="tab = 1">برگر</li>
            <li :class="tab === 2 ? 'active' : ''" @click="tab = 2">پیتزا</li>
            <li :class="tab === 3 ? 'active' : ''" @click="tab = 3">پیش غذا و سالاد</li>
        </ul>



        <div class="filters-content">
            <div x-show="tab === 1">
                <div class="row grid">

                    @foreach($bergers as $berger)
                    <div class="col-sm-6 col-lg-4">
                        <div class="box">
                            <div>
                                <div class="img-box">
                                    <img class="img-fluid" src="{{ asset(imageUrl($berger->primary_image)) }}" alt="">
                                </div>
                                <div class="detail-box">
                                    <h5>
                                        {{ $berger->name }}
                                    </h5>
                                    <p>
                                        {{ $berger->description }}
                                    </p>
                                    <div class="options">
                                        @if($berger->is_sale)
                                        <h6>
                                            <del>{{ number_format($berger->price) }}</del>
                                            <span>
                                                <span class="text-danger">(%{{ calculateDiscount((int)$berger->price, (int)$berger->sale_price) }})</span>
                                                {{ number_format($berger->sale_price) }}
                                                <span>تومان</span>
                                            </span>
                                        </h6>
                                        @else
                                        <h6>
                                            <span>
                                                {{ number_format($berger->price) }}
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
            </div>

            <div x-show="tab === 2">
                <div class="row grid">
                    @foreach($pizzas as $pizza)
                    <div class="col-sm-6 col-lg-4">
                        <div class="box">
                            <div>
                                <div class="img-box">
                                    <img class="img-fluid" src="{{ asset(imageUrl($pizza->primary_image)) }}" alt="">
                                </div>
                                <div class="detail-box">
                                    <h5>
                                        {{ $pizza->name }}
                                    </h5>
                                    <p>
                                        {{ $pizza->description }}
                                    </p>
                                    <div class="options">
                                        @if($pizza->is_sale)
                                        <h6>
                                            <del>{{ number_format($pizza->price) }}</del>
                                            <span>
                                                <span class="text-danger">(%{{ calculateDiscount((int)$pizza->price, (int)$pizza->sale_price) }})</span>
                                                {{ number_format($pizza->sale_price) }}
                                                <span>تومان</span>
                                            </span>
                                        </h6>
                                        @else
                                        <h6>
                                            <span>
                                                {{ number_format($pizza->price) }}
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
            </div>

            <div x-show="tab === 3">
                <div class="row grid">
                    @foreach($salads as $salad)
                    <div class="col-sm-6 col-lg-4">
                        <div class="box">
                            <div>
                                <div class="img-box">
                                    <img class="img-fluid" src="{{ asset(imageUrl($salad->primary_image)) }}" alt="">
                                </div>
                                <div class="detail-box">
                                    <h5>
                                        {{ $salad->name }}
                                    </h5>
                                    <p>
                                        {{ $salad->description }}
                                    </p>
                                    <div class="options">
                                        @if($salad->is_sale)
                                        <h6>
                                            <del>{{ number_format($salad->price) }}</del>
                                            <span>
                                                <span class="text-danger">(%{{ calculateDiscount((int)$salad->price, (int)$salad->sale_price) }})</span>
                                                {{ number_format($salad->sale_price) }}
                                                <span>تومان</span>
                                            </span>
                                        </h6>
                                        @else
                                        <h6>
                                            <span>
                                                {{ number_format($salad->price) }}
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
            </div>

        </div>

        <div class="btn-box">
            <a href="">
                مشاهده بیشتر
            </a>
        </div>
    </div>
</section>
