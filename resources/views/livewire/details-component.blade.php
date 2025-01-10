<div class="flex justify-center items-center h-auto" @if($wirePoll) wire:poll.10s="renderDetails" @endif>

    <div class="bg-[#1F2937] w-[80%] sm:w-[50%] mt-10 p-5 flex-col rounded-md mb-10">
        
        {{-- content-top --}}
        <div class="text-gray-700 grid grid-cols-1 sm:flex">
            
            {{-- Cover --}}
            <div class="overflow-hidden bg-[#1F2937] text-gray-700 shadow-lg m-0 mb-5 sm:mb-0">
                <img src="../img/gameCovers/{{ $videogameCover }}" alt="Revolutionizing Our Production Process" class="object-cover w-[300px] h-[350px] rounded-md"/>
            </div>

            {{-- Title and description --}}
            <div class="lg:pr-6 lg:pl-4 lg:ms-4 flex flex-col justify-center lg:max-w-[60%]">
                {{-- <p class="block antialiased font-sans text-sm font-light leading-normal text-inherit mb-4">Technology</p> --}}
                <p class="block antialiased tracking-normal font-sans text-xl font-semibold leading-snug text-white mb-2 normal-case">{{ $videogameTitle }}</p>
                <p class="block antialiased font-sans leading-relaxed mb-8 font-normal text-gray-500">{{ $videogameDescription }}</p>

                {{-- Actions buttons --}}
                <div class="flex gap-4">

                    @if ( $this->isOwner() || $role == 'admin' )
                        <button
                            class="middle none center rounded-lg bg-orange-500 py-3 px-6 font-sans text-xs font-bold uppercase text-white shadow-md shadow-orange-500/20 transition-all hover:shadow-lg hover:shadow-orange-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                            data-ripple-light="true" wire:click="OpenEditVideogame">
                            Edit
                        </button>
                    @endif

                    @if ( $role == 'admin' )
                        <button
                            class="middle none center mr-4 rounded-lg bg-red-500 py-3 px-6 font-sans text-xs font-bold uppercase text-white shadow-md shadow-red-500/20 transition-all hover:shadow-lg hover:shadow-red-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                            data-ripple-light="true" wire:click="deleteVideogame" wire:confirm="Are you sure you want to delete this videogame?">
                            Delete
                        </button>
                    @endif
                </div>
            </div>
        </div>

        <div class="h-[1px] bg-gray-500 my-10"></div>

        {{-- Comments --}}
        <div class="flex flex-col mt-8 gap-6">
            @foreach ($comments as $comment)
                <div class="px-0 lg:px-10 bg-none w-full">
                    <div>  
                        <div class="flex justify-between px-2">
                            {{-- Author --}}
                            <div class="flex justify-between items-center">
                                <div class="flex items-center gap-3">
                                    <div class="">
                                    <img class="w-12 h-12 rounded-full" src="https://static.vecteezy.com/system/resources/previews/005/005/788/non_2x/user-icon-in-trendy-flat-style-isolated-on-grey-background-user-symbol-for-your-web-site-design-logo-app-ui-illustration-eps10-free-vector.jpg" alt="" />
                                    </div>
                                    <div class="text-sm font-semibold text-white">{{ $this->getUserName($comment->user_id) }}</div>
                                </div>
                            </div>

                            {{-- Stars --}}
                            <div class="flex mt-2">
                                @for ($i = 0; $i < $comment->score; $i++)
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-yellow-400" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                @endfor
                            </div>
                        </div>

                        {{-- Comment --}}
                        <p class="mt-4 text-md text-gray-500">{{ $comment->comment }}</p>

                    </div>
                </div>
            @endforeach
        </div>
    </div>


    {{-- Edit Videogame Modal --}}
    @if ($editModal)
        <div class="fixed left-0 top-0 flex h-full w-full items-center justify-center bg-black bg-opacity-50 py-10 z-50">
            <div class="max-h-full w-full max-w-xl overflow-y-auto sm:rounded-2xl bg-[#1F2937] px-8 lg:px-0">
                <div class="w-full">
                    <div class="m-8 my-20 max-w-[400px] mx-auto">
                        <div class="mb-8">
                            <h1 class="text-white mb-4 text-3xl font-extrabold">Edit VideoGame</h1>

                            <div wire:loading wire:target="videogameCover" class="flex bg-blue-100 rounded-lg p-4 mb-4 text-sm text-blue-700" role="alert">
                                <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg> 
                                Wait for the image to finish loading to continue.
                            </div>
                            <br>

                            {{-- Title --}}
                            <span class="text-white text-sm">Videogame title</span>
                            <input type="text" value="{{ $this->videogameTitle }}" wire:model="videogameTitle" name="videogameTitle" class="w-full p-3 bg-[#222d3d] text-white rounded-lg mt-2 placeholder:text-sm">
                            @error('videogameTitle') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            <br><br>

                            {{-- Description --}}
                            <span class="text-white text-sm">Videogame description</span>
                            <textarea wire:model="videogameDescription" name="videogameDescription" 
                                class="w-full p-3 bg-[#222d3d] text-white rounded-lg mt-2 placeholder:text-sm h-28">{{ $this->videogameDescription }}</textarea>
                            @error('videogameDescription') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            <br><br>

                            {{-- Cover --}}
                            <span class="text-white text-sm">Videogame cover (optional)</span>
                            <input type="file" wire:model="videogameCover" name="videogameCover" class="w-full p-3 bg-none text-white rounded-lg text-sm">
                            @error('videogameCover') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            
                        </div>
                        
                        {{-- Buttons --}}
                        <div class="flex justify-center gap-4">
                            <button class="p-3 text-sm bg-white rounded-full w-36 font-semibold" wire:click.prevent="editVideogame" wire:loading.attr="disabled" wire:target="videogameCover" wire:confirm="Are you sure you want to edit this videogame?">EDIT</button>
                            <button class="p-3 text-sm bg-black rounded-full text-white w-36 font-semibold" wire:click.prevent="CloseEditVideogame">CANCEL</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

</div>
