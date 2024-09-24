<x-guest title="Login">
    {{-- @livewire('login') --}}
    <div class="flex items-center justify-center w-full h-screen overflow-hidden">
        <form class="flex flex-col gap-4 p-4 bg-white rounded-lg shadow-lg w-fit" action="/login" method="POST">
            @csrf
            <div class="mb-2 text-left">
                <label class="block mb-1 text-sm font-medium ">Username</label>
                <input type="text" name="username"
                    class="block p-2 text-sm border border-gray-300 rounded-lg bg-gray-50 w-96"
                    :value="old('username')"
                    />
                @error('username')
                    <span class="text-xs text-red-500">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div class="mb-2 text-left">
                <label class="block mb-1 text-sm font-medium ">Password</label>
                <input type="password" name="password"
                    class="block p-2 text-sm border border-gray-300 rounded-lg bg-gray-50 w-96"/>
                @error('password')
                    <span class="text-xs text-red-500">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <button type="submit" class="text-white bg-indigo-500 font-medium rounded-lg text-sm px-5 py-2.5 text-center w-fit">Login</button>
        </form>
    </div>
</x-guest>
