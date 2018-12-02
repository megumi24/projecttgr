<p>Keterangan Debitur</p>

<form id="kasus_form">
 <div class="form-group">
  <label class="control-label ">
   Jenis Debitur :
  </label>
  <div>
   <div class="radio">
	<label class="radio">
	 <input name="rating" type="radio" value="Bad"/>
	 Pegawai
	</label>
   </div>
   <div class="radio">
	<label class="radio">
	 <input name="rating" type="radio" value="Fair"/>
	 Debitur Lama
	</label>
   </div>
   <div class="radio">
	<label class="radio">
	 <input name="rating" type="radio" value="Good"/>
	 Debitur Baru
	</label>
   </div>
  </div>
 </div>


 <div class="form-group hidden">
  <label class="control-label" for="pegawai">
   We're sorry to hear you had a bad experience.  What went wrong?
  </label>
  <textarea class="form-control" cols="40" id="feedback_bad" name="feedback_bad" rows="10"></textarea>
 </div>

 <div class="form-group hidden">
  <label class="control-label" for="debitur_lama">
   Please tell us what you liked and how we can improve:
  </label>
  <textarea class="form-control form-control" cols="40" id="feedback_ok" name="feedback_ok" rows="10"></textarea>
 </div>

 <div class="form-group hidden" id="div_debiturbaru">
   <div>
	   <label class="control-label " for="testimonial">
	   Wonderful!  We're so glad to hear that.  Would you be willing to write a customer comment for our website?
	   </label>
	   <div>
	   <label class="radio-inline">
		<input name="testimonial" type="radio" value="yes"/>
		Sure!
	   </label>
	   <label class="radio-inline">
		<input name="testimonial" type="radio" value="no"/>
		I'd rather not.
	   </label>
	   </div>
   </div>
 </div>


 <div class="form-group">
  <label class="control-label " for="feedback_great">
   Thank you so much!  Please leave your testimonial here:
  </label>
  <textarea class="form-control" cols="40" id="feedback_great" name="feedback_great" rows="10"></textarea>
 </div>
 <div class="form-group" id="thanks_anyway">
  <label class="control-label">
   No problem, thanks for being a customer!
  </label>
 </div>				 
 <div class="form-group">
   <button class="btn btn-primary " name="submit" type="submit">
	Submit
   </button>
 </div>
</form>	

<script type="text/javascript">
	$( document ).ready(function() { //wait until body loads

		var testimonial_ok=false; //keeps track of whether the testimonial box is filled out
		
		//Inputs that determine what fields to show
		var rating = $('#kasus_form input:radio[name=rating]');
		var testimonial=$('#live_form input:radio[name=testimonial]');				
		
		//Wrappers for all fields
		var bad = $('#live_form textarea[name="feedback_bad"]').parent();
		var ok = $('#live_form textarea[name="feedback_ok"]').parent();
		var great = $('#live_form textarea[name="feedback_great"]').parent();
		var testimonial_parent = $('#live_form #div_testimonial');
		var thanks_anyway  = $('#live_form #thanks_anyway');
		var all=bad.add(ok).add(great).add(testimonial_parent).add(thanks_anyway); //shortcut for all wrapper elements
		
		rating.change(function(){ //when the rating changes
			var value=this.value;						
			all.addClass('hidden'); //hide everything and reveal as needed
			
			if (value == 'Bad' || value == 'Fair'){
				bad.removeClass('hidden'); //show feedback_bad					
			}
			else if (value == 'Good' || value == 'Very Good'){
				ok.removeClass('hidden'); //show feedback_ok	
			}		
			else if (value == 'Excellent'){
				testimonial_parent.removeClass('hidden'); //show testimonial question
				
				//if testimonial has already been answered
				if (testimonial_ok == 'yes'){great.removeClass('hidden');} 
				else if (testimonial_ok == 'no'){thanks_anyway.removeClass('hidden');}
			}
		});	

		
		testimonial.change(function(){ 
			//hide all except testimonial question
			all.addClass('hidden'); 
			testimonial_parent.removeClass('hidden');
		
			testimonial_ok=this.value;
			
			if (testimonial_ok == 'yes'){ //if user willing to write testimonial
				great.removeClass('hidden'); //show feedback_great
			}
			else{
				thanks_anyway.removeClass('hidden'); //show thanks message
			}
			
		});
});
</script>