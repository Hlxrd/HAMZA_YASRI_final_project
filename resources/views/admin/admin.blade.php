<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/js/app.js'])
    @vite('resources/css/app.css')
    <title>Document</title>
</head>

<body>
    @include('layouts.flash')

    <div class="w-full h-[10vh] bg-slate-600 flex top-0 justify-center mb-3 items-center">
        <h1 class="text-4xl font-bold text-yellow-600">Post Rentals</h1>
        <a href="{{ url('/dashboard') }}"
                        class="rounded-md px-3 py-2 text-blue-200 text-xl hover:scale-105 transition-all ring-1 ring-transparent hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                        Dashboard
                    </a>
    </div>
    <main class="flex flex-col items-center justify-center">

        @role('Admin')
            <div class="w-[90%] h-[70%] rounded-lg">
                <img src="{{ asset('imgs/vacationrentals.png') }}" class="rounded-lg" alt="">
            </div>
            <section class="w-full h-[70vh] flex flex-col items-center p-5 justify-center ">
                <form action="{{ route('PostRentals.store') }}" method="post"
                    class="flex flex-col  bg-slate-400 p-10 h-fit w-[50%]"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="flex flex-col">
                        <label for="title">Title</label>
                        <input type="text" name="title" required>
                    </div>
                    <div class="flex flex-col">
                        <label for="">Proprety type</label>
                        <select name="property_type" id="" required>
                            <option value="" selected disabled>Choose rental type</option>
                            <option value="appartement">Appartement</option>
                            <option value="villa">Villa</option>
                            <option value="house">House</option>
                            <option value="beach_house">Beach House</option>
                        </select>
                    </div>
                    <div class="flex flex-col">
                        <label for="">Price</label>
                        <input type="number" name="price" required>
                    </div>
                    <div class="flex flex-col">
                        <label for="">Condition</label>
                        <input type="text" name="condition" required>
                    </div>
                    <div class="pt-3">
                        <label for="">Describe your rental</label>
                        <textarea type="text" cols="85" required name="description" rows="5"></textarea>
                    </div>
                    <div>
                        <label for="imgs"></label>
                        <input type="file" required  name="imgs" id="imgs">
                    </div>
                    <div>
                        <button class="rounded outline mt-3 px-3" type="submit">Post</button>
                    </div>
                </form>
            </section>
        @endrole
    </main>

</body>

</html>
