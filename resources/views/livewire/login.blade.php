<div class="flex items-center justify-center w-full h-screen overflow-hidden">
    <form wire:submit='login' class="flex flex-col gap-4 p-4 bg-gray-900 rounded-lg shadow-lg" action="#">
        @csrf
        <div>
            <label for="username" class="block text-sm font-medium text-white ">Your username</label>
            <input wire:model="username" type="text" name="username" id="username" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg block w-full p-2.5" >
        </div>
        <div>
            <label for="pin" class="block text-sm font-medium text-white">Your pin</label>
            <input wire:model="pin" type="number" name="pin" id="pin" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg block w-full p-2.5 " >
        </div>
        <button type="submit" class="w-full text-white bg-indigo-500 font-medium rounded-lg text-sm px-5 py-2.5 text-center mt-4">Login</button>
    </form>
</div>
