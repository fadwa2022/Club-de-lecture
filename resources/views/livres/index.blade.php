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
  </section>
  <!-- ====== Cards Section End -->

  <div class="mt-6 p-4">
    {{$livres->links()}}
</div>
</x-layout>
