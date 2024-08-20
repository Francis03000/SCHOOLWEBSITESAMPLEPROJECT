<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    include_once('../API/DBCRUDAPI.php');
    $DBCRUDAPI = new DBCRUDAPI();


         $DBCRUDAPI->select("blog","*","blog_id = " .$_GET["id"]);
         $data = $DBCRUDAPI->sql;
         $res = array();
         $blog = mysqli_fetch_assoc($data);
         
    ?>
    <div id="preview">
   <?php echo $blog['content']?>
   <textarea name="contents" id="mde" cols="30" rows="10"></textarea>
    </div>
    
    <script src="blog/simplemde.min.js"></script>
    <script>
        console.log(preview.innerHTML);
        var simplemde = new SimpleMDE({
            element: document.getElementById("mde")
        });
        document.querySelector('.CodeMirror').style.display = "none";
        document.querySelector('.editor-toolbar').style.display = "none";
        document.querySelector('.editor-statusbar').style.display = "none";
        preview.innerHTML = simplemde.options.previewRender(preview.innerHTML);
    </script>
</body>
</html>