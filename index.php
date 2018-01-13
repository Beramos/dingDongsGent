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
      <img class="img-responsive center-block wrapper coverImage" src="/figs/dingdongsCoverNoName.png">
      <div data-elementsize="" class="top-down grow">
        <img src="/figs/arrow-down.png">
      </div>
    </div>
  </section>
  <section class="background" id>
    <div class="content-wrapper">
     <div id="definition">
        <p>DING . DONG (de; m; meervoud: dingdongs)</p>
        <p class="subtitle"><sup>1</sup>geluid van een deurbel</p>
        <p class="subtitle"><sup>2</sup>jonge, leuk uitziende kerel</p>
    </div>
     <img style="max-width:80%;margin:auto;" class="img-responsive center-block wrapper secondImage" src="/figs/14-fietslever-dingdong-v2_noBackground.png">
    </div>
  </section>
  <section class="background">
    <div class="content-wrapper">
        <div class="row" style="margin-left:5vw;">
          <div class="column1">
                <img src="/figs/dude1.png">
                <img src="/figs/dude2.png">
          </div>
          <div class="column1">
                <img src="/figs/dude3.png">
                <img src="/figs/dude4.png">
          </div>
            <div class="column2">
                <p>Heb je een vraag over het ontwerp of wil je gewoon discussiëren over dingdongs? 
                    Het team achter Dingdongs in Gent vindt jouw mening belangrijk! </p>
                <p><a href="mailto:info@dingdongs.gent">Mail naar  info@dingdongs.gent</a>, <a href="https://twitter.com/intent/tweet?hashtags=dingdongsgent">tweet <i class="fa fa-twitter" style="height: 1vw;color:#00aced;" aria-hidden="true"></i> via #dingdongsgent</a>  of <a href="https://www.facebook.com/dingdongsgent/">like <i class="fa fa-thumbs-up" style="height: 1vw;" aria-hidden="true"></i> onze Facebookpagina! </a></p>
                <div>
                    <p class="center-block"><i>Dingdongs in Gent is een uitgave van Baryon</i></p> 
                </div>
                <img src="/figs/baryon-logo-dingdongs-v01.jpg">
            </div>
        </div>
    </div>
  </section>
  <section id="shop" class="background">
    <div class="content-wrapper">
        <div class="row" style="margin-left:5vw;">
            <div class="productColumn">
                <?php echo do_shortcode("[products id='61' class='buyMe']"); ?>
            </div>
            <div class="columnCheckout">
                <?php echo do_shortcode("[woocommerce_checkout]"); ?>
            </div>
        </div>

      <table class="copyrightFooter">
          <tbody>
            <tr>
              <td class="WMColumn"> Webmaster <img id="WMHead" src="/figs/headWM.png"></td>
              <td> <b>Ding Dongs Gent ©2017 </b>
              </td>
              <!--<td class="share__mail"><a href="mailto:info@dingdongs.gent">info<span>@</span>dingdongs.gent</a></td>-->
              <td>
                  <ul class="icons">
                    <li class="icon"><a href="mailto:info@dingdongs.gent"><i class="fa fa-envelope footerIcon" aria-hidden="true"></i></a></li>
                    <li class="icon"><a href=""><i class="fa fa-twitter footerIcon" aria-hidden="true"></i></a></li>
                    <li class="icon"><a href="https://www.facebook.com/dingdongsgent/"><i class="fa fa-facebook footerIcon" aria-hidden="true"></i></a></li>
                </ul>
              </td>
            </tr>
          </tbody>
        </table>
    </div>
  </section>

<?php get_footer(); ?>
