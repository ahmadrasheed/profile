@extends('fcm.layout')

@section('content')

<div class="flex justify-center items-center h-screen">>
<form action="{{route('fcm.send',$teacher->id)}}" method="POST" class="w-full max-w-lg ">
    @csrf
  <div class="flex flex-wrap -mx-3 mb-6">
    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
        مدرس الحاسوب
      </label>
      <input value="{{$teacher->fname}} {{$teacher->lname}} {{$teacher->nickname}}" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" type="text" placeholder="اسم الاستاذ">
      
    </div>

  </div>
  <div class="flex flex-wrap -mx-3 mb-6">
  <div class="mb-3 xl:w-96">
    <label for="exampleFormControlTextarea1" class="form-label inline-block mb-2 text-gray-700"
      >نص الاشعار</label
    >
    <textarea
    name="body"
      class="
        form-control
        block
        w-full
        px-3
        py-1.5
        text-base
        font-normal
        text-gray-700
        bg-white bg-clip-padding
        border border-solid border-gray-300
        rounded
        transition
        ease-in-out
        m-0
        focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none
      "
      id="exampleFormControlTextarea1"
      rows="5"
      cols="50"
      placeholder="Your message"
    ></textarea>
  </div>
  </div>
  <div>
      <button class="bg-green-300 w-1/3 h-[35px] rounded  shadow " Type="submit">ارسال</button>
  </div>

</form>
</div>

@endsection