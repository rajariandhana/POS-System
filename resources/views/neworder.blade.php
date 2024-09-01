<x-layout title="New Order">
    <div class="flex w-full  h-screen">
        <div class="grid grid-cols-2 w-2/3 p-2 gap-2">
            <div class="w-full bg-white rounded-xl shadow-md"></div>
            <div class="w-full bg-white rounded-xl shadow-md"></div>
            <div class="w-full bg-white rounded-xl shadow-md"></div>
            <div class="w-full bg-white rounded-xl shadow-md"></div>
            <div class="w-full bg-white rounded-xl shadow-md"></div>
            <div class="w-full bg-white rounded-xl shadow-md"></div>
            <div class="w-full bg-white rounded-xl shadow-md"></div>
            <div class="w-full bg-white rounded-xl shadow-md"></div>
            <div class="w-full bg-white rounded-xl shadow-md"></div>
        </div>
        <div class="flex flex-col w-1/3  h-full p-2">
            <div class="flex flex-col gap-y-2 pb-24">
                @for ($i=0;$i<10;$i++)
                    
                <div class="px-4 py-2 flex w-full justify-between bg-white rounded-lg items-center">
                    <div class="flex flex-col">
                        <span>Nasi Goreng Telur Paman Roger</span>
                        <span class="text-zinc-500">123K</span>
                    </div>
                    <div class="bg-gray-800 px-4 py-2 gap-x-2 flex justify-between text-white text-2xl rounded-xl"
                    x-data="{count:0}">
                        <button @click="count--">-</button>
                        <span x-text="count" class="w-10 text-center"></span>
                        <button  @click="count++">+</button>
                    </div>
                </div>
                @endfor

            </div>
            <div class="fixed bottom-0 w-1/3 flex justify-between items-center px-4 py-4 bg-gray-800">
                <span class="text-white">Subtotal: Rp 123.000</span>
                <button class="bg-white px-4 py-2 rounded-lg">Next</button>
            </div>
        </div>
    </div>
</x-layout>