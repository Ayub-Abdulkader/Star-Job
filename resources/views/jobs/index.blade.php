<x-layout>
   <x-navbar/>
    <div class="container flex flex-col justify-center items-center pt-5 pb-10 bg-no-repeat bg-contain" style="background-image: url({{url('/images/bg_star.png')}})">
        <x-heading/>
        <div class="my-10 w-1/2">
            
            <form class="flex items-center" action="#" method="GET">   
                <label for="search" class="sr-only">Search</label>
                <div class="relative w-full">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                    </div>
                    <input type="text" id="search" name="search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search for ur dream job..." required>
                </div>
                <button type="submit" class="p-2.5 ml-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    <span class="sr-only">Search</span>
                </button>
            </form>

          </div>
        <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
            @foreach ($jobs as $job)    
            <a href="{{route('jobs.show', $job)}}" class="flex flex-col items-center bg-white border rounded-lg shadow-md md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                <div class="w-44">   
                    <img class="w-full pl-2 rounded-t-lg h-full md:h-auto sm:w-1/2 md:w-48 md:rounded-none md:rounded-l-lg" 
                    src="{{$job->logo ? asset('storage/' . $job->logo) : asset('images/company/star_logo.png')}}"
                    alt="company logo"/>
                </div>
                <div class="flex flex-col justify-between p-4 leading-normal">
                    <h5 class="pt-2 text-2xl font-bold tracking-tight text-gray-900 hover:underline dark:text-white">{{$job->position}}</h5>
                    <h5 class="pt-2 text-xl font-bold tracking-tight text-gray-600 dark:text-white">{{$job->name}}</h5>
                    <div class="flex items-center text-center py-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-map-pin text-gray-500" width="20" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <circle cx="12" cy="11" r="3"></circle>
                            <path d="M17.657 16.657l-4.243 4.243a2 2 0 0 1 -2.827 0l-4.244 -4.243a8 8 0 1 1 11.314 0z"></path>
                        </svg>
                        <p class="pl-1 font-bold text-gray-500 dark:text-gray-400">{{$job->location}}</p>
                    </div>
                    <div class="flex items-center text-center pb-5">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-currency-euro text-gray-500" width="20" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M17.2 7a6 7 0 1 0 0 10"></path>
                            <path d="M13 10h-8m0 4h8"></path>
                         </svg>
                        <p class="pl-1 px-1 font-bold border rounded-md bg-zink-200 text-gray-700 dark:text-gray-400">{{$job->salary}}</p>
                    </div>
                    <div class="flex flex-row justify-start text-white ">
                        @foreach ($job->tags as $tag)
                        <div class="text-sm hover:bg-gray-200 rounded-lg" data-popover-target="popover-top" data-popover-placement="top">
                            @if (strtolower($tag->name) == "html")
                            <i class="ti ti-brand-html5 p-1" style="font-size:32px; color:rgb(234, 167, 11);text-shadow:2px 2px 4px #000000;" title="{{strtolower($tag->name)}}"></i>
                            @elseif (strtolower($tag->name) == "css")
                            <i class="ti ti-brand-css3 p-1" style="font-size:32px;color:rgb(234, 167, 11);text-shadow:2px 2px 4px #000000;" title="{{strtolower($tag->name)}}"></i>
                            @elseif (strtolower($tag->name) == "javascript")
                            <i class="ti ti-brand-javascript p-1" style="font-size:32px;color:rgb(234, 167, 11);text-shadow:2px 2px 4px #000000;" title="{{strtolower($tag->name)}}"></i>
                            @elseif (strtolower($tag->name) == "php")
                            <i class="ti ti-brand-php p-1" style="font-size:32px;color:rgb(234, 167, 11);text-shadow:2px 2px 4px #000000;" title="{{strtolower($tag->name)}}"></i>
                            @elseif (strtolower($tag->name) == "laravel")
                            <i class="ti ti-brand-laravel p-1" style="font-size:32px;color:rgb(234, 167, 11);text-shadow:2px 2px 4px #000000;" title="{{strtolower($tag->name)}}"></i>
                            @else
                            <span class="text-gray-100 px-2 py-0.5 ml-2 bg-gray-800 rounded-lg text-center">{{$tag->name}}</span>
                            @endif
                            <!-- showing tooltip on hover works but needs adjestment -->
                            <!--
                            <div data-popover id="popover-top" role="tooltip" class="absolute z-10 invisible inline-block w-12 text-sm font-light text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                                <div class="px-3 py-2">
                                    <p></p>
                                </div>
                                <div data-popper-arrow></div>
                            </div>
                            -->
                        </div>
                        @endforeach
                    </div>
                </div>
            </a>
            @endforeach
        </div>
        <div class="py-8">
            {{ $jobs->links() }}
        </div>
    </div> 
    <x-footer/>
</x-layout>