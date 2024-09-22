<x-layout title="Register">
    {{-- @livewire('login') --}}
    @dump(App\Models\User::all())
    <div class="flex flex-col gap-4 p-4 text-sm text-gray-800">
        <a href="/employees" class="px-4 py-2 text-white rounded-lg shadow-md bg-rose-500 w-fit">&laquo; Back</a>
        <form class="flex flex-col gap-4 p-4 bg-white rounded-lg shadow-lg w-[600px]" action="/register" method="POST">
            @csrf
            <div class="flex flex-col gap-y-2">
                <div class="mb-2 text-left">
                    <label class="block mb-1 text-sm font-medium ">Employee name</label>
                    <input type="text" name="name"
                        class="block p-2 text-sm border border-gray-300 rounded-lg bg-gray-50 w-96"/>
                    @error('name')
                        <span class="text-xs text-red-500">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="flex flex-row gap-x-4">
                    <div class="mb-2 text-left">
                        <label class="block mb-1 text-sm font-medium ">Phone</label>
                        <input type="text" name="phone"
                            class="block w-64 p-2 text-sm border border-gray-300 rounded-lg bg-gray-50"/>
                        @error('phone')
                            <span class="text-xs text-red-500">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="mb-2 text-left">
                        <label class="block mb-1 text-sm font-medium ">Date of Birth</label>
                        <input type="date" name="birthdate"
                            class="block w-full h-10 p-2 text-sm border border-gray-300 rounded-lg bg-gray-50"/>
                        @error('birthdate')
                            <span class="text-xs text-red-500">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="mb-2 text-left">
                    <label class="block mb-1 text-sm font-medium ">Address</label>
                    <input type="text" name="category_name"
                        class="block w-full p-2 text-sm border border-gray-300 rounded-lg bg-gray-50"/>
                    @error('category_name')
                        <span class="text-xs text-red-500">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
            </div>
            <div class="flex flex-row gap-x-4">
                <div class="mb-2 text-left">
                    <label class="block mb-1 text-sm font-medium ">Username</label>
                    <input type="text" name="username"
                        class="block w-full p-2 text-sm border border-gray-300 rounded-lg bg-gray-50"/>
                    @error('username')
                        <span class="text-xs text-red-500">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="mb-2 text-left">
                    <label class="block mb-1 ml-2 text-sm font-medium ">PIN</label>
                    <input type="text" name="password"
                        class="block w-full p-2 text-sm border border-gray-300 rounded-lg bg-gray-50"/>
                    @error('password')
                        <span class="text-xs text-red-500">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="mb-2 text-left">
                    <label class="block mb-1 ml-2 text-sm font-medium ">Confirm PIN</label>
                    <input type="text" name="password_confirmation"
                        class="block w-full p-2 text-sm border border-gray-300 rounded-lg bg-gray-50"/>
                    @error('password_confirmation')
                        <span class="text-xs text-red-500">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
            </div>
            {{-- <div>
                <label for="name" class="block text-sm font-medium text-white ">Full name</label>
                <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg block w-full p-2.5" >
            </div>
            <div>
                <label for="phone" class="block text-sm font-medium text-white ">Phone</label>
                <input type="text" name="phone" id="phone" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg block w-full p-2.5" >
            </div>
            <div>
                <label for="address" class="block text-sm font-medium text-white ">Address</label>
                <input type="text" name="address" id="address" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg block w-full p-2.5" >
            </div>
            <div>
                <label for="username" class="block text-sm font-medium text-white ">Username</label>
                <input type="text" name="username" id="username" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg block w-full p-2.5" >
            </div>
            <div>
                <label for="password" class="block text-sm font-medium text-white">Password</label>
                <input type="password" name="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg block w-full p-2.5 " >
            </div>
            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-white">Confirm password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg block w-full p-2.5 " >
            </div> --}}
            <button type="submit" class="text-white bg-indigo-500 font-medium rounded-lg text-sm px-5 py-2.5 text-center w-fit">Create Employee</button>
        </form>
    </div>    
</x-layout>