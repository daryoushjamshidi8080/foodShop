@extends('layout.master')
@section('title', 'Slider Create')


@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h4 class="fw-bold">ایجاد دسته بندی</h4>
</div>

<form method="POST" action="{{ route('category.store') }}" class="row gy-4">
@csrf
    <div class="col-md-6">
        <label class="form-label">نام</label>
        <input name="name" value="{{ old('name') }}" type="text" class="form-control" />
        <div  class="form-text text-danger"> @error('name')  {{ $message }} @enderror </div>
    </div>
    <div class="col-md-3">
        <label class="form-label">وضعیت</label>
        <select name="status" class="form-select">
            <option @selected(old('status', 1) == 1 ) value="1">فعال</option>
            <option @selected(old('status', 1) == 0 ) value="0">غیرفعال</option>
        </select>
        <div  class="form-text text-danger"> @error('status')  {{ $message }} @enderror </div>

    </div>

    <div>
        <button type="submit" class="btn btn-outline-dark mt-3">
            ایجاد دسته بندی
        </button>
    </div>
</form>
@endsection

