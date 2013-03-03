<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<script type="text/javascript">
$(document).ready(
function()
{


    function submit_answer()
    {
        $('#myModal').modal({ show: false});
        $('#myModal').modal('show');
        //alert("HELLO");
    }

              $('#submit_button').click(submit_answer);
}
);

    </script>
    <!-- Modal -->
<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
    <h3 id="myModalLabel"> HEADER </h3>
  </div>
  <div class="modal-body">
      <div id="wait_for_answer">
          Matching your answer !!
          <img src ="<?php echo base_url(); ?>/resources/others/loader_pacman.gif" />
      </div>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
    <button class="btn btn-primary">Save changes</button>
  </div>
</div>
