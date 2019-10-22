  
	<!-- DELETE MODEL -->
	<!-- Modal -->
	<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	    <div class="modal-dialog" >
	        <div class="modal-content">
	            <div class="modal-body text-center">
	               <h1 class="display-4 text-danger"> <i class="fas fa-trash"></i> </h1>
	                <h1 class="font-weight-lighter">Are you sure?</h1>
	                <h4 class="font-weight-lighter"> Do you really want to delete these records? This process cannot be
                      undone. </h4>       
                <p class="debug-url"></p>
	            </div>
	            <div class="modal-footer">
                  <button type="button btn-primary" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <a class="btn btn-danger btn-ok">Delete</a>
	            </div>
	        </div>
	    </div>
	</div>
	<!-- END DELETE MODEL -->
  <!-- Modal -->
  

  
  
  </div>
  </div>
  <!-- /#page-content-wrapper -->
  </div>
  <!-- /#wrapper -->
  <footer class="footer mt-auto py-3 text-center bg-dark">
      <div class="container">
          <span class="text-muted">All Rights Reserved. Designed and Developed by Department of Information and
              Communication Technology, Sri Lanka-German Training Institute.</span>
      </div>
  </footer>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
      integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
      integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
  </script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
  <!-- Menu Toggle Script -->
  <script>
$("#menu-toggle").click(function(e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
});
//call dropdown 
$('.dropdown-toggle').dropdown();

//delete model
$('#confirm-delete').on('show.bs.modal', function(e) {
$(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
$('.debug-url').html('Delete URL: <strong>' + $(this).find('.btn-ok').attr('href') + '</strong>');
});

var timeDisplay = document.getElementById("timestamp");

function refreshTime() {
    var dateString = new Date().toLocaleString("en-US", {
        timeZone: "Asia/Colombo"
    });
    var formattedString = dateString.replace(", ", " - ");
    timeDisplay.innerHTML = formattedString;
}

// setInterval(refreshTime, 60000);

// $(document).ready(function() {
//     setInterval(timestamp, 1000);
// });

// function timestamp() {
//   var xmlhttp = new XMLHttpRequest();
//         xmlhttp.onreadystatechange = function() {
//             if (this.readyState == 4 && this.status == 200) {
//                 document.getElementById("timestamp").innerHTML = this.responseText;
//             }
//         };
//         xmlhttp.open("GET", "controller/timestamp.php", true);
//         xmlhttp.send();
// }

//notification sample number
var x = document.getElementById("notificationx")
x.innerHTML = Math.floor((Math.random() * 1000) + 1);

//message sample number
var x = document.getElementById("messengerx")
x.innerHTML = Math.floor((Math.random() * 2000) + 1);
  </script>



  </body>

  </html>