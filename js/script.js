// flexslider
jQuery(window).load(function () {
  jQuery(".flexslider").flexslider({
    animation: "slide",
    touch: true,
    directionNav: false,
  });
});

// hightlight active nav item
function hightlightActiveNavItem() {
  const navLinks = document.querySelectorAll(
    "#header-primary-menu li.menu-item a"
  );
  console.log(navLinks);
  navLinks.forEach((navLink) => {
    if (navLink.getAttribute("href") === window.location.href) {
      navLink.classList.add("active");
    }
  });
}

document.addEventListener("DOMContentLoaded", hightlightActiveNavItem);
// validate contact form

/* -----------JQUERY NOT WORKING NOT WORKING ON BS5---------------*/
// jQuery(document).ready(function () {
//   jQuery("#contact-form").validate({
//     rules: {
//       inputFirstName: "required",
//       inputLastName: "required",
//       inputEmailAdd: {
//         required: true,
//         email: true,
//       },
//       inputPhone: "required",
//       inputMessage: "required",
//     },
//     messages: {
//       inputFirstName: "Please enter your first name",
//       inputLastName: "Plesae enter your last name",
//       inputEmailAdd: "Plesae enter a valid email address",
//       inputPhone: "Plesae enter your contact number",
//       inputMessage: "Plesae enter your message",
//     },
//     errorElement: "em",
//     errorPlacement: function (error, element) {
//       error.addClass("invalid-feedback");
//       error.insertAfter(element.next(".field-group"));
//     },
//     highlight: function (element, errorClass, validClass) {
//       jQuery(element).addClass("is-invalid").removeClass("is-valid");
//     },
//     unhighlight: function (element, errorClass, validClass) {
//       jQuery(element).addClass("is-valid").removeClass("is-invalid");
//     },
//   });
// });

(() => {
  "use strict";

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  const forms = document.querySelectorAll(".needs-validation");

  // Loop over them and prevent submission
  Array.from(forms).forEach((form) => {
    form.addEventListener(
      "submit",
      (event) => {
        if (!form.checkValidity()) {
          event.preventDefault();
          event.stopPropagation();
        }

        form.classList.add("was-validated");
      },
      false
    );
  });
})();
