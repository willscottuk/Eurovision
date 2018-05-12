<script>
$(document).ready("#nextbutton").click(function() {
  $.ajax({
    type: 'POST',
    url: '/control/next',
  })
});
</script>

<button id="nextbutton" type="button" class="btn btn-success">Next</button>
