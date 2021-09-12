$('.button-zainteresowania').click(function() {
    var clone = $('#zainteresowania').clone();
    $('.zainteresowania').append(clone.addClass('class-zainteresowania'));
  });

  $("body").on("click", ".delete-zainteresowania", function(e) {
    $(".class-zainteresowania").last().remove();
  });

  $('.button-umiejetnosci').click(function() {
    var clone = $('#umiejetnosci').clone();
    $('.umiejetnosci').append(clone.addClass('class-umiejetnosci'));
  });

  $("body").on("click", ".delete-umiejetnosci", function(e) {
    $(".class-umiejetnosci").last().remove();
  });

  $('.button-edukacja').click(function() {
    var clone = $('#edukacja').clone();
    $('.edukacja').append(clone.addClass('class-edukacja'));
  });

  $("body").on("click", ".delete-edukacja", function(e) {
    $(".class-edukacja").last().remove();
  });

  $('.button-doswiadczenie').click(function() {
    var clone = $('#doswiadczenie').clone();
    $('.doswiadczenie').append(clone.addClass('class-doswiadczenie'));
  });

  $("body").on("click", ".delete-doswiadczenie", function(e) {
    $(".class-doswiadczenie").last().remove();
  });

  $('.button-jezyki-obce').click(function() {
    var clone = $('#jezyki-obce').clone();
    $('.jezyki-obce').append(clone.addClass('class-jezyki-obce'));
  });

  $("body").on("click", ".delete-jezyki-obce", function(e) {
    $(".class-jezyki-obce").last().remove();
  });
  

  
    $('#checked_d').click(function () {
        if ($(this).is(":checked")) {
            $(".rok_do_d").hide();
        } else {
            $(".rok_do_d").show();
        }
    });

    $('#checked_e').click(function () {
      if ($(this).is(":checked")) {
          $(".rok_do_e").hide();
      } else {
          $(".rok_do_e").show();
      }
  });