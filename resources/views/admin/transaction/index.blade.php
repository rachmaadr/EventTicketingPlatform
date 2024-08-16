<x-app-layout>
  <x-slot name="header">
    <h2 class="text-xl font-semibold leading-tight text-gray-800">
      Event &raquo; {{ $event->name }} &raquo; Transaction
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
      <div class="mb-10">
        <a href="{{ route('admin.events.index') }}" class="px-2 py-1 font-bold text-white bg-red-500 rounded">
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
                <th class="px-6 py-3">Code</th>
                <th class="px-6 py-3">Detail</th>
                <th class="px-6 py-3">Status</th>
                <th class="px-6 py-3">Total Price</th>
                <th class="px-6 py-3">Ticket</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($transactions as $transaction)
                <tr class="border-b">
                  <td class="px-6 py-4">{{ $transaction->id }}</td>
                  <td class="px-6 py-4">{{ $transaction->code }}</td>
                  <td class="px-6 py-4">{{ $transaction->name }} <br>({{ $transaction->email }})</td>
                  <td class="px-6 py-4">{{ $transaction->status }}</td>
                  <td class="px-6 py-4">${{ number_format($transaction->total_price) }}</td>
                  <td class="px-6 py-4">
                    <ol class="list-decimal">
                        @foreach ($transaction->transaction_detail as $details)
                            <li>
                                {{ $details->ticket->name }} ({{ $details->code }})
                            </li>
                        @endforeach
                    </ol>
                  <td class="px-6 py-4 space-y-1 text-center">
                    <a href="{{ route('admin.approve', [
                      'event' => $event->id,
                      'transaction' => $transaction->id,
                      ]) }}"
                      class="block px-2 py-1 text-white bg-green-500 rounded">
                      Approve & Send
                    </a>

                    @if ($transaction->status != 'success')
                        <form action="{{ route('admin.events.transactions.destroy', [
                        'event' => $event->id,
                        'transaction' => $transaction->id,
                    ]) }}"
                          method="POST" class="block"
                          onsubmit="return confirm('Hapus Transaksi {{ $transaction->name }}?')">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="w-full px-2 py-1 text-white bg-red-500 rounded">
                        Hapus
                      </button>
                    </form>
                    @endif

                    @if ($transaction->status == 'success')
                        <a href="{{ route('admin.pdf', [
                        'event' => $event->id,
                        'transaction' => $transaction->id,
                        ]) }}"
                       class="inline-block px-4 py-2 text-white bg-green-500 rounded">
                      Download
                    </a>
                    @endif
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
          <div class="mt-4">
            {{ $transactions->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>