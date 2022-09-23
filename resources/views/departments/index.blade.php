<x-layout>
    <table class="w-full table table table-borderless">
        <thead class="bg-navbarcolor text-white border-l border-gray-600">
            {{-- <h1 class="text-3xl text-center font-bold my-6 uppercase">
                    Manage Reports
                </h1> --}}
            <tr class="text-bold text-xl">
                <th>Department Name</th>
            </tr>
        </thead>
        <tbody class="bg-white">
            @unless($departments->isEmpty())
                @foreach ($departments as $department)
                    <tr class="border-b border-r border-l border-gray-600 hover:bg-gray-100">
                        <td class="py-2 text-lg">
                            <a href="/departments/{{ $department->id }}">
                                {{ $department->department }}
                            </a>
                        </td>
                        <td class="py-2 text-lg">
                            {{-- <form class="delete-btn-form" action="/departments/{{ $department->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="text-red-500">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form> --}}
                        </td>
                    </tr>
                @endforeach
            @else
                <tr class="">
                    <td class="px-4 py-8 text-lg">
                        <p class="text-center">No departments Found</p>
                    </td>
                </tr>
            @endunless
        </tbody>
    </table>
</x-layout>
