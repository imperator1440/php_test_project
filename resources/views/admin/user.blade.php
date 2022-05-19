<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>NEWS</title>

        <link href="https://unpkg.com/tailwindcss@2.0.3/dist/tailwind.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    </head>
    <body>
        <div>
            <div x-data="{ sidebarOpen: false }" class="flex h-screen bg-gray-200">
                <div :class="sidebarOpen ? 'block' : 'hidden'" @click="sidebarOpen = false" class="fixed z-20 inset-0 bg-black opacity-50 transition-opacity lg:hidden"></div>

                <div :class="sidebarOpen ? 'translate-x-0 ease-out' : '-translate-x-full ease-in'" class="fixed z-30 inset-y-0 left-0 w-64 transition duration-300 transform bg-gray-900 overflow-y-auto lg:translate-x-0 lg:static lg:inset-0">
                    <div class="flex items-center justify-center mt-8">
                        <div class="flex items-center">
                            <h1 style="color:white">Menu</h1>
                        </div>
                    </div>

                    <nav class="mt-10">
                        <a class="flex items-center mt-4 py-2 px-6 bg-gray-700 bg-opacity-25 text-gray-100" href="{{route('admin.posts.index')}}">
                            
                            <span class="mx-3">Posts</span>
                        </a>
                        <a class="flex items-center mt-4 py-2 px-6 bg-gray-700 bg-opacity-25 text-gray-100" href="">
                            
                            <span class="mx-3">Users</span>
                        </a>
                    </nav>
                </div>

                <div class="flex-1 flex flex-col overflow-hidden">
                    <header class="flex justify-between items-center py-4 px-6 bg-white border-b-4 border-indigo-600">
                        <div class="flex items-center">
                            <button @click="sidebarOpen = true" class="text-gray-500 focus:outline-none lg:hidden">
                                <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M4 6H20M4 12H20M4 18H11" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                          stroke-linejoin="round"></path>
                                </svg>
                            </button>
                        </div>

                        <div class="flex items-center">
                            <div x-data="{ dropdownOpen: false }" class="relative">
                               <h1>Admin</h1>

                                <div x-show="dropdownOpen" @click="dropdownOpen = false" class="fixed inset-0 h-full w-full z-10"
                                     style="display: none;"></div>

                                <div x-show="dropdownOpen"
                                     class="absolute right-0 mt-2 w-48 bg-white rounded-md overflow-hidden shadow-xl z-10"
                                     style="display: none;">
                                    <a href="{{route("admin.logout")}}"
                                       class="block px-4 py-2 text-sm text-gray-700 hover:bg-indigo-600 hover:text-white">Exit</a>
                                </div>
                            </div>
                        </div>
                    </header>
                    <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
                        <div class="container mx-auto px-6 py-8">
                            <h3 class="text-gray-700 text-3xl font-medium">Users</h3>

                            <div class="flex flex-col mt-8">
                                <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
                                    <div
                                            class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
                                        <table class="min-w-full">
                                            <thead>
                                            <tr>
                                                <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                                    Name</th>
                                                <th class="px-6 py-3 border-b border-gray-200 bg-gray-50"></th>
                                            </tr>
                                            </thead>

                                            <tbody class="bg-white">
                                                @foreach($users as $user)
                                                    <tr>
                                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                                            <div class="text-sm leading-5 text-gray-900">{{$user->name}} {{$user->email}}</div>
                                                        </td>

                                                        <td class="px-6 py-4 whitespace-no-wrap text-right border-b border-gray-200 text-sm leading-5 font-medium">
                                        
                                                            <form action="{{route("admin.users.destroy", $user->id)}} method="POST">
                                                                @csrf

                                                                @method('DELETE')

                                                                <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                                                            </fotm>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                {{$users->links()}}
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </main>
                </div>
            </div>
        </div>
    </body>
</html>
