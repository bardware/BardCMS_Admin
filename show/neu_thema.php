<? //SHOW 
/*
BardCMS (c) 2003 by Bardware - Programmer@Bardware.de

This file is part of BardCMS.

BardCMS is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

BardCMS is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with BardCMS; if not, write to the Free Software
Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA

REQUESTMETHOD:
FILENAME:
*/
?>
<form action="admin.php<?=$GETString;?>" method="post">
<table border="0">
<tr>
<td>Host:</td>
<td><? require_once("inc/list_hosts_thema.php"); ?></td>
</tr><tr>
<td>Thema-Titel:</td>
<td><input type="text" name="neuthema"></td>
</tr><tr>
<td>Beschreibung:</td>
<td><textarea name="beschr" cols="60" rows="6"></textarea></td>
</tr>
</table>
<input type="submit">
</form>
