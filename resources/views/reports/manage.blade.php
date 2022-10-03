<x-layout>

    @php
        // USERS
        // $totalUsers = DB::table('users')->count();
        $userList = DB::table('users')
            ->orderBy('name')
            ->get();
        
        // Reports
        // $totalReport = DB::table('reports')->count();
        $allReports = DB::table('reports')->get();
        $totalDepartments = DB::table('departments')->count();
        $departmentList = DB::table('departments')
            ->select('departments', 'id')
            ->orderBy('departments', 'asc')
            ->distinct()
            ->get();
        
    @endphp

    <!--Container-->
    <div class="container w-full mx-auto pt-20">

        <div class="w-full px-4 md:px-0 md:mt-8 mb-16 text-gray-800 leading-normal">

            <!--Console Content-->

            <div class="flex flex-wrap">
                <div class="w-full md:w-1/2 xl:w-1/3 p-3">
                    <!--Metric Card-->
                    <div class="bg-white border rounded shadow p-2">
                        <a href="#reports">
                            <div class="flex flex-row items-center">
                                <div class="flex-shrink pr-4">
                                    <div class="rounded p-3 bg-yellow-600"><i
                                            class="text-white fa fa-2x fa-fw fa-file-text"></i></div>
                                </div>
                                <div class="flex-1 text-right md:text-center">
                                    <h5 class="font-bold uppercase text-gray-500">Total Reports</h5>
                                    <h3 class="font-bold text-3xl">{{ $allReports->count() }}
                                        <span class="text-yellow-600">
                                            <i class="fas fa-caret-up"></i>
                                        </span>
                                    </h3>
                                </div>
                            </div>
                        </a>
                    </div>
                    <!--/Metric Card-->
                </div>
                <div class="w-full md:w-1/2 xl:w-1/3 p-3">
                    <!--Metric Card-->
                    <div class="bg-white border rounded shadow p-2">
                        <div class="flex flex-row items-center">
                            <div class="flex-shrink pr-4">
                                <div class="rounded p-3 bg-green-600"><i
                                        class="fas fa-users fa-2x fa-fw fa-inverse"></i>
                                </div>
                            </div>
                            <div class="flex-1 text-right md:text-center">
                                <h5 class="font-bold uppercase text-gray-500">Total Users</h5>
                                <h3 class="font-bold text-3xl">{{ $userList->count() }} <span class="text-green-500">
                                        <i class="fas fa-exchange-alt"></i></span>
                                </h3>
                            </div>
                        </div>
                    </div>
                    <!--/Metric Card-->
                </div>
                <div class="w-full md:w-1/2 xl:w-1/3 p-3">

                    <!--Metric Card-->
                    <div class="bg-white border rounded shadow p-2">
                        <a href="#departments">

                            <div class="flex flex-row items-center">
                                <div class="flex-shrink pr-4">
                                    <div class="rounded p-3 bg-laravel"><i
                                            class="fas fa-folder fa-2x fa-fw fa-inverse"></i></div>
                                </div>
                                <div class="flex-1 text-right md:text-center">
                                    <h5 class="font-bold uppercase text-laravel">total Departments</h5>
                                    <h3 class="font-bold text-3xl">{{ $totalDepartments }} <span class="text-laravel"><i
                                                class="fas fa-caret-up"></i></span></h3>
                                </div>
                            </div>
                        </a>
                    </div>
                    <!--/Metric Card-->
                </div>
            </div>

            <!--Divider-->
            <hr class="border-b-2 border-gray-400 my-8 mx-4">

            <div class="flex flex-row flex-wrap flex-grow mt-2 flex flex-row-reverse">

                <div class="w-full md:w-1/4 p-3 flex flex-col">
                    <!--Graph Card-->
                    <div class="bg-white border rounded shadow ">
                        <div class="border-b p-3 flex justify-between items-center">
                            <h5 class="font-bold uppercase text-gray-600"> Register User</h5>
                            <i class="fa fa-user-plus text-success"></i>
                        </div>
                        <div class="p-3">
                            {{-- TO ADD THE USERS INSIDE THE MANAGE DASHBOARD --}}
                            @include('/users.register')
                        </div>
                    </div>
                    <!--/Graph Card-->
                </div>

                <div class="w-full md:w-3/4 p-3 flex flex-col">
                    <!--Graph Card-->
                    <div class="bg-white border rounded shadow ">
                        <div class="border-b p-3 flex justify-between items-center">
                            <h5 class="font-bold uppercase text-gray-600">Users</h5>
                            <i class="fa fa-users text-success"></i>
                        </div>
                        <div class="p-3" style="overflow:scroll; max-height: 460px">
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
                            @unless($userList->isEmpty())
                                @foreach ($userList as $user)
                                    <div class="bg-white border rounded shadow p-3 m-4 text:md">
                                        <div class="flex flex-row items-center">
                                            <div class="flex-shrink pr-4">
                                                <div class="rounded-2xl px-2 py-1 bg-green-100"><i
                                                        class="fa fa-user text-green-600"></i>
                                                </div>
                                            </div>
                                            <div class="flex-1 flex justify-between ">
                                                <h5 class="font-bold uppercase text-gray-500 text-left">
                                                    {{ $user->name }}<br>
                                                    <span class="text-muted text-xs capitalize">{{ $user->jobtitle }}</span>
                                                </h5>
                                                <div class="text-left">
                                                    <h5 class="font-bold text-gray-500">{{ $user->email }}</h5>
                                                </div>
                                                <div class="text-end flex justify-between">
                                                    <h5><span
                                                            class="badge bg-navbarcolor w-20">{{ displayRole($user->role) }}</span>
                                                    </h5>
                                                    <h5><a href="/users/{{ $user->id }}/edit"
                                                            class="text-blue-400 px-6 py-2 rounded-xl"><i
                                                                class="fa-solid fa-pen-to-square"></i></a></td>
                                                    </h5>
                                                    <h5>
                                                        <form class="delete-btn-form" method="POST"
                                                            action="/users/{{ $user->id }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="text-red-500 hover:text-red-600 uppercase"><i
                                                                    class="fa-solid fa-trash"></i></button>
                                                        </form>
                                                    </h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endunless
                        </div>
                    </div>

                    <!--/Graph Card-->
                </div>
            </div>
            <!--Divider-->
            <hr class="border-b-2 border-gray-400 my-8 mx-4" id="departments">

            <div class="flex">

                <div class="w-full md:w-1/4 xl:w-1/4 p-3">
                    <!--Graph Card-->
                    <div class="bg-white border rounded shadow">
                        <div class="border-b p-3 flex justify-between items-center">
                            <h5 class="font-bold uppercase text-gray-600">Add Department</h5>
                            <i class="text-laravel fa fa-folder-open"></i>
                        </div>
                        {{-- TO ADD THE DEPARTMENT INSIDE THE MANAGE DASHBOARD --}}
                        <div class="">
                            @include('/departments.add-department')
                        </div>
                    </div>
                    <!--/Graph Card-->
                </div>

                <div class="w-full md:w-3/4 p-3 flex flex-col " id="reports">
                    <!--Table Card-->
                    <div class="bg-white border rounded shadow ">
                        <div class="border-b p-3 flex justify-between items-center">
                            <h5 class="font-bold uppercase text-gray-600">All Reports</h5>
                            <i class="text-yellow-600 fa fa-lg fa-fw fa-file-text"></i>
                        </div>
                        <div class="p-3" style="overflow:scroll; height:800px;">
                            <table class="table">
                                <thead style="font-size: 18px;">
                                    <tr >
                                        <th scope="col">#</th>
                                        <th scope="col">Report Name</th>
                                        <th scope="col">Departments</th>
                                        <th scope="col">Edit</th>
                                        <th scope="col">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $count = 1;
                                    @endphp
                                    @unless($allReports->isEmpty())

                                        @foreach ($allReports as $report)
                                            {{-- {{$count += 1}} --}}
                                            <tr>
                                                {{-- <td>
                                                    {{ $report->id }}
                                                </td> --}}
                                                <td>
                                                    {{ $count++ }}
                                                </td>
                                                <td><a href="/reports/{{ $report->id }}">
                                                        {{ $report->report_name }}</a>
                                                </td>
                                                <td><a href="/reports/{{ $report->id }}">
                                                        {{ $report->Department }}</a>
                                                </td>
                                                <td><a href="/reports/{{ $report->id }}/edit"
                                                        class="text-blue-400 px-6 py-2 rounded-xl"><i
                                                            class="fa-solid fa-pen-to-square"></i></a></td>
                                                <td>
                                                    <form class="delete-btn-form" method="POST"
                                                        action="/reports/{{ $report->id }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="text-red-500 hover:text-red-600"><i
                                                                class="fa-solid fa-trash"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr class="border-gray-300">
                                            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                                <p class="text-center">No reports Found</p>
                                            </td>
                                        </tr>
                                    @endunless


                                </tbody>
                            </table>

                        </div>
                    </div>
                    <!--/table Card-->
                </div>
            </div>


        </div>

        <!--/ Console Content-->

    </div>


    </div>

</x-layout>
