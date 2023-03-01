<x-layout>
    @foreach($groupe as $groupe)

    <div class="flex flex-col pt-20 items-center justify-center bg-gray-100 min-h-screen">
        <div class="w-full max-w-4xl bg-white rounded-lg shadow-md p-8">
          <div class="flex flex-col md:flex-row md:space-x-6">
            <div class="md:w-1/3">
              <img
               @php $tab=explode("\\",$groupe->image);@endphp
              src="{{asset('storage/imagesbooks/'.$tab[6]) }}"
              alt="Book cover"
               class="w-full rounded-lg shadow-md">
            </div>
            <div class="md:w-2/3">
                <div class="flex gap-2">
                    <h1 class="text-3xl font-bold mb-4"> {{$groupe->name_groupe}} </h1>
                </div>
              <p class="text-gray-600 mb-2"><span class="font-bold">Author:</span>{{$groupe->auteur}}</p>
              <p class="text-gray-600 mb-6"><span class="font-bold">Books:</span>{{$groupe->auteur}}</p>
              <div class="  mb-6 mt-20">
                @foreach($commentaire as $commentaire)
                <hr>

                <div class="flex items-center gap-5">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M10 3h4a8 8 0 1 1 0 16v3.5c-5-2-12-5-12-11.5a8 8 0 0 1 8-8z" fill="rgba(97,106,108,1)"/></svg>
                  <p class="text-gray-600">{{$commentaire->commentaire}}</p>
                </div>
@endforeach

              </div>

    <form method="POST" class="flex gap-10 " action="/createcomment/{{$groupe->id}}" enctype="multipart/form-data">
        @csrf


    <div class="mb-6">
        <input type="text"  name="commentaire" class="border  text-gray-900 text-sm rounded-lg block w-full p-2.5  " placeholder="commentaire..." required>
    </div>

    <button type="submit" class="-mt-5"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M1.923 9.37c-.51-.205-.504-.51.034-.689l19.086-6.362c.529-.176.832.12.684.638l-5.454 19.086c-.15.529-.475.553-.717.07L11 13 1.923 9.37zm4.89-.2l5.636 2.255 3.04 6.082 3.546-12.41L6.812 9.17z"/></svg></button>
</form>



            </div>
          </div>
        </div>
      </div>
      @endforeach
    </x-layout>

