<x-app-layout>
    
    <div class="flex items-center justify-center w-[50vw]">
        <!-- Author: FormBold Team -->
        <!-- Learn More: https://formbold.com -->

    
        <div class="modalForm mx-auto w-full  max-w-[550px] " >
            <form action="{{ route('PostRentals.update', $rental) }}" 
                class="w-full" method="post">
                @csrf
                @method('PUT')
                <div class="flex flex-row"  >
                    <div>
                        <div class="mb-5">
                            <label for="title"
                                class="mb-3 block text-base font-medium text-[#07074D]">
                                Current Rental Title
                            </label>
                            <input required type="text" name="title"
                                value="{{ old('title', $rental->title) }}"
                                id="title" placeholder=""
                                class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        </div>
                        <div class="mb-5">
                            <label for="property_type"
                                class="mb-3 block text-base font-medium text-[#07074D]">
                                property_type
                            </label>
                            <select type="property_type"
                                name="property_type" id="property_type"
                                placeholder=""
                                class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">
                                <option
                                    value="{{ old('property_type', $rental->property_type) }}"
                                    selected disabled aria-placeholder="">
                                    {{ old('property_type', $rental->property_type) }}
                                </option>
                                <option value="appartement">Appartement
                                </option>
                                <option value="villa">Villa</option>
                                <option value="house">House</option>
                                <option value="beach_house">Beach House
                                </option>

                            </select>
                        </div>
                        <div class="mb-5">
                            <label for="price"
                                class="mb-3 block text-base font-medium text-[#07074D]">
                                Rental Price
                            </label>
                            <input required type="number" name="price"
                                id="price" placeholder=""
                                value="{{ old('price', $rental->price) }}"
                                class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                                placeholder="{{ old('property_type', $rental->price) }}" />
                        </div>
                    </div>
                    {{--  --}}
                    <div>
                        <div class="mb-5">
                            <label for="condition"
                                class="mb-3 block text-base font-medium text-[#07074D]">
                                condition
                            </label>
                            <input required type="number" name="condition"
                                id="condition" placeholder=""
                                value="{{ old('property_type', $rental->condition) }}"
                                class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        </div>
                        <div class="mb-5">
                            <label for="price"
                                class="mb-3 block text-base font-medium text-[#07074D]">
                                New Image
                            </label>
                            <input required type="file"
                                class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        </div>
                        <div class="mb-5">
                            <label for="description"
                                class="mb-3 block text-base font-medium text-[#07074D]">
                                Re Describe Your Proprety
                            </label>
                            <textarea requiredrows="4" name="description" id="description"
                                placeholder="{{ old('description', $rental->description) }}"
                                class="w-full resize-none rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"></textarea>
                        </div>
                    </div>
                </div>
                <div>
                </div>
                <button
                
                    class="hover:shadow-form rounded-md bg-[#6A64F1] py-3 px-8 text-base font-semibold text-white outline-none">
                    Submit
                </button>
            </form>

        </div>


    </div>
</x-app-layout>