@extends('layout.master')
@section('title', 'Feature Create')


@section('content')

                <div class="d-flex justify-content-between align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h4 class="fw-bold">پیام های ارتباط با ما</h4>
                </div>

                <div class="table-responsive">
                    <table class="table align-middle">
                        <thead>
                            <tr>
                                <th>اسم</th>
                                <th>ایمیل</th>
                                <th>موضوع</th>

                                <th>عملیات</th>

                            </tr>
                        </thead>
                        <tbody>

                            @foreach( $messages as $message)
                                <tr>
                                    <td>{{ $message->name }}</td>
                                    <td>{{ $message->email }}</td>
                                    <td>{{ Str::limit($message->subject, 50, '...') }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="{{ route('contact.show', ['message' => $message->id]) }}" style="height:32px;" class="btn btn-sm btn-outline-info me-2" >نمایش</a>
                                            <form method="POST" action="{{ route('contact.destroy' , ['message' => $message->id]) }}">
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
