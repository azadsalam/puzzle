<?php $this-> load->view('template/header')?>

<script>



$(document).ready(

function()
{

<?php $data['selected_nav'] = "solve_navbar";
$this-> load->view('template/nav_helper',$data)?>

    var attempt = 0;
    			$('.fancybox').fancybox({
				padding: 0,

				openEffect : 'elastic',
				openSpeed  : 150,

				closeEffect : 'elastic',
				closeSpeed  : 150,

				closeClick : true,

				helpers : {
					overlay : {
						css : {
							'background' : 'rgba(238,238,238,0.85)'
						}
					}
				}
			});

  /* POST  STARTS*/
   function callback(data,status)
   {
      // alert("Data : "+data + " Status : "+status);
      obj = JSON.parse(data);


      error=obj.error;
      success = obj.success;

      if(error == true)
      {
            attempt++;
              $("#failure").removeClass("hide");
              $("#failure").html("Only Characters and Numbers are allowed!!<br/>All answers are one word (contains no spaces) and made of lower case letters.");
              $("#failure").addClass("alert alert-error");
      }

      

      else if(success == true)
      {
              //$("#failure").removeClass("hide");
              //$("#failure").html(""+obj.logic + " Status : "+status);

              $("#puzzle").addClass("hide");
              $("#failure").addClass("hide");

              //alert(obj.logic);
              $("#logic_text").html(""+obj.logic);

              $('#success_box').removeClass("hide");

              //alert("PASSED " + obj.logic);
      }

      else
      {
              attempt++;
              $("#failure").removeClass("hide");
              $("#failure").html("WRONG ANSWER !! KEEP TRYING!!");
              $("#failure").addClass("alert alert-error");
      }

            $("#loading_image").addClass("hide");



   }

   function callback_failure(data,status)
   {
       alert("SERVER ERROR OCCURED");
   }

   var post_data = {"ans_textbox":""};
   function ajax_post()
   {
       $("#loading_image").removeClass("hide");
       //alert("post");
       //radius = $(":text[name=radius]").val();
       ans = $("#ans_textbox").val();
       //alert(ans);
       //alert(radius);
       post_data = {"ans_textbox":ans};

        $.post("<?php echo site_url('solve/submit_answer_by_post');?>",post_data,callback);

       // alert(ans);
   }
   $("#submit_button").click(ajax_post);


   $('#ans_textbox').keypress(function(event){
 
	var keycode = (event.keyCode ? event.keyCode : event.which);
	if(keycode == '13'){
		ajax_post();
	}
 
});


   /* POST  ENDS*/
}

);
</script>


</head>
  <body>

<?php $data['selected'] = "solve";
$this-> load->view('template/navigation',$data)?>

          <!--MAIN CONTENT -->
    <h1 id ="hint" class="text-center alert alert-info"><?php echo $hint;?></h1>
    
    <div id="photoframe"  >
        <a  id="real_puzzle_photo" class="fancybox" href="<?php echo base_url().$url; ?>" title="<?php echo $hint;?>">    <img src="<?php echo base_url().$url; ?>" id="puzzle_image" class="img-polaroid"></a>
    </div>







<?php //echo form_open('solve/submit_answer_by_post');
//echo form_open();
?>
<div id="puzzle" >
    <span class="help-inline">

            <!-- PROMPT OF WRONG ANSWER -->
    <div id ="failure" class="hide"> TEST</div>
    </span>

    <fieldset>
    <legend>Your Answer</legend>
   
  
   <input type="text" id ="ans_textbox" name="ans_textbox" placeholder="Type Your Answer Here And Press Enter!!">
        <img  class="hide" id="loading_image" src="<?php echo base_url()?>/resources/others/loader.gif" >



        
   <!--  <a href="#myModal" role="button" class="btn btn-primary btn-large" data-toggle="modal">Submit !!</a> -->
 <!--<input type="submit" value="Submit!!" id="submit_button" class="btn btn-primary btn-large"> -->
  </fieldset>
    <button  id="submit_button" class="btn btn-primary btn-large" >Submit !!</button>
<div id="guideline" class="alert alert-info hide">
 Type your answer here and press enter or click submit button. <br/>All answers are "single word" and case-insensitive. Use only letters and numbers

</div>

<?php //echo form_close();?>
</div>


    <div id ="success_box"  class="hide">
        <div class="">
            
     <img  id="welldoneimage" src="<?php echo base_url()?>/resources/others/right_ans.jpg" >
     <p class="text-center"><b>Well Done!! Thats the correct answer !!</b></p>
</div>

        <div class="alert alert-info">
  <p id="logic_text">logic</p>
</div>
        
        <p>
                <a href="<?php echo site_url('solve');?>"  class="btn btn-info btn-large btn-block"> Bring Me The Next Puzzle !! </a>
        </p>
    </div>


<?php $this-> load->view('template/footer')?>
