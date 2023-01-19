
<nav class="bg-white border-gray-200 px-2 sm:px-4 rounded sticky top-0 z-10 w-full shadow dark:bg-gray-900">
    <div class="container flex flex-wrap items-center justify-between ">
    <a href="/" class="flex items-center">
        <img src="{{url('/images/logo.png')}}" class="h-6 mr-3 sm:h-9" alt="Star-Job Logo" />
        <span class="self-center text-2xl font-extrabold whitespace-nowrap dark:text-white">Star-Job</span>
    </a>
    <div class="flex md:order-1">
      <button data-collapse-toggle="navbar-search" type="button" class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-search" aria-expanded="false">
        <span class="sr-only">Open menu</span>
        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
      </button>
    </div>
      <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-search">
        <ul class="flex flex-col p-4 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
          @auth          
          <li>
            <p class="block py-2 pl-3 pr-4 text-center font-normal text-base text-gray-800 bg-blue-700 rounded md:bg-transparent md:text-gary-800 md:p-0 dark:text-white">Welcome, {{auth()->user()->name}}</p>
          </li>
          <li>
            <a href="{{route('jobs.listing')}}" class="block py-2 pl-3 pr-4 text-center font-normal text-base text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 dark:text-white" aria-current="page">Job Board</a>
          </li>
          @endauth
            <li class="flex flex-row items-center hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700">
              <i class="ti ti-briefcase text-xl"></i>
              <a href="{{route('jobs.create')}}" class="block ml-1 pr-4 text-center text-gray-700 font-normal text-base rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-white dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Post Job</a>
            </li>
          @guest        
            <li class="flex flex-row items-center hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700">
              <i class="ti ti-login text-center text-xl"></i>
              <a href="{{route('user.login')}}" class="block pr-4 text-center text-gray-700 font-normal text-base rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Login</a>
            </li>
          @else
            <li class="flex flex-row items-center hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700">
              <i class="ti ti-login text-center text-xl"></i>
              <a href="{{route('user.logout')}}" class="block pr-4 text-center text-gray-700 font-normal text-base rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Logout</a>
            </li>
          @endguest
        </ul>
      </div>
    </div>
  </nav>
@if (session()->has('success'))

  <div x-data="{show: true}"
        x-init="setTimeout(() => show = false, 4000)"
        x-show="show"
  id="alert-3" 
  class=" absolute flex mt-5 p-4 mb-4 text-green-700 bg-green-100 rounded-lg w-1/2 mx-auto dark:bg-gray-800 dark:text-green-400" role="alert" style="left:25%">
    <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
    <span class="sr-only">Info</span>
    <div class="ml-3 text-sm font-medium">
      {{session('success')}}
    </div>
    <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-green-100 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-3" aria-label="Close">
      <span class="sr-only">Close</span>
      <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
    </button>
  </div>
@endif