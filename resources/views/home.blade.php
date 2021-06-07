@extends('layouts.app')
@section('content')
<div>
    @include('layouts.header')
</div> 
<style>
#hideMe 
{
    -moz-animation: cssAnimation 0s ease-in 2s forwards;
    /* Firefox */
    -webkit-animation: cssAnimation 0s ease-in 2s forwards;
    /* Safari and Chrome */
    -o-animation: cssAnimation 0s ease-in 2s forwards;
    /* Opera */
    animation: cssAnimation 0s ease-in 2s forwards;
    -webkit-animation-fill-mode: forwards;
    animation-fill-mode: forwards;
}
@keyframes cssAnimation 
{
    to {
        width:0;
        height:0;
        overflow:hidden;
    }
}
@-webkit-keyframes cssAnimation
 {
    to {
        width:0;
        height:0;
        visibility:hidden;
    }
}

</style>
<main class="sm:container sm:mx-auto sm:mt-10">
    <div class="w-full sm:px-6">

        @if (session('status'))
            <div class="text-sm border border-t-8 rounded text-green-700 border-green-600 bg-green-100 px-3 py-4 mb-4" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-sm sm:shadow-lg">

            <header class="inline-block font-semibold bg-gray-200 text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
              <div class="flex flex-row">
                    <p class="text-gray-200"> 
                            <div class="">
                                <a href="">
                                    <svg class="h-6 w-6 text-gray-500"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <polyline points="5 12 3 12 12 3 21 12 19 12" />  <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />  <rect x="10" y="12" width="4" height="4" /></svg> 
                                </a>
                            </div>
                            <div class="ml-1 mt-1 text-gray-500">
                                <span>  &#x3009; <a href=""> Car </a></span>  
                            </div>
                    </p>
               </div>
            </header>

            <div class="w-full p-6">
                <!-- This example requires Tailwind CSS v2.0+ -->
                <div class="m-3">
                    <a href="{{ route('car.create') }}">
                    <button class="w-11 h-10 bg-green-500 hover:bg-green-700 text-white font-bold  rounded">
                    <svg class="h-8 w-8 ml-1 text-white"  fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/> </svg>
                    </button> </a>
                </div>
                <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div id="hideMe">
                            @if (session('alertAdd'))
                                <div id="" class="sm:rounded-md flex items-center bg-green-500 text-white text-sm font-bold px-4 py-3" role="alert">
                                    <svg class="h-5 w-5 text-white ml-1"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <circle cx="7" cy="17" r="2" />  <circle cx="17" cy="17" r="2" />  <path d="M5 17h-2v-6l2-5h9l4 5h1a2 2 0 0 1 2 2v4h-2m-4 0h-6m-6 -6h15m-6 0v-5" /></svg>                                   
                                    <p>{{ session('alertAdd') }}</p>
                                </div>
                            @elseif (session('alertUpdate'))
                                <div id="" class="sm:rounded-md flex items-center bg-yellow-300 text-white text-sm font-bold px-4 py-3" role="alert">
                                    <svg class="h-5 w-5 ml-1 text-white"  viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <path d="M9 7 h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3" />  <path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3" />  <line x1="16" y1="5" x2="19" y2="8" /></svg>
                                    <p>{{ session('alertUpdate') }}</p>
                                </div>
                            @elseif (session('alertDelete'))
                                <div id="" class="sm:rounded-md flex items-center bg-red-500 text-white text-sm font-bold px-4 py-3" role="alert">
                                    <svg class="h-5 w-5 ml-1 text-white"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <line x1="4" y1="7" x2="20" y2="7" />  <line x1="10" y1="11" x2="10" y2="17" />  <line x1="14" y1="11" x2="14" y2="17" />  <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />  <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
                                    <p>{{ session('alertDelete') }}</p>
                                </div>
                            @endif
                        </div>
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Car
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Number
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Date
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Owner
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Status
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($data as $car)                          
                          <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                    <div class="ml-4">
                                        <div class="text-sm text-center font-medium text-gray-900">
                                        {{$car->brand}}
                                        </div>
                                        <div class="text-sm text-gray-500 text-center p-1">
                                        {{$car->model}}
                                        </div>
                                    </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{$car->number}}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    <div class="text-sm text-gray-900">{{$car->withdrawal}}</div>
                                    @if($car->filing != NULL)
                                     <div class="text-sm text-gray-500 pt-1">{{$car->filing}}</div>
                                     @else
                                     <div class="text-sm text-gray-500 pt-1">NULL</div>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        
                                        @foreach($customer as $owner)
                                        @if($owner->id == $car->customer_id)        
                                            <div class="text-sm text-gray-900">{{$owner->firstname}}  {{$owner->lastname}}</div>
                                            <div class="text-sm text-gray-500 pt-1">{{$owner->call}}</div>
                                        @endif
                                        @endforeach
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                @if($car->status == 0)
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                        En etat
                                    </span>
                                @elseif ($car->status == 1)
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                        En panne
                                    </span>
                                @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <a href="car/edit/{{$car->id}}">
                                        <button class="w-7 h-6 ml-1 bg-yellow-400 hover:bg-yellow-700 text-white font-bold  rounded">
                                            <svg class="h-5 w-5 ml-1 text-white"  viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <path d="M9 7 h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3" />  <path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3" />  <line x1="16" y1="5" x2="19" y2="8" /></svg>                                    
                                        </button>  
                                    </a>  
                                    <a href="car/delete/{{$car->id}}">                               
                                    <button class="w-7 h-6 ml-1 bg-red-500 hover:bg-red-700 text-white font-bold  rounded">
                                         <svg class="h-5 w-5 ml-1 text-white"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <line x1="4" y1="7" x2="20" y2="7" />  <line x1="10" y1="11" x2="10" y2="17" />  <line x1="14" y1="11" x2="14" y2="17" />  <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />  <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
                                    </button>
                                    </a>
                                </td>
                            </tr>

                            <!-- More people... -->
                            @endforeach
                        </tbody>
                        </table>
                    </div>
                    </div>
                </div>
                </div>
                <div class="m-2 p-2">
                     {{$data->links()}}
                </div>
            </div>
        </section>
    </div>
</main>
<div>

    @include('layouts.footer')
</div> 
@endsection
