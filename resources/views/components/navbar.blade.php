<nav class="fixed top-0 z-10 flex items-center w-full h-16 px-8 text-xl text-white bg-gray-800 shadow-md font-montserrat"
x-data="{accOpt:false}" >
    <ul class="flex w-full gap-x-8">
        {{-- <li><a href="">Home</a></li> --}}
        <li><a href="{{route('neworder')}}">New Order</a></li>
        <li><a href="{{route('orders')}}">History</a></li>
        @cannot('admin-access')
            <li><a href="">Edit Menu</a></li> 
            <li><a href="">Manage Employee</a></li> 
        @endcan
        <li class="flex justify-center ml-auto">
            <button @click="accOpt=!accOpt" @click.oustide="accOpt=false">
                Account
            </button>
            <div x-show="accOpt" class="fixed flex flex-col justify-center px-2 py-2 mt-8 font-sans text-center bg-gray-100 rounded-lg shadow-md text-zinc-500 text-md gap-y-2">
                <a href="" class="w-24 py-1 text-white bg-yellow-500 rounded-lg">Edit</a>
                <a href="" class="w-24 py-1 text-white bg-red-500 rounded-lg">Logout</a>
            </div>
        </li>
        
    </ul>
    
</nav>x