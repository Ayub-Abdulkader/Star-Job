<x-layout>
    <x-navbar/>
     <div class="container flex flex-col items-center pt-10 bg-no-repeat bg-contain h-screen" style="background-image: url({{url('/images/bg_star.png')}})">
             <div class="flex flex-col items-center bg-white border rounded-lg shadow-md md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                 <div class="w-full">   
                     <img class="w-full rounded-t-lg p-5 h-full md:h-auto sm:w-1/2 md:w-48 md:rounded-none md:rounded-l-lg" src="{{$job->logo ? asset('storage/' . $job->logo) : asset('images/company/star_logo.png')}}" alt="company logo">
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
                     <p class="text-justify pt-10 text-gray-500 dark:text-gray-400">{{$job->description}}</p>
                     <div class="pt-10 flex justify-between">
                        <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-1 text-center mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Apply</button>
                        <a href="{{'https://' . $job->website}}">
                            <button class="relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-cyan-500 to-blue-500 group-hover:from-cyan-500 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-cyan-200 dark:focus:ring-cyan-800">
                                <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                                    website
                                </span>
                            </button>
                        </a>
                     </div>
                 </div>
                </div>
     </div> 
     <x-footer/>
 </x-layout>