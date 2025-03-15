@extends('layout.master')
@section('title', 'Feature Create')


@section('content')

                <div class="d-flex justify-content-between align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h4 class="fw-bold">ویژگی ها</h4>
                    <a href="{{ route('feature.create') }}" class="btn btn-sm btn-primary">ایجاد ویژگی</a>
                </div>

                <div class="table-responsive">
                    <table class="table align-middle">
                        <thead>
                            <tr>
                                <th>عنوان</th>
                                <th>متن</th>
                                <th>آیکون</th>
                                <th>عملیات</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach( $features as $feature)
                                <tr>
                                    <td>{{ $feature->title }}</td>
                                    <td>{{ $feature->body }}</td>
                                    <td>{{ $feature->icone }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="{{ route('feature.edit', ['feature' => $feature->id]) }}" style="height:32px;" class="btn btn-sm btn-outline-info me-2" >ویرایش</a>
                                            <form method="POST" action="{{ route('feature.destroy' , ['feature' => $feature->id]) }}">
                                                @csrf
                                                @method("DELETE")
                                                <button class="btn btn-sm btn-danger">حذف</button>
                                            </form>
                                        </div>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>


@endsection


<tbody>
