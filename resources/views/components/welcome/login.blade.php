<div class="modal fade text-black" id="loginModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog col-11 col-md-4">

        <div class="modal-content" style="background-color: #aef0ff;">

            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Iniciar Sesión</h5>
                <button type="button" class="btn-close  btn-close-black" data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>

            <div class="modal-body">

                <!-- Inicio -->

                <form method="POST" id="loginForm">
                    @csrf

                    <div class="form-group row mt-5">
                        <label for="emailInputLogin"
                               class="col-md-4 col-form-label text-md-right">{{ __('Correo') }}</label>

                        <div class="col-md-6">
                            <input id="emailInputLogin" type="email" class="custom-form form-control" name="email"
                                   value="{{ old('email') }}" required autocomplete="email">

                            <span class="invalid-feedback" role="alert" id="emailErrorLogin">
                                <strong></strong>
                            </span>

                        </div>
                    </div>

                    <div class="form-group row mt-3">
                        <label for="password"
                               class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>
                        <div class="col-md-6">
                            <input id="password" type="password"
                                   class="custom-form form-control" name="password" required
                                   autocomplete="current-password">
                            <span id="invalid-feedback-login" class="invalid-feedback" role="alert">
                                <strong></strong>
                            </span>

                        </div>
                    </div>

                    <div class="form-group row mb-0 mt-5">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-warning">
                                {{ __('Ingresar') }}
                            </button>
                        </div>
                    </div>

                </form>

                <!-- Fin -->
            </div>
        </div>
    </div>
</div>

@section('loginScript')

    <script>
        $(function () {
            $('#loginForm').submit(function (e) {
                e.preventDefault();
                let formData = $(this).serializeArray();
                $("#loginForm input").removeClass("is-invalid");
                $("#invalid-feedback-login").children("strong").text("");
                $.ajax({
                    method: "POST",
                    headers: {
                        Accept: "application/json"
                    },
                    url: "{{ route('login') }}",
                    data: formData,
                    success: () => window.location.assign("{{ route('home') }}"),
                    error: (response) => {
                        if (response.status === 422) {
                            let errors = response.responseJSON.errors;
                            Object.keys(errors).forEach(function (key) {
                                $("#" + key + "InputLogin").addClass("is-invalid");
                                $("#" + key + "ErrorLogin").children("strong").text(errors[key][0]);
                            });
                        } else {
                            window.location.reload();
                        }
                    }
                })
            });
        })

    </script>

@endsection
