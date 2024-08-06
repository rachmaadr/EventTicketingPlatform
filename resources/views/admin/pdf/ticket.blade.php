@php
  use SimpleSoftwareIO\QrCode\Facades\QrCode;
@endphp
<style>
  @page {
    size: 10cm 30cm landscape;
  }
</style>
@foreach ($transaction->transaction_detail as $detail)
  <div style="padding: 5px; font-family: Arial, Helvetica, sans-serif; page-break-before: always;  display: block;">
    <div style="float: left">
      <h1>{{ $event->name }}</h1>
      <h2>{{ $detail->ticket->name }}</h2>
      <div>{{ $event->start_time->format('l, d F Y, H:i') }}</div>
      <div>{{ $event->duration }} hour(s)</div>
      <div>{{ $event->location }}</div>
      <div style="margin-top: 20px; font-size: 28px; font-family: monospace">{{ $detail->code }}</div>
    </div>
    <div style="float: right">
      {{-- QR Code --}}
      <img style="margin-top: 30px" src="data:image/png;base64, {!! base64_encode(
          QrCode::format('png')->size(200)->generate($detail->code),
      ) !!} ">
    </div>
@endforeach
</div>