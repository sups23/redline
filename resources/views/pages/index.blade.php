@extends('layouts.layout')

@section('title','RedLine')

@section('content')
    
    <div class="container flex flex-col-reverse md:flex-row items-center px-6 mx-auto mt-10 space-y-0 md:space-y-0">
        <div class="flex flex-col mb-32 space-y-6 ml-20 md:w-1/2">
            <h1 class="max-w-md text-4xl font-bold text-center md:text-5xl md:text-left">A <span style="color:#cf3d3c">SINGLE</span> donation can save <span style="color:#cf3d3c">THREE</span> lives!</h1>
            <p class="max-w-sm text-center text-darkGrayishBlue mr-0 md:text-left">to eliminate <span style="color:#cf3d3c">blood</span> scarcity in Nepal.</p><br>
            <div class="flex justify-center mt-5 md:justify-start">
                <button type="button" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-3 md:mr-0 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <a href="{{ route('pages.donate_form') }}">Request for Blood</a>
                </button>
                <button type="button" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ml-1 mr-3 md:mr-0 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <a href="{{ route('pages.donate_form') }}">Upcoming Events</a>
                </button>
            </div>
        </div>
        <div class="flex flex-col mb-32 space-y-6 mr-3 md:w-1/2"> 
            <img src="/assets/images/bd7.png" alt="">
        </div>    

    </div>

    <section class="text-gray-600 body-font">
      <div class="container px-5 py-0 mx-auto flex flex-wrap">
        <div class="mx-auto">
          <h1 class="max-w-md text-4xl font-bold text-center md:text-5xl md:text-left bg-red-600 text-white">How does it Works?</h1>
        </div>
        <div class="flex flex-wrap w-full mt-5">
          <div class="lg:w-2/5 md:w-1/2 md:pr-10 md:py-6">
            <div class="flex relative pb-12">
              <div class="h-full w-10 absolute inset-0 flex items-center justify-center">
                <div class="h-full w-1 bg-red-200 pointer-events-none"></div>
              </div>
              <div class="flex-shrink-0 w-10 h-10 rounded-full bg-red-600 inline-flex items-center justify-center text-white relative z-10">
                {{-- <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                  <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                </svg> --}}
                <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                  <path d="M5 12h14"></path>
                  <path d="M12 5l7 7-7 7"></path>
                </svg>
              </div>
              <div class="flex-grow pl-4">
                <h2 class="font-medium title-font text-sm text-red-900 mb-1 tracking-wider">STEP 1</h2>
                <p class="leading-relaxed ">Hospital Request the Blood Bank through RedLine.</p>
              </div>
            </div>
            <div class="flex relative pb-12">
              <div class="h-full w-10 absolute inset-0 flex items-center justify-center">
                <div class="h-full w-1 bg-red-200 pointer-events-none"></div>
              </div>
              <div class="flex-shrink-0 w-10 h-10 rounded-full bg-red-600 inline-flex items-center justify-center text-white relative z-10">
                <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                  <path d="M5 12h14"></path>
                  <path d="M12 5l7 7-7 7"></path>
                </svg>
              </div>
              <div class="flex-grow pl-4">
                <h2 class="font-medium title-font text-sm text-red-900 mb-1 tracking-wider">STEP 2</h2>
                <p class="leading-relaxed ">Blood Bank will confirm Blood availability in the Inventory.</p>
              </div>
            </div>
            <div class="flex relative pb-12">
              <div class="h-full w-10 absolute inset-0 flex items-center justify-center">
                <div class="h-full w-1 bg-red-200 pointer-events-none"></div>
              </div>
              <div class="flex-shrink-0 w-10 h-10 rounded-full bg-red-600 inline-flex items-center justify-center text-white relative z-10">
                <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                  <path d="M5 12h14"></path>
                  <path d="M12 5l7 7-7 7"></path>
                </svg>
              </div>
              <div class="flex-grow pl-4">
                <h2 class="font-medium title-font text-sm text-red-900 mb-1 tracking-wider">STEP 3</h2>
                <p class="leading-relaxed ">If blood is available in Blood Banks, you can go to respective blood banks with requisition form and ice box.</p>
              </div>
            </div>
            <div class="flex relative pb-12">
              <div class="h-full w-10 absolute inset-0 flex items-center justify-center">
                <div class="h-full w-1 bg-red-200 pointer-events-none"></div>
              </div>
              <div class="flex-shrink-0 w-10 h-10 rounded-full bg-red-600 inline-flex items-center justify-center text-white relative z-10">
                <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                  <path d="M5 12h14"></path>
                  <path d="M12 5l7 7-7 7"></path>
                </svg>
              </div>
              <div class="flex-grow pl-4">
                <h2 class="font-medium title-font text-sm text-red-900 mb-1 tracking-wider">STEP 4</h2>
                <p class="leading-relaxed ">If blood is not available in Blood Banks, RedLine Donor Data Management will allow Blood Banks to find the probable blood donors with Availability and Confirmation.</p>
              </div>
            </div>
            <div class="flex relative">
              <div class="flex-shrink-0 w-10 h-10 rounded-full bg-red-600 inline-flex items-center justify-center text-white relative z-10">
                <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                  <path d="M5 12h14"></path>
                  <path d="M12 5l7 7-7 7"></path>
                </svg>
              </div>
              <div class="flex-grow pl-4">
                <h2 class="font-medium title-font text-sm text-red-900 mb-1 tracking-wider">FINISH</h2>
                <p class="leading-relaxed "></p>
              </div>
            </div>
          </div>
          <img class="lg:w-3/5 md:w-1/2 object-cover object-center rounded-lg md:mt-0 mt-12" src="/assets/images/bd2.jpg" alt="step">
        </div>
      </div>
    </section>


@endsection