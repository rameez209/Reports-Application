{{-- @extends('components.layout')
@section('content')
    
<div class="p-3">
    <form action="{{ url('departments') }}" method="POST" autocomplete="off" >
        @csrf
        <div class="input-group">
            <input type="text" name="content" class="form-control"
                placeholder="Add New Department">
            <button type="submit" class="btn btn-dark btn-sm px-4"><i
                    class="fas fa-plus"></i></button>
        </div>
    </form>
    @if (count($departments) > 0)
        <ul class="list-group list-group-flush mt-3">
            @foreach ($departments as $dpt)
                <li class="list-group-item">
                   <div>$dpt->departments</div> 
                    <form action="{{ route('distroy', $dpt->id) }}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-link btn-sm float-end"><i
                                class="fas fa-trash"></i></button>
                    </form>
                </li>
            @endforeach
        </ul>
        @else
        <tr>
            <td>No Data Found</td>
        </tr>
    @endif
</div>

@endsection --}}

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
                        <h1 class="fw-bold uppercase text-2xl">Add Department</h1>
                        
                            <form method="POST" action="/departments" enctype="multipart/form-data">
                                @csrf
                            <div class="form-outline mb-4">
                                <input type="text" class="form-control" name="departments"
                                    value="{{ old('departments') }}" />
                                @error('departments')
                                    <p class="text-red-500 text-xs ">{{ $message }}</p>
                                @enderror
                                <label class="form-label" for="departments">Department</label>
                            </div>

                            <div class="flex mb-4 gap-x-4 justify-center">
                                <a type="submit" class=" pr-4">
                                    <button class="btn btn-laravel text-white bg-laravel">
                                        Add Department
                                    </button></a>
                                <a href="/" class="btn btn-danger bg-danger text-white "><i
                                        class="fa-solid fa-arrow-left"></i>
                                    Cancel
                                </a>
                            </div>

                        </form>

                        
                        
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-layout>
