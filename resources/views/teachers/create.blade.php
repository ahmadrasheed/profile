@extends('teachers.layout')

@section('scripts1')
    {{-- for auto completion select dropdown menu --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

@endsection
@section('content')

<h1 class="text-center bor">  </h1>


<!-- component -->


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
      <form action="{{route('teachers.store')}}" method="POST">
          @csrf
        <div class="shadow overflow-hidden sm:rounded-md">
          <div class="px-4 py-5 bg-white sm:p-6">
            <div class="grid grid-cols-6 gap-6">
              <div class="col-span-6 sm:col-span-3">
                <label for="first_name" class="block text-sm font-medium text-gray-700">الاسم الاول</label>
                <input type="text" name="fname" value="{{Old('fname')}}" id="fname" autocomplete="given-name" class="mt-1 py-2 px-3  block w-full shadow-sm sm:text-sm  rounded-md">
                @error('fname')
                  <div class="text-rose-600">{{$message}}</div>
                @enderror
              </div>

              <div class="col-span-6 sm:col-span-3">
                <label for="last_name" class="block  text-sm font-medium text-gray-700">الاسم الثاني</label>
                <input type="text" name="lname" value="{{Old('lname')}}" id="last_name" autocomplete="family-name" class="mt-1 py-2 px-3 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                @error('lname')
                  <div class="text-rose-600">{{$message}}</div>
                @enderror
              </div>

              <div class="col-span-6 sm:col-span-3">
                <label for="school_id" class="block text-sm font-medium text-gray-700">المدرسة الحالية</label>
                <select id="school_id" name="school_id" value="{{Old('school_id')}}" autocomplete="school_id" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                  <option hidden> اختر مدرسة</option>
                  @foreach ($schools as $school)
                    <option value="{{$school->id}}">{{$school->name }}</option>
                  @endforeach

                </select>
              </div>

              <div class="col-span-3 sm:col-span-3">
                <label for="birth" class="block text-sm font-medium text-gray-700">التولد</label>
                <input type="text" name="birth" value="{{Old('birth')}}" id="birth" autocomplete="birth" class="py-2 px-3 mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                @error('birth')
                <div class="text-rose-600">{{$message}}</div>
              @enderror
              </div>

              <div class="col-span-6 sm:col-span-3">
                <label for="livesearch" class="block text-sm font-medium text-gray-700">اختر مدرسة</label>
                <select class="livesearch mt-1 block w-full py-4 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm " name="livesearch" text="{{Old('livesearch')}}"> 
                  {{Old('livesearch')}}  
                 
                </select>
                @error('livesearch')
                <div class="text-rose-600">{{$message}}</div>
              @enderror
              </div>
              <div class="col-span-6 sm:col-span-3">
                <label for="side" class="block text-sm font-medium text-gray-700">الجانب من المدينة</label>
                <select id="side" name="side" autocomplete="side" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"> 
                      <option>الجانب الايسر</option>
                      <option>الجانب الايمن</option>
                      <option>ممثلية دهوك</option>
                      <option>ممثلية اربيل</option>
                </select>
              </div> 


              <div class="col-span-6">
                <label for="street_address" class="block text-sm font-medium text-gray-700">Street address</label>
                <input type="text" name="street_address" id="street_address" autocomplete="street-address" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
              </div>

              <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                <label for="city" class="block text-sm font-medium text-gray-700">City</label>
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

@endsection
@section('scripts2')
<script type="text/javascript">
  $('.livesearch').select2({
      placeholder: 'اكتب اسم المدرسة ...',
      ajax: {
          url: '/ajax-autocomplete-search',
          dataType: 'json',
          delay: 250,
          processResults: function (data) {
              return {
                  results: $.map(data, function (item) {
                      return {
                          text: item.name,
                          id: item.id
                      }
                  })
              };
          },
          cache: true
      }
  });
</script>
@endsection()