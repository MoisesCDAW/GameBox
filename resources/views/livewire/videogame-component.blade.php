<div class="w-full">

    {{-- Nav Zone --}}
    <div class="w-full flex justify-center items-center gap-5 bg-[#1F2937] h-16">
        <a href="#own-games" class="text-white cursor-pointer text-base font-light border-b-2 border-[#1F2937] hover:border-[#3f3fb7] transition pb-1">Own Games</a>
        <a href="#other-games" class="text-white cursor-pointer text-base font-light border-b-2 border-[#1F2937] hover:border-[#3f3fb7] transition pb-1">Other Games</a>
    </div>
    
    {{-- Content Cards --}}
    <div class="p-8">
        <div class="flex items-center justify-end p-5 bg-none">
            <button
                class="middle none center rounded-lg bg-green-500 py-3 px-6 font-sans text-xs font-bold uppercase text-white shadow-md shadow-green-500/20 transition-all hover:shadow-lg hover:shadow-green-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                data-ripple-light="true" wire:click="openAddGame">
                Add VideoGame
            </button>
        </div>

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


    {{-- Model Add Videogame --}}
    @if ($addGame)
        <div class="fixed left-0 top-0 flex h-full w-full items-center justify-center bg-black bg-opacity-50 py-10">
            <div class="max-h-full w-full max-w-xl overflow-y-auto sm:rounded-2xl bg-[#1F2937]">
                <div class="w-full">
                    <div class="m-8 my-20 max-w-[400px] mx-auto">
                        <div class="mb-8">
                            <h1 class="text-white mb-4 text-3xl font-extrabold">Add VideoGame</h1>
                            <span class="text-white text-sm">New game title</span>
                            <input type="text" placeholder="Super Mario Bros." class="w-full p-3 bg-[#222d3d] text-white rounded-lg mb-4 mt-2 placeholder:text-sm">
                            <span class="text-white text-sm">Game cover (optional)</span>
                            <input type="file" class="w-full p-3 bg-none text-white rounded-lg mb-4 text-sm">
                        </div>
                        <div class="flex justify-center gap-4">
                            <button class="p-3 text-sm bg-white rounded-full w-36 font-semibold">ADD</button>
                            <button class="p-3 text-sm bg-black rounded-full text-white w-36 font-semibold" wire:click="closeAddGame">CANCEL</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
