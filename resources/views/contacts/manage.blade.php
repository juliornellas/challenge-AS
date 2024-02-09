<x-layout>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Contact name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Contact
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Email
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <span class="sr-only">Actions</span>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($contacts as $contact)
                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <a href="/{{$contact->id}}" class="hover:text-blue-600">
                            {{$contact->name}}
                        </a>
                    </th>
                    <td class="px-6 py-4">
                        {{$contact->contact}}
                    </td>
                    <td class="px-6 py-4">
                        {{$contact->email}}
                    </td>
                    <td class="px-6 py-4">
                        <a href="/{{$contact->id}}/edit" class="font-medium text-blue-600 dark:text-blue-500 hover:underline mr-2">Edit</a>
                        <form method="POST" action="/{{$contact->id}}">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-500">Delete</button>
                          </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @if ($contacts)
        <div class="mt-4">
            {{$contacts->links()}}
        </div>
    @endif
</x-layout>
