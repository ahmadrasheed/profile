@extends('schools.layout')

@section('content')
<div class="max-w-4xl mx-auto mt-8">

<div class="mb-4">
    <h1 class="text-1.5xl font-bold">
    عرض جميع المدارس المشمولة بتدريس مادة الحاسوب 
    </h1>
</div>

<div class="flex mt-10">
    <a href="{{ route('schools.create') }}" class="px-2 py-1 rounded-md bg-blue-500 text-sky-100 hover:bg-blue-700">+ مدرسة جديدة</a>
</div>

<div class="flex flex-col mt-10">
    <div class="flex flex-col">
        <div class="inline-block min-w-full overflow-hidden  border-b border-gray-200 shadow sm:rounded-lg">

            @if ($message = Session::get('success'))
                <div class="p-3 rounded bg-green-500 text-green-100 mb-4 m-3">
                    <span>{{ $message }}</span>
                </div>
            @endif

            @if (isset($schools))
                
            <?php 
            // اسماء حقول الجدول
                $school_name='اسم المدرسة';
                $school_address='العنوان';
                $school_side='الجانب';
                $school_count='ت';

                $count=0;
            ?>
             <table class="min-w-full">
                <tr>
                    <th class="px-6 py-3 text-1xl font-bold leading-4 tracking-wider text-right text-gray-500 uppercase border-b border-gray-200 bg-gray-50">{{$school_count}}</th>
                    <th class="px-6 py-3 text-1xl font-bold leading-4 tracking-wider text-right text-gray-500 uppercase border-b border-gray-200 bg-gray-50">{{$school_name}}</th>
                    <th class="px-6 py-3 text-1xl font-bold leading-4 tracking-wider text-right text-gray-500 uppercase border-b border-gray-200 bg-gray-50">{{$school_side}}</th>
                    <th class="px-6 py-3 text-1xl font-bold leading-4 tracking-wider text-right text-gray-500 uppercase border-b border-gray-200 bg-gray-50" width="180px">Actions</th>
                </tr>
                <tbody class="bg-white"> <?php $k=1;?>
                    @foreach ($schools as $school)
                    
                    <tr>
                        <td class="px-6 whitespace-no-wrap border-b text-right border-gray-200">{{++$count}}</td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b text-right border-gray-200">{{ $school->name }}</td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b text-right border-gray-200">{{ $school->address }}</td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b text-right border-gray-200">
                            <form action="{{ route('schools.destroy',$school->id) }}" method="POST">
                               
                
                                <a class="text-indigo-600 hover:text-indigo-900" href="{{ route('schools.edit',$school->id) }}">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </a>
                                
                                <a href="{{ route('schools.edit',$school->id) }}" class="text-indigo-600 hover:text-indigo-900">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </a>
               
                                @csrf
                                @method('DELETE')
                                
                                <button type="submit">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-red-600 hover:text-red-800 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>

                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
         @endif
        </div>
    </div>
</div>
</div>

@endsection