<x-layout>
    <!-- Section: Design Block -->
    <section class="text-left "
        style="
            /* background-image: url('https://mdbootstrap.com/img/new/textures/full/171.jpg'); */
            
            background: #FFFFFF;
            background: -webkit-linear-gradient(bottom, #FFFFFF, #363C3D);
            background: -moz-linear-gradient(bottom, #FFFFFF, #363C3D);
            background: linear-gradient(to top, #FFFFFF, #363C3D);
    ">
        <!-- Background image -->
        <div class="p-5 bg-image" style=" height: 300px;">
        </div>
        <!-- Background image -->

        {{-- <div class="card mx-4 mx-md-5 shadow-5-strong bg-white col lg:w-3/5 md:w-50 sm:w-fit pt-4 pb-4" --}}
        <div class="card sm:mx-5 lg:mx-32 xl:mx-72 2xl:mx-96 shadow-5-strong"
            style="
          margin-top: -250px;
          backdrop-filter: blur(30px);
          ">
            <div class="card-body px-md-5 py-md-5">

                <x-card class="bg-white rounded mx-auto outline outline-1 outline-offset-2">
                    <header class="text-center pb-2">
                        <h2 class="text-2xl mb-2 font-bold uppercase mb-1">
                            Edit User
                        </h2>
                        <div class="relative mb-4">
                            <div class="absolute inset-0 flex items-center">
                                <div class="w-full border-b border-gray-300"></div>
                            </div>
                            <div class="relative flex justify-center">
                                <span class="bg-white px-4 text-sm text-gray-500">{{ $user->name }}</span>
                            </div>
                        </div>
                    </header>

                    <form method="POST" action="/users/{{ $user->id }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Name input -->
                        <div class="form-outline mb-4">
                            <input type="text" class="form-control" name="name" value="{{ $user->name }}" />
                            @error('name')
                                <p class="text-red-500 text-xs ">{{ $message }}</p>
                            @enderror
                            <label class="form-label" for="name"><i class="fa fa-user"></i> Name</label>
                        </div>

                        <!-- Job Title input -->
                        <div class="form-outline mb-4">
                            <input type="text" class="form-control" name="jobtitle" value="{{ $user->jobtitle }}" />
                            @error('jobtitle')
                                <p class="text-red-500 text-xs ">{{ $message }}</p>
                            @enderror
                            <label class="form-label" for="jobtitle">Job Title</label>
                        </div>

                        @php
                            function displayRole($roles)
                            {
                                if ($roles == 2) {
                                        return 'Admin';
                                    } elseif ($roles == 1) {
                                        return 'Editor';
                                    } else {
                                        return 'User';
                                    }
                            }
                        @endphp

                        <div class="form-outline mb-4">
                            <select name="role" class="border border-gray-200 rounded p-2 w-full" >
                                <option class="text-muted" selected disabled>Role</option>
                                <option value="2" {{ $user->role == "Admin" ? "selected" : "" }} >Admin</option>
                                <option value="1" {{ $user->role == "Editor" ? "selected" : "" }}>Editor</option>
                                <option value="0" {{ $user->role == "User" ? "selected" : "" }} >User</option>
                            </select>
                            @error('role')
                                <p class="text-red-500 text-xs ">{{ $message }}</p>
                            @enderror
                        </div>



                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <input type="text" class="form-control border border-grey-light" name="email"
                                value="{{ $user->email }}" />
                            @error('email')
                                <p class="text-red-500 text-xs ">{{ $message }}</p>
                            @enderror
                            <label class="form-label" for="form3Example1"><i class="fa fa-envelope"></i> Email</label>
                        </div>

                        <!-- Submit button -->
                        <div class="flex mb-4 gap-x-4 justify-center">
                            <a type="submit" class=" pr-4">
                                <button class="btn btn-laravel text-white bg-laravel">
                                    Update User
                                </button></a>
                            <a href="/reports/manage" class="btn btn-danger bg-danger text-white "><i
                                    class="fa-solid fa-arrow-left"></i>
                                Cancel
                            </a>
                        </div>
                    </form>
                </x-card>
            </div>
        </div>
    </section>
    <!-- Section: Design Block -->
</x-layout>
