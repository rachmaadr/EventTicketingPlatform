<x-app-layout>
  <x-slot name="header">
    <h2 class="text-xl font-semibold leading-tight text-gray-800">
      Event &raquo; {{ $event->name }} &raquo; Scan
    </h2>
  </x-slot>

  <x-slot name="script">
    <script src="https://unpkg.com/vue@2.6.10/dist/vue.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue-qrcode-reader@3.0.1/dist/VueQrcodeReader.umd.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.4.0/axios.min.js"
            integrity="sha512-uMtXmF28A2Ab/JJO2t/vYhlaa/3ahUOgj1Zf27M5rOo8/+fcTUVH0/E0ll68njmjrLqOBjXM3V9NiPFL5ywWPQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
      new Vue({
        el: '#app',

        data() {
          return {
            result: ''
          }
        },

        methods: {
          onDecode(data) {
            this.result = data
            this.redeem();
          },
          async redeem() {
            try {
              const url = "{{ route('api.events.scan', $event->id) }}";
              const params = {
                code: this.result
              };

              const {
                data
              } = await axios.get(url, {
                params
              });

              alert(data.message);
              this.result = '';

            } catch (error) {
              alert(error.response.data.message);
              this.result = '';
            }
          },

          onInit(promise) {
            promise
              .then(console.log)
              .catch(console.error)
          }
        }
      })
    </script>
  </x-slot>

  <div class="py-12" id="app">
    <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
      <div class="overflow-hidden shadow sm:rounded-md">
        <div class="px-4 py-5 bg-white sm:p-6">
          <form @submit.prevent="redeem()">
            <div class="mb-6">
              <qrcode-stream @decode="onDecode" @init="onInit"></qrcode-stream>
            </div>
            <div class="mb-6">
              <label for="name" class="block mb-2 text-sm">Kode Tiket</label>
              <input type="text" name="name" class="bg-gray-50 border border-gray-300 rounded-lg w-full p-2.5"
                     v-model="result">
            </div>
            <button type="submit" class="text-white bg-blue-700 rounded w-full px-5 py-2.5 text-center">
              Scan
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>