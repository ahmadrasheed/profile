@extends('schools.layout')

@section('content')
<?php 
// اسماء حقول الجدول
    $school_name='اسم المدرسة';
    $school_address='عنوان المدرسة';
    $school_type='نوع المدرسة';
    $school_side='الجانب';
    $school_count='ت';

    $count=0;
?>



@if (isset($school))
    

<div class="mt-10 sm:mt-0">
  <div class="md:grid md:grid-cols-3 md:gap-6">
    <div class="md:col-span-1">
      <div class="px-4 sm:px-0">
        <h3 class="text-lg font-medium leading-6 text-gray-900"></h3>
        <p class="mt-1 text-sm text-gray-600">
          المعلومات الشخصية للمدرس.
        </p>
      </div>
    </div>
    <div class="mt-5 md:mt-0 md:col-span-2">
      <form action="{{route('schools.update',$school->id)}}" method="POST">
          @csrf
          @method('PUT')
        <div class="shadow overflow-hidden sm:rounded-md">
          <div class="px-4 py-5 bg-white sm:p-6">
            <div class="grid grid-cols-6 gap-6">
              <div class="col-span-6 sm:col-span-3">
                <label for="first_name" class="block text-sm font-medium text-gray-700">{{$school_name}}</label>
                <input type="text" name="name" value="{{$school->name}}" id="name" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm  rounded-md">
              </div>

              <div class="col-span-6 sm:col-span-3">
                <label for="last_name" class="block text-sm font-medium text-gray-700">{{$school_type}}</label>
                <input type="text" name="type" value="{{$school->type}}" id="last_name" autocomplete="family-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
              </div>

              <div class="col-span-2 sm:col-span-4">
                <label for="email_address" class="block text-sm font-medium text-gray-700">{{$school_address}}</label>
                <input type="text" name="address" value="{{$school->address}}" id="email_address" autocomplete="email" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
              </div>

              <div class="col-span-6 sm:col-span-3">
                <label for="side" class="block text-sm font-medium text-gray-700">{{$school_side}}</label>
                <select id="side" name="side" autocomplete="side" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                  <option  {{$school->side=='الجانب الايسر'?'selected':''}}>الجانب الايسر</option>
                  <option  {{$school->side=='الجانب الايمن'?'selected':''}}>الجانب الايمن</option>
                  <option  {{$school->side=='ممثلية دهوك'?'selected':''}}>ممثلية دهوك</option>
                  <option  {{$school->side=='ممثلية اربيل'?'selected':''}}>ممثلية اربيل</option>
                </select>
              </div>

           

              <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                <label for="city" class="py-2 block text-sm font-medium text-gray-700">City</label>
                <input type="text" name="city" id="city" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
              </div>

              <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                <label for="state" class="block text-sm font-medium text-gray-700">State / Province</label>
                <input type="text" name="state" id="state" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
              </div>

              <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                <label for="postal_code" class="block text-sm font-medium text-gray-700">ZIP / Postal</label>
                <input type="text" name="postal_code" id="postal_code" autocomplete="postal-code" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
              </div>
              <div class="w-full sm:col-span-3 lg:col-span-2">
                <a href=""> here is </a>
              </div>
            </div>
       
          
          </div>
          <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
              Save
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

@endif

@endsection