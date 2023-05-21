@extends('layouts.appV1')


@section('content')


<div class="recap">

<h2>Retour sur l'événement du 5 janvier 2023</h2>



<iframe src="https://www.youtube.com/embed/BOHiQL9b2UY" title="AfterMovie - La Nuit MMI" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
<h2>Exposition</h2>


<div class="exposition">

<div class="grid">
  <img src="images/exposition/9.JPG">
  <img src="images/exposition/4.JPG">
  <img src="images/exposition/5.JPG">
  <img src="images/exposition/6.JPG">
  <img src="images/exposition/12.JPG">
  <img src="images/exposition/2.JPG">

  <img src="images/exposition/7.JPG">
  <img src="images/exposition/10.JPG">

</div>


</div>

<h2>Stand photos</h2>

<a href="https://www.facebook.com/LaNuitMMI">
  <div class="photoscontainer">
      <img id="vosphotos" src="images/exposition/3.JPG"> 
      <div class="photosoverlay">Cliquez pour voir vos photos</div>
  </div>
</a>

</div>

<div id="scroll_to_top">
    <a href="#top"><i class='bx bxs-up-arrow' ></i></a>
</div>

  </div>
@endsection('content')
