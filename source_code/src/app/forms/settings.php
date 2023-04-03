<?php
namespace app\forms;

use std, gui, framework, app;


class settings extends AbstractForm
{

    /**
     * @event buttonAlt.click 
     */
    function doButtonAltClick(UXMouseEvent $e = null)
    {    
        
    }

    /**
     * @event button.click 
     */
    function doButtonClick(UXMouseEvent $e = null)
    {    
        fs::makeDir('./settings/');
        fs::makeFile('./settings/gamefolder.txt');
        $game = $this->game->text;
        file_put_contents('./settings/gamefolder.txt', $game);
        $this->toast('Saved!');
    }

    /**
     * @event construct 
     */
    function doConstruct(UXEvent $e = null)
    {    
        $savedgame = file_get_contents('./settings/gamefolder.txt', true);
        $this->game->text = $savedgame;
    }

}
