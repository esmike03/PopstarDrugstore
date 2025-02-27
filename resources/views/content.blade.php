<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="{{ asset('IMAGES/popstaricon2.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <title>Admin - Popstar Drugstore</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>

<body class="font-mono flex bg-gray-100">

    <!-- Sidebar -->
    <aside
        class="fixed mt-20 left-0 top-0 w-64 h-screen bg-white shadow-lg p-4 transition-transform transform -translate-x-full sm:translate-x-0">
        <div class="flex items-center justify-between mb-6">


        </div>
        <nav>
            <ul class="space-y-2">
                <li>
                    <a href="/admin" class="block py-2 px-4 rounded hover:bg-green-100 text-gray-700">
                        <i class="fas fa-home mr-2"></i>Dashboard
                    </a>
                </li>
                {{-- <li>
                    <a href="/admin/orders" class="block py-2 px-4 rounded hover:bg-green-100 text-gray-700">
                        <i class="fas fa-shopping-cart mr-2"></i>Orders
                    </a>
                </li>
                <li>
                    <a href="/admin/users" class="block py-2 px-4 rounded hover:bg-green-100 text-gray-700">
                        <i class="fas fa-user mr-2"></i>Users
                    </a>
                </li> --}}
                <li>
                    <a href="/admin/messages" class="block py-2 px-4 rounded hover:bg-green-100 text-gray-700">
                        <i class="fas fa-envelope mr-2"></i>Messages
                    </a>
                </li>
                <li>
                    <a href="#" class="block py-2 px-4 rounded hover:bg-green-100 text-gray-700">
                        <i class="fas fa-newspaper mr-2"></i>Manage Content
                    </a>
                </li>
                <li>
                    <button id="settingsToggle"
                        class="w-full text-left block py-2 px-4 rounded hover:bg-green-100 text-gray-700 flex justify-between items-center">
                        <span><i class="fas fa-cogs mr-2"></i>Settings</span>
                        <i class="fas fa-chevron-down transition-transform duration-300"></i>
                    </button>
                    <ul id="settingsSublist" class="ml-6 mt-1 hidden space-y-2">
                        <li><a href="/addproducts" class="block py-2 px-4 rounded hover:bg-green-200 text-gray-700">Add
                                Products</a></li>
                        <li><a href="/modifyproducts"
                                class="block py-2 px-4 rounded hover:bg-green-200 text-gray-700">Modify Products</a>
                        </li>
                        <li><a href="/moresettings"
                                class="block py-2 px-4 rounded hover:bg-green-200 text-gray-700">More Settings</a></li>
                        <li><a href="/admin/changepassword"
                                class="block py-2 px-4 rounded hover:bg-green-200 text-gray-700">Change Password</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#" id="logout-btn" class="block py-2 px-4 rounded hover:bg-red-100 text-red-600">
                        <i class="fas fa-sign-out-alt mr-2"></i>Logout
                    </a>
                </li>
                <form id="logout-form" action="/auth/admin-logout" method="POST" style="display: none;">
                    @csrf
                </form>
            </ul>

        </nav>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 ml-0 sm:ml-64 p-4 transition-all">

            <header
                class="fixed   top-0 left-0 right-0 mb-2 px-4 shadow-xl bg-blue-700 z-50 backdrop-filter backdrop-blur-sm bg-opacity-80 ">
         <div
                class="relative mx-auto flex max-w-screen-lg flex-col py-4 sm:flex-row sm:items-center sm:justify-between">
                <div class="flex">
                    <button id="mobileMenuToggle" class="sm:hidden text-gray-600 text-xl">
                        <i class="fas fa-bars"></i>
                    </button>
                    <a class="flex items-center text-2xl font-black" href="/admin">
                        <img src="{{ asset('IMAGES/popstar2.png') }}" class="w-80 my-0" alt="BISU Logo" />
                    </a>
                </div>


            </div>
        </header>

        <section class="pt-24">
            <h1 class="text-2xl font-semibold">Manage Content</h1>

            <div class="grid grid-cols-2">
                <div class="bg-white border border-4 rounded-lg shadow relative m-10">
                    <div class="flex items-start justify-between p-5 border-b rounded-t">
                        <h3 class="text-xl font-semibold">
                            Add Member
                        </h3>
                    </div>
                    @if (session('error'))
                        <div class="p-4 m-1 text-sm text-red-700 bg-red-100 rounded-lg">
                            {{ session('error') }}
                        </div>
                    @endif
                    @if (session('success'))
                        <div class="p-4 m-1 text-sm text-green-700 bg-green-100 rounded-lg">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="p-6 space-y-6 ">
                        <form action="{{ route('member.store') }}" method="POST" class="grid grid-cols-2 gap-4"
                            enctype="multipart/form-data">
                            @csrf
                            <div class=" ">
                                <label for="member_name" class="block text-sm font-medium text-gray-700">Member
                                    Name</label>
                                <input type="text" id="member_name" name="member_name" required
                                    class=" p-2 w-full border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>
                            <div class=" ">
                                <label for="position" class="block text-sm font-medium text-gray-700">Position</label>
                                <input type="text" id="position" name="position" required
                                    class=" p-2 w-full border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>
                            <div class=" ">
                                <label for="image" class="block text-sm font-medium text-gray-700">Image</label>
                                <input type="file" id="image" name="image" required
                                    class=" p-2 w-full border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>
                            <div class="w-full h-full justify-center items-center object-center flex mt-2.5">
                                <button type="submit"
                                    class="px-4 py-2 w-full bg-blue-500 text-white rounded-lg hover:bg-blue-600">
                                    Add Member
                                </button>
                            </div>

                        </form>
                    </div>
                    <div class="px-6 py-2">
                        <h3 class="text-lg font-semibold">Member List</h3>
                        <table class="w-full text-xs border-collapse border border-gray-300 mt-2">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="border border-gray-300 px-4 py-2 ">Image</th>
                                    <th class="border border-gray-300 px-4 py-2">Name</th>
                                    <th class="border border-gray-300 px-4 py-2">Position</th>
                                    <th class="border border-gray-300 px-4 py-2">Action</th>
                                </tr>
                            </thead>
                            <tbody class="text-xs">
                                @foreach ($members as $key => $member)
                                    <tr>
                                        <td class="border border-gray-300 px-4 py-2"><img class="h-10 mx-auto"
                                                src="{{ isset($member->image) && !empty($member->image) ? asset('storage/' . $member->image) : asset('IMAGES/logowestpoint.png') }}"
                                                alt="Product Image" /></td>
                                        <td class="border border-gray-300 px-4 py-2">{{ $member->name }}</td>
                                        <td class="border border-gray-300 px-4 py-2">{{ $member->position }}</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">
                                            <form action="{{ route('member.destroy', $member->id) }}" method="POST"
                                                onsubmit="return confirm('Are you sure you want to delete this member?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="px-3 py-1 bg-red-500 text-white rounded-lg hover:bg-red-600">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                        <div class="mt-4 text-xs">
                            {{ $members->links() }} <!-- Pagination links -->
                        </div>
                    </div>
                </div>

                <div class="bg-white border border-4 rounded-lg shadow relative m-10">
                    <div class="flex items-start justify-between p-5 border-b rounded-t">
                        <h3 class="text-xl font-semibold">
                            Post
                        </h3>
                    </div>
                    @if (session('posterror'))
                        <div class="p-4 m-1 text-sm text-red-700 bg-red-100 rounded-lg">
                            {{ session('posterror') }}
                        </div>
                    @endif
                    @if (session('post'))
                        <div class="p-4 m-1 text-sm text-green-700 bg-green-100 rounded-lg">
                            {{ session('post') }}
                        </div>
                    @endif
                    <div class="p-6 space-y-6 ">
                        <form action="{{ route('post.store') }}" method="POST" class="grid grid-cols-2 gap-4"
                            enctype="multipart/form-data">
                            @csrf
                            <div class=" ">
                                <label for="image" class="block text-sm font-medium text-gray-700">Image <span
                                        class="text-blue-500">*1920x1080</span></label>
                                <input type="file" id="image" name="image" required
                                    class=" p-2 w-full border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>
                            <div class=" ">
                                <label for="desc"
                                    class="block text-sm font-medium text-gray-700">Description</label>
                                <input type="text" id="desc" name="desc"
                                    class=" p-2 w-full border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>
                            <div>

                            </div>
                            <div class="w-full h-full justify-center items-center object-center flex mt-2.5">
                                <button type="submit"
                                    class="px-4 py-2 w-full bg-blue-500 text-white rounded-lg hover:bg-blue-600">
                                    Post
                                </button>
                            </div>

                        </form>
                    </div>
                    <div class="px-6 py-2">
                        <h3 class="text-lg font-semibold">Post List</h3>
                        <table class="w-full text-xs border-collapse border border-gray-300 mt-2">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="border border-gray-300 px-4 py-2 ">Image</th>
                                    <th class="border border-gray-300 px-4 py-2">Description</th>
                                    <th class="border border-gray-300 px-4 py-2">Action</th>
                                </tr>
                            </thead>
                            <tbody class="text-xs">
                                @foreach ($adone as $key => $adones)
                                    <tr>
                                        <td class="border border-gray-300 px-4 py-2">
                                            <a
                                                href="{{ isset($adones->image) && !empty($adones->image) ? asset('storage/' . $adones->image) : asset('IMAGES/logowestpoint.png') }}">
                                                <img class="h-10 mx-auto"
                                                    src="{{ isset($adones->image) && !empty($adones->image) ? asset('storage/' . $adones->image) : asset('IMAGES/logowestpoint.png') }}"
                                                    alt="Product Image" />
                                            </a>

                                        </td>
                                        <td class="border border-gray-300 px-4 py-2">{{ $adones->desc }}</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">
                                            <form action="{{ route('post.destroy', $adones->id) }}" method="POST"
                                                onsubmit="return confirm('Are you sure you want to delete this member?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="px-3 py-1 bg-red-500 text-white rounded-lg hover:bg-red-600">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                        <div class="mt-4 text-xs">
                            {{ $adone->links() }} <!-- Pagination links -->
                        </div>
                    </div>
                </div>

                <div class="bg-white border border-4 rounded-lg shadow relative m-10">
                    <div class="flex items-start justify-between p-5 border-b rounded-t">
                        <h3 class="text-xl font-semibold">
                            Gallery
                        </h3>
                    </div>
                    @if (session('galleryerror'))
                        <div class="p-4 m-1 text-sm text-red-700 bg-red-100 rounded-lg">
                            {{ session('galleryerror') }}
                        </div>
                    @endif
                    @if (session('gallery'))
                        <div class="p-4 m-1 text-sm text-green-700 bg-green-100 rounded-lg">
                            {{ session('gallery') }}
                        </div>
                    @endif
                    <div class="p-6 space-y-6 ">
                        <form action="{{ route('post2.store') }}" method="POST" class="grid grid-cols-2 gap-4"
                            enctype="multipart/form-data">
                            @csrf
                            <div class=" ">
                                <label for="image" class="block text-sm font-medium text-gray-700">Image <span
                                        class="text-blue-500">*1920x1080</span></label>
                                <input type="file" id="image" name="image" required
                                    class=" p-2 w-full border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>
                            <div class=" ">
                                <label for="desc" class="block text-sm font-medium text-gray-700">Description</label>
                                <input type="text" id="desc" name="desc"
                                    class=" p-2 w-full border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>

                            <div>

                            </div>
                            <div class="w-full h-full justify-center items-center object-center flex mt-2.5">
                                <button type="submit"
                                    class="px-4 py-2 w-full bg-blue-500 text-white rounded-lg hover:bg-blue-600">
                                    Add
                                </button>
                            </div>

                        </form>
                    </div>
                    <div class="px-6 py-2">
                        <h3 class="text-lg font-semibold">Gallery List</h3>
                        <table class="w-full text-xs border-collapse border border-gray-300 mt-2">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="border border-gray-300 px-4 py-2 ">Image</th>
                                    <th class="border border-gray-300 px-4 py-2">Description</th>
                                    <th class="border border-gray-300 px-4 py-2">Action</th>
                                </tr>
                            </thead>
                            <tbody class="text-xs">
                                @foreach ($adtwo as $key => $adtwos)
                                    <tr>
                                        <td class="border border-gray-300 px-4 py-2">
                                            <a
                                                href="{{ isset($adtwos->image) && !empty($adtwos->image) ? asset('storage/' . $adtwos->image) : asset('IMAGES/logowestpoint.png') }}">
                                                <img class="h-10 mx-auto"
                                                    src="{{ isset($adtwos->image) && !empty($adtwos->image) ? asset('storage/' . $adtwos->image) : asset('IMAGES/logowestpoint.png') }}"
                                                    alt="Product Image" />
                                            </a>

                                        </td>
                                        <td class="border border-gray-300 px-4 py-2">{{ $adtwos->desc }}</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">
                                            <form action="{{ route('gallery.destroy', $adtwos->id) }}" method="POST"
                                                onsubmit="return confirm('Are you sure you want to delete this member?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="px-3 py-1 bg-red-500 text-white rounded-lg hover:bg-red-600">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                        <div class="mt-4 text-xs">
                            {{ $adtwo->links() }} <!-- Pagination links -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <script>
        document.getElementById('logout-btn').addEventListener('click', function(event) {
            event.preventDefault(); // Prevent default action

            Swal.fire({
                title: "Are you sure?",
                text: "You will be logged out.",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "Yes, Logout!"
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('logout-form').submit(); // Submit the logout form
                }
            });
        });

        // Sidebar Toggle for Mobile
        document.getElementById('sidebarToggle')?.addEventListener('click', function() {
            document.querySelector('aside').classList.toggle('-translate-x-full');
        });

        document.getElementById('mobileMenuToggle')?.addEventListener('click', function() {
            document.querySelector('aside').classList.toggle('-translate-x-full');
        });
        document.getElementById('settingsToggle').addEventListener('click', function() {
            let sublist = document.getElementById('settingsSublist');
            let icon = this.querySelector('i:last-child');

            sublist.classList.toggle('hidden');
            icon.classList.toggle('rotate-180');
        });
    </script>

</body>

</html>
