<div class="flex justify-center items-center h-auto">
    <div class="absolute top-[100px] left-16">
        <button type='button'
            class='flex break-inside bg-[#1F2937] rounded-3xl px-8 py-4 mb-4 w-full dark:bg-slate-800 dark:text-white'
            wire:click=backToHome>
            <div class='flex items-center justify-between flex-1'>
                <svg width='12' height='12' viewBox='0 0 17 17' fill='none' xmlns='http://www.w3.org/2000/svg' style="transform: rotate(180deg);">
                    <path fillRule='evenodd' clipRule='evenodd'
                    d='M0 8.71423C0 8.47852 0.094421 8.25246 0.262491 8.08578C0.430562 7.91911 0.658514 7.82547 0.896201 7.82547H13.9388L8.29808 2.23337C8.12979 2.06648 8.03525 1.84013 8.03525 1.60412C8.03525 1.36811 8.12979 1.14176 8.29808 0.974875C8.46636 0.807989 8.6946 0.714233 8.93259 0.714233C9.17057 0.714233 9.39882 0.807989 9.5671 0.974875L16.7367 8.08499C16.8202 8.16755 16.8864 8.26562 16.9316 8.3736C16.9767 8.48158 17 8.59733 17 8.71423C17 8.83114 16.9767 8.94689 16.9316 9.05487C16.8864 9.16284 16.8202 9.26092 16.7367 9.34348L9.5671 16.4536C9.39882 16.6205 9.17057 16.7142 8.93259 16.7142C8.6946 16.7142 8.46636 16.6205 8.29808 16.4536C8.12979 16.2867 8.03525 16.0604 8.03525 15.8243C8.03525 15.5883 8.12979 15.362 8.29808 15.1951L13.9388 9.603H0.896201C0.658514 9.603 0.430562 9.50936 0.262491 9.34268C0.094421 9.17601 0 8.94995 0 8.71423Z'
                    fill='white' />
                </svg>
            </div>
        </button>
    </div>


    <div class="bg-[#1F2937] w-[80%] sm:w-[50%] mt-10 p-5 flex-col rounded-md mb-10">
        
        {{-- content-top --}}
        <div class="text-gray-700 grid grid-cols-1 sm:flex">
            
            {{-- Cover --}}
            <div class="overflow-hidden bg-[#1F2937] text-gray-700 shadow-lg m-0 mb-5 sm:mb-0">
                <img src="../img/gameCovers/{{ $videogameCover }}" alt="Revolutionizing Our Production Process" class="object-cover w-[300px] h-[350px] rounded-md"/>
            </div>

            {{-- Title and description --}}
            <div class="sm:pr-6 sm:pl-4 sm:ms-4 flex flex-col justify-center max-w-[60%]">
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
                <div class="px-10 bg-none w-full">
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
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-yellow-400" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-yellow-400" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-yellow-400" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-yellow-400" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
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
        <div class="fixed left-0 top-0 flex h-full w-full items-center justify-center bg-black bg-opacity-50 py-10">
            <div class="max-h-full w-full max-w-xl overflow-y-auto sm:rounded-2xl bg-[#1F2937]">
                <div class="w-full">
                    <div class="m-8 my-20 max-w-[400px] mx-auto">
                        <div class="mb-8">
                            <h1 class="text-white mb-4 text-3xl font-extrabold">Edit VideoGame</h1>

                            <div wire:loading wire:target="cover" class="flex bg-blue-100 rounded-lg p-4 mb-4 text-sm text-blue-700" role="alert">
                                <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg> 
                                Wait for the image to finish loading to continue.
                            </div>
                            <br>

                            {{-- Title --}}
                            <span class="text-white text-sm">Videogame title</span>
                            <input type="text" value="{{ $this->videogameTitle }}" wire:model="videogameTitle" name="videogameTitle" class="w-full p-3 bg-[#222d3d] text-white rounded-lg mt-2 placeholder:text-sm">
                            @error('title') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            <br><br>

                            {{-- Description --}}
                            <span class="text-white text-sm">Videogame description</span>
                            <textarea wire:model="videogameDescription" name="videogameDescription" 
                                class="w-full p-3 bg-[#222d3d] text-white rounded-lg mt-2 placeholder:text-sm h-28">{{ $this->videogameDescription }}</textarea>
                            @error('title') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            <br><br>

                            {{-- Cover --}}
                            <span class="text-white text-sm">Videogame cover (optional)</span>
                            <input type="file" wire:model="videogameCover" name="videogameCover" class="w-full p-3 bg-none text-white rounded-lg text-sm">
                            @error('cover') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            
                        </div>
                        
                        {{-- Buttons --}}
                        <div class="flex justify-center gap-4">
                            <button class="p-3 text-sm bg-white rounded-full w-36 font-semibold" wire:click.prevent="editVideogame" wire:loading.attr="disabled" wire:target="cover" wire:confirm="Are you sure you want to edit this videogame?">EDIT</button>
                            <button class="p-3 text-sm bg-black rounded-full text-white w-36 font-semibold" wire:click.prevent="CloseEditVideogame">CANCEL</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

</div>
