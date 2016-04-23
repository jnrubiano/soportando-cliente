$(document).ready(function() { 

  var disabled_input_section = 0;
  var disabled_input_subsection = 0;

  //Lightbox - Check Show and Hide Element
  $('input[type="checkbox"]').click(function(){
    if($(this).attr("value")=="section"){
      //Affects Section Checkbox
      $(".section_checkbox").slideToggle( "fast" );
      disabled_input_section ++;
      jQuery(".section-input").prop( "disabled", false );

      //Affects Subsection Checkbox
      $(".subsection_checkbox").slideUp( "fast" );
      jQuery(".subsection-input").prop( "disabled", true );
      $('.subsection-checkbox-button').attr('checked', false);

    }
    if($(this).attr("value")=="subsection"){
      //Affects Subsection Checkbox
      $(".subsection_checkbox").slideToggle( "fast" );
      disabled_input_subsection ++;
      jQuery(".subsection-input").prop( "disabled", false );

      //Affects Section Checkbox
      $(".section_checkbox").slideUp( "fast" );
      jQuery(".section-input").prop( "disabled", true );
      $('.section-checkbox-button').attr('checked', false);

    }
  });
});