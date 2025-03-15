@extends('layout.master')
@section('title', 'Slider Create')


@section('content')

                <div class="d-flex justify-content-between align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h4 class="fw-bold">درباره ما   </h4>
                </div>

                <div class="table-responsive">
                    <table class="table align-middle">
                        <thead>
                            <tr>
                                <th>عنوان</th>
                                <th>متن</th>
                                <th>آدرس لینک</th>
                                <th>عملیات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($about)
                                <tr>
                                    <td>{{ $about->title }}</td>
                                    <td>{{ $about->body }}</td>
                                    <td class="dir-ltr"> &nbsp;{{ $about->link }}</td>

                                    <td><a href="{{ route('about.edit', ['about' => $about->id]) }}" style="height:32px;" class="btn btn-sm btn-outline-info me-2" >ویرایش</a></td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>


@endsection


<tbody>
