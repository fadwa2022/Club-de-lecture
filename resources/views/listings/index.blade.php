<x-layout>
@include('partials._hero')
@include('partials._search')
{{-- <h1>{{$heading}}</h1> --}}
{{-- @php
$test=1;
@endphp
{{$test}} --}}

{{-- @if(count($listings) == 0)
<p>No listings found <p>
@endif --}}
<div
class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4"
>
@unless (count($listings)==0)

@foreach($listings as $listing)
{{-- pour manipuler component --}}
<x-listing-card :listing="$listing" />

@endforeach

@else
<p>No listings found <p>
@endunless

</div>

<div class="mt-6 p-4">
    {{$listings->links()}}
</div>
</x-layout>
