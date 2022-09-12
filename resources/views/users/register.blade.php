<x-layout>

    <!-- Section: Design Block -->
    <section class="text-center"
        style="
            /* background-image: url('https://mdbootstrap.com/img/new/textures/full/171.jpg'); */
            
            background: #FFFFFF;
            background: -webkit-linear-gradient(bottom, #FFFFFF, #363C3D);
            background: -moz-linear-gradient(bottom, #FFFFFF, #363C3D);
            background: linear-gradient(to top, #FFFFFF, #363C3D);
    ">
        <!-- Background image -->
        <div class="p-5 bg-image" style=" height: 300px; ">
        </div>
        <!-- Background image -->

        {{-- <div class="card mx-4 mx-md-5 shadow-5-strong" --}}
        <div class="card sm:mx-5 lg:mx-32 xl:mx-72 2xl:mx-96 shadow-5-strong flex"
            style="
          margin-top: -100px;
          background: hsla(0, 0%, 100%, 0.8);
          backdrop-filter: blur(30px);
          ">
            <div class="card-body py-5 px-md-4">

                <div class="row d-flex justify-content-center">
                    <div class="col-lg-8">
                        <h1 class="fw-bold uppercase text-2xl">Register</h1>
                        <p class="mb-5">Create an account to add report</p>
                        <form method="POST" action="/users">
                            @csrf

                            <!-- Name input -->
                            <div class="form-outline mb-4">
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}" />
                                @error('name')
                                    <p class="text-red-500 text-xs ">{{ $message }}</p>
                                @enderror
                                <label class="form-label" for="form3Example1">Name</label>
                            </div>

                            <!-- Email input -->
                            <div class="form-outline mb-4">
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}" />
                                <label for="email" class="form-label">Email</label>

                                @error('email')
                                    <p class="text-red-500 text-xs">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Password input -->
                            <!-- 2 column grid layout with password inputs for password and confirm password -->
                                    <div class="form-outline mb-4">
                                        <input type="password" id="form3Example4" class="form-control"
                                            name="password" />
                                        <label class="form-label" for="form3Example4">Password</label>
                                        @error('password')
                                            <p class="text-red-500 text-xs">{{ $message }}</p>
                                        @enderror
                                    </div>
                                {{-- Confirm Password --}}
                                    <div class="form-outline">
                                        <input type="password" id="form3Example5" class="form-control"
                                            name="password_confirmation" />
                                        <label class="form-label" for="password_confirmation">Confirm password</label>
                                        @error('password_confirmation')
                                            <p class="text-red-500 text-xs">{{ $message }}</p>
                                        @enderror
                                    </div>

                            <!-- Checkbox -->
                            <div class="form-check d-flex justify-content-center mb-4 mt-3">
                                {{-- <input class="form-check-input me-2" type="checkbox" value="" id="form2Example33" checked /> --}}
                                <p>
                                    Already have an account? <a href="/login" class="text-laravel">Login</a>
                                </p>
                            </div>

                            <!-- Submit button -->
                            <button type="submit" class="btn btn-laravel text-white bg-laravel btn-block mb-4">
                                Sign up
                            </button>

                            <!-- Register buttons -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Section: Design Block -->

    {{-- <x-card class="p-10 max-w-lg mx-auto mt-24">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">
                Register
            </h2>
            <p class="mb-4">Create an account to add report</p>
        </header>

        <form method="POST" action="/users">
            @csrf
            <div class="mb-6">
                <label for="name" class="inline-block text-lg mb-2">
                    Name
                </label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="name"
                    value="{{ old('name') }}" />

                @error('name')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="email" class="inline-block text-lg mb-2">Email</label>
                <input type="email" class="border border-gray-200 rounded p-2 w-full" name="email"
                    value="{{ old('email') }}" />

                @error('email')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="password" class="inline-block text-lg mb-2">
                    Password
                </label>
                <input type="password" class="border border-gray-200 rounded p-2 w-full" name="password" />

                @error('password')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror

            </div>

            <div class="mb-6">
                <label for="password_confirmation" class="inline-block text-lg mb-2">
                    Confirm Password
                </label>
                <input type="password" class="border border-gray-200 rounded p-2 w-full" name="password_confirmation" />
                @error('password_confirmation')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <button type="submit" class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                    Sign Up
                </button>
            </div>

            <div class="mt-8">
                <p>
                    Already have an account?
                    <a href="/login" class="text-laravel">Login</a>
                </p>
            </div>
        </form>
    </x-card> --}}
</x-layout>
