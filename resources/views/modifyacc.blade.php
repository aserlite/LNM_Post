@extends('layouts.appV1')

@section('css')
  <link href="/css/modify.css" rel="stylesheet">
@endsection

@section('content')
<div class="modifyacc">
    <form action='/modifyaccT' method='POST'>
        @csrf
        <input type="url" name='linkedin' placeholder="Lien vers votre compte linkedin">
        <input type="url" name='portfolio' placeholder="Lien vers votre portfolio">
        <input type="submit" value="Envoyer">
    </form>
</div>
@endsection
