
        <?php 
        foreach ($menus as $menu) { 
             echo $menu->text;
            echo '<br>';
            if (isset($menu->children)) {
                foreach ($menu->children as $child) {
                   echo "$child->text";
					echo '<br>';
                }
            }
			
			echo '<br>';
		}