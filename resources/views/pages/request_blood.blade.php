@extends('layouts.layout')

@section('title','Request Form')

@section('content')
<div class="container">
        
    <div class="flex flex-row">
        <center class="mt-4">
            <h1 class="max-w-md text-4xl font-bold text-center md:text-5xl bg-red-600 text-white">Request for Blood!</h1>
            <br>
            <p style="padding: 0 15% 3%; font-size: 17px; letter-spacing: 0.5px; color: black;">
                Register with us today to pledge to donate blood and we will notify you when donation events come up near
                your area OR let us know if you’d like to donate at a nearby blood bank.
            </p>
        </center>
    </div>
    
</div>
<form class="container" action="#">
    <div class="lg:w-1/2 md:w-2/3 mx-auto">
        <div class="flex flex-wrap -m-2">
          <div class="p-2 w-1/2">
            <div class="relative">
              <label for="name" class="leading-7 text-sm text-red-600">Name</label>
              <input type="text" id="name" name="name" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-red-500 focus:bg-white focus:ring-2 focus:ring-red-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            </div>
          </div>
          <div class="p-2 w-1/2">
            <div class="relative">
              <label for="contact" class="leading-7 text-sm text-red-600">Contact</label>
              <input type="text" id="contact" name="contact" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-red-500 focus:bg-white focus:ring-2 focus:ring-red-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            </div>
          </div>
          <div class="p-2 w-1/2">
            <div class="relative">
              <label for="age" class="leading-7 text-sm text-red-600">Age</label>
              <input type="text" id="age" name="age" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-red-500 focus:bg-white focus:ring-2 focus:ring-red-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            </div>
          </div>
          <div class="p-2 w-1/2">
            <div class="relative">
              <label for="pints" class="leading-7 text-sm text-red-600">Pints Needed</label>
              <input type="text" id="pints" name="pints" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-red-500 focus:bg-white focus:ring-2 focus:ring-red-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            </div>
          </div>
          <div class="p-2 w-1/2">
            <div class="relative">
              <label for="gender" class="leading-7 text-sm text-red-600">Gender</label>
              <select class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-red-500 focus:bg-white focus:ring-2 focus:ring-red-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" id="gender" name="gender" required>
                <option value="male">Male</option>
                <option value="female">Female</option>
              </select>
            </div>
          </div>
          <div class="p-2 w-1/2">
            <div class="relative">
              <label for="bloodgroup" class="leading-7 text-sm text-red-600">Blood Group</label>
              <select class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-red-500 focus:bg-white focus:ring-2 focus:ring-red-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" id="bloodgroup" name="bloodgroup" required>
                <option value="A+">A+</option>
                <option value="A-">A-</option>
                <option value="B+">B+</option>
                <option value="B-">B-</option>
                <option value="O+">O+</option>
                <option value="O-">O-</option>
                <option value="AB+">AB+</option>
                <option value="AB-">AB-</option>
              </select>
            </div>
          </div>
          <div class="p-2 w-1/2">
            <div class="relative">
              <label for="reqform" class="leading-7 text-sm text-red-600">Requisition Form</label>
              <input type="file" id="reqform" name="reqform" accept="image/*">
            </div>
          </div>
          <div class="p-2 w-1/2">
            <div class="relative">
              <label for="date" class="leading-7 text-sm text-red-600">Required Date</label>
              <input class="border rounded w-full py-2 px-3" type="datetime-local" min="<?php echo date('c'); ?>" required" id="date" name="date">
            </div>
          </div>
          <div class="p-2 w-full">
            <div class="relative">
              <label for="note" class="leading-7 text-sm text-red-600">Note</label>
              <textarea id="note" name="note" placeholder="Please specify the department, consultant and diagnosis of paitent here." class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"></textarea>
            </div>
          </div>
          
          <div class="p-2 w-full">
            <button class="flex mx-auto text-white bg-red-600 border-0 py-2 px-8 focus:outline-none hover:bg-red-800 rounded text-lg">Submit</button>
          </div>
        </div>
      </div>
</form>
@endsection