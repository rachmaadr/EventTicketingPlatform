<x-app-layout>
  <x-slot name="header">
    <h2 class="text-xl font-semibold leading-tight text-gray-800">
      Event &raquo; {{ $event->name }} &raquo; Ticket
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
      <div class="mb-10 flex space-x-4">
        <a href="{{ route('admin.events.tickets.create', $event->id) }}"
           class="px-4 py-2 font-bold text-white bg-green-500 rounded">
          + Add Ticket
        </a>
        <a href="{{ route('admin.events.index') }}"
          class="px-4 py-2 font-bold text-white bg-red-500 rounded">
          Back
        </a>
      </div>
      <div class="overflow-hidden shadow sm:rounded-md">
        <div class="px-4 py-5 bg-white sm:p-6">
          @if (session('success'))
            <div class="px-4 py-2 mb-4 text-white bg-green-500 rounded">
              {{ session('success') }}
            </div>
          @endif
          <table class="w-full">
            <thead class="bg-gray-50">
              <tr>
                <th style="max-width: 1%" class="px-6 py-3">ID</th>
                <th class="px-6 py-3">Name</th>
                <th class="px-6 py-3">Price</th>
                <th class="px-6 py-3">Qty</th>
                <th class="px-6 py-3">Maks.</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($tickets as $ticket)
                <tr class="border-b">
                  <td class="px-6 py-4">{{ $ticket->id }}</td>
                  <td class="px-6 py-4">{{ $ticket->name }}</td>
                  <td class="px-6 py-4">${{ number_format($ticket->price) }}</td>
                  <td class="px-6 py-4">{{ number_format($ticket->quantity) }}</td>
                  <td class="px-6 py-4">{{ number_format($ticket->max_buy) }}</td>
                  <td class="px-6 py-4">
                    <a href="{{ route('admin.events.tickets.edit', [
                        'event' => $event->id,
                        'ticket' => $ticket->id,
                    ]) }}"
                       class="inline-block px-4 py-2 text-white bg-blue-500 rounded">
                      Edit
                    </a>
                    <form action="{{ route('admin.events.tickets.destroy', [
                        'event' => $event->id,
                        'ticket' => $ticket->id,
                    ]) }}"
                          method="POST" class="inline-block"
                          onsubmit="return confirm('Hapus ticket {{ $ticket->name }}?')">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="px-4 py-2 text-white bg-red-500 rounded">
                        Hapus
                      </button>
                    </form>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
          <div class="mt-4">
            {{ $tickets->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>