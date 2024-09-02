<div class="flex w-full h-screen">
    <div class="flex flex-col w-2/3 h-full">
        @foreach ($categories as $category)
        <h2 class="ml-4 mb-0 text-xl">{{$category->name}}</h2>
        <div class="grid grid-cols-2 w-full px-2 gap-2 mb-4">
            @foreach ($category->products as $product)
                <button wire:click="ChangeQty('{{$product->id}}',1)" class="w-full bg-white rounded-xl shadow-md flex justify-between items-center px-4 py-4">
                    <h3>{{$product->name}}</h3>
                    <span class="text-zinc-500">{{$product->price}}</span>
                </button>
            @endforeach
        </div>
        @endforeach
    </div>

    <div class="flex flex-col w-1/3  h-full p-2">
        <div class="flex flex-col gap-y-2 pb-24">
            @foreach ($items as $item)
                <div class="px-4 py-2 flex w-full justify-between bg-white rounded-lg items-center shadow-md">
                    <div class="flex flex-col">
                        <span>{{$item['name']}}</span>
                        <span class="text-zinc-500">{{$item['price']}}K</span>
                    </div>
                    <div class="bg-gray-800 px-4 py-2 gap-x-2 flex justify-between text-white text-2xl rounded-xl"
                    x-data="{count:0}">
                        <button wire:click="ChangeQty('{{$item['id']}}',-1)">-</button>
                        <span x-text="" class="w-10 text-center">{{$item['qty']}}</span>
                        {{-- <button  @click="count++">+</button> --}}
                        <button wire:click="ChangeQty('{{$item['id']}}',1)">+</button>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="fixed bottom-0 w-1/3 flex justify-between items-center px-4 py-4 bg-gray-800 text-white">
            <span class="">Subtotal: Rp {{$subtotal}}K</span>
            <div class="items-center flex gap-x-2">
                <button wire:click="EmptyCart()"  class="bg-red-500 px-4 py-2 rounded-lg">
                    <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
                    </svg>
                </button>
                <button wire:click="Next()" class="bg-green-500 px-4 py-2 rounded-lg">NEXT</button>
            </div>
        </div>
    </div>
</div>
