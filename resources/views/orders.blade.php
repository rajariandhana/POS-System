<x-layout title="Order History">
    <table class="w-full text-sm text-left text-gray-500 rtl:text-right">
        <thead class="text-xs text-gray-700 bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3">Order ID</th>
                <th scope="col" class="px-6 py-3">Cost</th>
                <th scope="col" class="px-6 py-3">Employee Name</th>
                <th scope="col" class="px-6 py-3">Date</th>
                <th scope="col" class="px-6 py-3">Time</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
                <tr class="border-b odd:bg-white even:bg-gray-50">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                        {{ $order->id }}</td>
                    <td class="px-6 py-4">{{ $order->cost }}</td>
                    <td class="px-6 py-4">John Doe</td>
                    <td class="px-6 py-4">{{ $order->created_at->format('Y-m-d') }}</td>
                    <td class="px-6 py-4">{{ $order->created_at->format('H:i:s') }}</td>
                    <td class="px-6 py-4"><a class="hover:underline" href="/orders/{{$order->id}}">View</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-layout>