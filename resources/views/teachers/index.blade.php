@extends('teachers.layout')

@section('content')
<div class="max-w-4xl mx-auto mt-8">

<div class="mb-4">
    <h1 class="text-1.5xl font-bold">
       صفحة عرض جميع المدرسين مع المعلومات كافة 
    </h1>
</div>

<div class="flex mt-10">
    <a href="{{ route('teachers.create') }}" class="px-2 py-1 rounded-md bg-blue-500 text-sky-100 hover:bg-blue-700">+ اضف مدرس جديد</a>
</div>

<div class="flex flex-col mt-10">
    <div class="flex flex-col">
        <div class="inline-block min-w-full overflow-hidden  border-b border-gray-200 shadow sm:rounded-lg">

            @if ($message = Session::get('success'))
                <div class="p-3 rounded bg-green-500 text-green-100 mb-4 m-3">
                    <span>{{ $message }}</span>
                </div>
            @endif

             <table class="min-w-full">
                <tr>
                    <th class="px-6 py-3 text-1xl font-bold leading-4 tracking-wider text-right text-gray-500 uppercase border-b border-gray-200 bg-gray-50">ت</th>
                    <th class="px-6 py-3 text-1xl font-bold leading-4 tracking-wider text-right text-gray-500 uppercase border-b border-gray-200 bg-gray-50">الاسم الاول</th>
                    <th class="px-6 py-3 text-1xl font-bold leading-4 tracking-wider text-right text-gray-500 uppercase border-b border-gray-200 bg-gray-50">الاسم الثاني</th>
                    <th class="px-6 py-3 text-1xl font-bold leading-4 tracking-wider text-right text-gray-500 uppercase border-b border-gray-200 bg-gray-50" width="180px">Action</th>
                </tr>
                <tbody class="bg-white"> <?php $k=1;?>
                    @foreach ($teachers as $teacher)
                    
                    <tr>
                        <td class="px-6 whitespace-no-wrap border-b text-right border-gray-200">{{$k++}}</td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b text-right border-gray-200">{{ $teacher->fname }}</td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b text-right border-gray-200">{{ $teacher->lname }}</td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b text-right border-gray-200">
                            <form action="{{ route('teachers.destroy',$teacher->id) }}" method="POST">
                
                                <a class="text-indigo-600 hover:text-indigo-900" href="{{ route('teachers.edit',$teacher->id) }}">
                                <svg xmlns="http://www.w3.org/2000/svg" class="inline-block first:w-6 h-6 " fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </a>
                                
                                <a href="{{ route('teachers.edit',$teacher->id) }}" class="text-indigo-600 hover:text-indigo-900">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="inline-block w-6 h-6 " fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </a>
               
                                @csrf
                                @method('DELETE')
                                
                                <button type="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" class="inline-block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                                </button>
                                <a class=" text-indigo-600 hover:text-indigo-900" href="{{ route('fcm.send',$teacher->id) }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="inline-block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                                    </svg>
                                </a>




                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>

@endsection