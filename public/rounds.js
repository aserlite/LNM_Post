const t = JSON.parse(localStorage.getItem("projets"));
// console.log(t[1]);
const urls = new Array();
t.forEach((elt) => urls.push(elt.img_url));
// const urls = ['images/17.jpg','images/5.jpg','images/6.jpg','images/2.jpg','images/1.jpg','images/3.jpg','images/4.jpg','images/7.jpg','images/8.jpg','images/9.jpg'];
// console.log(urls);

const genre = new Array();
t.forEach((elt) => genre.push(elt.genre));
// console.log(genre);

const lien = new Array();
t.forEach((elt) => lien.push(elt.lien));
// console.log(lien);

const auteurs = new Array();
t.forEach((elt) => auteurs.push(elt.idAuteur));
// console.log(auteurs);

let minleft = 2;
let maxleft = 20;
let minhauteur = 2;
let maxhauteur = 50;

const animationprojects = document.createElement("div");

for (let i = 0; i <= urls.length - 1; i++) {
  const content1 = document.getElementById("content");

  function getRandomInt(min, max) {
    return Math.floor(Math.random() * (max - min + 1)) + min;
  }

  const round1 = document.createElement("div");
  round1.classList.add("round");
  round1.style.left = getRandomInt(minleft, maxleft) + "vw";
  round1.style.transform =
    "translate(0px," + getRandomInt(minhauteur, maxhauteur) + "vw)"; //ajuste la hauteur

  const img1 = document.createElement("img");
  img1.src = urls[i];
  img1.style.width = getRandomInt(10, 30) + "vw";

  round1.append(img1);
  animationprojects.append(round1);
  if (maxleft < 60) {
    maxleft = maxleft + 26;
  }
  if (minhauteur < 500) {
    minhauteur = minhauteur + 50;
  }
  if (maxhauteur < 500) {
    maxhauteur = maxhauteur + 40;
  }
}
animationprojects.classList.add("animationprojects");
body.append(animationprojects);
const overlay = document.querySelector(".overlay");
const intro = document.querySelector(".intro");
const elements = document.querySelector(".elements");
const projectmenu = document.querySelector(".project-menu");
const grid = document.querySelector(".grid");
const mentions = document.querySelector(".mentions");
const menutoggle = document.querySelector(".nav-menu");

[
  document.querySelector(".toggle-overlay"),
  document.querySelector(".menu-item.retour"),
].forEach((item) => {
  item.addEventListener("click", (event) => {
    overlay.classList.toggle("active");
    intro.classList.toggle("active");
    elements.classList.toggle("active");
    projectmenu.classList.toggle("active");
    animationprojects.classList.toggle("active");
    menutoggle.classList.toggle("hide");

    body.classList.toggle("active");
    mentions.classList.toggle("active");

    if (document.querySelector(".grid") == null) {
      afficherprojets();
    } else {
      const grid = document.querySelector(".grid");
      grid.remove();
      //on enlève le bouton reset
      document.querySelector(".menu-item.reset").classList.remove("active");
    }
  });
});

function afficherprojets() {
  const grid = document.createElement("div");
  grid.classList.add("grid");
  grid.classList.add("active");
  body.append(grid);
  for (let i = 0; i <= urls.length - 1; i++) {
    const projet1 = document.createElement("div");
    projet1.classList.add("p");

    const img1 = document.createElement("img");
    img1.src = urls[i];
    img1.style.width = "100%";
    img1.style.borderRadius = "100vw";
    img1.style.aspectRatio = "1/1";
    img1.style.objectFit = "cover";

    projet1.style.gridAutoColumns = "auto";
    projet1.style.gridAutoRows = "auto";

    projet1.append(img1);


    const lien1 = document.createElement("a");

    if(lien[i] === null ){
      lien1.href = "/createur/" + auteurs[i];
      lien1.innerHTML = "Vers le Créateur";
    }
    else{
      lien1.href = lien[i];
      lien1.innerHTML = "Suivre le lien du projet";
    }

    lien1.classList.add("lien");
    lien1.style.display = "none";
    projet1.append(lien1);

    projet1.addEventListener("click", afficherprojet);
    function afficherprojet() {
      let eltList = document.querySelectorAll("active");
      eltList.forEach((elt) => function(){
        elt.classList.remove("active");
      });
      let imgList = document.querySelectorAll("img1");
      imgList.forEach((elt) => function(){
        elt.classList.remove("active");
      });
      lien1.classList.toggle("active");
      projet1.classList.toggle("active");
      img1.classList.toggle("img1");
    }
    grid.append(projet1);
    moreproject();
  }
}

// function logPageYOffset() {
//   console.log('Yoffset '+window.pageYOffset);
//   // console.log('height20p '+height20p);
//   console.log('windows innerheight '+window.innerHeight);
//   console.log('grid Height '+grid.offsetHeight);

// }
// setInterval(logPageYOffset, 500);

//le tri

let web = document.getElementById("triweb");
web.addEventListener("click", triweb);
function triweb() {
  const grid = document.querySelector(".grid");
  grid.remove();

  let gridweb = document.createElement("div");
  gridweb.classList.add("grid");
  gridweb.classList.add("active");

  for (i = 0; i <= urls.length - 1; i++) {
    if (genre[i] == "web") {
      const projet1 = document.createElement("div");
      projet1.classList.add("p");

      const img1 = document.createElement("img");
      img1.src = urls[i];
      img1.style.width = "100%";
      img1.style.borderRadius = "100vw";
      img1.style.aspectRatio = "1/1";
      img1.style.objectFit = "cover";

      projet1.style.gridAutoColumns = "auto";
      projet1.style.gridAutoRows = "auto";

      projet1.append(img1);

      const lien1 = document.createElement("a");
      lien1.href = lien[i];
      lien1.innerHTML = "Suivre le lien du projet";
      lien1.classList.add("lien");
      lien1.style.display = "none";
      projet1.append(lien1);

      gridweb.append(projet1);
      body.append(gridweb);
      moreproject();
      projet1.addEventListener("click", afficherprojet);
      function afficherprojet() {
        lien1.classList.toggle("active");
        projet1.classList.toggle("active");
        img1.classList.toggle("img1");
      }
      //on affiche le bouton reset
      document.querySelector(".menu-item.reset").classList.add("active");
    }
  }
}

// if (genre[0] == 'web') {
//   console.log('test genre0 = web   '+genre[0])
// }
// if (genre[1] == 'web') {
//   console.log('test genre1 = web   '+genre[1])
// }
// if (genre[2] == 'web') {
//   console.log('test genre2 = web   '+genre[2])
// }

// if(typeof grid2 !== 'undefined'){
//   grid2.remove();
// }

let video = document.getElementById("trivideo");
video.addEventListener("click", trivideo);
function trivideo() {
  const grid = document.querySelector(".grid");
  grid.remove();

  let gridvideo = document.createElement("div");
  gridvideo.classList.add("grid");
  gridvideo.classList.add("active");

  for (i = 0; i <= urls.length - 1; i++) {
    if (genre[i] == "video") {
      const projet1 = document.createElement("div");
      projet1.classList.add("p");

      const img1 = document.createElement("img");
      img1.src = urls[i];
      img1.style.width = "100%";
      img1.style.borderRadius = "100vw";
      img1.style.aspectRatio = "1/1";
      img1.style.objectFit = "cover";

      projet1.style.gridAutoColumns = "auto";
      projet1.style.gridAutoRows = "auto";

      projet1.append(img1);

      const lien1 = document.createElement("a");
      lien1.href = lien[i];
      lien1.innerHTML = "Suivre le lien du projet";
      lien1.classList.add("lien");
      lien1.style.display = "none";
      projet1.append(lien1);

      gridvideo.append(projet1);
      body.append(gridvideo);

      projet1.addEventListener("click", afficherprojet);
      function afficherprojet() {
        lien1.classList.toggle("active");
        projet1.classList.toggle("active");
        img1.classList.toggle("img1");
      }
      //on affiche le bouton reset
      document.querySelector(".menu-item.reset").classList.add("active");
      moreproject();
    }
  }
}

let images = document.getElementById("triimage");
images.addEventListener("click", triimage);
function triimage() {
  const grid = document.querySelector(".grid");
  grid.remove();
  let gridimages = document.createElement("div");
  gridimages.classList.add("grid");
  gridimages.classList.add("active");

  for (i = 0; i <= urls.length - 1; i++) {
    if (genre[i] == "images") {
      const projet1 = document.createElement("div");
      projet1.classList.add("p");

      const img1 = document.createElement("img");
      img1.src = urls[i];
      img1.style.width = "100%";
      img1.style.borderRadius = "100vw";
      img1.style.aspectRatio = "1/1";
      img1.style.objectFit = "cover";

      projet1.style.gridAutoColumns = "auto";
      projet1.style.gridAutoRows = "auto";

      projet1.append(img1);

      const lien1 = document.createElement("a");
      lien1.href = lien[i];
      lien1.innerHTML = "Suivre le lien du projet";
      lien1.classList.add("lien");
      lien1.style.display = "none";
      projet1.append(lien1);

      gridimages.append(projet1);
      body.append(gridimages);
      projet1.addEventListener("click", afficherprojet);
      function afficherprojet() {
        lien1.classList.toggle("active");
        projet1.classList.toggle("active");
        img1.classList.toggle("img1");
      }
      //on affiche le bouton reset
      document.querySelector(".menu-item.reset").classList.add("active");
      moreproject();
    }
  }
}

// Use setInterval() to call the logPageYOffset function every 1 second

function moreproject() {
  let grid = document.querySelector(".grid");
  let height20p = 80 * window.devicePixelRatio;
  window.onscroll = function (ev) {
    // Check if the user has scrolled down the page and reached the bottom
    function updateInnerHeight() {
      window.innerHeight = window.innerHeight;
    }
    // Listen for the resize event and call the updateInnerHeight function whenever it occurs
    window.addEventListener("resize", updateInnerHeight);

    // (window.pageYOffset > height20p &&

    if (window.innerHeight + window.pageYOffset >= grid.offsetHeight) {
      const grid = document.createElement("div");
      grid.classList.add("grid");

      for (i = 0; i <= urls.length - 1; i++) {
        const projet1 = document.createElement("div");
        projet1.classList.add("p");

        const img1 = document.createElement("img");
        img1.src = urls[i];
        img1.style.width = "100%";
        img1.style.borderRadius = "100vw";
        img1.style.aspectRatio = "1/1";
        img1.style.objectFit = "cover";

        projet1.style.gridAutoColumns = "auto";
        projet1.style.gridAutoRows = "auto";

        projet1.addEventListener("click", afficherprojet);
        function afficherprojet() {
          lien1.classList.toggle("active");
          projet1.classList.toggle("active");
          img1.classList.toggle("img1");
        }
        projet1.append(img1);

        const lien1 = document.createElement("a");
        lien1.href = lien[i];
        lien1.innerHTML = "Suivre le lien du projet";
        lien1.classList.add("lien");
        lien1.style.display = "none";
        projet1.append(lien1);

        grid.append(projet1);
      }
      // height20p = height20p + 625;
    }
  };
}

//bouton reset

let resetbutton = document.querySelector(".reset");
resetbutton.addEventListener("click", reset);
function reset() {
  const grid = document.querySelector(".grid");
  grid.remove();
  afficherprojets();
}
