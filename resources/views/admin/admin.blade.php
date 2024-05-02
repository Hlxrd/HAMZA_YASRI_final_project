<x-app-layout>

    @include('layouts.flash')
    <div>

        <div class="w-full h-[10vh] bg-slate-600 flex top-0 justify-center mb-3 items-center">
            <h1 class="text-4xl font-bold text-yellow-600">Post Rentals</h1>
            <a href="{{ url('/dashboard') }}"
                class="rounded-md px-3 py-2 mx-4 text-blue-200 text-xl hover:scale-105 transition-all ring-1 ring-transparent hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                Dashboard
            </a>
        </div>
        <div class="flex flex-col items-center h-fit  justify-center">
            @role('Admin')
                <div class="w-[90%] h-[100%] rounded-lg">
                    <img src="{{ asset('imgs/vacationrentals.png') }}" class="rounded-lg" alt="">
                </div>
                <div class="w-full h-[70vh] flex flex-col items-center p-5 justify-center ">

                    <div class="bg-white shadow rounded-xl p-10  py-8 text-slate-800">
                        <form action="{{ route('PostRentals.store') }}" method="post" class="my-4 lg:flex lg:flex-col gap-4" enctype="multipart/form-data">
                            <h1
                                class="text-center  font-weight-bold text-3xl underline-offset-4 underline select-none cursor-pointer">
                                Here You Can Easily post a proprety of you own for Users to Rent</h1>
                            @csrf
                            <div class="flex flex-col">
                                <label for="title">Title</label>
                                <input type="text" class="bg-gray-100 border border-gray-300 p-2 mb-4 outline-none"
                                    name="title" required>
                            </div>
                            <div class="flex flex-col">
                                <label for="">Proprety type</label>
                                <select class="bg-gray-100 border border-gray-300 p-2 mb-4 outline-none"
                                    name="property_type" id="" required>
                                    <option value="" selected disabled>Choose rental type</option>
                                    <option value="appartement">Appartement</option>
                                    <option value="villa">Villa</option>
                                    <option value="house">House</option>
                                    <option value="beach_house">Beach House</option>
                                </select>
                            </div>
                            <div class="flex flex-col">
                                <label for="">Price</label>
                                <input class="bg-gray-100 border border-gray-300 p-2 mb-4 outline-none" type="number"
                                    name="price" required>
                            </div>
                            <div class="flex flex-col">
                                <label for="">Condition</label>
                                <input class="bg-gray-100 border border-gray-300 p-2 mb-4 outline-none" type="text"
                                    name="condition" required>
                            </div>
                            <div class="pt-3 flex flex-col">
                                <label for="">Describe your rental</label>
                                <textarea name="description" class="description  bg-gray-100 sec p-3 h-60 border border-gray-300 outline-none"
                                    spellcheck="false" placeholder="Describe everything about this post here"></textarea>
                            </div>
                            <div class="flex flex-col">
                                <label for="imgs">Add an Image</label>
                                <input class="bg-gray-100 border border-gray-300 p-2 mb-4 outline-none" type="file"
                                    required name="imgs" id="imgs">
                            </div>
                            <div>
                                <button class="rounded outline mt-3 px-3" type="submit">Post</button>
                            </div>
                        </form>
                    </div>
                </div>
            @endrole
        </div>

        



</x-app-layout>
