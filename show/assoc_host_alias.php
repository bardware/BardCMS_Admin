<? //DATA
/*
BardCMS (c) 2003, 2004 by Bardware - Programmer@Bardware.de

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

REQUESTMETHOD: GET
FILENAME: assoc_ha_0.php
FILETYPE: INCLUDE
*/

?>
<form action="admin.php<?=$GETString;?>" method="post">
<table border="0">
<tr>
<td>Host</td>
<td><?=$HostNamen[$GEThid]["full"];?></td>
</tr><? foreach($arrHostAliases as $arrHostAliasesKey => $arrHostAliasesVal) { ?>
<tr><td>Vorhanden</td><td><?=$arrHostAliasesVal;?></td></tr><? } ?><tr>
<td>neuer Alias</td>
<td><input type="text" name="neualias" /></td>
</tr>
</table>
<input type="submit" />
</form>
