<?php
//Si c'est la catégorie Audio single-audio.php sinon classique
if (in_category('22')) {include (TEMPLATEPATH . '/single-audio.php');
}
else { include (TEMPLATEPATH . '/single-classic.php');
}
?>