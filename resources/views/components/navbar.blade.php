<nav class="top-0 fixed bg-gray-800 text-white w-full flex px-8 py-4 text-xl shadow-md"
x-data="{accOpt:false}" >
    <ul class="flex gap-x-8 w-full">
        {{-- <li><a href="">Home</a></li> --}}
        <li><a href="">New Order</a></li>
        <li><a href="">History</a></li>
        <li class="ml-auto flex justify-end">
            <button @click="accOpt=!accOpt" @click.oustide="accOpt=false">
                Account
            </button>
            <ul x-show="accOpt" class="fixed mt-8 bg-gray-100 text-zinc-500 text-md text-center justify-center px-6 py-2 rounded-lg flex-col gap-y-2 flex shadow-md">
                <li><a href="">Edit</a></li>
                <li><a href="">Logout</a></li>
            </ul>
        </li>
        
    </ul>
    
</nav>x