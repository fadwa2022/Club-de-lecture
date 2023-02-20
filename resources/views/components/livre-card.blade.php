@props(['livre'])

<div class="w-full px-2 md:w-1/2 xl:w-1/4">
    <div class="mb-10 overflow-hidden rounded-lg bg-white">
      <a href="#" class="group relative block bg-black">
          <img
src="assets/img/post-sq-1.jpg"
            {{-- src="{{$livre->image ? asset ('storage/'. $livre->image) : 'assets/img/post-sq-1.jpg'}}" --}}
            class="absolute inset-0 h-full w-full object-cover opacity-75 transition-opacity group-hover:opacity-50"
          />

          <div class="relative p-8">
            <p class="text-sm font-medium uppercase tracking-widest text-pink-500">
                {{$livre->categorie->categorie}}
            </p>

            <p class="text-2xl font-bold text-white"> {{$livre->title}} </p>

            <div class="mt-64">

                <p class="text-sm text-white">
                    {{$livre->discription}}
                </p>

            </div>
          </div>
        </a>

    </div>
  </div>

