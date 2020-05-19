jQuery( document ).ready( function( $ ) {
  var token = '13455018476.9b602a3.9cf6fdf47f424480b86a08ced35be9e4',
      num_photos = 20, // maximum 20
      container = document.getElementById( 'info' ), 
      scrElement = document.createElement( 'script' );
      
  var url = '',
      instagram_id = '',
      instagram_user = '',
      instagram_link = '',
      instagram_image = '',
      instagram_created = '',
      instagram_caption = '',
      instagram_time = '';
      
      
      var data = {
        'name': 'My First AJAX Request'
      };


   
  window.mishaProcessResult = function( data ) {
    container.innerHTML = "";
    for( x in data.data ){
      console.log(data.data[x])
      container.innerHTML += '<li>';
      container.innerHTML += 'ID: ' + data.data[x].id + '<br>';
      container.innerHTML += 'USER: ' + data.data[x].user.username + '<br>';
      container.innerHTML += 'Link: ' + data.data[x].link + '<br>';
      container.innerHTML += 'Image: ' + data.data[x].images.standard_resolution.url + '<br>';
      container.innerHTML += 'created: ' + data.data[x].created_time + '<br>';
      //container.innerHTML += 'caption: ' + data.data[x].caption.text + '<br>';
      container.innerHTML += 'type: ' + data.data[x].type + '<br>';
      container.innerHTML += '<br></li>'
      
      if(data.data[x].caption != null){
        caption = data.data[x].caption.text;
      }else{
        caption = "";
      }
      
      insertInstagram(data.data[x].id, data.data[x].user.username, data.data[x].link, data.data[x].images.standard_resolution.url,
      data.data[x].created_time, caption);
      
    }
  }
  
  scrElement.setAttribute( 'src', 'https://api.instagram.com/v1/users/self/media/recent?access_token=' + token + '&count=' + num_photos + '&callback=mishaProcessResult' );
  document.body.appendChild( scrElement );
  
  
  function insertInstagram(id, user, link, image, timestamp, caption){
    jQuery.ajax({
           type : "post",
           dataType : "json",
           url : my_ajax_object.ajax_url,
           data : { 
              action: "insert_instagram_post", 
              "ig_id" : id,
              "ig_user" : user,
              "ig_link" : link,
              "ig_image" : image,
              "ig_timestamp" : timestamp,
              "ig_caption" : caption
          },
           success: function(response) {
              
                 console.log(response);
            
           }
        }) 
  }
  
  
  

  
  
  
  
  
});
