<?php
echo '
<tr>
<td>' . $name. '</td>
<td>'.$date.'</td>
<td><form action="review.php" method="post"><button type="submit" value="'.$id.'" name="id">Review this screening</button> </form></td>
</tr>
';
