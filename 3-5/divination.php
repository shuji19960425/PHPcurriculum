
<form action="result.php" method="post">
    0〜9の番号を使って好きな数字の羅列を入力してください。
    <br>
    <input type="text" name="number" pattern="^[+-]?([1-9][0-9]*|0)$">
    <input type="submit" value="占う">
</form>