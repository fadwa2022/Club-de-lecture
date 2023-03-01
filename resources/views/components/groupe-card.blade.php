@props(['groupe'])


<div class="my-1 px-1 w-full  lg:my-4 lg:px-4">
    <!-- Article -->

    <a href="/groupe/{{$groupe->id}}" class="group relative block ">
        <article class="overflow-hidden rounded-lg shadow-lg">

                <a href="/groupe/{{$groupe->id}}">
                    <img alt="Placeholder" class="block h-64 w-full"
                    @php $tab=explode("\\",$groupe->image);@endphp
            src="{{asset('storage/imagesbooks/'.$tab[6])}}">
                </a>

                <header class="flex items-center justify-between leading-tight p-2 md:p-4">
                    <h1 class="text-lg">
                        <a class="no-underline hover:underline text-black" href="/groupe/{{$groupe->id}}">
                          {{$groupe->name_groupe}}
                        </a>
                    </h1>

                    <h3 class="text-lg">
                        <a class="no-underline hover:underline text-black" href="/livre/{{$groupe->id_book}}">
                          {{$groupe->title}}
                        </a>
                    </h3>

                </header>

                <footer class="flex items-center justify-between leading-none p-2 md:p-4">
                    <form method="POST" action="/groupe/join/{{$groupe->id}}">
                        @csrf
                        <button><h6 class="text-red-700" >rejoindre</h6></button>
                    </form>
                    <a class="flex items-center no-underline hover:underline text-black" href="#">
                        <p class="ml-2 text-sm">
                          {{$groupe->auteur}}
                        </p>
                    </a>

                    {{-- <a class="no-underline text-grey-darker hover:text-red-dark" href="#">
                        <span class="hidden">Like</span>
                        <i class="fa fa-heart"></i>
                    </a> --}}
                </footer>

            </article>
           </a>
            <!-- END Article -->
</div>




