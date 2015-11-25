<?php
echo '
<tr>
<td>' . $name. '</td>
<td>'.$date.'</td>
<td>
<form action="feedback.php" method="get">
<input type="hidden" name="imprint" value="'.$imprint.'">
<button type="submit" value="'.$id.'" name="id">Review this screening</button>
</form>
</td>
</tr>
';
