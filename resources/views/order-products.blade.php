<x-layout title="Order">

    <div class="flex flex-col gap-4 p-4 text-sm text-gray-800">
        <a href="/orders" class="px-4 py-2 text-white rounded-lg shadow-md bg-rose-500 w-fit">Back</a>
        <table class="text-left bg-white border shadow-md w-fit rtl:text-right">
            <tbody>
                <tr class="border-b">
                    <th class="px-4 py-2 ">Order ID</th>
                    <td class="px-4 py-2"> {{ $order->id }}</td>
                </tr>
                <tr class="border-b">
                    <th class="px-4 py-2 ">Cost</th>
                    <td class="px-4 py-2">Rp {{ $order->cost }} K</td>
                </tr>
                <tr class="border-b">
                    <th class="px-4 py-2 ">Employee</th>
                    <td class="px-4 py-2"> {{ $order->user_id }}</td>
                </tr>
                <tr class="border-b">
                    <th class="px-4 py-2 ">Date</th>
                    <td class="px-4 py-2"> {{ $order->created_at->format('Y-m-d') }}</td>
                </tr>
                <tr class="border-b">
                    <th class="px-4 py-2 ">Time</th>
                    <td class="px-4 py-2"> {{ $order->created_at->format('H:i:s') }}</td>
                </tr>

            </tbody>
        </table>
        {{-- <div class="relative overflow-x-auto shadow-md sm:rounded-lg"> --}}
        <table class="w-full text-left shadow-md rtl:text-right text-zinc-500">
            <thead class="text-gray-800 bg-gray-50">
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
                        <th scope="row" class="px-6 py-4 font-medium text-gray-800 whitespace-nowrap">
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
