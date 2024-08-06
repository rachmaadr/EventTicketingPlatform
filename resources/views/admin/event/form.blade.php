<x-app-layout>
  <x-slot name="header">
    <h2 class="text-xl font-semibold leading-tight text-gray-800">
      Event &raquo; {{ isset($event) ? 'Edit' : 'Buat' }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
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
                action="{{ isset($event) ? route('admin.events.update', $event->id) : route('admin.events.store') }}"
                enctype="multipart/form-data">
            @csrf
            @method(isset($event) ? 'PUT' : 'POST')
            {{-- Input Text Area--}}
            {{-- Nama Event --}}
            <div class="mb-6">
              <label for="name" class="block mb-2 text-sm">Nama Event</label>
              <input type="text" name="name" class="bg-gray-50 border border-gray-300 rounded-lg w-full p-2.5"
                     value="{{ isset($event) ? $event->name : old('name') }}">
            </div>
            {{-- Headline --}}
            <div class="mb-6">
              <label for="headline" class="block mb-2 text-sm">Headline</label>
              <input type="text" name="headline" class="bg-gray-50 border border-gray-300 rounded-lg w-full p-2.5"
                     value="{{ isset($event) ? $event->headline : old('headline') }}">
            </div>
            {{-- Description --}}
            <div class="mb-6">
              <label for="description" class="block mb-2 text-sm">Deskripsi</label>
              <textarea name="description" class="bg-gray-50 border border-gray-300 rounded-lg w-full p-2.5">{{ isset($event) ? $event->description : old('description') }}</textarea>
            </div>
            {{--  --}}
            <div class="mb-6">
              <label for="start_time" class="block mb-2 text-sm">Tanggal</label>
              <input type="datetime-local" name="start_time" class="bg-gray-50 border border-gray-300 rounded-lg w-full p-2.5"
                     value="{{ isset($event) ? $event->start_time : old('start_time') }}">
            </div>
            {{--  --}}
            <div class="mb-6">
              <label for="location" class="block mb-2 text-sm">Lokasi</label>
              <input type="text" name="location" class="bg-gray-50 border border-gray-300 rounded-lg w-full p-2.5"
                     value="{{ isset($event) ? $event->location : old('location') }}">
            </div>
            {{--  --}}
            <div class="mb-6">
              <label for="duration" class="block mb-2 text-sm">Durasi (jam)</label>
              <input type="text" name="duration" class="bg-gray-50 border border-gray-300 rounded-lg w-full p-2.5"
                     value="{{ isset($event) ? $event->duration : old('duration') }}">
            </div>
            
            {{-- Dropdown --}}
            <div class="mb-6">
              <label for="category_id" class="block mb-2 text-sm">Kategori</label>
              <select name="category_id" class="bg-gray-50 border border-gray-300 rounded-lg w-full p-2.5">
                @foreach ($categories as $category)
                  <option value="{{ $category->id }}" 
                    {{ isset($event) && $event->category_id == $category_id ? 'selected' : '' }}>
                    {{ $category->name }}
                  </option>
                @endforeach
              </select>
            </div>

            {{-- Dropdown --}}
            <div class="mb-6">
              <label for="type" class="block mb-2 text-sm">Tipe</label>
              <select name="type" class="bg-gray-50 border border-gray-300 rounded-lg w-full p-2.5">
                <option value="offline" {{ isset($event) && $event->type == 'offline' ? 'selected' : '' }}>
                  Offline
                </option>
                <option value="online" {{ isset($event) && $event->type == 'online' ? 'selected' : '' }}>
                  Online
                </option>
              </select>
            </div>
            {{-- File --}}
            <div class="mb-6">
              <label for="files" class="block mb-2 text-sm">Foto</label>
              <input type="file" name="files[]" multiple
                     class="bg-gray-50 border border-gray-300 rounded-lg w-full p-2.5">
            </div>
            {{-- Checkbox --}}
            <div class="mb-6">
              <label for="is_popular" class="block mb-2 text-sm">Populer?</label>
              <input type="checkbox" name="is_popular" value="1"
                     class="bg-gray-50 border border-gray-300 rounded-lg p-2.5"
                     {{ isset($event) && $event->is_popular ? 'checked' : '' }}>
            </div>
            {{-- Submit Button --}}
            <button type="submit" class="text-white bg-blue-700  rounded w-full sm:w-auto px-5 py-2.5 text-center">
              Simpan
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>