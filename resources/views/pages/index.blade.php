@extends('layouts.layout')

@section('title','RedLine')

@section('content')
    
    <div class="container flex flex-col-reverse md:flex-row items-center px-6 mx-auto mt-10 space-y-0 md:space-y-0">
        <div class="flex flex-col mb-32 space-y-6 md:w-1/2">
            <h1 class="max-w-md text-4xl font-bold text-center md:text-5xl md:text-left">A <span style="color:#cf3d3c">SINGLE</span> donation can save <span style="color:#cf3d3c">THREE</span> lives!</h1>
            <p class="max-w-sm text-center text-darkGrayishBlue mr-0 md:text-left">to eliminate <span style="color:#cf3d3c">blood</span> scarcity in Nepal.</p><br>
            <div class="flex justify-center mt-5 md:justify-start">
                <button type="button" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-3 md:mr-0 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <a href="#">Get Started</a>
                </button>
                <button type="button" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ml-1 mr-3 md:mr-0 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <a href="#">Get Started</a>
                </button>
            </div>
        </div>
        <div>
            
        </div>    

    </div>

@endsection