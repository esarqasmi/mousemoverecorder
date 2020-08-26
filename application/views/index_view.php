 <?php $this->load->view('template_parts/header_view');?>
    <div class="buttons">
     <button id="action">Start</button>
  
  <button id="save">Save</button>
  <button id="animate">Play</button>
  </div>
  <div class="sidebar">
  <?php foreach($data as $key=>$value){  
  echo '<a href="'.site_url('main/details/'.$value['id']).'">Record '.$value['id'].'</a>';
  echo '<br/>';
  
  }?>
  </div>
  <div class="replay"></div>
<script>
$(function(){

  var m = [], recording = false;
  
  $('#action').click(function(){

    if ( ! recording ) {
      
      $(document).mousemove(function( e ){
		  
	 $('.replay').offset({
        left: e.pageX,
        top: e.pageY  
    });
  
        m.push({ x : e.pageX, y : e.pageY });
		
    
      });
      
      $(this).text('Stop');
      recording = true;
      
    } else {
      
      $(document).off('mousemove');
      
      $(this).text('Start');
      recording = false;
      
    }
    
  });
  
    $('#save').click(function(){
		console.log(m);
		if(m.length > 0){
			 $.ajax({
                        url:'<?=site_url()?>/Main/saveCordinates',
                        method: 'post',
                        data: {cordinates: m},
                        dataType: 'json',
                        success: function(response){
							alert('Data Saved');
                            var len = response.length;
                           
                           
                        }
                    });
			}
    });
  
  
  $('#animate').click(function(){
  
    var $replay = $('.replay'),
        pos, i = 0, l = m.length, t;
    
    function anim(){

      pos = m[i];
       console.log(pos);
      $replay.css({ top: pos.y, left: pos.x });
      
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