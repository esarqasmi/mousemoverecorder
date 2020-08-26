 <?php $this->load->view('template_parts/header_view');?>
   <div class="buttons">
  <button id="animate">Play</button>
  </div>
  <div class="replay"></div>
<script>
$(function(){ 
  var m = <?php echo json_encode(unserialize($data))?>, recording = true;
  //console.log(m);
  
  $('#animate').click(function(){
  
    var $replay = $('.replay'),
        pos, i = 0, l = m.length, t;
    
    function anim(){

      pos = m[i];
       console.log(pos);
	   y= parseInt(pos.y);
	   x= parseInt(pos.x);
      $replay.css({ top: y, left: x });
      
      i++;
      
      if ( i === l )
         clearTimeout( t );
      else
        t = setTimeout(anim, 20);
      
    }

    anim();    
    
  });

});
</script>   
   
       
  <?php $this->load->view('template_parts/footer_view');?>