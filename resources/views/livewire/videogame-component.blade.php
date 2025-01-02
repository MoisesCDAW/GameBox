<div class="w-full" id="inicio">

    {{-- Up Button --}}
    <div class="fixed top-[80%] left-[50%] z-50" id="volArriba">
        <a class='flex bg-white rounded-3xl p-4 justify-center cursor-pointer' href='#inicio'>
            <div class='flex items-center justify-between flex-1'>
                <svg width='12' height='12' viewBox='0 0 17 17' xmlns='http://www.w3.org/2000/svg' style="transform: rotate(270deg);">
                    <path fillRule='evenodd' clipRule='evenodd'
                    d='M0 8.71423C0 8.47852 0.094421 8.25246 0.262491 8.08578C0.430562 7.91911 0.658514 7.82547 0.896201 7.82547H13.9388L8.29808 2.23337C8.12979 2.06648 8.03525 1.84013 8.03525 1.60412C8.03525 1.36811 8.12979 1.14176 8.29808 0.974875C8.46636 0.807989 8.6946 0.714233 8.93259 0.714233C9.17057 0.714233 9.39882 0.807989 9.5671 0.974875L16.7367 8.08499C16.8202 8.16755 16.8864 8.26562 16.9316 8.3736C16.9767 8.48158 17 8.59733 17 8.71423C17 8.83114 16.9767 8.94689 16.9316 9.05487C16.8864 9.16284 16.8202 9.26092 16.7367 9.34348L9.5671 16.4536C9.39882 16.6205 9.17057 16.7142 8.93259 16.7142C8.6946 16.7142 8.46636 16.6205 8.29808 16.4536C8.12979 16.2867 8.03525 16.0604 8.03525 15.8243C8.03525 15.5883 8.12979 15.362 8.29808 15.1951L13.9388 9.603H0.896201C0.658514 9.603 0.430562 9.50936 0.262491 9.34268C0.094421 9.17601 0 8.94995 0 8.71423Z'
                    fill='#000'/>
                </svg>
            </div>
        </a>
    </div>

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
                data-ripple-light="true" wire:click="openAddVideogame">
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
                                    src="img/gameCovers/{{$videogame->cover}}"
                                    alt="card-image" class="object-cover w-full h-full" />
                            </div>

                            <div class="p-3 flex">
                                <button
                                    class="rate border-2 border-[#222d3d] hover:border-gray-300 font-sans font-bold text-center uppercase disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-2 rounded-lg shadow-gray-900/10 hover:shadow-gray-900/20 active:opacity-[0.85] active:shadow-none block w-full bg-blue-gray-900/10 text-blue-gray-900 shadow-none hover:shadow-none focus:shadow-none"
                                    type="button" wire:click="openAddRate({{$videogame->id}})">
                                    Rate
                                </button>
                                <a href="{{ route('details.videogame', ['id' => $videogame->id]) }}"
                                    class="border-2 border-[#222d3d] hover:border-gray-300 font-sans font-bold text-center disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-2 rounded-lg shadow-gray-900/10 hover:shadow-gray-900/20 active:opacity-[0.85] active:shadow-none block w-full bg-blue-gray-900/10 text-blue-gray-900 shadow-none hover:shadow-none focus:shadow-none">
                                    <button
                                        class="uppercase"
                                        type="button">
                                        Details
                                    </button>
                                </a>
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
                                    src="img/gameCovers/{{$videogame->cover}}"
                                    alt="card-image" class="object-cover w-full h-full" />
                            </div>

                            <div class="p-3 flex">
                                <button
                                    class="border-2 border-[#222d3d] hover:border-gray-300 font-sans font-bold text-center uppercase disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-2 rounded-lg shadow-gray-900/10 hover:shadow-gray-900/20 active:opacity-[0.85] active:shadow-none block w-full bg-blue-gray-900/10 text-blue-gray-900 shadow-none hover:shadow-none focus:shadow-none"
                                    type="button">
                                    Rate
                                </button>
                                <button
                                    class="border-2 uppercase border-[#222d3d] hover:border-gray-300 font-sans font-bold text-center disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-2 rounded-lg shadow-gray-900/10 hover:shadow-gray-900/20 active:opacity-[0.85] active:shadow-none block w-full bg-blue-gray-900/10 text-blue-gray-900 shadow-none hover:shadow-none focus:shadow-none"
                                    type="button" wire:click="redirectToDetails({{$videogame->id}})">
                                    Details
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            
        </div>

    </div>


    {{-- Add Videogame Model --}}
    @if ($addGame)
        <div class="fixed left-0 top-0 flex h-full w-full items-center justify-center bg-black bg-opacity-50 py-10">
            <div class="max-h-full w-full max-w-xl overflow-y-auto sm:rounded-2xl bg-[#1F2937]">
                <div class="w-full">
                    <div class="m-8 my-20 max-w-[400px] mx-auto">
                            <div class="mb-8">
                                <h1 class="text-white mb-4 text-3xl font-extrabold">Add VideoGame</h1>

                                <div wire:loading wire:target="cover" class="flex bg-blue-100 rounded-lg p-4 mb-4 text-sm text-blue-700" role="alert">
                                    <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg> 
                                    Wait for the image to finish loading to continue.
                                </div>
                                <br>

                                {{-- Title --}}
                                <span class="text-white text-sm">New game title</span>
                                <input type="text" wire:model="title" placeholder="Super Mario Bros." class="w-full p-3 bg-[#222d3d] text-white rounded-lg mt-2 placeholder:text-sm">
                                @error('title') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                                <br><br>

                                {{-- Description --}}
                                <span class="text-white text-sm">New game description</span>
                                <textarea wire:model="description"
                                    placeholder="Super Mario Bros is a classic platformer where Mario embarks on a journey to rescue Princess Peach, navigating levels filled with enemies, obstacles, and power-ups, becoming a gaming icon." 
                                    class="w-full p-3 bg-[#222d3d] text-white rounded-lg mt-2 placeholder:text-sm h-28"></textarea>
                                @error('description') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                                <br><br>

                                {{-- Cover --}}
                                <span class="text-white text-sm">Game cover (optional)</span>
                                <input type="file" wire:model="cover" class="w-full p-3 bg-none text-white rounded-lg text-sm">
                                @error('cover') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                                
                            </div>
                            <div class="flex justify-center gap-4">
                                <button class="p-3 text-sm bg-white rounded-full w-36 font-semibold" wire:click.prevent="addVideogame" wire:loading.attr="disabled" wire:target="cover">ADD</button>
                                <button class="p-3 text-sm bg-black rounded-full text-white w-36 font-semibold" wire:click.prevent="closeAddVideogame">CANCEL</button>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    @endif


    {{-- Add Rate Model --}}
    @if ($addRate)
        <div class="fixed left-0 top-0 flex h-full w-full items-center justify-center bg-black bg-opacity-50 py-10">
            <div class="max-h-full w-full max-w-xl overflow-y-auto sm:rounded-2xl bg-[#1F2937]">
                <div class="w-full">
                    <div class="m-8 my-20 max-w-[400px] mx-auto">
                        <div class="mb-8">
                            <h1 class="text-white mb-4 text-3xl font-extrabold">Add rating to the game</h1>

                            {{-- Rate --}}
                            <span class="text-white text-sm">Rate to the game</span>
                            <div class="flex my-3 gap-2">
                                <span class="text-xs text-white">min</span>                      
                                <input type="radio" name="score" wire:click="selectScore(1)">
                                <input type="radio" name="score" wire:click="selectScore(2)">
                                <input type="radio" name="score" wire:click="selectScore(3)" checked>
                                <input type="radio" name="score" wire:click="selectScore(4)">
                                <input type="radio" name="score" wire:click="selectScore(5)">
                                <span class="text-xs text-white">max</span>  
                            </div>

                            {{-- Comment --}}
                            <span class="text-white text-sm">Commentary on the game (optional)</span>
                            <textarea wire:model="comment"
                                placeholder="Super Mario Bros is a timeless classic that revolutionized platform gaming. Its engaging gameplay, iconic characters, and challenging levels make it a must-play for fans of the genre. Simply brilliant!" 
                                class="w-full p-3 bg-[#222d3d] text-white rounded-lg mt-2 placeholder:text-sm h-28"></textarea>
                            @error('comment') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            <br><br>
                            
                        </div>

                        {{-- Actions Buttons --}}
                        <div class="flex justify-center gap-4">
                            <button class="p-3 text-sm bg-white rounded-full w-36 font-semibold" wire:click.prevent="addNewRate">ADD</button>
                            <button class="p-3 text-sm bg-black rounded-full text-white w-36 font-semibold" wire:click.prevent="closeAddRate">CANCEL</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>

<script>
    
    /**
     * This function is used to show the button to go up when the user scrolls down the page.
     */
    function estilos_volverArriba() {
        let base = document.querySelector("#volArriba");
        let svg = base.querySelector("svg");

        base.classList.add(
            "w-10",
            "h-10",
            "fixed",
            "right-10",
            "min-[880px]:inset-x-[50%]",
            "bottom-24",
            "transition",
            "duration-[400ms]",
            "ease-in-out",
            "opacity-0",
        );

        svg.classList.add(
            "opacity-0",
            "w-10",
            "transition",
            "duration-[400ms]",
            "ease-in-out",
        );

        window.addEventListener("scroll", function() {
            if (window.scrollY > 500) {
                base.classList.remove("opacity-0");
                base.classList.add("opacity-100");
                svg.classList.remove("opacity-0");
                svg.classList.add("opacity-100");
            }else {
                base.classList.remove("opacity-100");
                base.classList.add("opacity-0");
                svg.classList.remove("opacity-100");
                svg.classList.add("opacity-0");
            }
        });
    }

    estilos_volverArriba();
</script>