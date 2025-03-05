@props(['headers' => [], 'data' => []])

<div class="bg-white shadow-lg rounded-lg overflow-hidden p-4">
    <div class="overflow-x-auto">
        <table class="w-full border-collapse border border-gray-200">
            <thead>
            <tr class="bg-gray-100">
                @foreach ($headers as $header)
                    <th class="px-4 py-2 text-left text-gray-600 font-semibold uppercase border-b">{{ $header }}</th>
                @endforeach
            </tr>
            </thead>
            <tbody>
            @forelse ($data as $row)
                <tr class="border-b hover:bg-gray-50">
                    @foreach ($row as $cell)
                        <td class="px-4 py-3 border-b">{{ $cell }}</td>
                    @endforeach
                </tr>
            @empty
                <tr>
                    <td colspan="{{ count($headers) }}" class="text-center py-4 text-gray-500">No records found</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>
