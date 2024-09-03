<x-layout title="Order">
    <div class="flex flex-col gap-4 p-4">
        <table class="text-left text-gray-800 border w-fit rtl:text-right bg-gray-50">
            <tbody>
                <tr class="border-b">
                    <th class="w-24 px-4 py-2 ">Order ID</th>
                    <td class="px-4 py-2"> {{ $order->id }}</td>
                </tr>
                <tr class="border-b">
                    <th class="w-24 px-4 py-2 ">Employee</th>
                    <td class="px-4 py-2"> {{ $order->user_id }}</td>
                </tr>
                <tr class="border-b">
                    <th class="w-24 px-4 py-2 ">Date</th>
                    <td class="px-4 py-2"> {{ $order->created_at->format('Y-m-d') }}</td>
                </tr>
                <tr class="border-b">
                    <th class="w-24 px-4 py-2 ">Time</th>
                    <td class="px-4 py-2"> {{ $order->created_at->format('H:i:s') }}</td>
                </tr>

            </tbody>
        </table>
        {{-- <div class="relative overflow-x-auto shadow-md sm:rounded-lg"> --}}
        <table class="w-full text-sm text-left text-gray-500 rtl:text-right">
            <thead class="text-xs text-gray-700 bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Product
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Qty
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Price (K)
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Qty * Price (K)
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order->products as $item)
                    {{-- @dump($item) --}}
                    <tr class="border-b odd:bg-white even:bg-gray-50">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{ $item->name }}
                        </th>
                        <td class="px-6 py-4 text-center">
                            {{ $item->pivot->qty }}
                        </td>
                        <td class="px-6 py-4 text-center">
                            {{ $item->pivot->price }}
                        </td>
                        <td class="px-6 py-4 text-center">
                            {{ $item->pivot->qty * $item->pivot->price }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layout>
