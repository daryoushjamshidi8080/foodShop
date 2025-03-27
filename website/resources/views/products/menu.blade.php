@extends('layout.master')
@section('title', 'منو')

@section('script')
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
@endsection

@section('script')
<script type="text/javascript">
    document.addEventListener('alpine:init', () => {
        Alpine.data('imageViewer', () => ({
            imageUrl: '',

            fileChosen(event) {
                if (event.target.files.length == 0) return;

                let file = event.target.files[0];
                let reader = new FileReader()

                reader.readAsDataURL(file)
                reader.onload = e => this.imageUrl = e.target.result
            }
        }))
    });

    jalaliDatepicker.startWatch({
        time: true
    });
</script>
@endsection
@section('content')

<!-- food section -->

<section class="food_section layout_padding">
    <div class="container">
        <div class="row">
            <div x-data="filter" class="col-sm-12 col-lg-3">
                <div>
                    <label class="form-label">جستجو
                        @if(request()->has('search'))
                        <i @click="removeFliter('search')" class="bi bi-x text-danger fs-5 cursor-pointer"></i>
                        @endif
                    </label>
                    <div class="input-group mb-3">
                        <input type="text" x-model="search" class="form-control" placeholder="نام محصول ..." />
                        <button @click="filter('search', search)" class="input-group-text">
                            <i class="bi bi-search"></i>
                        </button>
                    </div>
                </div>
                <hr />
                <div class="filter-list">
                    <div class="form-label">
                        دسته بندی

                        @if (request()->query('category'))
                        <i @click="removeFliter('category')" class="bi bi-x text-danger fs-5 cursor-pointer"></i>
                        @endif
                    </div>
                    <ul>
                        @foreach($categories as $category)
                        <li @click="filter('category','{{ $category->id }}')" class="cursor-pointer my-2
                        {{ request()->has('category') &&  request()->category == $category->id  ? 'filter-list-active' : ''}}
                        ">
                            {{ $category->name }}
                        </li>
                        @endforeach

                    </ul>
                </div>
                <hr />
                <div>
                    <label class=" form-label">مرتب سازی
                        @if(request()->has('sortBy'))
                        <i @click="removeFliter('sortBy')" class="bi bi-x text-danger fs-5 cursor-pointer"></i>
                        @endif

                    </label>
                    <div class="form-check my-2">
                        <input @change="filter('sortBy', 'max')" class="form-check-input" type="radio" name="flexRadioDefault" {{ request()->has('sortBy') && request()->query('sortBy') == 'max' ? 'checked' : '' }} />
                        <label class="form-check-label cursor-pointer">
                            بیشترین قیمت
                        </label>
                    </div>
                    <div class="form-check my-2">
                        <input @change="filter('sortBy', 'min')" class="form-check-input" type="radio" name="flexRadioDefault" {{ request()->has('sortBy') && request()->query('sortBy') == 'min' ? 'checked' : '' }} />
                        <label class="form-check-label cursor-pointer">
                            کمترین قیمت
                        </label>
                    </div>
                    <div class="form-check my-2">
                        <input @change="filter('sortBy', 'bestsaller')" class="form-check-input" type="radio" name="flexRadioDefault" {{ request()->has('sortBy') && request()->query('sortBy') == 'bestsaller' ? 'checked' : '' }} />
                        <label class="form-check-label cursor-pointer">
                            پرفروش ترین
                        </label>
                    </div>
                    <div @change="filter('sortBy', 'sale')" class="form-check my-2">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" {{ request()->has('sortBy') && request()->query('sortBy') == 'sale' ? 'checked' : '' }} />
                        <label class="form-check-label cursor-pointer">
                            با تخفیف
                        </label>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 col-lg-9">
                <div class="row gx-3">
                    @if($products->isEmpty())
                    <div class="d-flex justify-content-center align-items-center h-100">
                        <h5>محصولی یافت نشد</h5>
                    </div>
                    @endif

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
                        {{ $products->withQueryString()->links('layout.paginate') }}
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</section>

<!-- end food section -->

@endsection
