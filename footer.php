          <div class="clr"></div>
        </div>
      </div>
      <div class="sidebar">
        <div class="searchform">
          <form id="formsearch" name="formsearch" method="post" action="#">
            <span>
            <input name="editbox_search" class="editbox_search" id="editbox_search" maxlength="80" value="Search our ste:" type="text" />
            </span>
            <input name="button_search" src="images/search.gif" class="button_search" type="image" />
          </form>
        </div>
        <div class="gadget">
          <h2 class="star"><span>Sidebar</span> Menu</h2>
          <div class="clr"></div>
          <ul class="sb_menu">
          <li class="active"><a href="index.php"><span>Home Page</span></a></li>
          <?php
          if(is_login()){
               echo "<li><a href='expert_list.php'><span>Our Experts</span></a></li>";                  
              if(is_expert()){
                echo "<li><a href='expert.php'><span>Expert</span></a></li>";                  
              }
              echo "<li><a href='logout.php'><span>Logout</span></a></li>";
          }
          else {
              echo "<li><a href='login.php'><span>Login</span></a></li>";              
              echo "<li><a href='reg.php'><span>Register</span></a></li>";
          }
          ?>
          
          <li><a href="about.php"><span>About Us</span></a></li>
          <li><a href="contact.php"><span>Contact Us</span></a></li>              
          </ul>
        </div>
        <div class="gadget">
          <h2 class="star"><span>Experts</span></h2>
          <div class="clr"></div>
          <ul class="ex_menu">
            <li><a href="expert_det.php">Bla Bla</a><br />
              kk kk kk kk kk kk </li>
          </ul>
        </div>
      </div>
      <div class="clr"></div>
    </div>
  </div>
  <div class="fbg">
    <div class="fbg_resize">
      <div class="col c1">
        <h2><span>Image</span> Gallery</h2>
        <a href="#"><img src="images/gal1.jpg" width="75" height="75" alt="" class="gal" /></a> 
        <a href="#"><img src="images/gal2.jpg" width="75" height="75" alt="" class="gal" /></a> 
        <a href="#"><img src="images/gal3.jpg" width="75" height="75" alt="" class="gal" /></a> 
      </div>
      <div class="col c2">
        <h2><span>Services</span> Overview</h2>
        <p style="text-align: justify">The educational system in India offers a wide spectrum of high-quality courses after engg, and the choices may seem overwhelming. You may also need tips on navigating the examination system and jobs so that you can achieve your academic and professional goals. Here is the place to submit your queries.</p>
      </div>
      <div class="col c3">
        <h2><span>Contact</span> Us</h2>
        <p class="contact_info"> <span>Address:</span> #601 Ozone, Fafadih<br />
          <span>Telephone:</span> +91-12345-67891<br />
          <span>FAX:</span> +91-12345-67891<br />
          <span>Others:</span>9999999999<br />
          <span>E-mail:</span> <a href="#">mail@ourexperts.com</a> </p>
      </div>
      <div class="clr"></div>
    </div>
  </div>
  <div class="footer">
    <div class="footer_resize">
      <p class="lf">Copyright &copy; <a href="index.php">OurExperts.Com</a>. All Rights Reserved</p>
      <div style="clear:both;"></div>
    </div>
  </div>
</div>
</body>
</html>
