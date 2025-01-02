<div class="flex justify-center items-center h-auto">
    <div class="bg-[#1F2937] w-[80%] sm:w-[50%] mt-10 p-5 flex-col rounded-md mb-10">
        
        {{-- content-top --}}
        <div class="text-gray-700 grid grid-cols-1 sm:flex">
            
            {{-- Cover --}}
            <div class="overflow-hidden bg-[#1F2937] text-gray-700 shadow-lg m-0 min-h-[300px] sm:min-w-[250px] sm:min-h-[300px] mb-5 sm:mb-0">
                <img src="../img/gameCovers/{{ $videogameCover }}" alt="Revolutionizing Our Production Process" class="object-cover w-full h-full rounded-md"/>
            </div>

            {{-- Title and description --}}
            <div class="sm:pr-6 sm:pl-4 sm:ms-4 flex flex-col justify-center">
                {{-- <p class="block antialiased font-sans text-sm font-light leading-normal text-inherit mb-4">Technology</p> --}}
                <p class="block antialiased tracking-normal font-sans text-xl font-semibold leading-snug text-white mb-2 normal-case">{{ $videogameTitle }}</p>
                <p class="block antialiased font-sans leading-relaxed mb-8 font-normal text-gray-500">{{ $videogameDescription }}</p>

                {{-- Actions --}}
                <div class="flex gap-4">
                    <button
                        class="middle none center rounded-lg bg-orange-500 py-3 px-6 font-sans text-xs font-bold uppercase text-white shadow-md shadow-orange-500/20 transition-all hover:shadow-lg hover:shadow-orange-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                        data-ripple-light="true">
                        Edit
                    </button>
                    <button
                        class="middle none center mr-4 rounded-lg bg-red-500 py-3 px-6 font-sans text-xs font-bold uppercase text-white shadow-md shadow-red-500/20 transition-all hover:shadow-lg hover:shadow-red-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                        data-ripple-light="true">
                        Delete
                    </button>
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
</div>
