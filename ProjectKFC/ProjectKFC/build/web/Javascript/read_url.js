function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
      $('#preview')
        .attr('src', e.target.result)
        .width(120)
        .height(120);
    };
    reader.readAsDataURL(input.files[0]);
  }
}

function readURL_edit(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
      $('#preview_edit')
        .attr('src', e.target.result)
        .width(120)
        .height(120);
    };
    reader.readAsDataURL(input.files[0]);
  }
}