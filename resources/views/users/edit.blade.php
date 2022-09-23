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
                        <div class="relative ">
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
                            <input type="text" class="form-control" name="name" value="{{ $user->name }}"/>
                            @error('name')
                                <p class="text-red-500 text-xs ">{{ $message }}</p>
                            @enderror
                            <label class="form-label" for="name"><i class="fa fa-user"></i> Name</label>
                        </div>

                        <!-- Job Title input -->
                        <div class="form-outline mb-4">
                            <input type="text" class="form-control" name="jobtitle" value="{{ $user->jobtitle}}"/>
                            @error('jobtitle')
                                <p class="text-red-500 text-xs ">{{ $message }}</p>
                            @enderror
                            <label class="form-label" for="jobtitle">Job Title</label>
                        </div>

                        <div class="form-outline mb-4">
                            <input type="text" class="form-control" name="role" value="{{ $user->role}}" />
                            
                            @error('role')
                                <p class="text-red-500 text-xs ">{{ $message }}</p>
                            @enderror
                        </div>


                        <!-- Email input -->
                        {{-- <div class="form-outline mb-4">
                            <input type="text" class="form-control border border-grey-light" name="email"
                            value="{{ $user->email}}" />
                            @error('email')
                                <p class="text-red-500 text-xs ">{{ $message }}</p>
                            @enderror
                            <label class="form-label" for="form3Example1"><i class="fa fa-envelope"></i> Email</label>
                        </div> --}}

                        {{-- <div class="form-outline mb-4">
                            <input type="text" class="form-control border border-grey-light" name="password" />
                            @error('password')
                                <p class="text-red-500 text-xs ">{{ $message }}</p>
                            @enderror
                            <label class="form-label" for="password"><i class="fa fa-lock"></i> password</label>
                        </div>

                        <div class="form-outline mb-4">
                            <input type="text" class="form-control border border-grey-light"
                                name="password_confirmation" value="{{ old('password_confirmation') }}" />
                            @error('password_confirmation')
                                <p class="text-red-500 text-xs ">{{ $message }}</p>
                            @enderror
                            <label class="form-label" for="password2"><i class="fa fa-lock"></i> Conform
                                Password</label>
                        </div> --}}

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


    {{-- <x-card class="rounded max-w-lg mx-auto mt-24">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">
                Edit Report
            </h2>
            <p class="mb-4">Edit: {{ $report->report_name }}</p>
        </header>

        <form method="POST" action="/users/{{ $report->id }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-6">
                <label for="report_name" class="inline-block text-lg mb-2">Report Name</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="report_name"
                    value="{{ $report->report_name }}" />

                @error('report_name')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="Department" class="inline-block text-lg mb-2">Requested By</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="Department"
                    value="{{ $report->Department }}" placeholder="Example: Admission" />

                @error('Department')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
    
            <div class="mb-6">
                <label for="key_terms" class="inline-block text-lg mb-2">Key Terms</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="key_terms"
                    value="{{ $report->key_terms }}" placeholder="Seperate by comma: Ex. Diabetes, ... " />

                @error('key_terms')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="validated_by" class="inline-block text-lg mb-2">Validated By</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="validated_by"
                    value="{{ $report->validated_by }}" placeholder="Example: Remote, Boston MA, etc" />

                @error('validated_by')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="frequency" class="inline-block text-lg mb-2">Frequency</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="frequency"
                    value="{{ $report->frequency }}" placeholder="Example: Remote, Boston MA, etc" />

                @error('frequency')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            

            <div class="mb-6">
                <label for="updated_by" class="inline-block text-lg mb-2">
                    Updated by
                </label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="updated_by"
                    value="{{ $report->updated_by }}" />
                @error('updated_by')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="description" class="inline-block text-lg mb-2">
                    Description
                </label>
                <textarea class="border border-gray-200 rounded p-2 w-full text-black-50" name="description" rows="10"
                    placeholder="Description"> {{ $report->description }} </textarea>
                @error('description')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            
            <div class="border border-gray-200 w-full mb-6"></div>


            <div class="mb-6">
                <label for="run_report_description" class="inline-block text-lg mb-2">
                    How to run the report description <span class="text-[#808080]">(Optional)</span>
                </label>
                <textarea class="border border-gray-200 rounded p-2 w-full text-black-50" name="run_report_description" rows="10"
                    placeholder="ex. report location, and how to run it"> {{ $report->run_report_description }} </textarea>
                @error('description')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="screenshot" class="inline-block text-lg mb-2">
                    Screen Shot: How to run the report <span class="text-[#808080]">(Optional)</span>
                </label>
                <input type="file" class="border border-gray-200 rounded p-2 w-full" name="screenshot" />
                <img class="w-48 mr-6 mb-6"
                    src="{{ $report->screenshot ? asset('storage/' . $report->screenshot) : asset('/images/no-image.png') }}"
                    alt="" />
                @error('screenshot')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            
            <div class="mb-6">
                <label for="data_extract_location_link" class="inline-block text-lg mb-2">Data Extract Location Path
                    <span class="text-[#808080]">(Optional)</span> </label>

                <input type="text" class="border border-gray-200 rounded p-2 w-full"
                    name="data_extract_location_link"
                    placeholder="copy and paste url (Ex. //sjgh-fs19-02/acct2$/DECISION SUPPORT/DA2 Cerner Extracts)"
                    value="{{ $report->data_extract_location_link }}"/>

                @error('data_extract_location_link')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="data_extract_location_screenshot" class="inline-block text-lg mb-2">
                    Data Extract Location Path Screenshot <span class="text-[#808080]">(Optional)</span>
                </label>
                <input type="file" class="border border-gray-200 rounded p-2 w-full"
                    name="data_extract_location_screenshot" />

                <img class="w-48 mr-6 mb-6"
                    src="{{ $report->data_extract_location_screenshot ? asset('storage/' . $report->data_extract_location_screenshot) : asset('/images/no-image.png') }}"
                    alt="" />

                @error('data_extract_location_screenshot')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
        
            <div class="mb-6">
                <label for="report_example_screenshot" class="inline-block text-lg mb-2">
                    Report Example screen shot <span class="text-[#808080]">(Optional)</span>
                </label>
                <input type="file" class="border border-gray-200 rounded p-2 w-full"
                    name="report_example_screenshot" />

                <img class="w-48 mr-6 mb-6"
                    src="{{ $report->report_example_screenshot ? asset('storage/' . $report->report_example_screenshot) : asset('/images/no-image.png') }}"
                    alt="Report Example" />
                @error('report_example_screenshot')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>


            <div class="mb-6">
                <button class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                    Update Report
                </button>

                <a href="/" class="text-black ml-4"> Back </a>
            </div>
        </form>
    </x-card> --}}
</x-layout>
