






  
  jQuery().ready(function() {
    
    jQuery.validator.addMethod('phoneUS', function(phone_number, element) {
        phone_number = phone_number.replace(/\s+/g, ''); 
        return this.optional(element) || phone_number.length > 9 &&
            phone_number.match(/^(\+91-?)?(\([2-9]\d{2}\)|[2-9]\d{2})-?[2-9]\d{2}-?\d{4}$/);
    }, 'Please enter a valid phone number.');

    // validate form on keyup and submit
    var v = jQuery("#basicform").validate({
      rules: {
        lastTimeDonated: {
          required: true,
          date: true
        },
        uname: {
          required: true,
          minlength: 3,
          maxlength: 30
        },
        uaddress: {
          required: true,
          minlength: 6
        },
        uphone: {
          required: true,
          phoneUS: true
        },
        alternate_uphone: {
          phoneUS: true
        },
        udistrict: {
          required: true
        },
        unearbyhospital: {
          required: true
        },


        uemail: {
          required: true,
          minlength: 2,
          email: true,
          maxlength: 100,
        },
        upass1: {
          required: true,
          minlength: 6,
          maxlength: 15,
        },
        upass2: {
          required: true,
          minlength: 6,
          equalTo: "#upass1",
        }

      },
      errorElement: "span",
      errorClass: "help-inline-error",
    });

    $(".open1").click(function() {
      if (v.form()) {
        $(".frm").hide("fast");
        $("#sf2").show("slow");
      }
    });

    $(".open2").click(function() {
      if (v.form()) {
        $(".frm").hide("fast");
        $("#sf3").show("slow");
      }
    });
    
    $(".open3").click(function() {
      if (v.form()) {
        $("#loader").show();
         setTimeout(function(){
           $("#basicform").html('<h2>Thanks for your time.</h2>');
         }, 1000);
        return false;
      }
    });
    
    $(".back2").click(function() {
      $(".frm").hide("fast");
      $("#sf1").show("slow");
    });

    $(".back3").click(function() {
      $(".frm").hide("fast");
      $("#sf2").show("slow");
    });

  });
