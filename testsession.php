<!DOCTYPE html>
<html lang="en">
 <head>
 <script src='https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js' referrerpolicy="origin"></script>
<script>
  tinymce.init({
    selector: '#myTextarea',
    height: 400,
    plugins: 'lists, link, image, media',
    toolbar: 'h1 h2 bold italic strikethrough blockquote bullist numlist forecolor backcolor | link image media | removeformat help',
    menubar: false
  });
</script>
 </head>
 <body>
   <h1>JavaScript localStorage demo</h1>
   <textarea id="myTextarea" rows="10" cols="80"></textarea>
   <p></p>
   <button onclick="mySave()">Save</button>
   <button onclick="myLoad()">Load</button>
   <script>
     function mySave() {
       var myContent = document.getElementById("myTextarea").value;
       localStorage.setItem("myContent", myContent);
     }
     function myLoad() {
       var myContent = localStorage.getItem("myContent");
       document.getElementById("myTextarea").value = myContent;
     }
   </script>
 </body>
</html>