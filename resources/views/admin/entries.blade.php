<!DOCTYPE html>
<html>
<head>
    <title>Admin Entries</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold mb-4">Admin Entries</h1>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
                <thead>
                    <tr class="bg-gray-200 text-gray-700 text-left uppercase text-sm leading-normal">
                        <th class="py-3 px-6">ID</th>
                        <th class="py-3 px-6">Form ID</th>
                        <th class="py-3 px-6">Submission Data</th>
                        <th class="py-3 px-6">Submitted At</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 text-sm font-light">
                    @forelse ($entries as $entry)
                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                            <td class="py-3 px-6 whitespace-nowrap">{{ $entry->id }}</td>
                            <td class="py-3 px-6 whitespace-nowrap">{{ $entry->form_id }}</td>
                            <td class="py-3 px-6 whitespace-pre-wrap">
                                <pre class="bg-gray-100 p-2 rounded">{{ json_encode(json_decode($entry->submission_data), JSON_PRETTY_PRINT) }}</pre>
                            </td>
                            <td class="py-3 px-6 whitespace-nowrap">{{ $entry->created_at }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center py-3 px-6">No entries found.</td>
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
