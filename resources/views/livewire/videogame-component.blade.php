<div class="w-full">

    <div class="w-full flex justify-center items-center gap-5 bg-[#1F2937] h-16">
        <a href="#own-games" class="text-white cursor-pointer text-base font-light border-b-2 border-[#1F2937] hover:border-[#3f3fb7] transition pb-1">Own Games</a>
        <a href="#other-games" class="text-white cursor-pointer text-base font-light border-b-2 border-[#1F2937] hover:border-[#3f3fb7] transition pb-1">Other Games</a>
    </div>
    
    <div class="p-8">
        <h1 class="text-white text-lg font-bold mb-5" id="own-games">Own games</h1>
        <div class="grid grid-cols-5 2xl:grid-cols-6 gap-8 gap-x-px justify-items-center">  

            @foreach ($ownGames as $videogame)
                {{-- Card --}}
                <div>
                    <div>
                        <!-- Centering wrapper -->
                        <div class="relative flex flex-col text-white bg-[#222d3d] shadow-md bg-clip-border rounded-xl w-60">

                            <div class="px-6 my-4">
                                <div class="flex items-center justify-between">
                                    <p class="block font-sans antialiased font-medium leading-relaxed text-blue-gray-900 whitespace-nowrap overflow-hidden overflow-ellipsis">
                                        {{$videogame->title}}
                                    </p>
                                    <!-- <p class="block font-sans text-base antialiased font-medium leading-relaxed text-blue-gray-900">
                                        $95.00
                                    </p> -->
                                </div>
                                <!-- <p class="block font-sans text-sm antialiased font-normal leading-normal text-white opacity-75">
                                    With plenty of talk and listen time, voice-activated Siri access, and an
                                    available wireless charging case.
                                </p> -->
                            </div>

                            <div class="mx-4 overflow-hidden text-white bg-[#222d3d] bg-clip-border rounded-xl h-60 w-52">
                                <img
                                    src="https://i.3djuegos.com/juegos/16176/new_super_mario_bros_u_deluxe/fotos/ficha/new_super_mario_bros_u_deluxe-4729902.webp"
                                    alt="card-image" class="object-cover w-full h-full" />
                            </div>

                            <div class="p-3 flex">
                                <button
                                    class="border-2 border-[#222d3d] hover:border-gray-300 font-sans font-bold text-center uppercase disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-2 rounded-lg shadow-gray-900/10 hover:shadow-gray-900/20 active:opacity-[0.85] active:shadow-none block w-full bg-blue-gray-900/10 text-blue-gray-900 shadow-none hover:shadow-none focus:shadow-none"
                                    type="button">
                                    Comment
                                </button>
                                <button
                                    class="border-2 border-[#222d3d] hover:border-gray-300 font-sans font-bold text-center uppercase disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-2 rounded-lg shadow-gray-900/10 hover:shadow-gray-900/20 active:opacity-[0.85] active:shadow-none block w-full bg-blue-gray-900/10 text-blue-gray-900 shadow-none hover:shadow-none focus:shadow-none"
                                    type="button">
                                    Details
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            
        </div>

        <div class="h-[3px] bg-[#1F2937] my-10"></div>

        <h1 class="text-white text-lg font-bold mb-5" id="other-games">Other games</h1>
        <div class="grid grid-cols-5 2xl:grid-cols-6 gap-8 gap-x-px justify-items-center">

            @foreach ($otherGames as $videogame)
                {{-- Card --}}
                <div>
                    <div>
                        <!-- Centering wrapper -->
                        <div class="relative flex flex-col text-white bg-[#222d3d] shadow-md bg-clip-border rounded-xl w-60">

                            <div class="px-6 my-4">
                                <div class="flex items-center justify-between">
                                    <p class="block font-sans antialiased font-medium leading-relaxed text-blue-gray-900">
                                        {{$videogame->title}}
                                    </p>
                                    <!-- <p class="block font-sans text-base antialiased font-medium leading-relaxed text-blue-gray-900">
                                        $95.00
                                    </p> -->
                                </div>
                                <!-- <p class="block font-sans text-sm antialiased font-normal leading-normal text-white opacity-75">
                                    With plenty of talk and listen time, voice-activated Siri access, and an
                                    available wireless charging case.
                                </p> -->
                            </div>

                            <div class="mx-4 overflow-hidden text-white bg-[#222d3d] bg-clip-border rounded-xl h-60 w-52">
                                <img
                                    src="https://i.3djuegos.com/juegos/16176/new_super_mario_bros_u_deluxe/fotos/ficha/new_super_mario_bros_u_deluxe-4729902.webp"
                                    alt="card-image" class="object-cover w-full h-full" />
                            </div>

                            <div class="p-3 flex">
                                <button
                                    class="border-2 border-[#222d3d] hover:border-gray-300 font-sans font-bold text-center uppercase disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-2 rounded-lg shadow-gray-900/10 hover:shadow-gray-900/20 active:opacity-[0.85] active:shadow-none block w-full bg-blue-gray-900/10 text-blue-gray-900 shadow-none hover:shadow-none focus:shadow-none"
                                    type="button">
                                    Comment
                                </button>
                                <button
                                    class="border-2 border-[#222d3d] hover:border-gray-300 font-sans font-bold text-center uppercase disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-2 rounded-lg shadow-gray-900/10 hover:shadow-gray-900/20 active:opacity-[0.85] active:shadow-none block w-full bg-blue-gray-900/10 text-blue-gray-900 shadow-none hover:shadow-none focus:shadow-none"
                                    type="button">
                                    Details
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>

    </div>

</div>
