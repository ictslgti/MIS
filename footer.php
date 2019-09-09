  </div>
    </div>
    <!-- /#page-content-wrapper -->
<footer class="footer">
      <div class="container">
        <p class="text-muted text-center">All Rights Reserved. Designed and Developed by Department of Information and Communication Technology, Sri Lanka-German Training Institute.</p>
      
      </div>
</footer>

</div>
  <!-- /#wrapper -->

 <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>

<!-- Menu Toggle Script -->
<script>
  $("#menu-toggle").click(function(e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
  });

$(document).ready(function() {
    setInterval(timestamp, 1000);
});

function timestamp() {
  var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("timestamp").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "controller/timestamp.php", true);
        xmlhttp.send();
}

</script>



  </body>
</html>
