<x-layout>
    @include('livres.partials._hero')
    @include('livres.partials._search')
<!-- ====== Cards Section Start -->
<section>

    <div class="container mx-auto">
      <div class="-mx-4 flex flex-wrap">
 @unless (count($livres)==0)

  @foreach($livres as $livre)
        <x-livre-card :livre="$livre" />
@endforeach

@else
<p>No livres found <p>
@endunless

</div>
    </div>
    <div class="mt-6 p-4">
    {{$livres->links()}}
</div>


  </section>
  <!-- ====== Cards Section End -->
  <section>
<div class="flex justify-between">
    <h1  class="p-5" style="    font-size: 30px;font-weight: 700;">GROUPES</h1>
       <x-modalegroupe :books="$books"  />

   </div>
    {{-- <div class="container mx-auto">
      <div class="-mx-4 flex flex-wrap"> --}}
        <div class="container my-12 mx-auto px-4 md:px-12">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 -mx-1 lg:-mx-4">

                <!-- Column -->
 @unless (count($groupes)==0)

  @foreach($groupes as $groupe)
        <x-groupe-card :groupe="$groupe" />
@endforeach

@else
<p>No livres found <p>
@endunless

            </div>
        </div>
    {{-- <div class="mt-6 p-4">
    {{$livres->links()}}
</div> --}}
  </section>

</x-layout>
