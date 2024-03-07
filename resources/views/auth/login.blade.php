<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Login</title>
</head>

<body>
    <div class="container mt-5">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-sm-10 col-md-8 col-lg-6 col-xl-5 col-xxl-4">
                <div class="card">
                    <div class="card-body p-4 p-sm-5">
                        <div class="row d-flex justify-content-between">
                            <div class="col-auto">
                                <h5>Login</h5>
                            </div>
                            <div class="col-auto fs--1 text-600">
                                <span class="mb-0 undefined">
                                    Or
                                </span>
                                <span>
                                    <a href="{{ route('registration') }}">Create an account</a>
                                </span>
                            </div>
                        </div>
                        <form class="mt-3" action="{{ route('login-user') }}" method="post">
                            {{-- Success Message --}}
                            @if (Session::has('success'))
                                <div class="alert alert-success" role="alert">{{ Session::get('success') }}</div>
                            @endif

                            {{-- Failed Message --}}
                            @if (Session::has('fail'))
                                <div class="alert alert-danger" role="alert">{{ Session::get('fail') }}</div>
                            @endif

                            @csrf

                            <div class="mb-3">
                                <input class="form-control" type="email" autocomplete="on" placeholder="Email address"
                                    name="email" value="{{ old('email') }}" />
                                <span class="text-danger">
                                    @error('email')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <div class="mb-3">
                                <input class="form-control" type="password" autocomplete="on" placeholder="Password"
                                    name="password" value="{{ old('password') }}" />
                                <span class="text-danger">
                                    @error('password')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="basic-register-checkbox" />
                                <label class="form-label" for="basic-register-checkbox">
                                    I accept the
                                    <a href="#!">terms </a>and <a href="#!">privacy policy</a>
                                </label>
                            </div>

                            <div class="mb-3">
                                <button class="btn btn-primary d-block w-100 mt-3" type="submit"
                                    name="submit">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
