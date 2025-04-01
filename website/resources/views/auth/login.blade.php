@extends('layout.master')


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
            otp: '',
            error: '',
            loginToken: '',
            loading: false,
            loadingResend: false,
            checkOtpForm: false,

            seconds: 5,
            minutes: 0,

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
                    this.timer();
                    this.checkOtpForm = true;
                    console.log(data)
                    this.error = ' '
                    this.loginToken = data.loginToken;



                } else {
                    console.log(data)
                    console.log('my error')
                    this.error = data.error;
                }
            },


            async checkOtp() {
                this.loading = true;
                await sleep(1000)
                const res = await fetch('http://127.0.0.1:8000/check-otp', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                    },
                    body: JSON.stringify({
                        '_token': '{{ csrf_token() }}',
                        'otp': this.otp,
                        'login_token': this.loginToken
                    })
                });
                const data = await res.json();
                this.loading = false;
                if (res.ok) {
                    this.checkOtpForm = true;
                    this.error = ' '
                    this.loginToken = data.loginToken;
                    document.location.href = "{{ route('home.index') }}"



                } else {
                    console.log(data)
                    console.log('my error')
                    this.error = data.message;
                }
            },

            async resendOtp() {
                this.loadingResend = true;
                await sleep(1000)
                const res = await fetch('http://127.0.0.1:8000/resend-otp', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                    },
                    body: JSON.stringify({
                        '_token': '{{ csrf_token() }}',
                        'otp': this.otp,
                        'login_token': this.loginToken
                    })
                });
                const data = await res.json();
                this.loadingResend = false;
                this.timer();
                if (res.ok) {
                    this.seconds = 15;
                    this.minutes = 0;
                    this.timer()
                    this.checkOtpForm = true;
                    this.error = ' '
                    this.loginToken = data.loginToken;
                } else {
                    console.log(data)
                    console.log('my error')
                    this.error = data.message;
                }
            },

            timer() {
                const interval = setInterval(() => {
                    if (this.seconds > 0) {
                        this.seconds = this.seconds - 1;
                    }

                    if (this.seconds === 0) {
                        if (this.minutes == 0) {
                            clearInterval(interval)
                        } else {
                            this.seconds = 59;
                            this.minutes = this.minutes - 1;
                        }
                    }
                }, 1000);
            },

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
                <div x-data="loginForm" class="card">
                    <div class="card-body">
                        <div class="form_container">

                            {{-- cellphone input --}}
                            <template x-if="!checkOtpForm">
                                <div>
                                    <div class="mb-3">
                                        <label class="form-label">شماره موبایل</label>
                                        <input type="text" x-model="cellphone" class="form-control mb-2" />
                                        <div class="form-text text-danger" x-text="error"></div>
                                    </div>
                                    <button @click="login()" type="submit" class="btn btn-primary btn-auth">ورود
                                        <div x-show="loading" class="spinner-border spinner-border-sm ms-2"></div>
                                    </button>
                                </div>
                            </template>

                            {{-- otp input --}}
                            <template x-if="checkOtpForm">
                                <div>
                                    <div class="mb-3">
                                        <label class="form-label">کد ورود</label>
                                        <input type="text" x-model="otp" class="form-control mb-2" />
                                        <div class="form-text text-danger" x-text="error"></div>
                                    </div>

                                    <div class="d-flex justify-content-between align-items-baseline">
                                        <button @click="checkOtp()" type="submit"
                                            class="btn btn-primary btn-auth">ارسال
                                            <div x-show="loading" class="spinner-border spinner-border-sm ms-2"></div>
                                        </button>


                                        <template x-if="seconds > 0 || minutes > 0">
                                            <div class="mb-1 me-3">
                                                <span x-text="seconds < 10 ? `0${seconds}` : seconds"></span>:
                                                <span x-text="minutes < 10 ? `0${minutes}` : minutes"></span>
                                            </div>
                                        </template>

                                        <template x-if="seconds == 0 && minutes == 0">
                                            <button @click="resendOtp" type="submit" class="btn btn-dark">ارسال دوباره
                                                <div x-show="loadingResend" class="spinner-border spinner-border-sm ms-2"></div>
                                            </button>
                                        </template>
                                    </div>

                                </div>
                            </template>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end login section -->
@endsection
