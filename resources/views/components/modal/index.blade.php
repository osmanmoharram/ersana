@props(['width' => 'sm:max-w-3xl'])

<div x-data="{ isOpen: false }">
    <!-- begin::Trigger -->
    {{ $trigger }}

    <!-- end::Trigger -->

    <!-- begin::Content -->
    <div
        class="fixed z-10 inset-0 overflow-y-auto"
        aria-labelledby="modal-title"
        role="dialog"
        aria-modal="true"
        style="display: none"
        x-show="isOpen"
    >
        <div class="flex items-end justify-center min-h-screen px-4 pb-20 text-center sm:block sm:p-0">

            <div
                class="fixed inset-0 bg-slate-900/50 transition-opacity"
                x-show="isOpen"
                x-transition:enter="ease-out duration-300"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                x-transition:leave="ease-in duration-200"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
                aria-hidden="true">
            </div>

            <!-- This element is to trick the browser into centering the modal contents. -->
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

            <div
                class="inline-block align-bottom bg-white rounded-sm overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle {{ $width }} sm:w-full"
                x-show="isOpen"
                @click.away="isOpen = false"
                x-transition:enter="ease-out duration-300"
                x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave="ease-in duration-200"
                x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            >

                <div class="bg-white sm:py-8">
                    <!-- begin::Close Button -->
                    <div class="flex items-center justify-end sm:px-6">
                        <button type="button" @click = "isOpen = false"
                                class="text-slate-300 hover:text-slate-400 bg-slate-50 hover:bg-slate-100 p-2
                                rounded-sm focus:outline-none transition ease-in-out duration-150"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                    <!-- end::Close Button -->

                    <!-- begin::Photo -->
                    {{-- <div class="text-center">
                        <div class="flex items-center justify-center">
                            <div class="relative w-28 h-28 rounded-full">
                                <img  src="{{ asset('img/user.png') }}" alt="" class="object-center object-cover w-full h-full rounded-full border-none" id="photoPreview">

                                <button type="button" @click.prevent="userPhoto.click()" class="flex items-center justify-center p-2 rounded-full bg-slate-900 text-white absolute -bottom-2 right-3 border-4 border-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </button>
                            </div>

                            <input
                                type="file" name="photo" accept=".png, .jpg, .jpeg"
                                style="display: none" id="userPhoto"
                                @change="photoPreview.src = URL.createObjectURL(event.target.files[0])"
                            >
                        </div>

                        <p id="photoErrors" class="mt-4 text-xs text-red-500"></p>
                    </div> --}}
                    <!-- end::Photo -->

                    {{ $slot }}
                </div>
            </div>
        </div>
    </div>
    <!-- end::Content -->
</div>

