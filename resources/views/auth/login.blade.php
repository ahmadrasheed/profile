
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://unpkg.com/tailwindcss@1.0.4/dist/tailwind.min.css" rel="stylesheet">
</head>
<title>مشروع بوابة المدرسين الالكترونية</title> 
<body class="h-screen overflow-hidden flex items-center justify-center" style="background: #edf2f7;">
    <div class="p-2">
        <div class="block lg:flex bg-white lg:shadow-lg rounded-lg">
            <div class="w-full lg:w-1/3 flex lg:border-r border-gray-200">
                <div class="m-auto rounded-full">
                    <a href="/" class="flex items-base pt-10 lg:p-2 -mb-10 lg:-mb-0">
                        <img src="{{url('/images/bg500by500.png')}}" alt="" class=" w-24 lg:w-48 ">
                        
                    </a>
                </div>
            </div>
            <div class="w-full lg:w-2/3 px-6 py-16">
                <div class="mb-4 font-light tracking-widest text-2xl">تسجيل الدخول</div>
                <div>
                 @if(Session::has('error'))
                     <p class="text-red-500" text-sm>{{Session::get('error')}}</p>
                 @endif


                </div>
                <form action="{{route('authenticate',$fcmToken)}}" method="POST">
                     @csrf

                    <div class="mb-4">
                        <label for="email" class="block mb-2 text-sm text-gray-800">Email</label>
                        <input type="email" name="email" id="email" class="focus:border-blue-500 appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none" autocomplete="email" required>
                        <div v-if="feedback.email.error">
                            <div class="text-sm text-red-500 mt-2" v-text="feedback.email.message"></div>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label for="password" class="block mb-2 text-sm text-gray-800">Your password</label>
                        <input type="password" name="password" id="password" class="focus:border-blue-500 appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none" autocomplete="current-password" required>
                    </div>
                    <label class="mb-4 flex items-center">
                        <input type="checkbox" class="form-checkbox" name="remeber" id="remeber" checked>
                        <span class="ml-2">I want to remember you ?</span>
                    </label>
                    <div class="block md:flex items-center justify-between">
                        <button type="submit" class="align-middle bg-blue-500 hover:bg-blue-600 text-center px-4 py-2 text-white text-sm font-semibold rounded-lg inline-block shadow-lg">LOGIN</button>

                        <a class="text-gray-600 hover:text-gray-700 no-underline block mt-3" href="#">
                            Forgot Your Password?
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
