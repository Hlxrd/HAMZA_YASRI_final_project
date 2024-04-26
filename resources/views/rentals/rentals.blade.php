<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <div class="container mx-auto px-4 py-8 w-full h-[80vh]">
        <div class="flex flex-wrap md:flex-row justify-between items-center mb-4">
            <a href="{{ route('dashboard') }}" class="text-blue-700 hover:underline">Back to Rentals</a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 ">
            <h1 class="text-3xl font-bold mb-2">{{ $rental->title }}</h1>
            <div class="rounded-lg overflow-hidden shadow-md w-[20vw]">
                <img src="{{ asset('storage/img/' . $rental->imgs) }}" width="" class=" "
                    alt="{{ $rental->title }}"/>
                <div class="p-4">
                    <p class="text-gray-700 mb-3">{{ $rental->description }}</p>
                    <div class="flex items-center mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-500" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17.location_1 16.667a5.5 5.5 0 01-7.778 0l-4.255-2.66a1 1 0 01.146-1.419l2.66 4.255a2 2 0 002.832 0l4.255-2.66a1 1 0 011.419.146zM15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <span class="text-gray-700 ml-2">{{ $rental->location }}</span>
                    </div>
                    <div class="flex items-center mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-500" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v16l4-4zM8 16l4-4M12 12h.01M12 12v.01" />
                        </svg>
                        {{-- <span class="text-gray-700 ml-2">Available from: {{ $rental->available_from->format('d-m-Y') }}</span> --}}
                    </div>
                    <div class="flex items-center mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-500" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 16l4-4M12 12h.01M12 12v.01" />
                        </svg>
                        {{-- <span class="text-gray-700 ml-2">Available to: {{ $rental->available_to->format('d-m-Y') }}</span> --}}
                    </div>
                </div>
            </div>
            <div class="">

                <h2 class="text-xl font-bold mb-2">Price: {{ $rental->price }} per night</h2>
                <p class="text-gray-700 mb-4">**Note:** This is just a sample price. You may need to implement logic for
                    displaying different pricing based on seasons or other factors.</p>
            </div>
        </div>
    </div>
</body>

</html>
