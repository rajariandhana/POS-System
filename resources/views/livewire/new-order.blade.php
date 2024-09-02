<div class="flex w-full h-fit ">
    <div class="fixed top-0 right-0 z-0 flex items-center justify-center w-1/3 h-full bg-gray-900">
        {{-- THIS IS FOR THE GRAY DARK BG AT THE RIGHT SIDE --}}
    </div>

    @if (session('SUCCESS')||session('FAILURE'))
        <div class="fixed top-0 left-0 right-0 z-20 flex items-center justify-center w-full h-full">
            <div class="fixed top-0 left-0 right-0 z-20 flex items-center justify-center w-full h-full bg-black opacity-60"></div>
            @if (session('SUCCESS'))
            <button class="fixed bg-green-100 top border-4 border-green-500 z-20 text-green-500 w-[400px] h-40 items-center justify-center flex text-center text-2xl rounded-xl mb-4"
                wire:click="ExitStatus()">
                {{ session('SUCCESS') }}
            </button>
            @else
            <button class="fixed bg-red-100 top border-4 border-red-500 z-30 text-red-500 w-[400px] h-40 items-center justify-center flex text-center text-2xl rounded-xl mb-4"
                wire:click="ExitStatus()">
                {{ session('FAILURE') }}
            </button>
            @endif

        </div>
    @endif
    <div class="flex flex-col items-center justify-start w-2/3 gap-8 py-2 h-fit">
        @if ($status=='PAYMENT')
        {{-- <div class="w-96"> --}}
            <img class="w-96 h-[500px] object-cover my-8 bg-gray-800 rounded-xl" src="{{asset('QR_GOPAY.PNG')}}" alt="">
            <span class="py-4 text-xl text-center text-white bg-gray-800 w-96 rounded-xl">
                Total Pembayaran: Rp {{$subtotal}}.000
            </span>
        {{-- </div> --}}
        @else   
            @foreach ($categories as $category)
            <div class="w-full gap-2 px-2">
                <h2 class="mb-2 text-xl text-center">{{$category->name}}</h2>
                <div class="grid w-full grid-cols-2 gap-2 lg:grid-cols-3">
                    @foreach ($category->products as $product)
                        <button wire:click="ChangeQty('{{$product->id}}',1)" class="flex items-center justify-between w-full px-4 py-4 bg-white shadow-md rounded-xl">
                            <h3>{{$product->name}}</h3>
                            <span class="text-zinc-500">{{$product->price}}</span>
                        </button>
                    @endforeach
                </div>
            </div>
            @endforeach
        @endif

    </div>

    <div class="z-0 flex flex-col w-1/3 h-full p-2">
        <div class="flex flex-col pb-12 gap-y-2">
            <span class="text-xl text-center text-white">Order Summary</span>
            @foreach ($items as $item)
                <div class="flex items-center justify-between w-full px-4 py-2 bg-white rounded-lg shadow-md">
                    <div class="flex flex-col">
                        <span>{{$item['name']}}</span>
                        <span class="text-zinc-500">{{$item['price']}}K</span>
                    </div>
                    <div class="flex justify-between px-4 py-2 text-2xl text-white bg-gray-800 gap-x-2 rounded-xl"
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
        <div class="fixed bottom-0 right-0 flex items-center justify-between w-1/3 gap-4 px-4 py-4 text-white bg-gray-800">
            @if ($status=='PAYMENT')
            <button wire:click="Cancel()"  class="w-1/3 px-2 py-4 bg-red-500 rounded-lg">Cancel</button>
            <button wire:click="Confirmed()" class="w-2/3 px-2 py-4 bg-green-500 rounded-lg">Payment Confirmed</button>
            @else
                <span class="">Subtotal: Rp {{$subtotal}}K</span>
                <div class="flex items-center gap-x-2">
                    <button wire:click="EmptyCart()"  class="px-4 py-2 bg-red-500 rounded-lg">
                        <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
                        </svg>
                    </button>
                    <button wire:click="Next()" class="px-4 py-2 bg-green-500 rounded-lg">NEXT</button>
                </div>
            @endif

        </div>
    </div>
</div>
