<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
    <div class="flex flex-col">
        <x-flash-message />
        <h3 class="text-2xl font-bold">CATEGORIE</h3>

        <div>
            <x-modalcategorie />
        </div>

        <div class="overflow-x-auto sm:mx-0.5 lg:mx-0.5">
            <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                    <table class="min-w-full">
                        <thead class="bg-gray-200 border-b">
                            <tr>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                    #
                                </th>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                    categorie
                                </th>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                    update
                                </th>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                    delete
                                </th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($categories as $categorie)
                            <tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"> {{$categorie->id}}
                                </td>
                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                    <form method="POST" action="/categorie/{{$categorie->id}}" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')

                                        <input name="categorie" type="text" value="{{$categorie->categorie}}">
                                        @error('categorie')
                                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                        @enderror
                                </td>
                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                    <button class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">update</button>
                                </td>
                                </form>

                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                    <form method="POST" action="/categories/{{$categorie->id}}">
                                        @csrf
                                        @method('DELETE')
                                        <button class="text-red-500"><i class="fa-solid fa-trash"></i> Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <div class="flex flex-col mt-20">
        <x-flash-message />
        <h3 class="text-2xl font-bold">BOOKS</h3>
        <x-modallivre :categorie="$categories" />

        <div>
        </div>

        <div class="overflow-x-auto sm:mx-0.5 lg:mx-0.5">
            <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                <div>
                    <table class="min-w-full overflow-y-auto">
                        <thead class="bg-gray-200 border-b">
                            <tr>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                    #
                                </th>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                    title
                                </th>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                    discription
                                </th>

                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                    auteur
                                </th>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                    categorie
                                </th>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                    likes </th>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                    dislikes
                                </th>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                    update
                                </th>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                    delete
                                </th>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                    archiver
                                </th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($books as $book )
                            <tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"> {{$categorie->id}}
                                </td>
                                <form method="POST" action="/book/{{$book->id}}" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">


                                        <input name="title" type="text" value="{{$book->title}}">
                                        @error('title')
                                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                        @enderror
                                    </td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">

                                        <input name="discription" type="text" value="{{$book->discription}}">
                                        @error('discrition')
                                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                        @enderror
                                    </td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">

                                        <input name="auteur" type="text" value="{{$book->auteur}}">
                                        @error('auteur')
                                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                        @enderror
                                    </td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        <select name="categorie_id" id="categorie" class="border  text-sm rounded-lg   block w-full p-2.5 ">
                                            <option selected >{{$book->categories_name}}</option>
                                            @foreach($categories as $categorie)
                                            <option value="{{$categorie->id}}">{{$categorie->categorie}}</option>
                                            @endforeach
                </div>
                </select>
                </td>
                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">

                    <input name="likes" type="text" value="{{$book->likes}}">
                    @error('likes')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </td>
                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">

                    <input name="dislikes" type="text" value="{{$book->dislikes}}">
                    @error('dislikes')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </td>
                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                    <button class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">update</button>
                </td>
                </form>

                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                    <form method="POST" action="/books/delete/{{$book->id}}">
                        @csrf
                        @method('DELETE')
                        <button class="text-red-500"><i class="fa-solid fa-trash"></i> Delete</button>
                    </form>
                </td>
                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                    <form method="POST" action="/books/archiver/{{$book->id}}">
                        @csrf
                        @method('PUT')
                        <button class="text-orange-500"><i class="fa-solid fa-trash"></i>Archiver</button>
                    </form>
                </td>
                </tr>
                @endforeach

                </tbody>
                </table>
            </div>
        </div>
    </div>



    <div class="flex flex-col mt-20">
        <x-flash-message />

        <h3 class="text-2xl font-bold">ARCHIVER</h3>

        <div class="overflow-x-auto sm:mx-0.5 lg:mx-0.5">
            <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                <div>
                    <table class="min-w-full overflow-y-auto">
                        <thead class="bg-gray-200 border-b">
                            <tr>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                    #
                                </th>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                    title
                                </th>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                    discription
                                </th>

                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                    auteur
                                </th>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                    categorie
                                </th>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                    likes </th>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                    dislikes
                                </th>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                    delete
                                </th>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                    desarchiver
                                </th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($booksarchiver as $archiver )
                            <tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"> {{$categorie->id}}
                                </td>
                                <form method="POST" action="/book/{{$archiver->id}}" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">


                                        <input name="title" type="text" value="{{$archiver->title}}">
                                        @error('title')
                                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                        @enderror
                                    </td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">

                                        <input name="discription" type="text" value="{{$archiver->discription}}">
                                        @error('discrition')
                                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                        @enderror
                                    </td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">

                                        <input name="auteur" type="text" value="{{$archiver->auteur}}">
                                        @error('auteur')
                                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                        @enderror
                                    </td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        <select name="categorie_id" id="categorie" class="border  text-sm rounded-lg   block w-full p-2.5 ">
                                            <option selected >{{$archiver->categories_name}}</option>
                                            @foreach($categories as $categorie)
                                            <option value="{{$categorie->id}}"> {{$categorie->categorie}} </option>
                                            @endforeach
                </div>
                </select>
                </td>
                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">

                    <input name="likes" type="text" value="{{$archiver->likes}}">
                    @error('likes')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </td>
                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">

                    <input name="dislikes" type="text" value="{{$archiver->dislikes}}">
                    @error('dislikes')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </td>
                </form>

                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                    <form method="POST" action="/books/delete/{{$archiver->id}}">
                        @csrf
                        @method('DELETE')
                        <button class="text-red-500"><i class="fa-solid fa-trash"></i> Delete</button>
                    </form>
                </td>
                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                    <form method="POST" action="/books/desarchiver/{{$archiver->id}}">
                        @csrf
                        @method('PUT')
                        <button class="text-orange-500"><i class="fa-solid fa-trash"></i>Desrchiver</button>
                    </form>
                </td>
                </tr>
                @endforeach

                </tbody>
                </table>
            </div>
        </div>
    </div>


    <div class="flex flex-col mt-20">
        <x-flash-message />
        <h3 class="text-2xl font-bold">USERS</h3>



        <div class="overflow-x-auto sm:mx-0.5 lg:mx-0.5">
            <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                    <table class="min-w-full">
                        <thead class="bg-gray-200 border-b">
                            <tr>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                    #
                                </th>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                  name
                                </th>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                   email
                                </th>

                            </tr>
                        </thead>
                        <tbody>

                            @foreach($users as $user)
                            <tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"> {{$user->id}}
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"> {{$user->name}}
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"> {{$user->email}}
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="flex flex-col mt-20">
        <x-flash-message />
        <h3 class="text-2xl font-bold">GROUPES</h3>



        <div class="overflow-x-auto sm:mx-0.5 lg:mx-0.5">
            <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                    <table class="min-w-full">
                        <thead class="bg-gray-200 border-b">
                            <tr>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                    #
                                </th>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                  groupe
                                </th>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                  createur
                                  </th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($groupes as $groupe)
                            <tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"> {{$groupe->id}}
                                </td>


                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"> {{$groupe->name_groupe}}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"> {{$groupe->user_name}}
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
