{{-- <x-layout>

    <!-- Section: Design Block -->
    <section class="text-center"
        style="
            /* background-image: url('https://mdbootstrap.com/img/new/textures/full/171.jpg'); */
            
            background: #FFFFFF;
            background: -webkit-linear-gradient(bottom, #FFFFFF, #363C3D);
            background: -moz-linear-gradient(bottom, #FFFFFF, #363C3D);
            background: linear-gradient(to top, #FFFFFF, #363C3D);
    ">
        <div class="p-5 bg-image" style=" height: 300px; ">
        </div>

        <div class="card sm:mx-5 lg:mx-32 xl:mx-72 2xl:mx-96 shadow-5-strong flex"
            style="
          margin-top: -100px;
          /* background: hsla(0, 0%, 100%, 0.8); */
          backdrop-filter: blur(30px);
          ">
            <div class="card-body py-5 px-md-4">

                <div class="row d-flex justify-content-center">
                    <div class="col-lg-8">
                        <h1 class="fw-bold uppercase text-2xl">Add Department</h1> --}}

<form method="POST" action="/departments" enctype="multipart/form-data">
    @csrf
    <div class="flex justify-between">
        <div class="form-outline mb-4 w-3/4">
            {{-- <input type="text" class="form-control border border-gray-100" name="departments" value="{{ old('departments') }}" /> --}}
            <input type="text" class="form-control border border-gray-100" name="departments" />
            @error('departments')
                <p class="text-red-500 text-xs ">{{ $message }}</p>
            @enderror
            <label class="form-label" for="departments">Department</label>
        </div>
        <div class="w-1/4 pl-1">
            <a type="submit" class="">
                <button type="submit" class="btn btn-success bg-success mb-4">
                    <i class="fa fa-plus"></i>
                </button>
            </a>
        </div>
    </div>


</form>
<div class="flex mb-4 gap-x-4 justify-center" >

    <div class="w-full p-3">
        <!--Graph Card-->

        <ul class="list-unstyled card-columns">
            @unless($departmentList->isEmpty())
                @foreach ($departmentList as $dprt)
                    <li class="list-group-item border-0">
                        <div class="flex justify-between">
                            <div>{{ $dprt->departments }}</div>
                            <div class="flex justify-between">
                                <div class="text-red-500">
                                    <form class="delete-btn-form" action="/departments/{{ $dprt->id }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="text-red-500">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </li>
                @endforeach
            @endunless
        </ul>
    </div>
</div>



{{-- </div>
                </div>
            </div>
        </div>
    </section>

</x-layout> --}}
