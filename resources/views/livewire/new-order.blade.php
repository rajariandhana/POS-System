<div class="flex w-full h-fit ">
    <div class="fixed top-0 right-0 z-0 flex justify-center items-center w-1/3 h-full bg-gray-900">
        {{-- THIS IS FOR THE GRAY DARK BG AT THE RIGHT SIDE --}}
    </div>

    @if (session('success')||session('failure'))
        <div class="fixed top-0 right-0 left-0 z-20 flex justify-center items-center w-full h-full">
            <div class="fixed top-0 right-0 left-0 z-20 flex justify-center items-center w-full h-full bg-black opacity-60"></div>
            @if (session('success'))
            <button class="fixed bg-green-100 top border-4 border-green-500 z-20 text-green-500 w-[400px] h-40 items-center justify-center flex text-center text-2xl rounded-xl mb-4"
                wire:click="ExitStatus()">
                {{ session('success') }}
            </button>
            @else
            <button class="fixed bg-red-100 top border-4 border-red-500 z-30 text-red-500 w-[400px] h-40 items-center justify-center flex text-center text-2xl rounded-xl mb-4"
                wire:click="ExitStatus()">
                {{ session('failure') }}
            </button>
            @endif

        </div>
    @endif
    <div class="flex flex-col w-2/3 h-fit items-center justify-start py-2 gap-8">
        @if ($status=='PAYMENT')
        {{-- <div class="w-96"> --}}
            <img class="w-96 h-[500px] object-cover my-8 bg-gray-800 rounded-xl" src="{{asset('QR_GOPAY.PNG')}}" alt="">
            <span class="w-96 bg-gray-800 text-white rounded-xl py-4 text-center text-xl">
                Total Pembayaran: Rp {{$subtotal}}.000
            </span>
        {{-- </div> --}}
        @else   
            @foreach ($categories as $category)
            <div class="w-full px-2 gap-2">
                <h2 class="text-xl text-center mb-2">{{$category->name}}</h2>
                <div class="grid grid-cols-2 w-full gap-2 lg:grid-cols-3">
                    @foreach ($category->products as $product)
                        <button wire:click="ChangeQty('{{$product->id}}',1)" class="w-full bg-white rounded-xl shadow-md flex justify-between items-center px-4 py-4">
                            <h3>{{$product->name}}</h3>
                            <span class="text-zinc-500">{{$product->price}}</span>
                        </button>
                    @endforeach
                </div>
            </div>
            @endforeach
        @endif

    </div>

    <div class="flex flex-col w-1/3 h-full p-2 z-0">
        <div class="flex flex-col gap-y-2 pb-12">
            <span class="text-xl text-center text-white">Order Summary</span>
            @foreach ($items as $item)
                <div class="px-4 py-2 flex w-full justify-between bg-white rounded-lg items-center shadow-md">
                    <div class="flex flex-col">
                        <span>{{$item['name']}}</span>
                        <span class="text-zinc-500">{{$item['price']}}K</span>
                    </div>
                    <div class="bg-gray-800 px-4 py-2 gap-x-2 flex justify-between text-white text-2xl rounded-xl"
                    x-data="{count:0}">
                        @if ($status!='PAYMENT')
                        <button wire:click="ChangeQty('{{$item['id']}}',-1)">-</button>
                        <span x-text="" class="w-10 text-center">{{$item['qty']}}</span>
                        <button wire:click="ChangeQty('{{$item['id']}}',1)">+</button>
                        @else
                        <span x-text="" class="w-10 text-center">{{$item['qty']}}</span>
                        @endif

                    </div>
                </div>
            @endforeach
        </div>
        <div class="fixed bottom-0 w-1/3 flex justify-between items-center px-4 py-4 bg-gray-800 text-white gap-4 right-0">
            @if ($status=='PAYMENT')
            <button wire:click="Cancel()"  class="bg-red-500 px-2 py-4 rounded-lg w-1/3">Cancel</button>
            <button wire:click="Confirmed()" class="bg-green-500 px-2 py-4 rounded-lg w-2/3">Payment Confirmed</button>
            @else
                <span class="">Subtotal: Rp {{$subtotal}}K</span>
                <div class="items-center flex gap-x-2">
                    <button wire:click="EmptyCart()"  class="bg-red-500 px-4 py-2 rounded-lg">
                        <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
                        </svg>
                    </button>
                    <button wire:click="Next()" class="bg-green-500 px-4 py-2 rounded-lg">NEXT</button>
                </div>
            @endif

        </div>
    </div>
</div>
