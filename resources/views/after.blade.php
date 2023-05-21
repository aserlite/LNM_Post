@extends($layout)

@section('css')
<link rel="stylesheet" href="/css/styles.css">
@endsection

@section('content')
<script type='module'>
  let t = {!! $projets !!};
  localStorage.setItem('projets', JSON.stringify(t));
</script>
<div class="content" id="content">
<div class="intro" >
  

    
    
    <h2>La nuit MMI</h2>
    <p>merci pour votre participation</p>
 

    <img alt="lune" src="images/lune.png">

    <section class="buttons">
      <a href="/recap" id="buttonresa">Retour sur l'événement</a>
    </section>
</div>

<!-- <div class="round">
  <img src="images/17.jpg">
</div> -->

<!-- concept -->
<div class="elements">
<h3>L'exposition continue en ligne</h3>
  <div class="toggle-overlay">
    <h2>Voir les projets</h2>
  </div>

<!-- programme -->
<div>
    <a href="/publish">
    <h2>Je présente mon projet</h2>
    </a>
  </div>

  </div>
  </div>



</div>
</div>
</div>

<!-- overlay -->
<div class="overlay"></div>

<!-- menu projets -->
<div class="project-menu">
  <!-- menu items -->
  <a href="#" id="triweb" class="menu-item">Web</a>
  <a href="#" id="trivideo" class="menu-item">Vidéos</a>
  <a href="#" id="triimage" class="menu-item">Images</a>


  <!-- Create the "retour" menu item -->
  <a href="#" class="menu-item retour">Retour</a>
  <a href="#" class="menu-item reset"><i class='bx bx-reset'></i></a>
</div>

<div class="mentions">
  <a href="mentions">mentions légales</a>
</div>

<!-- projects ON-->
<script src="../menu.js"></script>
<script src="../rounds.js"></script>

@endsection
