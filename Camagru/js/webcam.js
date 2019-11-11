const video = document.getElementById("video");
navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia || navigator.msGetUserMedia;
const button = document.getElementById("button");

if (navigator.getUserMedia){
   navigator.getUserMedia({
      audio: false,
      video: true},
      function(stream){
         video.srcObject = stream;
         video.play();
      },
      function(err) {
         console.log("The following error occurred: " + err.name);
      }
   );
}
else{
   console.log("getUserMedia not supported");
}

button.addEventListener("click", function(){
   //alert("button click");
   const canvas = document.getElementById("canvas");
   const context = canvas.getContext("2d");
   const output_img = document.getElementById("output_img");

   canvas.width = video.videoWidth;
   canvas.height = video.videoHeight;
   context.drawImage(video, 0, 0);
   let image_url = canvas.toDataURL();
   output_img.src = image_url;

   http = new XMLHttpRequest();
   http.onreadystatechange = function(){
      if (http.readyState === 4 && http.status === 200)
      {
         console.log(this.responseText);
      }
      if (http.status === 404)
      {
        console.log("file/resource not found");
      }
    };
   let data = {data_url: image_url};
   let json_data = JSON.stringify(data);
   http.open("POST", "php/store_camera_image.php", true);
   http.setRequestHeader( "Content-type", "application/json" );
   http.send(json_data);
});