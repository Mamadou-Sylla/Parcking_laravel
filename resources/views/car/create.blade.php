@extends('layouts.app')
@section('content')

<style>
  .-z-1 {
    z-index: -1;
  }

  .origin-0 {
    transform-origin: 0%;
  }

  input:focus ~ label,
  input:not(:placeholder-shown) ~ label,
  textarea:focus ~ label,
  textarea:not(:placeholder-shown) ~ label,
  select:focus ~ label,
  select:not([value='']):valid ~ label {
    /* @apply transform; scale-75; -translate-y-6; */
    --tw-translate-x: 0;
    --tw-translate-y: 0;
    --tw-rotate: 0;
    --tw-skew-x: 0;
    --tw-skew-y: 0;
    transform: translateX(var(--tw-translate-x)) translateY(var(--tw-translate-y)) rotate(var(--tw-rotate))
      skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
    --tw-scale-x: 0.75;
    --tw-scale-y: 0.75;
    --tw-translate-y: -1.5rem;
  }

  input:focus ~ label,
  select:focus ~ label {
    /* @apply text-black; left-0; */
    --tw-text-opacity: 1;
    color: rgba(0, 0, 0, var(--tw-text-opacity));
    left: 0px;
  }
</style>


<div>
    @include('layouts.header')
</div> 

<main class="sm:container sm:mx-auto sm:mt-10">
<div class="w-full sm:px-6">
    <div class="w-full sm:px-6">
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
                                    <span>  &#x3009; <a href="{{ route('home') }}"> Car </a></span>  
                                </div>
                                <div class="ml-1 mt-1 text-gray-500">
                                    <span>  &#x3009; <a href="{{ route('car.create') }}"> Create </a></span>  
                                </div>
                        </p>
                </div>
            </header>
        </section>
        @if (session('status'))
            <div class="text-sm border border-t-8 rounded text-green-700 border-green-600 bg-green-100 px-3 py-4 mb-4" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-sm sm:shadow-lg">
<!-- component -->
<!-- Code on GiHub: https://github.com/vitalikda/form-floating-labels-tailwindcss -->

<div class="min-h-screen bg-gray-100 p-0 sm:p-12">
  <div class="mx-auto max-w-md px-6 py-12 bg-white border-0 shadow-lg sm:rounded-3xl">
    <h1 class="text-2xl font-bold mb-8 text-center text-gray-500">Register a Car</h1>
    <form id="form" novalidate action="{{ route('car.store') }}" method="post">
      <div class="relative z-0 w-full mb-5">
        <input
          type="text"
          name="brand"
          placeholder=""
          required
          class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200"
        />
        <label for="brand" class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">Brand</label>
        <span class="text-sm text-red-600   " id="error">@error('brand'){{$message}}@enderror</span>
      </div>
      <div class="relative z-0 w-full mb-5">
        <input
          type="text"
          name="model"
          placeholder=""
          class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200"
        />
        <label for="model" class="absolute duration-300 top-4 -z-1 origin-0 text-gray-500">Model</label>
        <span class="text-sm text-red-600   " id="error">@error('model'){{$message}}@enderror</span>
      </div>

      <div class="relative z-0 w-full mb-5">
        <input
          type="text"
          name="number"
          placeholder=""
          class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200"
        />
        <label for="number" class="absolute duration-300 top-4 -z-1 origin-0 text-gray-500">Enter registration number</label>
        <span class="text-sm text-red-600   " id="error">@error('number'){{$message}}@enderror</span>
      </div>

      <div class="relative z-0 w-full mb-5">
        <select
          name="status"
          value=""
          onclick="this.setAttribute('value', this.value);"
          class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none z-1 focus:outline-none focus:ring-0 focus:border-black border-gray-200"
        >
          <option value="" selected disabled hidden></option>
          <option value="0">En etat</option>
          <option value="1">En panne</option>
        </select>
        <label for="select" class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">Select the state of the car</label>
        <span class="text-sm text-red-600   " id="error">@error('status'){{$message}}@enderror</span>
      </div>

      
      <div class="relative z-0 w-full mb-5">
        <div class="relative z-0 w-full mb-5">
          <input
            type="text"
            name="withdrawal"
            placeholder=" "
            onclick="this.setAttribute('type', 'date');"
            class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200"
          />
          <label for="date" class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">Date</label>
          <span class="text-sm text-red-600   " id="error">@error('withdrawal'){{$message}}@enderror</span>
        </div>
            <!-- Relation ManytoOne entre cars et customers select option pour choisir le propriétaire du voiture -->
         <div class="relative z-0 w-full mb-5">
        <select
          name="owner"
          value=""
          onclick="this.setAttribute('value', this.value);"
          class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none z-1 focus:outline-none focus:ring-0 focus:border-black border-gray-200"
        >
          <option value="" selected disabled hidden></option>
          @foreach( $customer as $owner )
            {
              <option value="{{$owner->id}}">{{$owner->firstname}} {{$owner->lastname}} {{$owner->call}}</option>

            }
          @endforeach
        </select>
        <label for="select" class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">Select owner</span>
        <span class="text-sm text-red-600   " id="error">@error('owner'){{$message}}@enderror</span>
      </div>
      <button
        id="button"
        type="submit"
        name="save"
        class="w-full px-6 py-3 mt-3 text-lg text-white transition-all duration-150 ease-linear rounded-lg shadow outline-none bg-blue-900 hover:bg-blue-700 hover:shadow-lg focus:outline-none">
        Save
      </button>
      @csrf
    </form>
  </div>
</div>

      
        </section>
    </div>
</main>


<div>
    @include('layouts.footer')
</div> 

      
@endsection
