@extends('layouts.layout')

@section('title','About')

@section('content')
    <!-- <h1>About Page</h1> -->
    <!-- <p>This is about us page of Project Redline.</p> -->

<div class="container mx-auto px-4 py-8">
  <div class="flex flex-wrap w-full mb-6 flex-col items-center text-center">
    <h1 class="sm:text-3xl text-2xl font-medium py-2 px-2 rounded-lg title-font mb-2 bg-red-600 text-white">About RedLine</h1>
  </div>
      <h2 class="sm:text-3xl text-2xl font-medium py-2 px-2 rounded-lg title-font mb-2 bg-red-600 text-white">Our Vision</h2>
      <p class="text-lg leading-relaxed mb-8">
        We envision a world where every person has access to safe and reliable blood donations when they need it. We believe that through innovative technology and a passionate team, we can make a significant impact on the lives of countless individuals.
      </p>
      <h2 class="sm:text-3xl text-2xl font-medium py-2 px-2 rounded-lg title-font mb-2 bg-red-600 text-white">Our Team</h2>
      <div class="flex flex-wrap -mx-2">
        <div class="w-1/2 px-2 mb-4">
          <div class="bg-white rounded-lg shadow-lg p-6">
            <h3 class="text-xl font-bold mb-4">Suprav Kandel</h3>
            <p class="text-gray-700 mb-2">X</p>
            <p class="text-gray-600 text-sm">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis pariatur molestias facilis maiores natus odio quae similique esse nemo error cumque dicta praesentium possimus, totam enim quisquam eius nisi quidem.
            </p>
          </div>
        </div>
        <div class="w-1/2 px-2 mb-4">
          <div class="bg-white rounded-lg shadow-lg p-6">
            <h3 class="text-xl font-bold mb-4">Ranjan Khanal</h3>
            <p class="text-gray-700 mb-2">Y</p>
            <p class="text-gray-600 text-sm">
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Tempora amet dignissimos quas. Consequatur quaerat quia qui vel eos! Perferendis maxime eaque amet odit blanditiis! Nihil provident possimus eligendi doloribus beatae.
            </p>
          </div>
        </div>
        <div class="w-1/2 px-2 mb-4">
          <div class="bg-white rounded-lg shadow-lg p-6">
            <h3 class="text-xl font-bold mb-4">Karan Mahato</h3>
            <p class="text-gray-700 mb-2">Z</p>
            <p class="text-gray-600 text-sm">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut possimus debitis voluptas quae qui blanditiis maxime autem cum, asperiores non iure, nemo molestias officia est recusandae et quos, sequi dolores.
            </p>
          </div>
        </div>
        <div class="w-1/2 px-2 mb-4">
          <div class="bg-white rounded-lg shadow-lg p-6">
            <h3 class="text-xl font-bold mb-4">Anjan Dhakal</h3>
            <p class="text-gray-700 mb-2">#</p>
            <p class="text-gray-600 text-sm">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo maiores, vitae voluptas odit nam ab accusantium veniam aperiam totam, quasi odio pariatur voluptatibus eaque sequi perspiciatis dolorem neque iure quas.
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection