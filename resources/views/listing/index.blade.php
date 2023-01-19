<x-layout>
    <x-navbar/>
     <div class="container flex flex-col pt-10 items-center bg-no-repeat bg-contain h-screen" style="background-image: url({{url('/images/bg_star.png')}})">
        <h1 class="mb-4 text-xl font-bold p-6 leading-none bg-gray-200 rounded-lg tracking-tight text-gray-900 md:text-2xl text-blue-600 dark:text-blue-500 lg:text-6xl dark:text-white">Dashboard</h1>
        <div class="flex flex-col w-1/2 items-center bg-white border rounded-lg shadow-md md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">   
            <ul class="px-5 py-5 w-full divide-y divide-gray-200 dark:divide-gray-700">
                @foreach ($lists as $list)     
                <li class="pb-3 sm:pb-4">
                    <div class="flex items-center space-x-4">
                        <div class="flex-1 min-w-0">
                            <p class="text-lg font-medium text-gray-900 dark:text-white">
                                {{ $list->name }}
                            </p>
                            <p class="text-sm font-medium text-gray-600 dark:text-white">
                                {{ $list->position }}
                            </p>
                        </div>
                        <div class="inline-flex gap-4 items-center">
                            <a href="{{route('jobs.edit', $list)}}">
                                <i class="ti ti-edit" style="font-size:32px;color:rgb(234, 167, 11);text-shadow:2px 2px 4px #000000;"></i>
                            </a>

                            <a href="{{route('jobs.destroy', $list)}}">
                                <i class="ti ti-trash" style="font-size:32px;color:rgb(234, 167, 11);text-shadow:2px 2px 4px #000000;"></i>
                            </a>
                        </div>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
        <div class="p-5">
           
        </div>

    </div> 
    <x-footer/>
</x-layout>