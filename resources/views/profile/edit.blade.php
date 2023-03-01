<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <h1 style="    font-size: 30px;font-weight: 700;"> My Favorites </h1>
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">


                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 ">
                        @unless (count($favorites)==0)

                        @foreach($favorites as $favorites)

                        <div
                          class="flex flex-col rounded-lg bg-white shadow-lg  md:max-w-xl md:flex-row ">
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



            <h1 style="    font-size: 30px;font-weight: 700;"> My Groupes</h1>
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">


                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 ">
                        @unless (count($groupes)==0)

                        @foreach($groupes as $groupe)

                        <div
                          class="flex flex-col h-40 rounded-lg bg-white shadow-lg  md:max-w-xl md:flex-row ">
                          <img
                            class="h-10 rounded-t-lg object-cover md:h-auto md:w-48 md:rounded-none md:rounded-l-lg"
                            @php
                             $tab=explode("\\",$groupe->image);
                            @endphp
                                src="{{asset('storage/imagesbooks/'.$tab[6]) }}"
                            alt="" />
                          <div class="flex flex-col justify-start p-6 bg-white">
                            <form method="POST" action="/groupe/delete/{{$groupe->id}}">
                                @csrf
                                @method('DELETE')
                                <button><h6 class="text-red-400" > delete</h6></button>
                            </form>

                        <h5
                              class="mb-2 text-xl font-medium text-black">
{{  $groupe->name_groupe}}
        </h5>
        <a href="/livre/{{$groupe->books_id}}">
                            <p class="text-xs text-black ">
{{$groupe->title}}                            </p></a>
                          </div>
                        </div>


                    @endforeach

                    @else
                    <p>No favorites found <p>
                    @endunless
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
