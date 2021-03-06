const video = document.getElementById("video");
navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia || navigator.msGetUserMedia;
const button = document.getElementById("button");
const save_button = document.getElementById("save");
const save_button1 = document.getElementById("save1");
const mario = document.getElementById("mario");
const pokemon = document.getElementById("pokemon");
const smile = document.getElementById("smile");

if (navigator.getUserMedia) {
   navigator.getUserMedia({
      audio: false,
      video: true
   },
      function (stream) {
         video.srcObject = stream;
         video.play();
      },
      function (err) {
         console.log("The following error occurred: " + err.name);
      }
   );
}
else {
   console.log("getUserMedia not supported");
}

save_button.style.visibility = "hidden";
save_button1.style.visibility = "hidden";
mario.style.visibility = "hidden";
pokemon.style.visibility = "hidden";
smile.style.visibility = "hidden";
let image_url = null;

button.addEventListener("click", function () {
   const canvas = document.getElementById("canvas");
   const context = canvas.getContext("2d");
   const output_img = document.getElementById("output_img");

   canvas.width = video.videoWidth;
   canvas.height = video.videoHeight;
   context.drawImage(video, 0, 0);
   image_url = canvas.toDataURL();
   output_img.src = image_url;

   save_button.style.visibility = "visible";
   save_button1.style.visibility = "visible";
});

save_button.addEventListener("click", function () {
   mario.style.visibility = "visible";
   pokemon.style.visibility = "visible";
   smile.style.visibility = "visible";
   http = new XMLHttpRequest();
   http.onreadystatechange = function () {
      if (http.readyState === 4 && http.status === 200) {
         console.log(this.responseText);
      }
      if (http.status === 404) {
         console.log("file/resource not found");
      }
   };
   let data = { data_url: image_url };
   let json_data = JSON.stringify(data);
   http.open("POST", "../php/store_camera_image.php", true);
   http.setRequestHeader("Content-type", "application/json");
   http.send(json_data);
});