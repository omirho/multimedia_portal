<html>
    <head>
        <title>
            Upload
        </title>
    </head>
<body>

<form style="margin-top:200px;color:blue;" action="upload.php" method="post" enctype="multipart/form-data">
<label for="file">Game:</label>
<input type="file" name="file" id="file"><br>
<label for="file">Image:</label>
<input type="file" name="image" id="image"><br>
<select id='genre' name='genre'>
    <option value="action">Action</option>
    <option value="puzzle">Puzzle</option>
    <option value="shooter">Shooter</option>
    <option value="strategy">Strategy</option>
    <option value="racing">Racing</option>
</select>

<br>

Enter Game Name:<input type='text' name='game_name' id='game_name' maxlength="18">

<br>
<input type="submit" name="submit" value="Submit">
</form>

</body>
</html>