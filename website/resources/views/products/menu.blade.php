@extends('layout.master')
@section('title', 'product')

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
                    <div class="col-sm-6 col-lg-4">
                        <div class="box">
                            <div>
                                <div class="img-box">
                                    <img class="img-fluid" src="./images/b1.jpg" alt="" />
                                </div>
                                <div class="detail-box">
                                    <h5>
                                        برگر مخصوص
                                    </h5>
                                    <p>
                                        لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده
                                        از
                                        طراحان
                                        گرافیک است.
                                    </p>
                                    <div class="options">
                                        <h6>
                                            <del>95,000</del>
                                            <span>
                                                <span class="text-danger">(16%)</span>
                                                80,000
                                                <span>تومان</span>
                                            </span>
                                        </h6>
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
                    <div class="col-sm-6 col-lg-4">
                        <div class="box">
                            <div>
                                <div class="img-box">
                                    <img class="img-fluid" src="./images/p3.jpg" alt="" />
                                </div>
                                <div class="detail-box">
                                    <h5>
                                        پیتزا سرآشپز
                                    </h5>
                                    <p>
                                        لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده
                                        از
                                        طراحان
                                        گرافیک است.
                                    </p>
                                    <div class="options">
                                        <h6>
                                            300,000
                                            <span>تومان</span>
                                        </h6>
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
                    <div class="col-sm-6 col-lg-4">
                        <div class="box">
                            <div>
                                <div class="img-box">
                                    <img class="img-fluid" src="./images/p1.jpg" alt="" />
                                </div>
                                <div class="detail-box">
                                    <h5>
                                        پیتزا مخصوص خانواده
                                    </h5>
                                    <p>
                                        لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده
                                        از
                                        طراحان
                                        گرافیک است.
                                    </p>
                                    <div class="options">
                                        <h6>
                                            <del>450,000</del>
                                            <span>
                                                <span class="text-danger">(20%)</span>
                                                360,000
                                                <span>تومان</span>
                                            </span>
                                        </h6>
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
                    <div class="col-sm-6 col-lg-4">
                        <div class="box">
                            <div>
                                <div class="img-box">
                                    <img class="img-fluid" src="./images/b2.jpg" alt="" />
                                </div>
                                <div class="detail-box">
                                    <h5>
                                        چیز برگر
                                    </h5>
                                    <p>
                                        لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده
                                        از
                                        طراحان
                                        گرافیک است.
                                    </p>
                                    <div class="options">
                                        <h6>
                                            110,000
                                            <span>تومان</span>
                                        </h6>
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
                    <div class="col-sm-6 col-lg-4">
                        <div class="box">
                            <div>
                                <div class="img-box">
                                    <img class="img-fluid" src="./images/s1.jpg" alt="" />
                                </div>
                                <div class="detail-box">
                                    <h5>
                                        سالاد فصل
                                    </h5>
                                    <p>
                                        لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده
                                        از
                                        طراحان
                                        گرافیک است.
                                    </p>
                                    <div class="options">
                                        <h6>
                                            34,000
                                            <span>تومان</span>
                                        </h6>
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
                    <div class="col-sm-6 col-lg-4">
                        <div class="box">
                            <div>
                                <div class="img-box">
                                    <img class="img-fluid" src="./images/d2.jpg" alt="" />
                                </div>
                                <div class="detail-box">
                                    <h5>
                                        نوشابه قوطی
                                    </h5>
                                    <p>
                                        لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده
                                        از
                                        طراحان
                                        گرافیک است.
                                    </p>
                                    <div class="options">
                                        <h6>
                                            20,000
                                            <span>تومان</span>
                                        </h6>
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
                    <div class="col-sm-6 col-lg-4">
                        <div class="box">
                            <div>
                                <div class="img-box">
                                    <img class="img-fluid" src="./images/s2.jpg" alt="" />
                                </div>
                                <div class="detail-box">
                                    <h5>
                                        سالاد کلم
                                    </h5>
                                    <p>
                                        لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده
                                        از
                                        طراحان
                                        گرافیک است.
                                    </p>
                                    <div class="options">
                                        <h6>
                                            44,000
                                            <span>تومان</span>
                                        </h6>
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
                    <div class="col-sm-6 col-lg-4">
                        <div class="box">
                            <div>
                                <div class="img-box">
                                    <img class="img-fluid" src="./images/b3.jpg" alt="" />
                                </div>
                                <div class="detail-box">
                                    <h5>
                                        رویال برگر
                                    </h5>
                                    <p>
                                        لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده
                                        از
                                        طراحان
                                        گرافیک است.
                                    </p>
                                    <div class="options">
                                        <h6>
                                            121,000
                                            <span>تومان</span>
                                        </h6>
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
                    <div class="col-sm-6 col-lg-4">
                        <div class="box">
                            <div>
                                <div class="img-box">
                                    <img class="img-fluid" src="./images/p3.jpg" alt="" />
                                </div>
                                <div class="detail-box">
                                    <h5>
                                        پیتزا مخصوص 1 نفره
                                    </h5>
                                    <p>
                                        لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده
                                        از
                                        طراحان
                                        گرافیک است.
                                    </p>
                                    <div class="options">
                                        <h6>
                                            200,000
                                            <span>تومان</span>
                                        </h6>
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
                </div>
                <nav class="d-flex justify-content-center mt-5">
                    <ul class="pagination">
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</section>

<!-- end food section -->

@endsection
