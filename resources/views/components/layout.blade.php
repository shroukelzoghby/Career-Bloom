<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Career Bloom</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Hanken+Grotesk:wght@400;500;600&display=swap"
        rel="stylesheet">
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class=" bg-black  text-white  font-hanken-grotesk pb-20">
<div class="px-10">
    <nav class="flex justify-between items-center border-b border-white/10 ">
        <div>
            <a href="/">
                <img class="scale-50 ..." src="{{Vite::asset('resources/images/logo.png')}}">
            </a>
        </div>
        <div class=" space-x-6 font-bold py-5">
            <a href="#">Jobs</a>
            <a href="#">Careers</a>
            <a href="#">Salaries</a>
            <a href="#">Companies</a>
        </div>
        @auth
            <div class="py-5 px-4 space-x-6 flex">
                <a href="/jobs/create">Post a Job</a>
                <form method="POST" action="/logout">
                    @csrf
                    @method('DELETE')

                    <button>Log Out</button>
                </form>
            </div>
        @endauth
        @guest
            <div class=" space-x-6 font-bold py-5">
                <a href="/register">Sign Up</a>
                <a href="/login">Log In</a>
            </div>
        @endguest
    </nav>
    <main class="mt-10 max-w-[986px] mx-auto">
        {{$slot}}
    </main>
</div>

</body>
</html>
