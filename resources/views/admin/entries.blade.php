<!DOCTYPE html>
<html>
<head>
    <title>Admin Entries</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold mb-4">Admin Entries</h1>

        <!-- Total Amount Box -->
        <div class="bg-blue-100 p-4 rounded mb-6 shadow">
            <p class="text-lg font-semibold">Total Amount: ${{ number_format($totalAmount, 2) }}</p>
        </div>

        <!-- Entries Table -->
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
                <thead>
                    <tr class="bg-gray-200 text-gray-700 text-left uppercase text-sm leading-normal">
                        <th class="py-3 px-6">ID</th>
                        <th class="py-3 px-6">Form ID</th>
                        <th class="py-3 px-6">Name</th>
                        <th class="py-3 px-6">Email</th>
                        <th class="py-3 px-6">WhatsApp</th>
                        <th class="py-3 px-6">Amount</th>
                        <th class="py-3 px-6">Submission Date</th>
                        <th class="py-3 px-6">Submission Data</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 text-sm font-light">
                    @forelse ($entries as $entry)
                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                            <td class="py-3 px-6 whitespace-nowrap">{{ $entry->id }}</td>
                            <td class="py-3 px-6 whitespace-nowrap">{{ $entry->form_id }}</td>
                            <td class="py-3 px-6 whitespace-nowrap">{{ $entry->name }}</td>
                            <td class="py-3 px-6 whitespace-nowrap">{{ $entry->email }}</td>
                            <td class="py-3 px-6 whitespace-nowrap">{{ $entry->phone ?? 'N/A' }}</td>
                            <td class="py-3 px-6 whitespace-nowrap">${{ number_format($entry->amount, 2) }}</td>
                            <td class="py-3 px-6 whitespace-nowrap">{{ $entry->submission_date }}</td>
                            <td class="py-3 px-6 whitespace-pre-wrap">
                                @php
                                    $submission = json_decode($entry->submission_data, true);
                                @endphp
                                @if(is_array($submission))
                                    @foreach($submission as $key => $value)
                                        @if(is_array($value))
                                            <div>
                                                <strong>{{ ucfirst($key) }}:</strong>
                                                @foreach($value as $subKey => $subValue)
                                                    <p class="ml-4">
                                                        <strong>{{ ucfirst($subKey) }}:</strong> {{ is_array($subValue) ? json_encode($subValue) : $subValue }}
                                                    </p>
                                                @endforeach
                                            </div>
                                        @else
                                            <p><strong>{{ ucfirst($key) }}:</strong> {{ $value }}</p>
                                        @endif
                                    @endforeach
                                @else
                                    <p>{{ $entry->submission_data }}</p>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center py-3 px-6">No entries found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination Links -->
        <div class="mt-4">
            {{ $entries->links() }}
        </div>
    </div>
</body>
</html>
