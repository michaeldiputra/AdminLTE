var typed = new Typed(".auto-type", {
  strings : ["Student", "Newbie", "Beginner Web Designer"],
  typeSpeed : 80,
  backSpeed : 60,
  loop : true
})

$("#techstack").click(function () { console.log("Tech Stack Berhasil")
  $("#techstack").addClass("menu-box-buka");
  // $("#techstack").removeClass("menu-box");
});