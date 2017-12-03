<?php get_header(); ?>   

  <section id="main" class="background">
    <div class="content-wrapper">
        <div class="navigation" style="display: block;">
            <div>
                <ul>
                    <li style="opacity: 1; transform: matrix(1, 0, 0, 1, 0, 0);">
                        <a class="navBarItem">
                        Home
                        </a>
                    </li>
                    <li style="opacity: 1; transform: matrix(1, 0, 0, 1, 0, 0);"><a class="navBarItem">Voorbeeld</a></li>
                    <li style="opacity: 1; transform: matrix(1, 0, 0, 1, 0, 0);">
                    <a class="navBarItem">
                    Contact
                    </a>
                    </li>
                    <li style="opacity: 1; transform: matrix(1, 0, 0, 1, 0, 0);"><a class="navBarItem">Bestel</a></li>
                </ul>
            </div>
        </div>
      <img style="max-width:80%;margin:auto;" class="img-responsive center-block wrapper coverImage" src="figs/dingdongsCoverNoName.png">
      <div data-elementsize="" class="top-down" style="transform: scale(0.949);">
        <img src="figs/arrow-down.png">
      </div>
    </div>
  </section>
  <section class="background" id>
    <div class="content-wrapper">
     <div id="definition">
        <p>DING . DONG (de; m; meervoud: dingdongs)</p>    
        <p style="font-size:40px;"><sup>1</sup>geluid van een deurbel</p>    
        <p style="font-size:40px;"><sup>2</sup>jonge, leuk uitziende kerel</p>    
    </div>
     <img style="max-width:80%;margin:auto;" class="img-responsive center-block wrapper secondImage" src="figs/14-fietslever-dingdong-v2_noBackground.png">
    </div>
  </section>
  <section class="background">
    <div class="content-wrapper">
        <div class="row" style="margin-left:5vw;"> 
          <div class="column1">
                <img src="figs/dude.png">
                <p class="nameDude"> SHENAN <br> STU </p>
                <img src="figs/dude.png">
                <p class="nameDude"> SWAN <br> FRY </p>
          </div>
          <div class="column1">
                <img src="figs/dude.png">
                <p class="nameDude"> HAUCK <br> KEETON </p>
                <img src="figs/dude.png">
                <p class="nameDude"> MITCH <br> COE </p>
          </div>
            <div class="column2"> <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p> </div>
        </div>
    </div>
  </section>
  <section class="background">
    <div class="content-wrapper">
        <?php echo do_shortcode("[add_to_cart id='61']"); ?>
      <table class="copyrightFooter">
          <tbody>
            <tr>
              <td>Ding Dongs Gent ©2017
              </td>
              <td class="share__mail"><a href="mailto:info@ddg.bd">info<span>@</span>ddg.be</a></td>
            </tr>
          </tbody>
        </table>
    </div>
  </section>

<?php get_footer(); ?>