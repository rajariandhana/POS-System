<x-guest title="Login">
    {{-- @livewire('login') --}}
    <div class="flex items-center justify-center w-full h-screen overflow-hidden">
        <form class="flex flex-col gap-4 p-4 bg-gray-900 rounded-lg shadow-lg" action="/login" method="POST">
            @csrf
            <div>
                <label for="username" class="block text-sm font-medium text-white ">Your username</label>
                <input type="text" name="username" id="username" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg block w-full p-2.5" >
            </div>
            <div>
                <label for="password" class="block text-sm font-medium text-white">Your password</label>
                <input type="password" name="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg block w-full p-2.5 " >
            </div>
            <button type="submit" class="w-full text-white bg-indigo-500 font-medium rounded-lg text-sm px-5 py-2.5 text-center mt-4">Login</button>
        </form>
    </div>    
</x-guest>