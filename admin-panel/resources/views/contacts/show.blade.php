

@extends('layout.master')
@section('title', 'message edit')


@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h4 class="fw-bold">نمایش پیام های ارتباط با ما</h4>
</div>

<form class="row gy-4">
    <div class="col-md-6">
        <label class="form-label">اسم</label>
        <input disabled value="{{ $message->name }}" type="text" class="form-control" />
    </div>
    <div class="col-md-6">
        <label class="form-label">آدرس ایمیل</label>
        <input disabled value="{{ $message->email }}" type="text" class="form-control" />
    </div>
    <div class="col-md-12">
        <label class="form-label">موضوع</label>
        <input disabled value="{{ $message->subject }}" type="text" class="form-control" />
    </div>
    <div class="col-md-12">
        <label class="form-label">متن</label>
        <textarea disabled class="form-control" rows="3">{{ $message->body }}</textarea>
    </div>
</form>
@endsection

