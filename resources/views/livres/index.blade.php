<x-layout>
    @include('partials._hero')
    @include('partials._search')
<!-- ====== Cards Section Start -->
<section>
    <div class="container mx-auto">
      <div class="-mx-4 flex flex-wrap">
        <x-listing-card :livre />
    </div>
  </section>
  <!-- ====== Cards Section End -->

</x-layout>
