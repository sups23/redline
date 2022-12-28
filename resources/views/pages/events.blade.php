@extends('layouts.layout')

@section('title','Events')

@section('content')
<section class="text-gray-600 body-font">
  <div class="container px-5 py-5 mx-auto">
    <div class="flex flex-wrap w-full mb-12 flex-col items-center text-center">
      <h1 class="sm:text-3xl text-2xl font-medium py-2 px-2 rounded-lg title-font mb-2 bg-red-600 text-white">Events</h1>
      <p class="lg:w-1/2 w-full leading-relaxed text-gray-500">Information of Past Events and Upcoming Events is available in this page.</p>
    </div>
    <div class="container px-5 py-12 mx-auto">
      <div class="flex flex-wrap -mx-4 -my-8">
        <div class="py-8 px-4 lg:w-1/3 border-2 border-red-400">
          <div class="h-full flex items-start">
            <div class="w-12 flex-shrink-0 flex flex-col text-center leading-none">
              <span class="text-gray-500 pb-2 mb-2 border-b-2 border-gray-200">Jul</span>
              <span class="font-medium text-lg text-gray-800 title-font leading-none">18</span>
            </div>
            <div class="flex-grow pl-6">
              <h2 class="tracking-widest text-xs title-font font-medium text-indigo-500 mb-1">CATEGORY</h2>
              <h1 class="title-font text-xl font-medium text-gray-900 mb-3">The 400 Blows</h1>
              <p class="leading-relaxed mb-5">Photo booth fam kinfolk cold-pressed sriracha leggings jianbing microdosing tousled waistcoat.</p>
              <a class="inline-flex items-center">
                <img alt="blog" src="https://dummyimage.com/103x103" class="w-8 h-8 rounded-full flex-shrink-0 object-cover object-center">
                <span class="flex-grow flex flex-col pl-3">
                  <span class="title-font font-medium text-gray-900">Alper Kamu</span>
                </span>
              </a>
            </div>
          </div>
        </div>
        <div class="py-8 px-4 lg:w-1/3 border-2 border-red-400">
          <div class="h-full flex items-start">
            <div class="w-12 flex-shrink-0 flex flex-col text-center leading-none">
              <span class="text-gray-500 pb-2 mb-2 border-b-2 border-gray-200">Jul</span>
              <span class="font-medium text-lg text-gray-800 title-font leading-none">18</span>
            </div>
            <div class="flex-grow pl-6">
              <h2 class="tracking-widest text-xs title-font font-medium text-indigo-500 mb-1">CATEGORY</h2>
              <h1 class="title-font text-xl font-medium text-gray-900 mb-3">Shooting Stars</h1>
              <p class="leading-relaxed mb-5">Photo booth fam kinfolk cold-pressed sriracha leggings jianbing microdosing tousled waistcoat.</p>
              <a class="inline-flex items-center">
                <img alt="blog" src="https://dummyimage.com/102x102" class="w-8 h-8 rounded-full flex-shrink-0 object-cover object-center">
                <span class="flex-grow flex flex-col pl-3">
                  <span class="title-font font-medium text-gray-900">Holden Caulfield</span>
                </span>
              </a>
            </div>
          </div>
        </div>
        <div class="py-8 px-4 lg:w-1/3 border-2 border-red-400">
          <div class="h-full flex items-start">
            <div class="w-12 flex-shrink-0 flex flex-col text-center leading-none">
              <span class="text-gray-500 pb-2 mb-2 border-b-2 border-gray-200">Jul</span>
              <span class="font-medium text-lg text-gray-800 title-font leading-none">18</span>
            </div>
            <div class="flex-grow pl-6">
              <h2 class="tracking-widest text-xs title-font font-medium text-indigo-500 mb-1">CATEGORY</h2>
              <h1 class="title-font text-xl font-medium text-gray-900 mb-3">Neptune</h1>
              <p class="leading-relaxed mb-5">Photo booth fam kinfolk cold-pressed sriracha leggings jianbing microdosing tousled waistcoat.</p>
              <a class="inline-flex items-center">
                <img alt="blog" src="https://dummyimage.com/101x101" class="w-8 h-8 rounded-full flex-shrink-0 object-cover object-center">
                <span class="flex-grow flex flex-col pl-3">
                  <span class="title-font font-medium text-gray-900">Henry Letham</span>
                </span>
              </a>
            </div>
          </div>
        </div>
      </div>
      
    </div>
  </div>
</section>

  
@endsection