<x-layout>
    <link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/styles/tailwind.css">
<link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">
<main class="profile-page">
  <section class="relative block h-500-px">
    <div class="absolute top-0 w-full h-full bg-center bg-cover" style="
            background-image: url('https://images.unsplash.com/photo-1499336315816-097655dcfbda?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=2710&amp;q=80');
          ">
      <span id="blackOverlay" class="w-full h-full absolute opacity-50 bg-black"></span>
    </div>
    <div class="top-auto bottom-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden h-70-px" style="transform: translateZ(0px)">
      <svg class="absolute bottom-0 overflow-hidden" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" version="1.1" viewBox="0 0 2560 100" x="0" y="0">
        <polygon class="text-blueGray-200 fill-current" points="2560 0 2560 100 0 100"></polygon>
      </svg>
    </div>
  </section>
  <section class="relative py-16 bg-blueGray-200">
    <div class="container mx-auto px-4">
      <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-xl rounded-lg -mt-64">
        <div class="px-6">
          <div class="flex flex-wrap justify-center">
            <div class="w-full lg:w-3/12 px-4 lg:order-2 flex justify-center">
              <div class="relative">
                <img alt="..." src="https://demos.creative-tim.com/notus-js/assets/img/team-2-800x800.jpg" class="shadow-xl rounded-full h-auto align-middle border-none absolute -m-16 -ml-20 lg:-ml-16 max-w-150-px">
              </div>
            </div>
            <div class="w-full lg:w-4/12 px-4 lg:order-3 lg:text-right lg:self-center">
              <div class="py-6 px-3 mt-32 sm:mt-0">
                <button class="bg-pink-500 active:bg-pink-600 uppercase text-white font-bold hover:shadow-md shadow text-xs px-4 py-2 rounded outline-none focus:outline-none sm:mr-2 mb-1 ease-linear transition-all duration-150" type="button">
                  Connect
                </button>
              </div>
            </div>
            <div class="w-full lg:w-4/12 px-4 lg:order-1">
              <div class="flex justify-center py-4 lg:pt-4 pt-8">
                <div class="mr-4 p-3 text-center">
                  <span class="text-xl font-bold block uppercase tracking-wide text-blueGray-600">22</span><span class="text-sm text-blueGray-400">groupes</span>
                </div>
                <div class="mr-4 p-3 text-center">
                  <span class="text-xl font-bold block uppercase tracking-wide text-blueGray-600">10</span><span class="text-sm text-blueGray-400">favorites</span>
                </div>
                <div class="lg:mr-4 p-3 text-center">
                  <span class="text-xl font-bold block uppercase tracking-wide text-blueGray-600">89</span><span class="text-sm text-blueGray-400">Comments</span>
                </div>
              </div>
            </div>
          </div>
          <div class="text-center mt-12">
            <h3 class="text-4xl font-semibold leading-normal mb-2 text-blueGray-700 mb-2">
              Jenna Stones
            </h3>
            <div class="text-sm leading-normal mt-0 mb-2 text-blueGray-400 font-bold uppercase">
              <i class="fas fa-map-marker-alt mr-2 text-lg text-blueGray-400"></i>
              Los Angeles, California
            </div>
            <div class="mb-2 text-blueGray-600 mt-10">
              <i class="fas fa-briefcase mr-2 text-lg text-blueGray-400"></i>Solution Manager - Creative Tim Officer
            </div>
            <div class="mb-2 text-blueGray-600">
              <i class="fas fa-university mr-2 text-lg text-blueGray-400"></i>University of Computer Science
            </div>
          </div>
        </div>
      </div>
      <!-- component -->
<style>
    .top-100 {top: 100%}
    .bottom-100 {bottom: 100%}
    .max-h-select {
        max-height: 300px;
    }
</style>
<h3 class="p-10 text-center text-4xl font-semibold leading-normal text-blueGray-700">
    Groupes
    </h3>
<div class="flex flex-col items-center">

    <div class="w-full md:w-1/2 flex flex-col items-center h-20">

        <div class="w-full px-4">
            <div class="flex flex-col items-center relative">

 <select name="" id=""  class= "border-none absolute shadow bg-white top-100 z-40 w-full lef-0 rounded max-h-select overflow-y-auto svelte-5uyqqj">
<option value=""  class="cursor-pointer w-full border-gray-100 rounded-t border-b hover:bg-teal-100">

</option>
                    </select>

                </div>
            </div>
        </div>
    </div>
</div>
    </div>

    {{-- <footer class="relative bg-blueGray-200 pt-8 pb-6 mt-8">
  <div class="container mx-auto px-4">
    <div class="flex flex-wrap items-center md:justify-between justify-center">
      <div class="w-full md:w-6/12 px-4 mx-auto text-center">
        <div class="text-sm text-blueGray-500 font-semibold py-1">
          Made with <a href="https://www.creative-tim.com/product/notus-js" class="text-blueGray-500 hover:text-gray-800" target="_blank">Notus JS</a> by <a href="https://www.creative-tim.com" class="text-blueGray-500 hover:text-blueGray-800" target="_blank"> Creative Tim</a>.
        </div>
      </div>
    </div>
  </div>
</footer> --}}
<!-- Gogole Fonts -->

<h3 class="pt-10 text-center text-4xl font-semibold leading-normal text-blueGray-700">
   favorites
  </h3>
<div class="grid grid-cols-6 gap-5  ">
    <div
        class="col-span-6 mt-5 bg-opacity-50 border border-gray-100 rounded shadow-lg cursor-pointer bg-gradient-to-b from-gray-200 backdrop-blur-20 to-gray-50 md:col-span-3 lg:col-span-2 ">
        <div class="flex flex-row px-2 py-3 mx-3">

            <div class="flex flex-col mt-1 mb-2 ml-4">
                <div class="text-sm text-gray-600">Garlic Butter Steak Bites</div>
                <div class="flex w-full mt-1">
                    <div class="mr-1 text-xs text-blue-700 cursor-pointer font-base">
                        New York
                    </div>
                    <div class="text-xs text-gray-600">
                        • By 7th corner
                    </div>
                </div>
            </div>
        </div>

        <div class="flex justify-center px-2 mx-3 my-2 text-sm font-medium text-gray-400">
            <img class="w-[300px] h-[300px] rounded-full shadow-2xl object-cover"
                src="https://picsum.photos/200">

        </div>


    </div>
    <div
        class="col-span-6 mt-5 bg-opacity-50 border border-gray-100 rounded shadow-lg cursor-pointer bg-gradient-to-b from-gray-200 backdrop-blur-20 to-gray-50 md:col-span-3 lg:col-span-2 ">
        <div class="flex flex-row px-2 py-3 mx-3">

            <div class="flex flex-col mt-1 mb-2 ml-4">
                <div class="text-sm text-gray-600">Instant Pot Beef Stew</div>
                <div class="flex w-full mt-1">
                    <div class="mr-1 text-xs text-blue-700 cursor-pointer font-base">
                        Manhattan
                    </div>
                    <div class="text-xs text-gray-600">
                        • By Shines
                    </div>
                </div>
            </div>
        </div>

        <div class="flex justify-center px-2 mx-3 my-2 text-sm font-medium text-gray-400">
            <img class="w-[300px] h-[300px] rounded-full shadow-2xl object-cover"
                src="https://picsum.photos/200">

        </div>


    </div>
    <div
        class="col-span-6 mt-5 bg-opacity-50 border border-gray-100 rounded shadow-lg cursor-pointer bg-gradient-to-b from-gray-200 backdrop-blur-20 to-gray-50 md:col-span-3 lg:col-span-2 ">
        <div class="flex flex-row px-2 py-3 mx-3">

            <div class="flex flex-col mt-1 mb-2 ml-4">
                <div class="text-sm text-gray-600">Baked Spaghetti</div>
                <div class="flex w-full mt-1">
                    <div class="mr-1 text-xs text-blue-700 cursor-pointer font-base">
                        Las Vegas
                    </div>
                    <div class="text-xs text-gray-600">
                        • By Moonlight
                    </div>
                </div>
            </div>
        </div>

        <div class="flex justify-center px-2 mx-3 my-2 text-sm font-medium text-gray-400">
            <img class="w-[300px] h-[300px] rounded-full shadow-2xl object-cover "
                src="https://picsum.photos/200">

        </div>


    </div>

</div>

</main>
</x-layout>
