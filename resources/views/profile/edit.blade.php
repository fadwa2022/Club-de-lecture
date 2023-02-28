<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">

                    <div class="flex justify-between gap-x-5 ">
                        @unless (count($favorites)==0)

                        @foreach($favorites as $favorites)

                        <div
                          class="flex flex-col rounded-lg bg-white shadow-lg dark:bg-neutral-700 md:max-w-xl md:flex-row">
                          <img
                            class="h-20 rounded-t-lg object-cover md:h-auto md:w-48 md:rounded-none md:rounded-l-lg"
                            @php
                             $tab=explode("\\",$favorites->image);
                            @endphp
                                src="{{asset('storage/imagesbooks/'.$tab[6]) }}"
                            alt="" />
                          <div class="flex flex-col justify-start p-6 bg-white">
                            <a href="/livre/{{$favorites->books_id}}"><h5
                              class="mb-2 text-xl font-medium text-black">
{{  $favorites->title}}
        </h5></a>

                            <p class="text-xs text-black ">
{{$favorites->discription}}                            </p>
                          </div>
                        </div>


                    @endforeach

                    @else
                    <p>No favorites found <p>
                    @endunless
 </div>
                     </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
