function sendData(title, image, id, set1, set2, set3) {

	var descriptionId = id;
	var description = $('#'+descriptionId+'').text();
    $('#modal-title').html(title);/*
    $('#modal-image').html('<img src="/file/'+image+'" height="200px" width="100%">');*/
    $('#modal-description').html(description);
    $('#set1').html("Set: " +set1);
    $('#set2').html("Set: " +set2);
    $('#set3').html("Set: " +set3);
  }