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

REQUESTMETHOD: GET
FILENAME: disassoc_beitrag_bilder_2.php
FILETYPE: INCLUDE
*/

if(isset($arrBild)) {
   foreach($arrBild as $Bild) { ?>
<img src="<? echo $Bild["datei"]; ?>" width="<? echo $Bild["breite"]; ?>" height="<? echo $Bild["hoehe"]; ?>" /><br />
<? }
} ?>