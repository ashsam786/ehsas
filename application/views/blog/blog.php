<html>
  <head>
    <title>Blogger API Example</title>
  </head>
  <body>

<?php 

$a = file_get_contents('https://www.googleapis.com/blogger/v3/blogs/854814262568629262/posts/3998149187320845861?key=AIzaSyAkM0yIb97g5iydJXMnft95sBQxYk2I3kU');

$blogId = 854814262568629262;

//$a = file_get_contents('https://www.googleapis.com/blogger/v3/blogs/854814262568629262/posts?key=AIzaSyADn-v865Xp6hCJizeXLK5kVjzDjNNXIaE');

//ddd($a);

 ?>


    <div id="content"></div>
    <script>
      function handleResponse(response) {
        document.getElementById("content").innerHTML += "<h1>" + response.title + "</h1>" + response.content;
      }
    </script>
    <script
    src="https://www.googleapis.com/blogger/v3/blogs/854814262568629262/posts/3998149187320845861?callback=handleResponse&key=AIzaSyAkM0yIb97g5iydJXMnft95sBQxYk2I3kU"></script>
<!--script
    src="https://www.googleapis.com/blogger/v3/users/self/blogs/854814262568629262??callback=handleResponse&key=AIzaSyAkM0yIb97g5iydJXMnft95sBQxYk2I3kU"></script-->
  </body>
</html>