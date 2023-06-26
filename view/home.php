<style>
  .slideshow-container {
    max-width: 700px;
    position: relative;
    margin: auto;
  }

  /* Next & previous buttons */
  .prev,
  .next {
    cursor: pointer;
    position: absolute;
    top: 50%;
    width: auto;
    padding: 16px;
    margin-top: -22px;
    color: white;
    font-weight: bold;
    font-size: 18px;
    transition: 0.6s ease;
    border-radius: 0 3px 3px 0;
    user-select: none;
  }

  /* Position the "next button" to the right */
  .next {
    right: 0;
    border-radius: 3px 0 0 3px;
  }

  /* On hover, add a black background color with a little bit see-through */
  .prev:hover,
  .next:hover {
    background-color: rgba(0, 0, 0, 0.8);
  }

  /* Caption text */
  .text {
    color: #f2f2f2;
    font-size: 15px;
    padding: 8px 12px;
    position: absolute;
    bottom: 8px;
    width: 100%;
    text-align: center;
  }

  /* Number text (1/3 etc) */
  .numbertext {
    color: #f2f2f2;
    font-size: 12px;
    padding: 8px 12px;
    position: absolute;
    top: 0;
  }

  /* The dots/bullets/indicators */
  .dot {
    cursor: pointer;
    height: 15px;
    width: 15px;
    margin: 0 2px;
    background-color: #bbb;
    border-radius: 50%;
    display: inline-block;
    transition: background-color 0.6s ease;
  }

  .active,
  .dot:hover {
    background-color: #717171;
  }

  /* Fading animation */
  .fade {
    animation-name: fade;
    animation-duration: 1.5s;
  }

  @keyframes fade {
    from {
      opacity: .4
    }

    to {
      opacity: 1
    }
  }

  /* On smaller screens, decrease text size */
  @media only screen and (max-width: 300px) {

    .prev,
    .next,
    .text {
      font-size: 11px
    }
  }
</style>
<div class="boxtrai mr">
  <div class="slideshow-container mb">

    <div class="mySlides fade">
      <img src="./img/mau-banner-quang-cao-san-pham-15.jpg" style="width:100%;height:300px;">

    </div>

    <div class="mySlides fade">
      <img src="./img/Hotsale-Banner-web_slide_1320x640.jpg" style="width:100%;height:300px;">

    </div>

    <div class="mySlides fade">
      <img src="./img/noi-dung-banner-khai-truong.jpg" style="width:100%;height:300px;">

    </div>

    <a class="prev" onclick="plusSlides(-1)">❮</a>
    <a class="next" onclick="plusSlides(1)">❯</a>

  </div>
  <br>
  <div style="text-align:center">
    <span class="dot" onclick="currentSlide(1)"></span>
    <span class="dot" onclick="currentSlide(2)"></span>
    <span class="dot" onclick="currentSlide(3)"></span>
  </div>
  <script>
    let slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
      showSlides(slideIndex += n);
    }

    function currentSlide(n) {
      showSlides(slideIndex = n);
    }

    function showSlides(n) {
      let i;
      let slides = document.getElementsByClassName("mySlides");
      let dots = document.getElementsByClassName("dot");
      if (n > slides.length) {
        slideIndex = 1
      }
      if (n < 1) {
        slideIndex = slides.length
      }
      for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
      }
      for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
      }
      slides[slideIndex - 1].style.display = "block";
      dots[slideIndex - 1].className += " active";
    }
  </script>
  <div class="row">
    <?php
    foreach ($listhh as $hh) {
      extract($hh);
      $hinhpath = $img_path . $hinh;
      if (is_file($hinhpath)) {
        $hinh = "<img src='" . $hinhpath . "' height='80'>";
      } else {
        $hinh = "no photo";
      }
      echo '<div class="boxsp mr">
                    <div class="row img">' . $hinh . '</div>
                    <p>' . $don_gia . '$</p>
                    <a href="index.php?act=hhct&ma_hh=' . $ma_hh . '&ma_loai=' . $ma_loai . '">' . $ten_hh . '</a>  
                </div>';
    }
    ?>
  </div>
</div>
<div class="boxphai ">

  <?php
  include "boxright.php";

  ?>

</div>
</div>