$.ajax({
    url: 'usernamequery.php',
    dataType: 'json'
 }).done(
    function(data){
      var username = data[0];
    }
 );