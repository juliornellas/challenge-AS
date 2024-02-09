<x-layout>
    <div>
        <div class="px-4 sm:px-0">
          <h3 class="text-base font-semibold leading-7 text-gray-900">Contact</h3>
          <p class="mt-1 max-w-2xl text-sm leading-6 text-gray-500">Personal details.</p>
        </div>
        <div class="mt-6 border-t border-gray-100">
          <dl class="divide-y divide-gray-100">
            <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
              <dt class="text-sm font-medium leading-6 text-gray-900">Name</dt>
              <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{$contact->name}}</dd>
            </div>
            <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
              <dt class="text-sm font-medium leading-6 text-gray-900">Phone number</dt>
              <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{$contact->contact}}</dd>
            </div>
            <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
              <dt class="text-sm font-medium leading-6 text-gray-900">Email address</dt>
              <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{$contact->email}}</dd>
            </div>
            @auth
                <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                    <dt class="text-sm font-medium leading-6 text-gray-900">
                        <a
                        class="px-8 py-[4px] border rounded border-blue-400 bg-blue-700 text-white"
                        href="/contacts/{{$contact->id}}/edit" class="font-medium text-blue-600 dark:text-blue-500 hover:underline mr-2">Edit</a>
                    </dt>
                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                        <form method="POST" action="/contacts/{{$contact->id}}">
                            @csrf
                            @method('DELETE')
                            <button
                            class="px-8 border rounded border-red-400 bg-red-700 text-white"
                            >Delete</button>
                        </form>
                    </dd>
                </div>
            @endauth
          </dl>
        </div>
    </div>
</x-layout>

