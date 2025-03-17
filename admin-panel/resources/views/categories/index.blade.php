@extends('layout.master')
@section('title', 'Category')


@section('content')

<div class="d-flex justify-content-between align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h4 class="fw-bold">دسته بندی</h4>
    <a href="{{ route('category.create') }}" class="btn btn-sm btn-primary">ایجاد دسته بندی</a>
</div>

<div class="table-responsive">
    <table class="table align-middle">
        <thead>
            <tr>
                <th>نام</th>
                <th>وضعیت</th>
                <th>عملیات</th>
            </tr>
        </thead>
        <tbody>
            @foreach( $categories as $category)
                <tr>

                    <td>{{ $category->name }}</td>
                    <td>{{ $category->status ? 'فعال' : 'غیرفعال' }}</td>
                    <td>
                        <div class="d-flex">
                            <a href="{{ route('category.edit', ['category' => $category->id]) }}" style="height:32px;" class="btn btn-sm btn-outline-info me-2" >ویرایش</a>
                            <form method="POST" action="{{ route('category.destroy' , ['category' => $category->id]) }}">
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
