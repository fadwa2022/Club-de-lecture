<form id="search" action="">
    <div class="relative border-2 border-gray-100 m-4 rounded-lg">
        <div class="absolute top-4 left-3">
            <i
                class="fa fa-search text-gray-400 z-20 hover:text-gray-500"
            ></i>
        </div>
        <input
            type="text"
            name="search"
            class="h-14 w-full pl-10 pr-20 rounded-lg z-0 focus:shadow focus:outline-none"
            placeholder="Search Laravel Gigs..."
        />
        <div class="absolute top-2 right-2">
            <button
                type="submit"
                class="h-10 w-20 text-white rounded-lg bg-red-400 hover:bg-red-400"
            >
                Search
            </button>
        </div>
    </div>
<div class="relative border-2 border-gray-100 m-4 rounded-lg">
  <select id="categorie" class="border bg-red-400  text-sm rounded-lg   block w-full p-2.5 ">
  <option selected>Choose a country</option>
  @foreach($categories as $categorie)

  <option  value="{{$categorie->id}}">{{$categorie->categorie}}</option>
@endforeach
</div>
</select>

</form>
{{-- <script>
    document.getElementById('').addEventListener('change', function() {
        document.getElementById('search').submit();
    });
</script> --}}
<script>
    document.getElementById('categorie').addEventListener('change', function() {
        var categorieId = this.value;
        window.location.href = 'http://127.0.0.1:8000/?search=' + categorieId ;
    });
</script>









