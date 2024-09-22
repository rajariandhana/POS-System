<div class="flex flex-col w-full p-4 gap-y-4 h-fit">
    @isset($editPanel)
        <div class="fixed top-0 left-0 right-0 z-20 flex items-center justify-center w-full h-full">
            <div class="fixed top-0 left-0 right-0 z-20 flex items-center justify-center w-full h-full bg-black opacity-60">
            </div>
            <div class="fixed bg-gray-100 z-20 w-[400px] justify-center flex flex-col rounded-xl mb-4 p-6">
                <button wire:click=PanelExit() class="absolute top-2 right-2">
                    <svg class="size-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18 17.94 6M18 18 6.06 6" />
                    </svg>
                </button>

                @if ($editPanel == 'category')
                    <form class=" justify-left" wire:submit.prevent='EditCategory'>
                        <div class="mb-4 text-left">
                            <label class="block mb-1 ml-2 text-sm font-medium ">Category name</label>
                            <input type="text" wire:model='category_name' name="category_name"
                                class="block w-full p-2 text-sm border border-gray-300 rounded-lg bg-gray-50"
                                value="{{$category_name}}" />
                            @error('category_name')
                                <span class="text-xs text-red-500">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <button type="button" wire:click="DeleteCategory"
                            class="px-4 py-2 text-sm text-center text-white rounded-lg bg-rose-500">Delete Category</button>
                        <button type="submit"
                            class="px-4 py-2 text-sm text-center text-white bg-indigo-500 rounded-lg">Save Name</button>
                    </form>
                @elseif ($editPanel == 'menu')
                    <form class=" justify-left" wire:submit.prevent='EditMenu'>
                        <div class="mb-4 text-left">
                            <label class="block mb-1 ml-2 text-sm font-medium ">Name</label>
                            <input type="text" wire:model='product_name'
                                class="block w-full p-2 text-sm border border-gray-300 rounded-lg bg-gray-50"
                                value="{{$product_name}}"/>
                            @error('product_name')
                                <span class="text-xs text-red-500">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="mb-4 text-left">
                            <label class="block mb-1 ml-2 text-sm font-medium ">Price</label>
                            <input type="text" wire:model='product_price'
                                class="block w-full p-2 text-sm border border-gray-300 rounded-lg bg-gray-50"
                                value="{{$product_price}}"/>
                            @error('product_price')
                                <span class="text-xs text-red-500">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <button type="button" wire:click="DeleteMenu"
                            class="px-4 py-2 text-sm text-center text-white rounded-lg bg-rose-500">Delete Menu</button>
                        <button type="submit"
                            class="px-4 py-2 text-sm text-center text-white bg-indigo-500 rounded-lg">Save</button>
                    </form>
                @endif
            </div>
        </div>
    @endisset
    <table class="w-2/3 p-2 text-sm text-left shadow-md text-zinc-500 rtl:text-right">
        @foreach ($categories as $category)
            <thead class="text-gray-800 bg-gray-300">
                <tr class="text-center">
                    <th scope="col" class="flex items-center px-6 py-2 text-left gap-x-2">{{ $category->name }}
                        <button wire:click="PanelCategory('{{ $category->id }}')"
                            class="px-4 py-2 font-normal text-white bg-indigo-500 rounded-lg"
                            href="/orders/{{ $category->id }}">Edit Category</button>
                    </th>
                    <th scope="col" class="px-6 py-2">Price</th>
                    <th scope="col" class="px-6 py-2"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($category->products as $product)
                    <tr class="text-center border-b odd:bg-white even:bg-gray-50">
                        <th class="px-6 py-1 font-medium text-left text-gray-800 whitespace-nowrap">
                            {{ $product->name }}</td>
                        <td class="px-6 py-1">{{ $product->price }}</td>
                        <td class="px-6 py-1">
                            <button wire:click="PanelMenu('{{ $product->id }}')"
                                class="px-4 py-2 text-white bg-indigo-500 rounded-lg"
                                href="/orders/{{ $product->id }}">Edit</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        @endforeach
    </table>
</div>
