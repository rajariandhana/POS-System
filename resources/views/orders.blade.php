<x-layout title="Order History">
    <div class="flex flex-col p-4">
        <table class="w-full p-2 text-sm text-left text-zinc-500 rtl:text-right">
            <thead class="text-gray-800 bg-gray-50">
                <tr class="text-center">
                    <th scope="col" class="px-6 py-3 text-left">Order ID</th>
                    <th scope="col" class="px-6 py-3">Cost</th>
                    <th scope="col" class="px-6 py-3">Employee</th>
                    <th scope="col" class="px-6 py-3">Date</th>
                    <th scope="col" class="px-6 py-3">Time</th>
                    <th scope="col" class="px-6 py-3"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr class="text-center border-b odd:bg-white even:bg-gray-50">
                        <th scope="row" class="px-6 py-4 font-medium text-left text-gray-800 whitespace-nowrap">
                            {{ $order->id }}</th>
                        <td class="px-6 py-4">{{ $order->cost }}</td>
                        <td class="px-6 py-4">John Doe</td>
                        <td class="px-6 py-4">{{ $order->created_at->format('Y-m-d') }}</td>
                        <td class="px-6 py-4">{{ $order->created_at->format('H:i:s') }}</td>
                        <td class="px-6 py-4">
                            <a class="px-4 py-2 text-white bg-indigo-500 rounded-lg" href="/orders/{{ $order->id }}">View</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layout>
