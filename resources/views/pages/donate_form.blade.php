@extends('layouts.layout')

@section('title', 'Donor Form')

@section('content')

    <div class="container">

        <div class="flex flex-row">
            <center class="mt-4">
                <h1 class="max-w-md text-4xl rounded-lg px-4 py-2 font-bold text-center md:text-5xl bg-red-600 text-white">
                    Donate Blood</h1>
                <br>
                <p style="padding: 0 15% 3%; font-size: 17px; letter-spacing: 0.5px; color: black;">
                    Register with us today to pledge to donate blood and we will notify you when donation events come up
                    near
                    your area OR let us know if you’d like to donate at a nearby blood bank.
                </p>
            </center>
        </div>

    </div>


    <form class="container" action="{{ route('pages.to-be-donor.post') }}" method="POST">
        @csrf
        <div class="lg:w-1/2 md:w-2/3 mx-auto">
            @if ($errors->any())
                <div class="bg-red-100 border-red-400 text-red-700 p-4 rounded-md mb-4">
                    <ul class="list-disc pl-4">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="flex flex-wrap -m-2">
                <div class="p-2 w-1/2">
                    <div class="relative">
                        <label for="name" class="leading-7 text-sm text-red-600">Name</label>
                        <input type="text" id="name" name="name" value="{{ old('name') }}"
                            class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-red-500 focus:bg-white focus:ring-2 focus:ring-red-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    </div>
                </div>
                <div class="p-2 w-1/2">
                    <div class="relative">
                        <label for="contact" class="leading-7 text-sm text-red-600">Contact</label>
                        <input type="text" id="contact" name="contact" value="{{ old('contact') }}"
                            class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-red-500 focus:bg-white focus:ring-2 focus:ring-red-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    </div>
                </div>
                <div class="p-2 w-1/2">
                    <div class="relative">
                        <label for="age" class="leading-7 text-sm text-red-600">Age</label>
                        <input type="text" id="age" name="age" value="{{ old('age') }}"
                            class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-red-500 focus:bg-white focus:ring-2 focus:ring-red-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    </div>
                </div>
                <div class="p-2 w-1/2">
                    <div class="relative">
                        <label for="address" class="leading-7 text-sm text-red-600">Address</label>
                        <input type="address" id="address" name="address" value="{{ old('address') }}"
                            class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-red-500 focus:bg-white focus:ring-2 focus:ring-red-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    </div>
                </div>
                <div class="p-2 w-1/2">
                    <div class="relative">
                        <label for="gender" class="leading-7 text-sm text-red-600">Gender</label>
                        <select
                            class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-red-500 focus:bg-white focus:ring-2 focus:ring-red-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                            id="gender" name="gender" required>
                            <option {{ old('gender') == 'male' ? 'selected' : '' }} value="male">Male</option>
                            <option   {{ old('gender') == 'female' ? 'selected' : '' }} value="female">Female</option>
                        </select>
                    </div>
                </div>
                <div class="p-2 w-1/2">
                    <div class="relative">
                        <label for="bloodgroup" class="leading-7 text-sm text-red-600">Blood Group</label>
                        <select
                            class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-red-500 focus:bg-white focus:ring-2 focus:ring-red-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                            id="bloodgroup" name="bloodgroup" required>
                            <option   {{ old('bloodgroup') == 'A+' ? 'selected' : '' }} value="A+">A+</option>
                            <option   {{ old('bloodgroup') == 'A-' ? 'selected' : '' }} value="A-">A-</option>
                            <option   {{ old('bloodgroup') == 'B+' ? 'selected' : '' }} value="B+">B+</option>
                            <option   {{ old('bloodgroup') == 'B-' ? 'selected' : '' }} value="B-">B-</option>
                            <option   {{ old('bloodgroup') == 'O+' ? 'selected' : '' }} value="O+">O+</option>
                            <option   {{ old('bloodgroup') == 'O-' ? 'selected' : '' }} value="O-">O-</option>
                            <option   {{ old('bloodgroup') == 'AB+' ? 'selected' : '' }} value="AB+">AB+</option>
                            <option   {{ old('bloodgroup') == 'AB-' ? 'selected' : '' }} value="AB-">AB-</option>
                        </select>
                    </div>
                </div>
                <div class="p-2 w-full">
                    <button
                        class="flex mx-auto text-white bg-red-600 border-0 py-2 px-8 focus:outline-none hover:bg-red-800 rounded text-lg">Submit</button>
                </div>
            </div>
        </div>
    </form>

    {{-- <div class="text-gray-600 body-font relative">
        <div class="container px-5 py-24 mx-auto">
          <div class="flex flex-col text-center w-full mb-12">
            <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Contact Us</h1>
            <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Whatever cardigan tote bag tumblr hexagon brooklyn asymmetrical gentrify.</p>
          </div>
          <div class="lg:w-1/2 md:w-2/3 mx-auto">
            <div class="flex flex-wrap -m-2">
              <div class="p-2 w-1/2">
                <div class="relative">
                  <label for="name" class="leading-7 text-sm text-gray-600">Name</label>
                  <input type="text" id="name" name="name" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-red-500 focus:bg-white focus:ring-2 focus:ring-red-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                </div>
              </div>
              <div class="p-2 w-1/2">
                <div class="relative">
                  <label for="email" class="leading-7 text-sm text-gray-600">Email</label>
                  <input type="email" id="email" name="email" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-red-500 focus:bg-white focus:ring-2 focus:ring-red-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                </div>
              </div>
              <div class="p-2 w-full">
                <div class="relative">
                  <label for="message" class="leading-7 text-sm text-gray-600">Message</label>
                  <textarea id="message" name="message" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-red-500 focus:bg-white focus:ring-2 focus:ring-red-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"></textarea>
                </div>
              </div>
              <div class="p-2 w-full">
                <button class="flex mx-auto text-white bg-red-500 border-0 py-2 px-8 focus:outline-none hover:bg-red-600 rounded text-lg">Button</button>
              </div>
            </div>
          </div></div>
        </div> --}}
@endsection
