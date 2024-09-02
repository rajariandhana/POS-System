<nav class="top-0 fixed font-montserrat bg-gray-800 text-white w-full flex px-8 py-4 text-xl shadow-md"
x-data="{accOpt:false}" >
    <ul class="flex gap-x-8 w-full">
        {{-- <li><a href="">Home</a></li> --}}
        <li><a href="{{route('neworder')}}">New Order</a></li>
        <li><a href="">History</a></li>
        @cannot('admin-access')
            <li><a href="">Edit Menu</a></li> 
            <li><a href="">Manage Employee</a></li> 
        @endcan
        <li class="ml-auto flex justify-center">
            <button @click="accOpt=!accOpt" @click.oustide="accOpt=false">
                Account
            </button>
            <div x-show="accOpt" class="fixed mt-8 bg-gray-100 text-zinc-500 text-md text-center justify-center px-2 py-2 rounded-lg flex-col gap-y-2 flex shadow-md font-sans">
                <a href="" class="w-24 py-1 rounded-lg bg-yellow-500 text-white">Edit</a>
                <a href="" class="w-24 py-1 rounded-lg bg-red-500 text-white">Logout</a>
            </div>
        </li>
        
    </ul>
    
</nav>x