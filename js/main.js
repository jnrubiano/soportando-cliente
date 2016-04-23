$(document).ready(function() {
  
  var st;

  $(window).scroll(function() {

    st = $(window).scrollTop();

    //$(".show").text(st);

    if(st >= 160) {
      $(".nav-header_container").css({
        position: "fixed",
        width: "100%",
        top: "0"
      });
      $(".fixed-bar").css({
        marginTop: "44px"
      });
    }
    else {
      $(".nav-header_container").css({
        position: "relative"
      });
      $(".fixed-bar").css({
        marginTop: "0px"
      });
    }
  });
  
  //New Post-Movie-Tematico Button
  $('.new-post_button').click(function(event){
    event.stopPropagation();
    $(".new-post_actions ul").slideToggle("fast");
  });

  $(document).on("click", function () {
    $(".new-post_actions ul").slideUp();
  }); 

  //Slider Modify Section - Index
  $(".slider-modify_action-container").hover(
    function() {
      $(this).find(".slider-modify_action").animate({
        bottom: "0px" 
      },150);
    },
    function() {  
      $(this).find(".slider-modify_action").animate({
        bottom: "-50px" 
      },235);
    }
  );

  $(function() {
    $(".action-lightbox").fancybox({
      maxWidth  : 900,
      maxHeight : 600,
      fitToView : false,
      width   : '90%',
      height    : '90%',
      autoSize  : false,
      closeClick  : false,
      openEffect  : 'none',
      closeEffect : 'none',
      iframe: {
        scrolling : 'auto',
        preload   : true
      },
      afterClose: function () {
        parent.location.reload(true);
      }
    });
  });

  //Style for File Input
  //$(":file").filestyle();

  //Change Texto for File Input
  $('.buttonText').text('Seleccionar');

  //Lightbox - Check Show and Hide Element
  $('input[type="checkbox"]').click(function(){    
    if($(this).attr("name")=="gallery"){
      disabled_input ++;
      $(".gallery_checkbox").slideToggle( "fast" );
      $("#source-img").prop( "disabled", true );
      $("#source-img_container").slideUp();
    }if($(this).attr("name")=="gallery" && disabled_input % 2 == 0){
      $("#source-img").removeAttr( "disabled");
      $("#source-img_container").slideDown();
    }
    if($(this).attr("name")=="video") {
      $(".video_checkbox").slideToggle("fast");
    }
  });

  //Gallery &Video Checkboxes Checked

  if($('input[name="gallery"]').is(':checked')){
    $('.gallery_checkbox').css("display", "block");
    $("#source-img").prop( "disabled", true );
    $("#source-img_container").css("display", "none");
  }

  if($('input[name="video"]').is(':checked')){
    $('.video_checkbox').css("display", "block");
  }

  //Penalties Checkbox - New Match
  if($('input[name="penalties_checkbox"]').is(':checked')){
     $(".penalties-score").prop( "disabled", false );
     $(".penalties-score_container").slideDown();
  }

  //Penalties Checkbox - New Match

  $('input[type="checkbox"]').click(function(){    
    if($(this).attr("name")=="penalties_checkbox"){
      $(".penalties-score_container").slideToggle("Fast");
      $(".penalties-score").removeAttr( "disabled");
    }
    if($(this).attr("name")=="penalties_checkbox" && $('input[name="penalties_checkbox"]').is(':checked')){
      $(".penalties-score").prop( "disabled", false );
    }
    if($(this).attr("name")=="penalties_checkbox" && $('input[name="penalties_checkbox"]').prop('checked') == false){
      $(".penalties-score").prop( "disabled", true );
    }
  });

  // Add Image to Gallery


  $("#addButton").click(function () {
        
  if(counter>=12){
    swal({
        title: "¡OMG, no más! :O",
        text: 'Recuerda que solo puedes tener <span style="color:#F8BB86">12 imágenes</span> en una galería!',
        html: true,
        timer: 2000,
        showConfirmButton: false,
    });
    return false;
  }
  counter++;
  var newTextBoxDiv = $(document.createElement('div'))
       .attr("id", 'TextBoxDiv' + counter).addClass("col-xs-12 new-img_for-gallery");
                
  newTextBoxDiv.after().html('<label class="new-post_input-file-label" for="gallery-img-' + counter +'" style="float: left;">Imágen '+ counter + ' : </label>' +
        '<div class="col-xs-8"><input  type="file" class="filestyle" name="ruta_img_' + counter + '" id="file_gallery-img-' + counter + '" for="gallery-img-' + counter + '" value="" ></div> <div class="col-xs-12 gallery-caption-container"><label for="gallery-img-caption-' + counter +'" class="gallery-caption_lightbox">Descripción Imagen '+ counter + '</label> <input for="gallery-img-caption-'+ counter +'" type="text" class="form-control" name="caption_' + counter +'" id="caption-img-' + counter + ' "></div>');
            
  newTextBoxDiv.appendTo("#TextBoxesGroup");

  //Style for File Input
  $(":file").filestyle();
  //Change Texto for File Input
  $('.buttonText').text('Seleccionar');

  });

  $("#removeButton").click(function () {
    if(counter==2){
      swal({
        title: "¡OMG, Añade más! :O",
        text: 'Recuerda que debes tener por lo menos <span style="color:#F8BB86">2 imágenes</span> en una galería!',
        html: true,
        timer: 2000,
        showConfirmButton: false,
      });
        return false;
    }
  $("#TextBoxDiv" + counter).remove();
    console.log(counter);
    counter--;
    console.log(counter);
  });

  //Program Post Date - Post
  $('#program-post_fecha').pickadate({
    format: 'dddd, dd mmm yyyy',
    formatSubmit: 'yyyy-mm-dd',
    hiddenSuffix: ''
  });

  //Program Post Hour - Post
  $('#program-post_hora').pickatime({
    format: 'hh:i a',
    formatSubmit: 'HH:i',
    hiddenSuffix: ''
  });

  //Release Date - Movies
  $('#release-date').pickadate({
    format: 'dddd, dd mmm yyyy',
    formatSubmit: 'yyyy-mm-dd',
  });

  //Filter By Date - Content
  $('#filter-by-date').pickadate({
    format: 'dddd, dd mmm yyyy',
    formatSubmit: 'yyyy-mm-dd',
    selectYears: true,
    selectMonths: true,
    hiddenSuffix: '_content_submit',
  });

  //Select Show button for Movies & Sports
  $("#combse").change(function(){
      $(this).find("option:selected").each(function(){
          if($(this).attr("id")=="4"){
              $("#movie-button_container").slideDown();
              $("#sports-button_container").slideUp();
          }
          else if($(this).attr("id")=="2"){
              $("#movie-button_container").slideUp();
              $("#sports-button_container").slideDown();
          }
          else{
              $("#movie-button_container").slideUp();
              $("#sports-button_container").slideUp();
          }
      });
  }).change();


  //Movies Checkbox - Lightbox Clicked
  $('input[type="checkbox"]').click(function(){    
    if($(this).attr("id")=="now-playing_movies"){
      $("#now-playing_movies").attr("value", "1");
      $("#coming-soon_movies").attr("value", "0");
      $("#coming-soon_movies").prop( "checked", false );
    }
    if($(this).attr("id")=="coming-soon_movies"){
      $("#coming-soon_movies").attr("value", "1");
      $("#now-playing_movies").attr("value", "0");
      $("#now-playing_movies").prop( "checked", false );
    }
    /*if($(this).attr("id")==("now-playing_movies") && $(this).prop( "checked", true )){
      //$("#now-playing_movies").prop( "checked", false );
      $("#coming-soon_movies").attr("value", "0");
      $("#now-playing_movies").attr("value", "0");
    }
    if($(this).attr("id")==("coming-soon_movies") && $(this).prop( "checked", true )){
      //$("#coming-soon_movies").prop( "checked", false );
      $("#coming-soon_movies").attr("value", "0");
      $("#now-playing_movies").attr("value", "0");
    }*/
  });

  //Movies Checkbox - Lightbox Checked
  if($('input[name="now-playing_movies"]').is(':checked')){
    $("#now-playing_movies").attr("value", "1");
    $("#coming-soon_movies").attr("value", "0");
  }
  if($('input[name="coming-soon_movies"]').is(':checked')){
    $("#coming-soon_movies").attr("value", "1");
    $("#now-playing_movies").attr("value", "0");
  }
});