<x-app-layout>
  <x-slot name="header">
    <h2 class="text-xl font-semibold leading-tight text-gray-800">
      Event &raquo; {{ $event->name }} &raquo; Ticket &raquo; {{ isset($ticket) ? 'Edit' : 'Buat' }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
      <div class="mb-10">
        <a href="{{ route('admin.events.index') }}" class="px-2 py-1 font-bold text-white bg-red-500 rounded">
          Kembali
        </a>
      </div>
      @if ($errors->any())
        <div class="mb-5" role="alert">
          <div class="px-4 py-2 font-bold text-white bg-red-500 rounded-t">
            Ada kesalahan!
          </div>
          <div class="px-4 py-3 text-red-700 bg-red-100 border border-t-0 border-red-400 rounded-b">
            <p>
            <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
            </p>
          </div>
        </div>
      @endif
      <div class="overflow-hidden shadow sm:rounded-md">
        <div class="px-4 py-5 bg-white sm:p-6">
          <form method="POST"
                action="{{ isset($ticket)
                    ? route('admin.events.tickets.update', [
                        'event' => $event->id,
                        'ticket' => $ticket->id,
                    ])
                    : route('admin.events.tickets.store', $event->id) }}"
                enctype="multipart/form-data">
            @csrf
            @method(isset($ticket) ? 'PUT' : 'POST')
            <div class="mb-6">
              <label for="name" class="block mb-2 text-sm">Nama Ticket</label>
              <input type="name" name="name" class="bg-gray-50 border border-gray-300 rounded-lg w-full p-2.5"
                     value="{{ isset($ticket) ? $ticket->name : old('name') }}">
            </div>
            <div class="mb-6">
              <label for="price" class="block mb-2 text-sm">Harga ($)</label>
              <input type="number" name="price" class="bg-gray-50 border border-gray-300 rounded-lg w-full p-2.5"
                     value="{{ isset($ticket) ? $ticket->price : old('price') }}">
            </div>
            <div class="mb-6">
              <label for="quantity" class="block mb-2 text-sm">Quantity</label>
              <input type="number" name="quantity" class="bg-gray-50 border border-gray-300 rounded-lg w-full p-2.5"
                     value="{{ isset($ticket) ? $ticket->quantity : old('quantity') }}">
            </div>
            <div class="mb-6">
              <label for="quantity" class="block mb-2 text-sm">Maks. Pembelian</label>
              <input type="number" name="max_buy" class="bg-gray-50 border border-gray-300 rounded-lg w-full p-2.5"
                     value="{{ isset($ticket) ? $ticket->max_buy : old('max_buy') }}">
            </div>


            <button type="submit" class="text-white bg-blue-700  rounded w-full sm:w-auto px-5 py-2.5 text-center">
              Simpan</button>
          </form>

        </div>
      </div>
    </div>
  </div>
</x-app-layout>