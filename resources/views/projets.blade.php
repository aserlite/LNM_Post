@extends('layouts.appV1')

@section('css')
  <link href="/css/projets.css" rel="stylesheet">
@endsection


@section('content')
<div class="allProjects">
    @if(isset($projets->anonyme))
    <article class="post">
      <div>
        <span class="auteur">anonyme</span>
      </div>
      <a href="{{$projets->lien}}"><img src=".{{$projets->img_url}}" /></a>
      <h3>{{$projets->titre}}</h3>
    </article>
    @else
    <article class="post">
      <div>
        <a href='/createur/{{$projets->idAuteur}}'><span class="auteur">{{$projets->prenom}} {{$projets->nom}}</span></a>
      </div>
      @if(isset($projets->lien) AND $projets->lien !=="null")
        <a href="{{$projets->lien}}"><img src=".{{$projets->img_url}}"/></a>
      @else
      <img src=".{{$projets->img_url}}" />
      @endif
      <h3>{{$projets->titre}}</h3>
    </article>

    </div>
    @endif

@endsection
