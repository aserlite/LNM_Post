@extends('layouts.topjc')

@section('css')
  <link href="/css/invitation.css" rel="stylesheet">
@endsection

@section('content')
<div class="bvnhead">
  <span>Voici votre QR code qui sera à présenter à votre arrivée. On se revoit le 5 Janvier {{$prenom}}</span>
  {{$qrcode}}
</div>

<a href='/dlbillet' class="dlinvit">Télecharger mon billet</a>
<a href='/desinscription' class="dlinvit">Me désinscrire</a>
@endsection
