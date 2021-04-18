$(document).ready(function(){


    $(document).scroll(function () {
        $(".container").css("background", "#251f47")
        $(".container").css("border-bottom", "1px solid #DAA520")

      })
      $(document).scroll(function () {
        if ($(window).scrollTop() === 0) {
          $(".container").css("background", "")
          $(".container").css("border", "none")

        }
      })
})
