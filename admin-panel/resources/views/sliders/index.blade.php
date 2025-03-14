@extends('layout.master')
@section('title', 'Slider Create')


@section('content')

                <div class="d-flex justify-content-between align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h4 class="fw-bold">محصولات</h4>
                    <a href="{{ route('slider.create') }}" class="btn btn-sm btn-primary">ایجاد محصول</a>
                </div>

                <div class="table-responsive">
                    <table class="table align-middle">
                        <thead>
                            <tr>
                                <th>عنوان</th>
                                <th>متن</th>
                                <th>لینک</th>
                                <th>آدرس لینک</th>
                                <th>عملیات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach( $sliders as $slider)
                                <tr>

                                    <td>{{ $slider->title }}</td>
                                    <td>{{ $slider->body }}</td>
                                    <td>{{ $slider->link_title }}</td>
                                    <td class="dir-ltr">{{ $slider->link_address }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="{{ route('slider.edit', ['slider' => $slider->id]) }}" class="btn btn-sm btn-outline-info me-2">ویرایش</a>
                                            <button class="btn btn-sm btn-danger">حذف</button>
                                        </div>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>


@endsection


<tbody>
