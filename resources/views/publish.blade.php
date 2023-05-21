@extends('layouts.app')

@section('css')
  <link href="/css/publish.css" rel="stylesheet">
@endsection

@section('content')
  <div class="publish">
  <h3>Envie de faire partie de La Nuit MMI ?</h3>
  <span class="callToAction">Partagez Votre Projet</span>
  <div class="explicatif">
    <div class="ex1">
    <p>Indiquez un nom puis chargez une image / une capture du projet. Si nécessaire, indiquez un lien pour pouvoir le consulter (vidéo Youtube, site personnel, profil Instagram, LinkedIn, Awwwards...) .</p>
    <p>Votre projet n'est pas obligatoirement un projet réalisé dans le cadre de vos études MMI, il peut avoir été fait depuis votre diplomation.</p>
    </div>
  </div>
  
  <form action='/publishT' method='POST' enctype="multipart/form-data">
    <input type='text' name='nom' placeholder='Nom de votre Projet' class="champsform" required>
    @csrf
    <label class="file" ><i class='bx bx-upload'></i>Charger une image<input type="file" name="img" accept="image/*" required></label>
    <p id='imagechargee'></p>
    <input class="champsform" type='number' name='anneeReal' placeholder='Année de réalisation de votre projet' min="1990" max="2023" required>
    <select name="genre" class="select" id="selectgenre" required>
      <option value="">--Le genre de votre projet--</option>
      <option value="web">Web</option>
      <option value="video">Video</option>
      <option value="images">Image</option>
    </select>
    <input class="champsform" type='text' name='lien' id="lienprojet" placeholder='Lien vers votre projet'>

    <!-- <label class="anonyme" for="anonyme"><input type="checkbox" id="anonyme" name="anonyme" value="anonyme"> Poster anonymement</label> -->
    <input type='submit' name='publish' value='Publier'>
  </form>
  </div>
<script>
    @if (isset($error))
    alert('{{$error}}')
  @endif
let selector = document.getElementById("selectgenre");
let lien = document.getElementById("lienprojet");

selector.addEventListener("change", function() {
    if(selector.value == "web" || selector.value == "video")
    {
      lien.setAttribute("required","");  
      lien.placeholder = "Lien vers votre projet";
      lien.style.display = "block";

    }else{
      lien.removeAttribute("required");
      lien.placeholder = "Lien vers votre projet (optionnel)";
    }
});

let image = document.querySelector("input[type=file]");
let filelabel = document.getElementById("imagechargee");
image.addEventListener("change", function(){
    filelabel.innerText = image.value;
});
</script>

@endsection