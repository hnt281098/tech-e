<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     3.0.0
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\View;

use Cake\View\View;

/**
 * Application View
 *
 * Your application’s default view class
 *
 * @link https://book.cakephp.org/3.0/en/views.html#the-app-view
 */
class AppView extends View
{
    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading helpers.
     *
     * e.g. `$this->loadHelper('Html');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();
    }

    public function calculateDatetime($datetime = null)
    {
        if(!empty($datetime)){
            $yNow = date('Y');
            if(empty($yNow - $datetime->format('Y'))){
                $mNow = date('m');
                if(empty($mNow - $datetime->format('m'))){
                    $dNow = date('d');
                    if(empty($dNow - $datetime->format('d'))){
                        $hNow = date('H');
                        if (empty($hNow - $datetime->format('H'))) {
                            $iNow = date('i');
                            if (empty($iNow - $datetime->format('i'))) {
                                $sNow = date('s');
                                if(empty($sNow - $datetime->format('s'))){
                                    echo "0 giây trước";
                                }else{
                                    echo ($sNow - $datetime->format('s'))." giây trước";
                                }
                            }else{
                                echo ($iNow - $datetime->format('i'))." phút trước";
                            }
                        }else{
                            echo ($hNow - $datetime->format('H'))." giờ trước";
                        }
                    }else{
                        echo ($dNow - $datetime->format('d'))." ngày trước";
                    }
                }else{
                    echo ($mNow - $datetime->format('m'))." tháng trước";
                }
            }else{
                echo ($yNow - $datetime->format('Y'))." năm trước";
            }
        }
    }

    public function calculateAge($birthday = null)
    {
        $age = date('Y') - $birthday->format('Y');
        return $age;
    }

    public function paginator()
    {
        echo "<ul class='theme-pagination'>";
            echo $this->Paginator->first('<<');
            if($this->Paginator->hasPrev()){
                echo $this->Paginator->prev('<');
            }
            echo $this->Paginator->current();
            if($this->Paginator->hasNext()){
                echo $this->Paginator->next('>');
            }
            echo $this->Paginator->last('>>');
        echo "</ul>";
        echo $this->Paginator->counter([
            'format'=>'Đang ở trang {{page}} trong {{pages}} trang'
        ]);
    }
}