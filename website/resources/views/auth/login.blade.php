@extends('layout.master')

@section('title', 'ورود')
@section('script')
<script type="text/javascript">

</script>
@endsection

@section('content')


<!-- login section -->
<section class="auth_section book_section">
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-4 offset-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="form_container">
                            <form action="{{ route('auth.getPhone') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label">شماره موبایل</label>
                                    <input name="phone" type="text" class="form-control mb-2" />
                                </div>
                                <button type="submit" class="btn btn-primary btn-auth">ورود</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end login section -->
@endsection
