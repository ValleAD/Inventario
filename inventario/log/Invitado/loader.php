<style type="text/css">

	.lds-ring {
  display: inline-block;
  position: relative;
  width: 80px;
  height: 80px;
}
.lds-ring div {
  box-sizing: border-box;
  display: block;
  position: absolute;
  width: 64px;
  height: 64px;
  margin: 8px;
  border: 8px solid #fff;
  border-radius: 50%;
  animation: lds-ring 1.2s cubic-bezier(0.5, 0, 0.5, 1) infinite;
  border-color: #fff transparent transparent transparent;
}
.lds-ring div:nth-child(1) {
  animation-delay: -0.45s;
}
.lds-ring div:nth-child(2) {
  animation-delay: -0.3s;
}
.lds-ring div:nth-child(3) {
  animation-delay: -0.15s;
}
@keyframes lds-ring {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
}
.loader{
background: #000;
width: 100%;
height: 100vh;
display: flex;
justify-content: center;
align-items: center;
position: fixed;
top: 0;
left: 0;
z-index: 10000;
clip-path: circle(150%, at 100% 0);
transition: clip-path 0.8s ease-in-out;
}
.loader2{
display: none;
}

:root {
  --effect: hover 1s linear infinite;
}



#loader {
  display: inline-block;
  text-transform: uppercase;
  text-align: center;
  font-size: 4em;
  font-family: arial;
  font-weight: 600;
  transform: scale(.5);
  color: #121212;
  -webkit-text-stroke: 2px gray;
  z-index: 10000000;
  overflow: hidden;
}

#loader:nth-child(1) {
  animation: var(--effect);
}

#loader:nth-child(2) {
  animation: var(--effect) .125s;
}

#loader:nth-child(3) {
  animation: var(--effect) .25s;
}

#loader:nth-child(4) {
  animation: var(--effect) .375s;
}

#loader:nth-child(5) {
  animation: var(--effect) .5s;
}

#loader:nth-child(6) {
  animation: var(--effect) .675s;
}

#loader:nth-child(7) {
  animation: var(--effect) .75s;
}

@keyframes hover {
  0% {
    transform: scale(.5);
    color: #121212;
    -webkit-text-stroke: 2px gray;
  }

  20% {
    transform: scale(1);
    color: pink;
    -webkit-text-stroke: 3px red;
    filter: drop-shadow(0 0 1px black)drop-shadow(0 0 1px black)drop-shadow(0 0 3px red)drop-shadow(0 0 5px red)hue-rotate(10turn);
  }

  50% {
    transform: scale(.5);
    color: #121212;
    -webkit-text-stroke: 2px gray;
  }


}

</style>
<!-- loader de circulo -->
<!-- <div class="lds-ring loader" id="loader"><div></div><div></div><div></div><div></div></div> -->
<div class="loader" style="overflow: hidden;">
  <p id="loader">l</p>
  <p id="loader">o</p>
  <p id="loader">a</p>
  <p id="loader">d</p>
  <p id="loader">i</p>
  <p id="loader">n</p>
  <p id="loader">g</p>
</div>
<script src="Plugin/bootstrap/js/jquery-latest.js"></script>
 <script type="text/javascript">


$(window).on('load', function () {
    $('.loader').delay(1000).fadeOut('slow');
    
});
      </script>