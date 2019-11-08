navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia || navigator.msGetUserMedia;

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
var video = document.getElementById('video');
var canvas = document.getElementById('canvas1');
var context= canvas.getContext('2d'); 
var data  = canvas.toDataURL('image/png');
var photo = photo.getElementById('photo');  
function takepicture()
{
   
   if (width && height)
   {
      canvas.width = width;
      canvas.height = height;
      context.drawImage(video,0,0,width,height);

      var data = canvas.toDataURL('image.png');
      photo.setAttribute('src',data);  
   }else{
      clearphoto();
   }
}
//ajax  
//decode from 
//how to make an image from 64
//image from String
//function that convert 64 to data string 