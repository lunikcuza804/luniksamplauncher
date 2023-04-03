<?php
namespace app\forms;

use std, gui, framework, app;


class MainForm extends AbstractForm
{


    /**
     * @event construct 
     */
    function doConstruct(UXEvent $e = null)
    {    
        $gamefolder = file_get_contents('./settings/gamefolder.txt', true);
        $nick = file_get_contents('./settings/nickname.txt', true);
        $this->nick->text = $nick;
        
    }

    /**
     * @event button.click 
     */
    function doButtonClick(UXMouseEvent $e = null)
    {    
      $gamefolder = file_get_contents('./settings/gamefolder.txt', true);
      $nick = file_get_contents('./settings/nickname.txt', true);
      $nickname = $this->nick->text;
      execute(sprintf("reg add HKCU\\Software\\SAMP /v PlayerName /d \"%s\" /f", $nickname));  
      fs::makeDir('./settings/');
      fs::makeFile('./settings/nickname.txt');
      file_put_contents('./settings/nickname.txt', $nickname);
      $sampexe = '/samp.exe ';
      $serverip = $this->choosenServer->text;
      if  ($gamefolder == ''){
          $this->toast('Путь к игре указан неверно!');
      }
      
      if ($this->choosenServer->text == ''){
          $this->toast("Выберите сервер!");
      }else{
          execute($gamefolder. $sampexe. $serverip);
          $this->launching->show();
      }
      
    }








    /**
     * @event button3.click 
     */
    function doButton3Click(UXMouseEvent $e = null)
    {    
        
    }

    /**
     * @event choose1.click 
     */
    function doChoose1Click(UXMouseEvent $e = null)
    {
        $this->choosenServer->text = $this->server1ip->text;
        $this->choose1->color = '#ff6666'; 
        $this->choose2->color = '#990000';
        $this->choose3->color = '#990000';
        $this->choose4->color = '#990000';
    }

    /**
     * @event choose2.click 
     */
    function doChoose2Click(UXMouseEvent $e = null)
    {
        $this->choosenServer->text = $this->server2ip->text;
        $this->choose1->color = '#990000'; 
        $this->choose2->color = '#ff6666';
        $this->choose3->color = '#990000';
        $this->choose4->color = '#990000';
    }

    /**
     * @event choose3.click 
     */
    function doChoose3Click(UXMouseEvent $e = null)
    {
        $this->choosenServer->text = $this->server3ip->text;
        $this->choose1->color = '#990000'; 
        $this->choose2->color = '#990000';
        $this->choose3->color = '#ff6666';
        $this->choose4->color = '#990000';
    }

    /**
     * @event choose4.click 
     */
    function doChoose4Click(UXMouseEvent $e = null)
    {
        $this->choosenServer->text = $this->server4ip->text;
        $this->choose1->color = '#990000'; 
        $this->choose2->color = '#990000';
        $this->choose3->color = '#990000';
        $this->choose4->color = 'ff6666';
    }

    /**
     * @event main_page.click 
     */
    function doMain_pageClick(UXMouseEvent $e = null)
    {    
        
    }

    /**
     * @event site_page.click 
     */
    function doSite_pageClick(UXMouseEvent $e = null)
    {    
        browse($this->site_link->text);
    }

    /**
     * @event forum_page.click 
     */
    function doForum_pageClick(UXMouseEvent $e = null)
    {    
       browse($this->forum_link->text); 
    }

    /**
     * @event shop_page.click 
     */
    function doShop_pageClick(UXMouseEvent $e = null)
    {    
        browse($this->shop_link->text);
    }

    /**
     * @event button5.click 
     */
    function doButton5Click(UXMouseEvent $e = null)
    {    
        
    }

    /**
     * @event buttonAlt.click 
     */
    function doButtonAltClick(UXMouseEvent $e = null)
    {    
        
    }




}
