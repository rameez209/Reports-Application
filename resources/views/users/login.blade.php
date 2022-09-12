<x-layout class="text-center flex">

    <!-- Section: Design Block -->
    <section class="text-center justify-center"
        style="
            /* background-image: url('https://mdbootstrap.com/img/new/textures/full/171.jpg'); */
            background: #FFFFFF;
            background: -webkit-linear-gradient(bottom, #FFFFFF, #363C3D);
            background: -moz-linear-gradient(bottom, #FFFFFF, #363C3D);
            background: linear-gradient(to top, #FFFFFF, #363C3D);
            margin: 0, auto;
    ">
        <!-- Background image -->
        <div class="p-5 bg-image" style=" height: 300px; ">
        </div>

        <div class="card sm:mx-5 lg:mx-32 xl:mx-72 2xl:mx-96 shadow-5-strong flex"
            style="
          margin-top: -100px;
          background: hsla(0, 0%, 100%, 0.8);
          backdrop-filter: blur(30px);
          ">
            <div class="card-body py-5 px-md-8 ">

                <div class="row d-flex justify-content-center">
                    <div class="col-lg-8">
                        <h2 class="text-2xl font-bold uppercase mb-1">
                            Login
                        </h2>
                        <p class="mb-4">Login to your account to add report</p>
                        <form method="POST" action="/users/authenticate">
                            @csrf

                            <!-- Email input -->
                            <div class="mb-4">
                                <div class="form-outline ">
                                    <input type="email" class="form-control" name="email"
                                        value="{{ old('email') }}" />
                                    <label for="email" class="form-label"><i class="fas fa-user"></i> Email</label>
                                </div>
                                @error('email')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Password input -->
                            <div class="mb-4">
                                <div class="form-outline mb-4">
                                    <input type="password" id="form3Example4" class="form-control" name="password" />
                                    <label class="form-label" for="form3Example4"><i class="fas fa-lock"></i>
                                        Password</label>
                                    @error('password')
                                        <p class="text-red-500 text-xs">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <!-- Register -->
                            <div class="form-check d-flex justify-center mb-4">
                                <p>
                                    Don't have an account?
                                    <a href="/register" class="text-laravel">Register</a>
                                </p>
                                {{-- Forgot Password? --}}
                                {{-- <p>
                                    <a href="{{ url('/forgot_password') }}" class="text-laravel">Reset Password</a>
                                </p> --}}


                            </div>

                            <!-- Submit button -->
                            <button type="submit" class="btn btn-laravel text-white bg-laravel btn-block mb-4">
                                Sign In
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="text-left">
            <small class="text-sidenavcolor">Copyright &copy; <?php echo date('Y'); ?> Engine Dome</small>
        </div> --}}
    </section>
    <!-- Section: Design Block -->
</x-layout>
