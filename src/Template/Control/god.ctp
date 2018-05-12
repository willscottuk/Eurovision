<script>
$(document).ready("#nextbutton").click(function() {
  $.ajax({
    type: 'POST',
    url: '/control/next',
  })
});
</script>

<div class="view hm-black-strong">
<div class="full-bg-img flex-center">

  <div class="card">
      <div class="card-block">
    		<h1>God Mode<h1>
    		<button id="nextbutton" type="button" class="btn btn-success btn-lg">Next</button>
      </div>

      <!--Footer-->
      <div class="modal-footer">
          <div class="options">
  		        Use with caution...
          </div>
      </div>
  </div>




</div>
</div>
