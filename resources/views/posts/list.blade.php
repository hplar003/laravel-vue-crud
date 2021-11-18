<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title inertia>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        <!-- Scripts -->
        @routes
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased h-screen">
        <div id="app">
            <header class="bg-gray-100 md:bg-transparent lg:bg-transparent py-6 tracking-wider font-semibold">
                <div class="container mx-auto flex flex-row justify-between  px-6 ">
                    <div>
                        <a href="{{ url('/') }}" class=" flex flex-row flex-shrink text-lg font-extrabold text-gray-800 no-underline">
                           <span class="pt-3">Blog</span>
                        </a>
                    </div>
                    
                    <nav class="space-x-4 text-gray-800 font-extrabold text-sm sm:text-base">
                    <div class="hidden md:flex lg:block md:justify-between lg:justify-between space-x-4">   
                        <a class="no-underline hover:underline hover:text-gray-400" href="/">Home</a>
                        <a class="no-underline hover:underline hover:text-gray-400" href="/posts">Posts</a>
                        @yield('menu')
    
                @if (Auth::check())
                    <a class="no-underline hover:underline hover:text-gray-400" href="/posts/{{ Auth::user()->id }}">My Posts </a>
              
                   
                @endif
    
                        @guest
                            
                            <a class="no-underline hover:underline hover:text-gray-400" href="{{ route('login') }}">{{ __('Login') }}</a>
                            @if (Route::has('register'))
                                <a class="no-underline hover:underline hover:text-gray-400 transition-color duration-200" href="{{ route('register') }}">Sign Up</a>
                            @endif
                        @else
                            <span>{{ Auth::user()->name }}</span>
    
                            <a href="{{ route('logout') }}"
                               class="no-underline hover:underline"
                               onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                {{ csrf_field() }}
                            </form>
                        @endguest
                        
                        
                    </div>
                    {{-- mobile  hamburger--}}
                    <div class="flex flex-row items-center md:hidden lg:hidden ">
                        <button class="mobile-menu-button">
                            <svg  xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="#667389">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                        </button>
                    </div>
                    </nav>
                </div>
                {{-- mobile menu --}}
                <div class=" px-10 blur  text-gray-700 mobile-menu hidden">
                
                    <a class="block py-2 px-4 text-sm" href="/">Home</a>
                    <a class="block py-2 px-4 text-sm" href="/recipes">Recipes</a>
                    @if (Auth::check())
                    <a class="block py-2 px-4 text-sm" href="/recipes/my_recipe/{{ Auth::user()->id }}">My Recipes </a>
                    <a class="block py-2 px-4 text-sm" href="/recipes/create">Create Recipe</a>
                   
                @endif
    
                        @guest
                            
                            <a class="block py-2 px-4 text-sm" href="{{ route('login') }}">{{ __('Login') }}</a>
                            @if (Route::has('register'))
                                <a class="block py-2 px-4 text-sm" href="{{ route('register') }}">Sign Up</a>
                            @endif
                        @else
                            <span>{{ Auth::user()->name }}</span>
    
                            <a href="{{ route('logout') }}"
                               class="no-underline hover:underline"
                               onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                {{ csrf_field() }}
                            </form>
                        @endguest
                </div>
            </header>
          
    
{{-----------------------------------------content ------------------------------------------}}

<div class=" flow-root md:grid   md:grid-cols-1 lg:grid-cols-1 w-full h-full md:100-full  bg-white md:py-10 lg:py-10">
    <div class="flow-root  w-full m-auto sm:min-h-full  " >
        <img src="{{ asset('/img/hero.jpg') }}" alt=""  class="bg-transparent" >
    </div>

</div>

{{-- latest Post --}}
<div class="pt-6 pb-12 bg-white-100">  

    <div id="card" class="">
      <h2 class="text-center font-serif text-gray-500 uppercase text-4xl xl:text-5xl pb-5">All Posts</h2>
      <!-- container for all cards -->

      @foreach ($posts as $post )
    <a href="/recipes/{{ $post->slug }}">
        <div class="container w-100 lg:w-4/5 mx-auto flex flex-col">
            <!-- card -->
        <div class="flex flex-col md:flex-row overflow-hidden
            bg-white rounded-lg shadow-xl  mt-4 w-100 mx-2">
          <!-- media -->
         
          <!-- content -->
          <div class="w-full py-4 px-6 text-gray-800 flex flex-col justify-between">
            <h3 class="font-semibold underline leading-tight truncate text-2xl" ><a href="/posts/{{ $post->id }}">{{ $post->title }}</a></h3>
            <p class="mt-2">
              {{ $post->content }}
            </p>
            <p class="text-sm text-gray-700 uppercase tracking-wide font-semibold mt-2">
              {{ $post->user->name }} &bull; {{ date('jS M Y',strtotime($post->created_at)) }}
            </p>
          </div>
        </div><!--/ card-->
      </div><!--/ flex-->
    </a>
      @endforeach

    </div>
   
  </div>




    <div class="m-auto sm:m-auto text-left w-4/5 block">
      <div class="px-4 pt-3 pb-4 border-b -mx-4 border-gray-400">
        <div class="max-w-xl mx-auto">
            <h2 class="text-xl text-left inline-block font-semibold text-gray-800">Join Our Newsletter</h2>
            <p class="text-gray-700 text-xs pl-px">
                Latest news ,articles and updates montly delevered to your inbox.
            </p>
            <form action="newsletter" class="mt-2">
                <div class="flex items-center">
                    <input type="email" class="w-full px-2 py-4 mr-2 bg-gray-100 shadow-inner rounded-md border border-gray-400 focus:outline-none " placeholder="Enter email address" required>

                    <button class="bg-pink-400 text-gray-200 px-5 py-2 rounded shadow " style="margin-left: -7.8rem;">Sign Up</button>
                </div>
            </form>
        </div>
    </div>
    </div>
</div>
        </div>


        @env ('local')
            <script src="http://localhost:3000/browser-sync/browser-sync-client.js"></script>
        @endenv
    </body>
</html>


