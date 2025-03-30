@extends('layout.master')


@section('link')
<meta name="csrf-token" content="{{ csrf_token() }}">

@endsection
@section('title', 'ورود')
@section('script')
<script script script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js">
</script>
<script type="text/javascript">
    function sleep(ms) {
        return new Promise(resolve => setTimeout(resolve, ms))
    }
    document.addEventListener('alpine:init', () => {
        Alpine.data('loginForm', () => ({
            cellphone: '',
            error: '',
            loading: false,

            async login() {
                this.loading = true;
                await sleep(1000)
                console.log('hi');
                const res = await fetch('http://127.0.0.1:8000/login', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                    },
                    body: JSON.stringify({
                        '_token': '{{ csrf_token() }}',
                        'cellphone': this.cellphone
                    })
                });
                const data = await res.json();
                this.loading = false;
                if (res.ok) {
                    this.error = ' '
                    console.log(data);

                } else {
                    this.error = data.message;
                }
            }
        }))
    })
</script>
@endsection

@section('content')


<!-- login section -->
<section class="auth_section book_section">
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-4 offset-md-4">
                <div class="card" x-data="loginForm">
                    <div class="card-body">
                        <div class="form_container">
                            <div>
                                <div class="mb-3">
                                    <label class="form-label">شماره موبایل</label>
                                    <input x-model="cellphone" name="phone" type="text" class="form-control mb-2" />
                                    <div class="form-text text-danger" x-text='error'> </div>
                                </div>
                                <button @click="login()" type="submit" class="btn btn-primary btn-auth">
                                    ورود
                                    <div x-show="loading" class="spinner-border spinner-border-sm ms-2"></div>
                                </button>
                                </d>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
<!-- end login section -->
@endsection