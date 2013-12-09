jQuery.validator.setDefaults({
  debug: true,
  success: "valid"
});
$( "#image_upload" ).validate({
  rules: {
    field: {
      required: true,
      accept: "image/*"
    }
  }
})