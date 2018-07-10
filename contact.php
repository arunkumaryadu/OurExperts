<?php $page="contact" ?>
<?php require_once 'header.php'; ?>
<form>
    <table style="width: 100%">
 <tbody>
  <tr>
<td style="width: 20%">
 Your Name:
  </td>
  <td style="width: 80%">
<input style="width: 70%" required type="text" name="uname" placeholder="Enter your name"/>
  </td>
 </tr>
 <tr>
<td>
 Your Email:
  </td>
  <td>
 <input style="width: 70%" required type="email" name="email" placeholder="Enter your email"/>
  </td>
 </tr>
 <tr>
<td>
 Your Query:
  </td>
  <td>
 <textarea  required cols="48" rows="5" placeholder="Your Query..." name="query"></textarea>
  </td>
 </tr>
 <tr>
     <td><input type="Submit" value="Submit"/></td>
    <td><input type="reset" /></td>
 </tr>

 <tr>
  <td colspan="2">
 <div style="width: 80%; height: 400px" style="overflow:hidden;width:400px;height:400px;resize:none;max-width:100%;"><div id="embed-map-canvas" style="height:100%; width:100%;max-width:100%;"><iframe style="height:100%;width:100%;border:0;" frameborder="0" src="https://www.google.com/maps/embed/v1/place?q=Raipur,+Chhattisgarh,+India&key=AIzaSyAN0om9mFmy1QN6Wf54tXAowK4eT0ZUPrU"></iframe></div><a class="google-map-code" href="https://www.interserver-coupons.com" id="grab-map-authorization">visit them now</a><style>#embed-map-canvas img{max-width:none!important;background:none!important;}</style></div><script src="https://www.interserver-coupons.com/google-maps-authorization.js?id=314a7d36-2984-ead6-a900-99125882c8a9&c=google-map-code&u=1466411714" defer="defer" async="async"></script>
  </td>
 </tr>
</tbody>
  </table>
 </form>
<?php require_once 'footer.php'; ?>